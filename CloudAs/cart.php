<?php
include('/var/www/config/db_connect.php');

// Fetch all items in the single-user cart
$result = $conn->query("
  SELECT cart.cart_id, products.name, products.price, cart.quantity
  FROM cart
  JOIN products ON cart.product_id = products.product_id
");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Cart</title>
  <link rel="stylesheet" href="css/cart.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="containers">
  <h2>Your Shopping Cart</h2>

  <?php if ($result->num_rows === 0): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <table>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
      </tr>

      <?php while($row = $result->fetch_assoc()): ?>
        <?php
          $subtotal = $row['price'] * $row['quantity'];
          $total += $subtotal;
        ?>
        <tr>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td>RM<?php echo number_format($row['price'], 2); ?></td>
          <td>
            <form action="update_cart.php" method="post" style="display: inline-flex;">
              <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
              <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" style="width: 60px;">
              <button type="submit">Update</button>
            </form>
          </td>
          <td>RM<?php echo number_format($subtotal, 2); ?></td>
          <td>
            <a class="btn" href="remove_from_cart.php?cart_id=<?php echo $row['cart_id']; ?>" onclick="return confirm('Remove this item?');">Remove</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>

    <h2>Total: RM<?php echo number_format($total, 2); ?></h2>

    <form action="checkout.php" method="post">
      <input type="hidden" name="total_price" value="<?php echo $total; ?>">
      <button type="submit">Proceed to Payment</button>
    </form>
  <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>
