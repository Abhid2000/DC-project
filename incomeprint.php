<?php 
require('connection.php');
require('functions.php');

$income_id = $_GET['id'];

$view=mysqli_query($con, "select * from tbl_documents where id='$income_id' ");

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
		<title>Income Certificate</title>
    </head>

    <body>
    <?php $row = mysqli_fetch_array($view);?>

        <div class="container">
            <div class="income-header">
                <div class="row">
                    <div class="col-lg-9">
					<div class="income-date">
                            <p>Number : <strong><?php echo $row['id']?></strong></p>
                            <p>District : <strong><?php echo $row['district']?></strong></p>
                        </div>
					</div>
                </div>
                <h4 class="text-center mt-3">1 Year Income Certificate</h4>
                <p>It is attested that, <strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong> will remain. The applicants are from village <strong><?php echo $row['village']?></strong>, Tahasil <strong><?php echo $row['taluka']?></strong>, District <strong><?php echo $row['district']?></strong>. The following is the 1 year income received by the applicant and all his family members by all means and means on the basis of their Talathi report.</p>
				<table class="table table-responsive">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Year</th>
                        <th scope="col">Yearly Income</th>
                        <th scope="col">In Words</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><?php echo $row['incomeyear']?></td>
                        <td><?php echo $row['income']?></td>
                        <td><?php echo $row['income_words']?></td>
                    </tr>
                </tbody>
                </table>
				<p>The proof of this is given by <strong><?php echo $row['salutation']?> <?php echo $row['name']?></strong> is being given for this <strong><?php echo $row['reason']?></strong> work only and also on the basis of the documents submitted by him to the office.</p>
				<p>This certificate will be valid till <?php 
					$startDate = $row['added_on'];
					$newEndingDate = date("d M Y", strtotime(date("d M Y", strtotime($startDate)) . " + 1 year"));
					
					echo $newEndingDate;
				?>.</p>
				<p>Details of documents / evidence submitted</p>
				<p><strong>1. Income certificate issued by Talathi</strong></p>
				<div class="row">
					<div class="col-4">
						<p>Place : <strong><?php echo $row['village']?></strong></p>
						<p>Date : <strong><?php echo $row['added_on']?></strong></p>
					</div>
					<div class="col-5"></div>
					<div class="col-3">
						<p class="text-center">Tehsildar</p>
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