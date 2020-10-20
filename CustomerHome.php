<?php
	session_start();
	include('connection.php');
	include('CustomerHeader.php');
	include('BrowsingFunction.php');
	recordBrowsing("http://localhost:70/L5DC73Assignment/Program/CustomerHome.php");
	if (!isset($_SESSION['C_CustomerID'])) 
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.location='CustomerLogin.php'</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Home</title>
  <link rel="stylesheet" type="text/css" href="assets/css/stickyFooter.css">
  <style type="text/css">
    ul
    {
      list-style: none;
      padding: 0;
    }
    #tips li:before
    {
      content: '✓';
      margin: 0 1em;
    }
    #dangers li:before
    {
      content: '✗';
      margin: 0 1em;
    }
    #tips li, #dangers li
    {
      line-height: 40px;
    }
    .hover:hover
    {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="content">
	<h1 style="margin-top: 100px; margin-left: 20px;">User Home</h1>
	<main id="main">

	<!-- ======= About Section ======= -->
    <section id="about">
      <div data-aos="fade-up">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Our Intention</h2>
            <p>
              This website "TOXIC AIR" is developed for viewing <b>air pollution</b> data around the world. We want to inform you about how the air nature is getting worse due to human acts. We wish you get knowledge about air pollution and try to take part in environmental maintenance activites after this visit. 
            </p>
            <q>You are what you breathe.</q>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon" style="font-size: 30px; border-color: #ffbe16;">&#128161;</div>
              <h4 class="title" style="margin-top: 20px;"><a href="#tips">Air Pollution Reduction Tips</a></h4>
              <p class="description"><a href="#tips">Please click to read about Air Pollution Reduction Tips.</a></p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon" style="color: red;font-size: 30px; border-color: red;">⚠</div>
              <h4 class="title"><a href="#dangers">Dangers of Air Pollution</a></h4>
              <p class="description"><a href="#dangers">Please click to read about the Effects of Air Pollution to our health.</a></p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" style="background-color: white;">
      <div data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Facts</h3>
          <div class="section-description">Polluted air means a mixture of particles and gases are in air that can harm living things both outside and indoors.</div>
          <div class="section-description"> Examples of the particles and gases are soot, smoke, pollen, methane(CH<sub>4</sub>) and carbon dioxde(CO<sub>2</sub>).</div>
          <!-- <p class="section-description"></p> -->
        </div>
        <div class="row counters" style="margin-top: 25px;">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">4.6</span><p>Million death caused by air pollution annually</p>
          </div>

		  <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">9</span>
            <p>% deaths globally because of air pollution</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">100,000</span>
            <p>sea mammals and 1 million seabirds are killed by pollution anually.</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">91</span>
            <p>% of world's population are in places that air quality exceeds WHO guideline limits</p>
          </div>

        </div>

      </div>
    </section> <!-- End Facts Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title" style="margin-bottom: 60px">Enjoy your visit</h3>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="assets/img/6dbd0e938fcd175f1a1446ed07d9026a.jpg" alt="Air pollution data"></div>
              <a href="CountryDisplay.php">Go to observe air pollution in countries >></a>
            </div>
          </div>

           <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="assets\img\questions.png" alt="Ask questions"></div>
              <a href="AskQuestions.php">Contact us or ask any question about air pollution >></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="assets\img\Feedback-Form-Image-NEW-275x300.png" alt="Feedback"></div>
              <a href="GiveFeedback.php">Please take a moment to  give a feedback >></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="assets\img\images.jpg" alt="Navigation history"></div>
              <a href="QueryHistory.php">Go to view your navigation history >></a>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Team Section -->

    <section style="background-color: #F5F5F5;" data-aos="fade-up">
      <h2 style="text-align: center;">Death rates from air pollution</h2>
        <div style=" margin-left: 10px; margin-bottom: 10%;" align="center">
          <img src="assets/img/death-rates-from-air-pollution_v1_850x600.svg" width="450px" height="320px" alt="Picture displaying air pollution data">
        </div>

        <div id="tips" style="margin-left: 20px; margin-top: 20px">
          <div style="display: inline-block; float: left;">
            <h4>Tips to reduce air pollution</h4>
          <ul id="tips">
            <li>Turn off lights and electric appliances when not in use.</li>
            <li>Reduce the number of trips you take in your car.</li>
            <li>Reduce fireplace and wood stove use.</li>
            <li>Plant more trees to absorb carbon dioxide.</li>
            <li>Recycle and reuse things in stead of burning them.</li>
          </ul>
          </div>
          <div style="display: inline-block;" align="center">
          <img src="assets/img/shutterstock_425106391-e1546444924149.jpg" width="50%" height="50%">
          </div>
        <div style="display: inline-block; float: left; margin-top: 10px" align="center">
          <img src="assets/img/boy-wearing-face-mask-getty-479172715.jpg" width="45%" height="50%">
        </div>
        <div style="display: inline-block; ">
          <h4>Effects of air pollution on health</h4>
          <ul id="dangers">
            <li>Respiratory diseases</li>
            <li>Cardiovascular damage</li>
            <li>Fatigue, headaches and anxiety</li>
            <li>Irritation of the eyes, nose and throat</li>
            <li>Nervous system damage</li>
          </ul>
        </div>
        <div style="margin-top: 15px; margin-bottom: 20px" >
        Read more about air pollution on these websites:<br>
          <a href="https://www.niehs.nih.gov/health/topics/agents/air-pollution/index.cfm" target="_blank" class="hover">https://www.niehs.nih.gov/health/topics/agents/air-pollution/index.cfm</a>
          <br>
          <a href="https://solarimpulse.com/air-pollution-solutions" target="_blank" class="hover">https://solarimpulse.com/air-pollution-solutions</a>
        </div>
      </div>
    </section>

</main>
</div>
</body>
</html>
<div class="footer">
<?php include('Footer.php') ?>
</div>