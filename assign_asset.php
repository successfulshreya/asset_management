<?php
// Debugging: show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Escape inputs
    $asset_id     = mysqli_real_escape_string($conn, $_POST['asset_id'] ?? '');
    $assigned_to  = mysqli_real_escape_string($conn, $_POST['assigned_to'] ?? '');
    $remark       = mysqli_real_escape_string($conn, $_POST['remark'] ?? '');
    $user_name    = mysqli_real_escape_string($conn, $_POST['user_name'] ?? '');
    $employee_id  = mysqli_real_escape_string($conn, $_POST['employee_id'] ?? '');
    $email_id     = mysqli_real_escape_string($conn, $_POST['email_id'] ?? '');

    // Validate required fields
    if (empty($asset_id) || empty($assigned_to)) {
        echo "Asset ID and assigned_to are required.";
        exit;
    }

    // Begin transaction for atomicity
    mysqli_begin_transaction($conn);

    try {
        // Step 1: update previous active assignment (if any)
        $sql_update_assign = "
            UPDATE asset_assignments
            SET returned_date = NOW(),
                status = 'Returned'
            WHERE asset_id = '$asset_id'
              AND status = 'Active'
        ";
        if (!mysqli_query($conn, $sql_update_assign)) {
            throw new Exception("Error updating previous assignment: " . mysqli_error($conn));
        }

        // Step 2: insert new assignment
        // Using default assigned_date, and status 'Active'
        $sql_insert_assign = "
            INSERT INTO asset_assignments 
            (asset_id, assigned_to, remark, status)
            VALUES
            ('$asset_id', '$assigned_to', '$remark', 'Active')
        ";
        if (!mysqli_query($conn, $sql_insert_assign)) {
            throw new Exception("Error inserting new assignment: " . mysqli_error($conn));
        }

        // Step 3: update assets table with new master data
        // The assets table structure has: id (varchar), user_name, employee_id, email_id, status, etc.
        $sql_update_asset = "
            UPDATE assets
            SET 
              user_name   = '$user_name',
              employee_id = '$employee_id',
              email_id    = '$email_id',
              mobile_number ='$mobile_number',
              department ='$department',
              designation = '$designation',
              status      = 'Assigned'
            WHERE id = '$asset_id'
        ";
        if (!mysqli_query($conn, $sql_update_asset)) {
            throw new Exception("Error updating asset master record: " . mysqli_error($conn));
        }

        // Commit transaction
        mysqli_commit($conn);

        // Redirect after successful assignment
        header("Location: /AMSseml/app/logs/assignment_log.php");
        exit();

    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Assignment failed: " . $e->getMessage();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assign Asset</title>
  <style>
    body { background: #e9ecef; font-family: 'Open Sans', sans-serif; }
    .form-container {
      width: 360px; margin: 2em auto; padding: 1.5em; background: #fff;
      border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.35);
    }
    .form-container label { display: block; margin-bottom: 0.5em; color: #333; }
    .form-container input[type="text"], .form-container input[type="email"] {
      width: 100%; padding: 0.75em; margin-bottom: 1em; border: 1px solid #ccc; border-radius: 4px;
    }
    .form-container input:focus { border-color: #007bff; outline: none; }
    .form-container button {
      width: 100%; padding: 0.8em; background: #007bff; color: #fff;
      border: none; font-weight: bold; border-radius: 4px;
    }
    .form-container button:hover { background: #0056b3; }
  </style>
</head>
<body>
  <h2 style="text-align: center;">Assign Asset</h2>
  <div class="form-container">
    <form method="POST" action="assign_asset.php">
      <label for="asset_id">Asset ID:</label>
      <input type="text" name="asset_id" id="asset_id" required>

      <label for="user_name">User Name:</label>
      <input type="text" name="user_name" id="user_name" required>

      <label for="employee_id">Employee ID:</label>
      <input type="text" name="employee_id" id="employee_id">

      <label for="email_id">Email ID:</label>
      <input type="email" name="email_id" id="email_id">

      <label for="mobile_number">Mobile_number:</label>
      <input type="text" name="mobile_number" id="mobile_number">

      <label for="department">Department:</label>
      <input type="text" name="department" id="department"> 


      <label for="Designation">Email ID:</label>
      <input type="text" name="Designation" id="Designation"> 


      <label for="assigned_to">Assigned To:</label>
      <input type="text" name="assigned_to" id="assigned_to" required>

      <label for="remark">Remarks:</label>
      <input type="text" name="remark" id="remark">

      <button type="submit">Assign Asset</button>
    </form>
  </div>
</body>
</html>
