<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}


?>

<?php 

if(isset($_POST['qty'])){
    $qty=$_POST['qty'];
    $id=$_POST['uid'];
    $price=$_POST['price'];

    $tprice=$qty*$price;

    $conn = mysqli_connect("localhost", "root", "", "ecommerce") or die("Error");

    $sql = "update cartsystem set qty='{$qty}', tprice='{$tprice}' where id='{$id}'";

    $result = mysqli_query($conn, $sql) or die("Error");

}


?>