<?php 
	session_start();
	include('connection.php');
	include('LoginHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/CustomerLogin.php");
	if(isset($_POST['btnLogin']))
	{
		$Email = $_POST['txtEmail'];
		$Password = $_POST['txtPassword'];
		$HashPassword = md5($Password);
		$selectUser = "SELECT * FROM customer WHERE Email='$Email' AND Password='$HashPassword'";
		$runSelect = mysqli_query($connect, $selectUser);
		$count = mysqli_num_rows($runSelect);
		$arr = mysqli_fetch_array($runSelect);
		if ($count == 1) 
		{
			$_SESSION['C_CustomerID'] = $arr['CustomerID'];
			$_SESSION['C_UserName'] = $arr['UserName'];
			$UserName = $arr['UserName'];
			$_SESSION['C_Email'] = $arr['Email'];
			echo "<script>window.alert('You are logged in as user \"$UserName\".')</script>";
			echo "<script>window.location='CustomerHome.php'</script>";
		}
		else
		{
			if(isset($_SESSION['error_count']))
			{
				$ErrorCount = $_SESSION['error_count'];
				if($ErrorCount == 1)
				{
					$_SESSION['error_count'] = 2;
					echo "<script>window.alert('Login fail as 2nd time.')</script>";
				}
				if($ErrorCount == 2)
				{
					echo "<script>window.alert('Login fail as 3rd time. You need to wait for 10 mins to login again.')</script>";
					echo "<script>window.location='LoginTimer.php'</script>";
				}
			}
			else
			{
				$_SESSION['error_count'] = 1;
				echo "<script>window.alert('Login fail as 1st time.')</script>";
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Login</title>
<script type="text/javascript">
	document.getElementById('Home').classList.remove('menu-active');
	function chgMenu()
		{
			document.getElementById("CustomerLogMenu").classList.add('menu-active');
		}
</script>
<style type="text/css">
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
		<form action="CustomerLogin.php" method="POST">
			<h1>User Login</h1>
			<table align="center" cellpadding="10px">
				<tr>
					<td>
						<input type="Email" name="txtEmail" placeholder="User Email">
					</td>
				</tr>
				<tr>
					<td>
						<input type="Password" name="txtPassword" placeholder="Password">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="btnLogin">Login</button>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="CustomerRegistration.php">Don't have an account?</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<div>
<?php include('Footer.php') ?>
</div>