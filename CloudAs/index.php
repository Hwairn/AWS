<?php
// Connect to database
$conn = new mysqli('labdb.cbylaqwzhjby.us-east-1.rds.amazonaws.com', 'hwaiearn', 'lab-password', 'cloud');

$result = $conn->query("SELECT * FROM products LIMIT 3"); // Fetch 3 featured products
?>

<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<?php include('header.php'); ?>
<body>
  <h1>Welcome to TARUMT Store!</h1>
  
  <div class="container">
  <h2>Featured Products</h2>
  <div class="product-grid">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="product-card">
        <img src="<?php echo $row['image_url']; ?>" width="100%">
        <h3><?php echo $row['name']; ?></h3>
        <p>$<?php echo $row['price']; ?></p>
        <a class="btn" href="product.php?id=<?php echo $row['product_id']; ?>">View</a>
      </div>
    <?php endwhile; ?>
  </div>
</div>

</body>
<?php include('footer.php'); ?>
</html>
