<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="add_airlines" style="display: none;">
<form method="post" action="<?php echo base_url();?>Admin/add_meta_airlines" >	
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
			Supplier<br>
			<select name="supplier">
				<option value="any">Any</option>		
				<option value="Amadeus" selected>Amadeus</option>
			</select>
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
		<div class="col-lg-3">
				Source
			<br>
			<select name="source">
				<option value="JTC">JetCost</option>
			</select>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			Status
			<input type="checkbox" name="status" checked>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<input type="submit" value="Insert">
		</div>
	</div>
	
</form>
</div>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3" id="search_airlines">
<form method="post" action="<?php echo base_url();?>Admin/meta_airlines" id="add_airlines">	
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
			Supplier
			<br>
			<select name="supplier">
				<option value="any">Any</option>		
				<option value="Amadeus" selected>Amadeus</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Company
			<br>
			<select name="company">
				<option value="FUS">Flights Merchant US</option>
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			Source
			<br>
			<select name="source">
				<option value="JTC">JetCost</option>
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
			<td><?php echo $value->airline;?></td>
			<td><?php echo $value->supplier;?></td>
			<td><?php echo $value->company;?></td>
			<td><?php echo $value->source;?></td>
			<td><?php if($value->status==1){echo "Active";}else{echo "Inactive";}?></td>
			<td>
				<a href="<?php echo base_url();?>Admin/delete_meta_airline/<?php echo $value->id;?>">Delete</a>
				<?php 
				if ($value->status==1) {
				?>					
				<a href="<?php echo base_url();?>Admin/inactive_meta_airline/<?php echo $value->id;?>">Inactive</a>
				<?php
				}
				else{
				?>
				<a href="<?php echo base_url();?>Admin/active_meta_airline/<?php echo $value->id;?>">Active</a>

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