<?php 
	include("connection.php");

	//Drop Customer Table
	$custDrop = "DROP TABLE customer";
	$sqlDrop = mysqli_query($connect, $custDrop);
	if($sqlDrop)
	{
		echo "<p>Customer table dropped successfully.</p>";
	}

	//Create Customer Table
	$custCreate = "CREATE TABLE customer
				(
					CustomerID int Auto_Increment not null primary key,
					FullName varchar(30),
					Email varchar(30),
					DateOfBirth varchar(10),
					PostalAddress varchar(30),
					PostalCode int,
					UserName varchar(30),
					Password varchar(50),
					Image varchar(255),
					Gender varchar(10),
					PhoneNumber varchar(15)
				)";
	$runCustCreate = mysqli_query($connect, $custCreate);
	if ($runCustCreate) 
	{
		echo "<p>Customer table created successfully.</p>";
	}
	else
	{
		echo mysqli_error($connect);
	}

	//_____________________________________________________________________________________________________________

	//Drop Country Table
	$counDrop = "DROP TABLE country";
	$sqlDrop = mysqli_query($connect, $counDrop);
	if($sqlDrop)
	{
		echo "<p>Country table dropped successfully.</p>";
	}

	//Create Country Table
	$counCreate = "CREATE TABLE country
				(
					CountryID int Auto_Increment not null primary key,
					CountryName varchar(30),
					Year int,
					CountryImg1 varchar(255),
					CountryImg2 varchar(255),
					CountryImg3 varchar(255),
					AirAQI int,
					Description varchar(200)
				)";
	$runCounCreate = mysqli_query($connect, $counCreate);
	if($runCounCreate)
	{
		echo "<p>Country table created successfully.</p>";
	}
	else
	{
		echo mysqli_error($connect);
	}
	//_____________________________________________________________________________________________________________

	//Drop Staff Table
	$staffDrop = "DROP TABLE staff";
	$sqlDrop = mysqli_query($connect, $staffDrop);
	if($sqlDrop)
	{
		echo "<p>Staff table dropped successfully.</p>";
	}
	//Create Staff Table
	$staffCreate = "CREATE TABLE staff
				(
					StaffID int Auto_Increment not null primary key,
					StaffName varchar(30),  
					Email varchar(30),
					StaffPosition varchar(30), 
					StaffPhone varchar(20), 
					StaffGender varchar(10), 
					StaffAddress varchar(100), 
					Password varchar(15)
				)";
	$runStaffCreate = mysqli_query($connect, $staffCreate);
	if($runStaffCreate)
	{
		echo "<p>Staff table created successfully.</p>";
	}
	else
	{
		echo mysqli_error($connect);
	}
	//_____________________________________________________________________________________________________________

	//Drop Question Table
	$quesDrop = "DROP TABLE question";
	$sqlDrop = mysqli_query($connect, $quesDrop);
	if($sqlDrop)
	{
		echo "<p>Question table dropped successfully.</p>";
	}
	//Create Question Table
	$quesCreate = "CREATE TABLE question
				(
					QuestionID int Auto_Increment not null primary key,
					Question varchar(200),
					QuestionDate varchar(20),
					CustomerID int,
					Answer varchar(200),
					Status int,
					FAQ varchar(10)
				)"; 
	$runquesCreate = mysqli_query($connect, $quesCreate);
	if($runquesCreate)
	{
		echo "<p>Question table created successfully.</p>";
	}
	else
	{
		echo mysqli_error($connect);
	}
	//_____________________________________________________________________________________________________________

	//Drop Feedback Table
	$fbdrop = "DROP TABLE feedback";
	$sqlDrop = mysqli_query($connect, $fbdrop);
	if($sqlDrop)
	{
		echo "<p>Feedback table dropped successfully.</p>";
	}
	//Create Feedback Table
	$fbCreate = "CREATE TABLE feedback
				(
					FeedbackID int Auto_Increment not null primary key,
					FeedbackDate date, 
					Rate int,
					Comment varchar(50), 
					CustomerID int
				)";
	$runfbCreate = mysqli_query($connect, $fbCreate);
	if($runfbCreate)
	{
		echo "<p>Feedback table created successfully.</p>";
	}
	else
	{
		echo mysqli_error($connect);
	}	
?>