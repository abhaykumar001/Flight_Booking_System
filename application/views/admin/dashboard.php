<?php $this->load->view('admin/header');?>
<!-- Add your main content here -->
<div class="jumbotron">
	<h6 >Welcome <?php echo $this->session->userdata('admin_first_name')." ".$this->session->userdata('admin_last_name');?></h6>
</div>
<!-- 
<div class="col-md-3 float-right">
	<div class="card text-center mb-3">
		<div class="card-body">
			<h5 class="card-title">Box 1</h5>
			<p class="card-text">100</p>
		</div>
	</div>
	<div class="card text-center mb-3">
		<div class="card-body">
			<h5 class="card-title">Box 2</h5>
			<p class="card-text">200</p>
		</div>
	</div>
	<div class="card text-center mb-3">
		<div class="card-body">
			<h5 class="card-title">Box 3</h5>
			<p class="card-text">300</p>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Data Visualization</h4>
			</div>
			<div class="card-body" style="position: relative;height:60vh; width:60vw">
				<canvas id="barChart" style="width: 100%; height: 400px;"></canvas>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Component 1</h4>
			</div>
			<div class="card-body">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Component 2</h4>
			</div>
			<div class="card-body">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Component 3</h4>
			</div>
			<div class="card-body">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card" style="width: 18rem;">
			<img src="..." class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
		</div>
	</div>
 -->
	<!-- Add more cards as needed -->
</div>
<?php $this->load->view('admin/footer');?>