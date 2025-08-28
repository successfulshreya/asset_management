<?php
session_start();
include __DIR__ . '/../config.php';

// Only admin can access
if (($_SESSION['role'] ?? '') !== 'admin') {
    die("Unauthorized Access!");
}

// Fetch all the pending requests
$sql = "SELECT * FROM approval_requests WHERE status = 'pending'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approval Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h2>Pending Approval Requests</h2>
    <hr>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Target_ID</th>
                    <!-- <th>Asset ID</th> -->
                    <!-- <th>Requested By</th> -->
                    <th>Requested Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['target_id'] ?></td>
                        <!-- <td><?= $row['asset_id'] ?></td> -->
                        <!-- <td><?= htmlspecialchars($row['requested_by']) ?></td> -->
            <td>
  <a href="review_request.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Review</a>
</td>

                    <td>
                        <form method="post" action="process_aproval.php" style="display:inline;">
                                <input type="hidden" name="request_id" value="<?= $row['id'] ?>">
                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No pending requests.</p>
    <?php endif; ?>
</body>
</html>
