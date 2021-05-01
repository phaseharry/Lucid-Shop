<?php
if (!isset($_COOKIE["customer_id"])) {
  header("Location: index.php");
}
include_once "../dbconnect.php";
include "includes/edit_cart_.inc.php";
include "includes/checkout.inc.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>
    <?php
    $guest_name = $_COOKIE["first_name"];
    echo $guest_name . "'s Cart";
    ?>
  </title>
  <?php
  include "navbar.php";
  ?>
</head>

<body>
  <div class="container">
    <h2>Cart</h2>
    <div class="book-container">
      <?php
      $customer_id = $_COOKIE["customer_id"];
      $cart_query = " SELECT B.bid, B.title, B.unit_price, B.img_url, BtC.units, C.cart_id ";
      $cart_query .= " FROM Cart C";
      $cart_query .= " JOIN Book_to_Cart BtC ON BtC.cart_id = C.cart_id";
      $cart_query .= " JOIN Book B ON BtC.bid = B.bid";
      $cart_query .= " WHERE C.cid = ? ;";
      $cart_stmt = $conn->prepare($cart_query);
      $cart_stmt->bind_param("i", $customer_id);
      $cart_stmt->execute();
      $result = $cart_stmt->get_result();
      $books_in_cart = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($books_in_cart as $b) {
      ?>
        <div class="book-item">
          <div>
            <h4><?php echo $b["title"] ?></h4>
            <img src='<?php echo $b["img_url"]; ?>' alt='<?php $b["title"]; ?>' class="book-img">
            <p><?php echo "Price:" . $b["unit_price"]; ?></p>
            <p>Copies: <?php echo $b["units"] ?></p>
            <form method="POST" action="cart.php" accept-charset="UTF-8">
              <input type="hidden" name="book_id" value="<?php echo $b["bid"]; ?>">
              <input type="hidden" name="cart_id" value="<?php echo $b["cart_id"]; ?>">
              <input type="hidden" name="unit_count" value="<?php echo $b["units"]; ?>">
              <button type="submit" name="decrement_book_count" class="btn btn-default">-</button>
              <button type="submit" name="increment_book_count" class="btn btn-default">+</button>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <form method="POST" action="cart.php">
      <input type="hidden" name="cart_id" value="<?php echo $b["cart_id"]; ?>">
      <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
      <button type="submit" name="checkout" class="btn btn-default">Checkout</button>
    </form>
  </div>
</body>

</html>