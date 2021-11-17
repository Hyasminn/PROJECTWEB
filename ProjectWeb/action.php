<?php
    session_start();
    require 'dbconfig.php';

    // Add products into the cart table
    if (isset($_POST["submit"])){
      // var_dump($_POST["pname"]);
      // die();
      if(isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_POST["pprice"]) && isset($_POST["ppicture"]) && isset($_POST["pcode"])) {
        $pid = $_POST["pid"];
        $name = $_POST["pname"];
        $price = $_POST["pprice"];
        $picture = $_POST["ppicture"];
        $code = $_POST["pcode"];
        $qty = $_POST["pqty"];
        
        $total_price = $price * $qty;
        $check_code = null;
       
        $sql = "SELECT product_code FROM cart WHERE product_code='$code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 1) {
       // output data of each row
          while($row = $result->fetch_assoc()) {
            $check_code = $row["product_code"];
        }
       }

  
        if (true) {
          $sql = "INSERT INTO cart(product_name, product_price, product_picture, quantity, total_price, product_code) VALUES ('$name', '$price', '$picture', '$qty', '$price', '$code')";
          $conn->query($sql);
  
          echo "<div class='alert alert-success alert-dismissible mt-2'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Item added to your cart!</strong>
                          </div>";
        } else {
          echo "<div class='alert alert-danger alert-dismissible mt-2'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Item already added to your cart!</strong>
                          </div>";
        }
      }
    }
    

    // Get no.of items available in the cart table
    if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
      $sql = "SELECT * FROM cart";
      $result = $conn->query($sql);
      $rows = $result->num_rows;

      echo $rows;
    }

    // Remove single items from cart
    if (isset($_GET['remove'])) {

      $cid = $_GET['remove'];
      $sql = "DELETE FROM cart WHERE cart_id='$cid'";
      $result = $conn->query($sql);

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'Item removed from the cart!';
      
      header('location:cart.php');
    }

    // Remove all items at once from cart
    if (isset($_GET["clear"])) {

	    $pid = $_GET["clear"];
      $sql = "DELETE FROM cart";
      $result = $conn->query($sql);

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'All Item removed from the cart!';
      header('location:cart.php');
    }

    // Set total price of the product in the cart table
    if (isset($_POST['pqty'])) {
      $qty = $_POST['pqty'];
      $pid = $_POST['pid'];
      $pprice = $_POST['pprice'];

      $total_price = $qty * $pprice;

      $sql = "UPDATE cart SET quantity='$qty', total_price='$total_price' WHERE pid='$pid'";
      $result = $conn->query($sql);
      // $update_stmt->execute(array(":qty"=>$qty, ":ttl_price"=>$total_price, ":cid"=>$id));
    }

    //Checkout and save customer info in the orders table
    if (isset($_POST["submit"])){ 
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["pmode"])) {
    
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $products = $_POST['products'];
      $pmode = $_POST['payment_mode'];
      $grand_total = $_POST['grand_total'];
      
      $data = '';

      $sql = "INSERT INTO order(username, email, phone, address, products, payment_mode, paid_amount) VALUES ('$name', '$email', '$phone', '$address', '$products', '$pmode', '$grand_total')";
      $conn->query($sql);

                echo "<h1 class='display-4 mt-2 text-danger'>Thank You!</h1>";
								echo "<h2>Your Order Placed Successfully!</h2>";

                $products = $_POST['products'];
								echo "<h4 class='bg-danger text-light rounded p-2'>Items Purchased : {.$products.} </h4>";
								
                $name = $_POST['name'];
                echo "<h4>Your Name : {$name} </h4>";
                	
                $email = $_POST['email'];
                echo "<h4>Your E-mail : {$email} </h4>";	
                
                $phone = $_POST['phone'];
								echo "<h4>Your Phone : {$phone}  </h4>";

                $address = $_POST['address'];
                echo "<h4>Your address : {$address}  </h4>";
                
                $grand_total = $_POST['grand_total'];
								echo "<h4>Total Amount Paid : ".number_format($grand_total,2)." </h4>";
								
                $pmode = $_POST['payment_mode'];
                echo "<h4>Payment Mode : {$pmode} </h4>";		
    }}
?>
