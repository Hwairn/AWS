<?php
include('db_connect.php'); // Replaces direct connection code

// Handle Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];

  // Handle file upload
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "image/";
    $filename = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . time() . "_" . $filename;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  } else {
    $target_file = ""; // fallback if upload fails
  }

  $conn->query("INSERT INTO products (name, price, description, image_url) VALUES ('$name', $price, '$desc', '$target_file')");
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
    $target_dir = "image/";
    $filename = basename($_FILES["new_image"]["name"]);
    $target_file = $target_dir . time() . "_" . $filename;

    move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file);

    $update_query .= ", image_url='$target_file'";
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
<head><title>Manage Products</title></head>
<body>
  <h1>Manage Products</h1>

  <!-- Add Product -->
  <h2>Add New Product</h2>
  <form method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name" required><br>
  <input type="number" step="0.01" name="price" placeholder="Price" required><br>
  <textarea name="description" placeholder="Description"></textarea><br>
  <input type="file" name="image" accept="image/*" required><br>
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
    <td><?php echo $row['product_id']; ?><input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"></td>
    <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
    <td><input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>"></td>
    <td><textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea></td>
    <td>
      <?php if ($row['image_url']): ?>
        <img src="<?php echo $row['image_url']; ?>" width="60"><br>
      <?php endif; ?>
      <input type="file" name="new_image" accept="image/*">
    </td>
    <td>
      <button type="submit" name="update_product">Update</button>
      <a href="manage_products.php?delete=<?php echo $row['product_id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
    </td>
  </form>
</tr>
<?php endwhile; ?>

  </table>
</body>
</html>
