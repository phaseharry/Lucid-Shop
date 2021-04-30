<?php
if ($_POST && isset($_POST["checkout"])) {
  $cart_id = $_POST["cart_id"];
  $customer_id = $_POST["customer_id"];

  echo $cart_id;
  echo $customer_id;
  // 1) fetch cart
  $fetch_cart_query = "SELECT B.bid, B.unit_price, BtC.units";
  $fetch_cart_query .= " FROM Cart C";
  $fetch_cart_query .= " JOIN Book_to_Cart BtC ON BtC.cart_id = C.cart_id";
  $fetch_cart_query .= " JOIN Book B ON BtC.bid = B.bid";
  $fetch_cart_query .= " WHERE C.cid = ? AND C.cart_id = ? ;";
  $cart_stmt = $conn->prepare($fetch_cart_query);
  $cart_stmt->bind_param("ii", $customer_id, $cart_id);
  $cart_stmt->execute();
  $result = $cart_stmt->get_result();
  $book_to_cart_info = $result->fetch_all(MYSQLI_ASSOC);
  // calculating total cost of order
  $total_cost = 0;
  foreach ($book_to_cart_info as $btc) {
    $total_cost += ($btc["unit_price"] * $btc["units"]);
  }
  // 2) create order
  $create_order_query = "INSERT INTO `Order` (cid, total_cost) VALUES (?, ?);";
  $create_order_stmt = $conn->prepare($create_order_query);
  $create_order_stmt->bind_param("id", $customer_id, $total_cost);
  $create_order_stmt->execute();
  $result = $create_order_stmt->get_result();
  var_dump($result);

  // 3) turn all book_to_cart's into book_to_order's

  // 4) delete cart
}
