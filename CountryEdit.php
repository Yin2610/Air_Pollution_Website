<?php
include('connection.php');
include('StaffHeader.php');
if (isset($_POST['btnUpdate'])) 
{
	$CountryID = $_POST['txtCountryID'];
	$CountryName = $_POST['txtCountryName'];
	$Description = $_POST['txtDescription'];
	$AirAQI = $_POST['numAQI'];
	$Year = $_POST['txtYear'];
	$updateCountry = "UPDATE Country 
					  SET 	
					  CountryName = '$CountryName',
					  Description = '$Description',
					  Year = '$Year',
					  AirAQI = '$AirAQI'
					  WHERE CountryID = '$CountryID'";
	$runUpdate = mysqli_query($connect, $updateCountry);
	if($runUpdate)
	{
		echo "<script>window.alert('Country information updated.')</script>";
		echo "<script>window.location='CountryList.php'</script>";
	}
	else
	{
		echo mysqli_error($connect);
		echo "<script>window.location='CountryList.php'</script>";
	}
}
if (isset($_GET['CountryID'])) 
{
	$CountryID = $_GET['CountryID'];
	$selectCountry = "SELECT * FROM Country WHERE CountryID='$CountryID'";
	$runSelect = mysqli_query($connect, $selectCountry);
	$count = mysqli_num_rows($runSelect);
	$arr = mysqli_fetch_array($runSelect);
	if($count < 1)
	{
		echo "<script>window.alert('Country information not found.')</script>";
		echo "<script>window.location='CountryRegistration.php'</script>";
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
	<title>Country Edit</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
		function set()
		{
			var description = "<?php echo $arr['Description']; ?>";
			document.getElementById('txtDescription').value = description;
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
<body onload="set();">
	<div class="content">
		<h1 style="margin-left: 20px; margin-top: 100px;">Country Edit</h1>
		<form action='CountryEdit.php' method="POST" style="background-color: #F5F5F5;">
			<table align="center" cellpadding="10px">
				<tr>
					<td colspan="2" align="center">
						<?php $img1 = $arr['CountryImg1'];
					echo "<img src='$img1' width=150px height=100px'></td>";
						 ?>
					</td>
				</tr>
				<tr>
					<td>Country Name: </td>
					<td><input type="text" name="txtCountryName" value="<?php echo $arr['CountryName'] ?>" required="required" class="form-control">
						<input type="hidden" name="txtCountryID" value="<?php echo $CountryID ?>"></td>
				</tr>
				<tr>
					<td>Year: </td>
					<td><input type="text" name="txtYear" value="<?php echo $arr['Year'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Air Quantity Index: </td>
					<td><input type="number" name="numAQI" min="1" max="500" value="<?php echo $arr['AirAQI'] ?>" required="required"  class="form-control"></td>
				</tr>
				<tr>
					<td>Country's Air Pollution:</td>
					<td><textarea name="txtDescription" id="txtDescription" style="resize: none;" cols="40" rows="5" maxlength="200" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="btnUpdate">Update</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="CountryList.php">Back to Country List.</a>
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