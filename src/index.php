<?php
include "includes/handle_book_search.inc.php";
include "includes/add_to_cart.inc.php";
?>

<!DOCTYPE html>
<html>

<head>
	<title>Lucid Shop</title>
	<?php
	include "navbar.php";
	?>
	<script>
		function getCookie(name) {
			const value = `; ${document.cookie}`;
			const parts = value.split(`; ${name}=`);
			if (parts.length === 2) return parts.pop().split(';').shift();
		}
	</script>
</head>

<body>
	<div class="container book-container">
		<?php
		foreach ($output["books"] as $b) {
		?>
			<div class="book-item">
				<div>
					<h4><?php echo $b["title"]; ?></h4>
					<img src='<?php echo $b["img_url"]; ?>' alt='<?php $b["title"]; ?>' class="book-img">
					<p><?php echo "Price:" . $b["unit_price"]; ?></p>
					<p><?php echo "Author: " . $b["author_name"]; ?></p>
				</div>
				<form method="POST" action="index.php" accept-charset="UTF-8">
					<input type="hidden" name="book_id" value="<?php echo $b["bid"]; ?>">
					<button id='book_id_<?php echo $b["bid"]; ?>' type='submit' name="add-to-cart" class="btn btn-default">Add to cart</button>
				</form>
				<script>
					document.getElementById("book_id_<?php echo $b["bid"]; ?>").addEventListener("click", () => {
						const customer_id = getCookie("customer_id");
						if (customer_id) {
							alert(`"<?php echo $b["title"]; ?>" has been added to your cart`);
						} else {
							alert(`Please log in to add "<?php echo $b["title"]; ?>" to your cart`);
						}
					})
				</script>
			</div>
		<?php
		}
		?>
	</div>
</body>

</html>