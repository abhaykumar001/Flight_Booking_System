<?php $this->load->view('admin/header');?>
<style>
	table {
		overflow-x: auto;
		display: block;
		border-collapse: collapse;
	}
	#search-user{
		margin-top:2%;
		margin-bottom:4%;
	}
	#flex-grow-last{
		display:flex;
		justify-content:flex-end;
		align-items:flex-end;
	}
	.form-label{
		color:#212529;
		font-weight:bold;
		font-size:1rem;
	}
	.flex-grow{
		flex-grow:1;
		margin-right:1%;
		padding-left:1%;
	}
	@media screen and (min-width: 450px) and (max-width: 536px) {
		#flex-grow-last{
			margin-top:2%
		}
	}
	@media screen and (min-width: 1102px) and (max-width: 1222px) {
		#flex-grow-last{
			margin-top:2%
		}
	}
	@media screen and (max-width: 1350px) {
		#flex-grow-last{
			margin-top:2%
		}
	}
	@media screen and (min-width: 1350px) {
		#form-row{
			flex-wrap: nowrap;
		}
	}
</style>
<form id="search-user" action="<?php echo base_url();?>Admin/site_users" method="post">
	<div id="form-row" class="row">
		<div class="flex-grow" >
			<label for="first_name" class="form-label">First Name:</label>
			<input type="text" id="first_name" class="form-control" name="first_name" <?php if($this->input->post()){?>value="<?php echo $this->input->post('first_name')?>"<?php }?>>
		</div>
		<div class="flex-grow"  >
			<label for="last_name" class="form-label">Last Name:</label>
			<input type="text" id="last_name" class="form-control" name="last_name" <?php if($this->input->post()){?>value="<?php echo $this->input->post('last_name')?>"<?php }?>>
		</div>
		<div class="flex-grow" >
			<label for="mobile_no" class="form-label">Phone Number:</label>
			<input type="text" class="form-control" id="mobile_no" name="mobile_no" <?php if($this->input->post()){?>value="<?php echo $this->input->post('mobile_no')?>"<?php }?>>
		</div>
		<div class="flex-grow" >
			<label for="email" class="form-label">Email:</label>
			<input type="email" class="form-control" name="email" id="email" <?php if($this->input->post()){?>value="<?php echo $this->input->post('email')?>"<?php }?>>
		</div>
		<div id="flex-grow-last" class="flex-grow" >
			<br>
			<input type="submit" class="form-control btn btn-primary" value="Search">
		</div>
	</div>
</form>

<b><?php echo $count;?> Users Found</b>
<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Mobile No</th>
					<th scope="col">Address</th>
					<th scope="col">Last Active On</th>
					<th scope="col">Joined On</th>
					<th scope="col">Booking Count</th>
					<th scope="col">Last Booking </th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
			<tbody>
				<?php
				$count=1; 
				foreach ($data as $key => $value) {
				// print_r($value);die();
				?>				
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $value->first_name;?></td>
					<td><?php echo $value->last_name;?></td>
					<td><?php echo $value->email;?></td>
					<td><?php echo $value->mobile_no;?></td>
					<td>
						<?php echo $value->address_l1;?>
						<br>
						<?php echo $value->address_l2;?>
						<br>
						<?php echo $value->city;?>
						<br>
						<?php echo $value->state;?>
						<br>
						<?php echo $value->country;?>
						<br>
						<?php echo $value->zip_code;?>
						<br>
					</td>
					<td><?php echo $value->last_login; ?></td>
					<td><?php echo $value->add_date; ?></td>
					<td>0</td>
					<td>2024-04-09 00:00:00</td>
					<td>
						<a href="<?php echo base_url();?>Admin/user_booking/<?php echo $value->id;?>">Check Bookings</a>
						<a href="<?php echo base_url();?>Admin/delete_user/<?php echo $value->id;?>">Delete User</a>
					</td>
				</tr>
				<?php
				$count++;
				}
				?>
			</tbody>
			</tbody>
		</table>

<?php $this->load->view('admin/footer');?>