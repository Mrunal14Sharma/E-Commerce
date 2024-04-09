<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}


?>

<?php

$connect = mysqli_connect("localhost", "root", "", "ecommerce") or die("Unable to make connection");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $qty = 1;

    $q = "select id from cartsystem where id={$id}";
    $res = mysqli_query($connect, $q);
    $r = mysqli_fetch_array($res);
    if (!$r) {
        $sql = "INSERT INTO cartsystem(id,name,price,image,qty,tprice) values ('{$id}','{$name}','{$price}','{$image}','{$qty}','{$price}')";

        mysqli_query($connect, $sql);

        echo 0;
    }
    else{
        echo 1;
    }

}
?>