<?php 
require('connection.php');
require('functions.php');

if (isset($_SESSION['USER_LOGIN'])) {
        
        
}else{
    header("location:income.php");
    die();
}

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

if (isset($_POST['submit'])){
	$user_id = $_SESSION['USER_ID'];
    $type = "Birth Certificate";
    $salutation = get_safe_value($con,$_POST['salutation']);
    $name = get_safe_value($con,$_POST['name']);
    $fsalutation = get_safe_value($con,$_POST['fsalutation']);
    $fname = get_safe_value($con,$_POST['fname']);
    $dob = get_safe_value($con,$_POST['dob']);
    $birthtime = get_safe_value($con,$_POST['birthtime']);
    $birthplace = get_safe_value($con,$_POST['birthplace']);
    $gender = get_safe_value($con,$_POST['gender']);
    $address = get_safe_value($con,$_POST['address']);
    $street = get_safe_value($con,$_POST['street']);
    $section = get_safe_value($con,$_POST['section']);
    $building = get_safe_value($con,$_POST['building']);
    $landmark = get_safe_value($con,$_POST['landmark']);
    $district = get_safe_value($con,$_POST['district']);
    $taluka = get_safe_value($con,$_POST['taluka']);
    $village = get_safe_value($con,$_POST['village']);
    $pincode = get_safe_value($con,$_POST['pincode']);
    $phoneno = get_safe_value($con,$_POST['phoneno']);
    $panno = get_safe_value($con,$_POST['panno']);
    $aadhaar = get_safe_value($con,$_POST['aadhaar']);
    $agreement = get_safe_value($con,$_POST['agreement']);
    $status = 'Pending';
	$added_on=date('y-m-d h:i:s');

	$paadhaarpic = $_FILES['paadhaarpic']['name'];
	$pbirth = $_FILES['pbirth']['name'];
	$birthletter = $_FILES['birthletter']['name'];
	$marriage = $_FILES['marriage']['name'];

	$dir1 = "birth/".$paadhaarpic;
	$dir2 = "birth/".$pbirth;
	$dir3 = "birth/".$birthletter;
	$dir4 = "birth/".$marriage;

	move_uploaded_file($_FILES['paadhaarpic']['tmp_name'], $dir1);
	move_uploaded_file($_FILES['pbirth']['tmp_name'], $dir2);
	move_uploaded_file($_FILES['birthletter']['tmp_name'], $dir3);
	move_uploaded_file($_FILES['marriage']['tmp_name'], $dir4);

       
        $sql = mysqli_query($con,"insert into tbl_birth(user_id,type,salutation,name,fsalutation,fname,dob,birthtime,birthplace,gender,address,street,section,building,landmark,district,taluka,village,pincode,phoneno,panno,aadhaar,paadhaarpic,pbirth,birthletter,marriage,agreement,status,added_on) values('$user_id','$type','$salutation','$name','$fsalutation','$fname','$dob','$birthtime','$birthplace','$gender','$address','$street','$section','$building','$landmark','$district','$taluka','$village','$pincode','$phoneno','$panno','$aadhaar','$paadhaarpic','$pbirth','$birthletter','$marriage','$agreement','$status','$added_on')");
	if ($sql==TRUE) {
		$msg5 = "You have successfully applied for Birth Certificate.<br>You will get the Birth Certificate within 7 day's";
	}
        
}

?>

<!doctype html>
<html lang="zxx">
    
<!-- Mirrored from templates.envytheme.com/wikin/default/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 12:21:32 GMT -->
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
		<title>Birth Certificate</title>
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
                                <a href="index.php">
									<img src="assets/images/logo.png" alt="logo">
								</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="desktop-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/images/logo.png" alt="logo">
                            </a>

                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav">
									<li class="nav-item">
										<a href="index.php" class="nav-link">
											Home 
										</a>
									</li>

									<li class="nav-item">
										<a href="about.php" class="nav-link">About</a>
									</li>

									<li class="nav-item">
										<a href="projects.php" class="nav-link">
											Tenders 
										</a>
									</li>

									<li class="nav-item">
										<a href="#" class="nav-link active">
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
												<input class="form-control" type="email" name="email">
											</div>
										</div>

										<div class="col-12">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="password" name="password">
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
                                        <div class="col-12">
											<div class="login-action">
												<span class="forgot-login">
													<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">Don't have an account? Sign Up</a>
												</span>
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
												<input class="form-control" type="text" name="name">
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Email address</label>
												<input class="form-control" type="email" name="email">
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Mobile no.</label>
												<input class="form-control" type="text" name="number">
											</div>
										</div>
			
										<div class="col-12">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="text" name="password">
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

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-20">
			<div class="container">
				<div class="page-title-content">
					<h2>Birth Certificate</h2>

					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li>

						<li class="active">Birth Certificate</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Project Area -->
		<section class="certificate">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2 col-md-6"></div>
                    <div class="col-lg-8 col-md-6">
                        <form method="post" enctype="multipart/form-data">
						<p style="color:green;font-weight:bold"><?php echo $msg5;?></p>
                        <div class="strip">
                            <h5>1. Applicant Details</h5>
                        </div>
						<div class="row">
							<div class="col-3">
								<div class="form-group mt-3">
									<label>Salutation*</label>
                                    <select class="form-control" name="salutation" required>
                                        <option value="0">Select Salutation</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select>
								</div>
							</div>
			
						    <div class="col-9">
								<div class="form-group mt-3">
								    <label>Full Name*</label>
									<input class="form-control" type="text" name="name" required>
								</div>
							</div>
                        </div>
                                            
                        <div class="row">
							<div class="col-3">
								<div class="form-group mt-3">
                                    <label>Father's Salutation*</label>
                                    <select class="form-control" name="fsalutation" required>
                                        <option value="0">Select Salutation</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select>
								</div>
							</div>
			
							<div class="col-9">
								<div class="form-group mt-3">
									<label>Father's Name*</label>
									<input class="form-control" type="text" name="fname" required>
								</div>
							</div>
					    </div>
                        <div class="row">
							<div class="col-3">
								<div class="form-group mt-3">
                                    <label>Date of Birth*</label>
                                    <input class="form-control" type="date" name="dob" required>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group mt-3">
                                    <label>Birth Time*</label>
                                    <input class="form-control" type="text" name="birthtime" required>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group mt-3">
                                    <label>Birth Place*</label>
                                    <input class="form-control" type="text" name="birthplace" required>
								</div>
							</div>
                            <div class="col-3">
								<div class="form-group mt-3">
									<label>Gender*</label>
									<select class="form-control" name="gender" required>
                                        <option value="0">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
								</div>
							</div>
					    </div>
                        <div class="strip">
                            <h5>2. Applicant's Address [As per document]</h5>
                        </div>
                        <div class="row">
							<div class="col-6">
								<div class="form-group mt-3">
									<label>Address*</label>
                                    <input class="form-control" type="text" name="address" required>
								</div>
							</div>
			
						    <div class="col-6">
								<div class="form-group mt-3">
								    <label>Street*</label>
									<input class="form-control" type="text" name="street" required>
								</div>
							</div>
                        </div>
                                            
                        <div class="row">
							<div class="col-6">
								<div class="form-group mt-3">
                                    <label>Section*</label>
                                    <input class="form-control" type="text" name="section" required>
								</div>
							</div>
			
							<div class="col-6">
								<div class="form-group mt-3">
									<label>Building*</label>
									<input class="form-control" type="text" name="building" required>
								</div>
							</div>
					    </div>
                        <div class="row">
							<div class="col-6">
								<div class="form-group mt-3">
                                    <label>Landmark*</label>
                                    <input class="form-control" type="text" name="landmark" required>
								</div>
							</div>
			
							<div class="col-3">
								<div class="form-group mt-3">
									<label>District*</label>
									<input class="form-control" type="text" name="district" required>
								</div>
							</div>

                            <div class="col-3">
								<div class="form-group mt-3">
									<label>Taluka*</label>
									<input class="form-control" type="text" name="taluka" required>
								</div>
							</div>
					    </div>
                        <div class="row">
							<div class="col-3">
								<div class="form-group mt-3">
                                    <label>Village*</label>
                                    <input class="form-control" type="text" name="village" required>
								</div>
							</div>
			
							<div class="col-3">
								<div class="form-group mt-3">
									<label>Pincode*</label>
									<input class="form-control" type="text" name="pincode" required>
								</div>
							</div>
					    </div>
                        <div class="strip">
                            <h5>3. Other Details</h5>
                        </div>
                        <div class="row">
							<div class="col-4">
								<div class="form-group mt-3">
                                    <label>Phone No.*</label>
                                    <input class="form-control" type="text" name="phoneno" required>
								</div>
							</div>
			
							<div class="col-4">
								<div class="form-group mt-3">
									<label>PAN No.(If Available)</label>
									<input class="form-control" type="text" name="panno">
								</div>
							</div>

                            <div class="col-4">
								<div class="form-group mt-3">
									<label>Aadhaar No.(If Available)</label>
									<input class="form-control" type="text" name="aadhaar">
								</div>
							</div>
					    </div>
                        <div class="strip">
                            <h5>4. Upload Documents</h5>
                        </div>
                        <div class="row">
							<div class="col-4">
								<div class="form-group mt-3">
                                    <label>Proof of identity of the parent for verification*</label>
                                    <input class="form-control" type="file" name="paadhaarpic" required>
								</div>
							</div>
                            <div class="col-4">
								<div class="form-group mt-3">
                                    <label>Parent's birth certificate or SSC mark sheet*</label>
                                    <input class="form-control" type="file" name="pbirth" required>
								</div>
							</div>
                            <div class="col-4">
								<div class="form-group mt-3">
                                    <label>Letter from the hospital - Proof of birth*</label>
                                    <input class="form-control" type="file" name="birthletter" required>
								</div>
							</div>
					    </div>
                        <div class="row">
                            <div class="col-4">
								<div class="form-group mt-3">
                                    <label>Parental marriage certificate*</label>
                                    <input class="form-control" type="file" name="marriage" required>
								</div>
							</div>
                            
					    </div>
					</div>
                    <div class="col-lg-2 col-md-6"></div>
                    <div class="row">
                    <div class="col-lg-2 col-md-6"></div>
                    <div class="col-lg-8 col-md-6">
                        <div class="strip">
                            <h5>5. Agreement</h5>
                        </div>
                        <div class="consent text-center">
                            <h6>I declare that above mentioned information submitted by me is true and correct to my knowledge and belief. I hereby agree to liable for legal consequences for any information found incorrect under indian penal section 1960 and 200</h6>
                            <span class="log-rem">
                                <input id="remember" type="checkbox" name="agreement" value="agree" required>
                                <label for="remember">I Agree*</label>
                            </span>
                            <div class="certificate-button">     
                                <button class="default-btn" name="submit">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6"></div>
                    
				</div>
                
			</div>
		</section>
		<!-- End Project Area -->

		<!-- Start Footer Area -->
		<footer class="footer-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget single-bg">
							<a href="index.html" class="logo">
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

<!-- Mirrored from templates.envytheme.com/wikin/default/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 12:21:32 GMT -->
</html>