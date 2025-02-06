<?php $this->load->view('admin/header');?>
<form method="post" action="<?php echo base_url();?>Admin/cms_update">		
	<div class="row" >
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="<?php echo base_url();?>Admin/cms">Cancel</a>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4>Add Page</h4>
		</div>
		<input type="hidden" name="page_id" value="<?php echo $data->id;?>">
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
			Page Title
			<br>
			<input type="text" name="page_title" value="<?php echo $data->page_title;?>">
		</div>
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
			Meta Name
			<br>
			<input type="text" name="meta_name" value="<?php echo $data->meta_name;?>">
		</div>
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
			Meta Description
			<br>
			<input type="text" name="meta_description" value="<?php echo $data->meta_description;?>">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			Content<br>
			<textarea name="content"><?php echo $data->content;?></textarea>
		</div>
		<input type="submit" value="Update">
	</div>
</form>
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/kmvgiy8f89m7n1f4jitffj00uwlbbvpvk6cws1m6jkjh04ej/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
  });
</script>
<?php $this->load->view('admin/footer');?>