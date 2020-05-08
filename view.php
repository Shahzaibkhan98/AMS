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
			
			<a href="#" class="btn btn-primary">View</a>
			<a href="add.php" class="btn btn-primary pull-right">Add Employee</a>
			<form method="post">
			<table class="table">
				<thead>
					<tr>
						<th>SR No.</th>
						<th>Date</th>
						<th>View</th>
					</tr>
				</thead>

				<?php  
					$query = "select distinct date from attendance";
					$result = $link->query($query);

					if($result->num_rows>0){
						$i=0;
						while ($val=$result->fetch_assoc()) {
							$i++;
					
				?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $val['date']; ?></td>
					<td><a href="viewp.php?date=<?php echo $val['date'] ?>" class="btn btn-primary">View </a></td>
				</tr>
			<?php } } ?>

		</div>
		<div class="panel-footer">
			
		</div>
	</div>

</body>
</html>