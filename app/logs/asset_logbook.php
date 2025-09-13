<!-- asset_logbook.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Asset Log Book</title>
  <style>
    body { font-family: sans-serif; margin: 1em; background: #f5f7fa; }
    .search-box { margin-bottom: 1em; padding: 8px; width: 100%; font-size: 1em; }
    .log-card { background: #fff; border-radius: 10px; margin-bottom: 1em; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 1em; }
    .log-header { display: flex; justify-content: space-between; align-items: center; cursor: pointer; font-weight: bold; padding: 0.5em 0; }
    .log-header:hover { color: #007BFF; }
    .arrow { display: inline-block; transition: transform 0.3s ease; }
    .rotate { transform: rotate(90deg); }
    .log-body { display: none; margin-top: 0.5em; border-top: 1px solid #ddd; padding-top: 0.5em; }
    .json-table { width: 100%; border-collapse: collapse; margin-top: 0.5em; }
    .json-table th, .json-table td { border: 1px solid #ccc; padding: 4px 8px; text-align: left; }
    .json-table th { background: #eef; }
  </style>
  <script>
    function toggleLog(id) {
      const card = document.getElementById('log-card-' + id);
      const body = card.querySelector('.log-body');
      const arrow = card.querySelector('.arrow');
      const isOpen = body.style.display === 'block';
      body.style.display = isOpen ? 'none' : 'block';
      arrow.classList.toggle('rotate', !isOpen);
    }

    function filterLogs() {
      const query = document.getElementById('searchInput').value.toUpperCase();
      document.querySelectorAll('.log-card').forEach(card => {
        const text = card.textContent.toUpperCase();
        card.style.display = text.includes(query) ? 'block' : 'none';
      });
    }
  </script>
</head>
<body>
  <h2>Asset Log Book</h2>
  <input type="text" id="searchInput" class="search-box" placeholder="Search logs..." onkeyup="filterLogs()">

  <?php
    require_once __DIR__ . '/../../config/config.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $result = mysqli_query($conn, "SELECT * FROM asset_logs ORDER BY asset_id ASC, changed_on DESC");
    if (!$result) {
      die("Query failed on asset_logbook.php: " . mysqli_error($conn));
    }

    function renderChangedFields($oldJson, $newJson) {
      $old = json_decode($oldJson, true) ?? [];
      $new = json_decode($newJson, true) ?? [];
      if (!is_array($old) || !is_array($new)) {
        return "<i>No data available</i>";
      }
      $changed = [];
      foreach (array_unique(array_merge(array_keys($old), array_keys($new))) as $key) {
        $o = $old[$key] ?? null;
        $n = $new[$key] ?? null;
        if ($o !== $n) {
          $changed[$key] = ['old' => $o, 'new' => $n];
        }
      }
      if (empty($changed)) return "<i>No changes</i>";
      $html = "<table class='json-table'><tr><th>Field</th><th>Old Value</th><th>New Value</th></tr>";
      foreach ($changed as $field => $vals) {
        $html .= "<tr><td>{$field}</td><td>" . htmlspecialchars((string)$vals['old']) . "</td><td>" . htmlspecialchars((string)$vals['new']) . "</td></tr>";
      }
      $html .= "</table>";
      return $html;
    }

    // Group logs by asset_id
    $logsByAsset = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $logsByAsset[$row['asset_id']][] = $row;
    }

    $i = 1;
    foreach ($logsByAsset as $assetId => $logs) {
      $safeAssetId = htmlspecialchars($assetId);
      echo "<div class='log-card' id='log-card-$i'>";
        echo "<div class='log-header' onclick='toggleLog($i)'>";
          echo "<span>Asset ID: {$safeAssetId} | Total Logs: " . count($logs) . "</span>";
          echo "<span class='arrow'>&gt;</span>";
        echo "</div>";
        echo "<div class='log-body'>";
          foreach ($logs as $row) {
            $action = htmlspecialchars($row['action_type']);
            $by     = htmlspecialchars($row['changed_by']);
            $on     = htmlspecialchars($row['changed_on']);
            $reason = htmlspecialchars($row['change_reason']);
              echo "<div style='margin-bottom:1em;'>";
              echo "<p><strong>Action:</strong> {$action}</p>";
              echo "<p><strong>Changed By:</strong> {$by}</p>";
              echo "<p><strong>Changed On:</strong> {$on}</p>";
              echo "<p><strong>Reason:</strong> {$reason}</p>";
              echo "<h4>Changed Fields</h4>";
              echo renderChangedFields($row['old_data'], $row['new_data']);
            echo "</div>";
          }
        echo "</div>";
      echo "</div>";
      $i++;
    }
  ?>
</body>
</html>

