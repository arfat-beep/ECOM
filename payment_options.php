<div class="box">
<?php
    include("db.php");
    $session_email = $_SESSION['customer_email'];
    $select_customer = "SELECT * FROM `customers` WHERE customer_email = '$session_email'";
    $run_customer = mysqli_query($con, $select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];




?>
    <h1 class="text-center">Payment Options For You</h1>
    <p class="lead text-center"><a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></p>
    <center>
        <p class="lead"><a href="#">Pay Online with PayPal</a></p>
        <img src="img/paypal-logo.png" width="500" height="270" class="img-responsive" alt="">
    </center>
</div>