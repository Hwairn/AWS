<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'cloudDB');

$cart_id = $_POST['cart_id'];
$quantity = max(1, intval($_POST['quantity'])); // Prevent 0 or negative

$conn->query("UPDATE cart SET quantity = $quantity WHERE cart_id = $cart_id");

header('Location: cart.php');
exit;
?>
