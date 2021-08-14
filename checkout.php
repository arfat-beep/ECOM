<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include("db.php");
    include("functions/functions.php");
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce with php</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha512-4uGZHpbDliNxiAv/QzZNo/yb2FtAX+qiDb7ypBWiEdJQX8Pugp8M6il5SRkN8jQrDLWsh3rrPDSXRf3DwFYM6g==" crossorigin="anonymous" />

</head>

<body>

    <div id="top">
        <!-- top starts -->
        <div class="container">
            <!--container starts -->
            <div class="col-md-6 offer">
                <!-- col-md-6 offer starts -->
                <a href="#" class="btn btn-success btn-sm">
                    <?php 
                        if(!isset($_SESSION['customer_email'])){
                            echo "Welcome : Guest";
                        }
                        else{
                            echo "Welcome : ". $_SESSION['customer_email'];
                        }
                    ?>
                </a>
                <a href="#" class="btn btn-sucess btn-sm">Shopping Cart Totla Price: <?php total_price(); ?>, Total Items <?php items(); ?></a>
            </div>
            <!-- col-md-6 offer ends -->
            <div class="col-md-6">
                <!-- col-md-6 start -->
                <ul class="menu">
                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>

                    <li>
                    <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }
                            else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <?php

                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>Login</a>";
                            }
                            else{
                                echo "<a href='logout.php'>Logout</a>";
                                
                            }
?>
                    </li>

                </ul>
            </div><!-- col-md-6 ends -->
        </div>
        <!--container ends -->





    </div>
    <!-- top ends -->

    <div class="navbar navbar-default" id="navbar">
        <!-- navbar navbar-default starts-->
        <div class="container">
            <!-- container start -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="img/arfat-logo.png" alt="Arfatur-Rahman-logo" class="hidden-xs">
                    <img src="img/arfat-logo.png" alt="Arfatur-Rahman-logo" class="visible-xs">

                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class=""><a href="shop.php">Shop</a></li>
                        <li class="">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }
                            else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li class=""><a href="cart.php">Shopping Cart</a></li>
                        <li class=""><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items in cart</span>

                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form action="results.php" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="text" placeholder="Search" name="user_query" required class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container end -->
    </div>
    <!-- navbar navbar-default ends -->
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <?php
                    if(!isset($_SESSION['customer_email'])){
                        include("customer/customer_login.php");
                    }
                    else{
                        include("payment_options.php");
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer 
 -->
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>