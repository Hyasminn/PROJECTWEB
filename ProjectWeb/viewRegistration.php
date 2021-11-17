<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Florist </title>

    <!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

td, th {
  border: 0.5px solid #fff;
  text-align: center;
  padding: 5px;
  background-color:#f6e9f0;
  
}
</style>

</head>
<body>

<h1 align="center" class="heading"> <span> LA FLORIST </span> Registration </h1>

<?php
  include 'dbconfig.php';

  //create and execute query
  $sql = "SELECT * FROM member";
  $result = $conn->query($sql);

  //check if records were returned
  if ($result->num_rows > 0) {
     //create a table to display the record
     echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
     echo '<tr><td align="center"><b>No</b></td>
     <td align="center"><b>Username</b></td>
     <td align="center""><b>Password</b></td>
     <td align="center"><b>Name</b></td>
     <td align="center"><b>Address</b></td>
     <td align="center"><b>Email</b></td>
     <td align="center"><b>Contact</b></td></tr>';
     
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td align="center">'.$row["memID"].'</td>';
        echo '<td align="center">'.$row["memUsername"].'</td>';
        echo '<td align="center">'.$row["memPassword"].'</td>';
        echo '<td align="center">'.$row["memName"].'</td>';
        echo '<td align="center">'.$row["memAdd"].'</td>';
        echo '<td align="center">'.$row["memEmail"].'</td>';
        echo '<td align="center">'.$row["memContact"].'</td>';
        echo '<td><a href="Deleterecord.php?memID='.$row["memID"].'">DELETE</a></td>';
        echo '<td><a href="Editrecord.php?memID='.$row["memID"].'">UPDATE</a></td>';
        echo '</tr>';
     }
  } 
  else {
    echo "0 results";  //if no record found in the database
  }

  //close connection 
  $conn->close();
  echo '<button><p><a href="administration.php">Back to Main Menu</a></p></button><br>';
  echo '<button><p><a href="order.php">View order list</a></p></button><br><br>';
?>

</body>
</html>