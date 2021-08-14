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
    <link rel="stylesheet" href="styles/styled.css">
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
                <a href="#" class="btn btn-sucess btn-sm">Shopping Cart Totla Price: <?php total_price(); ?>, Total Items <?php items() ?></a>
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
                        <li class="active"><a href="cart.php">Shopping Cart</a></li>
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
                    <li>Cart</li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php"cnctype="multipart-form-data" method="post">
                        <h1>Shopping Cart</h1>
                        <?php
                            $ip_add = getRealUserIp();
                            $select_cart = "SELECT * from cart where ip_add = '$ip_add'";
                            $run_cart = mysqli_query($db, $select_cart) or die("hell");
                            $count = mysqli_num_rows($run_cart);
                        ?>
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            $pro_id = $row_cart['p_id'];
                                            $pro_size = $row_cart['size'];
                                            $pro_qty = $row_cart['qty'];

                                            $get_products = "SELECT * from products where product_id = '$pro_id'";
                                            $run_products = mysqli_query($con, $get_products);

                                            while($row_products = mysqli_fetch_array($run_products)){
                                                $product_title = $row_products['product_title'];
                                                $product_img1 = $row_products['product_img1'];
                                                $only_price = $row_products['product_price'];
                                                $sub_total = $row_products['product_price'] * $pro_qty;

                                                $total += $sub_total;
                                            
                                        
                                    ?>
                                    <tr>
                                        <td><img class="" src="admin_area/product_img/<?php echo $product_img1; ?>" alt=""></td>
                                        <td>
                                            <a href="#"><?php echo $product_title; ?></a>
                                        </td>
                                        <td><?php echo $pro_qty; ?></td>
                                        <td>$<?php echo $only_price; ?></td>
                                        <td><?php echo $pro_size; ?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                        <td>$<?php echo $sub_total; ?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">$<?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"> Continue Shopping</i></a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-default" name="update" value="update">
                                    <i class="fa fa-refresh"></i> Update Cart
                                    <!-- update cart dynamic(cart.php/update_cart()) -->
                                </button>
                                <a href="checkout.php" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- This is for update cart button -->
                <?php
                    function update_cart(){
                        global $con;
                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                print_r($remove_id);
                                $delete_products = "DELETE from cart where p_id=$remove_id";
                                $run_delete = mysqli_query($con, $delete_products);
                                
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self');</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
                ?>


                <div  class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You also like these Products</h3>
                        </div>
                    </div>
                    
                    <?php
                        $get_products = "SELECT * from products order by rand() limit 0,3";
                        $run_products = mysqli_query($con, $get_products);
                        while($row_products = mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];

                            echo "
                                <div class='center-responsive col-md-3 col-sm-6'>
                                    <div class='product same-height'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area//product_img/$pro_img1' class='img-responsive' >
                                        </a>
                                        <div class='text'>
                                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                            <p class='price'><strong>$$pro_price</strong></p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    <p class="text-muted"></p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <th>$<?php echo $total; ?></th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>$0.00</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>$0.00</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>$$<?php echo $total; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- footer -->
    <?php
    include("includes/footer.php");
    ?>