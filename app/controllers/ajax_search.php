<?php 
include 'config/config.php';

$q = $_GET['q'] ?? '';

// Prepare query with placeholders
$sql = "SELECT ip_address, user_name FROM assets 
        WHERE ip_address LIKE ? OR user_name LIKE ? 
        LIMIT 10";

$stmt = $conn->prepare($sql);
$searchTerm = "%$q%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table class='table table-sm table-bordered'>";
    echo "<tr><th>IP Address</th><th>Employee Name</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $ip = htmlspecialchars($row['ip_address']);
        $name = htmlspecialchars($row['user_name']);

        echo "<tr onclick=\"fillSearch('$ip', '$name')\">";
        echo "<td>$ip</td>";
        echo "<td>$name</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p class='p-2'>No results found</p>";
}

$stmt->close();
$conn->close();
?>
