<?php 
	
	session_start();
	header('location: login.php');

	$con = mysqli_connect('localhost', 'root', 'marmara97');
	if ($con) {
		echo "connection successfully";
	}else {
		echo "connection is failed";
	}

	mysqli_select_db($con, 'sessionpractical');

	$name = $_POST['user'];
	$pass = $_POST['password'];

	$q = "SELECT * FROM signin WHERE name = '$name' && password = '$pass' ";

	$result = mysqli_query($con, $q);

	$num = mysqli_num_rows($result);
	if ($num == 1) {
		echo "duplicate data;";
	}else{
		$qy = "INSERT INTO signin(name, password) VALUES ('$name', '$pass')";
		mysqli_query($con, $qy);
	}

 ?>