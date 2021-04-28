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
		?>
			<div>
				<h4><?php echo $b["title"] ?></h4>
				<p><?php echo "Price:" . $b["unit_price"]; ?></p>
				<p><?php echo "Author: " . $b["author_name"]; ?></p>
				<img src='<?php echo $b["img_url"]; ?>' alt='<?php $b["title"] ?>'>
			</div>
			<!-- <form action=""> -->
			<input type='hidden' name='book_id' value='<?php echo $b["bid"]; ?>'>
			<select class="form-group" name='quantity'>
				<?php
				for ($i = 1; $i <= 10; $i++) {
				?>
					<option value='<?php echo $i ?>'><?php echo $i ?></option>
				<?php
				}
				?>
			</select>
			<button id='<?php echo $b["bid"] ?>' type='button' name="add-to-cart" class="btn btn-default">Add to cart</button>
			<!-- </form> -->
			<script type="text/JavaScript">
				document.getElementById('<?php echo $b["bid"] ?>').addEventListener('click', () => {
				alert('Added "<?php echo $b["title"] ?>" to your cart');
			})
			</script>
		<?php
		}
		?>
	</div>
</body>

</html>