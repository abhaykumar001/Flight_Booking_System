<?php $this->load->view('header');?>


<style>
.pl {
  display: block;
  width: 9.375em;
  height: 9.375em;
}

.pl__arrows,
.pl__ring-rotate,
.pl__ring-stroke,
.pl__tick {
  animation-duration: 2s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.pl__arrows {
  animation-name: arrows42;
  transform: rotate(45deg);
  transform-origin: 16px 52px;
}

.pl__ring-rotate,
.pl__ring-stroke {
  transform-origin: 80px 80px;
}

.pl__ring-rotate {
  animation-name: ringRotate42;
}

.pl__ring-stroke {
  animation-name: ringStroke42;
  transform: rotate(-45deg);
}

.pl__tick {
  animation-name: tick42;
}

.pl__tick:nth-child(2) {
  animation-delay: -1.75s;
}

.pl__tick:nth-child(3) {
  animation-delay: -1.5s;
}

.pl__tick:nth-child(4) {
  animation-delay: -1.25s;
}

.pl__tick:nth-child(5) {
  animation-delay: -1s;
}

.pl__tick:nth-child(6) {
  animation-delay: -0.75s;
}

.pl__tick:nth-child(7) {
  animation-delay: -0.5s;
}

.pl__tick:nth-child(8) {
  animation-delay: -0.25s;
}

/* Animations */
@keyframes arrows42 {
  from {
    transform: rotate(45deg);
  }

  to {
    transform: rotate(405deg);
  }
}

@keyframes ringRotate42 {
  from {
    transform: rotate(0);
  }

  to {
    transform: rotate(720deg);
  }
}

@keyframes ringStroke42 {
  from,
	to {
    stroke-dashoffset: 452;
    transform: rotate(-45deg);
  }

  50% {
    stroke-dashoffset: 169.5;
    transform: rotate(-180deg);
  }
}

@keyframes tick42 {
  from,
	3%,
	47%,
	to {
    stroke-dashoffset: -12;
  }

  14%,
	36% {
    stroke-dashoffset: 0;
  }
}
</style>


<div id="showLoad" class="fixed top-1/2 left-[46%] z-10" style="display: none;"> 
		<svg class="pl" viewBox="0 0 160 160" width="160px" height="160px" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<linearGradient id="grad" x1="0" y1="0" x2="0" y2="1">
					<stop offset="0%" stop-color="#000"></stop>
					<stop offset="100%" stop-color="#fff"></stop>
				</linearGradient>
				<mask id="mask1">
					<rect x="0" y="0" width="160" height="160" fill="url(#grad)"></rect>
				</mask>
				<mask id="mask2">
					<rect x="28" y="28" width="104" height="104" fill="url(#grad)"></rect>
				</mask>
			</defs>
			
			<g>
				<g class="pl__ring-rotate">
					<circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none" stroke="hsl(223,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39" stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)"></circle>
				</g>
			</g>
			<g mask="url(#mask1)">
				<g class="pl__ring-rotate">
					<circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none" stroke="hsl(193,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39" stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)"></circle>
				</g>
			</g>
			
			<g>
				<g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round" transform="translate(80,80)">
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-135,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-90,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-45,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(0,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(45,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(90,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(135,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(180,0,0) translate(0,40)"></polyline>
				</g>
			</g>
			<g mask="url(#mask1)">
				<g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round" transform="translate(80,80)">
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-135,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-90,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-45,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(0,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(45,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(90,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(135,0,0) translate(0,40)"></polyline>
					<polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(180,0,0) translate(0,40)"></polyline>
				</g>
			</g>
			
			<g>
				<g transform="translate(64,28)">
					<g class="pl__arrows" transform="rotate(45,16,52)">
						<path fill="hsl(3,90%,55%)" d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z"></path>
						<path fill="hsl(223,10%,90%)" d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z"></path>
					</g>
				</g>
			</g>
			<g mask="url(#mask2)">
				<g transform="translate(64,28)">
					<g class="pl__arrows" transform="rotate(45,16,52)">
						<path fill="hsl(333,90%,55%)" d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z"></path>
						<path fill="hsl(223,90%,80%)" d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z"></path>
					</g>
				</g>
			</g>
		</svg>
    <span class="sr-only">Loading...</span>
</div>


<!-- new-payment-div -->
<div>
<section class="py-8 antialiased md:py-16">
  <form action="<?php echo base_url();?>Home/payment_temp" method="post" class="mx-auto max-w-screen-xl px-4 2xl:px-0"  onsubmit="showLoading()">
    <div class="lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
				<!-- Upper Part -->
				<div>
					<div class="text-3x1 font-bold">
						Credit Card
					</div>
					<div class="text-2xl font-light">
						Summary
					</div>
					<div class="text-lg font-bold">
						Price $<?php echo $flight_booking->total_charges;?> 
					</div>
				</div>

				<!-- Image -->
				<div style="display:flex;flex-direction:row;margin-top:5%">
						<img style="width:53px;margin-right:1%" src="<?php echo base_url();?>assets/images/credit-card4.png">
						<img style="width:53px;margin-right:1%" src="<?php echo base_url();?>assets/images/credit-card1.png">
						<img style="width:53px;margin-right:1%" src="<?php echo base_url();?>assets/images/credit-card5.png">
				</div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="your_name" class="mb-2 block text-sm font-medium">Cardholder's Name</label>
              <input type="text" id="card_name" name="card_name" class="block w-full rounded-lg border border-gray-300 
			  bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 
			  dark:border-gray-600 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Cardholder Name" required />
            </div>

            <div>
              <label for="number" class="mb-2 block text-sm font-medium"> Card Number</label>
              <input type="number" id="card_no" name="card_no" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600      dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Card Number" required />
            </div>

            <div>
              <div class="mb-2 flex items-center gap-2">
                <label for="select-country-input-3" class="block text-sm font-medium">Month</label>
              </div>
              <select id="select-country-input-3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" name="expiry_month" id="expiry_month">
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

            <div>
              <div class="mb-2 flex items-center gap-2">
                <label for="select-city-input-3" class="block text-sm font-medium text-gray-900">Year</label>
              </div>
              <select id="select-city-input-3" name="expiry_year" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600      dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
								<option value="2028">2028</option>
								<option value="2029">2029</option>
								<option value="2030">2030</option>
								<option value="2031">2031</option>
								<option value="2032">2032</option>
								<option value="2033">2033</option>
								<option value="2034">2034</option>
              </select>
            </div>

			<div>
              <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900"> CVV* </label>
                  <input type="password" name="cvv" id="cvv" class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700       dark:placeholder:text-gray-400 dark:focus:border-primary-500" placeholder="CVC" required />
            </div>

            <div>
              <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900"> Billing Phone* </label>
                  <input type="number" name="billing_phone" id="phone-input" class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700       dark:placeholder:text-gray-400 dark:focus:border-primary-500" placeholder="1234567890" max="9999999999" required />
            </div>

            <div>
                <label for="select-country-input-3" class="block text-sm font-medium">Country</label>
                <select id="country" name="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                		<option value="">Select a Country</option>
                		<?php 
                		$query=$this->db->query("SELECT * FROM country WHERE status=1");
                		$query=$query->result();
                		foreach ($query as $key => $value) {
                		?>
                		<option value="<?php echo $value->country_name;?>"><?php echo $value->country_name;?></option>
                		<?php
                		}
                		?>
                </select>
              
            </div>

         		<script type="text/javascript">
         			$(document).ready(function() {
						    $('#country').change(function() {
					    		var country=$("#country").val();
					    		if (country=='United States') {
					                $("#state2").hide();
					                $("#state1").show();
					    		}
					    		else{
					                $("#state2").show();
					                $("#state1").hide();
					    		}
								})
						  });
         		</script>
						<div>
              <label for="company_name" class="mb-2 block text-sm font-medium text-gray-900">State</label>
             	<select id="state1" name="state1" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                <option value="">Select a state</option>
								<option value="Alabama">Alabama</option>
								<option value="Arizona">Alaska</option>
								<option value="Arizona">Arizona</option>
								<option value="Arkansas">Arkansas</option>
								<option value="California">California</option>
								<option value="Colorado">Colorado</option>
								<option value="Connecticut">Connecticut</option>
								<option value="Delaware">Delaware</option>
								<option value="Florida">Florida</option>
								<option value="Georgia">Georgia</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Idaho">Idaho</option>
								<option value="Illinois">Illinois</option>
								<option value="Indiana">Indiana</option>
								<option value="Iowa">Iowa</option>
								<option value="Kansas">Kansas</option>
								<option value="Kentucky">Kentucky</option>
								<option value="Louisiana">Louisiana</option>
								<option value="Maine">Maine</option>
								<option value="Maryland">Maryland</option>
								<option value="Massachusetts">Massachusetts</option>
								<option value="Michigan">Michigan</option>
								<option value="Minnesota">Minnesota</option>
								<option value="Mississippi">Mississippi</option>
								<option value="Missouri">Missouri</option>
								<option value="Montana">Montana</option>
								<option value="Nebraska">Nebraska</option>
								<option value="Nevada">Nevada</option>
								<option value="New Hampshire">New Hampshire</option>
								<option value="New Jersey">New Jersey</option>
								<option value="New Mexico">New Mexico</option>
								<option value="New York">New York</option>
								<option value="North Carolina">North Carolina</option>
								<option value="North Dakota">North Dakota</option>
								<option value="Ohio">Ohio</option>
								<option value="Oklahoma">Oklahoma</option>
								<option value="Oregon">Oregon</option>
								<option value="Pennsylvania">Pennsylvania</option>
								<option value="Rhode Island">Rhode Island</option>
								<option value="South Carolina">South Carolina</option>
								<option value="South Dakota">South Dakota</option>
								<option value="Tennessee">Tennessee</option>
								<option value="Texas">Texas</option>
								<option value="Utah">Utah</option>
								<option value="Vermont">Vermont</option>
								<option value="Virginia">Virginia</option>
								<option value="Washington">Washington</option>
								<option value="West Virginia">West Virginia</option>
								<option value="Wisconsin">Wisconsin</option>
								<option value="Wyoming">Wyoming</option>
              </select>
              <input type="text" id="state2" name="state2" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="State" style="display: none;" />

            </div>
   					<div>
              <label for="company_name" class="mb-2 block text-sm font-medium text-gray-900">City</label>
              <input type="text" id="city" name="city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="City" required />
            </div>
            <div>
              <label for="vat_number" class="mb-2 block text-sm font-medium text-gray-900"> Zip Code </label>
              <input type="number" id="zip_code" name="zip_code" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="12345" min="10000" max="99999" required />
            </div>
          </div>
        </div>
        <input type="checkbox" name="sms_consent" required> By clicking this box, you agree to receive SMS from FareXplorer according to our <a href="<?php echo base_url();?>Home/page/7" style="color:blue;" target="_blank">privacy policy</a>
		<button  class="flex w-full items-center justify-center rounded-lg px-5 py-2.5 text-sm font-medium hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300  dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-blue-400">Proceed to Payment</button>
		
		<!-- Base-text -->
		<div style="margin-top:2%; font-size:smaller">
			<div>
				<p>We use secure transmission and encrypted storage to protect your personal information. This payment is processed with full encryption and 100% secure.</p>
				</div>
				<div style="font-weight:bold">
							Review and book your trip
				</div>
				<div>
							1.	Review your trip details to make sure the dates and times are correct.
				</div>
				<div>								
							2.	Check spellings. Passenger names must match government-issued photo ID.
				</div>
				<div>
							3.	Visa and other travel requirements vary from country to country. Best Airfares dooes not facilitate such arrangements. Please ensure that you fulfill these requirments on your end before commencing the travel.
				</div>
				<div>
							4.	Review the fare rules of your booking.
				</div>
			</div>
		</div>
    </div>
  </form>
  <script  type="text/javascript">
	function showLoading(){
		document.getElementById('showLoad').style.display = 'flex';
		setTimeout(() => {
        console.log("This is executed after a 5-second delay.");
    }, 15000);
	}
</script>

</section>
</div>

<?php $this->load->view('footer');?>