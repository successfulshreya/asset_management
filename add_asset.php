<?php
include './config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(empty($_POST['id'])){
    $date =date('ymd');
    $random = rand(1000, 9999);
    // $_POST['id']="AST-$date-$random";
     $_POST['id']="$random";
  }

$id = $_POST['id'];
$user_name = $_POST['user_name'];
$designation = $_POST['category'];
$department = $_POST['department'];
$employee_id = $_POST['employee_id'];
$email_id = $_POST['email_id'];
$mobile_number = $_POST['mobile_number'];
$location = $_POST['location'];
$sub_location = $_POST['sub_location'];

// Additional fields as per your database structure:
$mac_id = $_POST['mac_id'];
$ip_address = $_POST['ip_address'];
$network_type = $_POST['network_type'];
$device_type = $_POST['device_type'];
$pc_name = $_POST['pc_name'];
$cpu_make = $_POST['cpu_make'];
$cpu_model = $_POST['cpu_model'];
$cpu_serial_number = $_POST['cpu_serial_number'];
$Processor = $_POST['Processor'];
$Gen = $_POST['Gen'];
$RAM = $_POST['RAM'];
$bit = $_POST['bit'];
$os = $_POST['os'];
$HDD = $_POST['HDD'];
$SDD = $_POST['SDD'];
$monitor_make = $_POST['monitor_make'];
$monitor_model = $_POST['monitor_model'];
$monitor_serial_number = $_POST['monitor_serial_number'];
$printer_scanner_Type = $_POST['printer_scanner_Type'];
$printer_scanner_make = $_POST['printer_scanner_make'];
$printer_scanner_model = $_POST['printer_scanner_model'];
$printer_scanner_serial_number = $_POST['printer_scanner_serial_number'];
$keyboard_make = $_POST['keyboard_make'];
$keyboard_model = $_POST['keyboard_model'];
$keyboard_serial_number = $_POST['keyboard_serial_number'];
$mouse_make = $_POST['mouse_make'];
$mouse_model = $_POST['mouse_model'];
$mouse_serial_number = $_POST['mouse_serial_number'];
$laptop_adaptor_serial_number = $_POST['laptop_adaptor_serial_number'];



$date_of_issue = $_POST['date_of_issue'];
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_of_issue)) {
  $date_of_issue = null; // or handle error
}




$po_number = $_POST['po_number'];
$vendor_name = $_POST['vendor_name'];
$warranty_status = $_POST['warranty_status'];
$AMC = $_POST['AMC'];
$created_at = $_POST['created_at'] ?? '';
if (!preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $created_at)) {
  // If input is datetime-local (e.g. "2025-07-30T14:30"), convert:
  if (preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $created_at)) {
    $created_at = str_replace('T', ' ', $created_at) . ':00';
  } else {
    $created_at = date('Y-m-d H:i:s');
  }
}// Usually auto-generated in DB, but included here if being passed


  $sql = "
INSERT INTO assets (
    id, user_name, designation, department, employee_id, email_id,
    mobile_number, location, sub_location, mac_id, ip_address, network_type,
    device_type, pc_name, cpu_make, cpu_model, cpu_serial_number, Processor,
    Gen, RAM, bit, os, HDD, SDD, monitor_make, monitor_model,
    monitor_serial_number, printer_scanner_Type, printer_scanner_make,
    printer_scanner_model, printer_scanner_serial_number, keyboard_make,
    keyboard_model, keyboard_serial_number, mouse_make, mouse_model,
    mouse_serial_number, laptop_adaptor_serial_number, date_of_issue,
    po_number, vendor_name, warranty_status, AMC, created_at
) VALUES (
    '$id', '$user_name', '$designation', '$department', '$employee_id', '$email_id',
    '$mobile_number', '$location', '$sub_location', '$mac_id', '$ip_address', '$network_type',
    '$device_type', '$pc_name', '$cpu_make', '$cpu_model', '$cpu_serial_number', '$Processor',
    '$Gen', '$RAM', '$bit', '$os', '$HDD', '$SDD', '$monitor_make', '$monitor_model',
    '$monitor_serial_number', '$printer_scanner_Type', '$printer_scanner_make',
    '$printer_scanner_model', '$printer_scanner_serial_number', '$keyboard_make',
    '$keyboard_model', '$keyboard_serial_number', '$mouse_make', '$mouse_model',
    '$mouse_serial_number', '$laptop_adaptor_serial_number', '$date_of_issue',
    '$po_number', '$vendor_name', '$warranty_status', '$AMC', '$created_at'
)";

    if (mysqli_query($conn,$sql)){
        echo "<H3>Asset added successfully!! :) </H3>";
    } else {
        echo "error: " .mysqli_error($conn);
    }

//     var_dump($_POST);
// exit;
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Asset</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
</head>
<body>

<h2 style="margin-left:7rem;  margin-top:2rem" >Add New Asset</h2>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">

<form action="add_asset.php" method="POST" class="container my-5">
  <!-- User Info Section -->
  <div class="card mb-4 p-4">
    <h5>User Information</h5>
    <div class="row g-3">
      <div class="col-md-6">
        <label for="id" class="form-label">Asset ID</label>
        <input type="text" name="id" id="id" class="form-control" readonly>
      </div>
      <div class="col-md-6">
        <label for="user_name" class="form-label">User Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label for="category" class="form-label">Designation (Category)</label>
        <input type="text" name="category" id="category" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="department" class="form-label">Department</label>
        <input type="text" name="department" id="department" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" name="employee_id" id="employee_id" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label for="email_id" class="form-label">Email ID</label>
        <input type="email" name="email_id" id="email_id" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="mobile_number" class="form-label">Mobile Number</label>
        <input type="text" name="mobile_number" id="mobile_number" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="location" class="form-label">Location</label>
        <input type="text" name="location" id="location" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="sub_location" class="form-label">Sub Location</label>
        <input type="text" name="sub_location" id="sub_location" class="form-control">
      </div>
    </div>
  </div>

  <!-- Device Details Section -->
  <div class="card mb-4 p-4">
    <h5>Device Details</h5>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="mac_id" class="form-label">MAC ID</label>
        <input type="text" name="mac_id" id="mac_id" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="ip_address" class="form-label">IP Address</label>
        <input type="text" name="ip_address" id="ip_address" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="network_type" class="form-label">Network Type</label>
        <input type="text" name="network_type" id="network_type" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="device_type" class="form-label">Device Type</label>
        <input type="text" name="device_type" id="device_type" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="pc_name" class="form-label">PC Name</label>
        <input type="text" name="pc_name" id="pc_name" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="cpu_make" class="form-label">CPU Make</label>
        <input type="text" name="cpu_make" id="cpu_make" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="cpu_model" class="form-label">CPU Model</label>
        <input type="text" name="cpu_model" id="cpu_model" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="cpu_serial_number" class="form-label">CPU Serial Number</label>
        <input type="text" name="cpu_serial_number" id="cpu_serial_number" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="Processor" class="form-label">Processor</label>
        <input type="text" name="Processor" id="Processor" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="Gen" class="form-label">Generation</label>
        <input type="text" name="Gen" id="Gen" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="RAM" class="form-label">RAM</label>
        <input type="text" name="RAM" id="RAM" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="bit" class="form-label">System Type (32/64-bit)</label>
        <input type="text" name="bit" id="bit" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="os" class="form-label">Operating System</label>
        <input type="text" name="os" id="os" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="HDD" class="form-label">HDD</label>
        <input type="text" name="HDD" id="HDD" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="SDD" class="form-label">SSD</label>
        <input type="text" name="SDD" id="SDD" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="monitor_make" class="form-label">Monitor Make</label>
        <input type="text" name="monitor_make" id="monitor_make" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="monitor_model" class="form-label">Monitor Model</label>
        <input type="text" name="monitor_model" id="monitor_model" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="monitor_serial_number" class="form-label">Monitor Serial Number</label>
        <input type="text" name="monitor_serial_number" id="monitor_serial_number" class="form-control">
      </div>
    </div>
  </div>

  <!-- Peripherals Section -->
  <div class="card mb-4 p-4">
    <h5>Peripherals</h5>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="printer_scanner_Type" class="form-label">Printer/Scanner Type</label>
        <input type="text" name="printer_scanner_Type" id="printer_scanner_Type" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="printer_scanner_make" class="form-label">Printer/Scanner Make</label>
        <input type="text" name="printer_scanner_make" id="printer_scanner_make" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="printer_scanner_model" class="form-label">Printer/Scanner Model</label>
        <input type="text" name="printer_scanner_model" id="printer_scanner_model" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="printer_scanner_serial_number" class="form-label">Printer/Scanner Serial Number</label>
        <input type="text" name="printer_scanner_serial_number" id="printer_scanner_serial_number" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="keyboard_make" class="form-label">Keyboard Make</label>
        <input type="text" name="keyboard_make" id="keyboard_make" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="keyboard_model" class="form-label">Keyboard Model</label>
        <input type="text" name="keyboard_model" id="keyboard_model" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="keyboard_serial_number" class="form-label">Keyboard Serial Number</label>
        <input type="text" name="keyboard_serial_number" id="keyboard_serial_number" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="mouse_make" class="form-label">Mouse Make</label>
        <input type="text" name="mouse_make" id="mouse_make" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="mouse_model" class="form-label">Mouse Model</label>
        <input type="text" name="mouse_model" id="mouse_model" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="mouse_serial_number" class="form-label">Mouse Serial Number</label>
        <input type="text" name="mouse_serial_number" id="mouse_serial_number" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="laptop_adaptor_serial_number" class="form-label">Laptop Adaptor Serial Number</label>
        <input type="text" name="laptop_adaptor_serial_number" id="laptop_adaptor_serial_number" class="form-control">
      </div>
    </div>
  </div>

  <!-- Warranty & Issue Info -->
  <div class="card mb-4 p-4">
    <h5>Warranty & Issue Details</h5>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="date_of_issue" class="form-label">Date of Issue</label>
        <input type="date" name="date_of_issue" id="date_of_issue" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="po_number" class="form-label">PO Number</label>
        <input type="text" name="po_number" id="po_number" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="vendor_name" class="form-label">Vendor Name</label>
        <input type="text" name="vendor_name" id="vendor_name" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="warranty_status" class="form-label">Warranty Status</label>
        <input type="text" name="warranty_status" id="warranty_status" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="AMC" class="form-label">AMC</label>
        <input type="text" name="AMC" id="AMC" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="created_at" class="form-label">Created At</label>
        <input type="datetime-local" name="created_at" id="created_at" class="form-control">
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-success btn-lg">Submit Asset</button>
</form>
<script>

  function generateAssetID() {
    // const date = new Date();
    // const yyyy = date.getFullYear().toString().slice(-2);
    // const mm =(date.getMonth() + 1).toString().padStart(2,'0');

    const random = Math.floor(Math.random() * 9000 + 1000); 

    // return `AST-${yyyy}${mm}${dd}-${random}`;
    return `${random}`;
  
  }

 document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("id").value = generateAssetID();
  });


//   // Fetch generated asset code
// $seq = $stmt->insert_id;
// $res = $conn->query("SELECT id FROM assets WHERE seq_id = $seq");
// $row = $res->fetch_assoc();
// echo "<h3>Asset " . htmlspecialchars($row['id']) . " added successfully!</h3>";
</script>
</body>
</html>
