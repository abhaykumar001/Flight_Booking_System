<?php $this->load->view('header');?>
<style>
	
	.row>* {
		padding-right: calc(var(--bs-gutter-x)* 0);
		padding-left: calc(var(--bs-gutter-x)* 0);
		max-width:80%
	}
	.form-control{
		padding: 0.375rem 0rem;
	}
	@media only screen and (max-width:580px) {
		.submit-form-details{
			max-width:85%
		}
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
	@media only screen and (max-width: 1080px){
		.flight-main-booking {
			margin-left: 5% !important;
			width: 90% !important;
		}
	}
	@media only screen and (max-width: 580px){
		.row>* {
			width: 100%;
			max-width:100%
		}
	}
	.flight-main-booking{
		width:76%
	}
	#booking-details-header{
		padding-left:12%
	}
	.flight-main-booking{
		margin-left:12%
	}
	.no-adult{
		margin-bottom:2%
	}
	#add-adult{
		margin-top:1%
	}
	.flight-sub-info img {
		border-radius: 50%;
		width: 40px;
	}
	.form-control{
		padding: 0.375rem 0rem 0.375rem 0.375rem;
	}
	.flight-details{
		width: 100%;
		padding:2%
	}
	.details-main{
		padding-top:2%;
		padding-bottom: 1%;
	}
	.flight-details-nav{
		display: flex;
		flex-direction: column;
		max-width:27%;
	}
	.flight-details-nav *{
		padding: 1%;
		color: #0068EF;
		background-color: #fff;
		border: 1px solid #0068ef;
		border-radius:9px;
		margin-right: 1%
	}
	.flight-details-subcontainer,.fare-summary-subcontainer,.cancellation-subcontainer,.date-change-subcontainer{
		text-align: left;
		border:1px solid grey;
		border-radius: 6px;
		padding: 1%;
		margin-top: 2%;
		display: flex;
		flex-direction: column;
	}
	
	.flight-statement{
		border-bottom: 1px solid gray;
		padding-top: 1%;
		padding-bottom: 2%;
		font-size: medium;
		font-weight: lighter;
	}
	.flight-details-nav-links{
		font-size: medium;
	}
	.flight-details-nav-links:hover{
		cursor: pointer;
	}
	.flight-listings{
		font-size: medium;
	}
	.flight-sub-info{
		display: flex;
		flex-direction: row;
		align-items: center;
		padding-bottom: 2%;
		padding-top: 1%;
	}
	.flight-sub-info *{
		padding: 0.5%;
		/* margin-right: 1%; */
	}
	.flight-number-airline{
		/* border: 1px solid black; */
		/* border-radius: 6px; */
		/* padding: 1%; */
		color: #0068EF;
		/* background-color: #fff; */
	}
	.flight-sub-info img{
		border-radius: 50%;
	}
	.time-details{
		display: flex;
		flex-direction: row;
	}
	.time-details *{
		flex-grow: 1;
	}
	.from-time-airline,.to-time-airline{
		font-size: x-large;
	}
	.from-date-airline,.to-date-airline{
		font-size: medium;
		padding-top: 2%;
		padding-bottom: 2%;
		font-weight: 500;
	}
	.terminal{
		font-size: smaller;
		padding-top: 2%;
		padding-bottom: 2%;
		font-weight: 500;
	}
	.from-city,.to-city{
		font-weight: 600;
	}
	.flight-duration{
		align-items: center;
	}
	.green-line{
		height: 3px;
		width: 50%;
		background-color: green;
	}
	.stoppage-change-intimation{
		background-color: rgba(255, 166, 0, 0.308);
		display: flex;
		flex-direction: row;
		font-size: small;
		font-weight: 100;
		align-items: center;
		justify-content: center;
		padding: 1%;
		border-radius: 6px;
		margin-top: 3%;
		margin-bottom: 3%;
	}
	.stoppage-change-intimation *{
		margin-left: 1%;
		margin-right: 1%;
	}
	.total-cost{
		display: flex;
		flex-direction: row;
	}
	.price-category{
		font-size: large;
		font-weight: 100;
		width: 25%;
	}
	.total-cost{
		padding-top: 1.5%;
	}
	.total-price{
		width: 25%;
	}
	.info-div{
		font-size: smaller;
		font-weight: 100;
		display: block;
	}
	table{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 98%;
		margin-top: 2%;
		border-radius: 6px;
		overflow-x: auto;
		display: block;
		border-collapse: collapse;
	}
	td, th {
		border: 1px solid grey;
		text-align: left;
		padding: 8px;
	}
	.form-control{
		max-width:90%
	}
	td{
		font-size: smaller;
		font-weight: 100;
	}
	.disclaimer{
		font-size: small;
		font-weight: 500;
		margin-top: 2%;
		margin-bottom: 1%;
		padding: 1%;
		border-radius: 4px;
		background-color: rgba(255, 0, 0, 0.144);
	}
	.bolder-part{
		display:block;
		font-weight:bold;
		font-size:large
	}
	.bolder-heads{
		display:block;
		font-weight:bold;
	}
	.bolder-part-noblock{
		font-weight:bold;
		font-size:large
	}
	.flight-details-div{
		border-bottom:1px solid grey;
		padding-top: 1%;
    	padding-bottom: 2%;
		display: flex;
		flex-direction:row;
		justify-content:space-between;
		align-items:center;
		margin-bottom:2%
	}
	.fares-details-main{
		flex-direction:column
	}
	.fare-summary{
		margin-left:5%;
		width:55%
	}
	.row{
		margin-left:0;
		margin-right:0
	}
	.adult-status{
		margin-bottom:2%
	}
	// workaround
	.intl-tel-input {
	display: table-cell;
	}
	.intl-tel-input .selected-flag {
	z-index: 4;
	}
	.intl-tel-input .country-list {
	z-index: 5;
	}

	.submit-form-details{
		max-width:95%
	}
	.flight-details-subcontainer{
		margin-left: 2%;
		margin-right: 2%;
		margin-bottom: 2%;
	}
	.flight-statement{
		padding-left:1%
	}
	.navbar-button{
		padding: 5%;
    	margin-left: 5%;
		font-size: large !important;
	}
	#myNavbar {
		position: fixed;
		top: 0;
		left: 0;
		width: 0;
		height: 100vh;
		background-color: #333;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 90px;
		z-index: 1;
		display: flex;
    	flex-direction: column;
		align-items: flex-start;
		justify-content: left;
	}

	#myNavbar a {
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s;
	}

	#myNavbar a:hover {
		color: #f1f1f1;
	}

	#myNavbar .closebtn {
		position: absolute;
		top: 90px;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
	}

	.openbtn {
		font-size: 20px;
		cursor: pointer;
		background-color: #333;
		color: white;
		padding: 10px 15px;
		border: none;
		border-radius: 4px;
		margin-left: 2%;
		margin-top: 1.5%;
	}

	.openbtn:hover {
		background-color: #444;
	}

	@media screen and (max-height: 450px) {
		.navbar {padding-top: 15px;}
		.navbar a {font-size: 18px;}
	}
	#updateRequest,#cancelBooking{
		margin-right:1%
	}
	#contact-info-div,#footer{
		z-index:999999
	}
	#editProfileForm .form-group{
		text-align:left
	}
	.flex{
		display:flex
	}

	.status{
		position:absolute;
		right:4%;
		color:white;
		padding:0.5% 1.5%
	}
</style>

<div>

	<div id="home" display="block">
		<div class="lastTicketbook flight-details-subcontainer">
			
			<div class="flight-statement">
				<?php 
				$from=$flight_booking->from_city;
				$to=$flight_booking->to_city;
				if ($flight_booking->return_date=="") {
					
				}
				else{
					$trip_type='round';
				}
				$departure=$flight_booking->travel_date;
				$departure=date("D d M,Y", strtotime($departure));
				$class=$flight_booking->class;
				$return=$flight_booking->return_date;
				?>
				<div class="status" style="background-color:<?php echo ($flight_booking->payment_status == 1) ? "green" : "red";?>">
					<?php echo ($flight_booking->payment_status == 1) ? "Success" : "Failed";?>
				</div>
				<span class="bolder-part"><?php echo $from;?> To <?php echo $to;?></span>
				On <?php echo $departure;?> 
				<br>
				<?php 
				if ($trip_type=='round') {
					$return=date("D d M,Y", strtotime($return));
				?>
					Returning On <?php echo $return;?>
				<?php
				}
				?>
				<br>
				No of Adult:<?php echo $flight_booking->no_person;?>
				<br>
				No of Children:<?php echo $flight_booking->no_child;?>
				<br>
				No of Infant:<?php echo $flight_booking->no_infant;?>
				<hr>
				<?php 
					$complete_flight_details=$flight_booking->flight_complete_detail;
					$complete_flight_details=json_decode($complete_flight_details,true);
					$itineraries=$complete_flight_details['itineraries'];
					$departure=$itineraries[0];
					$duration=$departure['duration'];
					$departure=$departure['segments'];

				?>
				<div class="flight-listings" style="display:block">
					<?php 
					foreach ($departure as $key => $value) {
					?>
					<div class="flight-sub-info">
						<div class="flight-airline"></div>
					</div>
					<div class="time-details">
						<div class="mobile-breaker-mini">
							<div class="timing-from">
								<div class="from-time-airline">
									 <?php 
									if(array_key_exists('at', $value['departure'])){
										echo date("H:i", strtotime($value['departure']['at']));
									}
									?>
								</div>
								<div class="from-date-airline">
									<?php 
									if(array_key_exists('at', $value['departure'])){
										echo date("D d M,Y", strtotime($value['departure']['at']));
										// echo $value['departure']['at'];
									}
									?>
								</div>
								<div class="from-city">
									<?php 
									if(array_key_exists('iataCode', $value['departure'])){
										$airport=$value['departure']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
									}
									?>
									<br>
									<b>Terminal</b>:<?php if(array_key_exists('terminal', $value['departure'])){
											echo $value['departure']['terminal'];
										}
										else{
											echo "N/A";
										}
										?>
								</div>
							</div>
							<div class="flight-duration">
								<div class="flight-duration-airline">
									<?php 
									$duration=$value['duration'];
									$duration=str_replace("PT","",$duration);
									$duration=str_replace("H"," h ",$duration);
									$duration=str_replace("M"," m",$duration);
									echo $duration;
									?>
								</div>
								<div class="green-line"></div>
								(Non-stop)
							</div>
								
							<div class="timing-to">
								<div class="to-time-airline">
									 <?php 
									if(array_key_exists('at', $value['arrival'])){
										echo date("H:i", strtotime($value['arrival']['at']));
									}
									?>
								</div>
								<div class="to-date-airline">
									 <?php 
									if(array_key_exists('at', $value['arrival'])){
										echo date("D d M,Y", strtotime($value['arrival']['at']));
									}
									?>
								</div>
								<div class="to-city">
										<?php 
									if(array_key_exists('iataCode', $value['arrival'])){
										$airport=$value['arrival']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
									}
									?>
								</div>
							</div>
						</div>
						<div class="mobile-breaker-mini">
							<div class="baggage">
								<div class="bag-head">
									Baggage:
								</div>
							</div>
							<div class="baggage">
								<div class="bag-head">
									Check in:
								</div>
								<div class="bag-type">
									25 Kgs
								</div>
							</div>
							<div class="baggage">
								<div class="bag-head">
									Cabin:
								</div>
								<div class="bag-type">
									8 Kgs
								</div>
							</div>
						</div>
					</div>

					<?php }?>


				</div>

			</div>

			<?php 
			if ($trip_type=='round') {
			?>
			<h4 style="text-align: center;margin-top: 15px;">Return Trip</h4>
			<hr>
				<?php 
					$complete_flight_details=$flight_booking->flight_complete_detail;
					$complete_flight_details=json_decode($complete_flight_details,true);
					$itineraries=$complete_flight_details['itineraries'];
					$departure=$itineraries[1];
					$duration=$departure['duration'];
					$departure=$departure['segments'];

				?>
				<div class="flight-listings" style="display:block">
					<?php 
					foreach ($departure as $key => $value) {
					?>
					<div class="flight-sub-info">
						<div class="flight-airline"></div>
					</div>
					<div class="time-details">
						<div class="mobile-breaker-mini">
							<div class="timing-from">
								<div class="from-time-airline">
									 <?php 
									if(array_key_exists('at', $value['departure'])){
										echo date("H:i", strtotime($value['departure']['at']));
									}
									?>
								</div>
								<div class="from-date-airline">
									<?php 
									if(array_key_exists('at', $value['departure'])){
										echo date("D d M,Y", strtotime($value['departure']['at']));
										// echo $value['departure']['at'];
									}
									?>
								</div>
								<div class="from-city">
									<?php 
									if(array_key_exists('iataCode', $value['departure'])){
										$airport=$value['departure']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
									}
									?>
									<br>
									<b>Terminal</b>:<?php if(array_key_exists('terminal', $value['departure'])){
											echo $value['departure']['terminal'];
										}
										else{
											echo "N/A";
										}
										?>
								</div>
							</div>
							<div class="flight-duration">
								<div class="flight-duration-airline">
									<?php 
									$duration=$value['duration'];
									$duration=str_replace("PT","",$duration);
									$duration=str_replace("H"," h ",$duration);
									$duration=str_replace("M"," m",$duration);
									echo $duration;
									?>
								</div>
								<div class="green-line"></div>
								(Non-stop)
							</div>
								
							<div class="timing-to">
								<div class="to-time-airline">
									 <?php 
									if(array_key_exists('at', $value['arrival'])){
										echo date("H:i", strtotime($value['arrival']['at']));
									}
									?>
								</div>
								<div class="to-date-airline">
									 <?php 
									if(array_key_exists('at', $value['arrival'])){
										echo date("D d M,Y", strtotime($value['arrival']['at']));
									}
									?>
								</div>
								<div class="to-city">
										<?php 
									if(array_key_exists('iataCode', $value['arrival'])){
										$airport=$value['arrival']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
									}
									?>
								</div>
							</div>
						</div>
						<div class="mobile-breaker-mini">
							<div class="baggage">
								<div class="bag-head">
									Baggage:
								</div>
							</div>
							<div class="baggage">
								<div class="bag-head">
									Check in:
								</div>
								<div class="bag-type">
									25 Kgs
								</div>
							</div>
							<div class="baggage">
								<div class="bag-head">
									Cabin:
								</div>
								<div class="bag-type">
									8 Kgs
								</div>
							</div>
						</div>
					</div>

					<?php }?>


				</div>
			</div>
			<?php
			}
			?>

			<div class="flight-details-subcontainer">			
			<h4 class="bolder-heads">Passenger Details</h4>

			<?php 
			foreach ($passenger_details as $key => $value) {
			?>

				<div class="bolder-part-noblock"><span >Passenger Name: </span><?php echo $value->first_name." ".$value->last_name;?></div>
				<div class="bolder-part-noblock"><span >Identity card type: </span><?php echo $value->identity_card;?></div>
				<div class="bolder-part-noblock"><span >Identity card no. :</span><?php echo $value->identity_card_no;?></div>
				<div class="bolder-part-noblock"><span >Date of Birth: </span><?php echo  date("d M Y", strtotime($value->dob));?></div>
				
				
				<?php	
			}
			?>
			</div>

			<div class="flight-details-subcontainer">
				<h4 class="bolder-heads">Contact Details</h4>
				<div class="bolder-part-noblock"><span >First name: </span><?php echo $flight_booking->contact_first_name;?></div>
				<div class="bolder-part-noblock"><span >Last name: </span><?php echo $flight_booking->contact_last_name;?></div>
				<div class="bolder-part-noblock"><span >Email: </span><?php echo $flight_booking->contact_email;?></div>
				<div class="bolder-part-noblock"><span >Contact no. :</span><?php echo $flight_booking->contact_phone;?></div>
			</div>

			<div class="options" style="margin-top:2%;margin-bottom:1%;display:flex;justify-content:flex-end">
				<button id="updateRequest" class="btn btn-primary">Update Request</button>
				<button id="cancelBooking" class="btn btn-danger">Cancel Booking</button>
			</div>
		
			
		
				<div id="updateRequestDropdown" class="dropdown" style="display: none;margin-top:1%;margin-bottom:1%;    align-items: flex-start;">
					<select id="updateOptions" class="form-control" style="max-width:36%">
						<option value="option0">Select Reason</option>
						<option value="option1">Incorrect Name on Ticket </option>
						<option value="option2">Change in Contact Information</option>
						<option value="option3">Update Passport Information</option>
						<option value="option4">Request for Seat Upgrade</option>
						<option value="option5">Adding or Removing Passengers</option>
						<option value="option6">Changing Cabin Class</option>
						<option value="option7">Adding Special Requests (e.g., meals, wheelchair assistance)</option>
						<option value="option8">Flight Cancellation or Rescheduling</option>
						<option value="option9">Other Requests</option>
						<!-- Add more options as needed -->
					</select>
					<textarea id="updateTextarea" class="form-control" placeholder="Elaborate the reason..." style="max-width:60%;margin-left:2%"></textarea>
				</div>
		
				<div id="cancelBookingDropdown" class="dropdown" style="display: none;margin-top:1%;margin-bottom:1%;    align-items: flex-start;">
					<select id="cancelOptions" class="form-control" style="max-width:36%">
						<option value="option0">Select Reason</option>
						<option value="option1">Change in Travel Plans</option>
						<option value="option2">Personal Emergency</option>
						<option value="option3">Medical Reasons</option>
						<option value="option4">Financial Constraints</option>
						<option value="option5">Flight Schedule Change</option>
						<option value="option6">Duplicate Booking</option>
						<option value="option7">Weather Conditions</option>
						<option value="option8">Travel Restrictions</option>
						<option value="option9">Unsatisfactory Service</option>
						<option value="option10">Dissatisfaction with Booking Process</option>
						<option value="option11">Change in Travel Preferences</option>
						<option value="option12">Better Deal Elsewhere</option>
						<option value="option13">Unexpected Reason</option>
						<!-- Add more options as needed -->
					</select>
					<textarea id="cancelTextarea" class="form-control" placeholder="Elaborate the reason..." style="max-width:60%;margin-left:2%"></textarea>
				</div>
			</div>
		
		
			<script>
				document.getElementById('updateRequest').addEventListener('click', function() {
					document.getElementById('updateRequestDropdown').style.display = 'flex';
					document.getElementById('cancelBookingDropdown').style.display = 'none';
				});
		
				document.getElementById('cancelBooking').addEventListener('click', function() {
					document.getElementById('cancelBookingDropdown').style.display = 'flex';
					document.getElementById('updateRequestDropdown').style.display = 'none';
				});
			</script>
			
		</div>
	</div>



<?php $this->load->view('footer');?>