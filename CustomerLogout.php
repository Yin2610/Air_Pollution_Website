<?php 
	session_start();
	session_destroy();
	echo "<script>window.alert('User logout succesful.')</script>";
	echo "<script>window.location='CustomerLogin.php'</script>";
 ?>