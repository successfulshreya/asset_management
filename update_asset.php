<?php
// Enable full error reporting and throw exceptions on MySQLi errors for easier debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Include the configuration file (database connection settings)
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize the incoming 'id' value to prevent SQL injection
    $id_safe = mysqli_real_escape_string($conn, $_POST['id']);

    // 2. Fetch the current (old) data for the asset, before applying updates
    $old_result = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$id_safe'");
    if (!$old_result) {
        die("Database error (old data): " . mysqli_error($conn));
    }
    $old_data = mysqli_fetch_assoc($old_result);  // Store the old record as an associative array

    // 3. Build the UPDATE query using sanitized form data for each field
    $query = "UPDATE assets SET
        user_name = '" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
        designation = '" . mysqli_real_escape_string($conn, $_POST['designation']) . "',
        department = '" . mysqli_real_escape_string($conn, $_POST['department']) . "',
        employee_id = '" . mysqli_real_escape_string($conn, $_POST['employee_id']) . "',
        email_id = '" . mysqli_real_escape_string($conn, $_POST['email_id']) . "',
        mobile_number = '" . mysqli_real_escape_string($conn, $_POST['mobile_number']) . "',
        location = '" . mysqli_real_escape_string($conn, $_POST['location']) . "',
        sub_location = '" . mysqli_real_escape_string($conn, $_POST['sub_location']) . "',
        mac_id = '" . mysqli_real_escape_string($conn, $_POST['mac_id']) . "',
        ip_address = '" . mysqli_real_escape_string($conn, $_POST['ip_address']) . "',
        network_type = '" . mysqli_real_escape_string($conn, $_POST['network_type']) . "',
        device_type = '" . mysqli_real_escape_string($conn, $_POST['device_type']) . "',
        pc_name = '" . mysqli_real_escape_string($conn, $_POST['pc_name']) . "',
        cpu_make = '" . mysqli_real_escape_string($conn, $_POST['cpu_make']) . "',
        cpu_model = '" . mysqli_real_escape_string($conn, $_POST['cpu_model']) . "',
        cpu_serial_number = '" . mysqli_real_escape_string($conn, $_POST['cpu_serial_number']) . "',
        Processor = '" . mysqli_real_escape_string($conn, $_POST['Processor']) . "',
        Gen = '" . mysqli_real_escape_string($conn, $_POST['Gen']) . "',
        RAM = '" . mysqli_real_escape_string($conn, $_POST['RAM']) . "',
        bit = '" . mysqli_real_escape_string($conn, $_POST['bit']) . "',
        os = '" . mysqli_real_escape_string($conn, $_POST['os']) . "',
        HDD = '" . mysqli_real_escape_string($conn, $_POST['HDD']) . "',
        SDD = '" . mysqli_real_escape_string($conn, $_POST['SDD']) . "',
        monitor_make = '" . mysqli_real_escape_string($conn, $_POST['monitor_make']) . "',
        monitor_model = '" . mysqli_real_escape_string($conn, $_POST['monitor_model']) . "',
        monitor_serial_number = '" . mysqli_real_escape_string($conn, $_POST['monitor_serial_number']) . "',
        printer_scanner_Type = '" . mysqli_real_escape_string($conn, $_POST['printer_scanner_Type']) . "',
        printer_scanner_make = '" . mysqli_real_escape_string($conn, $_POST['printer_scanner_make']) . "',
        printer_scanner_model = '" . mysqli_real_escape_string($conn, $_POST['printer_scanner_model']) . "',
        printer_scanner_serial_number = '" . mysqli_real_escape_string($conn, $_POST['printer_scanner_serial_number']) . "',
        keyboard_make = '" . mysqli_real_escape_string($conn, $_POST['keyboard_make']) . "',
        keyboard_model = '" . mysqli_real_escape_string($conn, $_POST['keyboard_model']) . "',
        keyboard_serial_number = '" . mysqli_real_escape_string($conn, $_POST['keyboard_serial_number']) . "',
        mouse_make = '" . mysqli_real_escape_string($conn, $_POST['mouse_make']) . "',
        mouse_model = '" . mysqli_real_escape_string($conn, $_POST['mouse_model']) . "',
        mouse_serial_number = '" . mysqli_real_escape_string($conn, $_POST['mouse_serial_number']) . "',
        laptop_adaptor_serial_number = '" . mysqli_real_escape_string($conn, $_POST['laptop_adaptor_serial_number']) . "',
        date_of_issue = '" . mysqli_real_escape_string($conn, $_POST['date_of_issue']) . "',
        po_number = '" . mysqli_real_escape_string($conn, $_POST['po_number']) . "',
        vendor_name = '" . mysqli_real_escape_string($conn, $_POST['vendor_name']) . "',
        warranty_status = '" . mysqli_real_escape_string($conn, $_POST['warranty_status']) . "',
        AMC = '" . mysqli_real_escape_string($conn, $_POST['AMC']) . "',
        created_at = '" . mysqli_real_escape_string($conn, $_POST['created_at']) . "'
        WHERE id = '$id_safe'";  // Apply the update to the correct record

    mysqli_query($conn, $query) or die("Update failed: " . mysqli_error($conn)); // Run the update query

    // 4. Fetch the new data after the update, to use in the log
    $new_result = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$id_safe'");
    if (!$new_result) {
        die("Database error (new data): " . mysqli_error($conn));
    }
    $new_data = mysqli_fetch_assoc($new_result);

    // 5. Prepare data for logging (JSON-encode the before & after states)
    $update = 'Updated';  // Set a human-readable action type
    $old_data_json = json_encode($old_data);  
    $new_data_json = json_encode($new_data);
    $change_reason_safe = mysqli_real_escape_string($conn, $_POST['change_reason']);  
    // Sanitize change reason

    // 6. Insert a record into the audit log table
    $log_query = "
      INSERT INTO asset_logs
        (asset_id, action_type, old_data, new_data, changed_by, change_reason, created_at)
      VALUES
        ('$id_safe', '$update', '$old_data_json', '$new_data_json', 'admin',
         '$change_reason_safe', NOW())";

    mysqli_query($conn, $log_query) or die("Log insert failed: " . mysqli_error($conn));

    // 7. Redirect back to list page after successful update
    header("Location: assets_list.php");
    exit;
}
