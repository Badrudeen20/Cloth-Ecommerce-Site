<?php
session_start();
$server= "localhost";
$password = "";
$username="root";
$dbname = "clothing";

$conn = mysqli_connect($server,$username,$password,$dbname);
?>