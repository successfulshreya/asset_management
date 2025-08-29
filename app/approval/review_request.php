<?php
// Include database configuration file
require_once __DIR__ . '/../../config/config.php';

// Start the session to access session variables (like user role)
session_start();

// Restrict access to only admin users
if (($_SESSION['role'] ?? '') !== 'admin') {
    die("Unauthorized Access!");
}

// Get the ID of the approval request from the URL
$id = $_GET['id'] ?? null;

// If no ID provided, exit
if (!$id) {
    die("Missing request ID.");
}

// Fetch the approval request from the database
$request = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM approval_requests WHERE id = '$id'"));
if (!$request) {
    die("Approval request not found.");
}

// Decode the JSON-encoded requested changes
$requested_data = json_decode($request['request_data'], true);

// Get the asset ID that is being modified
$target_id = $request['target_id'];

// Fetch the current asset data for comparison
$current_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM assets WHERE id = '$target_id'"));
?>

<!DOCTYPE html>
<html>
<head>
  <title>Review Request</title>

  <!-- Load Bootstrap 5 for responsive layout and styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional custom styles for visual clarity -->
  <style>
    .changed { border-left: 5px solid #ffc107; }      /* Yellow bar for changed fields */
    .unchanged { border-left: 5px solid #dee2e6; }    /* Grey bar for unchanged fields */
    .value-box { font-family: monospace; font-size: 0.95rem; } /* Styled values */
    .badge-changed { background-color: #ffc107; }     /* Badge color for changed */
    .badge-unchanged { background-color: #adb5bd; }   /* Badge color for unchanged */
  </style>
</head>
<body class="bg-light">

  <!-- Page container -->
  <div class="container py-5">

    <!-- Page title -->
    <h2 class="mb-4 text-center">Review Asset Change Request</h2>

    <!-- Summary info for context -->
    <div class="mb-3">
      <p><strong>Asset ID:</strong> <?= htmlspecialchars($target_id) ?></p>
      <p><strong>Requested By:</strong> <?= htmlspecialchars($request['requested_by']) ?></p>
      <p><strong>Submitted On:</strong> <?= htmlspecialchars($request['created_at']) ?></p>
    </div>

    <!-- Form to approve or reject -->
     <form method="post" action="process_aproval.php">


      <input type="hidden" name="request_id" value="<?= $id ?>">

      <!-- Start layout for field-by-field change display -->
      <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php
        // Loop through each changed field in the request
        foreach ($requested_data as $field => $new_value):
          $old_value = $current_data[$field] ?? '';              // Get old value
          $is_changed = $new_value != $old_value;                // Compare old vs new
          $css_class = $is_changed ? 'changed' : 'unchanged';    // Add style class
          $badge = $is_changed
              ? '<span class="badge badge-changed">Changed</span>'
              : '<span class="badge badge-unchanged">Unchanged</span>';
        ?>

        <!-- Each change shown in a Bootstrap card -->
        <div class="col">
          <div class="card shadow-sm <?= $css_class ?>">
            <div class="card-body">
              <!-- Field name with change badge -->
              <h6 class="card-title text-capitalize d-flex justify-content-between">
                <?= str_replace('_', ' ', htmlspecialchars($field)) ?>
                <?= $badge ?>
              </h6>

              <!-- Old vs new values shown side by side -->
              <div class="row value-box">
                <div class="col-6">
                  <small class="text-muted">Old</small><br>
                  <div class="text-dark"><?= nl2br(htmlspecialchars($old_value)) ?: '<em>N/A</em>' ?></div>
                </div>
                <div class="col-6">
                  <small class="text-muted">New</small><br>
                  <div class="text-dark fw-bold"><?= nl2br(htmlspecialchars($new_value)) ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Action buttons -->
      <div class="mt-5 text-center">
        <button type="submit" name="action" value="approve" class="btn btn-success btn-lg px-5 me-3">✅ Approve</button>
        <button type="submit" name="action" value="reject" class="btn btn-outline-danger btn-lg px-5">❌ Reject</button>
      </div>

    </form>
  </div>

</body>
</html>
