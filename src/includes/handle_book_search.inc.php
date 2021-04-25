<?php
include_once "../dbconnect.php";

if ($_POST && isset($_POST['submit']) && $_POST['user-input']) {
  echo $_POST['user-input'];
  echo $_POST['attribute'];
} else {
  $fetch_all_books = "SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', a.last_name) AS author_name";
  $fetch_all_books .= " FROM Book B";
  $fetch_all_books .= " JOIN Author A ON B.author_id = A.author_id";

  $stmt = $conn->prepare($fetch_all_books);
  $stmt->execute();
  $results = $stmt->get_result();
  $books = $results->fetch_all(MYSQLI_ASSOC);
  $output["books"] = $books;
}
