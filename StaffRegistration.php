<?php 
	include('connection.php');
	include('LoginHeader.php');
	if(isset($_POST['btnRegister']))
	{
		$StaffName = $_POST['txtStaffName'];
		$StaffPosition = $_POST['txtPosition'];
		$Email = $_POST['txtEmail'];
		$Gender = $_POST['rdoGender'];
		$StaffAddress = $_POST['txtStaffAddress'];
		$StaffPhone = $_POST['txtPhone'];
		$Password = $_POST['txtPassword'];

		$checkStaff = "SELECT * FROM staff WHERE Email='$Email'";
		$runCheck = mysqli_query($connect, $checkStaff);
		$count = mysqli_num_rows($runCheck);
		if($count > 0)
		{
			echo "<script>window.alert('This email is already registered. Please try enter another email.')</script>";
			echo "<script>window.location='StaffRegistration.php'</script>";
		}
		else
		{
			$insertStaff = "INSERT INTO staff(StaffName, Email, StaffPosition, StaffPhone, StaffGender, Password, StaffAddress) VALUES ('$StaffName', '$Email', '$StaffPosition', '$StaffPhone', '$Gender', '$Password', '$StaffAddress')";
			$runInsert = mysqli_query($connect, $insertStaff);
			if($runInsert)
			{
				echo "<script>window.alert('Staff account created successfully.')</script>";
				echo "<script>window.location='StaffLogin.php'</script>";
			}
			else
			{
				echo mysqli_error($connect);
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Registration</title>
	<script type="text/javascript">
		function chgMenu()
		{
			document.getElementById("Home").classList.remove('menu-active');
			document.getElementById("StaffRegMenu").classList.add('menu-active');
		}
	</script>
	<style type="text/css">
		.white
		{
			color: white;
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
<body onload="chgMenu()">
	<div class="content">
		<form action='StaffRegistration.php' method='POST' style="margin-top: 100px;">
			<h1>Staff Registration</h1>
			<table align='center' cellpadding="10px">
				<tr>
					<td class="white">Staff Name: </td>
					<td><input type="text" name="txtStaffName" required="required"></td>
				</tr>
				<tr>
					<td class="white">Staff Position: </td>
					<td><input type="text" name="txtPosition" required="required"></td>
				</tr>
				<tr>
					<td class="white">Email: </td>
					<td><input type="email" name="txtEmail" required="required"></td>
				</tr>
				<tr>
					<td class="white">Password: </td>
					<td><input type="password" name="txtPassword" required="required"></td>
				</tr>
				<tr>
					<td class="white">Staff Gender: </td>
					<td>
						<input type="radio" name="rdoGender" value="Male" required="required" checked="true">
						<label class="white">Male</label>
						<input type="radio" name="rdoGender" value="Female" required="required">
						<label class="white">Female</label>
					</td>
				</tr>
				<tr>
					<td class="white">Staff Phone: </td>
					<td><input type="text" name="txtPhone" required="required"></td>
				</tr>
				<tr>
					<td class="white">Staff Address: </td>
					<td><textarea name="txtStaffAddress" required="required" style="resize: none;"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="btnRegister">Register</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="StaffLogin.php">Already have an account?</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php include('Footer.php'); ?>