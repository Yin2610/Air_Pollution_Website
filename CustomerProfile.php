<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/CustomerProfile.php");
	if (isset($_SESSION['C_CustomerID'])) 
	{
		$CustomerID = $_SESSION['C_CustomerID'];
		$selectCustomer = "SELECT * FROM customer WHERE CustomerID = '$CustomerID'";
		$selectRun = mysqli_query($connect, $selectCustomer);
		$count = mysqli_num_rows($selectRun);
		$arr = mysqli_fetch_array($selectRun);
		if ($count < 1) 
		{
			echo "<script>window.alert('User profile not found. Please try login again.')</script>";
			echo "<script>window.location='Login.php'</script>";
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
 	<title>Customer Profile</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
 	<script type="text/javascript">
 		document.getElementById('UserHome').classList.remove('menu-active');
 		document.getElementById('UserProfile').classList.add('menu-active');
 	</script>
 	<style type="text/css">
 		body
 		{
 			background-image: 
 		}
 		table
 		{
 			border: 4px dashed #16A085;
		}
		button
		{
			background-color: #2dc997; 
			padding: 10px; 
			border-radius: 40%;
			color: white;
			font-weight: bold;
		}
		.bold
		{
			font-weight: bold;
		}
 	</style>
 </head>
 <body>
 	<div class="content" style=" background: rgb(185,51,90); background: linear-gradient(90deg, rgba(185,51,90,1) 0%, rgba(0,125,255,1) 100%); ">
		<form action="CustomerHome.php" method="POST">
		 	<h1 style="margin-top: 100px; margin-left: 20px; color: white;">User Profile</h1>
		 	<table cellpadding="9px" style=" background-color: #F5F5F5; margin-bottom: 20px;" align="center">
		 	<tr>
		 		<td colspan="2" align='center'>
		 			<?php echo "<img src='$arr[Image]' width='180px' height='180px' style='border-radius: 50%;';" ?>
		 			</td>
		 		</tr>
		 		<tr>
		 			<td class="bold">User Name: </td>
		 			<td>
		 				<?php echo $arr['UserName'] ?>
		 			</td>
		 		</tr>
		 		<tr>
		 			<td class="bold">Customer Name: </td>
					<td>
						<?php echo $arr['FullName'] ?>
					</td>
				</tr>
				<tr>
					<td class="bold">Date of birth: </td>
					<td>
						<?php echo $arr['DateOfBirth']?>
					</td>
				</tr>
				<tr>
					<td class="bold">Gender: </td>
					<td>
						<?php echo $arr['Gender'] ?>
					</td>
				</tr>
				<tr>
					<td class="bold">Email: </td>
					<td>
						<?php echo $arr['Email']?>
					</td>
				</tr>
				<tr>
					<td class="bold">Postal Address: </td>
					<td>
						<?php echo $arr['PostalAddress']?>
					</td>
				</tr>
				<tr>
					<td class="bold">Postal Code: </td>
					<td>
						<?php echo $arr['PostalCode'] ?>
					</td>
				</tr>
				<tr>
					<td class="bold">Phone: </td>
					<td>
						<?php echo $arr['PhoneNumber'] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><button formaction="CustomerUpdate.php">Update Profile</button></td>
				</tr>
			</table>
			<a href="CustomerHome.php" style="margin-left: 50%;">Back to the User Home.</a>
		</form>
</div>
</body>
</html>
<div class="footer" style="clear: both">
<?php include('Footer.php') ?>
</div>