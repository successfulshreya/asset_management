<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include $_SERVER['DOCUMENT_ROOT'] . '/AMSseml/config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_SESSION['role'] ?? '';

    $data_json = json_encode($_POST, JSON_UNESCAPED_UNICODE);

    try {
        if ($role === 'subadmin') {
            $stmt = $conn->prepare("
                INSERT INTO approval_requests
                    (request_type, target_id, request_data, requested_by, status, created_at)
                VALUES (?, ?, ?, 'subadmin', 'pending', NOW())
            ");
            $request_type = 'update';
            $target_id = $_POST['id'];
            $stmt->bind_param("sis", $request_type, $target_id, $data_json);
            $stmt->execute();
            $stmt->close();

            // echo "<script>
            //         alert('Changes submitted for admin approval!');
            //         window.location.href = 'AMSseml/assets_list.php';
            //       </script>";
            echo "<script>
            alert('Changes submitted for admin approval');
             window.location.href = 'http://localhost:8080/AMSseml/assets_list.php';
            </script>";
        exit;

            exit;
        }

        if ($role === 'admin') {
            // Define the exact fields to be updated
            $fields = [
                'user_name','designation','department','employee_id',
                'email_id','mobile_number','location','sub_location',
                'mac_id','ip_address','network_type','device_type',
                'pc_name','cpu_make','cpu_model','cpu_serial_number',
                'Processor','Gen','RAM','bit','os','HDD','SDD',
                'monitor_make','monitor_model','monitor_serial_number',
                'printer_scanner_Type','printer_scanner_make',
                'printer_scanner_model','printer_scanner_serial_number',
                'keyboard_make','keyboard_model','keyboard_serial_number',
                'mouse_make','mouse_model','mouse_serial_number',
                'laptop_adaptor_serial_number','date_of_issue','po_number',
                'vendor_name','warranty_status','AMC','created_at','status'
            ];

            // Build placeholders for SQL dynamically
            $placeholders = implode(' = ?, ', $fields) . ' = ?';

            $sql = "UPDATE assets SET {$placeholders} WHERE id = ?";
            $stmt = $conn->prepare($sql);

            // Collect values in correct order
            $values = [];
            foreach ($fields as $field) {
                $values[] = $_POST[$field] ?? '';
            }
            $values[] = $_POST['id'];

            // Define types string
            $types = str_repeat('s', count($values));

            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            $stmt->close();

            echo "<script>
                    alert('Asset updated successfully by admin!');
                    window.location.href = 'http://localhost:8080/AMSseml/assets_list.php';
                  </script>";
            exit;
        }
    } catch (Exception $e) {
        error_log("Database error: " . $e->getMessage());
        exit("An unexpected error occurred. Please try again later.");
    }
}
?>
