<?php 
session_start();
include('connection.php');
include('CustomerHeader.php');
include('BrowsingFunction.php');
recordBrowsing("http://localhost:70/L5DC73Assignment/Program/QueryHistory.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Browsing History</title>
	<link rel="stylesheet" type="text/css" href="assets\css\stickyFooter.css">
	<style type="text/css">
		.nth-table tr:nth-child(even)
		{
			background: #9DCECE;
		}
	</style>
	<script type="text/javascript">
		document.getElementById('UserHome').classList.remove('menu-active');
	</script>
</head>
<body style="background-color: #F7F7F7">
	<div class="content">
		<div style="margin-top: 100px; text-align: center;">
	<a href="QueryHistory.php?action=clear">
		Clear all history.
	</a>
</div>
<?php
if (isset($_REQUEST['action'])) 
{
	unset($_SESSION['Browse']);
}
if (isset($_SESSION['Browse'])) 
{
	$count = count($_SESSION['Browse']);
	if($count == 0)
	{
		echo "<p>No history found.</p>";
	}
	else
	{
		echo "<table align='center' width='80%' class='nth-table' style='margin-top:20px;' cellpadding='7px'>";
			echo "<tr style='background-color: #71bfbf'>
				<th>History url</th>
				<th>Date and Time</th>
				<tr>";
				for ($i=0; $i < $count; $i++) 
				{ 
					echo "<tr>";
						echo "<td>".$_SESSION['Browse'][$i]['PageName']."</td>";
						echo "<td>".$_SESSION['Browse'][$i]['DateTime']."</td>";
					echo "</tr>";
				}
		echo "</table>";
	}
}
 ?>
</div>
</body>
</html>
<div class="footer" style="margin-top: 20px;">
 <?php include('Footer.php'); ?>
</div>