<?php
error_reporting(0);
session_start();
// $pass_err
if(!isset($_SESSION['user_id']))
{
    header("location:forget_password.php");
}else{
    include 'connection.php';
    $user_id=$_SESSION['user_id'];
    // echo $user_id;
    $query="select * from user_data where user_id='$user_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $password1=$row['password'];
    $error=1;
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        if(empty($_POST['password'])){    
        $password_error = "Password cannot be blank";  
        $error=0;
    }
    if($_POST['password'] != $_POST['cpassword']){
        $cpassword_error = "Passwords do not match";
        $error=0;
    }
    if($_POST['password'] == $password1){
        $password_error = "Old Password Cannot Be The Same As New Password"; 
        $error=0;
    }

    if($error){
        $query="update user_data set password = '$password' where user_id='$user_id'";
        $result=mysqli_query($conn,$query);
        if($result){
            header("location:logout.php");
        }else{
            echo "Unable to Update Password";
        }
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
    <style>.error{color:red;}</style>

    <title>E-commerce Website</title>
</head>

<body>
    <!-- <section class="nb">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm bg-light navbar-light">
                Brand/logo
                <div class="navbar-brand">
                    <img src="logo/logo">
                </div>
                <div class="navbar-nav" style="margin: auto;margin-right: 33px;">
                    <div class="nav-item">
                        <button type="button" class="btn mt-3"><a href="login.php">Login</a></button>
                    </div>
                </div>
            </nav>
        </div>
    </section> -->
    <section class="first">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if ($form_error) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please Fill The Form</strong> You have not filled all the required fields.
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
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Registration Succussfully Done</strong> Please Choose Another One
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
                    }
                    ?>
                    <form action="reset_password.php" method="post" autocomplete="off"  >
                        <div class="sign-up">
                            <h5>Reset Password</h5>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <input type="text" class="form-control" placeholder="password" value="<?=$password1;?>" id="password" readonly >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control" name="password" placeholder="New Password"
                                        id="password">
                                        <span class="error"> <?php echo $password_error; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control" name="cpassword"
                                        placeholder="Confirm-password" id="confirm_password">
                                        <span class="error"><?php echo $cpassword_error; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" name="save" id="save" value="Reset" class="btn mt-3">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class=" foter bg-body-tertiary text-center" id="Contact">
        <!-- Grid container -->
        <div class="container-fluid p-0">
            <!-- Section: Social media -->
            <section class="foterone mb-4">
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i
        ></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i
        ></a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i
        ></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i
        ></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i
        ></a>

                <!-- Github -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i
        ></a>
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
                                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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