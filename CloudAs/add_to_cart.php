<?php
include('/var/www/config/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Check if product already exists in cart
    $existing = $conn->query("SELECT * FROM cart WHERE product_id = $product_id")->fetch_assoc();

    if ($existing) {
        // Update quantity
        $new_quantity = $existing['quantity'] + $quantity;
        $conn->query("UPDATE cart SET quantity = $new_quantity WHERE product_id = $product_id");
    } else {
        // Insert new product into cart
        $conn->query("INSERT INTO cart (product_id, quantity) VALUES ($product_id, $quantity)");
    }

    header("Location: cart.php");
    exit;
} else {
    // If accessed via GET, redirect to home
    header("Location: index.php");
    exit;
}
