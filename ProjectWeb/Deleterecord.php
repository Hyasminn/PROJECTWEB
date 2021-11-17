<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Florist</title>
</head>
<body>
    
<?php
  include 'dbconfig.php';

  //get input value
  $memID=$_REQUEST['memID'];

  // sql to delete a record
  $sql = "DELETE FROM member WHERE memID='".$memID."'";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } 
  else {
    echo "Error deleting record: " . $conn->error;
  }

  //close connection  
  $conn->close();
  echo '<p><a href="viewRegistration.php">Back to Main Menu</a></p>';
?>

</body>
</html>