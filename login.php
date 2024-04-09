<?php
error_reporting(0);
$login=0;
$invalid=0;
$error=0;
$pass_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    include 'connection.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($password) || !empty($email)){
        if(!empty($password)){
            $query="select * from user_data where email='$email' and password='$password'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        $user_name=$row['user_name'];
        
        $num=mysqli_num_rows($result);
        
        if($num>0){
        $login=1;
        session_start();
        $_SESSION["user_name"] = "$user_name";
        header("Location:homepage.php"); 
        }else{
        $invalid=1;
        }  
    }else{
        $pass_err = "Password cannot be blank";
    }          
    }
    else{
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
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style>.error{color:red;}</style>
    <title>E-commerce Website</title>
</head>

<body>
    <section class="nb">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm bg-light navbar-light">
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
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid Credential </strong> Please Enter a valid Email or  Password.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Login Sucessfull</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Email or Password Cannot be blank</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
?>
                    <form action="login.php" method="post" autocomplete="off" >
                        <div class="login">
                            <h5>login</h5>
                            <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="error"><?=$pass_err;?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn mt-3">Login</button>
                                </div>
                            </form>
                            </div>
                            <div class="forget-password">
                                <a href="forget_password.php">Forget Password</a>
                            </div>
                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>

</html>