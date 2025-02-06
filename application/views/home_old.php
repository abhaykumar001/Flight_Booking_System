<?php 
$this->load->view('header');
?>
<style>
	
	.main-choices-div{
		display: flex;
		flex-direction: column;
		font-size: small;
		flex-shrink: 0;
		flex-grow: 1;
	}
	#from-suggestion-box {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
	z-index:1000;
	}
	#from-suggestion-box::-webkit-scrollbar { 
		display: none;  /* Safari and Chrome */
	}
	.noborder{
		border:none;
		display:flex;
		width:95%;
		padding-bottom:9%
	}
	#to-suggestion-box {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
	}
	.date-select-new{
		max-width:96.5%;
	}
	.main-choices-div{
		margin-top:2%
	}
	#form-search-submit{
		left:16.5% !important
	}
	#to-suggestion-box::-webkit-scrollbar { 
		display: none;  /* Safari and Chrome */
	}
	.date-select-new{
		margin-left:1%;
		width: 96%;
	}
	#class-select{
		width: 98% !important;
	}
	.selection-class{
		margin-left:1%;
		margin-top:0% !important;
		margin-right:0% !important
	}
	#banner50Off{
		border:1px solid grey;
		margin-right:5%
	}
	.input-in-num-input{
		text-align: center;
		flex-grow: 1;
		margin-left: 2% !important;
		margin-right: 2%;
		border: 1px solid #0068ef;
		border-radius: 6px !important;
	}
	#main-body{
		padding-top:3%!important
	}
	#choice-search-form{
		width:35%;
		margin-left:4%
	}
	.suggestion-entry {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: flex-start;
		padding: 1%;
/*		background-color: #efebeb;*/
		margin-bottom: 1%;
		padding-left: 2%;
		padding-right: 2%;
		border-radius: 6px;
	}
	.suggestion-city-name{
		font-family:sans-sarif;
		color:black;
	}
	.suggestion-city-code{
		font-size:18px;margin-top:13px;font-weight:600;
	}
	.banner-parent{
		width:100%;
		max-width:100%;
		text-align: center;
	}
	.offer-banner{
		margin-top: 4%;
		width:35%;
		margin-bottom: 4%
	}
	.contact-banner{
		width:100%;
		max-width:1694px;
		margin-bottom: 4%;
		margin-top: 4%;
	}
	.suggestion-entry{
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: flex-start;
	}
	legend{
		color:black
	}
	@media only screen and (min-width:200px) and (max-width:650px){
		#choice-search-form{
			width:90%;
			margin-left:auto;
			margin-right:auto
		}
		#form-search-submit{
			left:40% !important
		}
		.padding-for-inp{
			padding:5% !important
		}
		.noborder{
			padding-bottom:15% !important
		}
	}

	
	@media only screen and (min-width:200px) and (max-width:300px){
		#form-search-submit{
			left:20% !important
		}
	}
	@media only screen and (min-width:300px) and (max-width:400px){
		#form-search-submit{
			left:30% !important
		}
	}
	@media only screen and (min-width:400px) and (max-width:500px){
		#form-search-submit{
			left:34.5% !important
		}
	}
	@media only screen and (min-width:500px) and (max-width:650px){
		#form-search-submit{
			left:36.5% !important
		}
	}
	@media only screen and (min-width:650px) and (max-width:1080px){
		#choice-search-form{
			width:55%
		}
		#form-search-submit{
			left:23.5% !important
		}
	}
	@media only screen and (min-width:1080px) and (max-width:1480px){
		#choice-search-form{
			width:45%
		}
		#form-search-submit{
			left:21.5% !important
		}
	}

	@media only screen and (min-width:300px) and (max-width:650px){
		.selection-class{
			padding-bottom:10% !important;
			padding-top:10% !important;

		}
	}
	@media only screen and (min-width:650px) and (max-width:1080px){
		#number-select-div {
			display: flex;
			position: absolute;
			flex-direction: column;
			background-color: white;
			padding: 1%;
			font-size: small;
			z-index: 100;
			right: 13%;
			margin-left: -12.6%;
			width: 30%;
			border-radius: 6px;
		}
	}
	@media only screen and (max-width:650px){
		#number-select-div {
			display: flex;
			position: absolute;
			flex-direction: column;
			background-color: white;
			padding: 1%;
			font-size: small;
			right: 13%;
			z-index: 99999;
			margin-left: -12.6%;
			width: 75%;
			border-radius: 6px;
		}
		.offer-banner{
			margin-top: 4%;
			width:75%;
			margin-bottom: 4%;
		}
		#banner50Off{
			margin-right:0
		}
	}
	.padding-for-inp {
		padding: 2%;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div id="main-body" style="background: url('<?php echo base_url();?>assets/1_new.jpg');background-size:cover;">
	<!-- <h3 id="message">Fly More! Spend Less!</h3> -->
	<div id="showLoad" style="position: fixed;width: 100%;margin-left: auto;margin-right: auto;background-color: rgba(255, 255, 255, 0.75);top: 8%;height: 92vh;align-items: center;justify-content: center;display: none;z-index:999999">
		<img src="<?php echo base_url();?>assets/images/loading-image.gif" alt="loading...">
	</div>
	<form id="choice-search-form" method="get" action="<?php echo base_url();?>Home/flight_search" onsubmit="showLoading()" style="background: rgb(205,222,228);background: linear-gradient(90deg, rgba(205,222,228,1) 1%, rgba(100,194,231,1) 34%, rgba(117,202,235,1) 70%, rgba(238,247,250,0.2) 100%);">	
		<!-- <input type="hidden" name="no_adults" id="no_adults" value="1"> -->
		<!-- <input type="hidden" name="no_children" id="no_children" value="0"> -->
		<div id="choice-flex-container">
			<div class="choice-flex" style="border:1px solid black;">
				<input onclick="radioClick(this)" class="radio" type="radio" id="round" name="triptype" value="round" checked>
				<label   for="round" style="color:black;font-weight: 600;"> Round</label>
			</div>
			<div class="choice-flex" style="border:1px solid black;">
				<input onclick="radioClick(this)" type="radio" id="oneway" name="triptype" value="oneway" > 
				<label  for="oneway" style="color:black;font-weight: 600;"> One Way</label>
			</div>
		</div>
		<div class="main-choices-div">
			<div class="sub-main-choices-div">
				<div style="flex-grow:1">
					<legend>From</legend>
					<fieldset class="input-class" style="min-width: 15%;flex-grow: 1;background: white;">
						<input type="text" id="from_details" class="padding-for-inp" required name="from_details" placeholder="Travel From" oninput="from_search()" autocomplete="false">
						<input type="hidden" id="from" name="from">
						<div id="from-suggestion-box" style="display:none;width:auto;"></div>
					</fieldset>
				</div>
				<div style="flex-grow:1">
					<legend>To</legend>
					<fieldset class="input-class" style="min-width: 15%; flex-grow: 1;background: white;">
						<input type="text" id="to_details" class="padding-for-inp" name="to_details" required style="margin-right:-1%" placeholder="Travel To" oninput="to_search()"  autocomplete="false">
						<input type="hidden" id="to" name="to" required>
						
						<div id="to-suggestion-box" style="z-index: 1;display:none;width:auto;"></div>
					</fieldset>
				</div>
			</div>
			<div class="sub-main-choices-div">
				<div style="flex-grow:1;max-width: 50%;">
					<legend style="color:black;">Departure</legend>
					<fieldset class="input-class date-select-new" style="background: white;">
						<input class="input-class padding-for-inp"  type="text" required id="departure"  name="departure" placeholder="mm-dd-yyyy" oninput="set_min_date()"  autocomplete="false">
					</fieldset>
				</div>
				<div style="flex-grow:1;max-width: 50%;" id="retun_div">
					<legend>Return</legend>
					<fieldset class="input-class date-select-new"  style="background: white;">
						<input class="input-class date-input-new padding-for-inp" type="text" id="return" name="return" placeholder="mm-dd-yyyy"  autocomplete="false" required>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="main-choices-div">
			<div class="sub-main-choices-div">
				<div style="flex-grow:1;max-width:26%">
					<legend style="color:black;">Class</legend>
					<select class="selection-class spacing" name="class-select" id="class-select" style="padding-bottom: 8% ;padding-top: 8%">
						<option value="ECONOMY">Economy</option>
						<option value="PREMIUM_ECONOMY">Premium Economy</option>
						<option value="BUSINESS">Business Class</option>
						<option value="FIRST">First Class</option> 
					</select>		
				</div>
				<div style="flex-grow:1">
					<legend style="color:black;">Adults</legend>
					
					<fieldset class="input-class padding-for-inp" style="min-width: 15%; flex-grow: 1;background: white;">
						<select name="no_adults" class="input-class noborder" style="padding-bottom:9% !important;padding-top:9% !important">
							<option value="1" selected>1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</fieldset>
				</div>
				<div style="flex-grow:1;">
					<legend style="color:black;">Children</legend>
					<fieldset class="input-class padding-for-inp" style="min-width: 15%; flex-grow: 1;background: white;">
						<select name="no_children" class="input-class noborder" style="padding-bottom:8% !important;padding-top:8% !important">
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</fieldset>
				</div>
				<div style="flex-grow:1">
					<legend style="color:black;">Infants</legend>
					<fieldset class="input-class padding-for-inp" style="min-width: 15%; flex-grow: 1;background: white;">
						<select name="no_infants" class="input-class noborder" style="padding-bottom:9% !important;padding-top:9% !important">
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</fieldset>
				</div>
			</div>
		</div>
		<div id="number-select-div" style="display:none">
			<fieldset class="input-class spacing padding">
				<legend>Adults</legend>
				<div class="input-group inline-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-secondary btn-minus" onclick="passenger_detail('adult_minus')">
						<i class="fa fa-minus"></i>
						</button>
					</div>
					<input min="1" max="10" type="number" id="adults" class="input-in-num-input"  value="1">
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary btn-plus" onclick="passenger_detail('adult_plus')">
						<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
			</fieldset>
			<fieldset class="input-class spacing padding">
				<legend>Child<span>(2+)</span></legend>
				<div class="input-group inline-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-secondary btn-minus" onclick="passenger_detail('child_minus')">
						<i class="fa fa-minus"></i>
						</button>
					</div>
					<input min="0" max="10" type="number" id="child" class="input-in-num-input" value="0">
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary btn-plus" onclick="passenger_detail('child_plus')">
						<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
			</fieldset>
<!-- 			<fieldset class="input-class spacing padding">
				<legend>Infant<span>(0-2)</span></legend>
				<div class="input-group inline-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-secondary btn-minus" onclick="passenger_detail()">
						<i class="fa fa-minus"></i>
						</button>
					</div>
					<input min="0" max="10" type="number" id="infants" class="input-in-num-input" value="0">
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary btn-plus" onclick="passenger_detail()">
						<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
			</fieldset> -->
		</div>
		<button class="input-class" id="form-search-submit">Search Flights</button>
	</form>
</div>
<script type="text/javascript">
	function passenger_detail(type) {
		var adults=$("#adults").val();
		adults=parseInt(adults);
		var child=$("#child").val();
		child=parseInt(child);
		if (type=='child_minus') {
			child=child - 1; 
		}
		else if (type=='child_plus') {
			child=child + 1; 
		}
		else if (type=='adult_minus') {
			adults=adults - 1;
		}
		else if (type=='adult_plus') {
			adults=adults + 1;
		}
		var txt= adults + " Adult" ;
		if (adults>1) {
			txt=txt+"s";
		}
		if (parseInt(child)>0) {
			txt=txt + ", " + child + "children";
		}  
		$("#travellers-state").html(txt);
		// alert(txt);
		$("#no_adults").val(adults);
		$("#no_children").val(child);
	}
</script>
<div class="banner-parent">
	<img class="contact-banner" src="<?php echo base_url();?>assets/6_new.jpg" alt=""> 
</div>
<div id="security-container">
	<div class="flex-container">
		<img src="<?php echo base_url();?>assets/images/encrypted.png" alt="" srcset="">
		<div class="empty-class"></div>
		<div class="security-subcontainer">
			<h3>Flexible Bookings</h3>
			Plans change. That’s why we offer flexible cancellation on most flights.
		</div>
	</div>
	<div class="flex-container">
		<img src="<?php echo base_url();?>assets/images/dollar.png" alt="" srcset="">
		<div class="empty-class"></div>
		<div class="security-subcontainer">
			<h3>Great Deals</h3>
			Check out with confidence. Booked2Fly members always get our best price.
		</div>
	</div>
	<div class="flex-container">
		<img src="<?php echo base_url();?>assets/images/help.png" alt="" srcset="">
		<div class="empty-class"></div>
		<div class="security-subcontainer">
			<h3>Help and assistance</h3>
			We’re always here for you – reach us 24 hours a day, 7 days a week.
		</div>
	</div>
</div>
<div class="banner-parent">
	<img class="contact-banner" src="<?php echo base_url();?>assets/5_new.jpg" alt=""> 
</div>
<!-- <div class="banner-parent">

	<img id="banner50Off" class="offer-banner" src="<?php echo base_url();?>assets/1.png" alt="">
	<img class="offer-banner" src="<?php echo base_url();?>assets/2.jpg" alt=""> 
</div> -->

<script type="text/javascript">
	function showLoading(){
		document.getElementById('showLoad').style.display = 'flex';
	}
	window.addEventListener('beforeunload', function() {
        document.getElementById('showLoad').style.display = 'flex';
    });
	function radioClick(element){
		const returnDiv= document.getElementById("return")

		if(element.id=="oneway"){
			$("#retun_div").hide();
			$("#return").prop('required',false);

		}else{
			$("#retun_div").show();
			$("#return").prop('required',true);
			returnDiv.parentElement.style.border="2px solid #0068EF"
		}
	}
	function displayPassengerSelect(){
		const selection = document.getElementById("number-select-div")
		console.log("from js")
		if(selection.style.display=="none"){
			selection.style.display="flex"
		}else{
			selection.style.display="none"
		}
	}
	function checkMobileMenu(){
		const selection = document.getElementById("nav-links-container")
		if(selection.style.display=="none"){
			selection.style.display="flex"
		}else{
			selection.style.display="none"
		}
	}

	function airport_change() {
		var from=$("#from").val();
		var to=$("#to").val();
		$("#from").val(to);
		$("#to").val(from);
	}
	var fromClickHandler = function(event){
		if($(event.target).is("#from,#from-suggestion-box,#from-suggestion-box *")) return;
		$("#from-suggestion-box").hide()
	}
	$(document).on("click", fromClickHandler);
	var toClickHandler = function(event){
		if($(event.target).is("#to,#to-suggestion-box,#to-suggestion-box *")) return;
		$("#to-suggestion-box").hide()
	}
	$(document).on("click", toClickHandler);
	$('.btn-plus, .btn-minus').on('click', function(e) {
		const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
		const input = $(e.target).closest('.input-group').find('input');
		if (input.is('input')) {
			input[0][isNegative ? 'stepDown' : 'stepUp']()
		}
	})
</script>
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
				// $("#from").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				// console.log(data);
				var response=JSON.parse(data);
				var details=response['data'];
				var Len=details.length;
				$("#from-suggestion-box").html("");
				for (let i = 0; i < Len; i++){
					// const from_suggestions = document.getElementById("from-suggestion-box")
					// from_suggestions.style.display="block";
					$("#from-suggestion-box").show();
					// var data="<div class='suggestion-entry' style='cursor:pointer;' onclick='from_choose(\""+details[i]['address']['cityCode']+"\",\""+details[i]['name']+"\")'><div class='city-parent-div'><div class='suggestion-city-name'>"+details[i]['name']+"</div>"+"<div class='suggestion-country'>";
					// 	if (details[i]['address']['countryCode']){
					// 		var state_name=getStateName(details[i]['address']['stateCode']);
					// 		data=data + state_name;
					// 	}
					// 	else{
					// 		data=data + details[i]['address']['countryName'];
					// 	}
					// 	data= data +"</div></div>"+"<div class='suggestion-city-code'>"+
					// 				details[i]['address']['cityCode']+"</div></div>";
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
				for (let i = 0; i < Len; i++){
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
<script type="text/javascript">
	// $("#departure").datepicker({mindate:0});
	// $("#return").datepicker({});
	$("#departure").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});
	$("#return").flatpickr({dateFormat:'M d,Y',minDate:"today",allowInput: true});

	function set_min_date() {
		var departure=$("#departure").val();
	$("#return").flatpickr({dateFormat:'M d,Y',minDate:departure,allowInput: true});
		// var dates=departure.split("");
	}
</script>
<?php 
$this->load->view('footer');
?>