<?php $this->load->view('admin/header');?>

<form method="post" action="<?php echo base_url();?>Admin/cms_insert" id="add_page" style="display: none;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button onclick="cancel_page()">Cancel</button>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4>Add Page</h4>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Page Title
			<br>
			<input type="text" name="page_title" required>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Meta Name
			<br>
			<input type="text" name="meta_name" required>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			Meta Description
			<br>
			<input type="text" name="meta_description" required>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			Content<br>
			<textarea name="content"></textarea>
		</div>
		<input type="submit" value="Insert">
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
<div class="row" id="contents">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button onclick="add_page()">Add New Page</button>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h4>Content</h4>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table border="1">
			<thead>				
				<tr>
					<th>SNo</th>
					<th>Page Title</th>
					<th>#</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>	
				<?php 
				$query=$this->db->query("SELECT * FROM cms WHERE status=1");
				$query=$query->result();
				$count=1;
				foreach ($query as $key => $value) {
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $value->page_title;?></td>
					<td><a href="<?php echo base_url();?>Admin/cms_edit/<?php echo $value->id;?>">Edit</a></td>
					<td><a href="<?php echo base_url();?>Admin/cms_delete/<?php echo $value->id;?>">Delete</a></td>
				</tr>
				<?php
				$count++;
				}
				?>			
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function add_page() {
		$("#add_page").show();
		$("#contents").hide();
	}
	function cancel_page() {
		$("#add_page").hide();
		$("#contents").show();
		
	}
</script>
<?php $this->load->view('admin/footer');?>