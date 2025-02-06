<?php $this->load->view('header'); ?>

<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>

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
</script>
<section class="h-100 gradient-form" style="background-color: #eee;">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-xl-10">
			<div class="card rounded-lg text-black">
			<div class="row g-0">
				<div class="col-lg-6">
				<div class="card-body p-md-5 mx-md-4">

					<div class="flex justify-center item-center">
					<img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>"
						style="width: 200px;" alt="logo">
					</div>
					<h4 class="flex justify-center item-center text-2xl text-bold mb-5 pb-1">Login</h4>

					<form id="login-form" method="post" action="<?php echo base_url();?>Home/login_action">
					<p class="mb-3">Please login to your account</p>
					<?php 
					if ($this->session->userdata('login_message')){
					?>
					<p class="mb-3">
						<div id="error" class="text-danger text-center">
						<?php echo $this->session->userdata('login_message');?>
						</div>
					</p>
					<?php
					$this->session->unset_userdata('login_message');
					}
					?>
					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example11">Username</label>
						<input type="text" id="form2Example11" class="form-control" placeholder="   Enter Your Email Address" name="username"  required/>
					</div>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example22">Password</label>
						<input type="password" name="password" id="form2Example22" class="form-control" required placeholder="   Enter Password" />
					</div>
					
					<!-- <div class="g-recaptcha" required data-sitekey="<?php echo $site_settings->google_site_key;?>"></div>
            		<div id="g_recaptcha_error"></div>
 -->

					<div class="text-center pt-1 mb-5 pb-1">
						<button class="g-recaptcha btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"  style="padding:10px;">Log in</button>
					</div>

					<div class="d-flex align-items-center justify-content-center pb-4">
						<p class="mb-0 me-2">Don't have an account?</p>
						<a href="<?php echo base_url();?>Home/register"><button type="button" class="btn btn-primary">Create new</button></a>
					</div>

					
					</form>

				</div>
				</div>
				<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
				<div class="text-white px-3 py-4 p-md-5 mx-md-4">
					<h4 class="mb-4">Get the best out of your travelling experience!</h4>
					<p class="small mb-0">
						Log in to enhances personalization, allowing tailored flight recommendations, exclusive deals based on your preferences and history, seamless booking management, including itinerary tracking, flight modifications, and streamlined communication for any travel-related assistance.
						By logging in, you unlock special offers, and priority booking options, ensuring a more rewarding and efficient flight booking experience.
					</p>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>
<script>
	function submit_check() {
	// var response = grecaptcha.getResponse();
    //         if(response.length == 0) {
    //        		document.getElementById('g_recaptcha_error').innerHTML = '<span style="color:red;">This field is required.</span>';
    //         	return false;
    //         }
    //         else{
            	var form = document.getElementById('login-form');
				form.submit();
            // }
	}
</script>
<?php $this->load->view('footer'); ?>