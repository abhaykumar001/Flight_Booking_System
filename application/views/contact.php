<?php $this->load->view('header');?>
<style>
	.row>*{
		padding-right: calc(var(--bs-gutter-x) * 0);
    	padding-left: calc(var(--bs-gutter-x) * 0);
	}
	.row{
		margin-right: 0;
    	margin-left: 5%;
	}
	.form-control{
		padding: 0.375rem 0rem;
	}
	.container{
		padding-right: calc(var(--bs-gutter-x) * 0);
    	padding-left: calc(var(--bs-gutter-x) * 0);
	}
    .spc{
        margin-bottom:2%
    }
	@media only screen and (max-width:880px) {
		/* .row>*{
			width:90%;
		} */
		.form-control{
			width:95% !important
		}
		.container{
			padding-right: calc(var(--bs-gutter-x) * 0);
    		padding-left: calc(var(--bs-gutter-x) * 0);
		}
	}
</style>
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-md-0 mb-5">
            <?php 
            if ($this->session->userdata('contact_message')) {
            ?>
            <span style="color:green;font-weight:600;"><?php echo $this->session->userdata('contact_message');?></span>

            <?php 
                $this->session->unset_userdata('contact_message');
            }

            ?>
            <form id="contact-form" class="col-md-12" name="contact-form" action="<?php echo base_url();?>Home/contact_action" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="first_name" class="">First name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="last_name" class="">Last name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <!--Grid column-->
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="address" class="">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="city" class="">City</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="state" class="">State</label>
                            <input type="text" id="state" name="state" class="form-control" required>
                        </div>
                    </div> 
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="zipcode" class="">Zipcode</label>
                            <input type="number" id="zipcode" name="zipcode" class="form-control" min="10000" max="99999" required>
                        </div>
                    </div>

                    <br>

                    <!--Grid column-->
                    <div class="col-md-12 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="email" class="">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 col-xs-12 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="phone_no" class="">Phone Number</label>
                            <input type="number" id="phone_no" name="phone_no" class="form-control" min="1000000000" max="9999999999" required>
                        </div>
                    </div>
                    <br>
                    
                    <div class="col-md-6 col-xs-6 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="dob" class="">Date of Birth</label>
                            <input type="date" id="dob" name="dob" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    
                    <div class="col-md-6 col-xs-6 col-sm-12 spc">
                        <div class="md-form mb-0">
                            <label for="gender" class="">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <br>


                    <!--Grid column-->

                </div>
                <!--Grid row-->


                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                <div class="col-md-12 col-xs-12 col-sm-12 spc">

                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text"  name="message" rows="2" class="form-control" required></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row--> 
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12 col-xs-12 col-sm-12 spc">
                        <input type="checkbox" name="sms_consent" > By clicking this box, you agree to receive SMS from FareXplorer according to our <a href="<?php echo base_url();?>Home/page/7" style="color:blue;" target="_blank">privacy policy</a>
                    </div>
                </div>
                 <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12 col-xs-12 col-sm-12 spc">
            <div class="text-center text-md-left">
                <input class="btn btn-primary" type="submit" value="Send">
                <!-- <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a> -->
            </div>
                    </div>
                </div>



            </form>

            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <?php 
            $site_settings=$this->db->query("SELECT * FROM site_settings");
            $site_settings=$site_settings->result();
            $site_settings=$site_settings[0];
        ?>
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fa fa-map-marker fa-2x"></i>
                    <p>
                       <?php echo $site_settings->address;?>
                    </p>
                </li>

                <li><i class="fa fa-phone mt-4 fa-2x"></i>
                                    <a href="tel:<?php echo $site_settings->phone_no;?>" style="text-decoration:none; color:black;cursor:pointer;"><p><?php echo $site_settings->phone_no;?> (Customer Care)</p></a>
                </li>

                <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                    <a href="mailto:<?php echo $site_settings->email;?>" style="text-decoration:none; color:black;cursor:pointer;"><p><?php echo $site_settings->email;?></p></a>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
<?php $this->load->view('footer');?>