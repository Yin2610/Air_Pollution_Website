<?php 
	session_start();
	include('connection.php');
	include('StaffHeader.php');
	if(isset($_POST['btnUpdate']))
	{
		$StaffID = $_POST['txtStaffID'];
		$StaffName = $_POST['txtStaffName'];
		$StaffPosition = $_POST['txtPosition'];
		$StaffGender = $_POST['rdoGender'];
		$StaffPhone = $_POST['txtPhone'];
		$StaffAddress = $_POST['txtStaffAddress'];
		$StaffEmail = $_POST['txtEmail'];
		$Password = $_POST['txtPassword'];
		$updateStaff = "UPDATE Staff
						SET
						StaffName = '$StaffName',
						StaffPosition = '$StaffPosition',
						StaffGender = '$StaffGender',
						StaffPhone = '$StaffPhone',
						StaffAddress = '$StaffAddress',
						Email = '$StaffEmail',
						Password = '$Password'
						WHERE StaffID = '$StaffID'
						";
		$runUpdate = mysqli_query($connect, $updateStaff);
		if($runUpdate)
		{
			echo "<script>window.alert('Staff information updated successfully.')</script>";
			echo "<script>window.location='StaffProfile.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
			echo "<script>window.location='StaffUpdate.php'</script>";
		}
	}
	if(isset($_SESSION['S_StaffID']))
	{
		$StaffID = $_SESSION['S_StaffID'];
		$selectStaff = "SELECT * FROM staff WHERE StaffID = '$StaffID'";
		$runSelectStaff = mysqli_query($connect, $selectStaff);
		$count = mysqli_num_rows($runSelectStaff);
		$arr = mysqli_fetch_array($runSelectStaff);
		if($count < 1)
		{
			echo "<script>window.alert('Staff not found. Register the staff first.')</script>";
			echo "<script>window.location='StaffRegistration.php'</script>";
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
	<title>Staff Update</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
		function set()
		{
			var arrGender = "<?php echo $arr['StaffGender'] ?>";
			if(arrGender == "Female")
			{
				document.getElementById('rdoFemale').checked = true;
			}
			else
			{
				document.getElementById('rdoMale').checked = true;
			}
			var address = "<?php echo $arr['StaffAddress'] ?>";
			document.getElementById("txtStaffAddress").value = address;
		}
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
	</style>
</head>
<body onload="set()">
	<div class="content">
		<h1 style="margin-left: 20px; margin-top: 100px;">Staff Update</h1>
		<form action="StaffUpdate.php" method="POST" style="background-color: #F5F5F5">	
			<table align="center" cellpadding="10px">
				<tr>
					<td>Staff Name: </td>
					<td>
						<input type="text" name="txtStaffName" value="<?php echo $arr['StaffName'] ?>" required="required" class="form-control">
					</td>
					<input type="hidden" name="txtStaffID" value="<?php echo $StaffID ?>">
				</tr>
				<tr>
					<td>Staff Position: </td>
					<td>
						<input type="text" name="txtPosition" value="<?php echo $arr['StaffPosition'] ?>" required="required" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>
						<input type="email" name="txtEmail" value="<?php echo $arr['Email'] ?>" required="required" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Password: </td>
					<td>
						<input type="password" name="txtPassword" value="<?php echo $arr['Password'] ?>" required="required" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Staff Gender: </td>
					<td>
						<input type="radio" name="rdoGender" id="rdoMale" value="Male" required="required">Male
						<input type="radio" name="rdoGender" id="rdoFemale" value="Female" required="required">Female
					</td>
				</tr>
				<tr>
					<td>Staff Phone: </td>
					<td>
						<input type="text" name="txtPhone" value="<?php echo $arr['StaffPhone'] ?>" required="required"  class="form-control">
					</td>
				</tr>
				<tr>
					<td>Staff Address: </td>
					<td>
						<textarea name="txtStaffAddress" id="txtStaffAddress" style="resize: none;" required="required"  class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="btnUpdate">Update</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="StaffProfile.php">Back to Staff Profile.</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>