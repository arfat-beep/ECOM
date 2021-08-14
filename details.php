<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include("db.php");
    include("functions/functions.php");
    ?>
    <?php
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            $get_product = "SELECT * from products where product_id = '$product_id'";
            $run_product = mysqli_query($con, $get_product);
            $row_product = mysqli_fetch_array($run_product) or die("heelll");
            
            $p_cat_id = $row_product['p_cat_id'];
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_desc = $row_product['product_desc'];
            $pro_img1 = $row_product['product_img1'];
            $pro_img2 = $row_product['product_img2'];
            $pro_img3 = $row_product['product_img3'];
            
            $get_p_cat = "SELECT * from product_categories where p_cat_id = '$p_cat_id'";
            $run_p_cat = mysqli_query($con, $get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];

        }
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
                        <li class=""><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Shop</a></li>
                        <li class=""><?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }
                            else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?></li>
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
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
                    <li><?php echo $pro_title; ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_img/<?php echo $pro_img1; ?>" alt="">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_img/<?php echo $pro_img2; ?>" alt="">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_img/<?php echo $pro_img3; ?>" alt="">
                                        </center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $pro_title; ?></h1>
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Product Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option value="0" disabled>Select Quantity</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Product size</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control">
                                            <option value="0" disabled>Select a size</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price">$<?php echo $pro_price; ?></p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                    </button>
                                </p>

                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_img/<?php echo $pro_img1; ?>" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_img/<?php echo $pro_img2; ?>" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_img/<?php echo $pro_img3; ?>" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <p>
                    <h4>Product Details</h4>
                    <p>
                        <?php echo $pro_desc; ?>
                    </p>
                    <h4>Size</h4>
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>
                    </p>
                    <hr>
                </div>
                <div class="" id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You also like these Products</h3>
                        </div>
                    </div>
                    
                    
                    <?php
                        $get_products = "SELECT * from products order by rand() limit 2,2";
                        $run_products = mysqli_query($con,$get_products);
                        while ($row_products =mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['product_id'];
                            // $pro_title = $row_products['product_title'];
                            if(strlen($row_products['product_title'])>= 30){
                                $pro_title = substr($row_products['product_title'],0,30). "...";
                            }
                            else{
                                $pro_title =$row_products['product_title'];
                            }
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];
                            echo "
                            <div class='center-responsive col-md-4 col-sm-6'>
                            <div class='product same-height'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img src='admin_area/product_img/$pro_img1' class='img-responsive' alt='>
                                </a>
                                <div class='text text-center'>
                                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                    <h2 class='price' align='center'>\$$pro_price</p>
                                    <p class='buttons'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'> <i class='fa fa-shopping-cart'></i> Add to cart </a>
                        </p>
                                </div>
                            </div>
                        </div>
                            ";
                        }

                    ?>

                </div>

            </div>
        </div>
    </div>

    <!-- footer 
 -->
    <?php
    include("includes/footer.php");
    ?>