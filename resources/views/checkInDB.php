<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tb1wbd";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$str = $_GET["str"];
	$whattosearch = $_GET["whattosearch"];

	//cari username di DB
	$sqlSearchStr =
		"SELECT *
		FROM users
		WHERE " . $whattosearch . " = '" . $str . "'";

	$message = "";

	if ($result = $conn->query($sqlSearchStr)) {
		if ($result->num_rows > 0) {
			$message = $whattosearch . " already exists";
		} else {
			$message = "<br>";
		}
	} else {
		echo "fail";
	}

	echo $message . "<br>";

	//Close connection
	mysqli_close($conn);

?>