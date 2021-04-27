<?php
	if (isset($_COOKIE["user"])){
		setcookie("user","",time() -3600);
	} else {
		echo "You are not logged in";
	}
	header("Location: Index.php");
?>