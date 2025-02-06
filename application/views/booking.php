<?php $this->load->view('header');?>

<style>
.ticket{
	padding:1.5%;
	margin-left:auto;
	margin-right:auto;
	border:2.5px dashed grey;
	border-radius:7px;
	margin-top:2%;
	max-width:1300px;
}
.ticket-info{
	display: flex;
	flex-direction:row;
	justify-content:space-between;
}
.left{
	display:flex;
	flex-direction:column;
}
.right{
	display:flex;
	flex-direction:column;
}
.main{
	display:flex;
	flex-direction:column;
	justify-content:space-between;
}
.info-row{
	margin-right:3%;
}
.city{
	font-size:x-large;
	font-weight:bolder;
}
.code{
	font-size:large;
}
.buttons{
	padding:4% 3%;
	text-align:center;
	color:white;
	border:none;
}
@media screen and (max-width: 1400px){
	.ticket{
		max-width:90%
	}
}
@media screen and (max-width: 888px){
	.right{
		flex-direction:row;
		justify-content:space-between;
		align-items:center;
		margin-top:2%
	}
	.ticket-info{
		flex-direction:column
	
	}
	.city{
		font-size:large
	}
	.code{
		font-size:medium
	}
	.buttons{
		order:3;
		padding:1% 2%;
		font-size:smaller
	}
	.info-label{
		display:none
	}
	.info-parent{
		margin-top:2%;
	}
	.mobile-vc{
		display:flex;
		flex-direction:row;
		justify-content:space-between;
	}
	.mob-right{
		text-align:right
	}
}
.mobile-vc{
	display:flex;
	flex-direction:row;
	justify-content:space-between;
	min-width:30%
}
</style>

<div style="text-align:center;margin-top:2%">
	<h2>All booking details</h2>
</div>

<?php
foreach ($flight_booking as $key => $value) {
?>


<div class="ticket">
	<div class="ticket-body">
		<div class="ticket-info">
			
			<div class="mobile-vc">
				<div class="left">
					<div class="main">
						<div class="city">
							<?php echo $value->from_city;?> 
						</div>
						<div class="code">
							<?php echo $value->from_airport;?>
						</div>
						<div class="code">
							<?php echo $value->travel_date;?>
						</div>
					</div>
				</div>
				<div class="mob-right">
					<div  class="city">
						<?php echo $value->to_city;?>
					</div>
					<div class="code">
						<?php echo $value->to_airport;?>
					</div>
				</div>				
			</div>

			<div class="info-parent">
				<div class="code">
					<span>Return:</span>
					<span><?php echo $value->return_date;?></span>
				</div>
				<div>
					No of Person:<?php echo $value->no_person;?> | No of Children:<?php echo $value->no_child;?> | No of Infant:<?php echo $value->no_infant;?>
				</div>
			</div>
			<div class="right">
				<div class="buttons" style="background-color:<?php echo ($value->payment_status == 1) ? "green" : "red";?>">
					<?php echo ($value->payment_status == 1) ? "Success" : "Failed";?>
				</div>
				<div >
					<span class="info-label">Total Price:</span>
					<span style="color:green"><?php echo $value->total_charges;?></span>
				</div>
				<div>
					<?php echo $value->class;?>
				</div>
				<button class="buttons" style="background-color:#0d6efd" href="<?php echo base_url()?>Dashboard/booking_details/<?php echo $value->id;?>">View Details</button>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<?php $this->load->view('footer');?>