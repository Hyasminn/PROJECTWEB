<?php
require_once('dbconfig.php');
?>

<html>
<head>
<title>LA FLORIST.</title>

<!-- custom css file link  -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="css/style.css">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

td, th {
  text-align: center;
  padding: 5px;
  background-color:#f6e9f0;
}
</style>

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
  
<section class="form" id="form">
<b><h1 class="heading"> <span> Your order </span> is successful! </h1></b>

    <?php
     $date = date("d-m-Y");

     //get input values from form
     extract($_POST);
    ?>

  <br><p>Date: <b><?php print($date) ?></b></p>

  <table align="center" >
  
  <tr><td>name</td>
        <td>:</td>
        <td><b><?php print($name) ?></b></td>
     </tr>

    <tr><td>email</td>
        <td>:</td>
        <td><b><?php print($email) ?></b></td>
    </tr>

    <tr><td>Phone Number</td>
        <td>:</td>
        <td><b><?php print($phone) ?></b></td>
    </tr>

    <tr><td>Address</td>
        <td>:</td>
        <td><b><?php print($address) ?></b></td>
    </tr>

    <tr><td>your product</td>
        <td>:</td>
        <td><b><?php print ($products) ?></b></td>
    </tr>

    <tr><td>Payment mode</td>
        <td>:</td>
        <td><b><?php print($payment_mode) ?></b></td>
    </tr><br>

    <tr><td>Total (RM)</td>
        <td>:</td>
        <td><b>RM<?php print($grand_total) ?></b></td>
    </tr>
    
    </tr>
  </table>
  
  <input class="btn" type="button" name="printButton" onClick="window.print()" value="Print">
  <?php
  //Checkout and save customer info in the orders table
  if (isset($_POST["submit"])){
    // if (isset($_POST['action']) && isset($_POST['action']) == 'order') 
    if(isset($_POST["memUsername"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["product_name"]) && isset($_POST["pmode"])) {
    
      $name = $_POST['memUsername'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $products = $_POST['product_name'];
      $pmode = $_POST['payment_mode'];
      $grand_total = $_POST['grand_total'];

  $sql = "INSERT INTO order(memUsername, email, phone, address, payment_mode, product_name, paid_amount) 
  VALUES ('$name', '$email', '$phone', '$address', '$pmode', '$products', '$grand_total')";
      $conn->query($sql);
    }
}
?>


  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'checkout.php',
        method: 'post',
        data: $('submit').serialize() + "&action=order",
        success: function(response) {
          $("#showOrder").html(response);
        }
      });
    });

      });
    }
  });
  </script>
  </section>
  </body>
</html>