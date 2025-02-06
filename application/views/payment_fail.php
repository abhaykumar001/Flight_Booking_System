<?php $this->load->view('header'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card mt-5">
					<div class="card-header">
						<h3 class="text-center">Payment Failed</h3>
					</div>
					<div class="card-body">
						<div class="text-center">
							<img src="<?php echo base_url();?>assets/payment_fail.jpeg" class="" alt="Failure Image" style="width:60px">
						</div>
						<h4 class="text-center mt-3 mb-5">Payment Details</h4>
						<p><strong>Transaction ID:</strong> <?php echo $payment_logs->transaction_id;?></p>
						<p><strong>Amount Paid:</strong> $<?php echo $flight_booking->total_charges;?></p>
						<p>Your Transaction Has Failed.<br>Please Try Again Later.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('footer'); ?>