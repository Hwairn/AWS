<?php
session_start();
include('/var/www/config/db_connect.php'); // Replaces direct connection code

$cart_id = $_GET['cart_id'];

$conn->query("DELETE FROM cart WHERE cart_id = $cart_id");

header('Location: cart.php');
exit;
?>
