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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Asset Search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #result {
      position:absolute;
      width: 400px;
      background-color: #fff;
      border:1px solid #ccc;
      display: none;
      max-height: 200px;
      overflow-y:auto;
      z-index: 1000;

      #result table{
        width:100%;
        border-collapse: collapse;

      #result th #result td {
        border: 1px solid #ddd;
        padding:6px;
      
      }
      #result tr:hover{
        background: #f1f1f1;
        cursor: pointer;
      }
    }

    }
  </style>
</head>
<body >
<div class="container my-5" >
  <h2 class="mb-3">Search Assets</h2>
  <form action="" class="input-group mb-4" method="GET" autocomplete="off">
    <input type="text" id = "searchBox" name="query" class="form-control bg-light boarder-0 small" placeholder="Search assets by name,ip...etc." value="<?= htmlspecialchars($search) ?>">
    <div id= "result"
     class="posible-absolute"></div>
    <!-- <button class="btn btn-primary" type="submit">Search</button> -->
  </form>

  <?php if (isset($result)): ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-light">
            <tr>
              <th>User Name</th>
              <th>Asset ID</th>
              <th>Department</th>
              <th>Device Type</th>
              <th>Employee ID</th>
              <th>Monitor S/N</th>
              <th>IP Address</th>
              <th>Email ID</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['department']) ?></td>
                <td><?= htmlspecialchars($row['device_type']) ?></td>
                <td><?= htmlspecialchars($row['employee_id']) ?></td>
                <td><?= htmlspecialchars($row['monitor_serial_number']) ?></td>
                <td><?= htmlspecialchars($row['ip_address']) ?></td>
                <td><?= htmlspecialchars($row['email_id']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">No results found for “<?= htmlspecialchars($search) ?>”.</div>
    <?php endif; ?>
  <?php endif; ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

  const searchBox = document.getElementById("searchBox");
   const resultDiv = document.getElementById("result");

   searchBox.addEventListener("ketup",function(){
    let query = this.value;
    if(query>0){
      fetch("ajax_search.php?q=" + query )
      .then(res => res.text())
      .then(data => {
        resultDiv.innerHTML = data;
        resultDiv.style.display = "block";
      
      })
      
    }else{
      resultDiv.style.display = "none";
    }
   });

   //row click -value set in input
   function fillSearch(ip,name){
    searchBox.value=ip+ " - " + name;
    resultDiv.style.display = "none";
   }

  </script>
</body>
</html>
