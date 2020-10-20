<?php 
	session_start(); 
	include('connection.php');
	include('LoginHeader.php');
	if(isset($_POST['btnLogin']))
	{
		$StaffName = $_POST['txtStaffName'];
		$Password = $_POST['txtPassword'];
		$selectUser = "SELECT * FROM staff WHERE StaffName='$StaffName' AND Password='$Password'";
		$runSelect = mysqli_query($connect, $selectUser);
		$count = mysqli_num_rows($runSelect);
		$arr = mysqli_fetch_array($runSelect);
		if($count < 1)
		{
			echo "<script>window.alert('The user name or password is incorrect.')</script>";
			echo "<script>window.location='StaffLogin.php'</script>";
		}
		else
		{
			$_SESSION['S_StaffID'] = $arr['StaffID'];
			$_SESSION['S_StaffName'] = $arr['StaffName'];
			$_SESSION['S_Email'] = $arr['Email'];
			$_SESSION['S_Password'] = $arr['Password'];
			echo "<script>window.alert('You login as \"$StaffName\".')</script>";
			echo "<script>window.location='StaffHome.php'</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Login</title>
	<script>
	document.getElementById('Home').classList.remove('menu-active');
</script>
	<style type="text/css">
		body
		{
			background-color: #f5f5f5;
		}
		button
		{
			background-color: #1ba074;
			color: white; 
			width: 100px;
			border-color: #1ba074;
			height: 35px;
			border-radius: 20%;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div>
		<form action='StaffLogin.php' method="POST" id="StaffLogin">
			<h1>Staff Login</h1>
			<table align="center" cellpadding="10px">
				<tr>
					<td>
						<input type="text" name="txtStaffName" placeholder="Staff Name">
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="txtPassword" placeholder="Password">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="btnLogin">Login</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="StaffRegistration.php">Don't have an account?</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<div>
<?php include('Footer.php') ?>
</div>