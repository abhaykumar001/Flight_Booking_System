<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Panel</title>
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

<style>
	.gradient-custom-2 {
		background: #0068ef;
		background: -webkit-linear-gradient( rgba(0,104,239,0.7), rgba(0,104,239,0.53));
		background: linear-gradient( rgba(0,104,239,0.7), rgba(0,104,239,0.53));
  	}
	.row>*{
		padding-right: calc(var(--bs-gutter-x) * 0);
    	padding-left: calc(var(--bs-gutter-x) * 0);
	}
	.form-control{
		padding: 0.375rem 0rem;
	}
	@media only screen and (max-width:580px) {
		/* .row>*{
			width:90%;
		} */
		.row{
			margin-right: calc(-0 * var(--bs-gutter-x));
    		margin-left: calc(-0* var(--bs-gutter-x)); 
		}
		.container{
			padding-right: calc(var(--bs-gutter-x) * 0);
    		padding-left: calc(var(--bs-gutter-x) * 0);
		}
	}
</style>
<section class="h-100 gradient-form" style="background-color: #eee;">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-xl-10">
			<div class="card rounded-3 text-black">
			<div class="row g-0">
				<div class="col-lg-6">
				<div class="card-body p-md-5 mx-md-4">

					<div class="text-center">
					
					<h4 class="mt-1 mb-5 pb-1">Administrator Login</h4>
					</div>

					<form method="post" action="<?php echo base_url();?>Admin/login_action">
					<!-- <p>Please login to your account</p> -->

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example11">Username</label>
						<input type="text" id="form2Example11" class="form-control" placeholder="Enter Username" name="username" />
					</div>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example22">Password</label>
						<input type="password" name="password" id="form2Example22" class="form-control" placeholder="Enter Password" />
					</div>

					<div class="text-center pt-1 mb-5 pb-1">
						<button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" style="padding:10px;">Log in</button>
					</div>
					</form>

				</div>
				</div>
				<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
				<div class="text-white px-3 py-4 p-md-5 mx-md-4">
					<h4 class="mb-4"></h4>
					<p class="small mb-0">
						<img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>"
						style="width: 300px;" alt="logo">
					</p>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>
