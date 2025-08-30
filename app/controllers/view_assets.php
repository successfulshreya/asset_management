<?php
// include 'config/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/AMSseml/config/config.php';
$result = mysqli_query($conn, "SELECT * FROM assets");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Assets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <h2 class="mb-4">All Assets</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>User Name</th>
          <th>Department</th>
          <th>Asset ID</th>
          <th>Employee ID</th>
          <th>IP Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['user_name']) ?></td>
          <td><?= htmlspecialchars($row['department']) ?></td>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['employee_id']) ?></td>
          <td><?= htmlspecialchars($row['ip_address']) ?></td>
          <td>
          <a href="app/controllers/edit_asset.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="app/controllers/delete_asset.php?id=<?= $row['id'] ?>"
               class="btn btn-sm btn-danger ms-2"
               onclick="return confirm('Are you sure you want to delete this asset?');">
              Delete
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




