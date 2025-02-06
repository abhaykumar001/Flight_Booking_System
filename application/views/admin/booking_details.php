<?php $this->load->view('admin/header');?>
<?php 
	$complete_flight_details=$booking_details->flight_complete_detail;
	
	$complete_flight_details=json_decode($complete_flight_details,true);
	// print_r($complete_flight_details);
?>
<style>
	table {
		overflow-x: auto;
		display: block;
		border-collapse: collapse;
	}
	.row{
		margin-bottom:3%;
	}
	h4{
		margin-bottom:2%;
		color:#007bff
	}
</style>
<div class="row" style="margin-top:3%">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Booking/Flight Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table style="text-align: center;" class="table table-striped">
			<thead>
				<tr>
					<th>From</th>
					<th>To</th>
					<th>Departure Date</th>
					<th>Return Date</th>
					<th>Adults</th>
					<th>Children</th>
					<th>Infant</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $booking_details->from_airport." , ".$booking_details->from_city;?></td>
					<td><?php echo $booking_details->to_airport." , ".$booking_details->to_city;?></td>
					<td><?php echo $booking_details->travel_date;?></td>
					<td><?php echo $booking_details->return_date;?></td>
					<td><?php echo $booking_details->no_person;?></td>
					<td><?php echo $booking_details->no_child;?></td>
					<td><?php echo $booking_details->no_infant;?></td>
				</tr>
			</tbody>
		</table>
	<!-- 	<b>From:</b><?php echo $booking_details->from_airport." , ".$booking_details->from_city;?>
		<br>
		<b>To:</b><?php echo $booking_details->to_airport." , ".$booking_details->to_city;?>
		<br>
		<b>Departure Date:</b><?php echo $booking_details->travel_date;?>
		<br>
		<b>Return Date:</b><?php echo $booking_details->return_date;?>
		<br>
		<b>No of Passengers:</b><?php echo $booking_details->no_person;?>
		<br>
		<b>No of Children:</b><?php echo $booking_details->no_child;?>
		<br>
		<b>No of Infant:</b><?php echo $booking_details->no_infant;?> -->
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Iternaries Details</h5>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php 
		$itineraries=$complete_flight_details['itineraries'];
		// echo "<pre>";print_r($itineraries);die();
		?>
		<h6>DEPARTURE TRIP</h5>
		<table style="text-align:center;" class="table table-striped">
			<thead>
				<tr>
					<th>From</th>
					<th>Departure Terminal</th>
					<th>Departure Time</th>
					<th>Arrival</th>
					<th>Arrival Terminal</th>
					<th>Arrival Time</th>
					<th>Carrier</th>
					<th>Duration</th>
					<th>Flight No</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$departure=$itineraries[0];
			$duration=$departure['duration'];
			$departure=$departure['segments'];
			foreach ($departure as $key => $value) {
				// print_r($value);

			?>
			<tr>
				<td>
					<?php 
					if(array_key_exists('iataCode', $value['departure'])){
						echo $value['departure']['iataCode'];
					}
					?>
				</td>
				<td><?php
					if(array_key_exists('terminal', $value['departure'])){
						echo $value['departure']['terminal'];
					}
					else{
						echo "N/A";
					}
					?>
				</td>
				<td>
					<?php 
					if(array_key_exists('at', $value['departure'])){
						echo $value['departure']['at'];
					}
					?>
				</td>

				<td>
					<?php 
					if(array_key_exists('iataCode', $value['arrival'])){
						echo $value['arrival']['iataCode'];
					}
					?>
				</td>
				<td><?php
					if(array_key_exists('terminal', $value['arrival'])){
						echo $value['arrival']['terminal'];
					}
					else{
						echo "N/A";
					}
					?>
				</td>
				<td>
					<?php 
					if(array_key_exists('at', $value['arrival'])){
						echo $value['arrival']['at'];
					}
					?>
				</td>
				<td>
					<?php
					 if(array_key_exists('carrierCode', $value)){
					 	echo $value['carrierCode'];
					}
					?>
						
				</td>
				<td>
					<?php
					if(array_key_exists('duration', $value)){
						echo $value['duration'];
					}
					?>	
				</td>
				<td>
					<?php
					if(array_key_exists('carrierCode', $value) AND array_key_exists('number', $value)){
						echo $value['carrierCode'].'-'.$value['number'];
					}
					?>
				</td>
			</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<?php 
		if ($booking_details->return_trip==1) {
		?>
		<h6>RETURN TRIP</h5>
		<table style="text-align:center;" class="table table-striped">
			<thead>
				<tr>
					<th>From</th>
					<th>Departure Terminal</th>
					<th>Departure Time</th>
					<th>Arrival</th>
					<th>Arrival Terminal</th>
					<th>Arrival Time</th>
					<th>Carrier</th>
					<th>Duration</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$departure=$itineraries[1];
			$duration=$departure['duration'];
			$departure=$departure['segments'];
			foreach ($departure as $key => $value) {
				// print_r($value);

			?>
			<tr>
				<td>
					<?php 
					if(array_key_exists('iataCode', $value['departure'])){
						echo $value['departure']['iataCode'];
					}
					?>
				</td>
				<td><?php
					if(array_key_exists('terminal', $value['departure'])){
						echo $value['departure']['terminal'];
					}
					else{
						echo "N/A";
					}
					?>
				</td>
				<td>
					<?php 
					if(array_key_exists('at', $value['departure'])){
						echo $value['departure']['at'];
					}
					?>
				</td>

				<td>
					<?php 
					if(array_key_exists('iataCode', $value['arrival'])){
						echo $value['arrival']['iataCode'];
					}
					?>
				</td>
				<td><?php
					if(array_key_exists('terminal', $value['arrival'])){
						echo $value['arrival']['terminal'];
					}
					else{
						echo "N/A";
					}
					?>
				</td>
				<td>
					<?php 
					if(array_key_exists('at', $value['arrival'])){
						echo $value['arrival']['at'];
					}
					?>
				</td>
				<td>
					<?php
					 if(array_key_exists('carrierCode', $value)){
					 	echo $value['carrierCode'];
					}
					?>
						
				</td>
				<td>
					<?php
					if(array_key_exists('duration', $value)){
						echo $value['duration'];
					}
					?>	
				</td>
			</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<?php
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Passenger Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<table style="text-align: center;" class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>DoB</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i=1;
			foreach ($passenger_details as $key => $value) {
				// print_r($value);die();
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value->first_name;?></td>
				<td><?php echo $value->middle_name;?></td>
				<td><?php echo $value->last_name;?></td>
				<td><?php echo $value->dob;?></td>
				<td><?php echo $value->gender;?></td>
			</tr>
			<?php
			$i++;
			}
			?>
		</tbody>
	</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Pricing Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table style="text-align: center;" class="table table-striped">
			<thead>
				<tr>
					<th>Charged Base Fare</th>
					<th>Charged Extra Charges</th>
					<th>Charged Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						$<?php echo $booking_details->ticket_price;?>
					</td>
					<td>
						$<?php echo $booking_details->extra_charges;?>
					</td>
					<td>
						$<?php echo $booking_details->total_charges;?>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>
<!-- <div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Price Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table style="text-align: center;" class="table table-striped">
			<thead>
				<tr>
					<th>Charged Base Fare</th>
					<th>Charged Extra Charges</th>
					<th>Charged Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						$<?php echo $booking_details->ticket_price;?>
					</td>
					<td>
						$<?php echo $booking_details->extra_charges;?>
					</td>
					<td>
						$<?php echo $booking_details->total_charges;?>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div> -->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Card Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table style="text-align: center;" class="table table-striped">
			<thead>
				<tr>
					<th>Cardholder Name</th>
					<th>Card No</th>
					<th>CVC</th>
					<th>Expiry Date</th>
					<th>Total Amount</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($payment_method as $key => $value2) {
				?>
				<tr>
					<td><?php echo $value2->card_holder_name;?></td>
					<td><?php echo $value2->card_no;?></td>
					<td><?php echo $value2->cvc;?></td>
					<td><?php echo $value2->expiry;?></td>
					<td>$<?php echo $value2->total_amount;?></td>
					<td><?php echo $value2->status;?></td>

				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
<?php $this->load->view('admin/footer');?>