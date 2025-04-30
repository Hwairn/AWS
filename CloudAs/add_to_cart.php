<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'cloudDB');

$session_id = session_id();
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'] ?? 1;

// Check if item already in cart
$check = $conn->query("SELECT * FROM cart WHERE session_id='$session_id' AND product_id='$product_id'");

if ($check->num_rows > 0) {
    // Update quantity
    $conn->query("UPDATE cart SET quantity = quantity + $quantity WHERE session_id='$session_id' AND product_id='$product_id'");
} else {
    // Insert new
    $conn->query("INSERT INTO cart (session_id, product_id, quantity) VALUES ('$session_id', '$product_id', $quantity)");
}

header('Location: cart.php');
exit;
?>
