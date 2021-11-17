<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA FLORIST</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/Script.js"></Script>

</head>
<body>

<!-- header section starts  -->
<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="flower.php" class="logo">LA FLORIST<span>.</span></a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#products">products</a>
        <a href="#review">review</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
          <a href="index.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        <a href="flower-login.php" class="fas fa-user"></a>
        
    </div>

</header>

<!-- home section starts  -->
<section class="home" id="home">

    <div class="content">
        <h3>fresh flowers</h3>
        <span> natural & beautiful flowers </span>
        <p>It is almost a hundred years ago that this expression and personal notice left the sender and their florist in burdensome situations due to various transportation difficulties. 
            Nowadays, Flower Chimp can overcome these difficulties by empowering selected florists across Malaysia to cover the entire nation with flower bouquets that speak a thousand words. 
            We believe that ordering and giving flowers should be as beautiful as the flowers themselves. Fast, easy, and simply a few clicks away! 
            - You can now send beautiful, stylish, and meaningful flower gifts within seconds!</p>
        <a href="#products" class="btn">shop now</a>
    </div>
    
</section>
<!-- about section starts  -->
<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="about-vid.mp4" loop autoplay muted></video>
            <h3>best flower sellers</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>We carry bouquets and arrangements for all occasions such as birthdays, anniversaries, romantic vents, valentine's day, mother's day, CNY, Christmas and many more.
                We also carry the widest assortment in terms of flower types available in Malaysia. 
                Shop Roses, Orchids, Lilies, Carnations, Tulips, flower bouquets and many more.</p>
            <a href="aboutus.php" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- icons section starts  -->
<section class="icons-container">

    <div class="icons">
        <img src="Delivery.png" alt="delivery">
        <div class="info">
            <h3>Same Day Delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="gift-icons.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="credit_card.png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by paypal</span>
        </div>
    </div>
   
</section>

<!-- prodcuts section starts  -->
<section class="products" id="products">

    <h1 class="heading"> Our <span>Promotion</span> </h1>

    <div class="box-container">

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src="flower9.png" alt="Baby Galaxy">
                <div class="icons">
                    <a href="index.php" class="cart-btn">add to cart</a>
                </div>
            </div>
            <div class="content">
                <h3>Baby Galaxy </h3>
                <div class="price"> RM80 <span>RM89</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-15%</span>
            <div class="image">
                <img src="flower1.jpg" alt="Princess">
                <div class="icons">
                    <a href="index.php" class="cart-btn cart2">add to cart</a>
                </div>
            </div>
            <div class="content">
                <h3>Princess</h3>
                <div class="price"> RM145 <span>RM170</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-5%</span>
            <div class="image">
                <img src="flower2.jpg" alt="La Vie En Rose">
                <div class="icons">
                    <a href="index.php" class="cart-btn cart3">add to cart</a>
                </div>
            </div>
            <div class="content">
                <h3>La Vie En Rose</h3>
                <div class="price"> RM85 <span>RM89</span> </div>
            </div>
        </div>

    </div>
</section>

<!-- review section starts  -->
<section class="review" id="review">

<h1 class="heading"> customer's <span>review</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Delivery on time! 👍👍👍 Super Fast! Thank You Sooooo Much!</p>
        <div class="user">
            <img src="review2.jpg" alt="">
            <div class="user-info">
                <h3>Airel</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>On time delivery and beautiful flowers.</p>
        <div class="user">
            <img src="review4.png" alt="">
            <div class="user-info">
                <h3>Jackson</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>The flowers are fresh and beautiful! The decoration also is topnotch! definitely would reorder!</p>
        <div class="user">
            <img src="Review1.jpg" alt="">
            <div class="user-info">
                <h3>Emmy</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

</div>
</section>


<!-- contact section starts  -->
<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="Name" class="box">
            <input type="email" placeholder="Email" class="box">
            <input type="number" placeholder="Phone Number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <button onclick="myFunction()"><input type="submit" value="send message" class="btn"></button>
        </form>

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

        <script>
function myFunction() {
  alert("Your message has been send to La Florist");
}
</script>

    </div>

</section>

<!-- footer section starts  -->
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
            <a href="FAQ.php">FAQ</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="cart.php">my order</a>
        </div>

        <div class="box">
            <h3>Contact info</h3>
            <a href="#">+603-1234 5678</a>
            <a href="#">laflorist@gmail.com</a>
            <a href="#">Shah Alam, Selangor - 40150</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>

</section>
    
</body>
</html>