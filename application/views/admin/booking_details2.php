<?php $this->load->view('admin/header');?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Booking Details</h4>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">Booking Ref:</span>FX-<?php echo $booking_details->id;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">Status:</span><?php echo $booking_details->booking_status;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">BookingTime:</span><?php echo date("d/m/Y h:i", strtotime($booking_details->add_time));?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">PNR:</span><?php echo $booking_details->pnr_no;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">Total:</span><?php echo $booking_details->gross_total;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">From:</span><?php echo $booking_details->from_airport;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">To:</span><?php echo $booking_details->to_airport;?>
	</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">DepDate:</span><?php echo date("d/m/Y", strtotime($booking_details->travel_date));?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<span style="font-weight: 600;">RetDate:</span><?php echo date("d/m/Y", strtotime($booking_details->return_date));?>
	</div>

</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Flight Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table>
			<thead>
				<tr>
					<th>From</th>
					<th>To</th>
					<th>Depart Date</th>
					<th>Depart Time</th>
					<th>Arrive Date</th>
					<th>Arrive Time</th>
					<th>Airline</th>
					<th>Flight No</th>
					<th>Class</th>
					<th>Total Time</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($flight_details as $key => $value) {
				?>
				<tr>
					<td><?php echo $value->from_code;?></td>
					<td><?php echo $value->to_code;?></td>
					<td><?php echo date("d/m/Y", strtotime($value->depart_date));?></td>
					<td><?php echo $value->depart_time;?></td>
					<td><?php echo date("d/m/Y", strtotime($value->arrive_date));?></td>
					<td><?php echo $value->arrive_time;?></td>
					<td><?php echo $value->airline;?></td>
					<td><?php echo $value->flight_no;?></td>
					<td><?php echo $value->class;?></td>
					<td><?php echo $value->total_time;?></td>					
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Passenger Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table>
			<thead>
				<tr>
					<th>SNo</th>
					<th>Title</th>
					<th>FName</th>
					<th>MName</th>
					<th>LName</th>
					<th>DoB</th>
					<th>IdType</th>
					<th>IdCardNo</th>
					<th>TicketNo</th>
					<th>Passport Place</th>
					<th>Issue Date</th>
					<th>Expiry</th>
					<th>Nationality</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$count=1;
				foreach ($passenger_details as $key => $value1) {
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $value1->title;?></td>
					<td><?php echo $value1->first_name;?></td>
					<td><?php echo $value1->middle_name;?></td>
					<td><?php echo $value1->last_name;?></td>
					<td><?php echo date("d/m/Y", strtotime($value1->dob));?></td>
					<td><?php echo $value1->identity_card;?></td>
					<td><?php echo $value1->identity_card_no;?></td>
					<td><?php echo $value1->ticket_no;?></td>
					<td><?php echo $value1->passport_place;?></td>
					<td><?php echo date("d/m/Y", strtotime($value1->issue_date));?></td>
					<td><?php echo date("d/m/Y", strtotime($value1->expiry_date));?></td>
					<td><?php echo $value1->nationality;?></td>
				</tr>
				<?php
				$count++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Contact Details</h4>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">First Name</span><?php echo $booking_details->contact_first_name;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Last Name</span><?php echo $booking_details->contact_last_name;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Mobile</span><?php echo $booking_details->contact_phone;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Email</span><?php echo $booking_details->contact_email;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Address</span><?php echo $booking_details->contact_address;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">City</span><?php echo $booking_details->city;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">State</span><?php echo $booking_details->state;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Country</span><?php echo $booking_details->country;?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<span style="font-weight: 600;">Pincode</span><?php echo $booking_details->pincode;?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Payment Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table>
			<thead>
				<tr>
					<th>Supplier</th>
					<th>PaxType</th>
					<th>NoPax</th>
					<th>Base Fare</th>
					<th>Tax</th>
					<th>Total</th>
					<th>Base Fare Actual</th>
					<th>Tax Actual</th>
					<th>Issuance Fee</th>
					<th>Admin Fees</th>
					<th>Admin Fees2</th>
					<th>Card Fees</th>
					<th>Total Actual</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payment_details as $key => $value) {
				?>
				<tr>
					<td><?php echo $value->supplier;?></td>
					<td><?php echo $value->pax_type;?></td>
					<td><?php echo $value->no_pax;?></td>
					<td><?php echo $value->base_fare;?></td>
					<td><?php echo $value->tax;?></td>
					<td><?php echo $value->total;?></td>
					<td><?php echo $value->base_fare_actual;?></td>
					<td><?php echo $value->tax_actual;?></td>
					<td><?php echo $value->issuance_fee;?></td>
					<td><?php echo $value->admin_fees;?></td>
					<td><?php echo $value->admin_fees2;?></td>
					<td><?php echo $value->card_fee;?></td>
					<td><?php echo $value->total_actual;?></td>
				</tr>
				<?php
				}?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Card Details</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table>
			<thead>
				<tr>
					<th>Paymode</th>
					<th>Card Type</th>
					<th>Cardholder</th>
					<th>CVC</th>
					<th>Issue Date</th>
					<th>Expiry Date</th>
					<th>Amount</th>
					<th>Taxes</th>
					<th>Total Amount</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($payment_method as $key => $value2) {
				?>
				<tr>
					<td><?php echo $value2->paymode;?></td>
					<td><?php echo $value2->card_type;?></td>
					<td><?php echo $value2->card_holder_name;?></td>
					<td><?php echo $value2->cvc;?></td>
					<td><?php echo $value2->expiry;?></td>
					<td><?php echo $value2->issue;?></td>
					<td><?php echo $value2->amount;?></td>
					<td><?php echo $value2->taxes;?></td>
					<td><?php echo $value2->total_amount;?></td>
					<td><?php echo $value2->status;?></td>

				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
<?php $this->load->view('admin/footer');?>
