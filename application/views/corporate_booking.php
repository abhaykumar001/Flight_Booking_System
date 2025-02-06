<?php $this->load->view('header');?>
	<div id="corporate" style="margin-bottom:2%;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-6 pb-5">

					<!--Form with header-->
					<form action="<?php echo base_url();?>Home/corporate_booking_action" method="post">
						<div class="card border-primary rounded-0">
							<div class="card-header p-0">
								<div class="bg-info text-white text-center py-2">
									<h3><i class="fa fa-envelope"></i> Corporate Booking</h3>
									<p class="m-0">--message here--</p>
								</div>
							</div>
							<div class="card-body p-3">

								<!--Body-->
								<div class="form-group">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-user text-info"></i></div>
										</div>
										<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
										</div>
										<input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
										</div>
										<textarea class="form-control" placeholder="Your Message" required></textarea>
									</div>
								</div>

								<div class="text-center">
									<input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">
								</div>
							</div>

						</div>
					</form>
					<!--Form with header-->

				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('footer');?>