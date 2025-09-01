<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Asset Log Book</title>
  <style>
    body { font-family: sans-serif; margin: 1em; }

    /* Table setup: full‑width, fixed layout so columns don’t overflow */
    table.logbook {
      width: 100%;
      border-collapse: collapse; /* removes double borders */
      table-layout: fixed;        /* ensures consistent column widths */ 
    }
    table.logbook th,
    table.logbook td {
      border: 1px solid #ddd;
      padding: 0.5em;
      vertical-align: top;
      word-wrap: break-word;
    }
    table.logbook th {
      background-color: #f2f2f2;
    }
    table.logbook tr:nth-child(even) {
      background-color: #fafafa;
    }
    table.logbook tr:hover {
      background-color: #e8f0fe;
    }

    /* For long OLD_DATA or NEW_DATA JSON strings */
    td pre {
      margin: 0;
      max-height: 6em;
      overflow: auto;
      background-color: transparent;
      font-size: 0.88em;
      white-space: pre-wrap;     /* wrap long words */
      word-wrap: break-word;
    }
  </style>
</head>
<body>
  <h2>Asset Log Book</h2>
  <table class="logbook">
    <thead>
      <tr>
        <!-- <th>ID</th> -->
        <th>Asset ID</th>
        <th>Action</th>
        <th>Old Data</th>
        <th>New Data</th>
        <th>Changed By</th>
        <th>Reason</th>
        <th>Changed On</th>
      </tr>
    </thead>
    <tbody>
     <?php
require_once __DIR__ . '/../../config/config.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$result = mysqli_query($conn,
  "SELECT * FROM asset_logs ORDER BY asset_id ASC, changed_on DESC"
);

if (!$result) {
  die("Query failed on asset_logbook.php: " . mysqli_error($conn));
}

$logs_by_asset = [];

while ($row = mysqli_fetch_assoc($result)) {
  $logs_by_asset[$row['asset_id']][] = $row;
}

foreach ($logs_by_asset as $asset_id => $logs):
?>
  <tr>
    <td colspan="7" style="background-color:#dfefff; font-weight:bold;">
      Asset ID: <?= htmlspecialchars($asset_id) ?>
    </td>
  </tr>
  <?php foreach ($logs as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['asset_id']) ?></td>
      <td><?= htmlspecialchars($row['action_type']) ?></td>
      <td><pre><?= htmlspecialchars($row['old_data']) ?></pre></td>
      <td><pre><?= htmlspecialchars($row['new_data']) ?></pre></td>
      <td><?= htmlspecialchars($row['changed_by']) ?></td>
      <td><?= htmlspecialchars($row['change_reason']) ?></td>
      <td><?= htmlspecialchars($row['changed_on']) ?></td>
    </tr>
  <?php endforeach; ?>
<?php endforeach; ?>

    </tbody>
  </table>
</body>
</html>




<!-- it hold the any change history by who when and where -->