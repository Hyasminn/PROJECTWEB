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

    extract($_POST);

    // Attempt update query execution
    $sql = "UPDATE member SET memUsername='".$memUsername."', memPassword='".$memPassword."', memName='".$memName."', memAdd='".$memAdd."', memEmail='".$memEmail."', memContact='".$memContact."' WHERE memID='".$memID."'";

    if(mysqli_query($conn, $sql)){
        echo "Records were updated successfully.</br></br>
        <a href='viewRegistration.php'>View Updated Record</a>";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
    ?>