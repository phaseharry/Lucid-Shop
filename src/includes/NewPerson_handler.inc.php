<?php
include_once "../dbconnect.inc.php";
//sanitize function
function sanitize($str)
{
	$str = trim($str);
	$str = stripcslashes($str);
	$str = htmlspecialchars($str);

	return $str;
}

//form handler
$input = [];
if ($_POST && isset($_POST['submit'])) {
	if (empty($_POST['username'])) {
		$input['username'] = "Missing Username!";
	}
	if (empty($_POST['password'])) {
		$input['password'] = "Empty field!";
	}
	if (empty($_POST['password_verify'])) {
		$input['password_verify'] = "Empty field!";
	}
	if (empty($_POST['first_name'])) {
		$input['first_name'] = "First Name is required!";
	}
	if (empty($_POST['last_name'])) {
		$input['last_name'] = "Last Name is required!";
	}

	$first_name = sanitize($_POST['first_name']);
	$last_name = sanitize($_POST['last_name']);
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$password2 = sanitize($_POST['password_verify']);
	$address = sanitize($_POST['address']);
	$age = intval(sanitize($_POST['age']));
	$gender = $_POST['gender'];

	$num_custom = $conn->query("SELECT COUNT(cid) FROM customer");
	$count = mysqli_fetch_array($num_custom);
	$cid = intval($count["COUNT(cid)"]) + 1;
	/*var_dump($test);*/
	//echo $test["COUNT(cid)"]+1;

	$S_pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

	/* Check if Person matches the pattern*/
	if (($password == $password2) && (!empty($first_name)) && (!empty($last_name))) {
		/* Pregmatch a whole lot of stuff*/
		if ((preg_match($S_pattern, $password)) && (preg_match('/[A-Z]/', $password)) && (preg_match('/[a-z]/', $password)) && (preg_match('/[\d]/', $password))) {
			if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

				//DO THING TO MAKE NEW PERSON in RECORD
				$q =  "INSERT INTO Customer (cid, email, password, first_name, last_name, address, age, gender) VALUES (" . $cid . ",'" . $username . "','" . $password . "','" . $first_name . "','" . $last_name . "','" . $address . "'," . $age . ",'" . $gender . "')";
				if ($conn->query($q) === TRUE) {
					//THAN REDIRECT TO LOGIN SCREEN
					header("Location: Login.php");
				} else {
					echo "Error";
				}
			} else {
				$input['username'] = "Your Username does not meet the requirements";
			}
		} else {
			$input['password'] = "Your Password does not meet the requirements";
		}
	} else {
		$input['password'] = "Your Passwords are not the same!";
		$input['password_verify'] = "Your Passwords are not the same!";
	}
}
