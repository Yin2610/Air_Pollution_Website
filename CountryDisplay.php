<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/CountryDisplay.php");
	if (isset($_SESSION['C_CustomerID'])) 
	{
		$selectCountry = "SELECT * FROM country";
		$runSelect = mysqli_query($connect, $selectCountry);
		$count = mysqli_num_rows($runSelect);
		if($count < 1)
		{
			echo "<script>window.alert('There is no country information yet.')</script>";
		}
		else
		{
			if(isset($_POST['btnSearch']))
			{
				$searchName = $_POST['txtCountryName'];
				$selectCountry = "SELECT * FROM country WHERE CountryName = '$searchName'";
				$runSelect = mysqli_query($connect, $selectCountry);
				$count = mysqli_num_rows($runSelect);
			}
		}
	}
	else
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.location='CustomerLogin.php'</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Country Display</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('UserHome').classList.remove('menu-active');
	</script>
	<style type="text/css">
		#table tr
		{
			border: 2px solid white;
		}
	</style>
</head>
<body>
	<div class="content" style="background-image: url('assets/img/fotolia-edenwithin-air-quality-pollution.jpg'); background-size: cover;">
		<form action="CountryDisplay.php" method="POST" style="margin-top: 100px;">
			<h1 style="margin-left: 20px;">Country Display</h1>
			<table style="margin-left: 5%; float: right;">
				<tr>
					<td>
						Search country: 
					</td>
					<td>
						<input type="text" name="txtCountryName" style="margin-left: 10px">
					</td>
					<td>
						<button name="btnSearch" style="margin-right: 25px; background-color: white;"><img src="assets\img\search.png" width="25px" height="28px"></button>
					</td>
				</tr>
			</table>
		</form>
		<h4 style="margin-left: 5%; margin-top:20px; clear: right;">Countries</h4>
		<fieldset style="background-color: #F4EFEC; margin-top: ">
			<table width="100%" cellpadding="13px" id="table">
				<tr align="center" style="background-color: #e0d9d5">
					<th>Country Image</th>
					<th>Country Name</th>
					<th>Year</th>
					<th>Air Quality Index</th>
					<th></th>
				</tr>
				<?php 
					for ($i=0; $i < $count; $i++) 
					{ 
						$arr = mysqli_fetch_array($runSelect);
						$CountryID = $arr['CountryID'];
						$CountryName = $arr['CountryName'];
						$CountryImg1 = $arr['CountryImg1'];
						$Year = $arr['Year'];
						$AirAQI = $arr['AirAQI'];
						echo "<tr align='center'>";
						echo "<td><img src='$CountryImg1' width='80px' height='50px'></td>";
						echo "<td>$CountryName</td>";
						echo "<td>$Year</td>";
						echo "<td>$AirAQI</td>";
						echo "<td><a href='CountryDetail.php?CountryID=$CountryID'>Go to $CountryName country detail.</td>";
						echo "</tr>";
					}
				 ?>
			</table>
		</fieldset>
		<a href="CustomerHome.php" style="margin-left: 50%; color: white; font-weight: bold;">Back to the User Home.</a>
	</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>