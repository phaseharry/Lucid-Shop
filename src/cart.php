<?php
if (!isset($_COOKIE["customer_id"])) {
  header("Location: index.php");
}
include_once "../dbconnect.php";

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
  <h2>Cart</h2>
  <div>

    <?php
    $customer_id = $_COOKIE["customer_id"];
    echo $customer_id;
    $cart_query = " SELECT B.bid, B.title, B.unit_price, B.img_url, BtC.units ";
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
      <div>
        <div>
          <h4><?php echo $b["title"] ?></h4>
          <img src='<?php echo $b["img_url"]; ?>' alt='<?php $b["title"]; ?>'>
          <p><?php echo "Price:" . $b["unit_price"]; ?></p>
          <p>Copies: <?php echo $b["units"] ?></p>
          <button>-</button>
          <button>+</button>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</body>

</html>