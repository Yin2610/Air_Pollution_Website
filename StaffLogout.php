<?php 
	session_start();
	session_destroy();
	echo "<script>window.alert('Staff logout successful.')</script>";
	echo "<script>window.location='StaffLogin.php'</script>";
?>