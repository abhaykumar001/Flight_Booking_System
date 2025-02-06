<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $site_settings->site_name;?></title>
		<meta name="description" content="<?php echo $site_settings->meta_description;?>"/>
		<meta name="keywords" content="<?php echo $site_settings->meta_name;?>"/>
		<meta name="p:domain_verify" content="c70b5df19e4eb8bc25ba436a11993e0e"/>
		<meta name="google-site-verification" content="2xig96BvhSBA9--9jJGtAJG1CUJ31Pr706HqYKmXPtk" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<!-- added this -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;1,200&family=Rubik&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

		<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

		<!-- (Optional) Latest compiled and minified JavaScript translation files -->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-ar_AR.min.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script src = "https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	</head>
<body>
	<style>
	.nav-link,.navbar-nav .nav-link.active{
		color: white
	}
	.navbar-toggler{
		border:2px solid white
	}
	.dropdown-item{
		width:90%
	}
	legend{
		float: initial;
		width: auto;
		padding: 2px;
		margin-bottom: 0rem;
		font-size: small;
		line-height: inherit;
	}
	*, ::after, ::before {
		box-sizing: content-box;
	}
	#applogo{
		width:60px !important
	}
	#contact-info-div{
		width:76% !important;
		padding:4% 12%;
		
	}
	#nav {
		display: flex;
		position: fixed !important;
		flex-direction: row;
		top: 0;
		align-items: center;
		z-index: 10000;
		/* justify-content: space-between; */
		width: 100%;
		background-color: #0068ef;
	}
	.contact-info-subcontainer a {
		font-size: large;
		font-weight:lighter !important
	}
	.contact-info-subcontainer h4 {
		font-size: x-large;
		padding: 2% 0%;
		white-space: nowrap;
		color: white;
	}
	#form-search-submit{
		margin-top: 1%;
		padding: 0.7% 1.3%;
		font-size: larger;
		border-radius: 8px;
		background-color: #042759;
		position: absolute;
		left: 44%;
		color: white;
	}
	#main-body{
		padding-top: 9% !important;
	}
	#main-branding {
		font-size: larger;
		background-color: white;
		padding: 0.2% 0.4% !important;
		border-radius: 5px;
		font-weight: 800;
		margin: 1%;
		margin-left: 12%;
	}
	.nav-links-new {
		padding: 4% 5%;
		border: 1px solid #0068ef;
		margin: 1%;
		color: #0068ef;
		border-radius: 4px;
		font-weight: bolder;
		background-color: white;
	}
	
	#footer {
		background-color: #042759;
		padding: 3% 12% 3% 12%;
		text-align: left;
		color: #eee;
	}
	#copyright{
		text-align:center
	}
	.nav-links{
		background-color:transparent !important;
		color:white;
		font-size:large
	}
	
	#contact-info-div{
		background-color:white
	}
	#socials{ 
		background-color:white !important
	}
	#socials img{
		background-color: white !important
	}
	.footer-logo{
		padding: 2%;
		background-color: white;
		width: max-content;
		border-radius: 5px;
	}
	#mobile-menu{
		display:none
	}
	.contact-info-subcontainer:nth-of-type(1){
/*		justify-content:space-between*/
	}
	.contact-info-subcontainer:nth-of-type(2){
		margin-left: 8%;
	}
	.contact-info-subcontainer:nth-of-type(3){
		margin-left: 2%;
/*		justify-content: space-between;*/
		text-align:right
	}
	.date-select-new{
		flex-grow:1
	}
	.sub-main-choices-div:nth-of-type(2){
		flex-wrap: wrap;
	}
	
	@media only screen and (min-width:250px) and (max-width:450px){
		#form-search-submit{
			left:32% !important;
			margin-top:3%;
			padding: 1.7% 1.3%;
		}
		.flex-container{
			max-width:90% !important
		}
	}
	@media only screen and (min-width:450px) and (max-width:550px){
		#form-search-submit{
			left:37% !important;
			margin-top:3%;
			padding: 1.7% 1.3%;
		}
	}
	@media only screen and (min-width:550px) and (max-width:650px){
		#form-search-submit{
			left:39% !important;
			margin-top:3%;
			padding: 1.7% 1.3%;
		}
	}
	@media only screen and (max-width:650px){
		#banner{
			margin-top:4%
		}
		#choice-search-form{
			padding-bottom: 5%;
			padding-top: 5%;
		}
		#message{
			font-size:x-large
		}
		.nav-container-new{
			margin-left: 5%
		}
		.contact-info-subcontainer{
			width:100%
		}
		.contact-info-subcontainer:nth-of-type(2){
			margin-left: 0;
		}
		.contact-info-subcontainer:nth-of-type(3) {
			margin-left: 0%;
			justify-content: space-between;
			text-align: left;
		}
		#applogo{
			width: 80px !important;
		}
		#banner img{
			width:92%
		}
		.nav-links-new{
			white-space: nowrap;
			background-color:transparent;
			border:none;
			font-size:small;
			color:white;
		}
		#mobile-menu{
			display:inline-block;
			width:60px;
			margin-left:auto;
			margin-right: 5%;
			border: 2px solid black;
			background-color:white;
			border-radius:5px;
		}
		#nav-links-container{
			display: flex;
			position: absolute;
			flex-direction: column;
			right: 5%;
			border: 2px solid #2876e5;
			margin-top: 43%;
			border-radius: 10px;
			background-color: white;
			padding-bottom: 2%;
		}
		.nav-links{
			color:#0068ef;
			margin-top:6%;
			font-size:large;
			width:80%;
		}
		#contact-info-div{
			flex-direction:column;
		}
		#main-choices-div{
			flex-direction:column
		}
		.sub-main-choices-div {
			display: flex;
			flex-direction: row;
			margin-top: 2%;
		}
		.date-select-new{
			margin-left:1%
		}
		.date-select-new:nth-of-type(2){
			margin-left:2%
		}
		.date-select-new:nth-of-type(3){
			margin-left:1%
		}
	}
	@media only screen and (max-width:350px) {
		#main-body{
			padding-top:4% !important
		}
	}
	@media only screen and (max-width:650px) and (min-width:350px) {
		#main-body{
			padding-top:4% !important
		}
	}
	@media only screen and (max-width:1080px) {
		#form-search-submit{
			left:41%
		}
		#main-branding{
			margin-left: 5%;
		}
		#main-body{
			padding-top: 12% 
		}
		#footer{
			padding: 3% 5% 3% 5%;
		}
		#contact-info-div{
			width: 90% !important;
    		padding: 4% 5%;
		}
		.flex-container{
			max-width:60%
		}
		#newsletter{
			flex-direction:column
		}
		#message-part{
			width:80%
		}
	}

	@media only screen and (min-width:1080px) {
		#nav-links-container{
			display: flex !important;
		}
	}
	.dropdown-menu .ms-3{
		margin-left: 0.5rem !important;
		padding-left: 0.5rem !important;
		padding-right: 0.5rem !important;
	}
	.dropdown-menu .ms-3:hover{
		background-color: transparent !important;
	}
</style>
<script>
	function checkMobileMenu(){
		const selection = document.getElementById("nav-links-container")
		if(selection.style.display=="none"){
			selection.style.display="flex"
		}else{
			selection.style.display="none"
		}
	}
	// document.addEventListener("DOMContentLoaded", function() { 
	// 	var currentDate = new Date();
	// 	const departureDate= document.getElementById("departure")
	// 	const returnDate= document.getElementById("return")
	// 	var maxDate = new Date(currentDate);
	// 	maxDate.setMonth(currentDate.getMonth() + 6);

	// 	// Format maxDate as yyyy-mm-dd for setting max attribute of input type date
	// 	var maxDateFormatted = maxDate.toISOString().split('T')[0];
	// 	returnDate.max=maxDateFormatted
	// 	departureDate.max=maxDateFormatted
	// 	departureDate.min=currentDate.toISOString().split('T')[0];
	// })
	// function setMinReturn(){		
	// 	const departureDate= document.getElementById("departure")
	// 	const returnValue = document.getElementById("return")
	// 	returnValue.min = departureDate.value
	// }
</script>
<div id="main-body-container">
<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand ms-3" href="<?php echo base_url();?>">
			<img id="applogo" src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" alt="Logo">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!-- <li class="nav-item">
				<a class="nav-link light active ms-3" aria-current="page" href="#">Home</a>
				</li> -->
				<li class="nav-item">
				<a class="nav-link light ms-3" href="<?php echo base_url();?>">Home</a>
				</li>
<!-- 				<li class="nav-item">
					<a class="nav-link light ms-3" href="<?php echo base_url();?>Home/corportate_booking">Corportate Booking</a>
				</li> -->
				<li class="nav-item">
				<a class="nav-link light ms-3" href="<?php echo base_url();?>Home/contact">Contact Us</a>
				</li>
				<!-- <li class="nav-item">
				
				<a class="nav-link light ms-3" href="<?php echo base_url();?>Home/page/1">About Us</a>
				</li> -->
				<?php 
				if ($this->session->userdata('login_status')==1) { 
					// print_r(array_keys($this->session->userdata()));
				?>
				<div class="dropdown ms-3">
					<button class=" nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Hi, <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item ms-3" href="<?php echo base_url();?>Dashboard/profile">My Profile</a></li>
						<li><a class="dropdown-item ms-3" href="<?php echo base_url();?>Dashboard/last_booking">Last Booking</a></li>
						<li><a class="dropdown-item ms-3" href="<?php echo base_url();?>Dashboard/bookings">Bookings</a></li>
					</ul>
				</div>			
				<?php } ?>
			</ul>
				
			<?php if ($this->session->userdata('login_status')!=1) { ?>

			<div class="d-flex ms-3">
				<a href="<?php echo base_url();?>Home/login"><button class="btn btn-outline-light btn-primary me-2">Login</button></a>
				<a href="<?php echo base_url();?>Home/register"><button class="btn btn-outline-light btn-primary me-2">Sign Up</button></a>
			</div>
			<?php } else{?>
			<div class="d-flex ms-3">
				<a href="<?php echo base_url();?>Home/logout"><button class="btn btn-outline-light btn-primary me-2">Logout</button></a>
			</div>
			<?php }?>
		</div>
	</div>
</nav>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PSP19KXDFY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PSP19KXDFY');
</script>