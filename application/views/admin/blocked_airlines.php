<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="add_airlines" style="display: none;">
<form method="post" action="<?php echo base_url();?>Admin/add_blocked_airline" >	
	<div class="row" style="margin-bottom:5px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="align-items: right;">
			<button type="button" onclick="close_add_div()">Close</button>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Airline
			<br>
			<input type="text" name="airline" required>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Journey Type
			<br>
			<select name="trip_type">
				<option value="any">Any</option>
				<option value="Round Trip">Round Trip</option>
				<option value="One Way">One Way</option>
			</select>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Travel Date From
			<br>
			<input type="date" name="travel_date_from">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Travel Date To
			<br>
			<input type="date" name="travel_date_to">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Company
			<br>
			<select name="company">
				<option value="FX">FareXplorer</option>
			</select>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			Status
			<input type="checkbox" name="status" checked>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<input type="submit" value="Insert">
		</div>
	</div>
	
</form>
</div>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="search_airlines">
<form method="post" action="<?php echo base_url();?>Admin/blocked_airlines" id="add_airlines">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="align-items: right;">
			<button type="button" onclick="open_add_div()">Add</button>
	</div>
	<div class="row" style="margin-bottom:10px;">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Airline
			<br>
			<input type="text" name="airline">
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Company
			<br>
			<select name="company">
				<option value="FX">FareXplorer</option>
			</select>
		</div>
		
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
			<input type="submit" value="Search">
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
	function close_add_div() {
		$("#add_airlines").hide();
		$("#search_airlines").show();
	}
	function open_add_div() {
		$("#add_airlines").show();
		$("#search_airlines").hide();
	}
</script>
<?php 
if ($post==1) {
?>
<table  id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
	<thead>
		<tr>
			<th>SNo</th>
			<th>Airlines</th>
			<th>Supplier</th>
			<th>Journey Type</th>
			<th>TravelFrom</th>
			<th>Company</th>
			<th>Source</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i=1;
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $value->airlines_code;?></td>
			<td><?php echo $value->supplier;?></td>
			<td><?php echo $value->journey_type;?></td>
			<td><?php echo $value->travel_date_from;?></td>
			<td><?php echo $value->travel_date_to;?></td>
			<td><?php echo $value->company;?></td>
			<td><?php echo $value->source;?></td>
			<td>
				<a href="<?php echo base_url();?>Admin/delete_blocked_airline/<?php echo $value->id;?>">Delete</a>
				<?php 
				if ($value->status==1) {
				?>					
				<a href="<?php echo base_url();?>Admin/inactive_blocked_airline/<?php echo $value->id;?>">Inactive</a>
				<?php
				}
				else{
				?>
				<a href="<?php echo base_url();?>Admin/active_blocked_airline/<?php echo $value->id;?>">Active</a>

				<?php
				}
				?>
			</td>
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