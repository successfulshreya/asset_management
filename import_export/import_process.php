 <?php
include 'config.php'; // should define $conn (mysqli or PDO)

// Ensure form submission and file upload
if (isset($_POST['import'])) {
    $filename = $_FILES['file']['tmp_name'];
}
   if($_FILES['file']['size']>0){
    $file = fopen($filename, "r");
   }
    //skip header row 
    fgetcsv($file);
    while(($data = fgetcsv($file,1000, ",") )!== FALSE){

    $user_name=$data[0];
    $designation = $data[1];
    $department = $data[2];
    $employee_id =$data[3];
    $email_id = $data[4];
    $mobile_number = $data[5];
    $location =data[6];
    $mac_id = $data[8];
    $ip_address = $data[9];
    $network_type = $data[10];
    $device_type =$data[11];
    $pc_name = $data[12];
    $cpu_make = $data[13];
    $cpu_serial_number = $data[15];
    $Processor = $data[16];
    $Gen = $data[17];
    $RAM = $data[18];
    $bit = $data[19];
    $HDD = $data[21];
    $SDD = $data[22];
    $monitor_make =$data[23];
    $monitor_model = $data[24];
    $monitor_serial_number = $data[25];
    $printer_scanner_Type = $data[26];
    $printer_scanner_make = $data[27];
    $printer_scanner_model =$data[28];
    $printer_scanner_serial_number =$data[29];
    $keyboard_make = $data[30];
    $keyboard_model = $data[31];
    $keyboard_serial_number = $data[32];
    $mouse_make =$data[33];
    $mouse_serial_number =$data[35];
    $date_of_issue = $data[37];
    $po_number = $data[38];
    $vendor_name = $data[39];
    $warranty_status = $data[40];
    $AMC = $data[41];
    $created_at = $data[42];
    }
    
        $query = "INSERT INTO assets (
            user_name, designation, department, change_reason,
            employee_id, email_id, mobile_number, location,
            sub_location, mac_id, ip_address, network_type,
            device_type, pc_name, cpu_make, cpu_model,
            cpu_serial_number, processor, generation, ram,
            bit, os, hdd, sdd,
            monitor_make, monitor_model, monitor_serial_number,
            printer_scanner_type, printer_scanner_make, printer_scanner_model,
            printer_scanner_serial_number,
            keyboard_make, keyboard_model, keyboard_serial_number,
            mouse_make, mouse_model, mouse_serial_number,
            laptop_adaptor_serial_number, date_of_issue, po_number, vendor_name,
            warranty_status, amc, created_at)


            VALUES('$user_name', '$designation', '$department', '$change_reason',
            '$employee_id', '$email_id', '$mobile_number', '$location',
            '$sub_location', '$mac_id', '$ip_address', '$network_type',
            '$device_type', '$pc_name', '$cpu_make', '$cpu_model',
            '$cpu_serial_number', '$processor', '$generation', '$ram',
            '$monitor_make', $monitor_model', $monitor_serial_number',
            '$printer_scanner_type', '$printer_scanner_make', '$printer_scanner_model',
            '$printer_scanner_serial_number',
           '$keyboard_make', '$keyboard_model', '$keyboard_serial_number',
            '$mouse_make', '$mouse_model', '$mouse_serial_number',
            '$laptop_adaptor_serial_number', '$date_of_issue', '$po_number', '$vendor_name',
           '$Warranty_status', '$amc', '$created_at;"

           mysqli_query($conn,$query);

    
    fclose($file);
    echo "<script>alert('Import successful!'); 
    window.location.href='asset_list.php'; 
    </script>";
 else {
    echo 'Please upload a file.';
}
    

  ?>