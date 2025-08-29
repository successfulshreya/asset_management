<!-- <?php
include 'config/config.php';

// $sql = "SELECT * FROM assets";
// $result = mysqli_query($conn, $sql);
?> -->

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
    <h1 class="h3 mb-2 text-gray-800">DESKTOP</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DESKTOP</h6>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover" 
          id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Asset Name</th>
                <th>Device Image</th>
                <th>Asset tag</th>
                <th>Serial</th>
                <th>Model</th>
                <th>Category</th>
                <th>Status</th>
                <th>Categorye</th>
                <th>Status</th>
                <th>Checked out to</th>
                 <th>Location</th>
                 <th>Purchase Cost</th>
                 <th>Current Value</th>
                 <th>Checkin/Checkout</th>
                 <th>Actions</th>
              </tr>
            </thead>

</div>
          </table>
        </div>
      </div>
    </div>
  </div>


            <?php  $page = $_GET['page'] ?? 'asset_list.php';
$allowed = ['asset_list','add_asset','assign_asset'];

if(in_array($page, $allowed)){
    include "pages/{$page}.php";
}else{
    echo"<h2> page not found</h2>";
}

?>





  <footer class="sticky-footer bg-white">
   
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
