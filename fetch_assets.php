<?php  

include 'config.php';


$query= "SELECT * FROM assets";
$result = mysqli_query($conn, $query);


while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['user_name']."</td>";
    echo "<td>".$row['designation']."</td>";
    echo "<td>".$row['department']."</td>";
    echo "<td>".$row['employee_id']."</td>";
    echo "<td>".$row['email_id']."</td>";
    echo "<td>".$row['mobile_number']."</td>";
    echo "<td>".$row['location']."</td>";
    echo "<td>".$row['sub_location']."</td>";
    echo "<td>".$row['mac_id']."</td>";
    echo "<td>".$row['ip_address']."</td>";
    echo "<td>".$row['network_type']."</td>";
    echo "<td>".$row['device_type']."</td>";
    echo "<td>".$row['pc_name']."</td>";
    echo "<td>".$row['cpu_make']."</td>";
    echo "<td>".$row['cpu_model']."</td>";
    echo "<td>".$row['cpu_serial_number']."</td>";
    echo "<td>".$row['Processor']."</td>";
    echo "<td>".$row['Gen']."</td>";
    echo "<td>".$row['RAM']."</td>";
    echo "<td>".$row['bit']."</td>";
    echo "<td>".$row['os']."<td>";
    echo "<td>".$row['HDD']."</td>";
    echo "<td>".$row['SDD']."</td>";
    echo "<td>".$row['monitor_make']."</td>";
    echo "<td>".$row['monitor_model']."</td>";
    echo "<td>".$row['monitor_serial_number']."</td>";
    echo "<td>".$row['printer_scanner_Type']."<td>";
    echo "<td>".$row['printer_scanner_make']."</td>";
    echo "<td>".$row['printer_scanner_model']."</td>";
    echo "<td>".$row['printer_scanner_serial_number']."</td>";
    echo "<td>".$row['keyboard_make']."</td>";
    echo "<td>".$row['keyboard_model']."</td>";
    echo "<td>".$row['keyboard_serial_number']."</td>";
    echo "<td>".$row['mouse_make']."</td>";
    echo "<td>".$row['mouse_model']."</td>";
    echo "<td>".$row['mouse_serial_number']."</td>";
    echo "<td>".$row['laptop_adaptor_serial_number']."</td>";
    echo "<td>".$row['date_of_issue']."</td>";
    echo "<td>".$row['po_number']."<td>";
    echo "<td>".$row['vendor_name']."</td>";
    echo "<td>".$row['warranty_status']."</td>";
    echo "<td>".$row['AMC']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td>".$row['created_at']."</td>";

    echo "</tr>";

}
?>
