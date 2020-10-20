<?php  
session_start();
include('connection.php');	
include('StaffHeader.php');
if (isset($_SESSION['S_StaffID'])) 
{
	$selectQuestion = "SELECT * FROM question";
	$runSelectQuestion = mysqli_query($connect, $selectQuestion);
	$count = mysqli_num_rows($runSelectQuestion);
}
else
{
	echo "<script>window.alert('Please login first')</script>";
	echo "<script>window.location='StaffLogin.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Questions</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<style type="text/css">
		table tr
		{
			border: 3px solid white;
		}
	</style>
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
	</script>
</head>
<body>
	<div class="content">
	<h1 style="margin-top: 100px; margin-left: 20px;">View Questions</h1>
	<form action="Question.php" method="POST">
		<table cellpadding='10px' width='100%' style="margin-bottom: 20px; background-color: #F4EFEC">
			<tr align="center" style="background-color: #E7E7E7;">
				<th>Question ID</th>
				<th>Customer ID</th>
				<th>Question</th>
				<th>Answer</th>
				<th>FAQ</th>
				<th>Update & Answer</th>
			</tr>
			<?php 
				for ($i=0; $i < $count; $i++) 
				{ 
					$arr = mysqli_fetch_array($runSelectQuestion);
					echo "<tr align='center'>";
						echo "<td>".$arr['QuestionID']."</td>";
						echo "<td>".$arr['CustomerID']."</td>";
						echo "<td>".$arr['Question']."</td>";
						echo "<td>".$arr['Answer']."</td>";
						echo "<td>".$arr['FAQ']."</td>";
						echo "<td><a href='Answer.php?QuestionID=".$arr['QuestionID']."'>Answer</a></td>";
					echo "</tr>";
				}
			 ?>
		</table>
				<a href="StaffHome.php" style="margin-left: 50%;">Back to Staff Home.</a>
	</form>
</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>