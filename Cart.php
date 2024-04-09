<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">XYZ Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart active"></i>Cart <span
                            class="badge badge-danger" id="cart-item"><i></i></span></a>
                </li>
            </ul>
        </div>
    </nav> -->

    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">XYZ Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                            <a class="nav-link" href="homepage.php">Home </a>
                        </li>

                <li class="nav-item">
                    <a class="nav-link" href="Cart.php">Your Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Contact">Contact US </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Hello !
                        <?= $_SESSION['user_name'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="userdata.php">User Info.</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>



            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-center text-info m-0">Products in your cart</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>
                                    <a href="delete.php?clear=all" class="badge-danger badge p-1"
                                        onclick="return confirm('Are You Sure')">Remove Product</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $connect = mysqli_connect("localhost", "root", "", "ecommerce") or die("Unable to make connection");
                            $sql = "select *from cartsystem";
                            $result = mysqli_query($connect, $sql) or die("Error");
                            $total = 0;

                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <tr>
                                    <input type="hidden" class="uid" value="<?= $row['id'] ?>">
                                    <td><img src="<?= $row['image'] ?>" width="50"></td>
                                    <td>
                                        <?= $row['name'] ?>
                                    </td>
                                    <td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>"
                                            style="width: 75px;"></td>
                                    <td>
                                        <?= $row['price'] ?>
                                    </td>
                                    <input type="hidden" class="price" value="<?= $row['price'] ?>">
                                    <td>
                                        <?= $row['tprice'] ?>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?= $row['uid'] ?>" class="badge-danger badge p-1"
                                            onclick="return confirm('Are You Sure')">Remove</a>
                                    </td>
                                </tr>
                                <?php $total = $total + $row['tprice']; ?>
                            <?php } ?>
                            <tr>
                                <td colspan="2">
                                    <a href="homepage.php" class="btn btn-success">Continue shopping</a>
                                </td>
                                <td colspan="2"><b>Grand Total</b></td>
                                <td>Rs:
                                    <?= $total ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="jquery-3.7.1.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".itemQty").on('change', function () {
                var $el = $(this).closest("tr");
                var id = $el.find(".uid").val();
                var price = $el.find(".price").val();
                var qty = $el.find(".itemQty").val();
                location.reload(true);
                $.ajax({
                    type: "post",
                    url: "update.php",
                    cache: false,
                    data: {
                        qty: qty,
                        uid: id,
                        price: price
                    },
                    success: function (response) {
                        console.log(qty);
                        console.log(response);
                    }
                });

            });
        });
    </script>



</body>

</html>