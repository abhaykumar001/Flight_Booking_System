<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3">
<form method="post" action="">
	<h4>Searches Report</h4>
	<div class="row" style="margin-bottom:5px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			From
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" name="from" value="<?php if($post==1){echo $from;}?>">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			To 
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" name="to" value="<?php if($post==1){echo $to;}?>">
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Company 
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<select>
				<option value="FX">FareXplorer</option>	
			</select>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Date From 
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="date" name="departure" value="<?php if($post==1){echo $from_date;}else{echo date('Y-m-d');}?>">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Date To
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="date" name="return" value="<?php if($post==1){echo $to_date;}else{echo date('Y-m-d');}?>">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<span style="font-weight: 600;font-size:25px;">
				Total Searches = <?php if ($post==1) {echo $count;}?>
			</span>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<input type="submit" value="Search">
		</div>
	</div>
</form>
</div>
<?php
if ($post==1) {
?>
<table  id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
	<thead>
		<tr>
			<th>S No</th>
			<th>From</th>
			<th>To</th>
			<th>DepDate</th>
			<th>RetDate</th>
			<th>Cabin</th>
			<th>Journey</th>
			<th>Adult</th>
			<th>Child</th>
			<th>Infant</th>
			<th>Company</th>
			<th>Time</th>
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
			<td><?php echo $value->departure_date;?></td>
			<td><?php if($value->return_date!=''){echo $value->return_date;}else{echo $value->departure_date;}?></td>
			<td><?php echo $value->class;?></td>
			<td><?php  if($value->return_date!=''){echo "R";}else{echo "O";}?></td>
			<td><?php echo $value->adult;?></td>
			<td><?php echo $value->children;?></td>
			<td><?php echo $value->infant;?></td>
			<td><?php echo "FX";?></td>
			<td><?php echo $value->add_date;?></td>
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