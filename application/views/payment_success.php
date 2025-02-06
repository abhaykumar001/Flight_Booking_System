<?php $this->load->view('header'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card mt-12">
					<div class="card-header">
						<h3 class="text-center">Booking Request Success</h3>
					</div>
					<div class="card-body">
						<p class="text-center mt-3 mb-12">
							<span style="font-size:20px; font-weight:600;">
								Booking Reference:
							</span>
							<span style="font-size:24px; font-weight:600;">
								<?php echo $flight_booking->reference_no;?>
							</span>
							<br>
							<br>
							Dear Customer, your ticket is processing. 
							<br>We will contact you if needed or send you an E-Ticket upon confirmation with the airlines.
							<br>Please check your email inbox including spam folder.
						</p>
						<?php 
						$booking_id=$flight_booking->id;
						$passengers=$this->db->query("SELECT * FROM passenger_details WHERE booking_id='$booking_id'");
						$passengers=$passengers->result();
						?>
						<p class="text-center mt-10 mb-6">
							<span style="font-size:16px; font-weight:600;">
								Passenger Details:
							</span>
							<div class="flex justify-center item-center mx-auto">
							<table class="item-center w-[500px] border-collapse border border-slate-500">
								<thead class="bg-gray-100">
									<tr>
										<th class="border border-slate-600">Passenger Name</th>
										<th>Gender</th>
										<th class="border border-slate-600">DoB</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($passengers as $key => $value) {
									?>
									<tr class="border border-slate-700">
										<td><?php echo $value->first_name.' '.$value->last_name;?></td>
										<td style="text-transform: capitalize;"><?php echo $value->gender;?></td>
										<td><?php $dob= date("d,M Y", strtotime($value->dob));

										echo $dob;?></td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							</div>
						</p>
						<p class="text-center mt-10 mb-6">
							<span style="font-size:16px; font-weight:600;">
								Flight Details:
							</span>
							<?php
							$flight_complete_detail=$flight_booking->flight_complete_detail;
							$flight_complete_detail=json_decode($flight_complete_detail,true);
							$flight_complete_detail=$flight_complete_detail['itineraries'];
							// echo "<pre>";print_r($flight_complete_detail);
							?>
							<div class="flex justify-center item-center mx-auto">
							<table class="item-center w-[700px] border-collapse border border-slate-500">
								<thead class="bg-gray-100">
									<tr>
										<th class="border border-slate-600">From</th>
										<th class="border border-slate-600">Departure At</th>
										<th class="border border-slate-600">To</th>
										<th class="border border-slate-600">Arrival At</th>
										<th class="border border-slate-600">Airlines</th>
										<th class="border border-slate-600">Flight No</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($flight_complete_detail as $key => $value) {
										foreach ($value['segments'] as $key1 => $value1) {
											// print_r($value);
										?>										
										<tr>
											<td class="border border-slate-600"><?php echo $value1['departure']['iataCode'];?></td>
											<td class="border border-slate-600">
												<?php
												 $at = str_replace("T"," ",$value1['departure']['at']);
												 echo date("M d,Y H:i", strtotime($at));
												?>
											</td>
											<td class="border border-slate-600"><?php echo $value1['arrival']['iataCode'];?></td>
											<td class="border border-slate-600">
												<?php
												 $at = str_replace("T"," ",$value1['arrival']['at']);
												 echo date("M d,Y H:i", strtotime($at));
												?>
											</td>
											<td class="border border-slate-600"><?php echo $value1['carrierCode'];?></td>
											<td class="border border-slate-600"><?php echo $value1['carrierCode'].'-'.$value1['number'];?></td>
										</tr>
										<?php
										}
									}?>
								</tbody>
							</table>
							</div>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('footer'); ?>