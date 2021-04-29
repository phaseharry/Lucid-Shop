<!DOCTYPE html>
<html>

<head>
  <title>
    <?php
    $guest_title = isset($_COOKIE["first_name"]) ? $_COOKIE["first_name"] . "'s" : 'Guest';
    echo $guest_title . " Cart";
    ?>
  </title>
  <?php
  include "navbar.php";
  ?>
</head>

<body>
  <h2>Cart</h2>
  <?php
  ?>
</body>

</html>