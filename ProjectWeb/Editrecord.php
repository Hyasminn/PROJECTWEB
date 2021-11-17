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

$memID=$_REQUEST['memID'];
$query = "SELECT * from member where memID='".$memID."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
</head>

<body>
<div class="form">

<h1>Update Record</h1>

<div>
<form name="form" method="post" action="Updaterecord.php"> 
<input type="hidden" name="new" value="1" />
<input name="memID" type="hidden" value="<?php echo $row["memID"];?>" />
<p><input type="text" name="memUsername" value="<?php echo $row['memUsername'];?>" /></p>
<p><input type="text" name="memPassword" value="<?php echo $row['memPassword'];?>" /></p>
<p><input type="text" name="memName" value="<?php echo $row['memName'];?>" /></p>
<p><input type="text" name="memAdd" value="<?php echo $row["memAdd"];?>" /></p>
<p><input type="text" name="memEmail" value="<?php echo $row['memEmail'];?>" /></p>
<p><input type="text" name="memContact" value="<?php echo $row['memContact'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>

</div>
</div>
</body>
</html>