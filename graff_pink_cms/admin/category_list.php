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


	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM category WHERE c_id = '$_GET[del_id]'";
		if(mysqli_query($conn,$del_sql)){
			$result = '<div class="alert alert-danger">You&apos;ve Deleted a Section no : &apos;'.$_GET['del_id'].'&apos;</div>';
		}
		
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
		<div style="width:50px;height:50px;"></div>
			<?php echo $result; ?>
			<div class="col-lg-8">
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<h4>Sections</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Section Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$sql = "SELECT * FROM category";
								$run = mysqli_query($conn,$sql);
								$number = 1;
								while($rows = mysqli_fetch_assoc($run)){
									if($rows['category_name'] == 'home'){
										continue;
									} else {
										$category_name = ucfirst($rows['category_name']);
									}
									echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$category_name.'</td>
										<td><a href="edit_category.php?cat_id='.$rows['c_id'].'" class="btn btn-warning btn-xs">Edit</a></td>
										<td><a href="category_list.php?del_id='.$rows['c_id'].'" class="btn btn-danger btn-xs">Delete</a></td>
									</tr>
									';
									$number++;
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