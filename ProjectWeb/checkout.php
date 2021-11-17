<?php
  require 'dbconfig.php';

  $grand_total = 0;
  $allItems = '';
  $items = array();

  $sql = "SELECT CONCAT(product_name, '(',quantity,')') AS quantity, total_price FROM cart";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $grand_total = $grand_total + $row['total_price'];
    $items[] = $row['quantity'];
  }
  $allItems = implode(', ', $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
 <!-- header section starts  -->
<header>

<input type="checkbox" name="" id="toggler">
<label for="toggler" class="fas fa-bars"></label>

<a href="flower.php" class="logo">LA FLORIST<span>.</span></a>

<nav class="navbar">
        <a href="flower.php">home</a>
        <a href="aboutus.php">about</a>
        <a href="index.php">products</a>
        <a href="flower.php#review">review</a>
        <a href="flower.php#contact">contact</a>
</nav>

<div class="icons">
    <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>    
    <a href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i></a>
    <a href="flower-login.php" class="fas fa-user"></a>
    
</div>

</header>
<br><br><br>

  <?php
session_start();
if(isset($_POST["username"])  && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_SESSION["Messages"]) && isset($_SESSION["payment_mode"]) && isset($_SESSION["product_name"])){
    require_once('dbconfig.php');

    $name = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $Messages = $_POST["Messages"];
    $payment = $_POST["payment_mode"];
    $product = "";
        foreach ($_SESSION['products'] as $key => $product) {
            $products = $products . $product["name"] . "(" . $product["qty"] . "), ";
        }
        $total = 0;
        foreach ($_SESSION['products'] as $key => $product) {
            $total = $total + ($product['qty'] * $product['price']);
        }
          $sql = "INSERT INTO order (username, email, phone, address, Messages, payment, products, total)
          VALUES ('$name', '$email', '$phone', '$address', '$Messages', '$payment', '$product', '$total')";
          $result = $conn->query($sql);
      }
  ?>

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="showOrder">

        <h1 align="center" class="heading"> <span> Complete your </span> order! </h1>

        <div class="jumbotron p-3 mb-2 text-center" style="background-color:#f6e9f0;" >

          <h6 class="lead"><b>Product(s) : </b><?php echo $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?php echo number_format($grand_total,2)?>/-</h5>
        </div>

        <form action="servecheckout.php" method="post" id="placeOrder" >
        <!-- <form role="form" id="feedback" action="feedbackProcess.php" method="post"> -->
          <input type="hidden" name="products" value="<?php echo $allItems ?>">
          <input type="hidden" name="grand_total" value="<?php echo $grand_total ?>">

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>

          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Enter number phone" required>
          </div>

          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>

          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="payment_mode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="onlinebanking">Online Banking</option>
            </select>
          </div>

          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" onclick="myFunction()">
          </div>
          
          <script>
          function myFunction() {
            alert("p/s: You order has been confirmed and will be shipped in next two days!");
          }
          </script>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>
