<?php
	session_start(); 
	include('connection.php');
	include('StaffHeader.php');
	if(isset($_SESSION['S_StaffID']))
	{
		$StaffID = $_SESSION['S_StaffID'];
		$selectStaff = "SELECT * FROM staff WHERE StaffID = '$StaffID'";
		$selectRun = mysqli_query($connect, $selectStaff);
		$count = mysqli_num_rows($selectRun);
		$arr = mysqli_fetch_array($selectRun);
		if ($count < 1)
		{
			echo "<script>window.alert('User profile not found. Please try login again.')</script>";
			echo "<script>window.location='StaffLogin.php'</script>";
		}
	}
	else
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.location='StaffLogin.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Profile</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
	</script>
	<style type="text/css">
		button
		{
			background-color: #2dc997; 
			padding: 10px; 
			border-radius: 40%;
			color: white;
			font-weight: bold;
		}
		table
 		{
 			border: 4px dashed #16A085;
		}
	</style>
</head>
<body>
	<div class="content" style=" background: rgb(58,81,180);
background: linear-gradient(90deg, rgba(58,81,180,1) 0%, rgba(135,87,218,1) 50%, rgba(252,176,69,1) 100%);  ">
		<form action="StaffProfile.php" method="POST" style="margin-top: 100px;">
			<h1 style="margin-top: 100px; margin-left: 20px; color: white;">Staff Profile</h1>
			<table cellpadding="12px" align="center" style="background-color: #F5F5F5; margin-bottom: 20px;">
				<tr>
					<td colspan="2" align="center">
						<img src="assets/img/profile-2398782_1280.webp" width="180px" height="180px">
					</td>
				</tr>
				<tr>
					<td><b>Staff Name: </b></td>
					<td>
						<?php echo $arr['StaffName'] ?>
					</td>
				</tr>
				<tr>
					<td><b>Staff Position: </b></td>
					<td>
						<?php echo $arr['StaffPosition']?>
					</td>
				</tr>
				<tr>
					<td><b>Email: </b></td>
					<td>
						<?php echo $arr['Email']?>
					</td>
				</tr>
				<tr>
					<td><b>Gender: </b></td>
					<td>
						<?php echo $arr['StaffGender']?>
					</td>
				</tr>
				<tr>
					<td><b>Staff Phone: </b></td>
					<td>
						<?php echo $arr['StaffPhone'] ?>
					</td>
				</tr>
				<tr>
					<td><b>Staff Address: </b></td>
					<td>
						<?php echo $arr['StaffAddress']?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><button formaction="StaffUpdate.php">Update Profile</button></td>
				</tr>	
			</table>
			<a href="StaffHome.php" style="margin-left: 50%;">Back to the Staff Home.</a>
		</form>
	</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>