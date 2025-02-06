<?php $this->load->view('header');?>
<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
<style>
	.row>*{
		padding-right: calc(var(--bs-gutter-x) * 0);
    	padding-left: calc(var(--bs-gutter-x) * 0);
	}
	.form-control{
		padding: 0.375rem 0rem;
	}
	@media only screen and (max-width:580px) {
		.row>*{
			width:90%;
		}
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

<section  style="background-color: #eee;padding-top: 4%;padding-bottom: 4%;">
	<div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-lg-12 col-xl-11">
			<div class="card text-black" style="border-radius: 25px;">
				<div class="card-body p-md-5">
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
					<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
					<form class="mx-1 mx-md-4" id="form1" method="post" action="<?php echo base_url();?>Home/register_action">
						<div class="d-flex flex-row align-items-center mb-4" >
						<i class="fa fa-user fa-lg me-3 fa-fw"></i>
						<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="form3Example1c" >First Name</label>
							<input type="text" id="form3Example1c" class="form-control w-[250px] md:w-[400px]" name="first_name" placeholder="   Enter First Name" required />
						</div>
						</div>
						<div class="d-flex flex-row align-items-center mb-4" >
						<i class="fa fa-user fa-lg me-3 fa-fw"></i>
						<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="form3Example1c" >Last Name</label>
							<input type="text" id="form3Example1c" class="form-control w-[250px] md:w-[400px]" name="last_name"  placeholder="   Enter Last Name" required/>
						</div>
						</div>
						<div class="d-flex flex-row align-items-center mb-4">
						<i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
						<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="form3Example3c">Your Email</label>
							<input type="email" id="form3Example3c" class="form-control w-[250px] md:w-[400px]" name="email" placeholder="   Enter Email" required/>
						</div>
						</div>
						<div class="d-flex flex-row align-items-center mb-4">
						<i class="fa fa-lock fa-lg me-3 fa-fw"></i>
						<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="form3Example4c">Password</label>
							<input type="password" id="password" class="form-control w-[250px] md:w-[400px]" name="password" oninput="confirm_passworda()" placeholder="Enter Password" required/>
						</div>
						</div>
						<div class="d-flex flex-row align-items-center mb-4">
						<i class="fa fa-key fa-lg me-3 fa-fw"></i>
						<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="form3Example4cd">Confirm Password</label>
							<input type="password" id="confirm_password" class="form-control w-[250px] md:w-[400px]" name="confirm_password" oninput="confirm_passworda()" placeholder="   Confirm Password" required/>
							<span id="password_confirm_error" >Password should match</span>
						</div>
						</div>

						<div class="g-recaptcha" required data-sitekey="<?php echo $site_settings->google_site_key;?>"></div>
	            		<div id="g_recaptcha_error"></div>

						<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
						<button class="btn btn-primary btn-lg">Register</button>
						<!-- type="button" onclick="submit_check()" -->
						</div>
					</form>
					<script type="text/javascript">
						// $("#password_confirm_error").hide();
						function confirm_passworda() {
							var password=$("#password").val();
							var confirm_password=$("#confirm_password").val();
							if (password!=confirm_password) {
								$("#submit").attr('disabled','disabled');
								$("#password_confirm_error").show();
							}
							else{
								$("#submit").removeAttr('disabled');
								$("#password_confirm_error").hide();
							}
						}
					</script>
<!-- 					<script>
						function submit_check() {
							var response = grecaptcha.getResponse();
							alert(1);
				            if(response.length == 0) {
				           		document.getElementById('g_recaptcha_error').innerHTML = '<span style="color:red;">This field is required.</span>';
				            	return false;
				            }
				            else{
				            	var form = document.getElementById('form1');
								form.submit();
				            }
						}
					</script> -->
					</div>
					<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
	
					<img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>"
						class="img-fluid" alt="Sample image">
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('footer');?>