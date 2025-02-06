<?php $this->load->view('admin/header');?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
			<thead>
				<tr>
					<th>SNo</th>
					<th>Customer Name</th>
					<th>City</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Email</th>
					<th>Phone No</th>
					<th>Remarks</th>
					<th>Five Star</th>
					<th>Four Star</th>
					<th>Enquiry Time</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i=1;
				foreach ($data as $key => $value) {
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $value->customer_name;?></td>
					<td><?php echo $value->city;?></td>
					<td><?php echo $value->check_in;?></td>
					<td><?php echo $value->check_out;?></td>
					<td><?php echo $value->email;?></td>
					<td><?php echo $value->mobile;?></td>
					<td><?php echo $value->remarks;?></td>
					<td><?php if($value->five_star==1){echo "Yes";}else{echo "No";}?></td>
					<td><?php if($value->four_star==1){echo "Yes";}else{echo "No";}?></td>
					<td><?php echo $value->add_time;?></td>
				</tr>
				<?php
				$i++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	new DataTable('#example', {
		
	    layout: {
	        topStart: {
	            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	        }
	    }
	});
</script>
<?php $this->load->view('admin/footer');?>