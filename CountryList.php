<?php 
	session_start();
	include('connection.php');
	include('StaffHeader.php');
	if (!isset($_SESSION['S_StaffID'])) 
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
		table tr td
		{
			border: 2px solid white;
		}
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
	<div class="content" style="background-image: url('assets/img/fotolia-edenwithin-air-quality-pollution.jpg');">
	<?php 
		$selectCountry = "SELECT * FROM Country";
		$runSelectCountry = mysqli_query($connect, $selectCountry);
		$count = mysqli_num_rows($runSelectCountry);
		if($count < 1)
		{
			echo "<script>alert('Country information not found.')</script>";
		}
		else
		{
			echo "<fieldset style='margin-top: 100px;'>";
			echo "<h1 style='margin-left:20px;'>Country List</h1>";
			echo "<h4 style='margin-left: 5%; margin-top:20px;'>Countries</h4>";
			echo "<table width='99.9%' cellpadding: 18px; style='background-color: #F4EFEC;'>";
			echo "<tr align='center' style='background-color: #E0D9D5'>";
			echo "<th>Country Name</th>";
			echo "<th>Country Image1</th>";
			echo "<th>Country Image2</th>";
			echo "<th>Country Image3</th>";
			echo "<th>Year</th>";
			echo "<th>Air Quality Index</th>";
			echo "<th></th>";
			echo "</tr>";
		}
	 
		for ($i=0; $i < $count ; $i++) { 
			$arr = mysqli_fetch_array($runSelectCountry);
			$CountryID = $arr['CountryID'];
			$CountryName = $arr['CountryName'];
			$CountryImage1 = $arr['CountryImg1'];
			$CountryImage2 = $arr['CountryImg2'];
			$CountryImage3 = $arr['CountryImg3'];
			$Year = $arr['Year'];
			$AirAQI = $arr['AirAQI'];
			echo "<tr align='center'>";
			echo "<td>$CountryName</td>";
			echo "<td><img src='$CountryImage1' width='78px' height='50px'></td>";
			echo "<td><img src='$CountryImage2' width='48px' height='50px'></td>";
			echo "<td><img src='$CountryImage3' width='48px' height='50px'></td>";
			echo "<td>$Year</td>";
			echo "<td>$AirAQI</td>";
			echo "<td><a href='CountryEdit.php?CountryID=$CountryID'>Edit</a><br>
			<a href='CountryDelete.php?CountryID=$CountryID'>Delete</a></td>";
			echo "</tr>";
		}
	?>
</table>
<form>
<button style="float: right; margin-right: 20%; margin-top: 5%; margin-bottom: 5%;" formaction="CountryRegistration.php">Register Country</button>
</form>
</fieldset> 
</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>