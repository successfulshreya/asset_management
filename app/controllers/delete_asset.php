
<?php
session_start();

$path = __DIR__ . '/../../config/config.php';
echo "Looking for config at: $path<br>";

if (file_exists($path)) {
    require_once $path;
    echo "Config included successfully!<br>";
} else {
    die("Error: Config not found at $path");
}

// Now $conn should be defined — continue delete logic...


if (!isset($_GET['id'])) {
    header("Location: assets_list.php");
    exit;
}

// //restrictions acc to role condition
// if($_SESSION['role']!=='admin'){

//     header("Location:no_access.php");
//     exit();
// }

$id = $_GET['id'];

// Optional validation: ensure id matches expected format
// if (!preg_match('/^AST-\d{6}-\d{4}$/', $id)) { exit('Invalid ID'); }

$stmt = $conn->prepare("DELETE FROM assets WHERE id = ? LIMIT 1");
$stmt->bind_param("s", $id);
$stmt->execute();

if ($stmt->error) {
    exit("Delete error: " . $stmt->error);
}
if ($stmt->affected_rows === 1) {
    header("Location: assets_list.php");
} else {
    exit("No asset deleted; id not found or already removed.");
}
$stmt->close();
$conn->close();


