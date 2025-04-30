<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'cloudDB');

$cart_id = $_GET['cart_id'];

$conn->query("DELETE FROM cart WHERE cart_id = $cart_id");

header('Location: cart.php');
exit;
?>
