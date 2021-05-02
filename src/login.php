<?php
//include (form handler) 
include "includes/form_handler.inc.php";
include "includes/logout.inc.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<style type="text/css">
	form {
		border: 3px solid #f1f1f1;
	}

	input[type=text],
	input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	button {
		background-color: #7679ae;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
	}

	button:hover {
		opacity: 0.8;
	}
</style>

<head>
</head>

<body>
	<div class="container">
		<h1>Log-In</h1>
		<form method="POST" action="login.php" accept-charset="UTF-8">
			<p>
				<!-- Username -->
				<label><b>Username:</b>
					<input type="text" name="username" size="20" maxlength="20" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['username'])) ? $input['username'] : ''; ?>
					</small>
				</label>
			</p>
			<p>
				<!-- Password -->
				<label><b>Password:</b>
					<input type="password" name="password" size="20" maxlength="20">
					<small style="color:red">
						<?php echo (isset($input['password'])) ? $input['password'] : ''; ?>
					</small>
				</label>
			</p>
			<p>
				<!-- Button -->
				<button type="submit" name="submit" value="Log In">Login</button>
			</p>
		</form>
	</div>

</body>

</html>
