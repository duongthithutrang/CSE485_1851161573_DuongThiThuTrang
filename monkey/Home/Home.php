<?php
// Initialize the session
require_once "../config/config.php";
session_start();

// Check if the user is logged in, if not then redirect him to login page

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Home</title>
</head>
<body>
	<!-- <---------------------Menu------------------------------->
		<nav class="navbar navbar-expand-md navbar-light sticky-top"> 
			<div class="container-fluid" style="width: 300px;"> 
				<a class="navbar-brand" href="../Home/home.php" style="color: white;">Datamonkey</a> 
			</div> 
			<button class="navbar-toggler" type="button " data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive"> 
				<ul class="navbar-nav ml-auto"> 
					<li class="nav-item">
						<a class="nav-link" href="../Home/home.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="../blog/Blog.html" style="color: white;">Blog</a>
					</li>				
					<li class="nav-item">
						<a class="nav-link" href="../courses/Course.html">Courses</a>
					</li>
					<?php 
						if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
							echo '<li>
							<button type="button" id="buttonSignin" class="btn btn-primary"><a href="../SignIn/SignIn.php" style="color: white;">SIGN IN</a></button>
						</li>	';
						}else{
							
							$idcheck =  htmlspecialchars($_SESSION["id"]);
							$sql = "SELECT * FROM users where id=$idcheck";
							$result = mysqli_query($link, $sql);
							$row = mysqli_fetch_all($result);
							echo '<p class="nav-link">Welcome: '.$row[0][1].'</p>';
							echo '<button type="button" id="buttonLogout" class="btn btn-primary"><a href="../SignIn/logout.php" style="color: white;">LogOut</a></button>
							</li>';
						}
					?>
									
				</ul>
			</div>
		</nav>			
	<!-- <---------------------Menu------------------------------->
	<!-- <---------------------introduce------------------------------->
		<div class="container-fluid" id="introduce">
			<div class="row" id="intro" style="margin">
				<div class="col-lg-6" style="padding-left: 80px; padding top: 80px;">
					<h2 id="textIntro">Learn SQL and Excel for Data Analysis interactively with concrete examples and full immersion into the work environment.</h2>
					<button class="btn btn-danger">Start learning!</button>
				</div>
				<div class="col-lg-6">
					<img src="image/img1.1.png" alt="image1" id="img1" >
				</div>
			</div>
		</div>
	<!-- <---------------------introduce------------------------------->
	<!-- <---------------------Why Datamonkey------------------------------->
		<div class="container-fluid" id="WhyDatamonkey" style="background-color: white;">
			<div class="row" id="Why">
				<div class="col-lg-6">
					<img src="image/img3.png" alt="image3" id="img3" style="padding-right: ">
				</div>
				<div class="col-lg-6" id="information">
					<div class="row infor-item"><h3 >What makes our courses different?</h3></div>
					<div class="row infor-item" id="infor1" >
						<div class="col-lg-8">
							<b>The learn-by-doing approach and Game mechanics.</b>
							You will learn in an authentic work environment right in your browser. No boring lectures. Just learning by doing!
							
						</div>
						<div class="col-lf-4">
							<img src="image/logo1.png" class="logo" alt="logo1">
						</div>
					</div>
					<div class="row infor-item" id="infor2"> 
						<div class="col-lg-8">
							<b>Clear Explanations.</b>
							All the material is explained in simple and accessible language. You do not need to have a degree in statistics to get started on the lessons.
						</div>
						<div class="col-lf-4">
							<img src="image/logo2.png" class="logo" alt="logo1">
						</div>
					</div>
					<div class="row infor-item" id="infor3">
						<div class="col-lg-8">
							<b>Case Studies. </b>
							The best way to learn something new is to do it. All courses contain case studies, which will allow you to dip into the topic you studied.
						</div>
						<div class="col-lf-4">
							<img src="image/logo3.png" class="logo" alt="logo1">
						</div>
					</div>
					<div class="row infor-item">
						<a href=""><button class="btn btn-outline-success">START LEARNING!</button></a>
					</div>
				</div>
			</div>
		</div>
	<!-- <---------------------Why Datamonkey------------------------------->
	<!-- <---------------------Benefit------------------------------->
		<div class="container-fluid" id="Benefit">
			<div class="row" id="Benf">
				<div class="col-lg-6" id="BenefitInfor">
					<div class="row BenfInfo-item"><h3>Several reasons why you should learn Data Analysis:</h3></div>
					<div class="row BenfInfo-item">
						<div class="col-lg-4">
							<img src="image/logo1.1.png" alt="logo1.1">
						</div>	
						<div class="col-lg-8">
							<b>Data Analyst </b>
							 – an interesting and exciting job. Trends predictions, analysis of the weaknesses of a company, full involvement in business processes.
						</div>											
					</div>
					<div class="row BenfInfo-item">
						<div class="col-lg-4">
							<img src="image/logo1.2.png" alt="logo1.1">
						</div>	
						<div class="col-lg-8">
							<b>Big Brains Are Sexy. </b>
							 As an analyst, you will always be engaged in work that requires full intellectual engagement. You’ll never have to be bored.
						</div>											
					</div>
					<div class="row BenfInfo-item">
						<div class="col-lg-4">
							<img src="image/logo1.3.png" alt="logo1.1">
						</div>	
						<div class="col-lg-8">
							<b>At Least 30% + In Your Salary.</b>
							  It is no secret that Data Analysis knowledge can help you get a promotion. Although our work can be pleasurable, we still want to earn serious money from it. Analyst - one of the highest paid professions.
						</div>											
					</div>
					<div class="row BenfInfo-item">
						<a href=""><button class="btn btn-outline-success">START LEARNING!</button></a>
					</div>
				</div>
				<div class="col-lg-6" id="img2">
					<img src="image/img2.png" alt="image2" id="img2">
				</div>
			</div>
		</div>
	<!-- <---------------------Benefit------------------------------->
	<!-- <---------------------Reviews------------------------------->
		<div class="container-fluid" id="Reviews">
			<div class="row" id="Header">
				<h2>Loved & Trusted by our Users</h2>
				<p>We are always happy to receive feedback from you.</p>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner"> 
					<div class="carousel-item active">
						<img src="image/Review1.png" class="d-block w-100">
					</div>
					<div class="carousel-item">
						<img src="image/Review2.png" class="d-block w-100">
					</div>
					<div class="carousel-item">
						<img src="image/Review3.png" class="d-block w-100">
					</div>
				</div> 
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="color: black;"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="row">
				<h2 style="margin-left: 400px; margin-top: 40px;">Immerse yourself in the world of data analysis now!</h2>				
			</div>
			<div class="row" id="btn">
				<a href="" style="margin-left: 45%; margin-top: 40px;"><button class="btn btn-outline-success">START LEARNING!</button></a>
			</div>
		</div>
	<!-- <---------------------Reviews------------------------------->
	<!-- <---------------------About Us------------------------------->
		<div class="container-fluid" id="About">
			<div class="row">
				<h2 style="margin: 40px 0px 0px 46%;">About Us</h2>
				<p style="margin: 40px 0px 0px 37%;">We have vast experience in data analysis and developing.</p>	
				<p style="margin: 0px 0px 0px 15%;">Ilya: background as an analyst in FMCG and e-commerce to banking Associate. Teaching experience (Data Analysis training). Master’s Degree in math.</p>	
				<p style="margin: 0px 0px 0px 27%;">Leonid: Java/Python developer at a major gas and oil company, SQL professional with teacher education.</p>				
			</div>
			<div class="row">
				<img src="image/About.png" alt="" style="margin-left: 250px;">
			</div>
		</div>
	<!-- <---------------------About Us------------------------------->
	<!-- <---------------------footer------------------------------->
		<div class="container-fluid" id="footer" style="background-color: #2d2a2a;">
			<div class="row" id="footIcon">
				<img src="image/mailicon.png" alt="" id="mailicon">	
			</div>
			<div class="row" id="footLink"><a href="">mail@datamonkey.pro</a></div>
			<div class="row " id="copyright"><p>Datamonkey &copy 2020</p></div>
		</div>
	<!-- <---------------------footer------------------------------->
</body>
</html>