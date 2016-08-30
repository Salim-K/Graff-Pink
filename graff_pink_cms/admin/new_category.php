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



	if(isset($_POST['submit_category'])){
		$category = strip_tags($_POST['category']);
		$category = mysqli_real_escape_string($conn, $category);
        
        
		$sql = "INSERT INTO category (category_name) VALUES ('$category')";
		if(mysqli_query($conn,$sql)){
			$result = '<div class="alert alert-success">You&apos;ve created a new Section named &apos;'.$category.'&apos;</div>';
			
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
			<div class="page-header"><h1>New Section</h1></div>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="new_category.php" method="post">
					<div class="form-group">
						<label for="category">Title</label>
						<input id="category" type="text" name="category" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit_category" class="btn btn-danger btn-block">
					</div>
				</form>
			<div>
			
		</div>

		<footer></footer>
	</body>
</html>