<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	if (isset($_SESSION['C_CustomerID'])) 
	{
		$CountryID = $_GET['CountryID'];
		$selectCountry = "SELECT * FROM country WHERE CountryID = '$CountryID'";
		$runSelect = mysqli_query($connect, $selectCountry);
		$count = mysqli_num_rows($runSelect);
		$arr = mysqli_fetch_array($runSelect);
		if($count < 1)
		{
			echo "<script>window.alert('Country information not found.')</script>";
			echo "<script>window.location='CountryDisplay.php'</script>";
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
	<title>Country Detail</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('UserHome').classList.remove('menu-active');
	</script>
</head>
<body style="background-color: #F5F5F5">
	<div class="content">
		<form action='CountryDetail.php' method="POST" style="margin-top: 100px;">
			<table align="center" cellpadding="10px">
				<tr>
					<h1 align="center">
						<?php echo $arr['CountryName'] ?></h1>
				</tr>
				<tr>
					<td>
					<?php $img1 = $arr['CountryImg1'];
					 echo "<div align='center'><img src='$img1' width=200px height=130px></div>";?>
					</td>
				</tr>
				<tr>
					<td align="center">Year: <?php echo $arr['Year'] ?></td>
				</tr>
				<tr>
					<td align="center">Air Quality Index: <?php echo $arr['AirAQI'] ?></td>
				</tr>
				<tr>
					<td align="center"><?php echo $arr['Description']?></td>
				</tr>
				<tr>
					<td>
						
					</td>
				</tr>
			</table>
			<?php 
				$img2 = $arr['CountryImg2'];
				$img3 = $arr['CountryImg3'];
				echo "<div align='center' style='margin-bottom:20px;'>";
				echo "<div style='display: inline-block; margin-right: 20px;'><img src='$img2' width=300px height=250px></div>";
			echo "<div style='display: inline-block'><img src='$img3' width=300px height=250px></div></div>";
				 ?>
		</form>
		<a href="CountryDisplay.php" style="margin-left: 70%;">Back to Country Display.</a>
	</div>
</body>
</html>
<div class="footer" style="margin-top: 20px;">
<?php include('Footer.php') ?>
</div>