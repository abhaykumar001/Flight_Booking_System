<?php $this->load->view('admin/header');?>
<div class="flex w-auto border shadow-lg shadow-cyan-500/50 rounded-lg mt-2 p-3">
<form method="post" action="">
	<h4 class="flex w-auto p-2" style="background: #b3d9ff">Sector Report</h4>
	<div class="row" style="margin-bottom:10px;">
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			Date From 
		</div>
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			<input type="date" name="departure" value="<?php if($post==1){echo $from_date;}else{echo date('Y-m-d');}?>">
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			Date To
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<input type="date" name="return" value="<?php if($post==1){echo $to_date;}else{echo date('Y-m-d');}?>">
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
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="submit" value="Search">
		</div>
	</div>
</form>
</div>
<?php
if ($post==1) {
?>
<table id="example" class="display nowrap" style="width:30%;font-size:0.8em;">
	<thead>
		<tr>
			<th>From</th>
			<th>To</th>
			<th>Total Searches</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $value->from_airport;?></td>
			<td><?php echo $value->to_airport;?></td>
			<td><?php echo $value->search_count;?></td>
		</tr>
		<?php
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