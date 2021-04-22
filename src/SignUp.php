<?php
	//include (form handler) 
	include "includes/NewPerson_handler.inc.php";
	include "navbar.php"; 
?>
<!DOCTYPE html>
<html>
<style type="text/css">
	form{
		border: 3px solid #f1f1f1;
	}
	input[type=text], input[type=password]{
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
	button:hover{
		opacity: 0.8;
	}
</style>
<head>
</head>
<body>
	<div class="container">
		<h1>Sign Up</h1>
		<form method="POST" action="SignUp.php" accept-charset="UTF-8">
			<p>
				<label><b>First Name:</b></label>
					<input type="text" name="first_name" size="20" maxlength = "20"  value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['first_name'])) ? $input['first_name'] : ''; ?>
					</small>
			</p>	
			<p>
				<label><b>Last Name:</b></label>
					<input type="text" name="last_name" size="20" maxlength = "20"  value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['last_name'])) ? $input['last_name'] : ''; ?>
					</small>
			</p>	
			<p> <!-- Username -->	
				<label><b>Email Address:</b>
					<input type="text" name="username" size="20" maxlength = "20"  value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['username'])) ? $input['username'] : ''; ?>
					</small>
					<small>
						<br> Pleas Enter Your Email Address. This will be your username.
						</ul>
					</small>
				</label> 
			</p>
			<p> <!-- Password -->
				<label><b>Password:</b>
					<input type="password" name="password" size="20" maxlength ="20"> 
					<small style="color:red">
						<?php echo (isset($input['password'])) ? $input['password'] : ''; ?>
					</small>
					<small>
						<br> Your password must contain:
						<ul>
							<li>A least 1 Uppercase Character</li>
							<li>A least 1 lowercase Character</li>
							<li>A least 1 number</li>
							<li>A least 1 special character</li>
						</ul>
					</small>
				</label>
			</p>
				<label><b>Confirm Password:</b>
					<input type="password" name="password_verify" size="20" maxlength ="20"> 
					<small style="color:red">
						<?php echo (isset($input['password_verify'])) ? $input['password_verify'] : ''; ?>
					</small>
					<small>
						<br> Please enter the same password to verify.
					</small>
				</label>			
				<p>
				<label><b>Address:</b></label>
					<input type="text" name="address" size="20" maxlength = "40"  value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['address'])) ? $input['address'] : ''; ?>
					</small>
				</p>
				<p>
				<label><b>Age:</b></label>
					<input type="text" name="age" size="5" maxlength = "10"  value="<?php echo (isset($_POST['age'])) ? $_POST['age'] : '' ?>">
					<small style="color:red">
						<?php echo (isset($input['age'])) ? $input['age'] : ''; ?>
					</small>
				</p>
				<p>
					<input type="radio" name="gender" value="male">
					<label for="male">Male</label>
					<input type="radio" name="gender" value="female">
					<label for="female">Female</label>
					<input type="radio" name="gender" value="other">
					<label for="other">Other</label>
				</p>
			<p> <!-- Button -->
				<button type="submit" name="submit" value="Sign-Up">Sign-Up</button>
			</p>
		</form>
	</div>

</body>
</html>