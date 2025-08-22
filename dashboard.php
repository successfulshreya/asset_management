<?php
include("config.php");
// //secure
// if(!isset($_SESSION['username'])){
//     header("Location: admin_login.php");
//     exit();
// }
// //for disabling browser cache
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

//role check  
 session_start();
 if($_SESSION['role']== 'admin'){;
 } elseif (($_SESSION['role']== 'subadmin')) {
   echo "welcome Sub_aadmin - limited access";
 }else{
    echo "welcome employee - access restricted";
 }

?>
<!-- //role check  -->



<?php
include("search_assets.php");
?>

<?php
$sql = "SELECT * FROM dashboard";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assetss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<!-- Search -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="assetss/css/sb-admin-2.min.css" rel="stylesheet">
<style>
    /* 1. Card Enhancements */
    .shadow-img{
        width: 300px;
        border-radius:10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.16);
    }
.card {
  border-radius: 0.65rem;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

/* 2. Color Accents & Consistency */
.border-left-primary { border-left: 4px solid #4e73df !important; }
.border-left-success { border-left: 4px solid #1cc88a !important; }
.border-left-danger { border-left: 4px solid #e74a3b !important; }
.border-left-info    { border-left: 4px solid #36b9cc !important; }

.card .text-xs {
  font-size: 0.75rem;
  letter-spacing: 0.05em;
}

.card .h5 {
  font-size: 1.25rem;
}

/* 3. Table Styling */
table.table-striped tbody tr:hover {
  background-color: #f2f2f2;
  transition: background-color 0.3s ease;
}

table thead th {
  background-color: #f8f9fc;
  font-weight: 600;
}

/* 4. Button Styling */
.btn-primary {
  border-radius: 0.5rem;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #2e59d9;
}

/* 5. Spacing & Alignment */
.container-fluid { padding-top: 1.5rem; }

.row.mb-4 {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

/* 6. Progress Bar Transition */
.progress .progress-bar {
  transition: width 0.5s ease;
}

/* 7. Responsive Adjustments */
@media (max-width: 992px) {
  .row.mb-4 { flex-direction: column; }
  .col-xl-3, .col-md-6 { width: 100%; }
}

</style>
</head>

<body style="background-color: #e6f0faff;"  id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class=""></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                <img src="sardalogo.jpg" alt="company logo" style="height:6rem; width:14rem; "class="shadow-img">
                <br>
                <br>SEML Manage Assets</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<br>
<br>
<br>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Categories Module</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                      
                            <a class="collapse-item" href="Assets.html">IT Assets</a>
                            <a class="collapse-item" href="Assets.html">NON-IT Assets</a>
                      
                        <a class="collapse-item" href="Software.html">Software</a>
                          <a class="collapse-item" href="CMDM.html">CMDM</a>
                          <a class="collapse-item" href="furniture.html">Furniture</a>
                    </div>
                </div>  
            </li>


            <!-- asset module page -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Asset Module Page</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Asset Components:</h6>
                      
                            <a class="collapse-item" href="add_asset.php">add asset</a>
                            <a class="collapse-item" href="view_assets.php">veiw all assets</a>
                      <a class="collapse-item" href="asset_logbook.php">Asset_logbook </a>
                        <a class="collapse-item" href="Software.html">Filter/SortbyType</a>
                          <a class="collapse-item" href="edit_asset.php">update asset</a>
                            <a class="collapse-item" href="assign_asset.php">Assign asset</a>
                
                    </div>
                </div>
            </li>

            <!-- REPAIR AND MAINTENANCE module for asset  Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
                    aria-expanded="true" aria-controls="collapseUtilitiess">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Repairs and Maintenance Module</span>
                </a>
                <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">r&m module</h6>
                        <a class="collapse-item" href="utilities-color.html">Add repair record</a>
                        <a class="collapse-item" href="utilities-border.html">View asset under repair</a>
                        <a class="collapse-item" href="utilities-animation.html">set repair status</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

  <!-- Utilities -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a> 
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tools</h6>
                        <a class="collapse-item" href="search_assets.php">search bar</a>
                        <a class="collapse-item" href="utilities-border.html">Notification</a>
                        <a class="collapse-item" href="import_export/import_assets.php">Export/Import CSV</a>
                        
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Assets  info</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="admin_login.php">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="DASHBOARD/form_assetnum.php">Add Company</a>
                        <a class="collapse-item" href="DASHBOARD/view_all.php">view_all-companies</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
             
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="assets_list.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                    
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   <!-- // Topbar Search
                    <form action="search_assets.php" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      
                        <div class="input-group">
                            <input type="text" name="query" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                  <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->



                 <form action="" class="input-group mb-4" method="GET" autocomplete="off">
    <input type="text" id = "searchBox" name="query" class="form-control bg-light boarder-0 small" placeholder="Search assets by name,ip...etc." value="<?= htmlspecialchars($search) ?>">
    <div id= "result"
     class="posible-absolute"></div>
    <!-- <button class="btn btn-primary" type="submit">Search</button> -->
  </form>

                    <script>
                        const searchBox = document.getElementById("searchBox");
                        const resultDiv = document.getElementById("result");

                        searchBox.addEventListener("keyup",function(){
                            let query = this.value;

                            if(query.lengtyh >1){
                                fetch("search.php?q=" + query).then(response => response.text()).then(data => {
                                    resultDiv.innerHTML = data;
                                });

                            }else{
                                resultDiv.innerHTML = "";
                            }
                        })
                    </script>





                    <!-- Topbar Navbar -->
                 
                    <ul class="navbar-nav ml-auto">
                    
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="search_assets.php" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Today</div>
                                        <div class="font-weight-bold">New Asset <strong>Laptop - Dell </strong> has been added successfully!</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Yesterday</div>
                                       License <strong>MS Office will expier in 5 days </strong>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">2 DAYS AGO</div>
                                        Asset <strong>Printert - HP </strong> moved to repair section.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">System Update Asset logbook features has been added.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Remainder: Please update asset details before monthly audit .</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="asetss/img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report updated successfully</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['role']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="assetss/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
 
                        <div class="col-xl-3 col-md-6 mb-4" >
                            <a href=assets_list.php> <div  class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Assets</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                         
                     
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Licenses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Accessories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Consumables</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                People</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">60</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--report  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div  class="card-body">
                                   
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reports
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

<!-- <div style="display:flex; justify-content:space-evenly">
<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded"
style="width:380px;  height:280px; margin-top:50px;">table</div>

<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded"
style="width:380px;  height:280px; margin-top:50px;">table</div>


<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded"
style="width:380px;  height:280px; margin-top:50px;  ">table</div>

</div> -->
                    
                    <!-- Content Row -->


                    <div class="row" >

 <!-- Area Chart -->



     <div class="col-xl-8 col-lg-7" style="margin-right: 14rem;">
        <div class="card shadow mb-4" style="width:100%";>
            <!-- Card Header - Dropdown -->
            
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Assets Overview</h6>
        <table class="table table-striped">  
      <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col" class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Asset
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                       
                        <a class="dropdown-item" href="DASHBOARD/form_assetnum.php">Add new asset</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </th>
                                    
                   <th scope="col" class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Assigned
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="assign_asset.php">Assign</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
            </tr>
      </thead>
      <tbody>
             <tr>
                  <th scope="row">1</th>
                  <td>Sarda Energy and Minerals ltd</td>
                  <td><a class="dropdown-item" href="DASHBOARD/Asset_Categories.php">700</a></td>
                  <td><a class="dropdown-item" href="assets_list.php">194</a></td>
            </tr>
            <tr>
                  <th scope="row">2</th>
                  <td>Sarda Global Trading DMCC</td>
                  <td>200</td>
                  <td>194</td>
            </tr>
        
            <?php include'DASHBOARD/fetch.php' ?>
      </tbody>
    
                        </table>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinks"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLinks">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                             
                                            <a class="dropdown-item" href="DASHBOARD/form_assetnum.php">Add</a>
                                            <a class="dropdown-item" href="assignment_log.php">Assigned</a>
                                            <a class="dropdown-item" href="#">not-Assigned</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Spar</a>
                                            <a class="dropdown-item" href="#">Scrap</a>
                                        </div>
                                    </div>
                               
                                </div><a class="btn btn-primary" type="submit" class="btn btn-primary mt-2"
                                 href="DASHBOARD/view_all.php">view all</a></div>
                                
                                </div> 
                            </div>


                            
                            <div style="margin-right: 14rem;">
            <?php include'view_assets.php' ?></div>

            <?php
$conn = mysqli_connect("localhost", "root", "", "assets_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = '';
if (isset($_GET['query'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);
    $sql = "SELECT * FROM assets
            WHERE CONCAT_WS(' ',
                user_name, department, device_type,
                employee_id, monitor_serial_number,
                ip_address, email_id
            ) LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
}
?>

<div>
            <?php include'DASHBOARD/Asset_Categories.php' ?></div>

                        </div>



                        <!-- Pie Chart -->
                         <div style="margin-right: 14rem;">
                        <div class="col-xl-4 col-lg-5" >
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between " > -->
                                    <!-- <h6 class="m-0 font-weight-bold text-primary">Sources</h6> -->
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                           
                                    
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SEML Asset Management System 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="admin_login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <body>
 <!-- Bootstrap core JavaScript-->
    <script src="assetss/vendor/jquery/jquery.min.js"></script>
    <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assetss/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assetss/js/sb-admin-2.min.js"></script>
</body>
    <!-- Bootstrap core JavaScript-->
    <script src="assetss/vendor/jquery/jquery.min.js"></script>
    <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assetss/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assetss/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assetss/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assetss/js/demo/chart-area-demo.js"></script>
    <script src="assetss/js/demo/chart-pie-demo.js"></script>


         <!-- Include jQuery  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  var rows = $('#assetsTable tbody tr');
  rows.hide().slice(0, 3).show();
  if (rows.length <= 3) $('#viewAllBtn').hide();
  
  $('#viewAllBtn').on('click', function(e){
    e.preventDefault();
    rows.slideDown();
    $(this).hide();
  });
});
</script>


<!-- search -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>