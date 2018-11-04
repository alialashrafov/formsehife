<?php 

session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

$con = mysqli_connect('localhost','root','marmara97');

mysqli_select_db($con,'quizdbase')

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<br><h1 class="text-center text-primary">Alex WebDeveloper Quiz</h1><br>
	<h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?></h2> <br>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 m-auto d-block">
	<div class="card">
		<h3 class="text-center card-header">Welcome <?php echo $_SESSION['username']; ?>, you have to select only one out of 4. Best of Luck :)</h3>
	</div><br>

	<form action="check.php" method="POST">
	<?php 
	for ($i=1; $i < 6 ; $i++) { 
	$q = "SELECT * FROM questions where qid = $i";
	$query = mysqli_query($con, $q);

	while ($rows = mysqli_fetch_array($query)){

		 ?>

		 <div class="card">
		 	<h4 class="card-header"><?php echo $rows['question']; ?></h4>
		 	
		 	<?php 

		 	 $q = "SELECT * FROM answers where ans_id = $i";
			 $query = mysqli_query($con, $q);

			 while ($rows = mysqli_fetch_array($query)){

		 	 ?>

		 	 <div class="card-body">
		 	 	<input type="radio" name="quizcheck[<?php echo $rows['ans_id'] ?>]" value="<?php echo $rows['aid']; ?>">
		 	 	<?php echo $rows['answer']; ?>
		 	 </div>	
	<?php 
		}
	}
}

	 ?>
	 <input type="submit" name="submit" value="submit" class="btn btn-success m-auto d-block">

	</form>
	</div>
	</div><br><br>
	<div class="m-auto d-block">
	<a href="logout.php" class="btn btn-primary"> LOGOUT </a>
</div><br>
<div>
	<h5 class="text-center">©2018 AlexWebKing</h5>
</div><br><br>
</div>
</body>
</html>