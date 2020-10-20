<?php 
session_start();
include('connection.php');
include('StaffHeader.php');
if (isset($_SESSION['S_StaffID'])) 
{
	$selectFeedback= "SELECT f.*, c.FullName FROM feedback f, customer c WHERE c.CustomerID = f.CustomerID";
	$runSelect = mysqli_query($connect, $selectFeedback);
	$count = mysqli_num_rows($runSelect);
	if(isset($_POST['btnSearch']))
	{
		$searchRadio = $_POST['rdoSearch'];
		if ($searchRadio == 1) 
		{
			$cboFeedbackID = $_POST['cboFeedbackID'];
			$selectFeedback = "SELECT f.*, c.FullName 				
								FROM feedback f, customer c 							
								WHERE c.CustomerID = f.CustomerID
								AND f.FeedbackID='$cboFeedbackID'";
			$runSelect = mysqli_query($connect, $selectFeedback);
			$count = mysqli_num_rows($runSelect);
		}
		else 
		{
			$From = $_POST['dFrom'];
			$To = $_POST['dTo'];
			$selectFeedback = "SELECT f.*, c.FullName 
								FROM feedback f, customer c
								WHERE c.CustomerID = f.CustomerID
								AND f.FeedbackDate BETWEEN '$From' AND '$To'";
			$runSelect = mysqli_query($connect, $selectFeedback);
			$count = mysqli_num_rows($runSelect);
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
	<title>Feedbacks</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
	</script>
	<style type="text/css">
		.table1
		{
			border: 1px solid black;
			background-color: #F5F5F5;
		}
		.table2 tr
		{
			border: 3px solid white;
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
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
</head>
<body>
	<div class="content">
		<form action="ViewFeedback.php" method="POST" style="margin-top: 100px;">
			<h1 style="margin-left: 20px;">View Feedbacks</h1>
			<div style="display: inline-block; float: left;">
				<table class="table1" cellpadding="10px"style="margin-left: 5%; margin-bottom: 20px;">
					<tr>
						<td colspan="2">
							<input type="radio" name="rdoSearch" value="1" checked="checked">Search by Feedback ID
						</td>
					</tr>
					<tr>
						<td>
							<select name="cboFeedbackID">
								<option>Choose FeedbackID</option>
								<?php 
								$selectFeedback = "SELECT * FROM feedback";
								$selectFeedbackRun = mysqli_query($connect, $selectFeedback);
								$countFeedback = mysqli_num_rows($selectFeedbackRun);
								for ($i=0; $i < $countFeedback; $i++) 
								{ 
									$arr = mysqli_fetch_array($selectFeedbackRun);
									$FeedbackID = $arr['FeedbackID'];
									echo "<option value='$FeedbackID'>$FeedbackID</option>";
								}
								?>
							</select>	
						</td>
					</tr>
					<tr>
						<td>
							<div><br><br></div>
							<input type="radio" name="rdoSearch" value="2">Search by date
						</td>
					</tr>
					<tr>
						<td>
							Between
						</td>
						<td>
							And
						</td>
					</tr>
					<tr>
						<td>
							<input type="date" name="dFrom">
						</td>
						<td>
							<input type="date" name="dTo">
						</td>
					</tr>
					<tr>	
						<td colspan="2" align="center">
							<button name="btnSearch" value="Search" style="margin-top: 10px;">Submit</button>
						</td>
					</tr>
				</table>
			</div>
			<div style="display: inline-block; float: left; margin-bottom: 20px;">
				<h3 style="margin-left: 5%; margin-top: 5%">Feedback Information</h3>
				<table cellpadding="8px" class="table2" style=" background-color: #F4EFEC; margin-left: 3%; margin-right: 3%">
					<tr align="center" style="background-color: #E7E7E7;">
						<th>Feedback ID</th>
						<th>Feedback Date</th>
						<th>Customer Name</th>
						<th>Rating</th>
						<th>Comment</th>
					</tr>
					<?php
					for ($i=0; $i < $count; $i++) 
					{ 
						$arr = mysqli_fetch_array($runSelect); 	
						$FeedbackID = $arr['FeedbackID'];
						$FeedbackDate = $arr['FeedbackDate'];
						$Comment = $arr['Comment'];
						$CustomerName = $arr['FullName'];
						$Rate = $arr['Rate'];
						echo "<tr align='center'>";
						echo "<td>$FeedbackID</td>";
						echo "<td>$FeedbackDate</td>";
						echo "<td>$CustomerName</td>";
						echo "<td>$Rate</td>";
						echo "<td>$Comment</td>";
						echo "</tr>";
					} 
					?>
				</table>
				</div>
				</div>
				<a href="StaffHome.php" style="margin-left: 50%; clear: both; margin-bottom: 3%;">Back to Staff Home.</a>
		</form>
	
</body>
</html>
<div>
<?php include('Footer.php'); ?>
</div>