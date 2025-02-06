<?php $this->load->view('header');?>
<?php 
$adult=$this->session->userdata('no_passengers');
$children=$this->session->userdata('children');
if ($children=="") {
 $children=0;
}
$infant=$this->session->userdata('infant');
if ($infant=="") {
 $infant=0;
}
$passengers=$adult + $children + $infant;
// print_r($this->session->userdata('passengers'));
?>
<style>
@media only screen and (min-width:650px)and (max-width:880px) {
	#class-select-div{
		/* width:90vw; */
	}
}
@media only screen and (min-width:1440px) {
	#class-select-div{
		/* width:60vw; */
	}
	.overflow-in-search{
		overflow:auto !important;
	}
}

@media only screen and (min-width:880px)and (max-width:1440px) {
	#class-select-div{
		/* width:75vw; */
	}
}
@media only screen and (max-width:650px) {
	.result-head-statement{
		flex-direction:column !important
	}
	.result-head-statement h2{
		max-width:100% !important;
		font-size:large !important;
	}
	.result-head-statement button{
		margin-right:0% !important;
		margin-bottom:3%
	}
	.between-time{
		margin-right: 1%;
		min-width: 24%;
	}
	.flight-duration, .stops-info{
		font-size:small !important;
	}
	#class-select-div{
		width:90vw;
		flex-direction:column !important;
	}

}
.overflow-in-search{
	overflow:scroll;
}
#class-select-div{
	background-color:white;
	box-shadow: 0 1px 6px 0 rgba(0,0,0,.2);
	right:0;    
	border: 1px solid #d5d5d5;
	flex-direction:row
}
.between-from-time{
	display:inline-block
}
@media only screen and (max-width:450px) {
	.details-for-each-flight >* {
		flex-grow: 1;
		margin-right: 5%;
		font-size:medium !important
	}
	/* .between-head{
		font-size:small;
	}
	.between-from-time{
	} */
	.between-from-time {
		color: black;
		font-weight: 100 !important;
		font-size:10px !important;

	}
}
#results-container{
	width:100% !important
}
.result-head-statement h2{
	max-width:80%;
	font-size:x-large;
}
@media only screen and (max-width:890px) {
	#results-container{
		width:100% !important
	}
	#choice-search-form{
		width:90%;
		margin-left:auto;
		margin-right:auto;
	}
}
@media only screen and (max-width:1650px) {
	#results-parent{
		margin-top:2%
	}
	.price *{
		margin-bottom: 0
	}
	#flight-results-container{
		padding-top:0%
	}
	.flight-booking-main{
		margin-bottom:2%
	}
	.between-head{
		font-size:large
	}
	.between-from{
		font-size:medium
	}
}
h3{
	font-size:medium
}
.flight-booking-main{
	margin-bottom:2%
}
.stops-info{
	margin-bottom:0
}
.price-trip{
	font-size:x-large;
	width:max-content
}
.support-details{
	margin-bottom:0
}

#results-container{
	display: flex;
    flex-direction: column;
    border-radius: 8px;
    width: auto;
    padding-bottom: 4.5%;
    padding-top: 1%;
	padding-left:2%;
    text-align: center;
	background-color:#fff;
    border: 1px solid #dddddd;
}
.selection-class-filter{
	font-size:small
}
.flight-duration{
	color:green
}
.nonstop-subdiv{
	padding:5%
}
.flight-details{
	padding:0% !important
}
.nonstop-subdiv>*{
	font-size:small
}
.filter-submit{
	font-size:medium
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
.flight-booking-main, .flight-booking-footer {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 96%;
}
.flight-booking-footer{
	margin-bottom: 1%;
}
.flight-details-btn{
	padding: 0.5% 2%;
	border:2px solid #0068ef;
	background-color:white
}

.support-details{
	color:green;
	font-size:small
}
.details-for-each-flight{
	display: flex;
    flex-direction: row;
	margin-bottom:2%
}
.details-for-each-flight *{
	font-size:medium
}
.details-for-each-flight >*{
	flex-grow:1;

}
.book-btn{
	padding: 0.8% 4%;
	border:none;
    font-size: large;
	background-color:#0068ef;
	color:white
}
#flight-results-container{
	display: flex;
	flex-direction: column;
	padding-top:1%;
	padding-bottom:1%;
	border-top: 1px solid #dddddd
}
.price{
	text-align:left
}
.price p{
	color:grey;
	font-size:small
}
.between-from-time{
	color:black;
	font-weight:900
}
.flight-company{
	display:flex;
	flex-direction: row;
	align-items:flex-start
}
.flight-company img{
	width: 55px;
	flex-grow:0
}
.between-head{
	color:grey;
	font-size:smaller;
	font-weight:600
}

.between-from-time,.between-from{
	font-size:medium
}
.price-trip{
	color: green;
    font-weight: 900;
}
.flight-booking-main{
	align-items:center;
}
.flight-details-subcontainer,.fare-summary-subcontainer,.cancellation-subcontainer,.date-change-subcontainer,.baggage{
	text-align: left;
	border:1px solid grey;
-	border-radius: 6px;
	padding: 1%;
	margin-top: 2%;
	display: flex;
	flex-direction: column;
}
.flight-statement{
	border-bottom: 1px solid gray;
	padding-top: 1%;
	padding-bottom: 2%;
	font-size: large;
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
	width: 50%;
	background-color: green;
}
#choice-search-form{
	margin-bottom:1%
}
.stoppage-change-intimation{
	background-color: rgba(255, 166, 0, 0.308);
	display: flex;
-	flex-direction: row;
	font-size: small;
	font-weight: 100;
	align-items: center;
	justify-content: center;
	padding: 1%;
	border-radius: 6px;
	margin-top: 3%;
	margin-bottom: 3%;
}
.between-place{
	color: green
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
	width: 100%;
	/* margin-top: 2%; */
	border-radius: 6px;
}
td, th {
	border: 1px solid grey;
	text-align: left;
	padding: 8px;
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
.main-choices-div{
		display: flex;
		font-size: small;
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
		width:95%
	}
	#to-suggestion-box {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
	}
	.date-select-new{
		max-width:46.5%
	}
	.main-choices-div{
		margin-top:2%
	}
	#form-search-submit{
		left:44% !important
	}
	#to-suggestion-box::-webkit-scrollbar { 
		display: none;  /* Safari and Chrome */
	}
	.date-select-new{
		margin-left:1%;
		width: 15%;
	}
	#class-select{
		max-width:25%
	}
	.selection-class{
		margin-left:1%;
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
		width:72%;
		margin-left:12.5%
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
	.selection-class{
		margin-top:1% !important
	}
	@media only screen and (max-width:650px){
		.selection-class{
			margin-top:2% !important
		}
	}
	#left-in-search{
		width:30%
	}
	.left-in-search-child{
		margin-top:10px;
		min-width: 90%;
		flex-grow: 1;
		background: white;
		border:1px solid #dddada;
		padding:8%;
		border-radius:4px
	}
	.left-in-search-date{
		padding:7%;
	}
	#right-in-search{
		width:66%;
		padding:6% 4% 2% 4%;
	}
	@media only screen and (min-width:200px) and (max-width:650px){
		#choice-search-form{
			width:90%;
			margin-left:auto;
			margin-right:auto
		}
		
		#left-in-search{
			width:85%
		}
		#right-in-search{
			width:82%;
			padding:5% 9%;
		}
		#form-search-submit{
			left:40% !important
		}
		.left-in-search-date{
			padding:3% 10% 3% 3%;
		}
		.left-in-search-child{
			padding:5% 10% 5% 3%;
		}
		.date-select-new{
			margin-left:0% !important
		}
		
	}

	
	@media only screen and (min-width:1600px){
		#class-select-div{
			min-width: 30%;
		}
	}
	@media only screen and (min-width:1200px) and (max-width:1600px){
		#class-select-div{
			min-width: 40%;
		}
	}
	@media only screen and (min-width:800px) and (max-width:1200px){
		#class-select-div{
			min-width: 50%;
		}
	}
	@media only screen and (min-width:500px) and (max-width:800px){
		#class-select-div{
			min-width: 60%;
		}
	}
	@media only screen and (min-width:200px) and (max-width:500px){
		#class-select-div{
			min-width: 90%;
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
		#form-search-submit{
			left:41.5% !important
		}
	}
	@media only screen and (min-width:1080px) and (max-width:1480px){
		#form-search-submit{
			left:44% !important
		}
		.selection-class{
			margin-top:1% !important
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

	#class-select-div{
		position:absolute;
	}

	.main-choices-div{
		flex-direction:row
	}
	.sub-main-choices-div{
		flex-grow:1
	}
	.result-head-statement button{
		padding: 1% 3%;
		margin-right: 3%;
		background-color: #b2ffb2;
		border-radius: 5px;
		border: 0px;
		background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
	}
	.result-head-statement{
		display:flex;
		flex-direction:row;
		justify-content:space-between;
		align-items:center
	}
	.a-adults,.a-infants,.a-child{
		padding: 2% 3%;
		border: 1px solid #0068ef;
		border-radius: 5px;
		margin-right: 2%;
		margin-top:2%
	}
</style>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	function openCheckDetails(target){
		if(target.parentNode.parentNode.querySelector('.flight-details').style.display=="none"){
			target.parentNode.parentNode.querySelector('.flight-details').style.display="block"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="block"
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="none"
		}else{
			target.parentNode.parentNode.querySelector('.flight-details').style.display="none"
		}
	}
	function showClassSelect(){
		const elements = document.querySelectorAll('.main-choices-div');
		const modifySubmit = document.getElementById("form-search-submit")
		if (elements[1]) {
			elements[1].style.display="flex";
			modifySubmit.style.display = "block";
		}
	}
	function setNumOfAdults(clickedEl){

		clickedEl.style.backgroundColor = "#0068ef";
		clickedEl.style.color = "white";

		const aAdults = document.querySelectorAll('.a-adults');

		for (let i = 0; i < aAdults.length; i++) {
			if (aAdults[i] !== clickedEl) {
				aAdults[i].style.backgroundColor = "white";
				aAdults[i].style.color = "#0068ef";
			}
		}
	}
	function setNumOfChildren(clickedEl){
		clickedEl.style.backgroundColor = "#0068ef";
		clickedEl.style.color = "white";

		const aAdults = document.querySelectorAll('.a-child');

		for (let i = 0; i < aAdults.length; i++) {
			if (aAdults[i] !== clickedEl) {
				aAdults[i].style.backgroundColor = "white";
				aAdults[i].style.color = "#0068ef";
			}
		}
	}
	function setNumOfInfants(clickedEl){
		clickedEl.style.backgroundColor = "#0068ef";
		clickedEl.style.color = "white";

		const aAdults = document.querySelectorAll('.a-infants');

		for (let i = 0; i < aAdults.length; i++) {
			if (aAdults[i] !== clickedEl) {
				aAdults[i].style.backgroundColor = "white";
				aAdults[i].style.color = "#0068ef";
			}
		}
	}
	function choiceSearchSwitch(){
		const choiceDiv = document.getElementById('choice-search-form');
		if(choiceDiv.style.display==="none"){
			choiceDiv.style.display="block"
		}else{
			choiceDiv.style.display="none"
		}
	}
	function changeFlightDetails(target){
		if(target.innerHTML=="Flight Details"){
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.baggage').style.display="none"
			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="block"
		}else if(target.innerHTML=="Fare Summary"){
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="block"
			target.parentNode.parentNode.querySelector('.baggage').style.display="none"

			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="none"
		}else if(target.innerHTML=="Baggage"){
			target.parentNode.parentNode.querySelector('.baggage').style.display="block"
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="none"
		}else if(target.innerHTML=="Cancellation"){
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="block"
			target.parentNode.parentNode.querySelector('.baggage').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="none"
		}else if(target.innerHTML=="Date Change"){
			target.parentNode.parentNode.querySelector('.fare-summary-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.cancellation-subcontainer').style.display="none"
			target.parentNode.parentNode.querySelector('.date-change-subcontainer').style.display="block"
			target.parentNode.parentNode.querySelector('.baggage').style.display="none"
			target.parentNode.parentNode.querySelector('.flight-details-subcontainer').style.display="none"
		}
	}
	function applyMobileFilter(target){
		if(target.style.color=="rgb(0, 104, 239)"){
			target.style.color="grey";
			target.style.border="1px solid grey"
		}else{
			target.style.color="#0068ef";
			target.style.border="1px solid #0068ef"
		}
	}
	function displayClass(){
		const classDiv = document.getElementById('class-select-div')
		if(classDiv.style.display=="none"){
			classDiv.style.display="flex"
		}else{
			classDiv.style.display="none"
		}
	}
	</script>
	<body class="w-[550px] lg:w-auto">
	<div class="px-[30px] pt-[50px]">
	<div class="flex flex-col lg:flex-row">
		<div class="hidden lg:block border rounded-lg shadow-2xl shadow-orange-500/50 bg-orange-600 w-full p-2 mb-2 mr-2 lg:w-[245px] flex flex-col justify-between text-white">
		<div class="text-md font-medium">PHONE ONLY DEALS</div>
		<div class="text-sm">FREE UPGARDE TO PREMIUM ECONOMY GET $25 OFF OVER PHONE</div>
		<div class="text-xs mt-1">** Limited Time Offer. Economy Class Only. Not Applicable on all airlines</div>
		<div class="bg-blue-600 text-center pt-3 pb-3 text-sm mt-auto border rounded-lg">
		**Prices are likely to increase within 4 days**
	</div>
	</div>

<div class="w-full">
<table>
		<tr>
			<td>Hot Deals<br></td>
			<?php 
			foreach ($dictionary['carriers'] as $key => $value) {
					if (array_key_exists($key, $fares)) {

			?>
			<td>
				<img src="https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/<?php echo $key?>.png" style="height:70px;width:50px;">
				<br>
				<?php echo $value?>		
			</td>
			<?php
				}
			}
			?>
		</tr>
		<tr>
			<td>Non - Stop</td>
				<?php 
			foreach ($dictionary['carriers'] as $key => $value) {
				if (array_key_exists($key, $fares)) {
					if ($fares[$key]['Non Stop']!=0) {
			?>
				<td>$<?php echo $controller->rate($key,$fares[$key]['Non Stop'],$passengers);?></td>
			<?php		
					}
					else{
			?>
				<td>-</td>
			<?php
					}
				}
			}
			?>
		</tr>
		<tr>
			<td>1 Stop</td>
				<?php 

			foreach ($dictionary['carriers'] as $key => $value) {
					if (array_key_exists($key, $fares)) {
					if ($fares[$key]['1 Stop']!=0) {
			?>
				<td>$<?php echo $controller->rate($key,$fares[$key]['1 Stop'],$passengers);?></td>
			<?php		
					}
					else{
			?>
				<td>-</td>
			<?php
					}	
			
				}
			}
			?>
		</tr>
		<tr>
			<td>2+ Stop</td>
				<?php 
			foreach ($dictionary['carriers'] as $key => $value) {
					if (array_key_exists($key, $fares)) {
						if ($fares[$key]['2+ Stop']!=0) {
					?>
						<td>$<?php echo $controller->rate($key,$fares[$key]['2+ Stop'],$passengers);?></td>
					<?php 
					}
					else{
					?>
					<td>-</td>
					<?php
					}
					?>
			<?php
				}	
			}
			?>
		</tr>
	</table></div>
</div>

	<button id="dropdownRadioButton2" data-dropdown-toggle="dropdownDefaultRadio" class="block lg:hidden text-white w-full 
	bg-green-600 justify-center item-center font-medium text-md px-5 py-2.5 text-center inline-flex
	hover:bg-blue-800 focus:ring-4" 
		type="button"> Filter <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
		fill="none" viewBox="0 0 10 6">
		<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
		</svg>
	</button>

		<!-- Dropdown menu -->
		<div id="dropdownDefaultRadio2" class="z-10 hidden w-auto bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
		<form id="checkboxForm">
			<div id="airlines" class="mt-2">
				<h3 class="my-1">Stop</h3>
				<hr>
				<div class="empty-horizontal-line"></div>
				<?php 
				if ($fares_stop['Non Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="non_stop" name="non_stop" checked/>
						<label for="">Non Stop <b>$<?php echo $controller->rate('all',$fares_stop['Non Stop'],$passengers);?></b></label>
					</div>
				</div>
				<?php }?>
				<?php 
				if ($fares_stop['1 Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="one_stop" name="one_stop" checked/>
						<label for="">1 Stop</label><b>$<?php echo $controller->rate('all',$fares_stop['1 Stop'],$passengers);?></b>
					</div>
				</div>
				<?php
				}
				?>
				<?php 
				if ($fares_stop['2+ Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="two_stop" name="two_stop" checked/>
						<label for="">2+ Stop <b>$<?php echo $controller->rate('all',$fares_stop['2+ Stop'],$passengers);?></b></label>
					</div>
				</div>
				<?php }?>
			</div>
			<div id="airlines">
				<h3 class="mb-1">Airlines</h3>
				<hr>
				<div class="empty-horizontal-line"></div>
				<?php 
				foreach ($dictionary['carriers'] as $key => $value) {
					if (array_key_exists($key, $fares)) {
						
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="<?php echo $key;?>" name="<?php echo $key;?>" class="airline_filter" checked />
						<label for=""><?php echo $value;?> <b>$<?php echo $controller->rate($key,$fares[$key]['Lowest'],$passengers);?></b> </label>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
		
			<hr>
			<button class="filter-submit mt-2 border rounded-md bg-gray-400 p-1" type="button" onclick="apply_filter()">Apply</button>
			</form>
		</div>
	
	<!-- dropdown-script -->
	<script>
    	document.getElementById('dropdownRadioButton2').addEventListener('click', function() {
      	const dropdown = document.getElementById('dropdownDefaultRadio2');
      	dropdown.classList.toggle('hidden');
    	});
  	</script>

	<div class="bg-white flex flex-col mx-0 lg:flex-row lg:mx-20 " id="results-parent">

		<div class="hidden lg:block mr-2" id="filter-div">
			<div class="bg-green-500 text-lg font-bold text-white flex justify-center py-2">FILTER</div>
		<!-- <h3>Sort by</h3>
		<select class="selection-class-filter spacing padding" name="class-select" id="class-select">
				<option value="Economy">Cheapest</option>
				<option value="Bussiness">Fastest Route</option>
				<option value="First">Earliest Takeoff</option>
				<option value="Premium">Latest Takeoff</option>
			</select>
			<div class="empty-horizontal-line" style="margin-top: 4%;"></div> -->
			<!-- <div id="customize-filter">
				<div>
					<h3 style="margin-bottom: 3%;">Customize</h3>
					<div style="font-size: smaller;">
						Select what's important to you, and we will only show round-trip flights with those included.
					</div>
					<div class="empty-horizontal-line" style="margin-top: 4%;"></div>
					<div>
						<div style="margin-top: 4%;">
							<input type="checkbox" id="" name=""/>
							<img src="<?php echo base_url();?>assets/images/suitcase.png" class="small-icon" alt="">
    						<label for="">Carry-on bag</label>
						</div>
						<div style="margin-top: 4%;">
							<input type="checkbox" id="" name=""/>
							<img src="<?php echo base_url();?>assets/images/seat.png" class="small-icon" alt="">
    						<label for="">Seat selection</label>
						</div>
					</div>
				</div>
			</div> -->
		<!-- 	<div id="stops-filter">
				<h3 style="margin-bottom: 5%;">Stops</h3>
				<div class="empty-horizontal-line" style="margin-top: 4%;margin-bottom: 4%;"></div>
				<div id="nonstop">
					<div class="nonstop-subdiv">
						<div class="bolder">Non stop</div>
						<div class="blue">from $113</div>u
					</div>
					<div class="nonstop-subdiv">
						<div class="bolder">Up to 1 stop</div>
						<div class="blue">from $136</div>
					</div>
					<div class="nonstop-subdiv">
						<div class="bolder">Up to 2 stop</div>
						<div class="blue">from $106</div>
					</div>
				</div>
			</div> -->
			<form id="checkboxForm">
			<div id="airlines" class="mt-2">
				<h3 class="my-1">Stop</h3>
				<hr>
				<div class="empty-horizontal-line"></div>
				<?php 
				if ($fares_stop['Non Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="non_stop" name="non_stop" checked/>
						<label for="">Non Stop <b>$<?php echo $controller->rate('all',$fares_stop['Non Stop'],$passengers);?></b></label>
					</div>
				</div>
				<?php }?>
				<?php 
				if ($fares_stop['1 Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="one_stop" name="one_stop" checked/>
						<label for="">1 Stop</label><b>$<?php echo $controller->rate('all',$fares_stop['1 Stop'],$passengers);?></b>
					</div>
				</div>
				<?php
				}
				?>
				<?php 
				if ($fares_stop['2+ Stop']!=0) {
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="two_stop" name="two_stop" checked/>
						<label for="">2+ Stop <b>$<?php echo $controller->rate('all',$fares_stop['2+ Stop'],$passengers);?></b></label>
					</div>
				</div>
				<?php }?>
			</div>
			<div id="airlines">
				<h3 class="mb-1">Airlines</h3>
				<hr>
				<div class="empty-horizontal-line"></div>
				<?php 
				foreach ($dictionary['carriers'] as $key => $value) {
					if (array_key_exists($key, $fares)) {
						
				?>
				<div class="airlines-select-filter">
					<div>
						<input type="checkbox" id="<?php echo $key;?>" name="<?php echo $key;?>" class="airline_filter" checked />
						<label for=""><?php echo $value;?> <b>$<?php echo $controller->rate($key,$fares[$key]['Lowest'],$passengers);?></b> </label>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<hr>
			<button class="filter-submit mt-2 border rounded-md bg-gray-400 p-1" type="button" onclick="apply_filter()">Apply</button>
			</form>
		</div>
		<script type="text/javascript">
			function apply_filter() {
				// Get all checkboxes within the form
				const checkboxes = document.querySelectorAll('#checkboxForm .airline_filter');
				var include_airlines = '';
				// Iterate over each checkbox
				checkboxes.forEach((checkbox) => {
					// Check if the checkbox is checked
					if (checkbox.checked) {
						// Add the value of the checked checkbox to the array
						if (checkbox.value=='on') {
							if (include_airlines!="") {
							include_airlines=include_airlines + ",";	
							}
							// checkedValues.push(checkbox.name);
							include_airlines=include_airlines + checkbox.name;
						}
					}
				});
				// Log the checked values to the console
				var non_stop=$("#non_stop").is(':checked');
				if (non_stop=='true') {
					non_stop=1;
				}
				else{
					non_stop=0;
				}
				var one_stop=$("#one_stop").is(':checked');
				// alert(one_stop);
				if (one_stop==true) {
					one_stop=1;
				}
				else{
					one_stop=0;
				}

				var two_stop=$("#two_stop").is(':checked');
				if (two_stop=='true') {
					two_stop=1;
				}
				else{
					two_stop=0;
				}

				max_price=$("#max-price").val();

			
				var url="<?php echo $this->session->userdata('search_url');?>";
				// console.log(url);
				if (include_airlines!="") {
					url=url + "&include_airlines="+include_airlines;
					// console.log("&include_airlines="+include_airlines);
				}
				
				// console.log(max_price);
				// console.log('<?php echo $highest;?>');
				if (parseInt(max_price)<parseInt("<?php echo $controller->rate('all',$highest,$passengers);?>")) {
					
					url=url + "&max_fare="+max_price;
					console.log("&max_fare="+max_price);
				}

				if (non_stop==1) {
					url = url + "&non_stop=1";
					// console.log("&non_stop=1");
				}

				if (one_stop==1) {
					url = url + "&one_stop=1";
					// console.log("&one_stop=1");
				}

				if (two_stop==1) {
					url = url + "&two_stop=1";
					// console.log("&two_stop=1");
				}

				window.location.href = url;
			}
		</script>



	<div id="results-container">
				<div style="font-size:medium;margin-top: 1%;margin-bottom: 2%;width:100%;text-align:left;display:flex;flex-direction:row;align-items:center;justify-content:space-between">
							<div style="display:flex;flex-direction:row;align-items:center;max-width:80%">
								<div>
									<div>
										<span style="color:#0d6efd;font-size:14px;font-weight: 600;"><?php echo $from;?></span> to <span style="color:#0d6efd;font-size:14px;font-weight: 600;"><?php echo $to;?></span> on 
										<span style="color:#0d6efd;font-size:14px;font-weight: 600;"><?php 
										$departure=date("D d M,Y", strtotime($departure));
										echo $departure;
										?> 
										</span>
									</div>
									<div>
										<?php if($return!=''){?> Returning on 
											<span style="color:#0d6efd;font-size:14px;font-weight: 600;">
												<?php
										$return=date("D d M,Y", strtotime($return));?> <?php echo
										$return;?> <?php } ?><span style="color:black;font-weight:100">| Economy | <?php echo $this->session->userdata('no_passengers');?> Adult <?php if($this->session->userdata('children')!=0){echo ','.$this->session->userdata('children')." Children";}?>, <?php if($this->session->userdata('infant')!=0){echo $this->session->userdata('infant')." Infant";}?> </span></div> 
										</span>
									</div>
								</div>
			<div style="position:relative">
					<img  onclick="displayClass()" src="<?php echo base_url();?>assets/images/edit.png" style="width:30px;">
					<div id="class-select-div" class="main-choices-div" style="display:none;">
			<form class="p-4 w-[400px]" method="get"  action="<?php echo base_url();?>Home/flight_search" >
			<div class="">
				<input type="text" required name="from_details" class="form-control p-4" id="from_details" oninput="from_search()" placeholder="From" value="<?php echo $from;?>">
				<div id="from-suggestion-box"></div>
			</div>
			<div class="">
				<input type="text" class="form-control p-4" id="to_details" name="to_details" required oninput="to_search()"  placeholder="To" value="<?php echo $to;?>">
				<div id="to-suggestion-box" ></div>
				
			</div>

			<div class="">
				<input class="form-control p-4"  type="text" required id="departure"  name="departure" placeholder="Departure" oninput="set_min_date()"  autocomplete="false" style="background-color: white;" value="<?php  $departure=date("M d,Y", strtotime($departure));echo $departure;?> ">
			</div>

			<div class="">
				<input class="form-control p-4" type="text" id="return" name="return" placeholder="Return"  autocomplete="false" style="background-color: white;" value="<?php if($return!=''){ $return=date("M d,Y", strtotime($return));echo $return;}?> " required>
			</div>
			
		<div class="flex flex-row justify-center item-center gap-6 my-2">
		<div class="dropdown">
			<button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false">
				<?php
				$total_passenger=$this->session->userdata('no_passengers') + $this->session->userdata('children') + $this->session->userdata('infant');
				?>
			<?php echo $total_passenger;?> Traveller
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			<table>
				<tr>
				<td>Adult</td>
				<td class="flex flex-row gap-3">
					<span class="border rounded-lg px-3 py-1" style="cursor:pointer;" onclick="minus_adult()">-</span>
					<input class="w-[30px] no-spin" type="number" name="no_adults" id="adult" value="<?php echo $this->session->userdata('no_passengers');?>">
					<span class="border rounded-lg px-3 py-1" style="cursor:pointer;" onclick="plus_adult()">+</span>
				</td>
				</tr>
				<tr>
				<td>Children</td>
				<td class="flex flex-row">
					<button class="border rounded-lg px-3 py-1 mr-2" type="button" onclick="minus_children()">-</button>
					<input class="w-[47px] no-spin" type="number" name="no_children" id="children" value="<?php echo $this->session->userdata('children');?>">
					<button class="border rounded-lg px-3 py-1" type="button" onclick="plus_children()">+</button>
				</td>
				</tr>
				<tr>
				<td>Infant</td>
				<td class="flex flex-row">
					<button class="border rounded-lg px-3 py-1 mr-2" type="button" onclick="minus_infant()">-</button>
					<input class="w-[47px] no-spin" type="number" name="no_infants" id="infant" value="<?php echo $this->session->userdata('infant');?>">
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
              $("#dropdownMenu1_content").show();
            }
          </script>
			<div class="dropdown">
			<button class="dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false">
			Round Trip
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
				<button class="dropdown-item" type="button" onclick="trip_type('round')">Round Trip</button>
				<button class="dropdown-item" type="button" onclick="trip_type('one')">One Way</button>
	          	<input type="hidden" id="trip" name="trip" value="round">
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
			<div class="dropdown">
			<button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false">
			Economy
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			<button class="dropdown-item" type="button" onclick="class_type('economy')">Economy</button>
			<button class="dropdown-item" type="button" onclick="class_type('premium_economy')">Premium Economy</button>
			<button class="dropdown-item" type="button" onclick="class_type('business_class')">Business Class</button>
			<button class="dropdown-item" type="button" onclick="class_type('first_class')">First Class</button>
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
			</div>
		</div>
			<div class="flex justify-center item-center">
			<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
			focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 
			dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button></div>
			</form>
		</div>
</div>
</div>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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


<?php if (count($data)==0) {
?>
<span>No Flights Found on This Route On Given Dates</span>
<?php } ?>
					<!-- <button onclick="showClassSelect()">Modify</button> -->
			<!-- </div> -->
<!-- 			
			<?php echo $to;?>
			<?php echo $departure;?>
			<?php echo $return;?>
			<?php echo $trip_type;?> -->
					<?php foreach ($data as $key => $value) {
						// echo "<pre>";print_r($value);die();

					?>
					<div id="flight-results-container">
						<div class="flight-booking-main">
							<div class="price">
								<?php 
								if (array_key_exists('carrierCode',$value['itineraries'][0]['segments'][0])) {
									// echo "1111111111";
									$code=$value['itineraries'][0]['segments'][0]['carrierCode'];
								}
								else{
									// echo "2222222";
									$code=$value['itineraries'][0]['segments'][0]['operating']['carrierCode'];
								}
								$count=count($value['itineraries'][0]['segments']);
								?>
								<h1 class="price-trip">$<?php echo $controller->rate($code,$value['price']['grandTotal'],$passengers,$value['itineraries'][0]['segments'][0]['departure']['iataCode'],$value['itineraries'][0]['segments'][$count - 1]['arrival']['iataCode']);?></h1>
								<p>Per passpenger (Includes taxes & fees)</p>
								<!--  -->
							</div>
							<button class="book-btn" type="button" onclick="flight_book(<?php echo $key;?>)">
								Book
							</button>
						</div>
						<!-- DEPARTURE TRIP -->
						<div class="details-for-each-flight">
							<div class="flight-company" style="text-transform: capitalize;">
								<div class="flex flex-col">
								<?php
								if (array_key_exists('carrierCode',$value['itineraries'][0]['segments'][0])) {
									// echo "1111111111";
									$code=$value['itineraries'][0]['segments'][0]['carrierCode'];
								}
								else{
									// echo "2222222";
									$code=$value['itineraries'][0]['segments'][0]['operating']['carrierCode'];
								}
								$airline=$dictionary['carriers'][$code];
								?>
								<div>
								<img class="w-auto h-auto" src="https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/<?php echo $code;?>.png">
								<div>
								<div>
								<?php echo strtolower($airline);?>
								<?php 
								$flight_no=$code.$value['itineraries'][0]['segments'][0]['number'];
								?>
								</div>
								</div></div></div>
							</div>
							<div class="between">
								<div class="between-head">
									Between <span class="between-from-time">
										<?php  $departure=explode("T",$value['itineraries'][0]['segments'][0]['departure']['at']);?><?php echo date('h:i a',strtotime($departure[1]));?>,
									</span>

									<span class="between-from-time">
										<?php echo date('D M d',strtotime($departure[0]));?>
									</span>
								</div>
								<div class="between-place">
									<?php print_r($airports[$value['itineraries'][0]['segments'][0]['departure']['iataCode']]);?>
								</div>
							</div>
							
							<div class="flex flex-col p-1 border rounded-lg">
							<div class="bg-orange-200 p-1">
							<?php 
								$count=count($value['itineraries'][0]['segments']);
								$count=$count - 1;
							?>
							<?php echo $count;?> Stops
							</div>
							<div class="bg-blue-200 mt-2 p-1">
							<?php 
							$i=0;
							while ($i<$count) {
								echo $value['itineraries'][0]['segments'][$i]['arrival']['iataCode'];
								if ($i!=$count-1) {
									echo ",";
								}
								$i++;
							}
							?>
							</div>
							</div>

							<div class="between">
								<div class="between-head">
									and <span class="between-from-time"><?php  $arrival=explode("T",$value['itineraries'][0]['segments'][$count]['arrival']['at']);?><?php echo date('h:i a',strtotime($arrival[1]));?>,</span>
									<span class="between-from-time">
										<?php echo date('D M d',strtotime($arrival[0]));?> </span>
								</div>
								<div class="between-place">
									<?php echo $airports[$value['itineraries'][0]['segments'][$count]['arrival']['iataCode']];?>
								</div>
							</div>
							<div class="between-time">
								<p class="stops-info" style="font-size: 10px;">
									<?php 
									$stops=count(array_keys($value['itineraries'][0]['segments']));
									$stops=$stops - 1;
									if ($stops==0) {
									?>
									(Non-stop)
									<?php
									}
									elseif ($stops==1) {
									?>
									(<?php echo $stops;?> Stop)
									<?php
									}
									else{
									?>
									(<?php echo $stops;?> Stops)
									<?php
									}
									?>
								</p>
								<div class="flight-duration">
									🕜 <?php 
										$duration=$value['itineraries'][0]['duration'];
										$duration=str_replace("PT","",$duration);
										$duration=str_replace("H","h ",$duration);
										$duration=str_replace("M","m",$duration);
									?>
									<?php echo $duration;?>
									<!-- 09 hrs 15 mins -->
								</div>
							</div>
						</div>
						<!-- FOR RETURN TRIP -->
						<?php 
						// echo $return;die();
						if ($return!='') {
						?>
						<div class="details-for-each-flight">
							<div class="flight-company" style="text-transform: capitalize;">
								<div class="flex flex-col">
								<?php 
								// print_r($value['itineraries'][1]['segments'][0]);
								if (array_key_exists('operating',$value['itineraries'][1]['segments'][0])) {									
									$code1=$value['itineraries'][1]['segments'][0]['operating']['carrierCode'];
									$airline1=$dictionary['carriers'][$code1];
								}
								else{
									// echo "11111111";
									// print_r($value['itineraries'][1]['segments'][0]['carrierCode']);
									$code1=$value['itineraries'][1]['segments'][0]['carrierCode'];
									$airline1=$dictionary['carriers'][$code1];
								}
								?>
								<div>
								<img src="https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/<?php echo $code1;?>.png" style="height:70px;width:50px;">
								</div>
								<div>
								<?php echo strtolower($airline1);?>
								</div>
								</div>
							</div>
							<div class="between -ml-0 lg:-ml-4">
								<div class="between-head">
									Between <span class="between-from-time">
										<?php  $departure=explode("T",$value['itineraries'][1]['segments'][0]['departure']['at']);?><?php echo date('h:i a',strtotime($departure[1]));?>,</span><span class="between-from-time">
										<?php echo date('D M d',strtotime($departure[0]));?>
										</span>
								</div>
								<div class="between-place">
									<?php print_r($airports[$value['itineraries'][1]['segments'][0]['departure']['iataCode']]);?>
								</div>
							</div>

							<div class="flex flex-col p-1 border rounded-lg -ml-0 lg:-ml-3">
							<div class="bg-orange-200 p-1">
								<?php 
								$count=count($value['itineraries'][1]['segments']);
								$count=$count - 1;
							?>
							<?php echo $count;?> Stops
							</div>
							<div  class="bg-blue-200 mt-2 p-1">
							<?php 
							$i=0;
							while ($i<$count) {
								echo $value['itineraries'][1]['segments'][$i]['arrival']['iataCode'];
								if ($i!=$count-1) {
									echo ",";
								}
								$i++;
							}
							?>
							</div>
							</div>

							<div class="between">
								<div class="between-head">
								
									and <span class="between-from-time">
										<?php  $arrival=explode("T",$value['itineraries'][1]['segments'][$count]['arrival']['at']);?><?php echo date('h:i a',strtotime($arrival[1]));?>,</span><span class="between-from-time">
										<?php echo date('D M d',strtotime($arrival[0]));?> </span>
								</div>
								<div class="between-place">
									<?php echo $airports[$value['itineraries'][1]['segments'][$count]['arrival']['iataCode']];?>
								</div>
							</div>
							<div class="between-time">
								<p class="stops-info">
									<?php 
									// echo "<pre>";
									// print_r(array_keys($value['itineraries'][0]['segments'][0]['numberOfStops']));die();
									$stops=count(array_keys($value['itineraries'][1]['segments']));
									$stops=$stops - 1;
									if ($stops==0) {
									?>
									(Non-stop)
									<?php
									}
									elseif ($stops==1) {
									?>
									(<?php echo $stops;?> Stop)
									<?php
									}
									else{
									?>
									(<?php echo $stops;?> Stops)
									<?php
									}
									?>
								</p>
								<div class="flight-duration">
									🕜 <?php 
										$duration=$value['itineraries'][1]['duration'];
										$duration=str_replace("PT","",$duration);
										$duration=str_replace("H","h ",$duration);
										$duration=str_replace("M","m",$duration);
									?>
									<?php echo $duration;?>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<div class="flight-booking-footer">
							<p class="support-details">• Free Support</p>
							<button  class="flight-details-btn" onclick="openCheckDetails(this)">Flight Details</button>
						</div>
						<div class="flight-details" style="display: none;">
							<div class="flight-details-nav">
								<div class="flight-details-nav-links" onclick="changeFlightDetails(this)">Flight Details</div>
								<div class="flight-details-nav-links" onclick="changeFlightDetails(this)">Fare Summary</div>
								<div class="flight-details-nav-links" onclick="changeFlightDetails(this)">Baggage</div>
							</div>
							<div class="flight-details-subcontainer" style="display: none;">
								<div class="flight-listings">
									<span style="font-weight:600;font-size:1.2rem;">Depart</span>
									<hr>
									<?php 
									$depart=$value['itineraries'][0]['segments'];
									foreach ($depart as $key1 => $value1) { 
									?>
									<div class="details-for-each-flight">
										<div class="flight-company" style="text-transform: capitalize;">
											<div class="flex flex-col">
											<?php 
											if (array_key_exists('carrierCode',$value['itineraries'][0]['segments'][0])) {
												// echo "1111111111";
												$code=$value['itineraries'][0]['segments'][0]['carrierCode'];
											}
											else{
												// echo "2222222";
												$code=$value['itineraries'][0]['segments'][0]['operating']['carrierCode'];
											}
											$airline=$dictionary['carriers'][$code];
											?>
											<div>
											<img src="https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/<?php echo $code;?>.png" style="height:70px;width:50px;">
											</div>
											<div>
											<?php echo strtolower($airline);?>
											<?php $flight_no=$code.$depart[$key1]['number'];?>
											</div>
										</div>
										</div>
										<div class="between">
											<div class="between-head">
												Between 
												<span class="between-from-time">
												<?php  $departure=explode("T",$depart[$key1]['departure']['at']);?><?php echo date('h:i a',strtotime($departure[1]));?>,</span><span class="between-from-time">
												<?php echo date('D M d',strtotime($departure[0]));?>
												</span>
											</div>
											<div class="between-place">
												<?php print_r($airports[$depart[$key1]['departure']['iataCode']]);?>
											</div>
										</div>
										<div class="between">
											<div class="between-head">
											and 
											<span class="between-from-time">
											<?php  $arrival=explode("T",$depart[$key1]['arrival']['at']);?><?php echo date('h:i a',strtotime($arrival[1]));?>,</span><span class="between-from-time">
											<?php echo date('D M d',strtotime($arrival[0]));?> </span>
											</div>
											<div class="between-place">
												<?php echo $airports[$depart[$key1]['arrival']['iataCode']];?>
											</div>
										</div>
										<div class="between-time">
											<p class="stops-info" style="font-size: 1px;">
												<?php if ($depart[$key1]['numberOfStops']==0) { ?>
													(Non-stop)
												<?php
												}elseif ($depart[$key1]['numberOfStops']==1) {?>
													(<?php echo $depart[$key1]['numberOfStops'];?> Stop)
												<?php }else{
												?>
													(<?php echo $depart[$key1]['numberOfStops'];?> Stops)
												<?php } ?>
											</p>
										<div class="flight-duration">
											🕜 <?php 
												$duration=$depart[$key1]['duration'];
												$duration=str_replace("PT","",$duration);
												$duration=str_replace("H","h ",$duration);
												$duration=str_replace("M","m",$duration);
												?>
												<?php echo $duration;?>
										</div>
									</div>
								</div>
									<?php 
									if (array_key_exists($key1+1,$depart)) {
									?>
									<div class="warning" style="text-align:center; margin-top:2%;margin-bottom:2%">
										Layover in <?php echo $airports[$depart[$key1]['arrival']['iataCode']];?>, duration
										<?php 
									// FOR LAYOVER TIME
									$arrival=explode("T",$depart[$key1]['arrival']['at']);
									$next_departure=explode("T",$depart[$key1 + 1]['departure']['at']);
									// Convert arrival and departure times to DateTime objects
									$arrivalDateTime = new DateTime($arrival[0] . ' ' . $arrival[1]);
									$departureDateTime = new DateTime($next_departure[0] . ' ' . $next_departure[1]);
									$interval = $arrivalDateTime->diff($departureDateTime);
									$hours = $interval->h + $interval->days * 24;
									$minutes = $interval->i;
									// Output the difference
									echo "$hours hours and $minutes minutes";
									?>
									</div>
									<?php
									}
									?>
								<?php
								}
								?>
								</div>
								<?php if($return!=''){?>
								<div class="flight-listings">
									<span style="font-weight:600;font-size:1.2rem;">Return</span>
									<hr>
									<?php 
									$depart=$value['itineraries'][1]['segments'];
									foreach ($depart as $key1 => $value1) { 
									?>
									<div class="details-for-each-flight">
										<div class="flight-company" style="text-transform: capitalize;">
											<div class="flex flex-col">
											<?php 
											if (array_key_exists('operating',$depart[$key1])) {
												// code...
												$code=$depart[$key1]['operating']['carrierCode'];
												$airline=$dictionary['carriers'][$code];
												$code2=$code;
											}
											else{
												$code=$value['itineraries'][1]['segments'][0]['carrierCode'];
												$airline=$dictionary['carriers'][$code1];
												$code2=$code1;
											}
											?>
											<div>
											<img src="https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/<?php echo $code2;?>.png" style="height:70px;width:50px;">
											</div>
											<div>	
											<?php echo strtolower($airline);?>
											<?php $flight_no=$code.$depart[$key1]['number'];?>
											</div>
											</div>
										</div>
										<div class="between">
											<div class="between-head">
												Between 
												<span class="between-from-time">
												<?php  $departure=explode("T",$depart[$key1]['departure']['at']);?><?php echo date('h:i a',strtotime($departure[1]));?>,</span><span class="between-from-time">
												<?php echo date('D M d',strtotime($departure[0]));?>
												</span>
											</div>
											<div class="between-place">
												<?php print_r($airports[$depart[$key1]['departure']['iataCode']]);?>
											</div>
										</div>
										<div class="between">
											<div class="between-head">
											and 
											<span class="between-from-time">
											<?php  $arrival=explode("T",$depart[$key1]['arrival']['at']);?><?php echo date('h:i a',strtotime($arrival[1]));?>,</span><span class="between-from-time">
											<?php echo date('D M d',strtotime($arrival[0]));?> </span>
											</div>
											<div class="between-place">
												<?php echo $airports[$depart[$key1]['arrival']['iataCode']];?>
											</div>
										</div>
										<div class="between-time">
											<p class="stops-info">
												<?php if ($depart[$key1]['numberOfStops']==0) { ?>
													(Non-stop)
												<?php
												}elseif ($depart[$key1]['numberOfStops']==1) {?>
													(<?php echo $depart[$key1]['numberOfStops'];?> Stop)
												<?php }else{
												?>
													(<?php echo $depart[$key1]['numberOfStops'];?> Stops)
												<?php } ?>
											</p>
										<div class="flight-duration">🕜<?php 
												$duration=$depart[$key1]['duration'];
												$duration=str_replace("PT","",$duration);
												$duration=str_replace("H","h ",$duration);
												$duration=str_replace("M","m",$duration);
												?>
												<?php echo $duration;?>
										</div>
									</div>
								</div>
									<?php 
									if (array_key_exists($key1+1,$depart)) {
									?>
									<div class="warning" style="text-align:center; margin-top:2%;margin-bottom:2%">
									Layover in <?php echo $airports[$depart[$key1]['arrival']['iataCode']];?>, duration
									<?php 
									// FOR LAYOVER TIME
									$arrival=explode("T",$depart[$key1]['arrival']['at']);
									$next_departure=explode("T",$depart[$key1 + 1]['departure']['at']);
									// Convert arrival and departure times to DateTime objects
									$arrivalDateTime = new DateTime($arrival[0] . ' ' . $arrival[1]);
									$departureDateTime = new DateTime($next_departure[0] . ' ' . $next_departure[1]);
									$interval = $arrivalDateTime->diff($departureDateTime);
									$hours = $interval->h + $interval->days * 24;
									$minutes = $interval->i;
									// Output the difference
									echo "$hours hours and $minutes minutes";
									?>

									</div>
									<?php
									}
									?>
								<?php
								}
								?>
								</div>
								<?php
								}
								?>

							</div>
							<div class="fare-summary-subcontainer" style="display: none;">
								<!--  -->
								<table>
									<tr>
										<th>Charges Type</th>
										<th>Amount</th>
									</tr>
									<tr>
										<td>Base Fare</td>
										<td>$<?php echo $controller->rate($code,$value['price']['base'],$passengers);?></td>
									</tr>
									<tr>
										<td>Taxes and Fees</td>
										<td>$<?php echo $controller->rate($code,$value['price']['total'] - $value['price']['base'],$passengers);?></td>
									</tr>
									<tr>
										<td>Instant Discount</td>
										<td>$0</td>
									</tr>
									<tr>
										<td>Final Total Fare Per Passenger</td>
										<td>$<?php echo $controller->rate($code,$value['price']['total'],$passengers);?></td>
									</tr>
								</table>
							</div>
							<div class="baggage" style="display: none;">
								<!-- ENTER AIRLINE CODE HERE -->
								<a href="https://bags.amadeus.com/Display.aspx?a=<?php echo $code;?>" target="_blank">Airline web site bag info</a>
								<br>
								<b>Check in:</b>25 Kgs
								<br>
								<b>Cabin:</b>8 Kgs
							</div>
							<div class="cancellation-subcontainer" style="display: none;">
								Cancellation
							</div>
							<div class="date-change-subcontainer" style="display: none;">
								Date change
							</div>									
						</div>
					</div>
				<?php
				}
				?>
				
			</div>
		</div>
	</div>
</div>
</body>
	<script type="text/javascript">
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
				// alert(Len);
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
		function flight_book(ids) {
			// alert(ids);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Home/set_flight",
			data:{
				id:ids
			},
			success: function(data){
				window.location.href = "<?php echo base_url();?>Home/booking";

			}
		});	
		}
		// $("#departure").datepicker({mindate:0});
		// $("#return").datepicker({});
		$("#departure").flatpickr({dateFormat:'M d,Y',minDate:"today"});
		$("#return").flatpickr({dateFormat:'M d,Y',minDate:"today"});

		function set_min_date() {
			var departure=$("#departure").val();
			$("#return").flatpickr({dateFormat:'M d,Y',minDate:departure});
			// var dates=departure.split("");
		}
	</script>
<?php $this->load->view('footer');?>