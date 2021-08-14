<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"
        integrity="sha512-4uGZHpbDliNxiAv/QzZNo/yb2FtAX+qiDb7ypBWiEdJQX8Pugp8M6il5SRkN8jQrDLWsh3rrPDSXRf3DwFYM6g=="
        crossorigin="anonymous" />

</head>

<body>

    <div id="top">
        <!-- top starts -->
        <div class="container">
            <!--container starts -->
            <div class="col-md-6 offer">
                <!-- col-md-6 offer starts -->
                <a href="#" class="btn btn-success btn-sm">Welcome: guest</a>
                <a href="#" class="btn btn-sucess btn-sm">Shopping Cart Totla Price: $ 62, Total Items 1</a>
            </div>
            <!-- col-md-6 offer ends -->
            <div class="col-md-6">
                <!-- col-md-6 start -->
                <ul class="menu">
                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>

                    <li>
                        <a href="customer/my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">login</a>
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
                        <li class=""><a href="customer/my_account.php">My Account</a></li>
                        <li class=""><a href="cart.php">Shopping Cart</a></li>
                        <li class=""><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>1 items in cart</span>

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
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Products Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <!-- functions/functions.php -->

                            <li><a href='shop.php?p_cat=1'>Jackets</a></li>

                            <li><a href='shop.php?p_cat=2'>Accessories</a></li>

                            <li><a href='shop.php?p_cat=3'>coats</a></li>

                            <li><a href='shop.php?p_cat=4'>T-shirts</a></li>

                            <li><a href='shop.php?p_cat=5'>kids dresses</a></li>

                            <li><a href='shop.php?p_cat=6'>Hoodie</a></li>

                            <li><a href='shop.php?p_cat=7'>accessories</a></li>

                            <li><a href='shop.php?p_cat=8'>Phones</a></li>

                            <li><a href='shop.php?p_cat=9'>Watch</a></li>

                        </ul>
                    </div>
                </div>
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <!-- functions/functions.php -->

                            <li><a href='shop.php?cat=1'>Men</a></li>

                            <li><a href='shop.php?cat=2'>Women</a></li>

                            <li><a href='shop.php?cat=3'>Kids</a></li>

                            <li><a href='shop.php?cat=4'>Others</a></li>
                        </ul>
                    </div>
                </div>
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
                            <input type="text" name="c_name" id="" class="form-control">

                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Email</label>
                            <input type="text" name="c_email" id="" class="form-control">
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Password</label>
                            <input type="password" name="c_pass" id="" class="form-control">
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Country</label>
                            <input type="text" name="c_country" id="" class="form-control">
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer City</label>
                            <input type="text" name="c_city" id="" class="form-control">
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Contact</label>
                            <input type="text" name="c_contact" id="" class="form-control">
                        </div>
                        <div class="form-gorup">
                            <label for="">Customer Address</label>
                            <input type="text" name="c_address" id="" class="form-control">
                        </div>

                        <div class="form-gorup">
                            <label for="">Customer Image</label>
                            <input type="file" name="c_image" id="" class="form-control">
                        </div>

                        <div class="text-center">
                            <button name="register" class="btn btn-primary"><i class="fa fa-user-md"></i>
                                Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer 
 -->

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="checkout.php">My Account</a></li>
                    </ul>
                    <hr>
                    <h4>User Section</h4>
                    <ul>
                        <li><a href="checkout.php">Login</a></li>
                        <li><a href="customer_register.php">Register</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Top Products Categories</h4>
                    <ul>

                        <li><a href='shop.php?p_cat=1'>Jackets</a></li>

                        <li><a href='shop.php?p_cat=2'>Accessories</a></li>

                        <li><a href='shop.php?p_cat=3'>coats</a></li>

                        <li><a href='shop.php?p_cat=4'>T-shirts</a></li>

                        <li><a href='shop.php?p_cat=5'>kids dresses</a></li>

                        <li><a href='shop.php?p_cat=6'>Hoodie</a></li>

                        <li><a href='shop.php?p_cat=7'>accessories</a></li>

                        <li><a href='shop.php?p_cat=8'>Phones</a></li>

                        <li><a href='shop.php?p_cat=9'>Watch</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Where to find us</h4>
                    <p>
                        <strong>Arfatrahman.com</strong>
                        <br>Chittagong
                        <br>Bangladesh
                        <br>+8801819439292
                        <br>arfatrahman08@gmail.com
                        <br><strong>Arfatur Rahman</strong>

                    </p>
                    <a href="contact.php">Go to Contact us page</a>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Get the news</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur corporis
                        dolore iure porro!</p>
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="email" id="" class="form-control">
                            <span class="input-group-btn">
                                <input type="submit" value="subscribe" class="btn btn-default">
                            </span>
                        </div>
                    </form>
                    <hr>
                    <h4>Stay in touch</h4>
                    <p class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-enveloper"></i></a>
                    </p>
                    <div>
                    </div>
                </div>
            </div>
            <div id="copyright">
                <div class="container">
                    <div class="col-md-6">
                        <p class="pull-left">&copy; 2021 <a href="http://arfatrahman.com" target="_blank"> Arfatur
                                Rahman</a></p>
                    </div>

                    <div class="col-md-6">
                        <p class="pull-right">Template by <a href="http://arfatrahman.com" target="_blank"> Arfatur
                                Rahman</a> </p>
                    </div>

                </div>
            </div>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
                integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ=="
                crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </div>
</body>

</html>