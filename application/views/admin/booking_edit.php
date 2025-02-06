<?php $this->load->view('admin/header');?>
<style>
    .uniform-select {
        height: 2rem; /* Adjust as needed */
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border: 1px solid;
        border-radius: 0.25rem;
        box-sizing: border-box;
    }
    .uniform-input {
        height: 2rem; /* Adjust as needed */
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border: 1px solid;
        border-radius: 0.25rem;
        box-sizing: border-box;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .ml-1 {
        margin-left: 0.25rem;
    }
    .mt-2 {
        margin-top: 0.5rem;
    }
    .p-1 {
        padding: 0.25rem;
    }
    .mt-1 {
        margin-top: 0.25rem;
    }
    .col-lg-3, .col-md-3, .col-lg-2, .col-md-2, .col-sm-12, .col-xs-12 {
        padding-right: 15px;
        padding-left: 15px;
        position: relative;
        width: 100%;
    }
    @media (min-width: 576px) {
        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
    @media (min-width: 768px) {
        .col-md-2 {
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }
        .col-md-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }
    @media (min-width: 992px) {
        .col-lg-2 {
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }
        .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }
</style>

<h4>Update Invoice</h4>
<form action="<?php echo base_url();?>Admin/booking_update" method="post">
<div class="mt-1 p-2" style="border:2px solid blue;">

    <div class="">
        <h6>Booking Details</h6>
    </div>
    <div class="row ml-1">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            Journey Details <br>
            <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">

            <select class="uniform-select" required>
                <option value="Round" <?php if($flight_booking->return_trip==1){echo "selected";}?>>Round</option>    
                <option value="One Way" <?php if($flight_booking->return_trip!=1){echo "selected";}?> >One Way</option>    
            </select>

        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            From <input type="text" name="from" class="uniform-input" value="<?php echo $flight_booking->from_airport;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            To <input type="text" name="to" class="uniform-input" value="<?php echo $flight_booking->to_airport;?>" required>
        </div>
        
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            DepartDate <input type="date" name="departure_date" class="uniform-input"  value="<?php echo $flight_booking->travel_date;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            ReturnDate <input type="date" name="return_date"  value="<?php echo $flight_booking->return_date;?>" class="uniform-input">
        </div>
    </div>
    <div class="row ml-1 mt-2">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            Booking Status <br>
            <select name="booking_status" id="booking_status" class="uniform-select" required>
                <option value="">Status</option>
                <option value="TICKED">Ticked</option>
                <option value="TICKETORDERED">Ticket Ordered</option>
                <option value="REFUNDORDERED">Refund Ordered</option>
                <option value="DOCUMENTSSEND">Documents Send</option>
                <option value="SEATNOTCONFIRM">Seat Not Confirm</option>
                <option value="CONFIRM">Confirm</option>
                <option value="CANCEL">Cancel</option>
                <option value="Pending">Pending</option>
            </select>
            <script type="text/javascript">
            	$("#booking_status").val('<?php if($flight_booking->booking_status!=''){echo $flight_booking->booking_status;}else{echo "Pending";}?>');
            </script>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            PNR <input type="text" name="pnr" class="uniform-input" value="<?php echo $flight_booking->pnr_no;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Source From:
            <select name="booking_source" id="booking_source" class="uniform-select" required>
                <option value="">Select Source</option>
                <option value="Online">Online</option>
                <option value="Phone booking">Phone booking</option>
                <option value="Kayak">Kayak</option>
                <option value="Jetcost USA">Jetcost USA </option>
                <option value="Jetcost Canada">Jetcost Canada</option>
                <option value="Google Booking">Google Booking</option>
            </select>
             <script type="text/javascript">
                
            	$("#booking_source").val('<?php if($flight_booking->booking_source!=''){echo $flight_booking->booking_source;}else{echo "Online";}?>');
            </script>
        </div>
    </div>
</div>



<div class="mt-2 p-2" style="border:2px solid blue;">

    <div class="">
        <h6>Contact Details</h6>
    </div>
    <div class="row ml-1">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            First Name<input type="text" name="contact_first_name" class="uniform-input" value="<?php echo $flight_booking->contact_first_name;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Last Name<input type="text" name="contact_last_name" class="uniform-input" value="<?php echo $flight_booking->contact_last_name;?>" required>

        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Mobile No<input type="text" name="mobile_no" class="uniform-input" value="<?php echo $flight_booking->contact_phone;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Email<input type="email" name="email" class="uniform-input" value="<?php echo $flight_booking->contact_email;?>" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Address<textarea name="textarea" class="uniform-textarea" required><?php echo $flight_booking->contact_address;?></textarea>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            City<input type="text" name="city" class="uniform-input" value="<?php echo $flight_booking->city;?>" required>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            State<br>
            <input type="text" name="state1" id="state1" class="uniform-input">
            <select name="state2" style="display: none;" id="state2" class="uniform-select">
                <option value="">Select</option>
                <?php 
                $states = $this->db->query("SELECT * FROM states");
                $states = $states->result();
                foreach ($states as $key => $value) {
                ?>
                <option value="<?php echo $value->state; ?>"><?php echo $value->state; ?></option>
                <?php
                }
                ?>
            </select>
            <input type="hidden" name="state">
        </div>
<!--     </div>
    
    <div class="row ml-1"> -->
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Country
            <select name="country" class="uniform-select" id="country" required>
                <option value="">Select</option>
                <?php 
                $country = $this->db->query("SELECT * FROM country");
                $country = $country->result();
                foreach ($country as $key => $value) {
                ?>
                <option value="<?php echo $value->country_name; ?>"><?php echo $value->country_name; ?></option>
                <?php
                }
                ?>
            </select>

            <script>
            	$("#country").val("<?php echo $flight_booking->country;?>");
            	if("<?php echo $flight_booking->country;?>"=="United States"){
            		$("#state2").val("<?php echo $flight_booking->state;?>");
            	}
            	else{
            		$("#state").val("<?php echo $flight_booking->state;?>");
            	}
            	var country=$("#country").val();
	    		if (country=='United States') {
	    			var state=$("#state2").val();
	                $("#state2").show();
	                $("#state1").hide();
	    		}
	    		else{
	    			var state=$("#state1").val();
	                $("#state2").hide();
	                $("#state1").show();
	    		}
            </script>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Pincode<input type="text" name="pincode" class="uniform-input" value="<?php echo $flight_booking->pincode;?>" required>
        </div>
    </div>
</div>

<!-- Passenger Div -->
<div class="mt-2" style="border:2px solid blue; padding: 10px; width: 100%; box-sizing: border-box;">

    <div class="">
        <h6>Passenger Details</h6>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button type="button" onclick="add_passenger()">Add Passenger</button>
        <button type="button" onclick="remove_passenger()">Remove Passenger</button>
        <input type="hidden" name="passenger_count" id="passenger_count" value="<?php echo $flight_booking->no_person + $flight_booking->no_child + $flight_booking->no_infant;?>">
    </div>
    <table id="passenger_div" style="width: 100%; border-collapse: separate; border-spacing: 0 10px; table-layout: fixed;">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 10%;">Type</th>
                <th style="width: 10%;">Title</th>
                <th style="width: 20%;">Name</th>
                <th style="width: 10%;">Gender</th>
                <th style="width: 10%;">Dob</th>
                <th style="width: 10%;">TicketNo</th>
                <th style="width: 15%;">Passport</th>
                <th style="width: 15%;">Date</th>
                <th style="width: 15%;">Nationality</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$count=1;
        	foreach ($passenger_details as $key => $value) {
        	?>
            <tr id="passenger_<?php echo $count;?>">
                <td><span><?php echo $count;?></span></td>
                <td>
                    <select name="passenger_type_<?php echo $count;?>" style="width: 100%;" id="passenger_type_<?php echo $count;?>" required>
                        <option value="">PaxType</option>
                        <option value="Adult">Adult</option>
                        <option value="Child">Child</option>
                        <option value="Infant">Infant</option>
                    </select>
                    <script type="text/javascript">
                    	$("#passenger_type_<?php echo $count;?>").val('<?php echo $value->pax_type;?>');
                    </script>
                </td>
                <td>
                    <select name="title_<?php echo $count;?>" id="title_<?php echo $count;?>" style="width: 100%;" required>
                        <option value="">Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Master">Master</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <script type="text/javascript">
                    	$("#title_<?php echo $count;?>").val('<?php echo $value->title;?>');
                    </script>
                </td>
                <td>
                    <input type="text" name="first_name_<?php echo $count;?>" placeholder="FirstName" style="width: 48%;" required value="<?php echo $value->first_name;?>">
                    <input type="text" name="last_name_<?php echo $count;?>" placeholder="LastName" style="width: 48%;" value="<?php echo $value->last_name;?>" required>
                </td>
                <td>
                    <select name="gender_<?php echo $count;?>" id="gender_<?php echo $count;?>" style="width: 100%;" required>
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                     <script type="text/javascript">
                        // alert('<?php echo $value->gender;?>');
                    	$("#gender_<?php echo $count;?>").val('<?php echo $value->gender;?>');
                    </script>
                </td>
                <td>
                    <input type="date" name="dob_<?php echo $count;?>" style="width: 100%;" required value="<?php echo $value->dob;?>">
                </td>
                <td>
                    <input type="text" name="ticket_no_<?php echo $count;?>" style="width: 100%;" required value="<?php echo $value->ticket_no;?>">
                </td>
                <td>
                    <input type="text" name="passport_no_<?php echo $count;?>" placeholder="PassportNo" style="width: 48%;" required value="<?php echo $value->identity_card_no;?>">
                    <input type="text" name="place_<?php echo $count;?>" placeholder="Place" style="width: 48%;" value="<?php echo $value->passport_place;?>" required>
                </td>
                <td>
                    <input type="date" name="issue_date_<?php echo $count;?>" placeholder="Issue Date" style="width: 48%;" required value="<?php echo $value->issue_date;?>">
                    <input type="date" name="expiry_date_<?php echo $count;?>" placeholder="Expiry" style="width: 48%;" required value="<?php echo $value->expiry_date;?>">
                </td>
                <td>
                    <input type="text" name="nationality_<?php echo $count;?>" style="width: 100%;" value="<?php echo $value->nationality;?>" required>
                </td>
            </tr>
        	<?php
        	$count++;	
        	}?>
        </tbody>
    </table>

</div>

<!-- Flight Div -->
<div class="mt-2" style="border:2px solid blue; padding: 10px; width: 100%; box-sizing: border-box;">
	<div class="">
		<h6>Flight Details</h6>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="button" onclick="add_flight()">Add</button>
			<button type="button" onclick="remove_flight()">Remove</button>
		</div>
	</div>
    <?php
        if ($flight_booking->flight_complete_detail!='') {    
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h6>Flight Selected by Customer</h6>
        <table border="1">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>From</th>
                    <th>Departure</th>
                    <th>To</th>
                    <th>Arrival</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                
        <?php
        $i=1;
            $flight_details_online=json_decode($flight_booking->flight_complete_detail,true);
            $flight_details_online=$flight_details_online['itineraries'];
            $departure=$flight_details_online[0];
            $duration=$departure['duration'];
            $departure=$departure['segments'];
            foreach ($departure as $key => $value) {
            
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['departure']['iataCode'];?></td>
                    <td><?php echo str_replace("T","<br>",$value['departure']['at']);?></td>
                    <td><?php echo $value['arrival']['iataCode'];?></td>
                    <td><?php echo str_replace("T","<br>",$value['arrival']['at']);?></td>
                    <td>
                        <?php
                        $duration_1=$value['duration'];
                        $duration_1=str_replace("PT","",$duration_1);
                        $duration_1=str_replace("H"," Hrs ",$duration_1);
                        $duration_1=str_replace("M"," Mins",$duration_1);
                        echo $duration_1;
                        ?>
                    </td>
                </tr>
            <?php
            $i++;
            }
            ?>
            <tr>
                <td colspan="6" style="text-align: center;">Returning Flights</td>
            </tr>
            <?php
            if (array_key_exists(1,$flight_details_online)) {
                $return=$flight_details_online[1];
                $return_duration=$return['duration'];
                $return=$return['segments'];
                foreach ($return as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['departure']['iataCode'];?></td>
                    <td><?php echo str_replace("T","<br>",$value['departure']['at']);?></td>
                    <td><?php echo $value['arrival']['iataCode'];?></td>
                    <td><?php echo str_replace("T","<br>",$value['arrival']['at']);?></td>
                    <td>
                        <?php
                        $duration_1=$value['duration'];
                        $duration_1=str_replace("PT","",$duration_1);
                        $duration_1=str_replace("H"," Hrs ",$duration_1);
                        $duration_1=str_replace("M"," Mins",$duration_1);
                        echo $duration_1;
                        ?>
                    </td>
                </tr>
                <?php
                $i++;
                }
            }
        ?>
            </tbody>
        </table>
    </div>
        <?php
        }
        ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<input type="hidden" name="flight_count" id="flight_count" value="<?php echo $flight_count;?>">
		<table id="flight_details" style="width: 100%; border-collapse: separate; border-spacing: 0 10px; table-layout: fixed;">
			<thead>
				<tr>
					<th style="width: 10%;">From:</th>
					<th style="width: 10%;">To:</th>
					<th style="width: 10%;">Depart Date</th>
					<th style="width: 10%;">Depart Time</th>
					<th style="width: 10%;">Arrival Date</th>
					<th style="width: 10%;">Arrival Time</th>
					<th style="width: 10%;">Airline</th>
					<th style="width: 10%;">Flight No</th>
					<th style="width: 10%;">Class</th>
					<th style="width: 10%;">Total Time</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$count=1;
				foreach ($flight_details as $key => $value) {
				?>
				<tr id="flight_1">
					<td><input type="text" name="from_<?php echo $count;?>" placeholder="FROM" style="width: 100%;" value="<?php echo $value->from_code;?>" required></td>
					<td><input type="text" name="to_<?php echo $count;?>" placeholder="TO" style="width: 100%;" value="<?php echo $value->to_code;?>" required></td>
					<td><input type="date" name="depart_date_<?php echo $count;?>" placeholder="Depart Date" style="width: 100%;" value="<?php echo $value->depart_date;?>" required></td>
					<td><input type="text" name="depart_time_<?php echo $count;?>" placeholder="Depart Time" style="width: 100%;" value="<?php echo $value->depart_time;?>" required></td>
					<td><input type="date" name="arrival_date_<?php echo $count;?>" placeholder="Arrival Date" style="width: 100%;" value="<?php echo $value->arrive_date;?>" required></td>
					<td><input type="text" name="arrival_time_<?php echo $count;?>" placeholder="Arrival Time" style="width: 100%;" value="<?php echo $value->arrive_time;?>" required></td>
					<td><input type="text" name="airlines_<?php echo $count;?>" value="<?php echo $value->airline;?>" placeholder="Airlines" style="width: 100%;" required></td>
					<td><input type="text" name="flight_no_<?php echo $count;?>" value="<?php echo $value->flight_no;?>" placeholder="Flight No" style="width: 100%;" required></td>
					<td>
						<select name="class_<?php echo $count;?>" style="width: 100%;" id="class_<?php echo $count;?>" required>
							<option value="Economy">Economy</option>
							<option value="Premium Economy">Premium Economy</option>
							<option value="Business Class">Business Class</option>
							<option value="First Class">First Class</option>							
						</select>
						<script type="text/javascript">
                    	$("#class_<?php echo $count;?>").val('<?php echo $value->class;?>');
                    	</script>
					</td>
					<td><input type="text" name="total_time_<?php echo $count;?>" placeholder="Total Time" style="width: 100%;" value="<?php echo $value->total_time;?>" required></td>
				</tr>
				<?php
				$count++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Card Div -->
<div class="mt-2" style="border:2px solid blue; padding: 10px; width: 100%; box-sizing: border-box;">
    <div class="">
        <h6>Card Details</h6>
        <button type="button" onclick="add_card()">Add</button>
        <button type="button" onclick="remove_card()">Remove</button>
        <input type="hidden" name="card_count" id="card_count" value="<?php echo $payment_method_count;?>">
    </div>
    <table id="card_div" style="width: 100%; border-collapse: separate; border-spacing: 0 10px; table-layout: fixed;">
        <thead>
            <tr>
                <th style="width: 10%;">Paymode</th>
                <th style="width: 10%;">Card Type</th>
                <th style="width: 10%;">CardNo</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 5%;">CVC</th>
                <th style="width: 10%;">Expiry</th>
                <th style="width: 10%;">Issue</th>
                <th style="width: 10%;">Amount</th>
                <th style="width: 10%;">Taxes</th>
                <th style="width: 10%;">Total Amount</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($payment_method as $key => $value) {
        	?>
            <tr id="card_<?php echo $count;?>">
                <td>
                    <select name="payment_method_<?php echo $count;?>" id="payment_method_<?php echo $count;?>"  style="width: 100%;" required>
                        <option value="">PayMode</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Online Pay">Online Pay</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Credit Card">Credit Card</option>
                    </select>
 					<script type="text/javascript">
                    	$("#payment_method_<?php echo $count;?>").val('<?php echo $value->paymode;?>');
                    </script>
                </td>
                <td>
                    <select name="card_type_<?php echo $count;?>" id="card_type_<?php echo $count;?>" style="width: 100%;" required>
                        <option value="">Card Type</option>
                        <option value="Visa">Visa</option>
                        <option value="Master">Master</option>
                        <option value="Amex">Amex</option>
                        <option value="Switch">Switch</option>
                        <option value="SOLO">SOLO</option>
                    </select>
                    <script type="text/javascript">
                    	$("#card_type_<?php echo $count;?>").val('<?php echo $value->card_type;?>');
                    </script>
                </td>
                <td>
                    <input type="text" name="card_no_<?php echo $count;?>" placeholder="CardNo" value="<?php echo $value->card_no;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="cardholder_name_<?php echo $count;?>" placeholder="CardholderName" style="width: 100%;" value="<?php echo $value->card_holder_name;?>" required>
                </td>
                <td>
                    <input type="text" name="cvc_<?php echo $count;?>" placeholder="CVC" value="<?php echo $value->cvc;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="expiry_<?php echo $count;?>" placeholder="MM/YYYY" value="<?php echo $value->expiry;?>"  style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="card_issue_date_<?php echo $count;?>" placeholder="MM/YYYY"  value="<?php echo $value->issue;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="amount_<?php echo $count;?>" placeholder="Amount"  value="<?php echo $value->amount;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="taxes_<?php echo $count;?>" placeholder="Taxes"  value="<?php echo $value->taxes;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="total_amount_<?php echo $count;?>"  value="<?php echo $value->total_amount;?>" placeholder="Total Amount" style="width: 100%;" required>
                </td>
                <td>
                    <select name="status_<?php echo $count;?>" id="status_<?php echo $count;?>" style="width: 100%;" required>
                        <option value="">Status</option>
                        <option value="Paid in full">Paid in full</option>
                        <option value="Deposit">Deposit</option>
                        <option value="Refunded">Refunded</option>
                        <option value="Pending">Pending</option>
                        <option value="Card Declined">Card Declined</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                     <script type="text/javascript">
                    	$("#status_<?php echo $count;?>").val('<?php echo $value->status;?>');
                    </script>
                </td>
            </tr>
        	<?php
        	$count++;
        	}
        	?>
        </tbody>
    </table>
</div>

<!-- Passenger Div -->
<div class="mt-2" style="border:2px solid blue; padding: 10px; width: 100%; box-sizing: border-box;">
    <div class="">
        <h6>Payment Details</h6>
        <button type="button" onclick="add_payment()">Add</button>
        <button type="button" onclick="remove_payment()">Remove</button>
        <input type="hidden" name="payment_count" id="payment_count" value="<?php echo $payment_details_count;?>">
    </div>
    <table id="payment_div" style="width: 100%; border-collapse: separate; border-spacing: 0 10px; table-layout: fixed;">
        <thead>
            <tr>
                <th style="width: 8%;">Supplier</th>
                <th style="width: 8%;">PaxType</th>
                <th style="width: 6%;">NoOfPax</th>
                <th style="width: 8%;">BaseFare</th>
                <th style="width: 8%;">Tax</th>
                <th style="width: 8%;">Total</th>
                <th style="width: 8%; border-left:1px solid black;">BaseFare</th>
                <th style="width: 8%;">Tax</th>
                <th style="width: 8%;">IssuanceFee</th>
                <th style="width: 8%;">AdminFee</th>
                <th style="width: 8%;">Admin2Fee</th>
                <th style="width: 8%;">CardFee</th>
                <th style="width: 8%;">Total</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($payment_details as $key => $value) {
        	?>
            <tr id="payment_<?php echo $count;?>">
                <td>
                    <input type="text" name="payment_supplier_1" style="width: 100%;" value="<?php echo $value->supplier;?>" required>
                </td>
                <td>
                    <select name="payment_passenger_type_<?php echo $count;?>" id="payment_passenger_type_<?php echo $count;?>" style="width: 100%;" required>
                        <option value="">PaxType</option>
                        <option value="Adult">Adult</option>
                        <option value="Child">Child</option>
                        <option value="Infant">Infant</option>
                    </select>
                    <script type="text/javascript">
                    	$("#payment_passenger_type_<?php echo $count;?>").val('<?php echo $value->pax_type;?>');
                    </script>
                </td>
                <td>
                    <input type="number" name="no_pax_<?php echo $count;?>" id="no_pax_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" value="<?php echo $value->no_pax;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="base_fare_<?php echo $count;?>" id="base_fare_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;" value="<?php echo $value->base_fare;?>" required>
                </td>
                <td>
                    <input type="text" name="tax_<?php echo $count;?>" id="tax_<?php echo $count;?>" oninput="fare_calculate(1)" style="width: 100%;"  value="<?php echo $value->tax;?>" required>
                </td>
                <td>
                    <input type="text" name="total_<?php echo $count;?>" id="total_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;" value="<?php echo $value->total;?>" required>
                </td>
                <td>
                    <input type="text" name="base_actual_<?php echo $count;?>" id="base_actual_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;"  value="<?php echo $value->base_fare_actual;?>" required>
                </td>
                <td>
                    <input type="text" name="tax_actual_<?php echo $count;?>" id="tax_actual_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;"  value="<?php echo $value->tax_actual;?>" required>
                </td>
                <td>
                    <input type="text" name="issuance_<?php echo $count;?>" id="issuance_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)"  value="<?php echo $value->issuance_fee;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="admin_fee_1_<?php echo $count;?>" id="admin_fee_1_1" oninput="fare_calculate(<?php echo $count;?>)"  value="<?php echo $value->admin_fees;?>" style="width: 100%;" required>
                </td>
                <td>
                    <input type="text" name="admin_fee_2_<?php echo $count;?>" id="admin_fee_2_1" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;"  value="<?php echo $value->admin_fees2;?>" required>
                </td>
                <td>
                    <input type="text" name="card_fee_<?php echo $count;?>" id="card_fee_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;" value="<?php echo $value->card_fee;?>" required>
                </td>
                <td>
                    <input type="text" name="total_actual_<?php echo $count;?>" id="total_actual_<?php echo $count;?>" oninput="fare_calculate(<?php echo $count;?>)" style="width: 100%;"  value="<?php echo $value->total_actual;?>" required>
                </td>
            </tr>
        	<?php
        	$count++;
        	 }?>
        </tbody>
    </table>
    <div style="margin-top: 10px;">
        Gross Total: <input type="text" name="gross_total" id="gross_total" style="width: 20%;" value="<?php echo $flight_booking->gross_total;?>" required>
        Profit: <input type="text" name="profit" id="profit" style="width: 20%;" value="<?php echo $flight_booking->profit;?>" required>
        Gross Actual: <input type="text" name="gross_actual" id="gross_actual" style="width: 20%;" value="<?php echo $flight_booking->gross_actual;?>" required>
        <input type="submit" value="Update">
    </div>
</div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#country').change(function() {
    		var country=$("#country").val();
    		if (country=='United States') {
    			var state=$("#state2").val();
                $("#state2").show();
                $("#state1").hide();
    		}
    		else{
    			var state=$("#state1").val();
                $("#state2").hide();
                $("#state1").show();
    		}
	})
    });


	function add_passenger() {
		var passenger_count=$("#passenger_count").val();
		passenger_count=parseInt(passenger_count);
		passenger_count=passenger_count+1;
		$("#passenger_count").val(passenger_count);
		var html_val='<tr id="passenger_'+passenger_count+'"><td><span>'+passenger_count+'</span></td><td><select name="passenger_type_'+passenger_count+'" style="width: 100%;" required><option value="">PaxType</option><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td><td><select name="title_'+passenger_count+'" style="width: 100%;" required><option value="">Title</option><option value="Mr">Mr</option><option value="Miss">Miss</option><option value="Mrs">Mrs</option><option value="Master">Master</option><option value="Dr">Dr</option></select></td><td><input type="text" name="first_name_'+passenger_count+'" placeholder="FirstName" style="width: 46%;" required><input type="text" name="last_name_'+passenger_count+'" placeholder="LastName" style="width: 46%;" required> </td><td><select name="gender_'+passenger_count+'" style="width: 100%;" required><option value="">Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></td><td><input type="date" name="dob_'+passenger_count+'" style="width: 100%;" required></td><td><input type="text" name="ticket_no_'+passenger_count+'" required></td><td><input type="text" name="passport_no_'+passenger_count+'" placeholder="PassportNo" style="width: 46%;" required><input type="text" name="place_'+passenger_count+'" placeholder="Place" style="width: 46%;" required></td> <td><input type="date" name="issue_date_'+passenger_count+'" placeholder="Issue Date" style="width: 48%;" required><input type="date" name="expiry_date_'+passenger_count+'" placeholder="Expiry" style="width: 46%;" required></td><td><input type="text" name="nationality_'+passenger_count+'" style="width: 100%;" required></td></tr>';
	$("#passenger_div").append(html_val);
	}
	function remove_passenger() {
		var passenger_count=$("#passenger_count").val();
		var passenger_count=parseInt(passenger_count);
		if (passenger_count==1) {
			alert("Minimum 1 passenger required");
		}
		else{			
			var div_id="#passenger_"+passenger_count;
			$(div_id).remove();
			passenger_count=passenger_count - 1;
			$("#passenger_count").val(passenger_count);
		}
	}

	function add_flight() {
		var flight_count=$("#flight_count").val();
		flight_count=parseInt(flight_count);
		flight_count=flight_count+1;
		$("#flight_count").val(flight_count);
		var html_val='<tr id="flight_'+flight_count+'"><td><input type="text" name="from_'+flight_count+'" placeholder="FROM" style="width: 100%;" required></td><td><input type="text" name="to_'+flight_count+'" placeholder="TO" style="width: 100%;" required></td><td><input type="date" name="depart_date_'+flight_count+'" placeholder="Depart Date" style="width: 100%;" required></td><td><input type="text" name="depart_time_'+flight_count+'" placeholder="DepartTime" style="width: 100%;" required></td><td><input type="date" name="arrival_date_'+flight_count+'" placeholder="ArrivalDate" style="width: 100%;" required></td><td><input type="text" name="arrival_time_'+flight_count+'" placeholder="ArrivalTime" style="width: 100%;" required></td><td><input type="text" name="airlines_'+flight_count+'" placeholder="Airlines" style="width: 100%;" required></td><td><input type="" name="flight_no_'+flight_count+'" placeholder="" style="width: 100%;"></td><td><select name="class_'+flight_count+'" style="width: 100%;" required><option value="Economy">Economy</option><option value="Premium Economy">Premium Economy</option><option value="Business Class">Business Class</option><option value="First Class">First Class</option></select></td><td><input type="" name="total_time_'+flight_count+'" placeholder="" style="width: 100%;" required></td></tr>';
	$("#flight_details").append(html_val);

	}
	function remove_flight() {
		var flight_count=$("#flight_count").val();
		flight_count=parseInt(flight_count);
		if (flight_count==1) {
			alert("Minimum 1 Flight required");
		}
		else{			
			var div_id="#flight_"+flight_count;
			$(div_id).remove();
			flight_count=flight_count - 1;
			$("#flight_count").val(flight_count);
		}
	}

	function add_card() {
		var card_count=$("#card_count").val();
		card_count=parseInt(card_count);
		card_count=card_count+1;
		$("#card_count").val(card_count);
		var html_val='<tr id="card_'+card_count+'"><td><select name="payment_method_'+card_count+'" style="width: 100%;" required><option value="">PayMode</option><option value="Cash">Cash</option><option value="Cheuque">Cheuque</option><option value="Bank Transfer">Bank Transfer</option><option value="Online Pay">Online Pay</option><option value="Debit Card">Debit Card</option><option value="Credit Card">Credit Card</option></select></td><td><select name="card_type_'+card_count+'" style="width: 100%;" required><option value="">Card Type</option><option value="Visa">Visa</option><option value="Master">Master</option><option value="Amex">Amex</option><option value="Switch">Switch</option><option value="SOLO">SOLO</option></select></td><td><input type="text" name="card_no_'+card_count+'" placeholder="CardNo" style="width: 100%;" required></td><td><input type="text" name="cardholder_name_'+card_count+'" placeholder="CardholderName" style="width: 100%;" required></td><td><input type="text" name="cvc_'+card_count+'" placeholder="CVC" required></td><td><input type="text" name="expiry_'+card_count+'" placeholder="MM/YYYY" style="width: 100%;" required></td><td><input type="text" name="card_issue_date_'+card_count+'" placeholder="MM/YYYY" required></td><td><input type="text" name="amount_'+card_count+'" placeholder="Amount" style="width: 100%;" required></td><td><input type="text" name="taxes_'+card_count+'" placeholder="Taxes" style="width: 100%;" required></td><td><input type="text" name="total_amount_'+card_count+'" placeholder="Total Amount" style="width: 100%;" required></td><td><select name="status_'+card_count+'" style="width: 100%;"><option value="">Status</option><option value="Paid in full" required>Paid in full</option><option value="Deposit">Deposit</option><option value="Refunded">Refunded</option><option value="Pending">Pending</option><option value="Card Declined">Card Declined</option><option value="Cancel">Cancel</option></select></td></tr>';
		$("#card_div").append(html_val);

	}
	function remove_card() {
		var card_count=$("#card_count").val();
		card_count=parseInt(card_count);
		if (card_count==1) {
			alert("Minimum 1 Payment Method is Required");
		}
		else{			
			var div_id="#card_"+card_count;
			$(div_id).remove();
			card_count=card_count - 1;
			$("#card_count").val(card_count);
		}	
	}
	function add_payment() {
		var payment_count=$("#payment_count").val();
		payment_count=parseInt(payment_count);
		payment_count=payment_count+1;
		$("#payment_count").val(payment_count);
		var html_val='<tr id="payment_'+payment_count+'"><td><input type="text" name="payment_supplier_'+payment_count+'" style="width: 100%;" required></td><td><select name="payment_passenger_type_'+payment_count+'" style="width: 100%;" required><option value="">PaxType</option><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td><td><input type="number" name="no_pax_'+payment_count+'" id="no_pax_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="base_fare_'+payment_count+'" id="base_fare_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="tax_'+payment_count+'" id="tax_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="total_'+payment_count+'" id="total_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="base_actual_'+payment_count+'" id="base_actual_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="tax_actual_'+payment_count+'" id="tax_actual_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="issuance_'+payment_count+'" id="issuance_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="admin_fee_1_'+payment_count+'" id="admin_fee_1_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="admin_fee_2_'+payment_count+'" id="admin_fee_2_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="card_fee_'+payment_count+'" id="card_fee_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td><td><input type="text" name="total_actual_'+payment_count+'" id="total_actual_'+payment_count+'" oninput="fare_calculate('+payment_count+')" style="width: 100%;" required></td></tr>';
		$("#payment_div").append(html_val);
		gross_total();

	}
	function remove_payment() {
		var card_count=$("#payment_count").val();
		card_count=parseInt(card_count);
		if (card_count==1) {
			alert("Minimum 1 Payment Method is Required");
		}
		else{			
			var div_id="#payment_"+card_count;
			$(div_id).remove();
			card_count=card_count - 1;
			$("#payment_count").val(card_count);
		}
		gross_total();	
	}

	function fare_calculate(ids) {
		var no_pax=$("#no_pax_"+ids).val();
		no_pax=parseInt(no_pax);
		if (no_pax=="NaN" || no_pax=='') {
			no_pax=1;
		}
		var base_fare=$("#base_fare_"+ids).val();
		base_fare=parseInt(base_fare);
		if (base_fare=="NaN" || base_fare=='') {
			base_fare=0;
		}
		var tax=$("#tax_"+ids).val();
		tax=parseInt(tax);
		if (tax=="NaN" || tax=='') {
			tax=0;
		}
		var total=no_pax * (base_fare + tax);
		$("#total_"+ids).val(total);


		var base_actual=$("#base_actual_"+ids).val();
		base_actual=parseInt(base_actual);
		if (base_actual=="NaN" || base_actual=='') {
			base_actual=0;
		}
		var tax_actual=$("#tax_actual_"+ids).val();
		tax_actual=parseInt(tax_actual);
		if (tax_actual=="NaN" || tax_actual=='') {
			tax_actual=0;
		}
		var issuance=$("#issuance_"+ids).val();
		issuance=parseInt(issuance);
		if (issuance=="NaN" || issuance=='') {
			issuance=0;
		}
		var admin_fee_1=$("#admin_fee_1_"+ids).val();
		admin_fee_1=parseInt(admin_fee_1);
		if (admin_fee_1=="NaN" || admin_fee_1=='') {
			admin_fee_1=0;
		}
		var admin_fee_2=$("#admin_fee_2_"+ids).val();
		admin_fee_2=parseInt(admin_fee_2);
		if (admin_fee_2=="NaN" || admin_fee_2=='') {
			admin_fee_2=0;
		}
		var card_fee=$("#card_fee_"+ids).val();
		card_fee=parseInt(card_fee);
		if (card_fee=="NaN" || card_fee=='') {
			card_fee=0;
		}
		// console.log(no_pax);
		// console.log(base_actual);
		// console.log(tax_actual);
		// console.log(issuance);
		// console.log(admin_fee_1);
		// console.log(admin_fee_2);
		// console.log(card_fee);
		var total_actual= no_pax * (base_actual + tax_actual + issuance + admin_fee_1 + admin_fee_2 + card_fee);
		$("#total_actual_"+ids).val(total_actual);
		gross_total();
	}

	function gross_total() {
		var gross_total=0;
		var profit=0;
		var gross_actual=0;
		var payment_count=$("#payment_count").val();
		payment_count=parseInt(payment_count);
		for (let i = 1; i <= payment_count; i++) {
			var total_i=$("#total_"+i).val();
			total_i=parseInt(total_i);
			var total_actual_i=$("#total_actual_"+i).val();
			total_actual_i=parseInt(total_actual_i);
			gross_total=gross_total + total_i;
			gross_actual=gross_actual + total_actual_i;
		}
		profit = gross_total - gross_actual;
		$("#gross_total").val(gross_total);
		$("#gross_actual").val(gross_actual);
		$("#profit").val(profit);
	}
</script>
<?php $this->load->view('admin/footer');?>