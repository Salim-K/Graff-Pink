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


	if(isset($_POST['update_category'])){
		$category = strip_tags($_POST['category']);
        $category = mysqli_real_escape_string($conn, $category);
        $cat_id = (int) $_POST[cat_id];
		$sql = "UPDATE category SET category_name = '$category' WHERE c_id = $cat_id";
		if(mysqli_query($conn,$sql)){
			header('Location: category_list.php');
			
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
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div style="width:50px;height:50px;"></div>
		<?php  include 'includes/sidebar.php';?>
		<div class="col-lg-10">
			<?php echo $result;?>
			<?php
				if(isset($_GET['cat_id'])){
						$sql = "SELECT * FROM category WHERE c_id = '$_GET[cat_id]'";
						$run = mysqli_query($conn,$sql);
						while($rows = mysqli_fetch_assoc($run)){
					?>
					<div class="page-header"><h1> Edit Category</h1></div>
					<div class="container-fluid">
						<form class="form-horizontal col-lg-5" action="edit_category.php" method="post">
							<div class="form-group">
								<input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'];?>">
								<label for="category">Category Name</label>
								<input id="category" type="text" value="<?php echo $rows['category_name']; ?>"name="category" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="update_category" class="btn btn-danger btn-block">
							</div>
						</form>
					</div>
			<?php	}
				} else {
					echo $result = '<div class="alert alert-danger">Please Select a Section</div>';
				
				}
			?>
		</div>
		<footer></footer>
	</body>
</html>