<?php
include('/var/www/config/db_connect.php');

// Validate and sanitize input
$cart_id = isset($_GET['cart_id']) ? intval($_GET['cart_id']) : 0;

// Proceed only if the cart_id is valid
if ($cart_id > 0) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $stmt->close();
}

header('Location: cart.php');
exit;
?>
