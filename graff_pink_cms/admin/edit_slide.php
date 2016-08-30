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
	$error = '';


	if(isset($_POST['update_slide'])){
		$title = strip_tags($_POST['title']);
        $title = mysqli_real_escape_string($conn, $title);
		if($_FILES['image']['name'] != ''){
			$image_name = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			$image_size = $_FILES['image']['size'];
			$image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
			$image_path = '../images/'.$image_name;
			$image_db_path = 'images/'.$image_name;
			if($image_size < 10000000){
				if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif'){
					if(move_uploaded_file($image_tmp,$image_path)){
						$up_sql = "UPDATE slide SET title='$title', image='$image_db_path' WHERE id = '{$_POST['post_id']}'";
						if(mysqli_query($conn,$up_sql)){
							$result = '<div class="alert alert-danger">You&apos;ve Edited the post no. '.$_POST['post_id'].'</div>';
						}else {
							$error = '<div class="alert alert-danger">The Query Was not Working!</div>';
						}
					}else{
						$error = '<div class="alert alert-danger">Sorry, Unfortunately Image hos not been uploaded!</div>';
					}
				} else {
					$error = '<div class="alert alert-danger">Image Format was not Correct!</div>';
				}
			} else {
				$error = '<div class="alert alert-danger">Image File Size is much bigger then Expect!</div>';
			}
		} else {
			$up_sql = "UPDATE slide SET title='$title' WHERE id = '{$_POST['post_id']}'";
			if(mysqli_query($conn,$up_sql)){
				header('Location: slide.php');
				$result = '<div class="alert alert-danger">You&apos;ve Edited the slide no. '.$_POST['id'].'</div>';
			}else {
				$error = '<div class="alert alert-danger">The Query Was not Working!</div>';
			}
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
		
		<?php echo $error; include 'includes/sidebar.php';?>
		<div class="col-sm-10">
			<?php
				if(isset($_GET['edit_id'])){
				$sql = "SELECT * FROM slide WHERE id = '$_GET[edit_id]'";
				$run = mysqli_query($conn,$sql);
				while($rows = mysqli_fetch_assoc($run)){ ?>
					<div class="page-header"><h1><?php echo $rows['title']; ?></h1></div>
			<div class="container-fluid">
				<form class="form-horizontal" action="edit_slide.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="post_id" value="<?php echo $rows['id']; ?>">
					<img src="../<?php echo $rows['image']; ?>" width="200px">
					<div class="form-group">
						<label for="image">Upload an Image</label>
						<input id="image" type="file" name="image" class="btn btn-primary">
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<input id="title" type="text" name="title" value="<?php echo $rows['title']; ?>" class="form-control" required>
					</div>
					
					
					<div class="form-group">
						<input type="submit" name="update_slide" class="btn btn-danger btn-block">
					</div>
				</form>
			</div>
				<?php }
				} else {
					echo '<div class="alert alert-danger">Please Select A post to edit!</div>';
					
				}
			?>
		</div>
		<footer></footer>
	</body>
</html>