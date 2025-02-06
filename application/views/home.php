<?php $this->load->view('header');?>
<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>

<style>
/* For Chrome, Safari, Edge, Opera */
.no-spin::-webkit-outer-spin-button,
.no-spin::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* For Firefox */
.no-spin {
    -moz-appearance: textfield;
}

#from-suggestion-box {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
  z-index:1000;
  }
#from-suggestion-box::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
  }

#to-suggestion-box {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
  z-index:1000;
  }
#to-suggestion-box::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
  }
</style>


  <!-- website pop up -->
  <div id="popup-overlay" class="fixed inset-0 bg-black bg-opacity-75 z-40 hidden"></div>
  <div id="popup" class="fixed inset-0 z-50 flex items-center justify-center hidden">
  <div class="flex flex-col items-center justify-center bg-white p-2 shadow-lg w-[600px] h-[300px]">
  <button id="cross" type="button" class="bg-transparent hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex 
  justify-center items-center dark:hover:bg-gray-600" data-modal-hide="static-modal">
  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
  </svg>
  <span class="sr-only">Close modal</span>
  </button>
    <img src="asset/Logo1.jpg" alt="Popup Image" class="rounded-full w-32 h-32 -mt-5
    transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
    <h2 class="text-xl font-bold mb-1">GET <span class="text-orange-500"> 20% OFF </span>ON ALL BOOKINGS</h2>
    <h4 class="text-xs font-bold mb-1">CALL US NOW AT</h3>
    <button id="call" class="mb-1 bg-orange-500 text-white font-bold	 px-12 py-2 rounded-full mb-1 flex">
    <svg class="h-4 w-4 text-white mt-1 mr-1"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
      <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 
      1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 
      16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>  
    <?php echo $site_settings->phone_no;?></button>
    <h4 class="text-xs font-bold mb-1">WE ARE AVAILABLE 24X7</h3>
  </div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  function showPopup() {
    document.getElementById('popup').classList.remove('hidden');
    document.getElementById('popup-overlay').classList.remove('hidden');
  }
  
  function hidePopup() {
    document.getElementById('popup').classList.add('hidden');
    document.getElementById('popup-overlay').classList.add('hidden');
  }

  document.getElementById('submit-button').addEventListener('click', function(event) {
  
    showPopup();
  });

  document.getElementById('cross').addEventListener('click', hidePopup);
});
</script>



  <div id="carouselExampleControls" class="carousel slide flex flex-auto lg:max-h-[520px]" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://flightsden.com/wp-content/uploads/2024/04/flightsDenBanner_240304_final.jpg" alt="First slide">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-black opacity-70"></div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://flightsden.com//wp-content//uploads//2024//03//fd2.jpg" alt="Second slide">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-black opacity-70"></div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://flightsden.com//wp-content//uploads//2024//03//fd1b.jpg" alt="Third slide">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-black opacity-70"></div>
      </div>
    </div>
  </div>
  <div>
    <div class="flex flex-col justify-center items-center relative mx-auto w-auto lg:max-w-5xl -mt-24 lg:-mt-96 overflow-visible px-4 py-4">
        <div class="lg:text-3xl text-lg text-white font-semibold">WELCOME TO <span class="text-orange-500">FAREXPLORER</span></div>
        <div class="lg:text-5xl text-2xl text-white font-bold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-500 ">Discover Experience Repeat</div>
        <div class="lg:text-lg text-sm text-white font-semibold mt-2">Most Affordable and Cheapest Flight Booking</div>
    </div>
  </div>
  <div class="flex justify-center items-center mx-2 lg:mx-0">
  <div class="flex justify-center items-center relative max-w-5xl -mt-4 lg:mt-5 overflow-visible bg-white px-4 py-4">
    <div class="">
        <div class="form-row gap-2">
          <button class="p-2 shadow-sm shadow-black border border-orange-400 bg-orange-600 rounded-md text-white hover:bg-blue-600 hover:border-blue-400 hover:shadow-blue-500/50" type="button" onclick="show_flight_div()">
          <svg class="pl-2 h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
          fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  
          <path d="M16 10h4a2 2 0 0 1 0 4h-4l-4 7h-3l2 -7h-4l-2 2h-3l2-4l-2 -4h3l2 2h4l-2 -7h3z" /></svg>  
          Flight
          </button>
          <button class="p-2 shadow-sm shadow-black border border-orange-400 bg-orange-600 rounded-md text-white hover:bg-blue-600 hover:border-blue-400 hover:shadow-blue-500/50" type="button" onclick="show_hotel_div()">
          <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
          fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  
          <path d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6" />  <circle cx="7" cy="10" r="1" /></svg>
          Hotel
          </button>
          <button class="py-2 px-2.5 shadow-sm shadow-black border border-orange-400 bg-orange-600 rounded-md text-white hover:bg-blue-600 hover:border-blue-400 hover:shadow-blue-500/50" type="button" onclick="show_cab_div()">
          <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
          fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  
          <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  
          <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" /></svg>  
          Cab
          </button>
        </div>
      <form method="get" action="<?php echo base_url();?>Home/flight_search" id="flight_div" autocomplete="new-password">
        <div class="form-row gap-3 mt-2 mb-2">
          <div class="dropdown">
            <button class="dropdown-toggle p-0 text-xs" type="button" id="dropdownMenu" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Round Trip
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="button" onclick="trip_type('round')">Round Trip</button>
              <button class="dropdown-item" type="button" onclick="trip_type('one')">One Way</button>
            </div>
          </div>
          <input type="hidden" id="trip" name="trip" value="round">

          <div class="dropdown" id="passenger_dropdown">
            <button class="dropdown-toggle p-0 text-xs" type="button" id="dropdownMenu1" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false">
              1 Traveller
            </button>
            <div class="dropdown-menu" id="dropdownMenu1_content" aria-labelledby="dropdownMenu1">
              <table>
                <tr>
                  <td>Adult</td>
                  <td class="flex flex-row gap-3">
                    <span class="border rounded-lg px-3 py-1" style="cursor:pointer;" onclick="minus_adult()">-</span>
                    <input class="w-[30px] no-spin" type="number" name="no_adults" id="adult" value="1">
                    <span class="border rounded-lg px-3 py-1" style="cursor:pointer;" onclick="plus_adult()">+</span>
                  </td>
                </tr>
                <tr>
                  <td>Children</td>
                  <td class="flex flex-row">
                    <button class="border rounded-lg px-3 py-1 mr-2" type="button" onclick="minus_children()">-</button>
                    <input class="w-[47px] no-spin" type="number" name="no_children" id="children" value="0">
                    <button class="border rounded-lg px-3 py-1" type="button" onclick="plus_children()">+</button>
                  </td>
                </tr>
                <tr>
                  <td>Infant</td>
                  <td class="flex flex-row">
                    <button class="border rounded-lg px-3 py-1 mr-2" type="button" onclick="minus_infant()">-</button>
                    <input class="w-[47px] no-spin" type="number" name="no_infants" id="infant" value="0">
                    <button class="border rounded-lg px-3 py-1" type="button" onclick="plus_infant()">+</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <script type="text/javascript">
            function minus_adult(){
              var count=$("#adult").val();
              count=parseInt(count);
              if (count > 1) {
                count=count-1;
                $("#adult").val(count);
                passenger_count();
              }
              else{
                alert("Minimum 1 passenger is required");
              }
            }
            function plus_adult(){
              var count=$("#adult").val();
              count=parseInt(count);
              count=count+ 1;
              $("#adult").val(count);
              passenger_count();

            }
            function minus_children(){
              var count=$("#children").val();
              count=parseInt(count);
              if (count <1) {

              }
              else{
                count = count - 1;
                $("#children").val(count);
                passenger_count();

              }
            }
            function plus_children(){
              var count=$("#children").val();
              count=parseInt(count);
              count = count + 1;
              $("#children").val(count);
              passenger_count();

            }
            function minus_infant(){
              var count=$("#infant").val();
              count=parseInt(count);
              if (count <1) {

              }
              else{
                count = count - 1;
                $("#infant").val(count);
                passenger_count();

              }
            }
            function plus_infant(){
              var count=$("#infant").val();
              count=parseInt(count);
              count = count + 1;
              $("#infant").val(count);
              passenger_count();
            }

            function passenger_count() {
              var adult=$("#adult").val();
              adult = parseInt(adult);
              var children=$("#children").val();
              children = parseInt(children);
              var infant=$("#infant").val();
              infant = parseInt(infant);

              var total_count=adult + children + infant;
              $("#dropdownMenu1").html(total_count + " Traveller");
              
            }
          </script>
          <div class="dropdown">
            <button class="dropdown-toggle p-0 text-xs" type="button" id="dropdownMenu2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Economy
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="button" onclick="class_type('economy')">Economy</button>
              <button class="dropdown-item" type="button" onclick="class_type('premium_economy')">Premium Economy</button>
              <button class="dropdown-item" type="button" onclick="class_type('business_class')">Business Class</button>
              <button class="dropdown-item" type="button" onclick="class_type('first_class')">First Class</button>
            </div>
          </div>
        </div>
          <input type="hidden" id="class" name="class" value="ECONOMY">

        <script type="text/javascript">
            function class_type(type) {
              if (type=='economy') {
                trip="Economy";
                trip2="ECONOMY";
              }
              else if (type=='premium_economy') {
                trip="Premium Economy";
                trip2="PREMIUM_ECONOMY";
              }
              else if (type=='business_class') {
                trip="Business Class";
                trip2="BUSINESS";
              }
              else{
                trip='First Class';
                trip2='FIRST';
              }
              $("#class").val(trip2);
              $("#dropdownMenu2").html(trip);
            }
          </script>
        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" required name="from_details" class="form-control p-4" id="from_details" oninput="from_search()" placeholder="From">
            <div class="absolute top-full hight-5 left-0 bg-gray-100 border border-gray-500 shadow-lg z-10 px-3">
            <div id="from-suggestion-box"></div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <input type="text" class="form-control p-4" id="to_details" name="to_details" required oninput="to_search()"  placeholder="To">
            <div class="absolute top-full hight-5 left-0 bg-gray-100 border border-gray-500 shadow-lg z-10 px-3">
            <div id="to-suggestion-box" style="display:none;width:auto;"></div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <input class="form-control p-4"  type="text" required id="departure"  name="departure" placeholder="Departure" oninput="set_min_date()"  autocomplete="new-password">
          </div>
          <div class="form-group col-md-3">
              <input class="form-control p-4" type="text" id="return" name="return" placeholder="Return"  autocomplete="new-password" >
          </div>
        </div>
        <script type="text/javascript">
            function trip_type(type) {
              if (type=='round') {
                trip="Round Trip";
                $("#return").show();
              }
              else{
                trip='One Way'
                $("#return").hide();
              }
              $("#trip").val(type);
              $("#dropdownMenu").html(trip);
            }
        </script>
        <div class="flex flex-row-reverse mt-2">
          <button type="submit" class="flex flex-row gap-2 bg-orange-400 rounded-lg text-white px-4 py-2 shadow-sm shadow-black" id="submit-button">  
          Search Flights
          <svg class=" h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
          </button>
        </div>
      </form>

      <form method="post" action="<?php echo base_url();?>Home/hotel_search" id="hotel_div" autocomplete="new-password" style="display: none;">
        <div class="m-2 flex gap-2">
          <div class="flex items-center">
            <input id="default-checkbox" type="checkbox" name="five_star" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 
            rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 
            dark:border-gray-600">
            <label for="default-checkbox" class="text-sm ml-1.5 mt-1.5">5 Stars</label>
          </div>

          <div class="flex items-center">
            <input id="default-checkbox" type="checkbox" name="four_star" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 
            rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 
            dark:border-gray-600">
            <label for="default-checkbox" class="text-sm ml-1.5 mt-1.5">4 Stars</label>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" required name="city" class="form-control p-4" id="" placeholder="Destination">
          </div>
          <div class="form-group col-md-3">
            <input class="form-control p-4"  type="text" required id="check_in"  name="check_in" placeholder="Check-In"  autocomplete="new-password" oninput="set_min_checkout()">
          </div>
          <div class="form-group col-md-3">
              <input class="form-control p-4" type="text" id="check_out" name="check_out" placeholder="Check-Out"  autocomplete="new-password" >
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" required name="customer_name" class="form-control p-4" id="" placeholder="Full Name">
          </div>
          <div class="form-group col-md-3">
            <input class="form-control p-4"  type="text" required id="email"  name="email" placeholder="Email Address"  autocomplete="new-password">
          </div>
          <div class="form-group col-md-3">
              <input class="form-control p-4" type="text" id="phone_no" name="phone_no" placeholder="Phone Number"  autocomplete="new-password" >
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control p-4" id="remarks" name="remarks"  placeholder="Your Remarks">
          </div>
        </div>


        <div class="flex flex-row-reverse mt-2">
          <button type="submit" class="flex flex-row gap-2 bg-orange-400 rounded-lg text-white px-4 py-2 shadow-sm shadow-black">  
          Search Hotels
          <svg class=" h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
          </button>
        </div>
      </form>
      <form method="post" action="<?php echo base_url();?>Home/cab_search" id="cab_div" autocomplete="new-password" style="display: none;">
        <div class="form-row mt-4">
          <div class="form-group col-md-3">
            <input type="text" required name="city" class="form-control p-4" id="city" placeholder="Destination">
          </div>
          <div class="form-group col-md-2">
            <input class="form-control p-4"  type="text" required id="pick_up_date"  name="pick_up_date" placeholder="Pick-up Date"  autocomplete="new-password" oninput="set_min_drop()">
          </div>
          
          <div class="form-group col-md-2">
            <select id="pick_up_time" name="pick_up_time" class="w-full border border-gray-800 rounded-md py-4 text-gray-500">
            <option selected>Pick-up Time</option>
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="1:00 AM">1:00 AM</option>
            <option value="1:30 AM">1:30 AM</option>
            <option value="2:00 AM">2:00 AM</option>
            <option value="2:30 AM">2:30 AM</option>
            <option value="3:00 AM">3:00 AM</option>
            <option value="3:30 AM">3:30 AM</option>
            <option value="4:00 AM">4:00 AM</option>
            <option value="4:30 AM">4:30 AM</option>
            <option value="5:00 AM">5:00 AM</option>
            <option value="5:30 AM">5:30 AM</option>
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="6:00 PM">6:00 PM</option>
            <option value="6:30 PM">6:30 PM</option>
            <option value="7:00 PM">7:00 PM</option>
            <option value="7:30 PM">7:30 PM</option>
            <option value="8:00 PM">8:00 PM</option>
            <option value="8:30 PM">8:30 PM</option>
            <option value="9:00 PM">9:00 PM</option>
            <option value="9:30 PM">9:30 PM</option>
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:30 PM">11:30 PM</option>
            </select>
          </div>
          
          <div class="form-group col-md-2">
              <input class="form-control p-4" type="text" id="drop_date" name="drop_date" placeholder="Drop-off Date"  autocomplete="new-password" >
          </div>
          <div class="form-group col-md-3">
            <select id="drop_time" name="drop_time" class="w-full border border-gray-800 rounded-md py-4 text-gray-500">
            <option selected>Drop-off Time</option>
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="1:00 AM">1:00 AM</option>
            <option value="1:30 AM">1:30 AM</option>
            <option value="2:00 AM">2:00 AM</option>
            <option value="2:30 AM">2:30 AM</option>
            <option value="3:00 AM">3:00 AM</option>
            <option value="3:30 AM">3:30 AM</option>
            <option value="4:00 AM">4:00 AM</option>
            <option value="4:30 AM">4:30 AM</option>
            <option value="5:00 AM">5:00 AM</option>
            <option value="5:30 AM">5:30 AM</option>
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="6:00 PM">6:00 PM</option>
            <option value="6:30 PM">6:30 PM</option>
            <option value="7:00 PM">7:00 PM</option>
            <option value="7:30 PM">7:30 PM</option>
            <option value="8:00 PM">8:00 PM</option>
            <option value="8:30 PM">8:30 PM</option>
            <option value="9:00 PM">9:00 PM</option>
            <option value="9:30 PM">9:30 PM</option>
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:30 PM">11:30 PM</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" required name="customer_name" class="form-control p-4" id="" placeholder="Full Name">
          </div>
          <div class="form-group col-md-3">
            <input class="form-control p-4"  type="email" required id="email"  name="email" placeholder="Email Address"  autocomplete="new-password">
          </div>
          <div class="form-group col-md-3">
              <input class="form-control p-4" type="text" id="phone_no" name="phone_no" placeholder="Phone Number"  autocomplete="new-password" >
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control p-4" id="remarks" name="remarks"  placeholder="Your Remarks">
          </div>
        </div>


        
        <div class="flex flex-row-reverse mt-2">
          <button type="submit" class="flex flex-row gap-2 bg-orange-400 rounded-lg text-white px-4 py-2 shadow-sm shadow-black">  
          Search Cab
          <svg class=" h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <script type="text/javascript">
  function show_flight_div(){
    $("#hotel_div").hide();
    $("#cab_div").hide();
    $("#flight_div").show();
  }
  function show_hotel_div(){
    $("#cab_div").hide();
    $("#flight_div").hide();
    $("#hotel_div").show();
  }
  function show_cab_div(){
    $("#hotel_div").hide();
    $("#flight_div").hide();
    $("#cab_div").show();
  }
  </script>


 

  <div class="flex flex-col mx-auto justify-center items-center mt-28">
    <div class="text-lg">
      WHY CHOOSE <span class="text-orange-500">FARE EXPLORER</span>
    </div>
    <div class="font-bold text-5xl">Core Features</div>
    <div class="max-w-4xl text-center mt-3 text-lg ">
      Explore the world with our exclusive travel packages! From breathtaking beach getaways to thrilling city
      adventures, we have something for every traveler. Book now to enjoy special promotions and create unforgettable
      memories!
    </div>

    <div class="px-2 pb-16">
      <div id="features" class="mx-auto max-w-6xl">
        <ul class="mt-16 grid grid-cols-1 gap-6 text-center md:grid-cols-4">
          <li class="rounded-xl px-6 py-8 shadow-md hover:shadow-2xl">
          <svg class="h-12 w-12 text-blue-500 mx-auto"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z" transform="rotate(-15 12 12) translate(0 -1)" />  <line x1="3" y1="21" x2="21" y2="21" /></svg>
            <h3 class="my-3 font-display text-orange-500 font-bold text-lg">Exceptional Service</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
            We go above and beyond to deliver personalized service and attention to detail, ensuring your journey is as seamless and enjoyable as possible.
            </p>
          </li>
          <li class="rounded-xl px-6 py-8 shadow-md hover:shadow-2xl">
          <svg class="h-12 w-12 text-blue-500 mx-auto"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />  <line x1="3" y1="6" x2="21" y2="6" />  <path d="M16 10a4 4 0 0 1-8 0" /></svg>
            <h3 class="my-3 font-display text-orange-500 font-bold text-lg">Global Network</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
            With our extensive network of partners and suppliers, we have access to exclusive deals and insider experiences that you won't find anywhere else.
            </p>
          </li>
          <li class="rounded-xl px-6 py-8 shadow-md hover:shadow-2xl">
          <svg class="h-13 w-12 text-blue-500 mx-auto"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
          </svg>
          <h3 class="my-3 font-display text-orange-500 font-bold text-lg">100% Secure</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
            We only believe in transparent transactions and no hidden business. you have 100% peace of mind.
            </p>
          </li>
          <li class="rounded-xl px-6 py-8 shadow-md hover:shadow-2xl">
          <svg class="h-12 w-12 text-blue-500 mx-auto"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M16 10h4a2 2 0 0 1 0 4h-4l-4 7h-3l2 -7h-4l-2 2h-3l2-4l-2 -4h3l2 2h4l-2 -7h3z" /></svg>
            <h3 class="my-3 font-display text-orange-500 font-bold text-lg">Peace of Mind</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
            Travel with confidence knowing that you're in good hands. We prioritize your safety and security, providing 24/7 support and assistance whenever you need it.
            </p>
          </li>
        </ul>
      </div>
      <div>
      </div>

   <!--    <div class="flex flex-col mx-auto justify-center items-center mt-36">
        <div class="text-lg">
          WHY CHOOSE <span class="text-orange-500">FARE EXPLORER</span>
        </div>
        <div class="font-bold text-5xl flex flex-1 sm:justify-center sm:items-center">Popular Destination</div>
        <div class="max-w-4xl text-center mt-3 text-lg ">
          From the white sands of Punta Cana to the colorful streets of Aruba and the vibrant nightlife of Miami, these
          destinations promise sun-soaked adventures and memories to last a lifetime
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
          <div class="relative">
            <img class="h-[500px] w-[400px]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
              alt="">
            <div
              class="absolute inset-0 flex flex-col justify-end items-center p-4 bg-gradient-to-b from-[#ccffff] via-[#66ccff] to-blue-500 opacity-75">
              <span class="text-white text-2xl font-bold mb-2 pb-4 text-opacity-100">Your Text Here</span>
              <button
                class="text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL
                US NOW</button>
            </div>
          </div>
        </div>
      </div> -->
    </div>

    <div class="relative bg-fixed bg-center w-full"
      style="background-image: url('https://wallpapercave.com/wp/wp4069419.jpg');">
      <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to- opacity-90"></div>
      <div class="relative flex flex-col justify-center items-center h-full w-auto text-center text-white pt-36 pb-56">
        <h1 class="text-4xl font-bold">No Matter Where You're Going From, We Take You There.</h1>
        <p class="mt-4 max-w-4xl font-semibold text-lg">No matter your origin, we're here to take you to your destination. Our commitment
          extends beyond travel—it's about ensuring your journey is seamless. Rest assured, we're always available to
          address any concerns, providing assistance and support every step of the way. Your satisfaction is our
          priority.</p>
      </div>
    </div>

    <!-- Services Section -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 relative -mt-40 overflow-visible">
      <div class="mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Professional Tour Guide -->
          <div class="bg-white shadow-lg overflow-hidden">
            <div class="p-6 text-center">
              <div class="flex justify-center mb-4">
                <svg class="h-12 w-12 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 20l6-6-2-2-4 4-4-4-2 2 6 6zm-6-2l2 2h12l2-2-8-8-8 8z" />
                </svg>
              </div>
              <h3 class="text-lg leading-6 font-medium text-orange-500">Professional Tour Guide</h3>
              <p class="mt-2 text-base leading-6 text-gray-500">Discover the world's wonders with FareXplorer. Your
                journey begins here, where every moment is an adventure and memories are made.</p>
            </div>
          </div>
          <!-- Certified Travel Agency -->
          <div class="bg-white shadow-lg overflow-hidden">
            <div class="p-6 text-center">
              <div class="flex justify-center mb-4">
                <svg class="h-12 w-12 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M12 2a2 2 0 00-2 2v1H6a2 2 0 00-2 2v2H2v2h2v2H2v2h2v2a2 2 0 002 2h4v1a2 2 0 002 2 2 2 0 002-2v-1h4a2 2 0 002-2v-2h2v-2h-2v-2h2v-2h-2V7a2 2 0 00-2-2h-4V4a2 2 0 00-2-2zm-2 16v-4h4v4h-4zm0-6V8h4v4h-4z" />
                </svg>
              </div>
              <h3 class="text-lg leading-6 font-medium text-orange-500">Certified Travel Agency</h3>
              <p class="mt-2 text-base leading-6 text-gray-500">Your trusted passport to unforgettable adventures.
                Explore the world with confidence through our certified travel agency's expert guidance and seamless
                services.</p>
            </div>
          </div>
          <!-- 24/7 Premium Support -->
          <div class="bg-white shadow-lg overflow-hidden">
            <div class="p-6 text-center">
              <div class="flex justify-center mb-4">
                <svg class="h-12 w-12 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M10 2a8 8 0 00-8 8v4h4v-4H4a6 6 0 0112 0h-2v4h4v-4a8 8 0 00-8-8zM8 12h4v2H8v-2zm-1 4h6v2H7v-2z" />
                </svg>
              </div>
              <h3 class="text-lg leading-6 font-medium text-orange-500">24/7 Premium Support</h3>
              <p class="mt-2 text-base leading-6 text-gray-500">Experience peace of mind with our 24/7 premium support.
                Our dedicated team is here round-the-clock to assist you with any travel needs or concerns.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Deals Designed For You -->
    <div class="flex flex-col mx-auto justify-center items-center mt-36">
      <div class="text-lg">
        WHY CHOOSE <span class="text-orange-500">FARE EXPLORER</span>
      </div>
      <div class="font-bold text-5xl flex flex-1 sm:justify-center sm:items-center">Deals Designed For You</div>
      <div class="max-w-4xl text-center mt-3 text-lg ">
        Discover your perfect getaway with deals designed just for you. Whether it's a relaxing beach retreat or an
        exhilarating city escape, we tailor unforgettable experiences to suit your every desire.
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://static1.simpleflyingimages.com/wordpress/wp-content/uploads/2021/08/unnamed-1-1.jpg" alt="">
          <div class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Business Travel</span>
          </div>
        </div>
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://www.newdelhiairport.in/media/2289/enhance-your-in-flight-experience-blog-banner.jpg" alt="">
          <div
            class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Family Travel</span>
          </div>
        </div>
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://www.iata.org/contentassets/50c13a3a49634adfb00240e18b270e88/web_man-on-train-watching-plane_credit_ollyy_shutterstock_10665658.jpg" alt="">
          <div
            class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Urgent Travel</span>
          </div>
        </div>
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://www.travelandleisure.com/thmb/uZ3Z4F0RSiwi_b1jJcaqoIdjMdo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/emergency-procedures-EMPRO1016-7a8402c91ce846c385fd37e32c4f5bc9.jpg" alt="">
          <div
            class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Romantic Travel</span>
          </div>
        </div>
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://upload.wikimedia.org/wikipedia/commons/0/03/013_Tokyo_Narita_International_Airport%2C_Japan_-_%E3%83%A6%E3%83%8A%E3%82%A4%E3%83%86%E3%83%83%E3%83%89%E8%88%AA%E7%A9%BA.JPG" alt="">
          <div
            class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Luxury Travel</span>
          </div>
        </div>
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://post.healthline.com/wp-content/uploads/2020/10/toddler-on-flight-1296x728-header.jpg" alt="">
          <div
            class="absolute inset-0 flex flex-col justify-center items-center p-4 bg-gradient-to-t from-blue-400 to- opacity-75">
            <span class="text-white text-2xl mb-2 pb-4 text-opacity-100">Last Minute Travel</span>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="relative bg-fixed bg-center w-full mt-5"
    style="background-image: url('https://images.wallpaperscraft.com/image/single/girl_travel_camping_166108_1920x1080.jpg');">
    <div class="absolute inset-0 bg-gradient-to-t from-black to-black opacity-65"></div>
    <div class="relative flex flex-col justify-center items-center h-full text-center text-white pt-36 pb-56">
      <h1 class="text-4xl text-orange-500">Discount up to 50%, only this month only.</h1>
      <p class="mt-4 text-lg max-w-5xl">For a limited time, enjoy discounts of up to 50% on selected Destinations! 
        This exclusive offer is available for this month only. Don't miss out on the chance to save big. 
        Hurry and shop now to take advantage of these incredible savings before they're gone.</p>
      <button class="py-2 px-4 mt-3 font-bold rounded-lg bg-orange-500">CALL TO CLAIM PROMO CODE</button>
    </div>
  </div>

  <!-- Statistics Section -->
  <div class="flex justify-center max-w-full sm:px-6 lg:px-8 relative -mt-14 overflow-visible">
    <div class="bg-white shadow-lg overflow-hidden">
      <div class="p-6 text-center flex flex-col justify-center items-center">
        <div class="w-full flex-row lg:flex justify-around items-center border-b-2 border-gray-200 pb-6">
          <div class="text-center p-4">
            <div class="text-8xl text-orange-500">14K+</div>
            <div class="text-sm text-gray-500">Happy Traveler</div>
          </div>
          <div class="border-r-2 border-gray-200 h-16 mx-4"></div>
          <div class="text-center p-4">
            <div class="text-8xl text-orange-500">4.8</div>
            <div class="text-sm text-gray-500">Review Customer</div>
          </div>
          <div class="border-r-2 border-gray-200 h-16 mx-4"></div>
          <div class="text-center p-4">
            <div class="text-8xl text-orange-500">247+</div>
            <div class="text-sm text-gray-500">Destinations</div>
          </div>
          <div class="border-r-2 border-gray-200 h-16 mx-4"></div>
          <div class="text-center p-4">
            <div class="text-8xl text-orange-500">55+</div>
            <div class="text-sm text-gray-500">Country Place</div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="flex flex-col mx-auto justify-center items-center mt-36">
    <div class="text-lg">
      WHY CHOOSE <span class="text-orange-500">FARE EXPLORER</span>
    </div>
    <div class="font-bold text-5xl flex flex-1 sm:justify-center sm:items-center">Top Airline Deals</div>
    <div class="max-w-4xl text-center mt-3 text-lg ">
      Unlock the skies with our top airline deals, where luxury meets convenience. Experience exclusive services
      tailored to elevate your journey, from priority boarding to personalized in-flight amenities. Your comfort
      is our commitment.
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
      <div class="overflow-hidden shadow-lg">
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://flightsden.com/wp-content/uploads/2024/04/Amercian.jpg"
            alt="Sunset in the mountains">
          <div class="absolute inset-0 bg-gradient-to-b from-[#ccffff] to-[#33ccff] opacity-30"></div>
        </div>
        <div class="pt-3">
          <div class="font-bold text-xl mb-2 flex justify-center items-center">AMERICAN AIRLINES (AA)</div>
        </div>
        <div class="flex justify-center items-center">
          <a href="tel:<?php echo $site_settings->phone_no;?>"><button class="mb-3 text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL US NOW</button></a>
        </div>
      </div>
      <div class="overflow-hidden shadow-lg">
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://flightsden.com/wp-content/uploads/2024/04/united-airlines.jpg"
            alt="Sunset in the mountains">
          <div class="absolute inset-0 bg-gradient-to-b from-[#ccffff] to-[#33ccff] opacity-30"></div>
        </div>
        <div class="pt-3">
          <div class="font-bold text-xl mb-2 flex justify-center items-center">United Airlines (UA)</div>
        </div>
        <div class="flex justify-center items-center">
          <a href="tel:<?php echo $site_settings->phone_no;?>"><button class="mb-3 text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL US NOW</button></a>
        </div>
      </div>
      <div class="overflow-hidden shadow-lg">
        <div class="relative">
          <img class="h-[200px] w-[400px]" src="https://flightsden.com/wp-content/uploads/2024/04/Delta-Airlines.jpg"
            alt="Sunset in the mountains">
          <div class="absolute inset-0 bg-gradient-to-b from-[#ccffff] to-[#33ccff] opacity-30"></div>
        </div>
        <div class="pt-3">
          <div class="font-bold text-xl mb-2 flex justify-center items-center">DELTA AIRLINES (DL)</div>
        </div>
        <div class="flex justify-center items-center">
          <a href="tel:<?php echo $site_settings->phone_no;?>"><button class="mb-3 text-white font-semibold text-xs py-1 px-4 bg-orange-500 border border-white rounded text-opacity-100">CALL US NOW</button></a>
        </div>
      </div>
    </div>
  </div>
  <script>
  function from_search() {
    
    var city=$("#from_details").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>Home/airport_search",
      data:{
        city:city
      },
      beforeSend: function(){
     
      },
      success: function(data){
        // console.log(data);
        var response=JSON.parse(data);
        var details=response['data'];
        var Len=details.length;

        $("#from-suggestion-box").html("");
        for (let i = 0; i < Len && i < 10; i++){
        
          $("#from-suggestion-box").show();
         
          var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='from_choose(\""+details[i]['address']['cityCode']+"\",\""+details[i]['name']+"\")'><span style='font-size:14px;color:black;line-height:1.42857143;font-family:\'Open Sans\', sans-serif;'>("+details[i]['address']['cityCode']+")&nbsp;&nbsp;<span style='text-transform:capitalize;'>"+details[i]['name'].toLowerCase()+", &nbsp;&nbsp;";

            if (details[i]['address']['countryCode']=="US"){
              var state_name=getStateName(details[i]['address']['stateCode']);
              data=data + state_name.toLowerCase();
            }
            else{
              data=data + details[i]['address']['countryName'].toLowerCase();
            }
          data = "" +data + "</span><span>";
          $("#from-suggestion-box").append(data);
          i++;
        }

        // IF Search Wise City Do Not Work Then Search By Airport Code
        if (Len<1) {
          from_search_code();
        }
      }
    }); 
  }

  function from_search_code() {

    var city=$("#from_details").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>Home/airport_code_search",
      data:{
        city:city
      },
      beforeSend: function(){
     
      },
      success: function(data){
        // console.log(data);
        var response=JSON.parse(data);
        var details=response['data'];
        var Len=details.length;

        $("#from-suggestion-box").html("");
        for (let i = 0; i < Len && i < 10; i++){
        
          $("#from-suggestion-box").show();
         // console.log(details[i]);
          var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='from_choose(\""+details[i]['iataCode']+"\",\""+details[i]['name']+"\")'><span style='font-size:14px;color:black;line-height:1.42857143;font-family:\'Open Sans\', sans-serif;'>("+details[i]['iataCode']+")&nbsp;&nbsp;<span style='text-transform:capitalize;'>"+details[i]['name'].toLowerCase()+", &nbsp;&nbsp;";
          // var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='from_choose(\""+details[i]['address']['cityCode']+"\",\""+details[i]['name']+"\")'><span style='font-size:14px;color:black;line-height:1.42857143;font-family:\'Open Sans\', sans-serif;'>("+details[i]['address']['cityCode']+")&nbsp;&nbsp;<span style='text-transform:capitalize;'>"+details[i]['name'].toLowerCase()+", &nbsp;&nbsp;";

            if (details[i]['address']['countryCode']=="US"){
              var state_name=getStateName(details[i]['address']['stateCode']);
              data=data + state_name.toLowerCase();
            }
            else{
              data=data + details[i]['address']['countryName'].toLowerCase();
            }
          data = "" +data + "</span><span>";
          $("#from-suggestion-box").append(data);
          i++;
        }

       
      }
    });
  }

  function from_choose(airport_code,city) {
    $("#from").val(airport_code);
    // alert(1);
    var text=airport_code + "-" + city;
    $("#from_details").val(text);
    $("#from-suggestion-box").html("");
    $("#from-suggestion-box").hide();
  }
  function to_search() {
    var city=$("#to_details").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>/Home/airport_search",
      data:{
        city:city
      },
      beforeSend: function(){
        // $("#to").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function(data){
        // console.log(data);
        var response=JSON.parse(data);
        var details=response['data'];
        var Len=details.length;
        $("#to-suggestion-box").html("");
        for (let i = 0; i < Len && i < 10; i++){
          $("#to-suggestion-box").show();
          var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='to_choose(\""+details[i]['address']['cityCode']+"\",\""+details[i]['name']+"\")'><span style='font-size:14px;color:black;line-height:1.42857143;font-family:\'Open Sans\', sans-serif;'>("+details[i]['address']['cityCode']+")&nbsp;&nbsp;<span style='text-transform:capitalize;'>"+details[i]['name'].toLowerCase()+", &nbsp;&nbsp;";

            if (details[i]['address']['countryCode']=="US"){
              var state_name=getStateName(details[i]['address']['stateCode']);
              data=data + state_name.toLowerCase();
            }
            else{
              data=data + details[i]['address']['countryName'].toLowerCase();
            }
          data = "" +data + "</span><span>";
          $("#to-suggestion-box").append(data);

          i++;
        }
        if (Len<1) {
          to_search_code();
        }
      }
    });
  }

  function to_search_code() {

    var city=$("#to_details").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>Home/airport_code_search",
      data:{
        city:city
      },
      beforeSend: function(){
     
      },
      success: function(data){
        // console.log(data);
        var response=JSON.parse(data);
        var details=response['data'];
        var Len=details.length;

        $("#to-suggestion-box").html("");
        for (let i = 0; i < Len && i < 10; i++){
        
          $("#to-suggestion-box").show();
         
          var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='to_choose(\""+details[i]['iataCode']+"\",\""+details[i]['name']+"\")'><span style='font-size:14px;color:black;line-height:1.42857143;font-family:\'Open Sans\', sans-serif;'>("+details[i]['iataCode']+")&nbsp;&nbsp;<span style='text-transform:capitalize;'>"+details[i]['name'].toLowerCase()+", &nbsp;&nbsp;";

            if (details[i]['address']['countryCode']=="US"){
              var state_name=getStateName(details[i]['address']['stateCode']);
              data=data + state_name.toLowerCase();
            }
            else{
              data=data + details[i]['address']['countryName'].toLowerCase();
            }
          data = "" +data + "</span><span>";
          $("#to-suggestion-box").append(data);
          i++;
        }
       
       
      }
    });
  }


  function to_choose(airport_code,city) {
    $("#to").val(airport_code);
    var text=airport_code + "-" + city;
    $("#to_details").val(text);
    $("#to-suggestion-box").html("");
    $("#to-suggestion-box").hide();
  }

  function getStateName(stateCode) {
    const stateCodes = {
      'AL': 'Alabama',
      'AK': 'Alaska',
      'AZ': 'Arizona',
      'AR': 'Arkansas',
      'CA': 'California',
      'CO': 'Colorado',
      'CT': 'Connecticut',
      'DC':'Washington DC',
      'DE': 'Delaware',
      'FL': 'Florida',
      'GA': 'Georgia',
      'HI': 'Hawaii',
      'ID': 'Idaho',
      'IL': 'Illinois',
      'IN': 'Indiana',
      'IA': 'Iowa',
      'KS': 'Kansas',
      'KY': 'Kentucky',
      'LA': 'Louisiana',
      'ME': 'Maine',
      'MD': 'Maryland',
      'MA': 'Massachusetts',
      'MI': 'Michigan',
      'MN': 'Minnesota',
      'MS': 'Mississippi',
      'MO': 'Missouri',
      'MT': 'Montana',
      'NE': 'Nebraska',
      'NV': 'Nevada',
      'NH': 'New Hampshire',
      'NJ': 'New Jersey',
      'NM': 'New Mexico',
      'NY': 'New York',
      'NC': 'North Carolina',
      'ND': 'North Dakota',
      'OH': 'Ohio',
      'OK': 'Oklahoma',
      'OR': 'Oregon',
      'PA': 'Pennsylvania',
      'RI': 'Rhode Island',
      'SC': 'South Carolina',
      'SD': 'South Dakota',
      'TN': 'Tennessee',
      'TX': 'Texas',
      'UT': 'Utah',
      'VT': 'Vermont',
      'VA': 'Virginia',
      'WA': 'Washington',
      'WV': 'West Virginia',
      'WI': 'Wisconsin',
      'WY': 'Wyoming'
    };

    return stateCodes[stateCode];
}

</script>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
  // $("#departure").datepicker({mindate:0});
  // $("#return").datepicker({});
  $("#departure").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
  $("#return").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
  $("#check_in").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
  $("#check_out").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
  $("#pick_up_date").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
  $("#drop_date").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});

  function set_min_date() {
    var departure=$("#departure").val();
    $("#return").flatpickr({dateFormat:'M d,Y',minDate:departure,allowInput: true});
    // var dates=departure.split("");
  }
  function set_min_checkout() {
    var check_in=$("#check_in").val();
    $("#check_out").flatpickr({dateFormat:'M d,Y',minDate:check_in,allowInput: true});
  }

  function set_min_drop() {
    // alert(1111);
    var pick_up_date=$("#pick_up_date").val();
    $("#drop_date").flatpickr({dateFormat:'M d,Y',minDate:pick_up_date,allowInput: true});
  }
</script>
<?php $this->load->view('footer');?>
