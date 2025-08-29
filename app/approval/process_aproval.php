<?php
require_once __DIR__ . '/../../config/config.php';
session_start();

// Ensure only admin can process requests
if (($_SESSION['role'] ?? '') !== 'admin') {
    die("Unauthorized Access!");
}

// Extract data from POST
$request_id = $_POST['request_id'] ?? null;
$action = $_POST['action'] ?? null;

if (!$request_id || !in_array($action, ['approve', 'reject'])) {
    die("Invalid or incomplete form submission.");
}

// Get the pending approval request
$sql = "SELECT * FROM approval_requests WHERE id = '$request_id' AND status = 'pending'";
$result = mysqli_query($conn, $sql);
$request = mysqli_fetch_assoc($result);

if (!$request) {
    die("Approval request not found or already processed.");
}

$target_id = $request['target_id'];
$request_data = json_decode($request['request_data'], true);
$admin_user = $_SESSION['username'] ?? 'admin'; // assuming session contains username

if ($action === 'approve') {
    // Build dynamic UPDATE query for the target asset
    $update_fields = [];
    // Get valid columns from 'assets' table
$columns_result = mysqli_query($conn, "SHOW COLUMNS FROM assets");
$valid_columns = [];

while ($col = mysqli_fetch_assoc($columns_result)) {
    $valid_columns[] = $col['Field'];
}

$update_fields = [];
foreach ($request_data as $field => $value) {
    if (!in_array($field, $valid_columns)) continue; // Skip unknown fields

    $safe_field = mysqli_real_escape_string($conn, $field);
    $safe_value = mysqli_real_escape_string($conn, $value);
    $update_fields[] = "`$safe_field` = '$safe_value'";
}


    $update_query = "UPDATE assets SET " . implode(", ", $update_fields) . " WHERE id = '$target_id'";

    if (!mysqli_query($conn, $update_query)) {
        die("Failed to update asset: " . mysqli_error($conn));
    }
}

// Update the approval request record
$status = $action === 'approve' ? 'approved' : 'rejected';
$now = date('Y-m-d H:i:s');

$update_status_query = "
    UPDATE approval_requests
    SET status = '$status',
        approved_by = '$admin_user',
        approved_at = '$now'
    WHERE id = '$request_id'
";

if (!mysqli_query($conn, $update_status_query)) {
    die("Failed to update approval request status: " . mysqli_error($conn));
}

// Redirect with success
header("Location: approval_request_list.php?msg=$status");
exit;
?>
