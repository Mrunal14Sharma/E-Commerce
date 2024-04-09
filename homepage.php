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
  <title>Shopping Cart System</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">XYZ Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="#laptophead">laptops</a></li>
            <li><a class="dropdown-item" href="#Mobilehead">Mobiles</a></li>
          </ul>
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
            Hello ! <?=$_SESSION['user_name']?>
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
    <div class="message"></div>
    <div class="laptophead" id="laptophead">
      <h1>laptops</h1>
    </div>
    <div class="row mt-2 pb-3">
      <?php
      $connect = mysqli_connect("localhost", "root", "", "ecommerce") or die("Unable to make connection");
      $sql = "select *from laptops";
      $result = mysqli_query($connect, $sql) or die("Error");
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-3">
          <div class="card-deck">
            <div class="card p-2 border-secondary mb-2">
              <img src="<?= $row['image'] ?>" class="card-img-top" height="250">
              <div class="card-body p1">
                <h4 class="card-title text-center text-info">
                  <?= $row['name'] ?>
                </h4>
                <h5 class="card-text text-center text-danger ">Rs.
                  <?= $row['price'] ?>/-
                </h5>
              </div>
              <div class="card-footer p-1">
                <form action="" class="form-submit">
                  <input type="hidden" class="pid" value="<?= $row['id']; ?>">
                  <input type="hidden" class="pname" value="<?= $row['name']; ?>">
                  <input type="hidden" class="pimage" value="<?= $row['image']; ?>">
                  <input type="hidden" class="pprice" value="<?= $row['price']; ?>">
                  <button class="btn btn-info btn-block addItemBtn">Add to Cart</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="container">
    <div class="laptophead" id="Mobilehead">
      <h1>Mobiles</h1>
    </div>
    <div class="row mt-2 pb-3">
      <?php
      $connect = mysqli_connect("localhost", "root", "", "ecommerce") or die("Unable to make connection");
      $sql = "select *from mobiles";
      $result = mysqli_query($connect, $sql) or die("Error");
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-3">
          <div class="card-deck">
            <div class="card p-2 border-secondary mb-2">
              <img src="<?= $row['image'] ?>" class="card-img-top" height="250">
              <div class="card-body p1">
                <h4 class="card-title text-center text-info">
                  <?= $row['name'] ?>
                </h4>
                <h5 class="card-text text-center text-danger ">Rs.
                  <?= $row['price'] ?>/-
                </h5>
              </div>
              <div class="card-footer p-1">
                <form action="" class="form-submit">
                  <input type="hidden" class="pid" value="<?= $row['id']; ?>">
                  <input type="hidden" class="pname" value="<?= $row['name']; ?>">
                  <input type="hidden" class="pimage" value="<?= $row['image']; ?>">
                  <input type="hidden" class="pprice" value="<?= $row['price']; ?>">
                  <button class="btn btn-info btn-block addItemBtn">Add to Cart</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class=" foter bg-body-tertiary text-center" id="Contact" style="background-color:#1c1a17; color: white;">
    <!-- Grid container -->
    <div class="container-fluid p-0">
      <!-- Section: Social media -->
      <section class="foterone mb-4">
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Facebook -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
          style="color: white;"><i class="fab fa-github"></i></a>
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
                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit.
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

  <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="jquery-3.7.1.js"></script>

  <script type="text/javascript">
        $(document).ready(function () {
            $(".addItemBtn").click(function (e) {
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var id = $form.find(".pid").val();
                var name = $form.find(".pname").val();
                var image = $form.find(".pimage").val();
                var price = $form.find(".pprice").val();
                var pcode = $form.find(".ppcode").val();

                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        id: id,
                        name: name,
                        image: image,
                        price: price,
                        pcode: pcode
                    },
                    success: function (response) {
                        if(response==false) {
                            alert("Added to cart successfully!");
                        } else {
                            alert("Product Already Added!");
                        }
                    }
                });
            });

        });
    </script>