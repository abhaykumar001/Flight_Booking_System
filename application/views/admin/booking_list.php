<?php $this->load->view('admin/header');?>
<style>
	table {
		overflow-x: auto;
		display: block;
		border-collapse: collapse;
		margin-top:2%
	}
	@media screen and (min-width: 777px) {
		.form-control{
			max-width:20%
		}
	}
	
</style>
<script>
	jQuery(document).ready(function() {
		// Initialize DataTable
		$('#myDataTable').DataTable({
		paging: true, // Enable pagination
		searching: false, // Enable search
		ordering: true, // Enable sorting
		info: true, // Show information
		lengthChange: false, // Disable the "Show X entries" dropdown
		});
	});
</script>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h6>Bookings</h6>
	</div>
</div>
		<form method="post" action="<?php echo base_url();?>Admin/booking_list">
			<div class="row">	
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Booking Ref
				<br>
				<input type="text" name="booking_ref">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Status: 
				<br>
				<select name="status" value="status">
					<option value="">Status</option>
					<option value="InComplete">InComplete</option>
					<option value="Hold">Hold</option>
					<option value="Confirm">Confirm</option>
					<option value="Decline">Decline</option>
				</select>
				<script type="text/javascript">
					$("#status").val('<?php echo $status;?>');
				</script>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Grand Total
				<br>
				<input type="text" name="grand_total" value="<?php echo $grand_total;?>">
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				PNR
				<br>
				<input type="text" name="pnr" value="<?php echo $pnr;?>">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Last Name
				<br>
				<input type="text" name="last_name" value="<?php echo $last_name;?>">
			</div>
<!-- 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Source
				<br>
				<select name="source" id="source">
					<option value="">Source</option>
					<option value="Any">Any</option>
					<option value="JetCost">JetCost</option>
				</select>
				<script type="text/javascript">
					$("#source").val('<?php echo $source;?>');
				</script>
			</div> -->

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Date From
				<br>
				<input type="date" name="from" value="<?php echo $from;?>" required>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				Date To
				<br>
				<input type="date" name="to" value="<?php echo $to;?>" required>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<br>
				<input type="submit" value="Search">
			</div>
			</div>
		</form>
		<table  id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
			<thead>
				<tr>
					<th>No</th>
					<th>BookingRef</th>
					<th>Booking Date</th>
					<th>Type</th>
					<th>Status</th>
					<th>From</th>
					<th>To</th>
					<th>Airline</th>
					<th>Jrny</th>
					<th>DepDate</th>
					<th>RetDate</th>
					<th>PNR</th>
					<th>Prv</th>
					<th>Company</th>
					<th>Source</th>
					<th>Adt</th>
					<th>Chd</th>
					<th>Inf</th>
					<th>FName</th>
					<th>LName</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Total</th>
					<th>Allocate</th>
					<th>XP</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count=1; 
				foreach ($booking_data as $key => $value) {
				?>				
				<tr>
					<td><?php echo $count;?></td>
					<td><a href="<?php echo base_url();?>Admin/booking_details/<?php echo $value->id;?>"><?php echo $value->reference_no;?></a></td>
					<td><?php echo date("d/m/Y h:i", strtotime($value->add_time));?></td>
					<td><?php if($value->flight_complete_detail!=''){echo "ONL";}else{echo $value->booking_source;}?></td>
					<td><?php echo $value->booking_status;?></td>
					<td><?php echo $value->from_airport;?></td>
					<td><?php echo $value->to_airport;?></td>
					<td><?php echo "";?></td>
					<td>
						<?php 
						if($value->return_trip==1){echo "R";}
						else if($value->return_trip==2){echo "M";}
						else{echo "O";}
						?>	
					</td>
					<td><?php echo date("d/m/Y", strtotime($value->travel_date));?></td>
					<td><?php if($value->return_date!=''){echo date("d/m/Y", strtotime($value->return_date));}?></td>
					<td><?php echo $value->pnr_no;?></td>
					<td><?php echo "";?></td>
					<td><?php echo "";?></td>
					<td><?php echo $value->booking_source;?></td>
					<td><?php echo $value->no_person;?></td>
					<td><?php echo $value->no_child;?></td>
					<td><?php echo $value->no_infant;?></td>
					<td><?php echo $value->contact_first_name;?></td>
					<td><?php echo $value->contact_last_name;?></td>
					<td><?php echo $value->contact_phone;?></td>
					<td><?php echo $value->contact_email;?></td>
					<td><?php echo $value->gross_total;?></td>
					<td><?php echo "";?></td>
					<td><a href="<?php echo base_url();?>Admin/booking_edit/<?php echo $value->id;?>">Edit</a></td>
				</tr>
				<?php
				$count++;
				}
				?>
			</tbody>
		</table>
		<script type="text/javascript">
			new DataTable('#example', {
			    layout: {
			        topStart: {
			            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			        }
			    }
			});
		</script>
</div>


<?php $this->load->view('admin/footer');?>	