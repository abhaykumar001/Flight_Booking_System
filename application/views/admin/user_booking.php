<?php $this->load->view('admin/header');?>
<style>
	table {
		overflow-x: auto;
		display: block;
		border-collapse: collapse;
	}
	.row>div{
		margin-top:2%;
	}
	div>p{
		display:inline-block
	}
	.details-head{
		font-size:1em;
		width:20%
	}
	.details-data{
		font-size:1.1em;
		color:#007bff
	}
	.details-div{
		display:flex;
		align-items:flex-start;
	}
	@media screen and (max-width: 530px){
		.details-head{
			display:none;
		}
	}
</style>
<div id="details" class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>User Details</h4>
	</div>
	<div id="user-details" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="details-div">
			<p class="details-head">Name:</p>
			<p class="details-data"><?php echo $user_data->first_name." ".$user_data->last_name; ?></p>
		</div>
		<div class="details-div">
			<p class="details-head">Mobile No:</p>
			<p class="details-data">
				<?php echo $user_data->mobile_no; ?>
			</p>
		</div>
		<div class="details-div">
			<p class="details-head">Email:</p>
			<p class="details-data">
				<?php echo $user_data->email; ?>
			</p>
		</div>
		<div class="details-div">
			<p class="details-head" >Address:</p>
			<p class="details-data">
				<?php echo $user_data->address_l1."<br>".$user_data->address_l2."<br>".$user_data->city.','.$user_data->state.'<br>'.$user_data->country.','.$user_data->zip_code; ?>
			</p>
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Bookings</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">From</th>
					<th scope="col">To</th>
					<th scope="col">Travel Date</th>
					<th scope="col">Return Date</th>
					<th scope="col">Person</th>
					<th scope="col">Children</th>
					<th scope="col">Infant</th>
					<th scope="col">Class</th>
					<th scope="col">Actual Base Fare</th>
					<th scope="col">Charged Base Fare</th>
					<th scope="col">Actual Extra Charges</th>
					<th scope="col">Charged Extra Charges</th>
					<th scope="col">Actual Total</th>
					<th scope="col">Charged Total</th>
					<th scope="col">Payment Status</th>
					<th scope="col">Booking Status</th>
					<th scope="col">Pnr No</th>
					<th scope="col">Booking Remarks</th>
					<th scope="col">View Complete Details</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count=1; 
				foreach ($booking_data as $key => $value) {
				?>				
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $value->from_airport;?></td>
					<td><?php echo $value->to_airport;?></td>
					<td><?php echo $value->travel_date;?></td>
					<td><?php echo $value->return_date;?></td>
					<td><?php echo $value->no_person;?></td>
					<td><?php if($value->no_child!=""){echo $value->no_child;}else{echo 0;}?></td>
					<td><?php if($value->no_infant!=""){echo $value->no_infant;}else{echo 0;}?></td>
					
					<td><?php echo $value->class;?></td>
					<td>$<?php echo $value->actual_base_fare;?></td>
					<td>$<?php echo $value->actual_total_fare - $value->actual_base_fare;?></td>
					<td>$<?php echo $value->actual_total_fare;?></td>
					
					<td>$<?php echo $value->ticket_price;?></td>
					<td>$<?php echo $value->total_charges - $value->ticket_price;?></td>
					<td>$<?php echo $value->total_charges;?></td>
					
					<td><?php echo $value->payment_status;?></td>
					<td><?php echo $value->booking_status;?></td>
					<td><?php echo $value->pnr_no;?></td>
					<td><?php echo $value->booking_remarks;?></td>
					<td><a href="<?php echo base_url();?>Admin/booking_details/<?php echo $value->id;?>">Complete Details</a></td>

				</tr>
				<?php
				$count++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('admin/footer');?>	