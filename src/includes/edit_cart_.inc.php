<?php

if ($_POST) {
  $book_id = $_POST["book_id"];
  $cart_id = $_POST["cart_id"];
  $units_in_cart = $_POST["unit_count"];

  // setup for updating the unit attribute of a Book_to_Cart row
  $update_book_to_cart_query = "UPDATE Book_to_Cart BtC";
  $update_book_to_cart_query .= " SET BtC.units = ? ";
  $update_book_to_cart_query .= " WHERE BtC.bid = ? AND BtC.cart_id = ? ;";
  $stmt = $conn->prepare($update_book_to_cart_query);
  if (isset($_POST["increment_book_count"])) {
    $units_in_cart++;
    $stmt->bind_param("iii", $units_in_cart, $book_id, $cart_id);
    $stmt->execute();
    $result = $stmt->get_result();
  } else if (isset($_POST["decrement_book_count"])) {
    $units_in_cart--;
    if ($units_in_cart === 0) { // if units is zero, delete the book_to_cart
      $delete_book_to_cart_query = "DELETE FROM Book_to_Cart WHERE bid = ? AND cart_id = ? ;";
      $stmt = $conn->prepare($delete_book_to_cart_query);
      $stmt->bind_param("ii", $book_id, $cart_id);
      $stmt->execute();
      $result = $stmt->get_result();
    } else { // else update it
      $stmt->bind_param("iii", $units_in_cart, $book_id, $cart_id);
      $stmt->execute();
      $result = $stmt->get_result();
    }
  }
}
