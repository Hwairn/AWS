<?php
include('/var/www/config/db_connect.php');

// Sanitize and validate total_price
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0.0;

// Only insert if total_price is valid
if ($total_price > 0) {
    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (total_price, payment_status) VALUES (?, 'paid')");
    $stmt->bind_param("d", $total_price);
    $stmt->execute();
    $stmt->close();

    // Clear the cart (for single-user system, delete all rows)
    $conn->query("DELETE FROM cart");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
  <?php include('header.php'); ?>
  <main>
    <div class="checkout-box">
      <h1>Payment Successful!</h1>
      <p>Your order has been placed. Please pay RM<?php echo number_format($total_price, 2); ?> on delivery.</p>
      <a href="index.php">Return Home</a>
    </div>
  </main>
  <?php include('footer.php'); ?>
</body>
</html>
