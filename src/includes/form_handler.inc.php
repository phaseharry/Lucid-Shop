<?php
include_once "../dbconnect.php";
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
		$input['password'] = "Missing Password!";
	}
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);

	$q = 'SELECT * FROM customer WHERE email="' . $username . '" AND password="' . $password . '" LIMIT 1';

	$test = $conn->query($q);
	$rows = mysqli_fetch_array($test);

	if (!empty($rows)) {
		//set cookie
		setcookie("user", $rows["first_name"], time() + 3600);
		$conn->close();
		header("Location: Index.php");
	} else {
		$input['username'] = "Incorrect Password or Username!";
		$input['password'] = "Incorrect Password or Username!";
	}
} else {
}
