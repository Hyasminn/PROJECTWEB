<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>

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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div style="display:<?php if (isset($_SESSION['showAlert'])) {echo $_SESSION["showAlert"];}
        else { echo "none"; } unset($_SESSION["showAlert"])?>" class="alert alert-success alert-dismissible mt-2">

          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) { echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
        
        </div>
        <div class="table-responsive mt-2" >
          <table class="table table-striped text-center" >
            <thead>
              <tr>
                <td colspan="7">
                <h1 align="center" class="heading"> <span> Products in </span> your cart! </h1>
                </td>
              </tr>
              <tr>
                <th style="color:#c8367d;">ID</th>
                <th style="color:#c8367d;">Image</th>
                <th style="color:#c8367d;">Product</th>
                <th style="color:#c8367d;">Price</th>
                <th style="color:#c8367d;">Quantity</th>
                <th style="color:#c8367d;">Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            
            <tbody>

              <?php 
                require 'dbconfig.php';
                $sql = "SELECT * FROM cart";
                $result = $conn->query($sql);
                $grand_total = 0;

                while ($row = $result->fetch_assoc()):
              ?>
              
              <tr >
                <td><?php echo $row["cart_id"]; ?></td>
                <input type="hidden" class="cart_id" value="<?php echo $row["cart_id"]; ?>">
                <td><img src="<?php echo $row["product_picture"]; ?>" width="100"  height="100"></td>
                <td><?php echo $row["product_name"]; ?></td>
                
                <td>
                  <i></i><?php echo number_format($row['product_price'],2); ?>
                </td>

                <input type="hidden" class="pprice" value="<?php echo $row['product_price']; ?>">
                
                <td >
                  <input type="number" class="form-control quantity" value="<?php echo $row['quantity']; ?>" style="width:75px;">
                </td>

                <td><i></i>&nbsp;&nbsp;<?php echo number_format($row["total_price"],2); ?></td>
                
                <td>
                  <a href="action.php?remove=<?php echo $row["cart_id"];?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>

              <?php $grand_total += $row['total_price']; ?>

              <?php endwhile; ?>
              
              <tr>
                <td colspan="3">
                  <a href="index.php" class="btn btn-success"><i class="fas cart-btn"></i>&nbsp;&nbsp;Continue Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?php echo ($grand_total > 1); ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".quantity").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = hide.find(".pid").val();
      var pprice = hide.find(".pprice").val();
      var qty = hide.find(".quantity").val();
      location.reload(true);
      
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: { quantity: quantity, pid:pid, pprice: pprice },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: { cartItem: "cart_item" },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>
