<?php $this->load->view('header');?>
<div class="container justify-center item-center mt-10">
	<div class=" mt-16">
		<div class="text-lg">
			<h4><?php echo $page_title;?></h4>
			<hr>
		</div>
		<div class="mt-4 text-md">
			<?php echo $content;?>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>