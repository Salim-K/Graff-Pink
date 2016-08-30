<?php session_start();
	include 'includes/db.php';
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				if(mysqli_num_rows($run_sql) == 1 ){
					if($rows['role'] == 'admin'){
					} else {
						header('Location:../index.php');
					}
				} else{
					header('Location:../index.php');
				}
			}
		}
	} else {
		header('Location:../index.php');
	}
	$result = '';

	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
		<script src="../../js/jquery.js"></script>
		<script src="../../bootstrap/js/bootstrap.js"></script>
		<script>
			
		</script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/sidebar.php';?>
		<div class="col-sm-10">
		<div style="width:50px;height:50px;"></div>
		<?php 
			echo $result;
		?>
			<!------ Users Area --->
			<!------ Post lists Starts----->
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Slide Show</h3></div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								
								<th>Image</th>
								<th>Heading</th>
								<th>Edit Slide</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
								//$sql = "SELECT * FROM posts ORDER BY ID DESC";
								$sql = "SELECT * FROM slide";
								$run = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_assoc($run)){
									echo '
									<tr>
										
										<td>'.($rows['image'] == '' ? 'No Image' : '<img src="../'.$rows['image'].'" width="150px">').'</td>
										<td>'.$rows['title'].'</td>
									
										<td><a href="edit_slide.php?edit_id='.$rows['id'].'" class="btn btn-warning btn-lg navbar-btn">Edit</a></td>
										
									</tr>
									';
									
								}
							?>
							
							
						</tbody>
					</table>
				</div>
			</div>
			
			
		</div>
		<footer></footer>
	</body>
</html>