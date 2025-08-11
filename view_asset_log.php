<!-- i think this is not useful AND EXTRA FILE  -->
<?php
include 'config.php';

if (!isset($_GET['asset_id'])) {
    echo "Asset ID missing";
    exit;
}

$asset_id = $_GET['asset_id'];
$sql = "SELECT * FROM asset_assignments WHERE asset_id = ? ORDER BY assigned_date DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $asset_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>History for <?= htmlspecialchars($asset_id) ?></title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <style>
    body { font-family: Arial, sans-serif; margin:20px; background: #f4f7f8; color: #333; }
    h2 { text-align:center; margin-bottom:20px; }
    table { width: 100%; background: #fff; border-radius: 6px; overflow: hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
    th, td { padding:12px 15px; text-align:left; border-bottom:1px solid #e0e0e0; }
    tbody tr:nth-child(even) { background-color: #f9f9f9; }
    tbody tr:hover { background-color: #f1f7fc; }
    @media(max-width:768px){
      .hide-on-mobile { display:none; }
    }
  </style>
</head>
<body>
  <h2>Assignment History for Asset: <?= htmlspecialchars($asset_id) ?></h2>
  <div style="overflow-x:auto;">
    <table id="historyTable" class="display">
      <thead>
        <tr>
          <th>#</th>
          <th>asset_id</th>
          <th>Assigned To</th>
          <th>Assigned Date</th>
          <th class="hide-on-mobile">Returned Date</th>
          <th class="hide-on-mobile">Remarks</th>
        </tr>
      </thead>
      <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['asset_id']) ?></td>
            <td><?= htmlspecialchars($row['assigned_to']) ?></td>
            <td><?= htmlspecialchars($row['assigned_date']) ?></td>
            <td class="hide-on-mobile"><?= htmlspecialchars($row['returned_date']) ?: '-' ?></td>
            <td class="hide-on-mobile"><?= htmlspecialchars($row['remark']) ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6">No assignment history found for this asset</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div style="text-align:center; margin-top:20px;">
    <button style="background-color:sky; color:#f4f7f8; margin:0.1rem; padding:0.2rem;"><a href="assignment_log.php">Back to Assignment Log</a></button>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#historyTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5,10,25],
        order: [[2, 'desc']]
      });
    });
  </script>
</body>
</html>
