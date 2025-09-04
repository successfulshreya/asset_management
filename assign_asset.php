<?php
include 'config/config.php';
include 'app/logs/assignment_log.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $asset_id =$_POST['asset_id'];
    $assigned_to= $_POST['assigned_to'];
    $remark = $_POST['remark'];

// step 1 is to update returened date for current active assignment of this asset
$update_query = "UPDATE asset_assignments 
                 SET returned_date= NOW(), status ='Returned'
                 WHERE asset_id = '$asset_id' AND status = 'Active' ";
                 mysqli_query($conn,$update_query);
    
    $query ="INSERT INTO asset_assignments (asset_id ,assigned_to, remark)
             VALUES('$asset_id','$assigned_to','$remark')";

    if(mysqli_query($conn, $query)){
        
    if($result){
        header("Location:http://localhost:8080/AMSseml/app/logs/assignment_log.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($conn);
    }
  }
  //  2. UPDATE master data
  
    // 3. Build the UPDATE query 
    $query = "UPDATE assets SET
        user_name = '" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
        user_name = '" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
        employee_id = '" . mysqli_real_escape_string($conn, $_POST['employee_id']) . "'
          WHERE id = '$id_safe'";  
          mysqli_query($conn, $query) or die("Update failed: " . mysqli_error($conn)); 
    // if (mysqli_query($conn,$queryy)) {
    //     echo "Asset assigned and master data updated successfully.";
    // } else { 
    //     echo "Something went wrong.";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  background: #e9ecef;
  font-family: 'Open Sans', sans-serif;
}
.form-container {
  width: 360px;
  margin: 2em auto;
  padding: 1.5em;
 align-content: center;

  background: #fff;
  border-radius: 7.9px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.35);
}
.form-container label {
  display: block;
  margin-bottom: 0.5em;

  color: #333;
}
.form-container input[type="text"] {
  width: 100%;
  padding: 0.75em;
  margin-bottom: 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.form-container input[type="text"]:focus {
  border-color: #007bff;
  outline: none;
}
.form-container button {
  width: 100%;
  padding: 0.8em;
  background: #007bff;
  color: #fff;
  border: none;
  font-weight: bold;
  border-radius: 4px;
}
.form-container button:hover {
  background: #0056b3;
}
</style>
<body>
<h2 style="display: flex; justify-content:center; ">Assign Asset</h2>
<div class="form-container">
  <form method="POST" action="assign_asset.php">
    <label for="asset_id">Asset ID:</label>
    <input type="text" name="asset_id" id="asset_id" required>

    <label for="assigned_to">Assigned to:</label>
    <input type="text" name="assigned_to" id="assigned_to" required>

    <label for="remark">Remarks:</label>
    <input type="text" name="remark" id="remark">

    <button type="submit">Assign Asset</button>
  </form>
</div>
</body>
</html>