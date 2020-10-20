<?php
	session_start(); 
	include('connection.php');
	include('StaffHeader.php');
	if(!isset($_SESSION['S_StaffID']))
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.location='StaffLogin.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Home</title>
  <link rel="stylesheet" type="text/css" href="assets\css\stickyFooter.css">
	<style type="text/css">
		.underline:hover
		{
			text-decoration: underline;
		}
		.center
		{
			text-align: center;
		}
	</style>
  <script type="text/javascript">
    document.getElementById('StaffHome').classList.add('menu-active');
  </script>
</head>
<body>
  <div class="content">
  <h1 style="margin-top: 100px; margin-left: 20px;">Staff Home</h1>
	<!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title" style="margin-bottom: 50px;">Functions</h3>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="CountryList.php"><i class="fa fa-bar-chart"></i></a></div>
              <h4 class="title"><a href="CountryList.php">Country List</a></h4>
              <p class="description">View air pollution data in countries.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="CountryRegistration.php"><i class="fa fa-laptop"></i></a></div>
              <h4 class="title"><a href="CountryRegistration.php">Country Register</a></h4>
              <p class="description">Register new country's air pollution data.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="ViewQuestion.php"><i class="fa fa-paper-plane"></i></a></div>
              <h4 class="title"><a href="ViewQuestion.php">View Questions</a></h4>
              <p class="description">View and answer the questions asked by the customers.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="ViewFeedback.php"><i class="fa fa-comments-o"></i></a></div>
              <h4 class="title"><a href="ViewFeedback.php">View Feedback</a></h4>
              <p class="description">View the feedback and ratings from the customers.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="StaffProfile.php"><i class="fa fa-user"></i></a></div>
              <h4 class="title"><a href="StaffProfile.php">Profile</a></h4>
              <p class="description">View Profile and update information.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="StaffRegistration.php"><i class="fa fa-plus"></i></a></div>
              <h4 class="title"><a href="StaffRegistration.php">Staff Register</a></h4>
              <p class="description">Register more staff.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->
</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>