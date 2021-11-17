<?php

     //get input values from form
     extract($_POST);
 
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La florist</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/Script.js"></Script>

    <style>

        .memberform {
            background-color: #ffff;
            width: 80%;
            height: 390px;
            margin-left: 160px;
            margin-top: 30px;
            margin-bottom: 30px;
            box-sizing: border-box;
            text-align: center;
            border-radius: 10px;
        }
        .memberform h2 {
            text-align: center;
            padding: 30px;
            width: 70%;
        }
        .memberform a{
            text-decoration: none;
            color: black	;
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
    <a href="addtocart.php" class="fas fa-shopping-cart"></a>
    <a href="flower-login.php" class="fas fa-user"></a>
</div>
</header>

<!-- save registration section starts  -->
<section class="form" id="form">
<h1 class="heading"> <span> successfully </span> Registration </h1>

    <div class="memberform">

        <form class="login" action="saveRegistration.php" method="post">
            <div class="input">
                <label for="username">Username : <?php print($memUsername) ?></label>
            </div> <br>

            <div class="input">
                <label for="password">Password : <?php print($memPassword) ?></label>
            </div><br>

            <div class="input">
                <label for="name">Name : <?php print($memName) ?></label>
                
            </div><br>

            <div class="input">
                <label for="address">Address : <?php print($memAdd) ?></label>
                
            </div><br>

            <div class="input">
                <label for="email">Email : <?php print($memEmail) ?></label>
                
            </div><br>

            <div class="input">
                <label for="contact">Contact : <?php print($memContact) ?></label>
                
            </div><br>
            
        </form>
    </div>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "flower";
         
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
     
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); }

      //create query
      $sql = "INSERT INTO member (memUsername, memPassword, memName, memAdd, memEmail, memContact) VALUES ('$memUsername', '$memPassword', '$memName', '$memAdd', '$memEmail', '$memContact')";
      //execute query
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      //close connection
      $conn->close();
  ?> 

  <form>
     <input type="button" name="printButton" onClick="window.print()" value="Print" class="btn">
 
     <button><a href="flower-login.php"  style="text-decoration: none" class="btn">Log In</a></button>

     <button><a href="register.php"  style="text-decoration: none" class="btn">Back</a></button>
  </form>

</body>
</html>