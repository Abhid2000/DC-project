<?php 
require('connection.php');
require('functions.php');

if (isset($_POST['login'])) {
    $email = get_safe_value($con,$_POST['email']);
    $password = get_safe_value($con,$_POST['password']);
    $res = mysqli_query($con,"select * from tbl_user where email='$email' and password='$password'");
    $check_user=mysqli_num_rows($res);

    if ($check_user>0) {
        $row=mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_NAME']=$row['name'];
    }else{
        
        $msg1= "User Not Present";
    }

}

if (isset($_POST['signup'])){
    $name = get_safe_value($con,$_POST['name']);
    $email = get_safe_value($con,$_POST['email']);
    $number = get_safe_value($con,$_POST['number']);
    $password = get_safe_value($con,$_POST['password']);

    $check_user=mysqli_num_rows(mysqli_query($con,"select * from tbl_user where email='$email'"));

    if ($check_user>0) {
        $msg= "User already Exist";
    }else{
        $added_on=date('y-m-d h:i:s');
        mysqli_query($con,"insert into tbl_user(name,email,number,password) values('$name','$email','$number','$password')");

        echo '<script>alert("Successfully register please log in")</script>';
        // $msg= "Successfully Register Please Login";
    }

}

?>
<!doctype html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap Min CSS --> 
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Owl Theme Default Min CSS --> 
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		<!-- Owl Carousel Min CSS --> 
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<!-- Remixicon CSS --> 
		<link rel="stylesheet" href="assets/css/remixicon.css">
		<!-- Flaticon CSS --> 
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="assets/css/meanmenu.min.css">
		<!-- Animate Min CSS --> 
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- Magnific Popup Min CSS --> 
		<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
		<!-- Odometer Min CSS --> 
		<link rel="stylesheet" href="assets/css/odometer.min.css">
		<!-- Date Picker Min CSS --> 
		<link rel="stylesheet" href="assets/css/date-picker.min.css">
		<!-- Style CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="assets/css/responsive.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="assets/images/favicon.png">
		<!-- Title -->
		<title>District Collector</title>
    </head>

    <body>
		<!-- Start Preloader Area -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="pl-spark-1 pl-spark-2"></div>
			</div>
		</div>
		<!-- End Preloader Area -->
		
		<!-- Start Header Area -->
		<header class="header-area">
			<!-- Start Top Header -->
			<div class="top-header">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6">
							<ul class="header-left-content">
								<li>
									<a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#5e373038311e2937353730703d3133">
										<i class="ri-mail-open-fill"></i>
										<span class="__cf_email__" >info.districtcollector.com</span>
									</a>
								</li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="header-right-content">
								
										<?php
											if($_SESSION['USER_LOGIN']){?>
											<ul class="my-account">
											<li>
												<a href="#" class="dropdown-control">
													<i class="ri-user-line"></i> 
													My account
													<i class="ri-arrow-down-s-line"></i>
												</a>
											<ul class="my-account-link">
												
												<li>
													<a href="documents.php">
														My Documents
													</a>
												</li>
												<li>
													<a href="mycomplaints.php">
														My Complaints
													</a>
												</li>
												<li>
													<a href="changepassword.php">
														Change Password
													</a>
												</li>
												<li>
													<a href="logout.php">
														Logout
													</a>
												</li>
											</ul>
											</li>
										</ul>
										<?php }else{
										?>
										<ul class="my-account">
									<li>
										<a href="#" class="dropdown-control">
											<i class="ri-user-line"></i> 
											Sign In / Sign Up
											<i class="ri-arrow-down-s-line"></i>
										</a>
										<ul class="my-account-link">
											<li>
												<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
													Log In
												</a>
											</li>
											<li>
												<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">
													Register
												</a>
											</li>
										</ul>
										</li>
										</ul>
										<?php }
										?>
									
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Start Top Header -->
			
			<!-- Start Navbar Area -->
			<div class="navbar-area">
                <div class="mobile-responsive-nav">
                    <div class="container">
                        <div class="mobile-responsive-menu">
                            <div class="logo">
                                <a href="index.html">
									<img src="assets/images/logo.png" alt="logo">
								</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="desktop-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo.png" alt="logo">
                            </a>

                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav">
									<li class="nav-item">
										<a href="index.php" class="nav-link active">
											Home 
										</a>
									</li>

									<li class="nav-item">
										<a href="about.php" class="nav-link">About</a>
									</li>

									<li class="nav-item">
										<a href="projects.php" class="nav-link ">
											Tenders 
										</a>
									</li>

									<li class="nav-item">
										<a href="#" class="nav-link">
											Services 
											<i class="ri-arrow-down-s-line"></i>
										</a>

										<ul class="dropdown-menu">
											<li class="nav-item">
												<a href="income.php" class="nav-link">Income Certificate</a>
											</li>
											<li class="nav-item">
												<a href="cast.php" class="nav-link">Cast Certificate</a>
											</li>
											<li class="nav-item">
												<a href="birth.php" class="nav-link">Birth Certificate</a>
											</li>
											<li class="nav-item">
												<a href="death.php" class="nav-link">Death Certificate</a>
											</li>
											<li class="nav-item">
												<a href="complaint.php" class="nav-link">Complaint Registration</a>
											</li>
										</ul>
									</li>

                                    <li class="nav-item">
										<a href="contact.php" class="nav-link">Contact</a>
									</li>
                                </ul>

                                <div class="others-options">
									<ul>
										<li>
											<a href="tel:+1-(514)-312-5678" class="call">
												<i class="ri-phone-fill"></i>
												+91 8888905870
											</a>
										</li>
									</ul>
                                </div>
                            </div>
                        </nav>
                    </div>
				</div>
				
				<div class="others-option-for-responsive">
					<div class="container">
						<div class="dot-menu">
							<div class="inner">
								<div class="circle circle-one"></div>
								<div class="circle circle-two"></div>
								<div class="circle circle-three"></div>
							</div>
						</div>
						
						<div class="container">
							<div class="option-inner">
								<div class="others-option justify-content-center d-flex align-items-center">
									<ul>
										<li>
											<a href="tel:+1-(514)-312-5678" class="call">
												<i class="ri-phone-fill"></i>
												+91 8888905870
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- End Navbar Area -->
		</header>
		<!-- End Header Area -->

		<!-- Start Log In Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ri-close-circle-line"></i>
					</button>

					<div class="modal-body">
						<div class="container">
							<div class="account-title">
								<h2>Log in to your account</h2>
							</div>
							
							<div class="contact-form-action">
								<form method="post">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="email" name="email" required>
											</div>
										</div>

										<div class="col-12">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="password" name="password" required>
											</div>
										</div>

										<div class="col-12">
											<div class="login-action">
												<span class="forgot-login">
													<a href="recover-password.html">Forgot your password?</a>
												</span>
											</div>
										</div>

										<div class="col-12">
											<button class="default-btn" type="submit" name="login">
												Log In
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Log In Modal -->

		<!-- Start Register Modal -->
		<div class="modal fade" id="staticBackdrop-2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ri-close-circle-line"></i>
					</button>

					<div class="modal-body">
						<div class="container">
							<div class="account-title">
								<h2>Register your account</h2>
							</div>

							<div class="contact-form-action">
								<form method="post">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Full name</label>
												<input class="form-control" type="text" name="name" required>
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Email address</label>
												<input class="form-control" type="email" name="email" required>
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Mobile no.</label>
												<input class="form-control" type="text" name="number" required>
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="password" name="password" required>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="row align-items-center">
												<div class="col-lg-6">
													<button class="default-btn register" type="submit" name="signup">
														Register Now
													</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Register Modal -->

		<!-- Start Banner Area -->
		<section class="banner-area banner-area-style-three">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="banner-content">
									<span class="top-title">Discover the city</span>
									<h1>The municipality is constantly looking to start new initiatives</h1>
									<div class="slider-btn">
										<a href="about.php" class="default-btn">
											Learn more
										</a>
									</div>
								</div>
							</div>

							<div class="col-lg-6 pr-0">
								<div class="banner-img">
									<img src="assets/images/slider-1.jpeg" alt="Image">

									<div class="shape banner-shape-3">
										<img src="assets/images/banner/banner-shape-3.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Area -->

		<!-- Start Services Area -->
		<section class="services-area services-area-style-three bg-color pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center">
					<h2 class="text-center mb-5">Our Services</h2>
					<div class="col-lg-4 col-md-6">
						<div class="single-services-box">
							<span class="fas fa-money-bill-alt"></span>

							<h3>
								<a href="income.php">
									Income Certificate
								</a>
							</h3>

							<p class="pb-3"></p>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-services-box">
							<span class="fas fa-torah"></span>

							<h3>
								<a href="cast.php">
									Cast Certificate
								</a>
							</h3>

							<p class="pb-5"></p>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-services-box">
							<span class="fas fa-baby-carriage"></span>

							<h3>
								<a href="birth.php">
									Birth Certificate
								</a>
							</h3>

							<p class="pb-5"></p>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-services-box">
							<span class="fas fa-book-dead"></span>

							<h3>
								<a href="death.php">
								Death Certificate
								</a>
							</h3>

							<p class="pb-5"></p>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-services-box">
							<span class="fas fa-question"></span>

							<h3>
								<a href="complaint.php">
									Complaint Registration
								</a>
							</h3>

							<p class="pb-3"></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Services Area -->

		<!-- Stat Who We Are Area -->
		<section class="who-we-are-area pt-100 pb-70">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<div class="who-we-are-img who-we-are-img-3 pr-15 text-center">
									<img src="assets/images/collector1.jpg" alt="Image">
									<h4>Dr. Nitin Raut</h4>
									<h5>Hon’ble Guardian</h5>
									<h5>Minister, District Nagpur</h5>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="who-we-are-img who-we-are-img-3 pr-15 text-center">
									<img src="assets/images/collector2.jpeg" alt="Image">
									<h4 style="margin-top:10px">Smt. R. Vimala. IAS</h4>
									<h5>Hon’ble Collector & District Magistrate </h5>
									<h5>Nagpur</h5>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="who-we-are-content who-we-are-content-two pl-15">
							<span class="top-title">Who we are</span>
							<h2>About District</h2>

							<p>Nagpur city is the winter capital of the state of Maharashtra, with a population of 46,53,570. It has also recently been ranked as the cleanest city and the second greenest city of India.In addition to being the seat of annual winter session of Maharashtra state assembly “Vidhan Sabha”,  Nagpur is also a major commercial and political center of the Vidarbha region of Maharashtra. ”</p>
							<p>Nagpur is also famous throughout the country as “Orange City” for being a major trade center of oranges that are cultivated in the region. Nagpur city was established by prince of Gond tribe “Bhakt Buland” in first half of 18th century. Nagpur lies precisely at the center of the country with the “Zero Mile Marker” indicating the geographical center of India. It has 14 Talukas and 12 Assembly Segment Constituencies.</p>

							<a href="about.php" class="default-btn">
								Learn more
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Who We Are Area -->

		<!-- Start Counter Are Area -->
		<section class="counter-area">
			<div class="container">
				<div class="counter-bg">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="single-counter">
								<div class="count-title">
									<h2>
										<span class="odometer" data-count="46,53,570">00</span> 
									</h2>
									<h4>People in the city</h4>
								</div>
							</div>
						</div>
		
						<div class="col-lg-3 col-sm-6">
							<div class="single-counter">
								<div class="count-title">
									<h2>
										<span class="odometer" data-count="22">00</span> 
										<span class="target">K</span>
									</h2>
									<h4>Square of city</h4>
								</div>
							</div>
						</div>
		
						<div class="col-lg-3 col-sm-6">
							<div class="single-counter">
								<div class="count-title">
									<h2>
										<span class="odometer" data-count="400">00</span> 
										<span class="target">+</span>
									</h2>
									<h4>Year of foundation</h4>
								</div>
							</div>
						</div>
		
						<div class="col-lg-3 col-sm-6">
							<div class="single-counter">
								<div class="count-title">
									<h2>
										<span class="odometer" data-count="875">00</span> 
									</h2>
									<h4>Successful programs</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter Area -->

		<!-- Start Project Area -->
		<section class="project-area bg-color pt-100 pb-70">
			<div class="container-fluid p-0">
				<div class="section-title">
					<h2>Meet city projects</h2>
				</div>

				<div class="project-slider owl-carousel owl-theme">
				<?php
					$sql = "SELECT * FROM tbl_tender order by id desc";
					$res = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($res)) {?>
					<div class="single-project">
						<img src="tenders/<?php echo $row['images']?>" alt="Image">

						<div class="project-content">
							<a href="project-details.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</section>
		<!-- End Project Area -->

		<!-- Start Events Area -->
		<section class="events-area pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<h2>Upcoming events</h2>
				</div>

				<div class="row justify-content-center">
					<?php
					$sql = "SELECT * FROM tbl_events order by id desc";
					$res = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($res)) {?>
					<div class="col-lg-4 col-md-6">
						<div class="single-event-box ">
							<a href="event-details.html">
								<img src="events/<?php echo $row['images']?>" alt="Images">
							</a>

							<div class="event-content">
								<ul>
									<li>
									<?php echo $row['puser']?>
										<span><?php echo $row['edate']?> </span>
									</li>
								</ul>
								<h3>
									<a href="event-details.php?id=<?php echo $row['id']?>">
									<?php echo $row['title']?>
									</a>
								</h3>
								<p><i class="ri-map-pin-2-line"></i> <?php echo $row['address']?></p>
								<a href="event-details.php?id=<?php echo $row['id']?>" class="read-more">
									Read more
									<i class="ri-arrow-right-s-line"></i>
								</a>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</section>
		<!-- End Events Area -->

		<!-- Start City Councilor Area -->
		<section class="city-councillor-area bg-color pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<h2>City councilor</h2>
				</div>

				<div class="row justify-content-center">
				<?php
					$sql = "SELECT * FROM tbl_councilor order by id desc";
					$res = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($res)) {?>
					<div class="col-lg-4 col-md-6">
						<div class="single-councillor">
							<img src="employee/<?php echo $row['images']?>" alt="Image">

							<div class="councillor-content">
								<h3><?php echo $row['name']?></h3>
								<span><?php echo $row['designation']?></span>

								<ul>
									<li>
										<a href="<?php echo $row['fblink']?>" target="_blank">
											<i class="ri-facebook-fill"></i>
										</a>
									</li>
									<li>
										<a href="<?php echo $row['instalink']?>" target="_blank">
											<i class="ri-instagram-line"></i>
										</a>
									</li>
									<li>
										<a href="<?php echo $row['twitterlink']?>" target="_blank">
											<i class="ri-twitter-fill"></i>
										</a>
									</li>
									<li>
										<a href="<?php echo $row['linkedin']?>" target="_blank">
											<i class="ri-linkedin-box-fill"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</section>
		<!-- End City Councilor Area -->

		<!-- Start Blog Area -->
		<section class="blog-area blog-area-three pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<h2>Latest news & updates</h2>
				</div>

				<div class="row justify-content-center">
					<?php
					$sql = "SELECT * FROM tbl_news order by id desc";
					$res = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($res)) {?>
					<div class="col-lg-4 col-md-6">
						<div class="single-blog-box">
							<a href="news-details.php?id=<?php echo $row['id']?>">
								<img src="news/<?php echo $row['images']?>" alt="Images">
							</a>

							<div class="blog-content">
								<ul>
									<li>
										<a href="news-details.php?id=<?php echo $row['id']?>">
											<i class="ri-user-3-fill"></i>
											<?php echo $row['puser']?>
										</a>
									</li>
									<li>
										<i class="ri-calendar-line"></i>
										<?php echo $row['ndate']?>
									</li>
								</ul>
								<h3>
									<a href="news-details.php?id=<?php echo $row['id']?>">
									<?php echo $row['title']?>
									</a>
								</h3>
								<p><?php echo $row['shortdesc']?></p>
								<a href="news-details.php?id=<?php echo $row['id']?>" class="read-more">
									Read more
									<i class="ri-arrow-right-s-line"></i>
								</a>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>

			<div class="shape blog-shape-2">
				<img src="assets/images/blog/blog-shape-2.png" alt="Image">
			</div>
		</section>
		<!-- End Blog Area -->

		<!-- Start Footer Area -->
		<footer class="footer-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget single-bg">
							<a href="index.php" class="logo">
								<img src="assets/images/white-logo.png" alt="Image">
							</a>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p> 

							<ul class="social-icon">
								<li>
									<a href="https://www.facebook.com/" target="_blank">
										<i class="ri-facebook-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/" target="_blank">
										<i class="ri-instagram-line"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/" target="_blank">
										<i class="ri-twitter-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/" target="_blank">
										<i class="ri-linkedin-box-fill"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget">
							<h3>Get in touch</h3>

							<ul class="address">
								<li>
									<i class="ri-map-pin-fill"></i>
									2976 Sunrise road las vegas, <br> NV 89108
								</li>
								<li>
									<i class="ri-mail-open-fill"></i>
									<a href="mailto:info.districtcollector.com"><span class="__cf_email__" >info.districtcollector.com</span></a>
								</li>
								<li class="location">
									<i class="ri-phone-fill"></i>
									<a href="tel:+1-(514)-312-5678">+91 8888905870</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget">
							<h3>Quick link</h3>

							<ul class="import-link">
								<li>
									<a href="#">Government service</a>
								</li>
								<li>
									<a href="#">Terms & conditions</a>
								</li>
								<li>
									<a href="#">Privacy policy</a>
								</li>
								<li>
									<a href="#">Accessibility</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="shape footer-shape-1">
				<img src="assets/images/footer-shape-1.png" alt="Image">
			</div>

			<div class="shape footer-shape-2">
				<img src="assets/images/footer-shape-2.png" alt="Image">
			</div>
		</footer>
		<!-- End Footer Area -->

		<!-- Start Copy Right Area -->
		<div class="copy-right-area">
			<div class="container">
				<p>
					Copyright <i class="ri-copyright-line"></i>2022 District Collector. Designed By 
					<a href="#">Unitech Computers</a>
				</p>
			</div>
		</div>
		<!-- End Copy Right Area -->
		
		<!-- Start Go Top Area -->
		<div class="go-top">
			<i class="ri-arrow-up-s-fill"></i>
			<i class="ri-arrow-up-s-fill"></i>
		</div>
		<!-- End Go Top Area -->
		

        <!-- Jquery Min JS -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script> 
        <!-- Bootstrap Bundle Min JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Meanmenu Min JS -->
		<script src="assets/js/meanmenu.min.js"></script>
		<!-- Owl Carousel Min JS -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- Owl Carousel Thumbs Min JS -->
		<script src="assets/js/carousel-thumbs.min.js"></script>
		<!-- Wow Min JS -->
        <script src="assets/js/wow.min.js"></script>
		<!-- Magnific Popup Min JS -->
        <script src="assets/js/magnific-popup.min.js"></script>
		<!-- Appear Min JS -->
        <script src="assets/js/appear.min.js"></script>
		<!-- Odometer Min JS -->
        <script src="assets/js/odometer.min.js"></script>
		<!-- Mixitup Min JS -->
        <script src="assets/js/mixitup.min.js"></script>
		<!-- Bootstrap Datepicker Min JS -->
        <script src="assets/js/bootstrap-datepicker.min.js"></script>
		<!-- Form Validator Min JS -->
		<script src="assets/js/form-validator.min.js"></script>
		<!-- Contact JS -->
		<script src="assets/js/contact-form-script.js"></script>
		<!-- Ajaxchimp Min JS -->
		<script src="assets/js/ajaxchimp.min.js"></script>
        <!-- Custom JS -->
		<script src="assets/js/custom.js"></script>
    </body>

<!-- Mirrored from templates.envytheme.com/wikin/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 12:17:38 GMT -->
</html>