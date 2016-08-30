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
		
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/sidebar.php';?>
		<div class="col-sm-10">
		<div style="width:50px;height:50px;"></div>
			<?php echo $result; ?>
			<div class="col-lg-8">
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<h4>About Us</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Title</th>
									<th>Content</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$sql = "SELECT * FROM about";
								$run = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_assoc($run)){
                                    
                                      $a_title = $rows['a_title'];
                                      $a_content = $rows['a_content'];
								
									echo '
									<tr>
										<td>'.$a_title.'</td>
                                        <td>'.substr($a_content,0,90).'.....</td>
										<td><a href="edit_about.php?cat_id='.$rows['about_id'].'" class="btn btn-warning btn-xs">Edit</a></td>
									
									</tr>
									';
								}
							?>
								
							</tbody>
						</table>
					</div>
					
				</div>
			</div>

		</div>
		
		<footer></footer>
	</body>
</html>