<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>

<!doctype html>
<html>

<head>
    <title><?php echo $site_settings->site_name;?></title>
    <meta name="description" content="<?php echo $site_settings->meta_description;?>"/>
    <meta name="keywords" content="<?php echo $site_settings->meta_name;?>"/>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Include Flowbite CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

<div class="top-0 z-50 sticky flex px-5 py-2 bg-blue-500 block md:hidden">
      <button href="tel:<?php echo $site_settings->phone_no;?>" 
        class="flex text-white px-2 py-2" aria-current="page">
        <svg class="h-8 w-8 mr-1 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  
        stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
        <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 
        19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 
        2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 
        6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
        </svg>
        <div class="font-medium text-xl">Call Now:</div>
        <div class="font-medium text-xl ml-1"><?php echo $site_settings->phone_no;?></div>
      </button>
  </div>

  <nav class="dark:bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between">
      <a href="https://farexplorer.com/" class="space-x-3 rtl:space-x-reverse z-10" style="cursor:pointer;">
        <img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" class="h-16 w-auto touch-pinch-zoom rounded-full block lg:hidden" alt=""/>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="p-2 mr-5 text-sm text-gray-500 
      rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 
      dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    <div class=" hidden w-full md:block md:w-auto" id="navbar-default">
    <ul class="font-medium flex flex-col p-4 md:p-0 md:flex-row md:space-x-8 rtl:space-x-reverse">
      <li><a class="" href="<?php echo base_url();?>">Home</a></li>
      <li><a class="" href="<?php echo base_url();?>Home/contact">Contact Us</a></li>
      <?php 
      if ($this->session->userdata('login_status')==1) { 
      ?>
      <!-- <li>Hi, <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></li> -->
      <li><a class="" href="<?php echo base_url();?>Dashboard/profile">My Profile</a></li>
      <li><a class="" href="<?php echo base_url();?>Dashboard/last_booking">Last Booking</a></li>
      <li><a class="" href="<?php echo base_url();?>Dashboard/bookings">Bookings</a></li>
      <?php }?>
      <?php if ($this->session->userdata('login_status')!=1) { ?>
        <li><a class="" href="<?php echo base_url();?>Home/login">Login</a></li>
        <li><a class="" href="<?php echo base_url();?>Home/register">Sign Up</a></li>
        <?php }?>
      <li class="hidden md:block"><a href="tel:<?php echo $site_settings->phone_no;?>" class="bg-blue-500 text-white border rounded-2xl px-5 py-2" aria-current="page"><?php echo $site_settings->phone_no;?></a>
      </li>
      </ul>
    </div>
  </nav>
  <a href="<?php echo base_url();?>">
  <img src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" class="absolute z-10 hidden lg:-m-20 lg:ml-48 lg:h-32 lg:block rounded-full" alt=""/>
  </a>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector('[data-collapse-toggle="navbar-default"]');
    const mobileMenu = document.getElementById('navbar-default');

    menuToggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true' || false;
      this.setAttribute('aria-expanded', !expanded);
      mobileMenu.classList.toggle('hidden');
    });
  });
</script>

