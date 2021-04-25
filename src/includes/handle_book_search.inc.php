<?php
include_once "../dbconnect.php";

if ($_POST && isset($_POST["submit"]) && $_POST["user-input"]) {
  define("TITLE", "Title");
  define("AUTHOR", "Author");
  define("CATEGORY", "Category");
  define("PUBLISHER", "Publisher");
  $query = "SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', a.last_name) AS author_name";
  $books = [];
  if ($_POST["attribute"] === TITLE) { // find books by title
    $title = $_POST['user-input'];
    $query .= " FROM Book B";
    $query .= " JOIN Author A ON B.author_id = A.author_id";
    $query .= " WHERE B.title = ? ;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $results = $stmt->get_result();
    $books = $results->fetch_all(MYSQLI_ASSOC);
  } else if ($_POST["attribute"] === AUTHOR) { // find books by author
    $author_name = $_POST['user-input'];
    $query .= " FROM Author A";
    $query .= " JOIN Book B ON B.author_id = A.author_id";
    $query .= " WHERE A.first_name = ? OR A.last_name = ? OR CONCAT(A.first_name, ' ', a.last_name) = ? ;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $author_name, $author_name, $author_name);
    $stmt->execute();
    $results = $stmt->get_result();
    $books = $results->fetch_all(MYSQLI_ASSOC);
  } else if ($_POST["attribute"] === CATEGORY) { // find books by category
    $category = $_POST['user-input'];
    $query .= " FROM Category C";
    $query .= " JOIN Book_to_Category BtC ON BtC.category_id = C.category_id";
    $query .= " JOIN Book B ON Btc.bid = B.bid";
    $query .= " JOIN Author A ON A.author_id = B.author_id";
    $query .= " WHERE C.category_name = ? ;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $results = $stmt->get_result();
    $books = $results->fetch_all(MYSQLI_ASSOC);
  } else if ($_POST["attribute"] === PUBLISHER) { // find books by publisher
    $publisher = $_POST['user-input'];
    $query .= " FROM Publisher P";
    $query .= " JOIN Book B ON B.publisher_id = P.publisher_id";
    $query .= " JOIN Author A ON A.author_id = B.author_id";
    $query .= " WHERE P.publisher_name = ? ;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $publisher);
    $stmt->execute();
    $results = $stmt->get_result();
    $books = $results->fetch_all(MYSQLI_ASSOC);
  }
  $output['books'] = $books;
} else {
  // fetch all books
  $fetch_all_books = "SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', a.last_name) AS author_name";
  $fetch_all_books .= " FROM Book B";
  $fetch_all_books .= " JOIN Author A ON B.author_id = A.author_id;";

  $stmt = $conn->prepare($fetch_all_books);
  $stmt->execute();
  $results = $stmt->get_result();
  $books = $results->fetch_all(MYSQLI_ASSOC);
  $output["books"] = $books;
}
