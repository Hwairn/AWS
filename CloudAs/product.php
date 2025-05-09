<?php
// Include database and get product by ID
include('/var/www/config/db_connect.php');
$id = $_GET['id'] ?? 1;
$product = $conn->query("SELECT * FROM products WHERE product_id = $id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $product['name']; ?> | TARUMT Shop</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <?php include('header.php'); ?>

  <main class="product-page">
    <div class="product-box">
      <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
      <h2><?php echo $product['name']; ?></h2>
      <p><?php echo $product['description']; ?></p>
      <div class="price">RM<?php echo number_format($product['price'], 2); ?></div>
      <form action="add_to_cart.php" method="post">
      <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
      <label>Quantity:</label>
      <input type="number" name="quantity" value="1" min="1">
      <button type="submit" class="addtocart_btn">Add to Cart</button>
    </form>
      <a class="view-cart" href="cart.php">🛒 View Cart</a>
    </div>
  </main>

  <?php include('footer.php'); ?>
</body>
</html>
