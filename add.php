<?php  
	include_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<!--	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css"> -->
<!--	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script> -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript" src="bootstrap/jquery-3.3.1.min.js"></script>
</head>
<body>

	<div class="panel panel-default container">
		<div class="panel-heading">
			 
			<h1 style="text-align: center;">Attendance Management System</h1>

		</div>

		<div class="panel-body">

			<?php  

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name = $_POST['name'];
					$fname = $_POST['fname'];
					$email = $_POST['email'];

					if($name=="" || $fname=="" || $email==""){
						echo "<div class='alert alert-danger'> 
							Fields must not be empty;
						</div> ";
					}
					else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
						echo "<div class='alert alert-danger'> 
							Invalid email format!!!;
						</div> ";
					}
					else{
						$query = "insert into emp(name,fname,email) values('$name','$fname','$email')";
						$result = $link->query($query);
						if($result){
							echo "<div class='alert alert-success'> 
								Data inserted successfully;
							</div> ";
						}
					}
				}
			?>

			<form method="post">
				<a href="#" class="btn btn-primary">View</a>
				<a href="indexx.php" class="btn btn-primary pull-right">Back</a>

				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="name">Father Name:</label>
					<input type="text" name="fname" class="form-control">
				</div>

				<div class="form-group">
					<label for="name">Email:</label>
					<input type="text" name="email" class="form-control">
				</div>

				<input type="submit" name="" class="btn btn-primary">
			</form>
		</div>
		
		<div class="panel-footer">
			
		</div>
	</div>

</body>
</html>