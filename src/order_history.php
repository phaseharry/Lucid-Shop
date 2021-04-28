<?php
// if the user is a guest and they somehow enter the order history page, redirect them
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
    echo $_COOKIE["first_name"] . "'s";
    ?>
    Order History
  </title>
  <?php
  include "navbar.php";
  ?>
</head>

<body>
  <h1>Order History</h1>
</body>
<div>
  <?php
  $customer_id = $_COOKIE["customer_id"];
  $order_query = "SELECT O.order_number, O.order_date, O.total_cost FROM `Order` O WHERE O.cid = ? ;";
  $stmt = $conn->prepare($order_query);
  $stmt->bind_param("i", $customer_id);
  $stmt->execute();
  $results = $stmt->get_result();
  $orders = $results->fetch_all(MYSQLI_ASSOC);
  foreach ($orders as $o) {
    $order_num = $o["order_number"];
    echo "<div>";
    echo "<h4>Order #" . $order_num . "</h4>";
    echo "<p>Ordered on " . $o["order_date"] . "</p>";
    echo "<p>Total: $" . $o["total_cost"] . "</p>";
    $books_query = "SELECT B.title, B.img_url, B.unit_price, BTO.count_ordered ";
    $books_query .= "FROM book_to_order BTO ";
    $books_query .= "JOIN Book B ON BTO.bid = B.bid ";
    $books_query .= "WHERE BTO.order_number = ? ;";
    $stmt = $conn->prepare($books_query);
    $stmt->bind_param("i", $order_num);
    $stmt->execute();
    $results = $stmt->get_result();
    $books = $results->fetch_all(MYSQLI_ASSOC);
    foreach ($books as $b) {
      echo "<div>";
      echo "<h4>" . $b["title"] . "</h4>";
      echo "<p>Price: " . $b["unit_price"] . "</p>";
      echo "<p>Units Ordered: " . $b["count_ordered"] . "</p>";
      echo "<img src='" . $b["img_url"] . "' alt='" . $b["title"] . "'>";
      echo "</div>";
    }
  }
  ?>

</div>

</html>