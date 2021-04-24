<?php
include_once "../dbconnect.php";

function sanitizeQuery($str)
{
  $str = trim($str);
  $str = stripcslashes($str);
  $str = htmlspecialchars($str);
  return $str;
}

if ($_POST && isset($_POST['submit']) && $_POST['user-input']) {
  echo $_POST['user-input'];
  echo $_POST['attribute'];
} else {
  $fetch_all_books = "SELECT B.bid, B.title, B.img_url, B.unit_price FROM Book B";
  $stmt = $conn->prepare($fetch_all_books);
  $stmt->execute();
  $results = $stmt->get_result();
  $books = $results->fetch_all(MYSQLI_ASSOC);
  $output["books"] = $books;
}
