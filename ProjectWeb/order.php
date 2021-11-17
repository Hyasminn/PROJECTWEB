<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM order;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LA FLORIST.</title>
</head>
<body>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<section class="form" id="form">
<h1 class="heading"> <span> Member Order </span> List </h1>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Payment</th>
    <th>Products</th>
    <th>Total</th>
  </tr>

    <?php
   
   if (isset($_GET['result']) && isset($_GET['result']) == 'results') {
    echo '<tr><td>' . $results['order_id'] . '</td>
    <td>' . $results['memUsername'] . '</td>
    <td>' . $results['email'] . '</td>
    <td>' . $results['phone'] . '</td>
    <td>' . $results['address'] . '</td>
    <td>' . $results['Messages'] . '</td>
    <td>' . $results['payment_mode'] . '</td>
    <td>' . $results['product_name'] . '</td>
    <td>' . $results['paid_amount'] . '</td></tr>';
  }
  //close connection 
  $conn->close();
  echo '<button><a href="viewRegistration.php">Back</button><br><br>';
  ?>
               

</table>
</section>
</body>
</html>