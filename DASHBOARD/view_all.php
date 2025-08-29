<?php


// 1. Include config.php correctly using __DIR__
require_once __DIR__ . '/../config/config.php';


// 2. Database connection (ideally configured inside config/config.php)
$host   = "localhost";
$user   = "root";
$password = "";
$dbname = "assets_db";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  
   <title>Assets Overview</title>

    <!-- Custom fonts for this template-->
    <link href="assetss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
  <div class="row">
    <div class="col-xl-8 col-lg-7 mx-5 my-3">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Assets Overview</h6>
        </div>
      <table class="table table-striped mx-1">
          <thead>
            <tr>
              <th>#</th>
              <th>Company</th>
              <th>Asset</th>
              <th>Assigned</th>
            </tr>
          </thead>
          <tbody>
            <!-- Static rows -->
            <tr><th scope="row">1</th><td>Sarda Energy and Minerals ltd</td><td>200</td><td>194</td></tr>
            <tr><th scope="row">2</th><td>Sarda Global Trading DMCC</td><td>200</td><td>194</td></tr>
            <tr><th scope="row">3</th><td>Sarda Metals &amp; Alloys Limited</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">4</th><td colspan="2">Chhattisgarh Hydro Power LLP</td><td>@twitter</td></tr>

            <!-- Include external fetch logic -->
            <?php include __DIR__ . '/fetch.php'; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
