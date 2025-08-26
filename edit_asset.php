<?php
require 'require_login.php';
include 'config.php';

$id = null;
$row = null;
$update = '';  // or 'update'
$old_data_json = '';
$new_data_json = '';
$change_reason = $_POST['change_reason'] ?? '';

if (isset($_GET['id']) ) { 
    $id = (int)$_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM assets WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result ) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: view_assets.php");
        exit;
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: view_assets.php");
    exit;
}

// INSTERTING LOG ENTERY AFTER UPDATE
$log_query = "INSERT INTO asset_logs(asset_id, action_type,
 old_data, new_data, changed_by, change_reason)
  VALUES ('$id','$update','$old_data_json','$new_data_json','admin','$change_reason')";
                              
 mysqli_query($conn,$log_query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Asset #<?= htmlspecialchars($row['id']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <h2>Edit Asset #<?= htmlspecialchars($row['id']) ?></h2>

  <form action="update_asset.php" method="POST" class="mt-4">
    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs" id="assetTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab">User Info</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab">System Specs</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="peripherals-tab" data-bs-toggle="tab" data-bs-target="#peripherals" type="button" role="tab">Peripherals</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="issue-tab" data-bs-toggle="tab" data-bs-target="#issue" type="button" role="tab">Issuance & Vendor</button>
      </li>
    </ul>

    <div class="tab-content mt-3">
      <!-- User Info -->
      <div class="tab-pane fade show active" id="user" role="tabpanel">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">User Name</label>
            <input required name="user_name" class="form-control" value="<?= htmlspecialchars($row['user_name']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Designation (Category)</label>
            <input name="designation" class="form-control" value="<?= htmlspecialchars($row['designation']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Department</label>
            <input name="department" class="form-control" value="<?= htmlspecialchars($row['department']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Employee ID</label>
            <input required name="employee_id" class="form-control" value="<?= htmlspecialchars($row['employee_id']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email ID</label>
            <input type="email" name="email_id" class="form-control" value="<?= htmlspecialchars($row['email_id']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Mobile Number</label>
            <input name="mobile_number" class="form-control" value="<?= htmlspecialchars($row['mobile_number']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Location</label>
            <input name="location" class="form-control" value="<?= htmlspecialchars($row['location']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Sub Location</label>
            <input name="sub_location" class="form-control" value="<?= htmlspecialchars($row['sub_location']) ?>">
          </div>
           <div class="col-md-6">
            <label class="form-label">Reason for change</label>
           <input name="change_reason"
       value="<?= htmlspecialchars(isset($row['change_reason']) ? $row['change_reason'] : '') ?>">

          </div>
        </div>
      </div>

      <!-- System Specs -->
      <div class="tab-pane fade" id="specs" role="tabpanel">
        <div class="accordion" id="specsAccordion">
          <!-- Network & Device -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingNetwork">
              <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseNetwork" aria-expanded="true">
                Network & Device
              </button>
            </h2>
            <div id="collapseNetwork" class="accordion-collapse collapse show" data-bs-parent="#specsAccordion">
              <div class="accordion-body">
                <div class="row g-3">
                  <div class="col-md-6"><label>MAC ID</label><input name="mac_id" class="form-control" value="<?= htmlspecialchars($row['mac_id']) ?>"></div>
                  <div class="col-md-6"><label>IP Address</label><input name="ip_address" class="form-control" value="<?= htmlspecialchars($row['ip_address']) ?>"></div>
                  <div class="col-md-6"><label>Network Type</label><input name="network_type" class="form-control" value="<?= htmlspecialchars($row['network_type']) ?>"></div>
                  <div class="col-md-6"><label>Device Type</label><input name="device_type" class="form-control" value="<?= htmlspecialchars($row['device_type']) ?>"></div>
                  <div class="col-md-6"><label>PC Name</label><input name="pc_name" class="form-control" value="<?= htmlspecialchars($row['pc_name']) ?>"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- CPU & Memory -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingCPU">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseCPU" aria-expanded="false">
                CPU & Memory
              </button>
            </h2>
            <div id="collapseCPU" class="accordion-collapse collapse" data-bs-parent="#specsAccordion">
              <div class="accordion-body">
                <div class="row g-3">
                  <div class="col-md-6"><label>CPU Make</label><input name="cpu_make" class="form-control" value="<?= htmlspecialchars($row['cpu_make']) ?>"></div>
                  <div class="col-md-6"><label>CPU Model</label><input name="cpu_model" class="form-control" value="<?= htmlspecialchars($row['cpu_model']) ?>"></div>
                  <div class="col-md-6"><label>CPU Serial Number</label><input name="cpu_serial_number" class="form-control" value="<?= htmlspecialchars($row['cpu_serial_number']) ?>"></div>
                  <div class="col-md-6"><label>Processor</label><input name="Processor" class="form-control" value="<?= htmlspecialchars($row['Processor']) ?>"></div>
                  <div class="col-md-4"><label>Generation</label><input name="Gen" class="form-control" value="<?= htmlspecialchars($row['Gen']) ?>"></div>
                  <div class="col-md-4"><label>RAM</label><input name="RAM" class="form-control" value="<?= htmlspecialchars($row['RAM']) ?>"></div>
                  <div class="col-md-4"><label>Bit</label><input name="bit" class="form-control" value="<?= htmlspecialchars($row['bit']) ?>"></div>
                  <div class="col-md-6"><label>OS</label><input name="os" class="form-control" value="<?= htmlspecialchars($row['os']) ?>"></div>
                  <div class="col-md-6"><label>HDD</label><input name="HDD" class="form-control" value="<?= htmlspecialchars($row['HDD']) ?>"></div>
                  <div class="col-md-6"><label>SSD</label><input name="SDD" class="form-control" value="<?= htmlspecialchars($row['SDD']) ?>"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Monitor Specs -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingMonitor">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseMonitor" aria-expanded="false">
                Monitor Details
              </button>
            </h2>
            <div id="collapseMonitor" class="accordion-collapse collapse" data-bs-parent="#specsAccordion">
              <div class="accordion-body">
                <div class="row g-3">
                  <div class="col-md-6"><label>Monitor Make</label><input name="monitor_make" class="form-control" value="<?= htmlspecialchars($row['monitor_make']) ?>"></div>
                  <div class="col-md-6"><label>Monitor Model</label><input name="monitor_model" class="form-control" value="<?= htmlspecialchars($row['monitor_model']) ?>"></div>
                  <div class="col-md-6"><label>Monitor Serial Number</label><input name="monitor_serial_number" class="form-control" value="<?= htmlspecialchars($row['monitor_serial_number']) ?>"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Peripherals -->
      <div class="tab-pane fade" id="peripherals" role="tabpanel">
        <div class="accordion" id="periAccordion">
          <?php foreach (['printer_scanner', 'keyboard', 'mouse'] as $type): ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= ucfirst($type) ?>">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= ucfirst($type) ?>">
                <?= ucfirst(str_replace('_', ' ', $type)) ?>
              </button>
            </h2>
            <div id="collapse<?= ucfirst($type) ?>" class="accordion-collapse collapse show" data-bs-parent="#periAccordion">
              <div class="accordion-body">
                <div class="row g-3">
                  <div class="col-md-4"><label><?= ucfirst(str_replace('_',' ', $type)) ?> Type</label>
                  <input name="<?= $type ?>_Type" class="form-control"
                   value="<?= htmlspecialchars(isset($row['some_field']) ? $row['some_field'] : '') ?>"></div>
                  <div class="col-md-4"><label>Make</label>
                  <input name="<?= $type ?>_make" class="form-control" value="<?= htmlspecialchars($row[$type.'_make']) ?>"></div>
                  <div class="col-md-4"><label>Model</label>
                  <input name="<?= $type ?>_model" class="form-control" value="<?= htmlspecialchars($row[$type.'_model']) ?>"></div>
                  <div class="col-md-6"><label>Serial Number</label>
                  <input name="<?= $type ?>_serial_number" class="form-control" value="<?= htmlspecialchars($row[$type.'_serial_number']) ?>"></div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingAdaptor">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdaptor">
                Adaptor
              </button>
            </h2>
            <div id="collapseAdaptor" class="accordion-collapse collapse" data-bs-parent="#periAccordion">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-md-6"><label>Laptop Adaptor Serial Number</label><input name="laptop_adaptor_serial_number" class="form-control" value="<?= htmlspecialchars($row['laptop_adaptor_serial_number']) ?>"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Issuance & Vendor Info -->
      <div class="tab-pane fade" id="issue" role="tabpanel">
        <div class="row g-3">
          <div class="col-md-6"><label>Date of Issue</label><input type="date" name="date_of_issue" class="form-control" value="<?= htmlspecialchars($row['date_of_issue']) ?>"></div>
          <div class="col-md-6"><label>PO Number</label><input name="po_number" class="form-control" value="<?= htmlspecialchars($row['po_number']) ?>"></div>
          <div class="col-md-6"><label>Vendor Name</label><input name="vendor_name" class="form-control" value="<?= htmlspecialchars($row['vendor_name']) ?>"></div>
          <div class="col-md-6"><label>Warranty Status</label><input name="warranty_status" class="form-control" value="<?= htmlspecialchars($row['warranty_status']) ?>"></div>
          <div class="col-md-6"><label>AMC (Annual Maintenance Contract)</label><input name="AMC" class="form-control" value="<?= htmlspecialchars($row['AMC']) ?>"></div>
          <div class="col-md-6"><label>Created At</label><input name="created_at" class="form-control" value="<?= htmlspecialchars($row['created_at']) ?>"></div>
         <div class="col-md-6">
            <label class="form-label">Reason for change</label>
           <input name="change_reason"
       value="<?= htmlspecialchars(isset($row['change_reason']) ? $row['change_reason'] : '') ?>">

  <select name="status">
            <option value="active">active</option>
            <option value="inactive">inactive</option>
        </select>

      </div>
    </div>

    <!-- <button type="submit" class="btn btn-primary mt-4">Update Asset</button>
    <a href="view_assets.php" class="btn btn-secondary mt-4 ms-2">Cancel</a> -->
      <?php
  if(($_SESSION['role'] ?? '')==='sub_admin'): ?>
  <button type="submit">submit for Approval</button>
  <?php else: ?>
  <button type="submit">save</button>
  
  <?php endif; 
    ?>
    <a href="view_assets.php" class="btn btn-secondary mt-4 ms-2 ">Cancel</a>
  </form>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
