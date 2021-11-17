<?php
session_start();
include('dbconfig.php');
$status="";

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$picture = $row['picture'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'picture'=>$picture)
);

if(empty($_SESSION["cart"])) {
    $_SESSION["cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["cart"] = array_merge(
    $_SESSION["cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Cart</title>

  <!-- font awesome cdn link  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
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
        <a href="flower.php">review</a>
        <a href="flower.php">contact</a>
    </nav>

    <div class="icons">
        <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>    
        <a href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i></a>
        <a href="flower-login.php" class="fas fa-user"></a>
        
    </div>

</header>

<br><br><br>
<h1 align="center" class="heading"> <span> LA FLORIST </span> Registration </h1>

  <!-- Displaying Products Start -->
  <div class="container">
    <div class="alert-message"></div>
    <div class="row mt-2 pb-3">
      
      <?php
        include 'dbconfig.php';
        $sql = 'SELECT * FROM products';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
       // output data of each row
          while($row = $result->fetch_assoc()) {
      
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_picture'] ?>" class="card-img-top" height="250">
            
            <div class="card-body">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-myr-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

            </div>
            <div class="card-footer" style="background-color:#f6e9f0;">
              <form action="action.php" method="post" class="form-submit">
                
                <div class="row p-2" style="background-color:#f6e9f0;">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                
                <input type="hidden" name="pid" value="<?php echo $row['product_id']; ?>">
                <input type="hidden" name="pname" value="<?php echo $row['product_name']; ?>">
                <input type="hidden" name="pprice" value="<?php echo $row['product_price']; ?>">
                <input type="hidden" name="ppicture" value="<?php echo $row['product_picture']; ?>">
                <input type="hidden" name="pcode" value="<?php echo $row['product_code']; ?>">
                <button name="submit" id="addItemBtn" class="btn btn-success btn-md">Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
  
  <!-- Displaying Products End -->
  <script src='js/bootstrap.js'></script>



  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();

      var form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var ppicture = $form.find(".ppicture").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".product_qty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: { pid:pid, pname:pname, pprice:pprice, pqty: pqty, ppicture: ppicture, pcode: pcode},
        success: function(response) {
          $(".alert-message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: { cartItem: "cart_item"},
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>
