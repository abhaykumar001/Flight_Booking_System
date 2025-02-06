<?php $this->load->view('admin/header');?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table id="example" class="display nowrap" style="width:100%;font-size:0.8em;">
			<thead>
				<tr>
					<th>SNo</th>
					<th>Customer Name</th>
					<th>City</th>
					<th>Pickup Date</th>
					<th>Pickup Time</th>
					<th>Drop Date</th>
					<th>Drop Time</th>
					<th>Email</th>
					<th>Phone No</th>
					<th>Remarks</th>
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
					<td><?php echo $value->pickup_date;?></td>
					<td><?php echo $value->pickup_time;?></td>
					<td><?php echo $value->drop_date;?></td>
					<td><?php echo $value->drop_time;?></td>
					<td><?php echo $value->email;?></td>
					<td><?php echo $value->phone_no;?></td>
					<td><?php echo $value->remarks;?></td>
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