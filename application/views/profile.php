<?php $this->load->view('header');?>

<style>
	label{
		display:block;
		text-align: left;
    	margin-top: 2%;
	}
	#prodiv{
		flex-grow:1;
		align-items: center;
		justify-content: center;
		padding-top:2%
	}
	#main-card{
		display:flex;
		flex-direction:column;
		align-items: start;
	}
	/* .form-control{
		padding: .375rem 0;
	} */
	#editProfileDropdown{
		flex-grow: 1;
		align-items:center;
		justify-content: center;
	}
	.form-row{
		display:flex;
		flex-direction:row;
		flex-wrap:wrap;
	}
	@media screen and (min-width:800px) {
		.form-control{
			padding: .375rem .375rem;
		}
	}
	@media screen and (max-width:800px)and (min-width:600px) {
		.form-control{
			padding: .375rem .375rem;
		}
		#main-card{
			flex-direction:column;
		
		}
	}
	@media screen and (min-width:600px) {
		.col-md-6{
			max-width:40%;
			margin-right:10%;
		}
		.col-md-4{
			max-width:28%;
			margin-right:5.33%;
		}
	}
	@media screen and (max-width:600px) {
		#prodiv{
			max-width: 100%;
		}
		#editProfileDropdown{
			width:90%
		}
		label{
			margin-top:4%;
		}
		#main-card{
			flex-direction:column !important;
		}
		#width-controll{
			max-width:90%;
		}
	}
</style>
	<div  style="margin-bottom:2%;">
		<div id="width-controll" class="container mt-5">
			<div class="jumbotron text-center">
				<h1 class="display-4">Welcome <?php echo $data->first_name." ".$data->last_name;?>!</h1>
				<p class="lead">Manage your bookings and personal information here.</p>
				<hr class="my-4">
				<div class="card">
					<div id="main-card" class="card-body">
						<button id="editProfile" class="btn btn-primary" style="max-width:50%;text-wrap:nowrap">Edit Profile</button>		
						<script>
							document.getElementById('editProfile').addEventListener('click', function() {
								var prodiv = document.getElementById('prodiv');
								var editProfile = document.getElementById('editProfile');
								if(prodiv.style.display === 'flex'){
									prodiv.style.display = 'none';
									editProfile.innerHTML = 'close';
								}else{
									editProfile.innerHTML = 'Edit Profile';
									prodiv.style.display = 'flex';
								}
								var dropdown = document.getElementById('editProfileDropdown');
								dropdown.style.display = dropdown.style.display === 'none' ? 'flex' : 'none';
							});
						</script> 
						<div id="prodiv" class="row" style="display:flex">
							<h3><?php echo $data->first_name." ".$data->last_name;?></h3>
							<p class="lead"><?php echo $data->email;?></p>
							<p>+1 <?php echo $data->mobile_no;?></p>
							<p>
								<?php echo $data->address_l1;?>
								<br>
								<?php echo $data->address_l2;?>
								<br>
								<?php echo $data->city;?>,<?php echo $data->state;?>
								<br>
								<?php echo $data->country;?>,<?php echo $data->zip_code;?>

							</p>
						</div>
						<div id="editProfileDropdown" class="dropdown" style="display: none;">
							<form id="editProfileForm" class="p-3 form-column" method="post" action="<?php echo base_url();?>Dashboard/profile_update">
								<div class="flex form-row">
									<div class="form-group col-md-6">
										<label for="name">First Name</label>
										<input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $data->first_name;?>" class="form-control" required>
									</div>
									<div class="form-group col-md-6">
										<label for="name">Last Name</label>
										<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $data->last_name;?>" class="form-control" required>
									</div>
									<div class="form-group col-md-6">
										<label for="email">Email</label>
										<input type="email" id="email" name="email" placeholder="Email" value="<?php echo $data->email;?>" class="form-control" required>
									</div>
								</div>
								<div class="flex form-row">
									<div class="form-group col-md-4">
										<label for="phone">Phone</label>
										<input type="tel" id="phone" name="phone" placeholder="Phone" value="<?php echo $data->mobile_no;?>" class="form-control" required>
									</div>
									<div class="form-group col-md-4">
										<label for="dob">Date of birth</label>
										<input type="date" id="dob" name="dob" placeholder="Birth Date" value="<?php echo $data->dob;?>" class="form-control">
									</div>
									<div class="form-group col-md-4">
										<label for="dob">Address Line 1</label>
										<textarea  class="form-control" name="address_line1"><?php echo $data->address_l1;?></textarea>
									</div>
									<div class="form-group col-md-4">
										<label for="dob">Address Line 2</label>
										<textarea  class="form-control"  name="address_line2"><?php echo $data->address_l2;?></textarea>
									</div>
									<div class="form-group col-md-4">
										<label for="">Country</label>
										<select id="countrySelect" class="form-control" name="country">
											<option value="">Select a country</option>
											<?php  
											$query=$this->db->query("SELECT * FROM country WHERE status=1");
											$query=$query->result();
											foreach ($query as $key => $value) {
											?>
											<option value="<?php echo $value->country_name;?>" <?php if($value->country_name==$data->country){echo "selected";}?>><?php echo $value->country_name;?></option>
											<?php
											}
											?>
										</select>
									</div>
									
									<div class="form-group col-md-4">
										<label for="">State</label>
										<script>
											$(document).ready(function() {
												$('#countrySelect').change(function() {
													if ($(this).val() == 'United States') {
														$('#stateSelect').show();
														$('#stateInput').hide();
													} 
													else {
														$('#stateSelect').hide();
														$('#stateInput').show();
													}
												});
											});
										</script>
										<select id="stateSelect" name="state" class="form-control" <?php if($data->country!="United States"){?>style="display: none;"<?php }?>>
											<option value="">Select a state</option>
											<?php  
											$query=$this->db->query("SELECT * FROM states WHERE status=1");
											$query=$query->result();
											foreach ($query as $key => $value) {
											?>
											<option value="<?php echo $value->state;?>" <?php if($value->state==$data->state){echo "selected";}?>><?php echo $value->state;?></option>
											<?php
											}
											?>
										</select>
										<input type="text" id="stateInput" name="state2" class="form-control" placeholder=" State " <?php if($data->country=="United States"){?>style="display: none;"<?php }?>>
									</div>
									<div class="form-group col-md-4">
										<label for="" class="form__label">City</label>
										<input type="text" class="form-control" placeholder=" City " name="city" value="<?php echo $data->city;?>">
									</div>
									<div class="form-group col-md-4">
										<label for="">Zip Code</label>
										<input type="number" class="form-control" placeholder="Enter Zip Code" name="zip"  value="<?php echo $data->zip_code;?>">
									</div>
								</div>
								<button type="submit" class="btn btn-primary" style="margin-top:4%">Update</button>
							</form>
						</div>
					</div>
					
				</div>

								
			</div>
		</div>
	</div>
<?php $this->load->view('footer');?>