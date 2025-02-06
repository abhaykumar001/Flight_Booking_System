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
		flex-direction: row;
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
	p{
		margin-bottom:0
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
		width: 100%;
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
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script>
	$("input").intlTelInput({
		utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
	});
	function toggleDivVisibility(element){
		console.log(element)
		element.style.border="none"
		element.style.marginBottom="0"
		const parentDiv = element.parentNode

		if(parentDiv.querySelector(".flight-statement").style.display=="none"){
			parentDiv.querySelector(".flight-statement").style.display="block"
			element.style.borderBottom="1px solid grey"
			element.style.marginBottom="2%"
			parentDiv.querySelector(".flight-listings").style.display="block"
		}else{
			parentDiv.querySelector(".flight-statement").style.display="none"
			parentDiv.querySelector(".flight-listings").style.display="none"
		}
		console.log(parentdiv)
	}
	function toggleDetailsVisibility(element){
		console.log(element)
		element.style.border="none"
		element.style.marginBottom="0"
		const parentDiv = element.parentNode

		if(parentDiv.querySelector(".warning").style.display=="none"){
			parentDiv.querySelector(".warning").style.display="block"
			parentDiv.querySelector(".adult-status").style.display="block"
			element.style.borderBottom="1px solid grey"
			element.style.marginBottom="2%"
		}else{
			parentDiv.querySelector(".warning").style.display="none"
			parentDiv.querySelector(".adult-status").style.display="none"
		}
		console.log(parentdiv)
	}
	function togglePriceVisibility(element){
		console.log(element)
		element.style.border="none"
		const parentDiv = element.parentNode
		element.style.marginBottom="0"
		if(parentDiv.querySelector(".fare-sub-entry").style.display=="none"){
			const allelems = parentDiv.querySelectorAll(".fare-sub-entry")
			allelems[0].style.display="flex"
			allelems[1].style.display="flex"
			element.style.borderBottom="1px solid grey"
			element.style.marginBottom="2%"
			parentDiv.querySelector(".final-fare-sub-entry").style.display="flex"
		}else{
			parentDiv.querySelector(".final-fare-sub-entry").style.display="none"
			const allelems = parentDiv.querySelectorAll(".fare-sub-entry")
			allelems[0].style.display="none"
			allelems[1].style.display="none"
		}
		console.log(parentdiv)
	}
</script>
<div class="mt-5 pb-1 " id="booking-details-header">
	<div class="text-3xl font-bold">Complete your booking</div>
</div>
<form method="post" action="<?php echo base_url();?>Home/booking_create">
<div class="fares-details-main">
	<div class="flight-main-booking">
			<div class="flight-details-subcontainer shadow-2xl bg-gray-200">
				<div class="flight-details-div" onclick="toggleDivVisibility(this)">
					<div class="bolder-part bg-blue-200 flex flex-auto px-2 py-3 rounded-lg" style = "display:inline;font-size:larger">
						1) Flight Details					
					</div>
					<i class="fa fa-caret-down fa-2x" style="margin-right:2%;color:#0068ef"aria-hidden="true"></i>
				</div>
				<div class="flight-statement" display>
				<?php 
				$from=$this->session->userdata('from');
				$to=$this->session->userdata('to');
				$trip_type=$this->session->userdata('trip_type');
				$departure=$this->session->userdata('departure');
				$departure=date("D d M,Y", strtotime($departure));
				$class=$this->session->userdata('class');
				$return=$this->session->userdata('return');
				?>
				<span class="bolder-part"><?php echo $from;?> To <?php echo $to;?></span>
				 On <?php echo $departure;?> 
				<?php 
				if ($return!='') {
					$return=date("D d M,Y", strtotime($return));
				?>
					Returning On <?php echo $return;?>
				<?php
				}
				?>
				<!-- </div> -->
				<div class="flight-listings" style="display:block">
					<div class="flight-sub-info">
						<?php 
						if (array_key_exists('carrierCode',$data['itineraries'][0]['segments'][0])) {
						$code=$data['itineraries'][0]['segments'][0]['carrierCode'];
					}
					else{
						$code=$data['itineraries'][0]['segments'][0]['operating']['carrierCode'];
					}
						$airline=$dictionary['carriers'][$code];
						?>
						<div class="flight-airline"><?php echo $airline;?></div>
					</div>
					<div class="">
						<div class="flex flex-row w-auto gap-6 md:gap-16">
							<div class="timing-from">
								<div class="from-time-airline">
									<?php  $departure=explode("T",$data['itineraries'][0]['segments'][0]['departure']['at']);?>
									<?php echo date('h:i a',strtotime($departure[1]));?>
								</div>
								<div class="from-date-airline">
									<?php echo date('D M d',strtotime($departure[0]));?>
								</div>
								<!--<div class="terminal">
									Terminal 3
								</div> -->
								<div class="from-city">
									<?php 
										$airport=$data['itineraries'][0]['segments'][0]['departure']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
										?>
								</div>
							</div>
							<div class="flight-duration">
								<div class="flight-duration-airline">
									<?php 
										$duration=$data['itineraries'][0]['duration'];
										$duration=str_replace("PT","",$duration);
										$duration=str_replace("H"," h ",$duration);
										$duration=str_replace("M"," m",$duration);
									?>
									<?php echo $duration;?>
								</div>
								<div class="green-line"></div>
								<?php 

								$stops=count(array_keys($data['itineraries'][0]['segments']));
								$stops=$stops - 1;
								if ($stops==0) {
								?>
								(Non-stop)
								<?php
								}
								?>
							
							</div>
								<?php 
									$count=count($data['itineraries'][0]['segments']);
									$count=$count - 1;
								?>
								<?php  $arrival=explode("T",$data['itineraries'][0]['segments'][$count]['arrival']['at']);?>
							<div class="timing-to">
										<div class="to-time-airline">
											<?php echo date('h:i a',strtotime($arrival[1]));?>
								</div>
								<div class="to-date-airline">
									<?php echo date('D M d',strtotime($arrival[0]));?>
								</div>
								<div class="to-city">
									<?php 
									$airport=$data['itineraries'][0]['segments'][$count]['arrival']['iataCode'];
									$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
									$airport_query=$airport_query->result();
									$airport_query=$airport_query[0];
									echo $airport_query->airport_name;
									echo "<br>";
									echo $airport_query->city;
									?>
								</div>
								</div>
								<div class="hidden md:block">
									<div class="flex flex-row gap-10">	
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
					</div>
					<!-- mobile -->
						<div class="block md:hidden">
								<div class="pt-3 flex flex-row gap-16 bg-blue-100 rounded-md px-2 py-1">
										
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
			</div>
					
					<?php 
					if ($return!='') {
					
					?>
					<div class="flight-sub-info">
						<?php 
						if (array_key_exists('carrierCode',$data['itineraries'][1]['segments'][0])) {
						$code=$data['itineraries'][1]['segments'][0]['carrierCode'];
					}
					else{
						$code=$data['itineraries'][1]['segments'][0]['operating']['carrierCode'];
					}
						$airline=$dictionary['carriers'][$code];
						?>
						<div class="flight-airline"><?php echo $airline;?></div>
					</div>
					<div class="">
						<div class="flex flex-row w-auto gap-6 md:gap-16">
							<div class="timing-from">
								<div class="from-time-airline">
									<?php  $departure=explode("T",$data['itineraries'][1]['segments'][0]['departure']['at']);?>
									<?php echo date('h:i a',strtotime($departure[1]));?>
								</div>
								<div class="from-date-airline">
									<?php echo date('D M d',strtotime($departure[0]));?>
								</div>
								<!--<div class="terminal">
									Terminal 3
								</div> -->
								<div class="from-city">
									<?php 
										$airport=$data['itineraries'][1]['segments'][0]['departure']['iataCode'];
										$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
										$airport_query=$airport_query->result();
										$airport_query=$airport_query[0];
										echo $airport_query->airport_name;
										echo "<br>";
										echo $airport_query->city;
										?>
								</div>
							</div>
							<div class="flight-duration">
								<div class="flight-duration-airline">
									<?php 
										$duration=$data['itineraries'][1]['duration'];
										$duration=str_replace("PT","",$duration);
										$duration=str_replace("H"," h ",$duration);
										$duration=str_replace("M"," m",$duration);
									?>
									<?php echo $duration;?>
								</div>
								<div class="green-line"></div>
								<?php 

								$stops=count(array_keys($data['itineraries'][1]['segments']));
								$stops=$stops - 1;
								if ($stops==0) {
								?>
								(Non-stop)
								<?php
								}
								?>
							
							</div>
								<?php 
									$count=count($data['itineraries'][1]['segments']);
									$count=$count - 1;
								?>
								<?php  $arrival=explode("T",$data['itineraries'][1]['segments'][$count]['arrival']['at']);?>
							<div class="timing-to">
										<div class="to-time-airline">
											<?php echo date('h:i a',strtotime($arrival[1]));?>
								</div>
								<div class="to-date-airline">
									<?php echo date('D M d',strtotime($arrival[0]));?>
								</div>
								<div class="to-city">
									<?php 
									$airport=$data['itineraries'][1]['segments'][$count]['arrival']['iataCode'];
									$airport_query=$this->db->query("SELECT * FROM airports WHERE airport_code='$airport'");
									$airport_query=$airport_query->result();
									$airport_query=$airport_query[0];
									echo $airport_query->airport_name;
									echo "<br>";
									echo $airport_query->city;
									?>
								</div>
								</div>
								<div class="hidden md:block">
									<div class="flex flex-row gap-10">	
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
					</div>
					<!-- mobile -->
						<div class="block md:hidden">
								<div class="pt-3 flex flex-row gap-16 bg-blue-100 rounded-md px-2 py-1">
										
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
			</div>
					<?php

					}

					?>
		</div>
		<div class="flight-details-subcontainer">
				<div class="flight-details-div" onclick="togglePriceVisibility(this)">
					<div class="bolder-part bg-blue-200 flex flex-auto px-2 py-3 rounded-lg" style = "display:inline;font-size:larger">
						2) Fare Summary					
					</div>
					<i class="fa fa-caret-down fa-2x" style="margin-right:2%;color:#0068ef"aria-hidden="true"></i>
				</div>
			<div class="final-fare-sub-entry" style="display:flex">
				<div class="fare-sub-type">
					Total Amount&nbsp;&nbsp;
				</div>
				<div class="fare-sub-fare">
					$<?php echo $controller->rate($code,$data['price']['total']) * $this->session->userdata('no_passengers');?>
				</div>		
			</div>	
		</div>
		<div class="traveller-details">
				<div class="flight-details-div" onclick="toggleDetailsVisibility(this)">
					<div class="bolder-part bg-blue-200 flex flex-auto px-2 py-3 rounded-lg" style = "display:inline;font-size:larger">
						3) Traveller Details					
					</div>
					<i class="fa fa-caret-down fa-2x" style="margin-right:2%;color:#0068ef"aria-hidden="true"></i>
				</div>
				<div class="warning" style="display:block">
					Important: Enter name as mentioned on your passport or Government approved IDs.
				</div>
				<div class="adult-status" style="display:block">
				<!-- <div class="no-adult">
					No Adults added.
				</div> -->
					<?php 
					$no_of_passengers=$this->session->userdata('no_passengers');
					$i=1;
					while ($i<=$no_of_passengers) {
					?>
					<div style="margin-bottom:2%;">
						<b>Details of Passenger <?php echo $i;?></b>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">First Name<sup style="color:red;">*</sup></label>
								<input type="text" class="form-control bg-gray-100" id="inputName1" placeholder="First Name" name="first_name_<?php echo $i;?>" style="width:80%;" required>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Middle Name</label>
								<input type="text" class="form-control bg-gray-100" id="inputName2" placeholder="Middle Name" name="middle_name_<?php echo $i;?>" style="width:80%;">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Last Name <sup style="color:red;">*</sup></label>
								<input type="text" class="form-control bg-gray-100" id="inputName3" placeholder="Last Name" name="last_name_<?php echo $i;?>" style="width:80%;" required>
							</div>
						</div>
					<!-- 	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Id Type <sup style="color:red;">*</sup></label>
								<select class="form-control" name="id_type_<?php echo $i;?>" id="id_type_<?php echo $i;?>" style="width:80%;">
									<option value="">Select</option>
									<option value="Passport">Passport</option>
									<option value="Driving License">Driving License</option>
								</select>
							</div>
						</div> -->
						<!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Id Number<sup style="color:red;">*</sup></label>
								<input type="text" class="form-control" placeholder="Id Number" name="id_number_<?php echo $i;?>" style="width:80%;" id="id_number_<?php echo $i;?>"  oninput="verify_id_number('<?php echo $i;?>')" >
								<span style="color:red;display: none;" id="error_<?php echo $i;?>">Enter a valid id number</span>
							</div>
						</div> -->
						
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Birth Year <sup style="color:red;">*</sup></label>
								<select id="year" name="year_<?php echo $i;?>" class="form-control bg-gray-100" style="width:80%;" required>
										<option value="">Select</option>
										<?php 
										$year=date('Y');
										$year_100=$year - 100;
										while($year>$year_100){
										?>
										<option value="<?php echo $year;?>" ><?php echo $year;?></option>
										<?php
											$year--;
										}
										?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Birth Month <sup style="color:red;">*</sup></label>
								<select class="form-control bg-gray-100" name="birth-month_<?php echo $i;?>" style="width:80%;" required>
									<option value="">Select</option>
									<option value="01">January</option>
									<option value="02">February</option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Birth Day <sup style="color:red;">*</sup></label>
								<select class="form-control bg-gray-100" id="birth-day" name="birth-day_<?php echo $i;?>" style="width:80%;" required>
									<option value="">Select</option>
									<?php for($day = 1; $day <= 31; $day++){ ?>
									<option value="<?php if($day<10){echo "0";} echo $day; ?>"><?php if($day<10){echo "0";}  echo $day; ?></option>
									<?php } ?>
		        		</select>
		    			</div>
		    		</div>
		    		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="inputEmail4">Gender <sup style="color:red;">*</sup></label>
								<select class="form-control bg-gray-100" id="gender" name="gender_<?php echo $i;?>" style="width:80%;" required>
									<option value="">Select</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="others">Others</option>
		        		</select>
		    			</div>
		    		</div>
		    		<!-- <script>
		    			$(document).ready(function() {
		    				$('select[name="birth-month_<?php echo $i;?>"]').change(function() {
		    					var monthname = $(this).val();
		    					var yr = $('select[name="year_<?php echo $i;?>"]').val();
		    					const month = new Date(Date.parse(monthname + " 1, " + yr)).getMonth() + 1;
		    					var daysInMonth = new Date(yr, month,0).getDate();
		    					var options = '<option value="">Select</option>';
		    					for(var day = 1; day <= daysInMonth; day++) {
		    						if (day<10) {
		                	options += '<option value="0' + day + '">0' + day + '</option>';
		            		}
		            		else{
		                	options += '<option value="' + day + '">' + day + '</option>';
		            		}
			            }
			            $('#birth-day').html(options);
		        		});
		    				$('#year').change(function() {
			            var monthname = $(this).val();
			            var yr = parseInt($('select[name="year"]').val());
			            const month = new Date(Date.parse(monthname + " 1, " + yr)).getMonth() + 1;
			            var daysInMonth = new Date(yr, month,0).getDate();
			            var options = '<option value="">Select</option>';
			            for(var day = 1; day <= daysInMonth; day++) {
			            		if (day<10) {
			                	options += '<option value="0' + day + '">0' + day + '</option>';
			            		}
			            		else{
			                	options += '<option value="' + day + '">' + day + '</option>';
			            		}
			            }
			            $('#birth-day').html(options);
		        		});
		    			});
					</script> -->
				</div>
				<br>
					<?php 
					$i++;
					}
					?>
			</div>
			<script type="text/javascript">
				function verify_id_number(ids) {
					var validated=0;
					// alert(ids);
					var id_type=$("#id_type_"+ids).val();
					// alert(id_type);
					if (id_type=='') {
						alert("Please select id type");
						$("#id_number_"+ids).val("");
					}
					else{
						var id_num=$("#id_number_"+ids).val();
						// alert(id_num);
						if (id_type=='Passport') {
							var regex = /^[A-Za-z]\d{8}$/;

						}
						else{
								validated=1;		

						}
							var verify=regex.test(id_num);
							if (verify==true) {
								validated=1;		
							}
					}


							// alert(validated);
					if (validated==1) {
						document.getElementById("submit-form-details").disabled = false;
						// alert("#error_"+ids);
						$("#error_"+ids).hide();
					}
					else{
						document.getElementById("submit-form-details").disabled = true;
						$("#error_"+ids).show();
					}
				}
				function checkStringFormat(str) {
				    
				}
			</script>
		</div>
		<div class="traveller-details">
			<div class="flight-details-div">
				<div class="bolder-part bg-blue-200 flex flex-auto px-2 py-3 rounded-lg" style = "display:inline;font-size:larger">
					4) Your Contact details		
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Email <sup style="color:red;">*</sup></label>
				<div class="col-sm-10">
					<input type="text" class="form-control bg-gray-100" name="contact_email" id="staticEmail" placeholder="Email Address" required>
				</div>
			</div>
			<div class="form-group row" style="margin-top:2%">
				<label for="inputPhone" class="col-sm-2 col-form-label">Phone No</label>
				<div class="col-sm-10">
				<input type="text" id="inputPhone" name="contact_phone" class="form-control bg-gray-100"  placeholder="Enter your Phone number" required>
				</div>
			</div>
			<div class="form-group row" style="margin-top:2%">
				<label for="inputPhone" class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
				<input type="text" id="inputPhone" name="contact_first_name" class="form-control bg-gray-100"  placeholder="Enter Your First Name" required>
				</div>
			</div>
			
			<div class="form-group row" style="margin-top:2%">
				<label for="inputPhone" class="col-sm-2 col-form-label">Last Name</label>
				<div class="col-sm-10">
				<input type="text" id="inputPhone" name="contact_last_name" class="form-control bg-gray-100"  placeholder="Enter Your Last Name" required>
				</div>
			</div>
			<button id="submit-form-details" class="btn btn-primary w-100 mt-2" style="max-width:92.5%">Proceed To Pay</button>
		</div>
	</div>
</div>
</form>
<br><br>
<style>
        /* Disable scrollbar for number input */
        input[type=number] {
            overflow: hidden;
        }
</style>
</div>
<?php $this->load->view('footer');?>


