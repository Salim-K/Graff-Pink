<?php
	$server = 'localhost';
	$username = 'root';
	$password = 'toor';
	$db = 'cms_system';
	
	$conn = mysqli_connect($server,$username,$password,$db);
	if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //exit the script, if there is an error
    exit();
}
?>
