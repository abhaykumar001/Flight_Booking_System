<?php 
$site_settings=$this->db->query("SELECT * FROM site_settings");
$site_settings=$site_settings->result();
$site_settings=$site_settings[0];
?>
    <div class="grid grid-cols-1 mt-5 lg:px-64 lg:grid-cols-4">
      <div class="flex flex-col">
        <div class = "flex justify-center item-center">
          <img class="h-[170px] w-[170px] rounded-lg" src="<?php echo base_url();?>uploads/<?php echo $site_settings->site_logo;?>" alt="FareXplorer">
        </div>
      </div>
      <div class="flex flex-col mt-2">
         <div class="text-orange-500 text-2xl flex justify-center item-center">
          Contact Us
        </div>
        <div class="flex flex-row justify-center item-center">
          <svg class="h-8 w-8 text-orange-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path d="M9 5h10l2 2l-2 2h-10a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
            <path d="M13 13h-7l-2 2l2 2h7a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1" />
            <line x1="12" y1="22" x2="12" y2="17" />
            <line x1="12" y1="13" x2="12" y2="9" />
            <line x1="12" y1="5" x2="12" y2="3" />
          </svg>
          <?php echo $site_settings->address;?>
        </div>
        <div class="flex flex-row justify-center item-center">
          <svg class="h-8 w-8 text-orange-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <?php echo $site_settings->phone_no;?>

        </div>
        <div class="flex flex-row justify-center item-center">
          <svg class="h-8 w-8 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
            <polyline points="22,6 12,13 2,6" />
          </svg>
          <?php echo $site_settings->email;?>

        </div>
      </div>
      <div class="flex flex-col mt-2">
        <div class="text-orange-500 text-2xl flex justify-center item-center">
          Quick Link
        </div>
        <div class="mt-4 flex justify-center item-center">
          <ul>
           <?php 
           $query=$this->db->query("SELECT * FROM cms WHERE status=1");
           $query=$query->result();
           foreach ($query as $key => $value) {
            // print_r($value);die();
            ?>
            <li><a href="<?php echo base_url();?>Home/page/<?php echo $value->url_link;?>"><?php echo $value->page_title;?></a></li>
            <?php
          }
          ?>
            <li><a href="<?php echo base_url();?>Home/contact">Contact Us</a></li>

          </ul>
        </div>
      </div>

  <!--     <div class="flex flex-col mt-2">
        <div class="text-orange-500 text-2xl flex justify-center item-center">
          Quick Link
        </div>
        <div class="mt-4 flex justify-center item-center">
          <ul>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>Home/contact">Contact Us</a></li>
            <li><a href="tel:<?php echo $site_settings->phone_no;?>">Call Us</a></li>
          </ul>
        </div>
      </div>
 -->
      <div class="flex flex-col mt-2">
        <div class="text-orange-500 text-2xl flex justify-center item-center">
          Special Deals
        </div>
        <div class="mt-4 flex justify-center item-center">
          <ul>
            <li><a href="<?php echo base_url();?>Home/contact">Family Travel</a></li>
            <li><a href="<?php echo base_url();?>Home/contact">Business Travel</a></li>
            <li><a href="<?php echo base_url();?>Home/contact">Weekend Travel</a></li>
            <li><a href="<?php echo base_url();?>Home/contact">Romantic Travel</a></li>
            <li><a href="<?php echo base_url();?>Home/contact">Last Minute Travel</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex justify-center item-center mt-3 px-5 text-sm" id="warnings">
      * Fares are inclusive of all surcharges, our service fees & taxes. Tickets are non-refundable, 
      non-transferable and non-assignable unless otherwise stated in the itinerary.  Other restrictions may apply. 
      Booking tickets over phone are subject to an additional $10 fee per passenger.* Fares are inclusive of all surcharges, 
      our service fees & taxes. Tickets are non-refundable, non-transferable and non-assignable unless otherwise stated in the 
      itinerary. Name changes are not permitted once a booking is confirmed. Displayed fares are subject to change and cannot 
      be guaranteed until a booking confirmed and ticket is issued. Lowest fares may require an advance purchase of up to 21
       days. Certain blackout dates may apply. Holidays and weekend travel may have a surcharge. Other restrictions may apply. 
       Booking tickets over phone are subject to an additional $10 fee per passenger.
    </div>
    
    <div class="flex flex-auto w-full bg-orange-500 h-12 mt-3 p-3 rounded-md text-sm text-white ">
      <?php echo date('Y');?> <?php echo $site_settings->site_name;?>. ALL RIGHTS RESERVED.
    </div>
  </div>





  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuToggle = document.querySelector('[aria-controls="mobile-menu"]');
      const mobileMenu = document.getElementById('mobile-menu');

      menuToggle.addEventListener('click', function () {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        mobileMenu.classList.toggle('hidden');
      });
    });
  </script>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <script src="<?php echo base_url();?>asset/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>