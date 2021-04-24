<?php
include "includes/handle_book_search.inc.php";
?>

<!DOCTYPE html>
<html>

<head>
	<title>Lucid Shop</title>
	<?php
	include "navbar.php";
	?>
</head>

<body>
	<div class="container">
		<?php
		foreach ($output["books"] as $b) {
			echo "<div>";
			echo "<h4>" . $b["title"] . "</h4>";
			echo "<p>Price: " . $b["unit_price"] . "</p>";
			echo "<img src='" . $b["img_url"] . "' alt='" . $b["title"] . "'>";
			echo "</div>";
		}
		?>
	</div>
</body>

</html>