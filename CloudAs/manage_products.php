<?php
include('/var/www/config/db_connect.php');

$S3_BASE_URL = "https://cloudasbucket2.s3.us-east-1.amazonaws.com/image/";

// Handle Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];

  // Only get image filename
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $filename = basename($_FILES["image"]["name"]);
    $safe_filename = preg_replace("/[^a-zA-Z0-9_\.-]/", "", $filename);
    $image_url = $S3_BASE_URL . $safe_filename;
  } else {
    $image_url = "";
  }

  $conn->query("INSERT INTO products (name, price, description, image_url) 
                VALUES ('$name', $price, '$desc', '$image_url')");
  header("Location: manage_products.php");
  exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM products WHERE product_id = $id");
  header("Location: manage_products.php");
  exit;
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
  $id = $_POST['product_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];

  $update_query = "UPDATE products SET name='$name', price=$price, description='$desc'";

  if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == 0) {
    $filename = basename($_FILES["new_image"]["name"]);
    $safe_filename = preg_replace("/[^a-zA-Z0-9_\.-]/", "", $filename);
    $image_url = $S3_BASE_URL . $safe_filename;
    $update_query .= ", image_url='$image_url'";
  }

  $update_query .= " WHERE product_id = $id";
  $conn->query($update_query);
  header("Location: manage_products.php");
  exit;
}

// Fetch all products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Products</title>
  <link rel="stylesheet" href="css/manageProducts.css">
  
</head>
<body>
  <?php include('header.php'); ?>
  <div class="container">
    <h1>Manage Products</h1>

    <!-- Add Product -->
    <h2>Add New Product</h2>
    <form method="post" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Name" required><br>
      <input type="number" step="0.01" name="price" placeholder="Price" required><br>
      <textarea name="description" placeholder="Description"></textarea><br>
      <input type="file" name="image" accept="image/*" required><br>
      <small>Note: Image must already exist on S3 with the same filename</small><br>
      <button type="submit" name="add_product">Add Product</button>
    </form>

    <hr>

    <!-- Product List -->
    <h2>All Products</h2>
    <table border="1" cellpadding="8">
      <tr>
        <th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Image</th><th>Actions</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <form method="post" enctype="multipart/form-data">
          <td>
            <?php echo $row['product_id']; ?>
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
          </td>
          <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
          <td><input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>"></td>
          <td><textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea></td>
          <td>
            <?php if ($row['image_url']): ?>
              <img src="<?php echo $row['image_url']; ?>" width="60"><br>
            <?php endif; ?>
            <input type="file" name="new_image" accept="image/*">
            <small>(Leave blank to keep current image)</small>
          </td>
          <td>
            <button type="submit" name="update_product">Update</button>
            <a href="manage_products.php?delete=<?php echo $row['product_id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
          </td>
        </form>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
  
  <?php include('footer.php'); ?>
</body>
</html>
