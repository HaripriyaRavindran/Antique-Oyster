<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Jewelry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--For login-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" /> 
    <title>Login</title>
    
    

    <link href="css/font-awesome.css" rel="stylesheet">  
    <script src="js/jquery-3.5.1.min.js"></script>   
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <link rel="stylesheet" href="css/login.css">-->
    <!-- <link rel="stylesheet" href="css/check.css">  -->
    <!---->
  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/font/style.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	
	<link href="css/font-awesome.css" rel="stylesheet">     
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" >

	

	
  </head>
  <body>
	
    <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><b>Antique Oyster</b></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item active"><a href="moreproducts.php" class="nav-link">Collections</a></li>			      
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
            
            <style>
            .imgprofile {
              height : 30px;
              width: 30px;
              border-radius: 50%;
            }
            </style>
            <?php
              // if (isset($_COOKIE["user_login"]) && isset($_COOKIE["user_password"])) {
              //   $_SESSION["name"]= $_COOKIE["user_login"];
              // }
                    
              //   if (isset($_SESSION["name"])) 
              //   { 
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="imgprofile" src="images/profile.png" >&nbsp;Hello, <?php echo $_SESSION["name"]?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="myprofile.php"><i class="fa fa-user  fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a>
                    <a class="dropdown-item" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Cart</a>
                    <a class="dropdown-item" href="logout.php">&nbsp;&nbsp;LOGOUT</a>
                  </div>
                </li>
              <?php
                // } 
                // elseif (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="imgprofile" src="images/profile.png" >&nbsp;Hello, <?php echo $_SESSION["name"]?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="myprofile.php">My Profile</a>
                    <a class="dropdown-item" href="cart.php">Cart</a>
                    <a class="dropdown-item" href="logout.php">LOGOUT</a>
                  </div>
                </li>
              <?php
                // }        
                // else {
              ?>
                  <li class="nav-item active"><a href="loginform.php" class="nav-link">Log In</a></li>
			      
              <?php
                // }
              ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    END nav -->

  <link rel="stylesheet" href="css/nav.css">     

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

  <header> 
		<nav>
    <div id="menu" class="menu-icon">
        <div class="ham" onclick="ham(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
			</div>
			<div class="navlogo">
				ANTIQUE OYSTER
			</div>
			<div class="menu">
				<ul id="navid">
					<li class="one-edge-shadow"><a href="index.php"><i class="f fa fa-home fa-1x"></i>Home</a></li>
					<li class="one-edge-shadow"><a href="moreproducts.php"><i class="f fa fa-sun-o" aria-hidden="true"></i>Collections</a></li>
					<li class="one-edge-shadow"><a href="about.php"><i class="f fa fa-address-card" aria-hidden="true"></i>About Us</a></li>
					<li class="one-edge-shadow"><a href="contact.php"><i class="f fa fa-phone" aria-hidden="true"></i>Contact Us</a></li>
					<li class="one-edge-shadow"><a href="cart.php"><i class="f fa fa-cart-plus" aria-hidden="true"></i>Cart [<span id="cartno">
          <?php
          include "database.php";
            if (isset($_SESSION["name"]) && isset($_SESSION["userid"]))
            {
              $userid=$_SESSION["userid"];
              $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE `userid` = '$userid' ");
              if(mysqli_num_rows($result)>0){	
              $cartno= mysqli_num_rows($result);	
              echo mysqli_num_rows($result);
              }
              else{
                echo "0";
              }
            }
          ?>
        </span>]</a></li>

          <style>
            .imgprofile {
              height : 30px;
              width: 30px;
              border-radius: 50%;
            }
          </style>

            <?php
              if (isset($_COOKIE["user_login"]) && isset($_COOKIE["user_password"])) {
                $_SESSION["name"]= $_COOKIE["user_login"];
              }
                    
                if (isset($_SESSION["name"])) 
                { 
            ?>
                  <li class="one-edge-shadow">
                    <div class="dropdownn">
                      <a class="dropbutton"><img class="imgprofile" src="images/profile.png" >&nbsp;Hello, <?php echo $_SESSION["name"]?>
                        <i class="fa fa-caret-down"></i>
                      </a>
                      <div class="dropdown-contentt">
                        <a href="myprofile.php">My Profile</a>
                        <a href="tracking.php">Order History</a>
                        <a href="cart.php">Cart</a>
                        <a href="logout.php">Logout</a>
                      </div>
                    </div> 
                  </li>
            <?php
              } 
              elseif (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
            ?>
                  <li class="one-edge-shadow">
                    <div class="dropdownn">
                      <a class="dropbutton"><img class="imgprofile" src="images/profile.png" >&nbsp;Hello, <?php echo $_SESSION["name"]?>
                        <i class="fa fa-caret-down"></i>
                      </a>
                      <div class="dropdown-contentt">
                        <a href="myprofile.php">My Profile</a>
                        <a href="tracking.php">Order History</a>
                        <a href="cart.php">Cart</a>
                        <a href="logout.php">Logout</a>
                      </div>
                    </div> 
                  </li>
            <?php
              }        
              else {
            ?>
                  <li class="one-edge-shadow"><a href="loginform.php"><i class="f fa fa-user" aria-hidden="true"></i>Login</a></li>
            <?php
              }
            ?>
				</ul>
			</div>
		</nav>
  </header> 
	
	<script>
		 $(document).ready(function() {
            $(".ham").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
                  $(".menu-icon").addClass("black");
                  
            }

            else {
                  $('nav').removeClass('black');
                  $(".menu-icon").removeClass("black")
            }
      });

      // ham
      function ham(x) {
        x.classList.toggle("change");
      }
    </script>
    
