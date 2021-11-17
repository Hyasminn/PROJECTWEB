<?php
session_start();

// Code to connect to database
include 'dbconfig.php';

// Define $myusername and $mypassword
$username=$_POST['Username'];
$password=$_POST['Password'];

$sql = "SELECT Username, Password FROM admin WHERE Username='$username' and Password='$password'";
$result = $conn->query($sql);

$row=mysqli_fetch_array($result);

// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    //redirect to file "adminMenu.php"
    header("location:administration.php");
}
else 
{
    echo "<p>Wrong Username or Password. Please try again.</p>";
}

$sql2 = "SELECT memUsername, memPassword FROM member WHERE memUsername='$username' and memPassword='$password'";
$result = $conn->query($sql2);

$row=mysqli_fetch_array($result);

// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    //redirect to file "adminMenu.php"
    header("location:flower.php");
}
else 
{
    echo "<p>Wrong Username or Password. Please try again.</p>";
}

$sql2 = "SELECT memUsername, memPassword FROM member WHERE memUsername='$username' and memPassword='$password'";
$result = $conn->query($sql2);

$row=mysqli_fetch_array($result);

// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    //redirect to file "adminMenu.php"
    header("location:flower.php");
}
else 
{
    echo "<p>Wrong Username or Password. Please try again.</p>";
}

$conn->close();

?>