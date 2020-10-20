<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/GiveFeedback.php");
	if ($_SESSION['C_CustomerID']) 
	{
		$CustomerID = $_SESSION['C_CustomerID'];
		if(isset($_POST['btnSubmit']))
		{
			$Comment = $_POST['txtComment'];
			$Rate = $_POST['txtRate'];
			$t=time();
			$FeedbackDate = date("Y-m-d",$t); 
			$insertFeedback = "INSERT INTO feedback(Comment, FeedbackDate, CustomerID, Rate) VALUES ('$Comment', '$FeedbackDate', '$CustomerID', $Rate)";
			$runInsert = mysqli_query($connect, $insertFeedback);
			if ($runInsert) 
			{
				echo "<script>window.alert('Thank you for your feedback.')</script>";
				echo "<script>window.location='CustomerHome.php'</script>";
			}
			else
			{
				echo mysqli_error($connect);
				echo "<script>window.location='CustomerHome.php'</script>";
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
	<title>Give Feedback</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<style type="text/css">
		.fas
		{
			font-size: 40px;
			margin: 20px 20px 20px 0px;
			user-select: none;
		}
		.fas:hover
		{
			cursor: pointer;
		}
		#diappoint:hover, #sad:hover, #normal:hover, #good:hover, #excellent:hover
		{
			font-size: 53px;
		}
		#diappoint
		{
			color: #D94040;
		}
		#sad
		{
			color: #D96742;
		}
		#normal
		{
			color: #F2CD0C;
		}
		#good
		{
			color: #8DD941;
		}
		#excellent
		{
			color: #3CDB3A;
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
	<script type="text/javascript">
		document.getElementById('UserHome').classList.remove('menu-active');
		function setVal()
		{
			var rate = document.getElementById('txtRate');
			var divs = document.querySelectorAll(".fas");
			for (var i = 0; i < divs.length; i++) 
			{
				divs[i].addEventListener("click", function()
				{
					for (var j = 0; j < divs.length; j++) {
						divs[j].style.fontSize = "40px";
					}
					switch(this.id)
					{
						case "diappoint": rate.value = 1; break;
						case "sad": rate.value = 2; break;
						case "normal": rate.value = 3; break;
						case "good": rate.value = 4; break;
						default: rate.value = 5; break;
					}
					this.style.fontSize = "53px";
				});
			}
		}
	</script>
	<style type="text/css">
		body
		{
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
<div class="content">
	<form action="GiveFeedback.php" method="POST" style="margin-top: 100px;">
		<h1 style="margin-left: 20px;">Give Feedback</h1>
		<div  style="background-color: #F7F7F7">
		<img width="30%" src="assets\img\83-839916_thanks-for-your-feedback-feedback-png.png" height="30%" style="margin-left: 33%; margin-right: 20%">
		<table align="center" cellpadding="10px">
			<tr>
				<td>Please take a moment to rate us: </td>
			</tr>
			<tr>
				<td>
					<span class="fas" id="diappoint" onclick="setVal()">😞</span>
					<span class="fas" id="sad" onclick="setVal()">🙁</span>
					<span class="fas" id="normal" onclick="setVal()">😶</span>
					<span class="fas" id="good" onclick="setVal()">😉</span>
					<span class="fas" id="excellent" onclick="setVal()">😍</span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="txtRate" id="txtRate" value="0"></td>
			</tr>
			<tr>
				<td>Comment: </td>
			</tr>
			<tr>
				<td><textarea style="resize: none; " maxlength="50"  name="txtComment" class="form-control" required="required"></textarea></td>
			</tr>
			<tr>
				<td style="text-align: center;"><button name="btnSubmit">Submit</button></td>
			</tr>
			<tr>
				<td><a href="CustomerHome.php">Back to the User Home.</a></td>
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