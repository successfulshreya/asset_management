<!-- <?php
include 'config.php';
$rows = $conn->query("SELECT id, requested_by,requested_data created_at FROM approval_requests WHERE status='pending'")->fetch_all(MYSQLI_ASSOC);
foreach ($rows as $r) {
    echo "<form method='post'>
            Request #{$r['id']} by {$r['requested_by']} {$r['requested_data']}on {$r['created_at']}
            <input type='hidden' name='request_id' value='{$r['id']}'>
            <button name='action' value='approve'>Approve</button>
            <button name='action' value='reject'>Reject</button>
          </form>";
}
?> -->
