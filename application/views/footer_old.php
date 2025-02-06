<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
<style type="text/css">
	.contact-info-subcontainer a{
		color:white !important;
	}
	#contact-info-div, #footer{
		z-index:88888 !important
	}
</style>
	<div id="contact-info-div" style="background:#2876e5;">
		<div class="contact-info-subcontainer" >

			<div class="footer-logo">
				<a href="<?php echo base_url();?>"><img id="applogo" src="<?php echo base_url();?>assets/images/applogo.jpg" alt="Logo" style="width:150px !important"></a>
			</div>			
			<div id="socials" style="background:#2876e5 !important;">
				<h5 style="color:white;font-weight: 600;background:#2876e5 !important;">Follow us on</h5>
			</div>
			<div id="socials" style="background:#2876e5 !important;">
				<!-- <img src="<?php echo base_url();?>assets/images/instagram-logo.png" alt=""> -->
				<!-- <img src="<?php echo base_url();?>assets/images/twitter.png" alt=""> -->
				<!-- <img src="<?php echo base_url();?>assets/images/facebook.png" alt=""> -->
				<a href="<?php echo $site_settings->instagram;?>"><i class="fa fa-instagram fa-2x" style="color:white;"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="<?php echo $site_settings->twitter;?>"><i class="fa fa-twitter fa-2x" style="color:white;"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="<?php echo $site_settings->facebook;?>"><i class="fa fa-facebook fa-2x" style="color:white;"></i>
			</div>
		</div>
		<div class="contact-info-subcontainer" style="color:white !important;">
			<h4>Help</h4>
			<div style="display:flex;flex-direction:column; margin-top:10%;width:max-content">
				<?php 
				$query=$this->db->query("SELECT * FROM cms WHERE status=1");
				$query=$query->result();
				foreach ($query as $key => $value) {
					// print_r($value);die();
				?>
				<a href="<?php echo base_url();?>Home/page/<?php echo $value->id;?>"><?php echo $value->page_title;?></a>
				<?php
				}
				?>
				<a href="<?php echo base_url();?>Home/contact">Contact Us</a>

			</div>
		</div>
		<div class="contact-info-subcontainer">
			<h4>Contact information</h4>
			<br>
			<div style="display: flex;flex-direction: column;">
				<div class="address" style="color:white;">
					<?php echo $site_settings->address;?>
				</div>
				
				<a href="tel:<?php echo $site_settings->phone_no;?>"><?php echo $site_settings->phone_no;?> (Customer Care)</a>
				<a href="mailto:<?php echo $site_settings->email;?>"><?php echo $site_settings->email;?></a>		
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="partners-container">
			<div class="partner-images"></div>
			<div class="partner-images"></div>
			<div class="partner-images"></div>
			<div class="partner-images"></div>
		</div>
		<div id="warnings">
			* Fares are inclusive of all surcharges, our service fees & taxes. Tickets are non-refundable, non-transferable and non-assignable unless otherwise stated in the itinerary.  Other restrictions may apply. Booking tickets over phone are subject to an additional $10 fee per passenger.* Fares are inclusive of all surcharges, our service fees & taxes. Tickets are non-refundable, non-transferable and non-assignable unless otherwise stated in the itinerary. Name changes are not permitted once a booking is confirmed. Displayed fares are subject to change and cannot be guaranteed until a booking confirmed and ticket is issued. Lowest fares may require an advance purchase of up to 21 days. Certain blackout dates may apply. Holidays and weekend travel may have a surcharge. Other restrictions may apply. Booking tickets over phone are subject to an additional $10 fee per passenger.
		</div>
		<div id="copyright">
			Copyright 2024 © BookedToFly. All Rights Reserved.
		</div>
	</div>
</body>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
</html>