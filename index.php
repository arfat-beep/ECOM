<!DOCTYPE html>
<?php
session_start();
include("db.php");
include("functions/functions.php");
?>
<html lang="en">

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
                <a href="cart.php" class="btn btn-sucess btn-sm">Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?></a>
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
    <div class="container" id="slider">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slider" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">

                    <?php
                    $get_slides = "SELECT * from slider LIMIT 1";
                    $run_slides = mysqli_query($con, $get_slides) or die("hell");
                    while ($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];

                        echo "
                        <div class='item active'>
                            <img src='admin_area/slides_img/$slide_image'>
                        </div>
                    ";
                    }
                    ?>

                    <?php
                    $get_slides = "SELECT * from slider";
                    $run_slides = mysqli_query($con, $get_slides) or die("hell");
                    while ($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];

                        echo "
                        <div class='item'>
                            <img src='admin_area/slides_img/$slide_image'>
                        </div>
                    ";
                    }
                    ?>
                </div>
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">next</span>
                </a>

            </div>
        </div>
    </div>

    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>

                        <h3><a href="#">We love our customers</a></h3>
                        <p>We are know to provide best possible service ever</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-tags"></i>
                        </div>

                        <h3><a href="#">Best prices</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, debitis!</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>

                        <h3><a href="#">100% Satisfaction guaranteed</a></h3>
                        <p> Quas vel similique voluptatem corporis distinctio nulla nam impedit numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2 class="text-center">Latest this week</h2>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container">
        <div class="row">
            <?php
            getPro();
            ?>
        </div>
    </div>
    <?php
    include("includes/footer.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>