<?php
session_start();
include('/var/www/config/db_connect.php'); // Replaces direct connection code

$session_id = session_id();
$total_price = $_POST['total_price'];

// Insert order
$conn->query("INSERT INTO orders (session_id, total_price, payment_status) VALUES ('$session_id', $total_price, 'pending')");

// Clear cart
$conn->query("DELETE FROM cart WHERE session_id='$session_id'");

?>

<!DOCTYPE html>
<html>
<head><title>Payment</title></head>
<?php include('header.php'); ?>
<body>
  <h1>Payment Successful!</h1>
  <p>Your order has been placed. Please pay $<?php echo $total_price; ?> on delivery.</p>
  <a href="index.php">Return Home</a>
</body>
<?php include('footer.php'); ?>
</html>
