<?php
if ($_POST && isset($_POST["logout"])) {
  setcookie("email", "", time() - 3600);
  setcookie("first_name", "", time() - 3600);
  setcookie("customer_id", "", time() - 3600);
  header("Location: login.php");
}
?>
