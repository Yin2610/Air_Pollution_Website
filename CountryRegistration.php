<?php
	session_start();
	include('connection.php');
	include('StaffHeader.php');
	if (isset($_SESSION['S_StaffID'])) 
	{
		if (isset($_POST['btnRegister'])) 
		{
			$CountryName = $_POST['txtCountryName'];
			$Year = $_POST['txtYear'];
			$AirAQI = $_POST['numAQI'];
			$Description = $_POST['txtDescription'];
			$Img1 = $_FILES['fCountryImg1']['name'];
			$folder = "CountryImg/";
			if ($Img1) 
			{
				$FileName1 = $folder."__".$Img1;
				$copy = copy($_FILES['fCountryImg1']['tmp_name'], $FileName1);
				if(!$copy)
				{
					exit("Image 1 cannot be uploaded.");
				}
			}
			$Img2 = $_FILES['fCountryImg2']['name'];
			$folder = "CountryImg/";
			if ($Img2) 
			{
				$FileName2 = $folder."__".$Img2;
				$copy = copy($_FILES['fCountryImg2']['tmp_name'], $FileName2);
				if(!$copy)
				{
					exit("Image 2 cannot be uploaded.");
				}
			}
			$Img3 = $_FILES['fCountryImg3']['name'];
			$folder = "CountryImg/";
			if ($Img3) 
			{
				$FileName3 = $folder."__".$Img3;
				$copy = copy($_FILES['fCountryImg3']['tmp_name'], $FileName3);
				if(!$copy)
				{
					exit("Image 3 cannot be uploaded.");
				}
			}
			$checkCountryName = "SELECT * FROM Country WHERE CountryName='$CountryName'";
			$runCheck = mysqli_query($connect, $checkCountryName);
			$count = mysqli_num_rows($runCheck);
			if ($count > 0) 
			{
				echo "<script>window.alert('This country name already exists.')</script>";
				echo "<script>window.location='CountryRegistration.php'</script>";
			}
			else
			{
				$insertCountry = "INSERT INTO Country(CountryName, Year, CountryImg1, CountryImg2, CountryImg3, AirAQI, Description) VALUES('$CountryName', '$Year', '$FileName1', '$FileName2', '$FileName3', '$AirAQI', '$Description')";
				$runInsert = mysqli_query($connect, $insertCountry);
				if ($runInsert) 
				{
					echo "<script>window.alert('Country information is successfully registered.')</script>";
					echo "<script>window.location='CountryList.php'</script>";
				}
				else
				{
					echo mysqli_error($connect);
					echo "<script>window.location='CountryList.php'</script>";
				}
			}
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
	<title>Country Registration</title>
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
	</style>
</head>
<body>
	<div class="content">
		<form action="CountryRegistration.php" method="POST" enctype="multipart/form-data" style="margin-top: 100px;">
			<h1 style="margin-left: 20px;">Country Registration</h1>
			<div style="background-color: #F7F7F7;">
			<table cellpadding="14px" align="center">
				<tr>
					<td>Country Name: </td>
					<td><input type="text" name="txtCountryName" class="form-control"  required="required"></td>
				</tr>
				<tr>
					<td>Country's air pollution description: </td>
					<td><textarea name="txtDescription" style="resize: none;" class="form-control" cols="40" rows="5" maxlength="200"></textarea></td>
				</tr>
				<tr>
					<td>Year: </td>
					<td><input type="text" class="form-control" name="txtYear" required="required"></td>
				</tr>
				<tr>
					<td>Air Quality Index: </td>
					<td><input type="number" class="form-control" name="numAQI" min="0" max="500" required="required"></td>
				</tr>
				<tr>
					<td>Country Image1(Flag): </td>
					<td><input type="file" name="fCountryImg1" required="required"></td>
				</tr>
				<tr>
					<td>Country Image2: </td>
					<td><input type="file" name="fCountryImg2"></td>
				</tr>
				<tr>
					<td>Country Image3:</td>
					<td><input type="file" name="fCountryImg3"></td>
				</tr>
				<tr>
					<td colspan="2" align="center" ><button name="btnRegister" value="Register">Submit</button></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><a href="CountryList.php">Back to Country List.</a></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>