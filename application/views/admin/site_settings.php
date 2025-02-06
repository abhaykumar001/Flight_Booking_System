<?php $this->load->view('admin/header'); ?>
<?php 
$data=$this->db->query("SELECT * FROM site_settings");
$data=$data->result();
$data=$data[0];
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">			<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="input1">Site Name</label>
				<input type="text" class="form-control" name="site_name" value="<?php echo $data->site_name;?>">
			</div>
			
			<div class="form-group">
				<label for="input2">Site Code</label>
				<input type="text" class="form-control" name="site_code" value="<?php echo $data->company_code;?>">
			</div>
			<div class="form-group">
				<label for="input3">Site Logo</label>
				<input type="file" class="form-control-file" id="fileInput" name="logo">
				<img style="height:200px;width:200px;" src="<?php echo base_url();?>uploads/<?php echo $data->site_logo;?>">
			</div>
			<div class="form-group">
				<label for="textarea1">Address</label>
				<textarea class="form-control" name="address"><?php echo $data->address;?></textarea>
			</div>
		
			<div class="form-group">
				<label for="input6">Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo  $data->email;?>">
			</div>
			<div class="form-group">
				<label for="input7">Phone No</label>
				<input type="text" class="form-control"name="phone_no" value="<?php echo $data->phone_no;?>">
			</div>
			<div class="form-group">
				<label for="input8">Meta Name</label>
				<input type="text" class="form-control" name="meta_name" value="<?php echo $data->meta_name;?>">
			</div>
			<div class="form-group">
				<label for="input9">Meta Description</label>
				<textarea class="form-control" name="meta_description"><?php echo $data->meta_description;?></textarea>
			</div>
			<div class="form-group">
				<label for="input10">Amadeus Api Key</label>
				<input type="text" class="form-control" name="amadeus_api_key" value="<?php echo $data->api_key;?>">
			</div>
			<div class="form-group">
				<label for="input11">Amadeus Api Secret</label>
				<input type="text" class="form-control" name="amadeus_api_secret" value="<?php echo $data->api_secret;?>">
			</div>
			<div class="form-group">
				<label for="input12">Google Api Key</label>
				<input type="text" class="form-control" name="google_site_key" value="<?php echo $data->google_site_key;?>">
			</div>
			<div class="form-group">
				<label for="input13">Google Api Secret</label>
				<input type="text" class="form-control" name="google_secret_key" value="<?php echo $data->google_secret_key;?>">
			</div>			
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?>