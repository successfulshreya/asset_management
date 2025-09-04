<?php
session_start();

//agar already login hai to dashboard bhej do 
// if (isset($_SESSION['username'])){
//   header("location:dashboard.php");
//   exit();
// }
include('./config/config.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row= mysqli_fetch_assoc($result);

    // if(mysqli_num_rows($result) == 1){
    if($row){
        $_SESSION['username']= $row['username'];
         $_SESSION['role']= $row['role'];
          // $_SESSION['username']= $row['username'];
          $_SESSION['id']= $row['id'];
        header("Location: ./dashboard.php"); 
        exit();
    }else{
        $error = "invalid username or password!. please try again";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form for admin </title>
<style>
*,
*::before,
*::after {
  box-sizing: border-box;
}

:root {
  --bg-gradient-a: #f7f9fc;
  --bg-gradient-b: #e1ecf5;
  --form-bg      : #fff;
  --accent       : #2a6590; /* navy-teal accent */
  --input-placeholder: #888;
}

html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  background: linear-gradient(135deg, var(--bg-gradient-a), var(--bg-gradient-b));
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

h2 {
  margin: 0 0 1rem;
  font-size: 1.6rem;
  color: var(--accent);
  text-align: center;
}

.adminbox {
  background: var(--form-bg);
  padding: 2rem;
  width: 100%;
  max-width: 360px;
  border-radius: 12px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.adminbox form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

input {
  padding: 0.75rem 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input::placeholder {
  color: var(--input-placeholder);
}

input:hover {
  border-color: var(--accent);
}

input:focus {
  outline: none;
  border-color: var(--accent);
  box-shadow: 0 0 0 3px rgba(42, 101, 144, 0.3);
}

button[type="submit"] {
  padding: 0.75rem;
  border: none;
  border-radius: 6px;
  background-color: var(--accent);
  color: #fff;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #1e4a70;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(42, 101, 144, 0.4);
}

.error {
  font-size: 0.95rem;
  color: #d32f2f;
  min-height: 1.2em;
  text-align: center;
}

@media (max-width: 400px) {
  .adminbox {
    padding: 1.5rem;
    border-radius: 8px;
  }
  input, button {
    font-size: 0.95rem;
  }
}


</style>
</head>
<body>
       <h2> ADMIN LOGIN</h2>
    <div class="adminbox">
    <form method="post" ACTION="">
         <input type="text" name="username" placeholder="enter username" required><br><br>
         <input type="password" name="password" placeholder="enter your password" required><br><BR>
         <button type="submit" name="submit">Login</button>
    </form>
    <p class="error"><?php echo $error; ?></p>
</div>
</body>
</html>