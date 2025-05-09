<?php
include('/var/www/config/db_connect.php');

// Validate and sanitize inputs
$cart_id = isset($_POST['cart_id']) ? intval($_POST['cart_id']) : 0;
$quantity = max(1, intval($_POST['quantity'])); // Ensure quantity is at least 1

// Only proceed if a valid cart ID is provided
if ($cart_id > 0) {
    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE cart_id = ?");
    $stmt->bind_param("ii", $quantity, $cart_id);
    $stmt->execute();
    $stmt->close();
}

header('Location: cart.php');
exit;
?>
