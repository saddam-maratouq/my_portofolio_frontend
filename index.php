
<?php

$uploadImgPath  = '../../Task28-backend/upload-img/' ; 

// '../../Task28-backend/upload-img/web_logo/' ;
// show err 
require './err_config/err_config.php';

// get sql connection 
require_once './config_sql/connect_db.php';

// fn get many data depend on table you want ....
require_once './config_sql/get_data.php' ; 



function escapeHtml($str) {
    return htmlspecialchars($str ?? 'Default name', ENT_QUOTES, 'UTF-8');
}; 


$webSiteData = getSingleQueryData('website_settings') ; 





?> 





<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">

	
	<title> <?= $webSiteData['web_title'] ?>  Portfolio</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<!--================ Start Header Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->

				
					<a class="navbar-brand logo_h" href="index.php">
						<img class="web_logo" src="<?=$uploadImgPath?>/web_logo/<?= escapeHtml($webSiteData['image_name']) ?>  "  alt="">
					</a>
					

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-end">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="#aboutSec">About</a></li>
							<li class="nav-item"><a class="nav-link" href="#servicesSec">Services</a></li>
							<li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
							
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Area =================-->

	<!--================ Start Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row"> 
					<?php         
					
						$heroData = getQueryData('hero')  ; 

						foreach ($heroData as $hero )  : 
						
					?>
					<div class="col-lg-7">
						<div class="banner_content">
							<h3 class="text-uppercase">Hell0</h3>
							<h1 class="text-uppercase">I am <?=escapeHtml($hero['name'])?> </h1>
							<h5 class="text-uppercase"><?=escapeHtml($hero['title'])?>  </h5>
							<div class="d-flex align-items-center">
								<a class="primary_btn" href="#"><span>Hire Me</span></a>
								<a class="primary_btn tr-bg" href="#"><span>Get CV</span></a>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="home_right_img">
							<img class=""   src="<?=$uploadImgPath?>/hero/<?= escapeHtml($hero['image_name']) ?>"  alt="hero_img">
						</div>
					</div>
					<?php  endforeach ?>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Start About Us Area =================-->
	<section class="about_area section_gap" id="aboutSec" >
		<div class="container">
			<div class="row justify-content-start align-items-center">
				<div class="col-lg-5">

					<?php   $aboutMe = getSingleQueryData('about')       ?>

					<div class="about_img">
						<img class="" src=" <?=$uploadImgPath?>/about/<?= escapeHtml($aboutMe['image_name']) ?>  " alt="">
					</div>
				</div>

				<div class="offset-lg-1 col-lg-5">
					<div class="main_title text-left">
						<h2>let’s <br>
							Introduce about <br>
							myself</h2>
						<p>
							<?= escapeHtml($aboutMe['description']) ?>
						</p>
						<a class="primary_btn" href="#"><span>Download CV</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End About Us Area =================-->

	<!--================ Srart Brand Area =================-->
	<section class="brand_area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="row"> 
						<?php   $tecData = getQueryData('experience_gallery')   ;
						foreach ($tecData as $tec) :
						?>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-brand-item d-table">
								<div class="d-table-cell text-center">
									<img src=" <?=$uploadImgPath?>/experince-technology/<?= escapeHtml( $tec['image_name'])?>   "  alt="">
								</div>
							</div>
						</div>
						<?php  endforeach ?>
					</div>
				</div>

				<div class="offset-lg-2 col-lg-4 col-md-6">
					<div class="client-info">
						<div class="d-flex mb-50">
							<?php  $experienceInfo = getSingleQueryData('experience_info')   ?>

							<span class="lage"> <?= escapeHtml($experienceInfo['years_of_experience']) ?> </span>
							<span class="smll">Years Experience Working</span>
						</div>
						<div class="call-now d-flex">
							<div>
								<span class="fa fa-phone"></span>
							</div>
							<div class="ml-15">
								<p>call us now</p>
								<h3 class="my-number" ><?= escapeHtml($experienceInfo['phone_number']) ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Brand Area =================-->

	<!--================ Start Features Area =================-->
	<section class="features_area"  id="servicesSec" >
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="main_title">
						<h2>service offers </h2>
						<p>
							Is give may shall likeness made yielding spirit a itself togeth created 
							after sea <br> is in beast beginning signs open god you're gathering ithe
						</p>
					</div>
				</div>
			</div>
			<div class="row feature_inner"> 
				<?php     
				
						$servicesData = getQueryData('services') ; 

						foreach ( $servicesData as  $service ) : 
				?>
				<div class="col-lg-3 col-md-6"> 
					<div class="feature_item">
						<img src="<?= $uploadImgPath ?>/services/<?= escapeHtml($service['image_name'] ?? 'default.jpg') ?>" alt="service img">

						<h4> <?=escapeHtml($service['title']) ?>  </h4>
						<p><?=escapeHtml($service['description']) ?> </p>
					</div>
				</div>
				<?php    endforeach  ?>

			</div>
		</div>
	</section>
	<!--================ End Features Area =================-->

	<!--================Start Portfolio Area =================-->
	<section class="portfolio_area" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title text-left">
						<h2>quality work <br>
							Recently done project </h2>
					</div>
				</div>
			</div>
			<div class="filters portfolio-filter">
				<ul>
					<li class="active" data-filter="*">all</li>
					<li data-filter=".popular">popular</li>
					<li data-filter=".latest"> latest</li>
					<li data-filter=".following">following</li>
					<li data-filter=".upcoming">upcoming</li>
				</ul>
			</div>
	
			<div class="filters-content">
				<div class="row portfolio-grid justify-content-center">

					<?php   $projectData  = getQueryData('my_projects')  ;
					
					foreach ($projectData as $project ) :
						

					?>

					<div class="col-lg-4 col-md-6 all   <?=  escapeHtml($project['type']) ?>    ">
						<div class="portfolio_box">
							<div class="single_portfolio">
	                      <img class="img-fluid w-100"
						   src="<?= $uploadImgPath ?>/projects/<?= escapeHtml($project['image_name'] ??
						    'default-project.jpg') ?>" " alt="project image"
							>
								<div class="overlay"></div>
								<a href="img/portfolio/p2.jpg" class="img-gal">
									<div class="icon">
										<span class="lnr lnr-cross"></span>
									</div>
								</a>
							</div>
							<div class="short_info">
								<h4><a href="portfolio-details.html"> <?= escapeHtml($project['project_name']) ?>   </a></h4>
								<p> <?=  escapeHtml($project['description']) ?>  </p>
							</div>
						</div>
					</div>

					<?php   endforeach ?>

				</div>
			</div>
		</div>
	</section>
	<!--================End Portfolio Area =================-->

	<!--================ Start Testimonial Area =================-->
	<div class="testimonial_area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="main_title">
						<h2>client say about me</h2>
						<p>Is give may shall likeness made yielding spirit a itself togeth created after sea is in beast <br>
							 beginning signs open god you're gathering ithe</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="testi_slider owl-carousel">

				<?php      $feedBacksData = getQueryData('feedback')  ;
				
						foreach ($feedBacksData as $feedBack ) :
						
				?> 

        			<div class="testi_item">
        				<div class="row">
        					<div class="col-lg-4">
        						<img class="feedback_img"  src="<?= $uploadImgPath ?>/feedback/<?= htmlspecialchars($feedBack['image_name'] ?? 'default-user.jpg') ?>"
								 alt="<?= htmlspecialchars($feedBack['client_name'] ?? 'client') ?>"
								 >
        					</div>
        					<div class="col-lg-8">
        						<div class="testi_text">
        							<h4><?= htmlspecialchars($feedBack['client_name'] ?? 'Client Name') ?></h4>
									<p><?= htmlspecialchars($feedBack['feedback'] ?? 'No feedback provided.') ?></p>
        						</div>
        					</div>
        				</div>
        			</div> 

					<?php   endforeach ?> 

        		</div>
			</div>
		</div>
	</div>
	<!--================ End Testimonial Area =================-->

	<!--================ Start Newsletter Area =================-->
	<!--================ End Newsletter Area =================-->

	<!--================Footer Area =================-->
	<footer class="footer_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="footer_top flex-column">
						<div class="footer_logo">
							<a href="#">
								<img src="img/logo.png" alt="">
							</a>
							<h4>Follow Me</h4>
						</div>
						<div class="footer_social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer_bottom justify-content-center">
				<p class="col-lg-8 col-sm-12 footer-text">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Saddam</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</footer>
	<!--================End Footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>