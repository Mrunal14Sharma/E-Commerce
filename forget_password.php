<?php 
error_reporting(0);
$phone_error="";
$error=0;
$error_con=0;
if($_SERVER['REQUEST_METHOD']== 'POST'){
    include('connection.php');
    $email=$_POST['email'];
    $phone=$_POST['phone'];   
            if (!preg_match ("/^[0-9]*$/",$phone) ) {  
            $phone_error = "Only numeric value is allowed.";  
            }  
            else if (strlen ($phone) != 10) {  
            $phone_error = "Mobile no must contain 10 digits.";  
            }else if(!empty($email) && !empty($phone)){
        $query="select * from user_data where email='$email' and phone='$phone'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        $user_id=$row['user_id'];
        // echo $user_id;
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION["user_id"] = "$user_id";
            header("Location:reset_password.php");
        }else{
            $error_con=1;
        }
    }else{
        $error=1;
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
    <link rel="stylesheet" type="text/css" href="css/forget_style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <style>
        .error {
            color: red;
        }
    </style>
    <title>E-commerce Website</title>
</head>

<body>
    <section class="nb">
        <div class="container-fluid p-0 ">
            <nav class="navbar navbar-expand-sm bg-light navbar-light  ">
                <!-- Brand/logo -->
                <div class="navbar-brand">
                    <img src="logo/logo">
                </div>
                <div class="navbar-nav" style="margin: auto;margin-right: 33px;">
                    <div class="nav-item">
                        <button type="button" class="btn mt-3"><a href="signup.php">Signup</a></button>
                    </div>
                </div>
            </nav>

        </div>
    </section>

    <section class="first">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                    if($error){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email or Phone Number Cannot be blank</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                    if($error_con){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email or Phone Number Does not Match</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                    ?>
                <form action="forget_password.php" method="post">
                <div class="forget-password">
                        <h5>Forget Password</h5>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email"  >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="phone number 2" class="form-control" placeholder="Phone Number" name="phone" id="phone no.">
                                <span class="error" ><?php echo $phone_error; ?></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                            <span><small><i>Email And Phone Number Must be same as registered one.</i></small></span>
                                <button type="submit" class="btn mt-3">Reset Password </button>
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
                        <a href="https://www.facebook.com/login/" target="blank" ><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.twitter.com/login/" target="blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com" target="blank"><i class="fa-brands fa-instagram"></i></a>
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