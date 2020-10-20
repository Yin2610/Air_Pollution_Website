<?php 
session_start();
include('connection.php');
include('StaffHeader.php');
if (isset($_SESSION['S_StaffID'])) 
{
	if(isset($_REQUEST['QuestionID']))
	{
		$QuestionID = $_REQUEST['QuestionID'];
		$selectQuestion = "SELECT * FROM Question WHERE QuestionID = '$QuestionID'";
		$selectRun = mysqli_query($connect, $selectQuestion);
		$arr = mysqli_fetch_array($selectRun);
		$Question = $arr['Question'];
		$Answer = $arr['Answer'];
	}
	if (isset($_POST['btnAnswer'])) 
	{
		$QuestionID = $_POST['txtQuestionID'];
		$Answer = $_POST['txtAnswer'];
		$Status = 1;
		$FAQ = $_POST['FAQ'];
		$updateQuestion = "UPDATE Question SET Answer = '$Answer', Status = '$Status', FAQ = '$FAQ' WHERE QuestionID = '$QuestionID'";
		$runUpdate = mysqli_query($connect, $updateQuestion);
		if ($runUpdate) 
		{
			echo "<script>window.alert('Answer successfully submitted.')</script>";
			echo "<script>window.location='ViewQuestion.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
			echo "<script>window.location='Answer.php'</script>";
		}
	}
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
	<title>Answer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<script type="text/javascript">
		document.getElementById('StaffHome').classList.remove('menu-active');
		function assignValues()
		{
			document.getElementById('txtQuestion').value = "<?php echo $Question ?>";
			document.getElementById('txtAnswer').value = "<?php echo $Answer ?>";
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
<body onload="assignValues()">
	<div class="content">
		<h1 style="margin-left: 20px; margin-top: 100px;">Answer Questions</h1>
		<form action="Answer.php" method="POST" style=" background-color: #F5F5F5;">
			<table align="center" cellpadding="10px">
				<tr>
					<td>
						Question:
					</td>
					<tr>
					<td>
						<input type="hidden" name="txtQuestionID" value="<?php echo $QuestionID?>">
						<textarea name="txtQuestion" id="txtQuestion" style="resize: none;" readonly="readonly" class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Answer:
					</td>
				</tr>
				<tr>
					</td>
					<td>
						<textarea name="txtAnswer" id="txtAnswer" style="resize: none;" class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td>FAQ: </td>
				</tr>
				<tr>
					<td>
						<select name='FAQ' class="form-control">
						<option value='Not FAQ'>Don't set FAQ.</option>
						<option value='FAQ'>Set FAQ.</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<button name="btnAnswer">Answer</button>
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