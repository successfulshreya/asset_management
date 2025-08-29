<?php
include __DIR__ . '/../config/config.php';

$query="SELECT * FROM dashboard LIMIT 5";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['#']."</td>";
    echo "<td>".$row['company']."</td>";
    echo "<td>".$row['Asset']."</td>";
    echo "<td>".$row['Assigned']."</td>";
     echo "</tr>";
}
?>
