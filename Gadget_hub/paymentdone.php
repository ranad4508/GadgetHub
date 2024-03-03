<?php
session_start();
include_once('includes/dbconnection.php');

if (isset($_POST['paymentMethod']) && isset($_POST['orderId'])) {
  $paymentMethod = $_POST['paymentMethod'];
  $orderId = $_POST['orderId'];

  $query = "UPDATE tblorders SET Mode = '$paymentMethod' WHERE OrderNumber = '$orderId'";
  $result = mysqli_query($con, $query);

  if ($result) {
    echo "Order updated successfully";
  } else {
    echo "Failed to update order";
  }
} else {
  echo "Invalid request";
}
?>
