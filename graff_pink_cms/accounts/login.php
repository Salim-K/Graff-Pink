<?php session_start();
	include '../includes/db.php';
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['user_name']) && !empty($_POST['password'])){
			$get_user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
			$get_password = mysqli_real_escape_string($conn,$_POST['password']);
			$sql = "SELECT * FROM users WHERE user_email = '$get_user_name' AND user_password = '$get_password'";
			if($result = mysqli_query($conn,$sql)){
				while($rows = mysqli_fetch_assoc($result)){
					if(mysqli_num_rows($result) == 1){
						$_SESSION['user'] = $get_user_name;
						$_SESSION['password'] = $get_password;
						$_SESSION['role'] = $rows['role'];
						header('Location:../admin/index.php');
					} else {
						header('Location:../index.php?login_error=wrong');
					}
				}
				
			}else {
				header('Location: ../index.php?login_error=query_error');
			}
		} else {
			header('Location:../index.php?login_error=empty');
		}
	}else {
        header('Location:../index.php?login_error=empty');
	}
?>