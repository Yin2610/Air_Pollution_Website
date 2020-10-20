<?php
	include('connection.php');
	if(isset($_GET['CountryID']))
	{
		$CountryID = $_GET['CountryID'];
		$deleteCountry = "DELETE FROM Country WHERE CountryID='$CountryID'";
		$runDelete = mysqli_query($connect, $deleteCountry);
		if($runDelete)
		{
			echo "<script>window.alert('Country information deleted.')</script>";
			echo "<script>window.location='CountryList.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
			echo "<script>window.location='CountryList.php'</script>";
		}
	}
	else
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.location='StaffLogin.php'</script>";
	}
?>