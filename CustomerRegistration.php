<?php 
include('connection.php');
include('LoginHeader.php');
if(isset($_POST['btnSubmit']))
{
	$CustomerName = $_POST['txtCustomerName'];
	$CustomerEmail = $_POST['txtEmail'];
	$CustomerBirthDate = $_POST['birthdate'];
	$PostalAddress = $_POST['txtPostalAddress'];
	$PostalCode = $_POST['txtPostalCode'];
	$PhoneNum = $_POST['txtPhone'];
	$Gender = $_POST['rdoGender'];
	$UserName = $_POST['txtUserName'];
	$Password = $_POST['txtPassword'];
	$Confirm = $_POST['txtConfirm'];
	$HashPassword = md5($Password);
	$Image = $_FILES['fImage']['name'];
	$Folder = "UserImg/";
	if($Image)
	{
		$FileName = $Folder."__".$Image;
		$copy = copy($_FILES['fImage']['tmp_name'], $FileName);
		if(!$copy)
		{
			exit("Image cannot be uploaded.");
		}
	}
	$checkEmail = "SELECT * FROM Customer WHERE Email = '$CustomerEmail' OR FullName = '$CustomerName'";
	$runCheck = mysqli_query($connect, $checkEmail);
	$count = mysqli_num_rows($runCheck);
	if($count > 0)
	{
		echo "<script>window.alert('This email or user name already exists. Enter a new one.')</script>";
		echo "<script>window.location='CustomerRegistration.php'</script>";
	}
	else
	{
		if($Password == $Confirm)
		{
			$insertCustomer = "INSERT INTO Customer(FullName, Email, DateOfBirth, PostalAddress, PostalCode, PhoneNumber, Gender, UserName, Password, Image) VALUES ('$CustomerName', '$CustomerEmail', '$CustomerBirthDate', '$PostalAddress', '$PostalCode', '$PhoneNum', '$Gender', '$UserName', '$HashPassword', '$FileName')";
			$runInsert = mysqli_query($connect, $insertCustomer);
			if($runInsert)
			{
				echo "<script>window.alert('Customer registered successfully.')</script>";
				echo "<script>window.location='CustomerLogin.php'</script>";
			}
			else
			{
				echo mysqli_error($connect);
				echo "<script>window.location='CustomerRegistration.php'</script>";
			}
		}
		else
		{
			echo "<script>window.alert('The passwords don\'t match.')</script>";
		}
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration</title>
	<script type="text/javascript">
		function hover()
		{
			document.getElementById('popuptext').style.display = 'block';
		}
		function nohover()
		{
			document.getElementById('popuptext').style.display = 'none';
		}
		function chgMenu()
		{
			document.getElementById("Home").classList.remove('menu-active');
			document.getElementById("CusRegMenu").classList.add('menu-active');
		}
		var checkPass = function()
		{
			if (document.getElementById('password').value=='' && document.getElementById('confirm').value=='')
			{
				document.getElementById('message').innerHTML = '';
			}
			else if(document.getElementById('password').value == document.getElementById('confirm').value)
			{
				document.getElementById('message').style.color = 'green';
				document.getElementById('message').innerHTML = 'Matched';
			}
			else
			{
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'Not matched';
			}
		}
	</script>
	<style type="text/css">
		.white
		{
			color: white;
		}
		#popup
		{
			cursor: pointer;
		}
		#popuptext
	    { 
	    	display: none;
			font-size: 13px;
			position: relative;
			height: 45px;
			width: 150px;
			background-color: #555;
			border-radius: 46%;
			color: white;
	    }
	    #popuptext:after
	    {
			position: absolute;
			margin-top: 25px;
			margin-left: -40%;
			content: "";
			width: 0;
			height: 0;
			border-left: 8px solid transparent;
			border-right: 8px solid transparent;
			border-top: 8px solid #555;
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
		<form action="CustomerRegistration.php" method="POST" enctype="multipart/form-data" style="margin-top: 180px;">
			<h1>Customer Registration</h1>
			<table align="center" cellpadding="7px" style="margin-bottom: 100px;">
				<tr>
					<td class="white">Customer Name: </td>
					<td><input type="text" name="txtCustomerName" required="required"></td>
				</tr>
				<tr>
					<td class="white">Customer Email: </td>
					<td><input type="Email" name="txtEmail" required="required"></td>
				</tr>
				<tr>
					<td class="white">Cutomer Birthdate:</td>
					<td><input type="date" name="birthdate" required="required"></td>
				</tr>

				<tr>
					<td class="white">Postal Code: </td>
					<td><input type="text" name="txtPostalCode" required="required"></td>
				</tr>
				<tr>
					<td class="white">Postal Address: </td>
					<td><input type="text" name="txtPostalAddress" required="required"></td>
				</tr>
				<tr>
					<td class="white">Phone Number: </td>
					<td><input type="text" name="txtPhone" required="required"></td>
				</tr>
				<tr>
					<td class="white">Gender: </td>
					<td>
						<input type="radio" name="rdoGender" id="rdoMale" value="Male" checked="true" required="required">
						<label class="white">Male</label>
						<input type="radio" name="rdoGender" id="rdoFemale" value="Female" required="required">
						<label class="white">Female</label>
					</td>
				</tr>
				<tr>
					<td class="white">User Name: </td>
					<td><input type="text" name="txtUserName" required="required"></td>
				</tr>
				<tr>
					<td class="white">Password: </td>
					<td><input type="Password" name="txtPassword" id="password" required="required" onkeyup="checkPass();"></td>
				</tr>
				<tr>
					<td class="white">Confirm Password: </td>
					<td><input type="Password" name="txtConfirm" id="confirm" required="required" onkeyup="checkPass();"></td>
					<td id="message"></td>
				</tr>
				<tr>
					<td class="white">Image: </td>
					<td><input type="file" name="fImage" required="required"></td>
				</tr>
				<tr> 
					<td colspan="2" align="center">
						<div class="popuptext">
		        			<div style="text-align: center;"  id="popuptext">
		        				Free offer of home pollution testing kit
			        		</div>
			        	</div>
						<button name="btnSubmit" id="popup" onmouseover="hover();" onmouseout="nohover();">Register</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="CustomerLogin.php">Already have an account?</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php include('Footer.php') ?>