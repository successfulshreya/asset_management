<?php
$host = "localhost";
$user="root";
$password="";
$dbname="assets_db";

//db connection
$conn= mysqli_connect($host,$user,$password,$dbname);
// check connection
if(!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
?>