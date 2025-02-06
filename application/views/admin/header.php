<?php
if ($this->session->userdata('admin_login')!=1) {
	redirect('Admin');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" rel="stylesheet">
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>


</head>
<body>
	<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-primary">
		<div class="container-fluid">
			
		<a class="navbar-brand" href="#">FareXplorer</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<div class="navbar navbar-expand-lg ">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					
				</ul>
				<div class="d-flex ms-3">
					<a href="<?php echo base_url();?>Home/logout"><button class="btn btn-outline-light btn-primary me-2">Logout</button></a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<style>
						.flex-column{
							padding-top:4%
						}
						.nav-item {
							background-color: #f8f9fa;
							margin-bottom: 10px;
						}
						.nav-item:hover{
							color: #495057; /* Add border */
						}
						.nav-link {
							color: #495057;

							font-weight: bold; /* Make text bold */
						}
					</style>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/dashboard">
								Dashboard
							</a>
						</li>
						<!-- <?php 
						if($this->session->userdata('user_list')==1){
						?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/site_users">
								Site Users
							</a>
						</li>
						<?php 
						}
						?> -->
						<?php 
						if($this->session->userdata('booking_list')==1){
						?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/booking_list">
								Bookings
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/create_booking">
								Create Bookings
							</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/meta_airlines">
								Meta Airlines
							</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/markup">
								Markup On/Off
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/blocked_airlines">
								Blocked Airlines
							</a>
						</li>

				<button type="button" class="flex items-center p-1 w-full transition duration-75 group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-700" style="font-weight:700;">Reports</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            	</button>
				<ul id="dropdown-example" class="hidden py-2 space-y-2">
				<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/searches_tracker">
								Searches Tracker
							</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/sector_report">
								Sectors Report
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/click_report">
								Clicks Report
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/clicks_tracker">
								Clicks Tracker
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/hotel_enquiry">
								Hotel Searches
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/cab_enquiry">
								Cab Searches
							</a>
						</li>
				</ul>


						
						<?php 
						}
						?>
<!-- 						<?php 
						if($this->session->userdata('site_settings')==1){
						?>
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url();?>Admin/site_settings">
								Site Settings
							</a>
						</li>
						<?php 
						}
						?>
						<?php 
						if($this->session->userdata('admin_user_management')==1){
						?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>Admin/admin_users">
								Administrator Users
							</a>
						</li>
						<?php 
						}
						?>
						<?php 
						if($this->session->userdata('rate_management')==1){
						?>
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url();?>Admin/rate_management">
								Rate Management
							</a>
						</li>
						<?php 
						}
						?>
					 -->
						<?php 
						if($this->session->userdata('cms')==1){
						?>
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url();?>Admin/cms">
								CRM
							</a>
						</li>
						<?php 
						}
						?>

					</ul>
				</div>
			</nav>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">