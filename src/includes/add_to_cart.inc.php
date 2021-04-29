<?php
// only only edit for logged-in customers
if ($_POST && isset($_POST["add-to-cart"]) && isset($_COOKIE["customer_id"])) {
  $book_id =  $_POST["book_id"];
  $customer_id =  $_COOKIE["customer_id"];

  // fetches a temporary cart belonging to a customer
  function fetchCart($conn, $cust_id)
  {
    // fetching the cart (only one should exist per customer)
    $cart_query = "SELECT * FROM Cart C WHERE C.cid = ? LIMIT 1";
    $cart_stmt = $conn->prepare($cart_query);
    $cart_stmt->bind_param("i", $cust_id);
    $cart_stmt->execute();
    $res = $cart_stmt->get_result();
    return $res;
  }

  // creates a cart for a customer
  function createCart($conn, $cust_id)
  {
    $create_cart = "INSERT INTO Cart (cid) VALUES (?);";
    $cart_stmt = $conn->prepare($create_cart);
    $cart_stmt->bind_param("i", $cust_id);
    $cart_stmt->execute();
  }

  // gets a book to cart
  function getBookToCart($conn, $cid, $bid)
  { // cart_id and book_id
    $get_book_query = "SELECT * FROM Book_to_Cart BtC WHERE BtC.bid = ? AND BtC.cart_id = ?";
    $get_book_stmt = $conn->prepare($get_book_query);
    $get_book_stmt->bind_param("ii", $bid, $cid);
    $get_book_stmt->execute();
    $res = $get_book_stmt->get_result();
    return $res;
  }

  // creates a book to cart
  function createBookToCart($conn, $cid, $bid)
  {
    $create_book_query = "INSERT INTO Book_to_Cart (bid, cart_id) VALUES (?, ?);";
    $create_book_stmt = $conn->prepare($create_book_query);
    $create_book_stmt->bind_param("ii", $bid, $cid);
    $create_book_stmt->execute();
  }

  // increments a book to cart unit count
  function incrementBookToCartUnit($conn, $cid, $bid)
  {
    $result = getBookToCart($conn, $cid, $bid);
    $book_to_cart_info = $result->fetch_all(MYSQLI_ASSOC)[0];
    $unit_count = $book_to_cart_info["units"];
    $unit_count += 1;
    echo $unit_count;
    $update_book_to_cart_query = "UPDATE Book_to_Cart BtC SET BtC.units = ? WHERE BtC.bid = ? AND BtC.cart_id = ? ;";
    $update_book_to_cart_stmt = $conn->prepare($update_book_to_cart_query);
    $update_book_to_cart_stmt->bind_param("iii", $unit_count, $bid, $cid);
    $update_book_to_cart_stmt->execute();
  }

  $result = fetchCart($conn, $customer_id);
  // if cart does not exist, create one
  if ($result->num_rows === 0) {
    createCart($conn, $customer_id);
  }

  $result = fetchCart($conn, $customer_id);
  $cart_info = $result->fetch_all(MYSQLI_ASSOC)[0];
  $cart_id = $cart_info["cart_id"];
  // get book_to_cart
  $result = getBookToCart($conn, $cart_id, $book_id);
  // if book_to_cart does not exist, create one
  if ($result->num_rows === 0) {
    createBookToCart($conn, $cart_id, $book_id);
  } else {
    // else increment the unit
    incrementBookToCartUnit($conn, $cart_id, $book_id);
  }
}
