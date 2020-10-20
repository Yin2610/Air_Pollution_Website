<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/CustomerUpdate.php");
	if(isset($_POST['btnUpdate']))
	{
		$CustomerID = $_POST['txtCustomerID'];
		$UserName = $_POST['txtUserName'];
		$CustomerName = $_POST['txtCustomerName'];
		$Email = $_POST['txtEmail'];
		$DateOfBirth = $_POST['dob'];
		$PostalAddress = $_POST['txtPostalAddress'];
		$PostalCode = $_POST['txtPostalCode'];
		$PhoneNumber = $_POST['txtPhone'];
		$Gender = $_POST['rdoGender'];

		$updateCustomer = "UPDATE customer
							SET 
							UserName = '$UserName',
							FullName = '$CustomerName',
							Email = '$Email',
							DateOfBirth = '$DateOfBirth',
							PostalAddress = '$PostalAddress',
							PostalCode = '$PostalCode',
							PhoneNumber = '$PhoneNumber',
							Gender = '$Gender'
							WHERE CustomerID = '$CustomerID'";
		$runUpdate = mysqli_query($connect, $updateCustomer);
		if($runUpdate)
		{
			echo "<script>window.alert('Customer information updated successfully.')</script>";
			echo "<script>window.location='CustomerProfile.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
			echo "<script>window.location='CustomerProfile.php'</script>";
		}
	}
	if (isset($_SESSION['C_CustomerID'])) 
	{
		$CustomerID = $_SESSION['C_CustomerID'];
		$selectCustomer = "SELECT * FROM customer WHERE CustomerID = '$CustomerID'";
		$selectRun = mysqli_query($connect, $selectCustomer);
		$arr = mysqli_fetch_array($selectRun);
		$count = mysqli_num_rows($selectRun);
		if($count < 1)
		{
			echo "<script>window.alert('User not found. Register the user first.')</script>";
			echo "<script>window.location='CustomerRegistration.php'</script>";
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
	<title>Customer Update</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		function set()
		{
			var arrGender = "<?php echo $arr['Gender'] ?>";
			if(arrGender == "Female")
			{
				document.getElementById('rdoFemale').checked = true;
			}
			else
			{
				document.getElementById('rdoMale').checked = true;
			}
			var address = "<?php echo $arr['PostalAddress'] ?>";
			document.getElementById("txtPostalAddress").value = address;
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
		<h1 style="margin-left: 20px; margin-top: 100px;">Customer Update</h1>
		<form action="CustomerUpdate.php" method="POST" enctype="multipart/form-data" style="background-color: #F5F5F5">
			<table align="center" cellpadding="10px">
				<tr>
					<td colspan="2" align="center"><img src="<?php echo $arr['Image'] ?>" style="width: 200px; height: 200px;"></td>
				</tr>
				<tr>
					<td>User Name: </td>
					<td><input type="text" name="txtUserName" value="<?php echo $arr['UserName'] ?>" required="required" class="form-control">
						<input type="hidden" name="txtCustomerID" value="<?php echo $CustomerID ?>"></td>
				</tr>
				<tr>
					<td>Customer Name: </td>
					<td><input type="text" name="txtCustomerName" value="<?php echo $arr['FullName'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type="text" name="txtEmail" value="<?php echo $arr['Email'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Date of birth: </td>
					<td><input type="date" name="dob" value="<?php echo $arr['DateOfBirth'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Postal Address: </td>
					<td><textarea id="txtPostalAddress" required="required" style="resize: none;" name="txtPostalAddress" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td>Postal Code: </td>
					<td><input type="text" name="txtPostalCode" value="<?php echo $arr['PostalCode'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Phone: </td>
					<td><input type="text" name="txtPhone" value="<?php echo $arr['PhoneNumber'] ?>" required="required" class="form-control"></td>
				</tr>
				<tr>
					<td>Gender: </td>
					<td>
						<input type="radio" name="rdoGender" id="rdoMale" required="required" value="Male">Male
						<input type="radio" name="rdoGender" id="rdoFemale" required="required" value="Female">Female
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><button  name="btnUpdate">Update</button></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="CustomerProfile.php">Back to Customer Profile.</a>
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