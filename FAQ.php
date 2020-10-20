<?php 
session_start();
include('connection.php');
include('CustomerHeader.php');
include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/FAQ.php");
$selectQuestion = "SELECT * FROM question WHERE Status=1 AND FAQ='FAQ'";
$runQuestion = mysqli_query($connect, $selectQuestion);
$selectCount = mysqli_num_rows($runQuestion);
if(isset($_SESSION['C_CustomerID']))
{
	if (isset($_POST['btnAskQues'])) 
	{
		$Question = $_POST['txtQuestion'];
	}
	if(isset($_POST['btnSubmit']))
	{
		$Question2 = $_POST['txtQuestion']; 
		$t=time();
		$QuestionDate = date("Y-m-d",$t);
		$CustomerID = $_SESSION['C_CustomerID'];
		$Status = 0;
		$insertQuestion = "INSERT INTO question (Question, QuestionDate, CustomerID, Status) VALUES ('$Question2', '$QuestionDate', '$CustomerID', $Status)";
		$runInsert = mysqli_query($connect, $insertQuestion);
		if ($runInsert) 
		{
			echo "<script>window.alert('Question is submitted.')</script>";
			echo "<script>window.location='CustomerHome.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
			echo "<script>window.location='CustomerHome.php'</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ Display</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('UserHome').classList.remove('menu-active');
		function questionLoad()
		{
			document.getElementById('txtQuestion').value = "<?php echo $Question ?>";
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
<body onload="questionLoad()">
	<div class="content">
	<?php 
	if($selectCount > 0)
	{
		echo "<h1 style='margin-top: 100px; margin-left: 20px;'>Frequently Asked Questions Sector</h1><table style='margin-left:20px;' cellpadding='5px'>";
		for ($i=0; $i < $selectCount; $i++) 
		{ 
			$arr = mysqli_fetch_array($runQuestion);
			$QuestionDisplay = $arr['Question'];
			$Answer = $arr['Answer'];
			echo "<tr style='border: 1px solid #9DCECE;'>
			<td>Q: $QuestionDisplay</td>
			</tr>
			<tr>
			<td style='background-color: #9DCECE; width='100%;''>A: $Answer</td>
			</tr>
			<tr><td><br></td></tr>";
		}
		echo "</table>";
	}
	?>
<form action="FAQ.php" method="POST" style="margin-top: 100px; background-color: #F7F7F7">
	<h4 style="margin-left: 20px;">Confirm Question</h4>
	<table align="center">
		<tr>
			<td>Question:</td>
		</tr>
		<tr>
			<td><textarea style="resize: none; " rows="3" cols="50" maxlength="200" name="txtQuestion" id="txtQuestion"></textarea></td>
		</tr>
		<tr>
			<td style="text-align: center;"><button name="btnSubmit">Submit</button></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php'); ?>
</div>