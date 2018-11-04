<?php 
	
	session_start();


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
		$_SESSION['username'] = $name;
		header('location: home.php');
	}else{
		header('location: login.php');
	}

 ?>