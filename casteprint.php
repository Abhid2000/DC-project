<?php 
require('connection.php');
require('functions.php');

$caste_id = $_GET['id'];

$view=mysqli_query($con, "select * from tbl_caste where id='$caste_id' ");

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
		<title>Caste Certificate</title>
    </head>

    <body>
    <?php $row = mysqli_fetch_array($view);?>

        <div class="container">
            <div class="income-header">
                <h6 class="text-center mt-3">Form of Certificate to be issued to Socially and Educationally Backward Class Person belonging the State of Maharashtra</h6>
                <p><strong>Documents Verified</strong></p>
                <p>1. Copy of School Leaving Certificate</p>
                <p>2. Caste Certificate issued by the Local Competent Authority</p>
                <p>3. Income Certificate issued by the Tahasildar</p>
                <p>4. Photo ID of Applicant</p>
                <p>5. Copy of Ration Card & Electoral Photo ID</p>

                <h5 class="text-center">CASTE CERTIFICATE (PART-A)</h5>
                 
                <p>This is to certify that <strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong> Son of <strong><?php echo $row['fsalutation']?> <?php echo $row['fname']?></strong>, taluka <strong><?php echo $row['taluka']?></strong>, district <strong><?php echo $row['district']?></strong>. of the State of Maharashtra belongs to the <strong><?php echo $row['caste']?></strong> Caste under the Government Resolution Social Justice & Special Assistance Department No. <strong>CBC-10/2013/C.R.35/MVK</strong> dated <strong>15/07/2014</strong> as amended from time to time as a Socially and Educationally Backward Class</p>
				
                <p><strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong> and/or his family ordinarily reside(s) in village <strong><?php echo $row['village']?></strong> taluka <strong><?php echo $row['taluka']?></strong>, district <strong><?php echo $row['district']?></strong> of the State of Maharashtra</p>
                
                <h5 class="text-center">NON-CREAMY LAYER CERTIFICATE (PART-B)</h5>
                <p>This is to certify that <strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong> Does not belong to the persons/sections (Creamy layer) mentioned in the Government of Maharashtra Gazette Extra Ordinary Part VIII dated 30th November 2018 Maharashtra State Reservation of seats for admission in educational institutions in the State and for appointments in the public services and posts under the State) for Socially and Educationally Backward Classes (SEBC) Act 2018 and instructions and guidelines laid down in the Government Resolution Social Justice Cultural Affairs Sports and Special Assistance Department No CBC-10/2001/Pra kra 120/Mavak 5. dated 1st November 2001 CBC.1094/Pra kra B6/Mavak.5 dated 16th June, 1994. CBC. 1094/Pra,kra 86/Mavak.5.dated 5th June, 1997 and Government Resolution No. CBC10/2001/Pra kra 111/Mavak-5, dated 29th May, 2003 and Government Resolution No. VJNT2014/C.R.11B/VUNT-1, dated 31st July 2014</p>
               
				<p>This Certificate is valid for the period upto <?php 
					$startDate = $row['added_on'];
					$newEndingDate = date("d M Y", strtotime(date("d M Y", strtotime($startDate)) . " + 1 year"));
					
					echo $newEndingDate;
				?> from the date of issue</p>
				
				<div class="row">
					<div class="col-4">
						<p>Place : <strong><?php echo $row['village']?></strong></p>
						<p>Date : <strong><?php echo $row['added_on']?></strong></p>
					</div>
					<div class="col-5">
                        <p class="text-center mt-5">(With the seal of office)</p>
                    </div>
					<div class="col-3">
						<p class="text-center">Sub Divisional Officer</p>
						<p class="text-center"><strong><?php echo $row['village']?></strong></p>
					</div>
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