<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/Script.js"></Script>

    <style>
        .memberform {
            background-color: #ffff;
            width: 50%;
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
    <a href="#" class="fas fa-heart"></a>
    <a href="addtocart.php" class="fas fa-shopping-cart"></a>
    <a href="flower-login.php" class="fas fa-user"></a>
</div>
</header>

<!-- home section starts  -->
<section class="form" id="form">
<h1 class="heading"> <span> New </span> Registration </h1>

    <div class="memberform">

        <form class="login" action="saveRegistration.php" method="post">

            <div class="input">
                <label for="username">Username : </label>
                <input type="text" name=memUsername>
            </div> <br>

            <div class="input">
                <label for="password">Password : </label>
                <input type="password" name=memPassword>
            </div><br>

            <div class="input">
                <label for="name">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
                <input type="text" name=memName>
            </div><br>

            <div class="input">
                <label for="address">Address &nbsp&nbsp: </label>
                <input type="text" name=memAdd>
            </div><br>

            <div class="input">
                <label for="email">Email &nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                <input type="text" name=memEmail>
            </div><br>

            <div class="input">
                <label for="contact">Contact &nbsp&nbsp:</label>
                <input type="text" name=memContact>
            </div><br>

            <div class="submit">
            <input type="submit" value="register" class="btn">
            </div>
            
        </form>

    </div>
    </section>
</body>
</html>