<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirmation Mail</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
	<div class="p-5">
		<div class="flex justify-end item-end">
			<div class="flex flex-col">
			<div>
				<img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" style="height: 200px;width:200px;">
			</div>
			<div class="flex flex-col">
				<div class="flex flex-row justify-end item-end">
				<svg class="h-6 w-6 text-orange-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17.905 13.057c2.208 1.756 3.436 3.308 3.012 4.035-.67 1.146-5.204-.204-10.129-3.016-4.924-2.812-8.374-6.022-7.705-7.168.418-.716 2.347-.458 4.936.524" />  <circle cx="12" cy="12" r="6" /></svg>	
				<span><?php echo $site_settings->site_name;?></span>
				</div>
				<div class="flex flex-row justify-end item-end">
					<svg class="h-6 w-6 text-orange-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"> <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
					<a href="tel:<?php echo $site_settings->phone_no;?>"><?php echo $site_settings->phone_no;?></a>
				</div>
				<div class="flex flex-row justify-end item-end">
				<svg class="h-6 w-6 text-orange-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />  <polyline points="22,6 12,13 2,6" /></svg>
					<a href="mailto:<?php echo $site_settings->email;?>"><?php echo $site_settings->email;?></a>
				</div>
			</div>
			</div>
		</div>

		<div class="flex justify-start item-start">
			Dear <span><?php echo $flight_booking->contact_first_name.' '.$flight_booking->contact_last_name;?></span>
		</div>
		<br>
		<div class="flex flex-col">
			<div class="flex justify-center item-center">Your booking is in processing. </div>
			<div class="flex justify-center item-center">Booking Reference Number - <span><?php echo $flight_booking->reference_no;?></span></div>
			<div class="flex justify-center item-center">Your e-Ticket will be issued shortly, once your credit card verification has been completed.</div>
			<div class="flex justify-center item-center"><b>Note:</b> Fares are not guaranteed until ticketed. In the rare event fares increase or any issue to book it online, you will receive a call from our expert. Tickets are Non-refundable & Non Transferable once Booked.</div>
		</div>

		<div class="flex flex-col">	
			<div class="flex mx-auto justify-center item-center text-white bg-blue-900 p-1 w-[50%]">Passenger Details</div>
			<table class="w-[50%] mx-auto item-center border-collapse border border-slate-500">
				<thead class="bg-gray-200 p-1">
					<tr>
						<th class="border border-slate-600">Name</th>
						<!-- <th>Gender</th> -->
						<th class="border border-slate-600">DoB</th>
					</tr>
				</thead>
				<tbody class="">
					<?php 
					foreach ($passenger_details as $key => $value) {
					?>
					<tr class="item-center">
						<td class="border border-slate-600"><?php echo $value->first_name.' '.$value->last_name;?></td>
						<!-- <td><?php echo $value->gender;?></td> -->
						<td class="border border-slate-600"><?php echo $value->dob;?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>

		<div class="flex flex-col">
			<div class="flex mx-auto justify-center item-center text-white bg-blue-900 p-1 w-[50%]">Contact Details</div>
			<table class="w-[50%] mx-auto item-center border-collapse border border-slate-500">
				<thead class="bg-gray-200 p-1">
					<tr>
						<th class="border border-slate-600">Name</th>
						<th class="border border-slate-600">Phone</th>
						<th class="border border-slate-600">Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="border border-slate-600"><?php echo $flight_booking->contact_first_name.' '.$flight_booking->contact_last_name;?></td>
						<td class="border border-slate-600"><?php echo $flight_booking->contact_phone;?></td>
						<td class="border border-slate-600"><?php echo $flight_booking->contact_email;?></td>
					</tr>
				</tbody>
			</table>
		</div>
	
		<div class="flex flex-col">
			<div class="flex mx-auto justify-center item-center text-white bg-blue-900 p-1 w-[50%]">Flight Information</div>
			<div class="flex mx-auto justify-center item-center bg-gary-500 p-1 w-[50%] border border-slate-600">
				OutBound => <?php echo $flight_booking->from_city;?>(<?php echo $flight_booking->from_airport;?>) - <?php echo $flight_booking->to_city;?>(<?php echo $flight_booking->to_airport;?>)
			</div>
			<?php 
			$flight_details=$flight_booking->flight_complete_detail;
			$flight_details=json_decode($flight_details,true);
			$flight_details=$flight_details['itineraries'];
			?>
			<table class="w-[50%] mx-auto item-center border-collapse border border-slate-500">
				<thead class="bg-gray-200 p-1">
					<tr>
						<th class="border border-slate-600">Airline</th>
						<th class="border border-slate-600">Departing</th>
						<th class="border border-slate-600">Arriving</th>
						<th class="border border-slate-600">Flight No</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// print_r($flight_details[0]);die();
					$departure=$flight_details[0]['segments'];
					foreach ($departure as $key => $value) {
					?>
					<tr>
						<td class="border border-slate-600"><?php print_r($value['carrierCode']);?></td>
						<td class="border border-slate-600">
							<?php echo $value['departure']['iataCode'];?>
							<br>
							<?php echo $value['departure']['at'];?>
						</td class="border border-slate-600">
						<td class="border border-slate-600">
							<?php echo $value['arrival']['iataCode'];?>
							<br>
							<?php echo $value['arrival']['at'];?>
						</td>
						<td class="border border-slate-600"><?php echo $value['carrierCode'].'-'.$value['number']?></td>
					</tr>
					<?php
					}
					?>		
				</tbody>
			</table>	

			<?php 
			if ($flight_booking->return_date!='') {
			?>

			<div class="flex mx-auto justify-center item-center bg-gary-500 p-1 w-[50%] border border-slate-600">
			InBound => <?php echo $flight_booking->to_city;?>(<?php echo $flight_booking->to_airport;?>) -  <?php echo $flight_booking->from_city;?>(<?php echo $flight_booking->from_airport;?>)
			</div>
			<table class="w-[50%] mx-auto item-center border-collapse border border-slate-500">
				<thead class="bg-gray-200 p-1">
					<tr>
						<th class="border border-slate-600">Airline</th>
						<th class="border border-slate-600">Departing</th>
						<th class="border border-slate-600">Arriving</th>
						<th class="border border-slate-600">Flight No</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// print_r($flight_details[0]);die();
					$departure=$flight_details[1]['segments'];
					foreach ($departure as $key => $value) {
					?>
					<tr>
						<td class="border border-slate-600"><?php print_r($value['carrierCode']);?></td>
						<td class="border border-slate-600">
							<?php echo $value['departure']['iataCode'];?>
							<br>
							<?php echo $value['departure']['at'];?>
						</td>
						<td class="border border-slate-600">
							<?php echo $value['arrival']['iataCode'];?>
							<br>
							<?php echo $value['arrival']['at'];?>
						</td>
						<td class="border border-slate-600"><?php echo $value['carrierCode'].'-'.$value['number']?></td>
					</tr>
					<?php
					}
					?>		
				</tbody>
			</table>
		</div>	
		<?php
		}
		?>
		<div class="flex flex-col">
			<div class="flex mx-auto justify-center item-center text-white bg-blue-900 p-1 w-[50%]">Card Details</div>
			<table class="w-[50%] mx-auto item-center border-collapse border border-slate-500">
				<thead class="bg-gray-200 p-1">
					<tr>
						<th class="border border-slate-600">Card No</th>
						<th class="border border-slate-600">Cardholder's Name</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="border border-slate-600">
							<?php echo $card_no;?>		
						</td>
						<td class="border border-slate-600"><?php echo $card_holder_name;?></td>
					</tr>
				</tbody>			
			</table>

		<div class="flex flex-col">
			<div class="flex mx-auto justify-center item-center text-white bg-blue-900 p-1 w-[50%]">Price Details</div>
			<div class="w-[50%] mx-auto justify-center item-center border-collapse border border-slate-500">Total Price <span>$<?php print_r($flight_booking->total_charges);?></span></div>
		</div>

		
		<span class="my-5">Note:- For 24*7 assistance, please contact us on : Phone: <?php echo $site_settings->phone_no;?></span>
		
		
		<span class="mb-2">Important Information<span>
		<ul class="mt-2 ml-10" style="list-style-type:disc;">	
			<li>Travelers must make sure they have all of the required travel documents and that they are current and valid for their destination.</li>
			<li>Fares are not guaranteed until tickets are issued. Fares are subject to availability of seats.</li>
			<li>According to airline policies name changes are not allowed once the tickets are issued, though some airlines allow minor corrections after payment of change fees.</li>
			<li>Flight schedules are subject to change by the Airlines due to changes in Airline Operations.</li>
			<li>Date and routing changes will be subject to airline rules and regulations.</li>
		</ul>
		<br>
		Thanks & Regards
		<br>
		<?php echo $site_settings->site_name;?> Team
		<br>
		<?php echo $site_settings->address;?><br>

	</div>
</body>
</html>