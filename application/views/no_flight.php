<?php $this->load->view('header');?>
<body class="overflow-hidden">
<section class="h-screen w-screen">
    <div class="flex flex-col mt-28">
        <div class="flex flex-col justify-center item-center mx-auto">
            <svg class="h-52 ml-3 w-52 text-blue-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z" transform="rotate(-15 12 12) translate(0 -1)" />  <line x1="3" y1="21" x2="21" y2="21" /></svg>
            <p class="text-3xl font-bold">No Flights Found</p>
        </div>
        <div class="flex flex-row justify-center item-center mx-auto">
                <a style="text-decoration:none;" class="bg-orange-500 text-white text-2xl font-bold mt-4 rounded-full px-4 py-3 transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300" href="<?php echo base_url();?>">Click Here for Home Page</a>
        </div>
</div>
</section>
</body>

<?php $this->load->view('footer');?>