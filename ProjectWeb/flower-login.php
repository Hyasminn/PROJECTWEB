<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }
        
        /* Heading Starts */
        .heading{
         text-align: center;
         font-size: 3rem;
         color:rgb(255, 255, 255);
         padding:1rem;
        margin:1rem 0;
        background:#e67baf;
        }

        .heading span{
        color:var(--pink);
       }

       /* Set a style for all buttons */
        button {
          background-color: #e84393;
          color: white;
          padding: 14px 20px;
          margin: 4 px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
          float: center;
          border: 50px solid;
        }
        
        button:hover {
          opacity: 0.5;
        }
           
        /* Center the image and position the close button */
        .imgcontainer {
          text-align: center;
          margin: 1px 0 1px 0;
          position: relative;
        }
        
        img.avatar {
          width: 25%;
          border-radius: 5%;
        }
        
        .container {
          padding: 16px;
        }
        
        span.psw {
          float: right;
          padding-top: 16px;
        }
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          padding-top: 60px;
        }
        
        /* Modal Content/Box */
        .modal-content {
          background-color: #fefefe;
          margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
          border: 1px solid #888;
          width: 80%; /* Could be more or less, depending on screen size */
        }
        
        /* The Close Button (x) */
        .close {
          position: absolute;
          right: 25px;
          top: 0;
          color: #000;
          font-size: 35px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: red;
          cursor: pointer;
        }
        
        /* Add Zoom Animation */
        .animate {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }
        
        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }
        
        </style>
</head>
<body>
  <h1 class="heading"> <span> LA FLORIST </span> Login </h1>


<div id="contact" class="contact">
  
  <form class="modal-content animate" action="Login-Auto.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementBynavbar('contact').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="flower7.jpg" alt="Scarlet Kiss" class="avatar">
    </div>

    <div class="container" >
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="Username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Password" required>
        
      <button type="submit" class="loginbtn">Login</button>
      
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>

      
      
      <a href="register.php">New member? Click here!</a>

    </div>

    <div class="container" style="background-color:#f1f1f1">
    </div>
  </form>
</div>

<script>
// Get the modal

var modal = document.getElementBynavbar('contact');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>