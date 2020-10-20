<?php 
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/AskQuestions.php");
	if ($_SESSION['C_CustomerID']) 
	{
		$CustomerID = $_SESSION['C_CustomerID'];
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
	<title>Ask Questions</title>
  <link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
	<style type="text/css">
		body
		{
			background-color: #f5f5f5;
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
  </script>
</head>
<body>
  <div class="content">
    <form action="FAQ.php" method="POST" style="margin-top: 100px;">
    	<h1 style="margin-left: 20px;">Ask Questions</h1>

    	<!-- ======= Contact Section ======= -->
        <section id="contact">
          <div class="container">
            <div class="section-header">
              <h3 class="section-title">Contact</h3>
              <p class="section-description">Any questions about air pollution are welcome.</p>
            </div>
          </div>

          <div class="container mt-5">
            <div class="row justify-content-center">

              <div class="col-lg-3 col-md-4">

                <div class="info">
                  <div>
                    <i class="fa fa-map-marker"></i>
                    <p>A108 Adam Street<br>New York, NY 535022</p>
                  </div>

                  <div>
                    <i class="fa fa-envelope"></i>
                    <p>Service@ToxicAir.com</p>
                  </div>

                  <div>
                    <i class="fa fa-phone"></i>
                    <p>+1 5589 55488 55s</p>
                  </div>
                </div>

                <div class="social-links">
                  <a href="https:\\www.twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="https:\\www.facebook.com" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="https:\\www.linkedin.com" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>

              </div>

              <div class="col-lg-5 col-md-8">
                    <div class="form-group">
                      <textarea style="resize: none; " rows="3" cols="30" class="form-control" required="required" name="txtQuestion" placeholder="Question"></textarea>
                    </div>
                    <div style="text-align: center;"><button name="btnAskQues">Submit</button></div>
                  </form>
                </div>
              </div>
    			
            </div>
            	<a href="CustomerHome.php" style="float: right; margin-right: 50px;">Back to the User Home.</a>
          </div>
        </section><!-- End Contact Section -->

    </form>
  </div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>