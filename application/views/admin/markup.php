<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="upload_csv" style="display: none;">
	<form id="upload_markup" method="post" action="<?php echo base_url();?>Admin/upload_markup" enctype='multipart/form-data'>
	Upload Markup CSV
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="button" onclick="close_upload_div()">Close</button>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			File
			<br>
			<input type="file" name="markup_details" id="markup_details">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<br>
			<input type="submit" value="Insert">
		</div>
	</div>
</form>
</div>

<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="add_airlines" style="display: none;">
	Add Markup<br>
<form id="add_markup" method="post" action="<?php echo base_url();?>Admin/add_markup">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="button" onclick="close_add_div()">Close</button>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Supplier
			<br>
			<select name="supplier">
				<option value="">Any</option>
				<option value="Amadeus">Amadeus</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Company
			<br>
			<select name="company">
				<option value="FareXplorer" selected>FareXplorer</option>
			</select>
		</div>
		<!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Source
			<br>
			<select name="supplier">
				<option value="JetCost" selected>JetCost</option>
			</select>
		</div> -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			From Date 
			<br>
			<input type="date" name="from_date">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			To Date
			<br>
			<input type="date" name="to_date">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Airlines
			<br>
			<input type="text" name="airlines">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			From Airport
			<br>
			<input type="text" name="from_airport">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			To Airport
			<br>
			<input type="text" name="to_airport">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Class 
			<br>
			<select name="class">
				<option value="any">Any</option>
				<option value="economy">Economy</option>
				<option value="premium_economy">Premium Economy</option>
				<option value="business_class">Business Class</option>
				<option value="first_class">First Class</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Markup Type
			<br>
			<select name="markup_type">
				<option value="">Any</option>
				<option value="absolute">Absolute</option>
				<option value="fixed">Fixed</option>
				<option value="percentage">Percentage</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Markup Value
			<br>
			<input type="text" name="markup_value">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<br>
			<input type="submit" value="Insert">
		</div>
	</div>

</form>
<br>
</div>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="search_airlines">
Search
<form id="search_markup" method="post" action="<?php echo base_url();?>Admin/markup">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="align-items: right;">
			<button type="button" onclick="open_add_div()">Add</button>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="align-items: right;">
			<button type="button" onclick="open_upload_div()">Upload Markup</button>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Reference No
			<br>
			<input type="text" name="reference">
		</div>
	<!-- 	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Supplier
			<select name="supplier">
				<option value="">Any</option>
				<option value="Amadeus">Amadeus</option>
			</select>
		</div> -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Company
			<br>
			<select name="company">
				<option value="FX" selected>FareXplorer</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			From Date
			<br>
			<input type="date" name="from_date">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			To Date
			<br>
			<input type="date" name="to_date">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Airlines
			<br>
			<input type="text" name="airlines">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Class 
			<br>
			<select name="class">
				<option value="">Any</option>
				<option value="economy">Economy</option>
				<option value="premium_economy">Premium Economy</option>
				<option value="business_class">Business Class</option>
				<option value="first_class">First Class</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			From Airport
			<br>
			<input type="text" name="from_airport">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			To Airport
			<br>
			<input type="text" name="to_airport">
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<br>
			<input type="submit" value="Search">
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
	function close_add_div() {
		$("#add_airlines").hide();
		$("#upload_csv").hide();
		$("#search_airlines").show();
	}
	function open_add_div() {
		$("#add_airlines").show();
		$("#upload_csv").hide();
		$("#search_airlines").hide();
	}
	function open_upload_div() {
		$("#add_airlines").hide();
		$("#upload_csv").show();
		$("#search_airlines").hide();
	}

	function close_upload_div() {
		$("#add_airlines").hide();
		$("#upload_csv").hide();
		$("#search_airlines").show();
	
	}
</script>
<?php 
if ($post==1) {
?>
<table id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
	<thead>
		<tr>
			<th>SNo</th>
			<th>From</th>
			<th>To</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Class</th>
			<th>Airlines</th>
			<th>Markup Type</th>
			<th>Markup Value</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i=1;
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $value->from_airport;?></td>
			<td><?php echo $value->to_airport;?></td>
			<td><?php echo $value->from_date;?></td>
			<td><?php echo $value->to_date;?></td>
			<td><?php echo $value->class;?></td>
			<td><?php echo $value->parameter_condition;?></td>
			<td><?php echo $value->type;?></td>
			<td><?php echo $value->amount;?></td>
			<td><a href="<?php echo base_url();?>Admin/delete_markup/<?php echo $value->id;?>">Delete Markup</a></td>
		</tr>
		<?php
		$i++;
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	new DataTable('#example', {
	    layout: {
	        topStart: {
	            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	        }
	    }
	});
</script>
<?php
}
?>
<?php $this->load->view('admin/footer');?>