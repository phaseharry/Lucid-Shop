<?php
	include_once "../dbconnect.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container">
	<div class="jumbotron">
		<h2>Lucid Shop (Insert some stock Image here)</h2>
	</div>
</div>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">

			<a class="navbar-brand" href="Index.php"> Lucid Shop </a>
			<form class="navbar-form navbar-left" method="POST" action="index.php" accept-charset="UTF-8">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search" name="user-input">
				</div>
				<span>
					<label>Search by: </label>
					<select class="form-group" name="attribute">
						<option>Title</option>
						<option>Author</option>
						<option>Category</option>
						<option>Publisher</option>
					</select>
				</span>
				<button type="submit" name="submit" class="btn btn-default">Submit</button>
			</form>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a> Welcome
						<?php
						if (isset($_COOKIE["user"])) {
							$q = "SELECT * FROM customer WHERE cid =".intval($_COOKIE["user"]);
							$p = $conn->query($q);
							$row = mysqli_fetch_array($p);

							echo $row["first_name"];
							$conn->close();
						} else {
							echo "Guest";
						}
						?>
					</a>
				</li>
				<?php
				if (isset($_COOKIE["user"])) {
					echo "<li><a href=''>Order History</a></li>";
					echo "<li><a href='logout.php'>Log Out</a></li>";
				} else {
					echo "<li><a href='login.php'>Login</a></li>";
					echo "<li><a href='sign_up.php'>Sign Up</a></li>";
				}
				?>
			</ul>
		</div>
	</nav>
</div>

<body>
</body>

</html>
