<?php 
require('connection.php');
require('functions.php');

$caste_id = $_GET['id'];

$view=mysqli_query($con, "select * from tbl_birth where id='$caste_id' ");

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
		<link rel="stylesheet" href="print.css" media="print">
		<!-- Title -->
		<title>Birth Certificate</title>
    </head>

    <body>
    <?php $row = mysqli_fetch_array($view);?>

        <div class="container">
            <div class="income-header">
                <div class="row">
                    <div class="col-4">
                        <h6>NO : <?php echo $row['id']?></h6>
                    </div>
                    <div class="col-4">
                        <h5 class="text-center">GOVERNMENT OF MAHARASHTRA</h5>
                        <h5 class="text-center">DEPARTMENT OF HEALTH</h5><br>
                        <h5 class="text-center">RURAL HOSPITAL <?php echo $row['village']?></h5><br>
                        <h4 class="text-center">BIRTH CERTIFICATE</h4><br>
                    </div>
                    <div class="col-4">
                        <h6 class="text-center">FORM : 5</h6>
                    </div>
                </div>
                 
                <p>UNDER SECTION 107 OF THE REGISTRATION OF BIRTHS & DEATHS ACT, 19 AND RULE 8/13 OF THE MAHARASHTRA REGISTRATION OF BIRTHS & DEATHS RULES 2000</p>
				
                <p>THIS IS TO CERTY THAT THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE ORIGINAL RECORD OF BIRTH WHICH IS THE REGISTER POR RURAL HOSPTAL <?php echo $row['taluka']?> OF <?php echo $row['village']?> OF DISTRICT <?php echo $row['district']?> OF STATE UNION TERRITORY MAHARASHTRA, INDIA</p>
                <div class="row">
                    <div class="col-6">
                        <p>Name : <strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong></p>
                    </div>
                    <div class="col-6">
                        <p>Gender : <strong><?php echo $row['gender']?></strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p>Date of Birth : <strong><?php echo $row['dob']?></strong></p>
                    </div>
                    <div class="col-6">
                        <p>Place of Birth : <strong><?php echo $row['birthplace']?></strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p>PERMANENT ADDRESS OF PARENTS : <strong><?php echo $row['building']?>, <?php echo $row['address']?>, <?php echo $row['street']?>, <?php echo $row['section']?>, <?php echo $row['landmark']?>, <?php echo $row['district']?>, <?php echo $row['taluka']?>, <?php echo $row['pincode']?></strong></p>
                    </div>
                    <div class="col-6">
                        <p>Date of Registration : <strong><?php echo $row['added_on']?></strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p>Date of Issue : <strong><?php 
                        $startDate = $row['added_on'];
                        $newEndingDate = date("d M Y", strtotime(date("d M Y", strtotime($startDate)) . " + 7 days"));
                        
                        echo $newEndingDate;
                        ?></strong></p>
                    </div>
                    <div class="col-6">
                        <p>Issuing Authority <br><strong>Registrar (Birth & Death)<br>Rural Hospital <?php echo $row['village']?></strong></p>
                    </div>
                </div>
                
			<div class="print-d">
            	<button id="print-btn" onclick="window.print();" class="btn btn-primary">Print</button>
            </div>
        </div> 

		<!-- Start Footer Area -->
		

		

	
	
		

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