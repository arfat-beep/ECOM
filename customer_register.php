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
                    <li>Register</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Register a new account</h2>
                            </center>
                    </div>
                    <form action="customer_register.php" enctype="multipart/form-data" method="post">
                        <div class="form-gorup">
                            <label for="">Customer Name</label>
                            <input type="text" name="c_name" id="" class="form-control" required>

                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Email</label>
                            <input type="text" name="c_email" id="" class="form-control" required>
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Password</label>
                            <input type="password" name="c_pass" id="" class="form-control" required>
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Country</label>
                            <input type="text" name="c_country" id="" class="form-control" required>
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer City</label>
                            <input type="text" name="c_city" id="" class="form-control" required>
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Contact</label>
                            <input type="text" name="c_contact" id="" class="form-control" required>
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Address</label>
                            <input type="text" name="c_address" id="" class="form-control" required>
                        </div>
                        
                        <div class="form-gorup">
                            <label for="">Customer Image</label>
                            <input type="file" name="c_image" id="" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button name="register" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </form>
                </div>
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
<?php
    if(isset($_POST['register'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_ip = getRealUserIp();
        

        move_uploaded_file($c_image_tmp, "customer/img/$c_image");

        $insert_customer = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`)
                                            VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
        $run_customer = mysqli_query($db, $insert_customer);

        $sel_cart ="SELECT * from cart where ip_add='$c_ip'";
        $run_cart =mysqli_query($db, $sel_cart) or die("heelll");
        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart > 0){
            $_SESSION['customer_email'] = $c_email;
            
            echo "<script>alert('You have been Registered Successfully');</script>";
            echo "<script>window.open('checkout.php','_self');</script>";
        }
        else{
            $_SESSION['customer_email'] = $c_email;
            
            echo "<script>alert('You have been Registered Successfully');</script>";
            echo "<script>window.open('index.php','_self');</script>";
        }
    }
?>