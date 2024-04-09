<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}


?>

<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ecommerce';

$conn=mysqli_connect($hostname,$username,$password,$database);  

if(! $conn ) {
    die("Connection Failed: ". mysqli_error($conn));
}

?>