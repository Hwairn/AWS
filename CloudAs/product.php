<?php
$conn = new mysqli('localhost', 'root', '', 'cloudDB');
$product_id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE product_id = $product_id");
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Product Detail</title></head>
<?php include('header.php'); ?>
<body>
  <div class="container">
  <div class="product-card">
    <img src="<?php echo $product['image_url']; ?>" width="300">
    <h1><?php echo $product['name']; ?></h1>
    <p><?php echo $product['description']; ?></p>
    <h2>$<?php echo $product['price']; ?></h2>

    <form action="add_to_cart.php" method="post">
      <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
      <label>Quantity:</label>
      <input type="number" name="quantity" value="1" min="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
</div>


  <a href="cart.php">View Cart</a>
</body>
<?php include('footer.php'); ?>
</html>
