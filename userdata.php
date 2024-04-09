<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:login.php");
}
$a = $_SESSION['user_name'];




?>

<?php
error_reporting(0);
$error = 1;
$email_error = "";
$phone_error = "";
$password_error = "";
$cpassword_error = "";
$name_error = "";
$form_error = 0;
$sucess = 0;
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $name_error = "Name cannot be blank";
    } else if ((strlen($_POST['name'])) < 2) {
        $name_error = "Name Length must be greater than or equal to 2 characters.";
        $error = 0;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z' ]*$/", $name)) {
            $name_error = "Only alphabets and whitespace are allowed.";
            $error = 0;
        }
    }
    if (empty($_POST['email'])) {
        $email_error = "Email cannot be blank";
    }
    if (empty($_POST['phone'])) {
        $phone_error = "Phone number cannot be blank";
    } else {
        $mobileno = $_POST["phone"];
        if (!preg_match("/^[0-9]*$/", $mobileno)) {
            $phone_error = "Only numeric value is allowed.";
            $error = 0;
        }
        if (strlen($mobileno) != 10) {
            $phone_error = "Mobile no must contain 10 digits.";
            $error = 0;
        }
    }
    if (empty($_POST['password'])) {
        $password_error = "Password cannot be blank";
    }
    if ($_POST['password'] != $_POST['confirm_password']) {
        $cpassword_error = "Passwords do not match";
        $error = 0;
    }
    if ($error) {
        include 'connection.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if ($name != "" && $password != "" && $email != "" && $phone != "") {

            $query = "select * from user_data where (email='$email' or phone='$phone') and user_name<>'$a' ";

            $result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $user = 1;
                $phonev = 1;
            } else {
                // $query = "insert into user_data(user_name,password,email,phone)values ('$name', '$password','$email','$phone')";
                $query = "update user_data set user_name='$name' , email='$email' , password='$password' , phone='$phone' where user_id='$id' ";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "not completed";
                    die(mysqli_error($conn));
                } else {
                    echo '<script> confirm("Updation Successfull"); </script>';
                    $sucess = 1;
                }
            }
        } else {
            $form_error = 1;
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/signup_style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style>
        .error {
            color: red;
        }
    </style>

    <title>E-commerce Website</title>
</head>

<body>
    <section class="nb">
        <div class="container-fluid p-0">
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
                            <a class="nav-link" href="#Contact">Contact US </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Hello !
                                <?= $_SESSION['user_name'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <section class="first">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if ($form_error) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please Fill The Form</strong> You Cannot Change Details To Blank.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
                    }
                    if ($user) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Email or Mobile No. Already Exist</strong> Please Choose Another One
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
                    }
                    if ($sucess) {

                        header("location:logout.php");
                    }
                    ?>
                    <?php
                    include ("connection.php");
                    $x = $_SESSION['user_name'];
                    $query = "select * from user_data where user_name = '$x' ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    // print_r($row);
                    ?>
                    <form action="userdata.php" method="post" autocomplete="off">
                        <div class="sign-up">
                            <h5>Updation</h5>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Name"></label>
                                    <input type="hidden" class="form-control" placeholder="Name" name="id" id="id"
                                        value="<?= $row['user_id']; ?>">
                                    <span class="error">
                                        <?php echo $name_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Name"></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="Name"
                                        value="<?= $row['user_name']; ?>">
                                    <span class="error">
                                        <?php echo $name_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Email Address"></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                                        id="Email Address" value="<?= $row['email']; ?>">
                                    <span class="error">
                                        <?php echo $email_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Mobile no."></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Mobile no."
                                        id="Mobile no." value="<?= $row['phone']; ?>">
                                    <span class="error">
                                        <?php echo $phone_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control" name="password" placeholder="password"
                                        id="password" value="<?= $row['password']; ?>">
                                    <span class="error">
                                        <?php echo $password_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        placeholder="Confirm-password" id="confirm_password"
                                        value="<?= $row['password']; ?>">
                                    <span class="error">
                                        <?php echo $cpassword_error; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="check" id="agreement" name="check" required> I
                                        accept the
                                        terms of Use & Privacy Policy
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" name="save" id="save" value="Update" class="btn mt-3"
                                        onclick="alert('updation succesfull');">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- Footer -->
    <footer class=" foter bg-body-tertiary text-center" id="Contact">
        <!-- Grid container -->
        <div class="container-fluid p-0">
            <!-- Section: Social media -->
            <section class="foterone mb-4">
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->

            <section class="fotertwo">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>Company name
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit
                                amet, consectetur adipisicing elit.
                            </p>
                        </div>


                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">laptops</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Mobiles</a>
                            </p>


                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Settings</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> INDORE, NY 10012, IN</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i> info@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 91 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 91 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2024 Copyright:
                <a class="text-reset fw-bold" href="#">products.com</a>
            </div>
            <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="quick-link">
                        <h4>Quick link</h4>
                        <ul class="list-unstyled">
                            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Contact us </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> T & C </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Privacy Policy </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social">
                        <h4> Follow Us </h4>
                        <a href="facebook"><i class="fa-brands fa-facebook"></i></a>
                        <a href="facebook"><i class="fa-brands fa-google"></i></a>
                        <a href="facebook"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>

</html>