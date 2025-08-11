<?php
include __DIR__ . '/../config.php';

$query="SELECT * FROM `asset_categories` LIMIT 5";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['type']."</td>";
    echo "<td>".$row['Asset']."</td>";

     echo "</tr>";
}
?>
