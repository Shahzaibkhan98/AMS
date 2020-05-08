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
			
			<a href="view.php" class="btn btn-primary">View</a>
			<a href="add.php" class="btn btn-primary pull-right">Add Employee</a>
			<form method="post">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<th>Attendance</th>
					</tr>
				</thead>

				<tbody>

					<?php  
						$query = "select * from emp";
						$result = $link->query($query);
						while ($show = $result->fetch_assoc()) {
							# code...
						
					?>
					<tr>
						<td><?php echo $show['name']; ?></td>
						<td><?php echo $show['fname']; ?></td>
						<td><?php echo $show['email']; ?></td>
						<td>
							Present <input required type="radio" name="attendance[<?php echo $show['emp_id'] ?>]"value="Present"> Absent <input required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent">
						</td>
					</tr>
				<?php } ?>

				</tbody>

				<?php  
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						 $att = $_POST['attendance'];
						$date = date('d-m-y');

						$query = "select distinct date from attendance";
						$result = $link->query($query);
						$b=false;
						if($result->num_rows>0){
							while ($check=$result->fetch_assoc()) {
								if($date == $check['date']){
									$b = true;
									echo "<div class='alert alert-danger'> 
										Attendance already taken today!!!;
									</div> ";
								}
							}
						}
						if(!$b){
							foreach ($att as $key => $value) {
								if($value=="Present"){
									$query="insert into attendance(value,emp_id,date) values('Present',$key,'$date')";
									$insertResult = $link->query($query);
								}else{
									$query="insert into attendance(value,emp_id,date) values('Absent',$key,'$date')";
									$insertResult = $link->query($query);
								}
							}
							if($insertResult){
								echo "<div class='alert alert-success'> 
									Attendance taken succesfully!!!;
								</div> ";
							}
						}
					}
				?>
			</table>

			<input class="btn btn-primary" type="submit" value="Take Attendance">
				
			</form>

		</div>
		<div class="panel-footer">
			
		</div>
	</div>

</body>
</html>