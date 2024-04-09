<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}


?>

<?php 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "ecommerce") or die("Error");

    $sql = "delete from cartsystem where uid={$id}";

    $result = mysqli_query($conn, $sql) or die("Error");

    header("location:cart.php");
}
if (isset($_GET['clear'])) {
    $conn = mysqli_connect("localhost", "root", "", "ecommerce") or die("Error");

    $sql = "delete from cartsystem";

    $result = mysqli_query($conn, $sql) or die("Error");

    header("location:cart.php");
}

?>