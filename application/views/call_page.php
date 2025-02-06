<?php $this->load->view('header');?>

<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
<div class="flex flex-col items-center justify-center">
  <div class="flex flex-col items-center justify-center bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
    <img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" alt="Popup Image" class="mb-4 rounded">
    <h2 class="text-xl font-bold mb-1">GET <span class="text-orange-500"> 20% OFF </span>ON ALL BOOKINGS</h2>
    <h4 class="text-xs font-bold mb-1">CALL US NOW AT</h3>
    <button id="call" class="mb-1 bg-orange-500 text-white px-4 py-2 rounded-2xl mb-1">+1-681 246 0437</button>
    <h4 class="text-xs font-bold mb-1">WE ARE AVAILABLE 24X7</h3>
  </div>
  </div>

<?php $this->load->view('footer');?>