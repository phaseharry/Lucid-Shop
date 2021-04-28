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
			<button id='book_id_<?php echo $b["bid"] ?>' type='button' name="add-to-cart" class="btn btn-default">Add to cart</button>
			<script type="text/JavaScript">
				document.getElementById('book_id_<?php echo $b["bid"] ?>').addEventListener('click', () => {
					let cart = JSON.parse(localStorage.getItem('lucidCart'));
					if(!cart) { // if cart does not exist, create it
						cart = {};
					}
					if(!(`book_id_<?php echo $b["bid"] ?>` in cart)) { // if book is not in cart, add its book id to cart and set it equal to 1
						cart[`book_id_<?php echo $b["bid"] ?>`] = 1;
					} else {
						cart[`book_id_<?php echo $b["bid"] ?>`] += 1; // if it is in the cart, increment the count
					}
					localStorage.setItem('lucidCart', JSON.stringify(cart));
					alert(`Added "<?php echo $b["title"] ?>" to your cart`);
				})
			</script>
		<?php
		}
		?>
	</div>
</body>

</html>