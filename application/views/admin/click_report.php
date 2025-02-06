<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3">

<form method="post" action="">
	<h4 class="flex w-auto p-2" style="background: #b3d9ff">Searches Report</h4>
	<div class="row" style="margin-bottom:5px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			IP:
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<input type="text" name="from" value="<?php if($post==1){echo $ip;}?>" style="width:95%;">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Company 
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<select>
				<option value="FX">FareXplorer</option>	
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Date From 
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<input type="date" name="from" value="<?php if($post==1){echo $from_date;}else{echo date('Y-m-d');}?>">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Date To
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<input type="date" name="to" value="<?php if($post==1){echo $to_date;}else{echo date('Y-m-d');}?>">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<input type="submit" value="Search">
		</div>
	</div>
</form>
</div>
<?php
if ($post==1) {
?>
<table id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
	<thead>
		<tr>
			<th>SNo</th>
			<th>IP</th>
			<th>From</th>
			<th>To</th>
			<th>DepDate</th>
			<th>RetDate</th>
			<th>Cabin</th>
			<th>Journey</th>
			<th>Adult</th>
			<th>Child</th>
			<th>Infant</th>
			<th>Supplier</th>
			<th>Airline</th>
			<th>Price</th>
			<th>Company</th>
			<th>Source</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $value->ip;?></td>
			<td><?php echo $value->from_airport;?></td>
			<td><?php echo $value->to_airport;?></td>
			<td><?php echo $value->departure_date;?></td>
			<td><?php echo $value->return_date;?></td>
			<td><?php echo $value->class;?></td>
			<td><?php if($value->return_date==''){echo "O";}else{echo "R";}?></td>
			<td><?php echo $value->adult;?></td>
			<td><?php echo $value->child;?></td>
			<td><?php echo $value->infant;?></td>
			<td><?php echo $value->supplier;?></td>
			<td><?php echo $value->airlines;?></td>
			<td><?php echo $value->price;?></td>
			<td><?php echo $value->company;?></td>
			<td><?php echo $value->source;?></td>
			<td><?php echo $value->add_time;?></td>
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