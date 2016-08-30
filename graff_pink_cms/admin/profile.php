<?php session_start();
	include 'includes/db.php';
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$user_f_name = $rows['user_f_name'];
				$user_l_name = $rows['user_l_name'];
				$user_gender = $rows['user_gender'];
				$user_phone_no = $rows['user_phone_no'];
				$user_designation = $rows['user_designation'];
				$user_website = $rows['user_website'];
				$user_address = $rows['user_address'];
				$user_about_me = $rows['user_about_me'];
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
			<div style="width:20px;height:20px;"></div>
			<!----- Profile Area ------>
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="col-md-3">
							<img src="../images/model.jpg" width="100%" class="img-thumbnail">
						</div>
						<div class="col-md-7">
							<h3><u><?php echo $user_f_name.' '.$user_l_name; ?></u></h3>
							<p><i class="glyphicon glyphicon-heart"></i> <?php echo $user_designation; ?></p>
							<p><i class="glyphicon glyphicon-road"></i> <?php echo $user_address; ?></p>
							<p><i class="glyphicon glyphicon-phone"></i><?php echo $user_phone_no; ?></p>
							<p><i class="glyphicon glyphicon-envelope"></i> <?php echo $_SESSION['user']; ?></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th>Gender</th>
									<td><?php echo ucfirst($user_gender); ?></td>
								</tr>
								<tr>
									<th>Website</th>
									<td><?php echo ucfirst($user_website); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<table class="table table-condensed">
							<tbody>
								<tr>
									<td width="10%">1</td>
									<td>
										<a href="#">The First Post</a>
									</td>
								</tr>
								<tr>
									<td width="5%">2</td>
									<td>
										<a href="#">The Second Post</a>
									</td>
								</tr>
								<tr>
									<td width="5%">3</td>
									<td>
										<a href="#">The Third Post</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>About me</h4>
						<p><?php echo $user_about_me; ?></p>
					</div>
				</div>
			</div>
			
		
	
			
		</div>
		
		<footer></footer>
	</body>
</html>