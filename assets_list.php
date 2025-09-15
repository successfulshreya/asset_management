<?php
include $_SERVER['DOCUMENT_ROOT'] . '/AMSseml/config/config.php';
$sql = "SELECT * FROM assets";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial‑scale=1,shrink-to-fit=no">
  <title>SB Admin 2 – Assets Table</title>

  <link href="assetss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="assetss/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assetss/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assetss/vendor/datatables-buttons/buttons.bootstrap4.min.css" rel="stylesheet">

  <style>
    .table-hover tbody tr:hover { background-color: #f2f2f2; }
    .table-striped tbody tr:nth‑of‑type(odd) { background-color: #fafafa; }
    .btn-container { margin: 1.5rem 3rem; }
    .btn-custom {
      display: inline-block;
      margin-right: 1rem;
      padding: 0.5rem 1.2rem;
      background-color: #4e73df;
      color: #fff;
      border-radius: 0.35rem;
      text-decoration: none;
      font-weight: 600;
    }
    .btn-custom:hover { background-color: #2e59d9; color: #fff; }
    .dataTables_wrapper .dt-buttons .btn {
      background: #1cc88a;
      color: #fff;
      border: none;
      margin-right: 0.5rem;
      border-radius: 0.25rem;
    }
    .dataTables_wrapper .dt-buttons .btn:hover {
      background: #17a673;
    }
    .table-responsive { max-height: 70vh; overflow-y: auto; }
  </style>
</head>
<body id="page-top">
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Assets Table</h1>
    <p class="mb-4">DataTables is used below for sorting, searching, pagination, and exporting. See <a target="_blank" href="https://datatables.net">DataTables docs</a>.</p>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assets Inventory</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover" 
          id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Asset ID</th><th>User Name</th><th>Designation</th>
                <th>Department</th><th>assets uuid</th>
                <th>Employee ID</th><th>E‑mail ID</th>
                <th>Mobile Number</th>
                <th>Location</th>
                <th>Sub‑Location</th><th>MAC ID</th><th>IP Address</th>
                <th>Network Type{static/DHCP}</th>
                <th>Device Type</th>
                <!-- cpu -->
                <th>PC Name</th><th>CPU Make</th><th>CPU Model</th>
                <th>CPU Serial Number</th>
                <th>Processor</th><th>Generation</th><th>RAM</th>
                <th>Bit</th><th>OS</th><th>HDD</th><th>SSD</th>
                <th>Monitor Make</th>
                <th>Monitor Model</th><th>Monitor Serial Number</th>
                <!-- printer -->
                <th>Printer/Scanner Type{Static / DHCP}</th></th>
                <th>Printer/Scanner Make</th><th>Printer/Scanner Model</th>
                <th>Printer/Scanner Serial No</th>
                <th>Keyboard Make</th><th>Keyboard Model</th>
                <th>Keyboard Serial No</th>
                <!-- mouse -->
                <th>Mouse Make</th><th>Mouse Model</th>
                <th>Mouse Serial No</th><th>Laptop Power Adaptor</th>
                <th>PO Number</th>
                <th>Vendor Name</th><th>Date of Issue </th>
                <th>Warranty Status</th>
                <th>AMC</th>
                <th>status</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody>
              <?php include 'app/controllers/fetch_assets.php'; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="btn-container">
    <a href="app/controllers/add_asset.php" class="btn-custom">Add New Asset</a>
     <!-- <a href="#"  data-page="http://localhost:8080/AMSseml/app/controllers/add_asset.php" class="btn-custom collapse0 collapse-item">Add New Asset</a> -->
    <a href="app/controllers/edit_asset.php" class="btn-custom">Edit Asset</a>
  </div>

  <footer class="sticky-footer bg-white">
    <div class="container my-auto"><div class="copyright text-center my-auto">
      <span>© Your Website 2020</span>
    </div></div>
  </footer>

  <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

  <script src="assetss/vendor/jquery/jquery.min.js"></script>
  <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assetss/js/sb-admin-2.min.js"></script>
  <script src="assetss/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assetss/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assetss/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="assetss/vendor/datatables-buttons/buttons.bootstrap4.min.js"></script>
  <script src="assetss/vendor/jszip/jszip.min.js"></script>
  <script src="assetss/vendor/pdfmake/pdfmake.min.js"></script>
  <script src="assetss/vendor/datatables-buttons/buttons.html5.min.js"></script>
  <script src="assetss/vendor/datatables-buttons/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 10,
        lengthMenu: [[10,25,50,-1],[10,25,50,"All"]],
        responsive: true
      });
    });
  </script>
</body>
</html>
