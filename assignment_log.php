<?php
include 'config.php';

$query = "SELECT * FROM asset_assignments ORDER BY assigned_date DESC";
$result = mysqli_query($conn, $query);
if ($result === false) {
    die("SQL error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Asset Assignments</title>
  <style>
    body {
      background: #f4f7f8;
      font-family: Arial, sans-serif;
      color: #333;
      padding: 20px;
    }
    .table-responsive {
      overflow-x: auto;
      margin: 20px 0;
      -webkit-overflow-scrolling: touch;
    }
    table.modern-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      min-width: 600px;
    }
    table.modern-table thead {
      background-color: #347ab7;
      color: #fff;
    }
    table.modern-table th,
    table.modern-table td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }
    table.modern-table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    table.modern-table tbody tr:hover {
      background-color: #f1f7fc;
      cursor: default;
    }
    table.modern-table th:first-child,
    table.modern-table td:first-child {
      border-top-left-radius: 6px;
    }
    table.modern-table th:last-child,
    table.modern-table td:last-child {
      border-top-right-radius: 6px;
    }
    @media (max-width: 768px) {
      table.modern-table {
        font-size: 13px;
      }
      table.modern-table th,
      table.modern-table td {
        padding: 8px 10px;
      }
    }
  </style>
</head>
<body>
  <h2>Asset Assignments</h2>
  <div class="table-responsive">
    <table class="modern-table">
      <thead>
        <tr>
          <th>id</th>
          <th> Asset ID</th>
          <th>Assigned Date</th>
          <th>Assigned To</th>
          <th>Returned Date</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <!-- link bana diya assest id ko 
            view_asset_log -->
            <td><?= htmlspecialchars($row['id']) ?></td>
             <td><a href ="view_asset_log.php?asset_id=<?=urlencode($row['asset_id']) ?>">
              <?=htmlspecialchars($row['asset_id'])?>
             </a></td>
          
            <td><?= htmlspecialchars($row['assigned_date']) ?></td>
            <td><?= htmlspecialchars($row['assigned_to']) ?></td>
            <td><?= htmlspecialchars($row['returned_date']) ?: '-' ?></td>
            <td><?= htmlspecialchars($row['remark']) ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6" style="text-align:center">No assignments found.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
