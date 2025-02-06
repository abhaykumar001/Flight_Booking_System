<?php 
class Admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/login');	
	}

	public function login_action()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' AND status=1");
		// print_r("SELECT * FROM admin WHERE username='$username' AND password='$password' AND status=1");
		$count=$query->num_rows();
		if ($count>0) {
			$data=$query->result();
			$data=$data[0];
			$array=array('admin_login'=>1,'admin_first_name'=>$data->first_name,'admin_last_name'=>$data->last_name,'user_list'=>$data->user_list,'booking_list'=>$data->booking_list,'admin_user_management'=>$data->admin_user_management,'rate_management'=>$data->rate_management,'site_settings'=>$data->site_settings,'cms'=>$data->cms);
			$this->session->set_userdata($array);
			redirect('Admin/dashboard');

			
		}
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}

	public function site_users()
	{
		if ($this->session->userdata('user_list')==1) {
			if ($this->input->post()) {
				$query="SELECT * FROM users WHERE status=1 ";
				$first_name=$this->input->post('first_name');
				$last_name=$this->input->post('last_name');
				$email=$this->input->post('email');
				$mobile_no=$this->input->post('mobile_no');
				if ($first_name!="") {
					$query.="AND first_name LIKE '%$first_name%' ";
				}
				if ($last_name!="") {
					$query.="AND last_name LIKE '%$last_name%' ";
				}
				if ($email!="") {
					$query.="AND email LIKE '%$email%' ";
				}
				if ($mobile_no!="") {
					$query.="AND mobile_no LIKE '%$mobile_no%' ";
				}
			}
			else{
				$query="SELECT * FROM users WHERE status=1";
			}
			$query=$this->db->query($query);
			$count=$query->num_rows();
			$data=$query->result();
			$array=array('count'=>$count,'data'=>$data);
			$this->load->view('admin/site_users',$array);
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}

	public function delete_user($id)
	{
		if ($this->session->userdata('user_list')==1) {
			$query=$this->db->query("UPDATE users SET status=0 WHERE id=$id");
			redirect('Admin/site_users');
		}
		else{
			redirect('Admin/dashboard');die();
		}
	}

	public function user_booking($id)
	{
		if ($this->session->userdata('user_list')==1) {
			$user_data=$this->db->query("SELECT * FROM users WHERE id=$id");
			$user_data=$user_data->result();
			$user_data=$user_data[0];

			$mobile_no=$user_data->mobile_no;
			$email=$user_data->email;

			$bookings=$this->db->query("SELECT * FROM flight_booking WHERE contact_email='$email' OR contact_phone='$mobile_no' OR user_id='$id'");
			// print_r("SELECT * FROM flight_booking WHERE contact_email='$email' OR contact_phone='$mobile_no' OR user_id='$id'");die();
			$bookings=$bookings->result();
			// echo "<pre>";print_r($bookings);die();
			$array=array('user_data'=>$user_data,'booking_data'=>$bookings);
			
			$this->load->view('admin/user_booking',$array);
		}
		else{
			redirect('Admin/dashboard');die();
		}

	}

	public function booking_details($id)
	{
		$booking_details=$this->db->query("SELECT * FROM flight_booking WHERE id=$id");
		$booking_details=$booking_details->result();
		$booking_details=$booking_details[0];

		$passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id=$id");
		$passenger_details=$passenger_details->result();
		$payment_method=$this->db->query("SELECT * FROM payment_method WHERE booking_id='$id'");
		$payment_method=$payment_method->result();

		if ($booking_details->flight_complete_detail!='') {
			$array=array('booking_details'=>$booking_details,'passenger_details'=>$passenger_details,'payment_method'=>$payment_method);
			$this->load->view('admin/booking_details',$array);
		}
		else{
			$flight_details=$this->db->query("SELECT * FROM flight_details WHERE booking_id=$id");
			$flight_details=$flight_details->result();

			$payment_details=$this->db->query("SELECT * FROM payment_details WHERE booking_id='$id'");
			$payment_details=$payment_details->result();

			$array=array('booking_details'=>$booking_details,'passenger_details'=>$passenger_details,'flight_details'=>$flight_details,'payment_details'=>$payment_details,'payment_method'=>$payment_method);
			$this->load->view('admin/booking_details2',$array);
		}


	}

	public function booking_list()
	{
		if ($this->session->userdata('booking_list')==1) {
			if ($this->input->post()) {

				$query="SELECT * FROM flight_booking WHERE 1";
				
				$from=$this->input->post('from');
				$to=$this->input->post('to');
				$status=$this->input->post('status');
				$grand_total=$this->input->post('grand_total');
				$pnr=$this->input->post('pnr');
				$last_name=$this->input->post('last_name');
				$source="";
				// $source=$this->input->post('source');
				$booking_ref=$this->input->post('booking_ref');
				if ($from!="") {
					$query.=" AND booking_date >= '$from'";
				}
				if ($to!="") {
					$query.=" AND booking_date <= '$to'";
				}
				if ($status!="") {
					$query.=" AND booking_source = '$status'";
				}
				if ($grand_total!="") {
					$query.=" AND gross_total = '$grand_total'";
				}
				if ($pnr!="") {
					$query.=" AND pnr_no = '$pnr'";
				}
				if ($last_name!="") {
					$query.="AND contact_last_name='$last_name'";
				}
				if ($source!="") {
					$query.="AND source='$source'";
				}
				if ($booking_ref!="") {
					$query.="AND reference_no='$booking_ref' ";
				}
				// print_r($query);die();
			}
			else{
				$to=date('Y-m-d');
				$from=date("Y-m-d", strtotime("-1 week"));
				$status="";
				$grand_total="";
				$pnr="";
				$last_name="";
				$source="";
				$query="SELECT * FROM flight_booking WHERE booking_date >= '$from' ORDER BY id DESC";
			}
			$query=$this->db->query($query);
			$query=$query->result();
			$data=array('booking_data'=>$query,'from'=>$from,'to'=>$to,'status'=>$status,'grand_total'=>$grand_total,'pnr'=>$pnr,'last_name'=>$last_name,'source'=>$source);
			$this->load->view('admin/booking_list',$data);

		}
		else{

			redirect('Admin/dashboard');die();
		}

	}

	public function admin_user_management()
	{
		if ($this->session->userdata('admin_user_management')==1) {
		
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}
	public function rate_management()
	{
		if ($this->session->userdata('rate_management')==1) {
		
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}
	public function admin_users()
	{
		if ($this->session->userdata('admin_user_management')==1) {
			$this->load->view('admin/admin_users');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function site_settings()
	{
		if ($this->session->userdata('site_settings')==1) {

			if ($this->input->post()) {
				$site_name=$this->input->post('site_name');
				$company_code=$this->input->post('site_code');
				$address=$this->input->post('address');
				$email=$this->input->post('email');
				$meta_name=$this->input->post('meta_name');
				$meta_description=$this->input->post('meta_description');
				$api_key=$this->input->post('amadeus_api_key');
				$api_secret=$this->input->post('amadeus_api_secret');
				$google_site_key=$this->input->post('google_site_key');
				$google_secret_key=$this->input->post('google_secret_key');
				$logo="";
				$config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('logo'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {
                    // print_r(getenv("REMOTE_ADDR"));die();
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data);
                    // echo "<br><br>";
                    $logo=$data['upload_data']['file_name'];
                }
				if ($logo=="") {
					$logo=$this->db->query("SELECT site_logo FROM site_settings");
					$logo=$logo->result();
					$logo=$logo[0]->site_logo;
				}
				$id=$this->session->userdata('user_id');
				// print_r();die();
				$modify_date=date('Y-m-d h:i:s');
				$query=$this->db->query("UPDATE site_settings SET site_name='$site_name',company_code='$company_code',site_logo='$logo',address='$address',email='$email',meta_name='$meta_name',meta_description='$meta_description',api_key='$api_key',api_secret='$api_secret',google_site_key='$google_site_key',google_secret_key='$google_secret_key',modify_time='$modify_date',modify_by=$id");
				// die();
			}
			$this->load->view('admin/site_settings');
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}
	
	public function cms()
	{
		if ($this->session->userdata('cms')==1) {
			$this->load->view('admin/cms');
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}

	public function cms_delete($id)
	{
		$query=$this->db->query("UPDATE cms SET status=0 WHERE id='$id'");
		redirect('Admin/cms');
	}

	public function cms_edit($id)
	{
		$query=$this->db->query("SELECT * FROM cms WHERE id='$id'");
		$query=$query->result();
		$query=$query[0];

		$data=array('data'=>$query);
		$this->load->view('admin/cms_edit',$data);
	}

	public function cms_update()
	{
		$id=$this->input->post('page_id');
		$page_title=$this->input->post('page_title');
		$meta_name=$this->input->post('meta_name');
		$meta_description=$this->input->post('meta_description');
		$content=$this->input->post('content');
		$query=$this->db->query("UPDATE cms SET page_title='$page_title',meta_name='$meta_name',meta_description='$meta_description',content='$content' WHERE id='$id'");
		redirect('Admin/cms');
	}
	public function cms_insert()
	{
		$page_title=$this->input->post('page_title');
		$meta_name=$this->input->post('meta_name');
		$meta_description=$this->input->post('meta_description');
		$content=$this->input->post('content');
		$add_time=date('Y-m-d h:i:s');
		$add_ip=$_SERVER['REMOTE_ADDR'];

		$query=$this->db->query("INSERT INTO cms(page_title,meta_name,meta_description,content,status,add_time,add_ip) VALUES('$page_title','$meta_name','$meta_description','$content',1,'$add_time','$add_ip')");
		redirect('Admin/cms');
	}

	public function searches_tracker()
	{
		if ($this->session->userdata('admin_login')==1) {
			$data=array();
			$post=0;
			if ($this->input->post()) {
				$departure=$this->input->post('departure');
				$return=$this->input->post('return');
				$condition="";
				$from=$this->input->post('from');
				if ($from!='') {
					$condition.="AND from_airport='$from' ";
				}
				$to=$this->input->post('to');
				if ($to!='') {
					$condition.="  AND to_airport='$to'";
				}
				$query=$this->db->query("SELECT * FROM search_log WHERE add_date >= '$departure 00:00:00' AND add_date <= '$return 23:59:59' $condition ");
				$count=$query->num_rows();
				$query=$query->result();
				$data['data']=$query;
				$data['count']=$count;
				$data['from_date']=$departure;
				$data['to_date']=$return;
				$data['from']=$from;
				$data['to']=$to;
				$post=1;
			}
			$data['post']=$post;
			$this->load->view('admin/searches_tracker',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function sector_report()
	{
		if ($this->session->userdata('admin_login')==1) {
			$data=array();
			$post=0;
			if ($this->input->post()) {
				$departure=$this->input->post('departure');
				$return=$this->input->post('return');
				
				$query=$this->db->query("SELECT from_airport,to_airport,count(id) as search_count FROM search_log WHERE add_date >= '$departure 00:00:00' AND add_date <= '$return 23:59:59' GROUP BY from_airport,to_airport");
				$count=$query->num_rows();
				$query=$query->result();
				$data['data']=$query;
				$data['count']=$count;
				$data['from_date']=$departure;
				$data['to_date']=$return;
				$post=1;
			}
			$data['post']=$post;
			$this->load->view('admin/sector_report',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}	
	}

	public function click_report()
	{
		if ($this->session->userdata('admin_login')==1) {
			$data=array();
			$post=0;
			if ($this->input->post()) {
				$departure=$this->input->post('from');
				$return=$this->input->post('to');
				$condition="";
				$ip=$this->input->post('ip');
				if ($ip!='') {
					$condition.=" AND ip='$ip'";
				}
				$query=$this->db->query("SELECT * FROM click_tracker WHERE add_time>='$departure 00:00:00' AND add_time <='$return 23:59:59' $condition");
				$count=$query->num_rows();
				$query=$query->result();
				$data['data']=$query;
				$data['count']=$count;
				$data['from_date']=$departure;
				$data['to_date']=$return;
				$data['ip']=$ip;
				$post=1;
			}
			$data['post']=$post;
			$this->load->view('admin/click_report',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}			
	}

	public function clicks_tracker()
	{
		if ($this->session->userdata('admin_login')==1) {
			$data=array();
			$post=0;
			if ($this->input->post()) {
				$departure=$this->input->post('from');
				$return=$this->input->post('to');
				$condition="";
				$ip=$this->input->post('ip');
				if ($ip!='') {
					$condition.=" AND ip='$ip'";
				}
				$page=$this->input->post('ip');
				if ($page!='') {
					$condition.=" AND page='$page'";
				}
				$query=$this->db->query("SELECT * FROM click_tracker WHERE add_time>='$departure 00:00:00' AND add_time <='$return 23:59:59' $condition");
				$count=$query->num_rows();
				$query=$query->result();
				$data['data']=$query;
				$data['count']=$count;
				$data['from_date']=$departure;
				$data['to_date']=$return;
				$data['ip']=$ip;
				$data['page']=$page;
				$post=1;
			}
			$data['post']=$post;
			$this->load->view('admin/clicks_tracker',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}			
	}

	public function blocked_airlines()
	{
		if ($this->session->userdata('admin_login')==1) {
				
		$data=array();
		$post=0;
		if ($this->input->post()) {
			$airlines_code=$this->input->post('airline');
			$query=$this->db->query("SELECT * FROM blocked_airlines WHERE airlines_code='$airlines_code' AND status!=0");
			$query=$query->result();
			$data['data']=$query;
			$post=1;
		}
		$data['post']=$post;
		$this->load->view('admin/blocked_airlines',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function add_blocked_airline()
	{
		if ($this->session->userdata('admin_login')==1) {

		// print_r($this->input->post());
		$airline_code=$this->input->post('airline');
		$supplier=$this->input->post('supplier');
		$journey_type=$this->input->post('trip_type');
		$travel_date_from=$this->input->post('travel_date_from');
		$travel_date_to=$this->input->post('travel_date_to');
		$company="";
		$source="";
		if ($this->input->post('status')) {
			$status=1;
		}
		else{
			$status=2;
		}
		$add_time=date('Y-m-d H:i:s');
		$ip=$_SERVER['REMOTE_ADDR'];
		$query=$this->db->query("INSERT INTO blocked_airlines(airlines_code,supplier,journey_type,travel_date_from,travel_date_to,company,source,status,add_time,add_ip) VALUES('$airline_code','$supplier','$journey_type','$travel_date_from','$travel_date_to','$company','$source','$status','$add_time','$ip')");
		redirect('Admin/blocked_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}

	}

	public function delete_blocked_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE blocked_airlines SET status=0 WHERE id=$id");
		redirect('Admin/blocked_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function active_blocked_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE blocked_airlines SET status=1 WHERE id=$id");
		redirect('Admin/blocked_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function inactive_blocked_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE blocked_airlines SET status=2 WHERE id=$id");
		redirect('Admin/blocked_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function markup()
	{		
		if ($this->session->userdata('admin_login')==1) {
			$post=0;
			$data=array();
			if ($this->input->post()) {
				$post=1;
				$reference=$this->input->post('reference');
				$from_date=$this->input->post('from_date');
				$to_date=$this->input->post('to_date');
				$from_airport=$this->input->post('from_airport');
				$to_airport=$this->input->post('to_airport');
				$airlines=$this->input->post('airlines');
				$class=$this->input->post('class');

				$condition='';
				// print_r($this->input->post());die();
				if ($reference!='') {
					$condition.=" AND reference_no='$reference'";
				}
				if ($from_date!='') {
					$condition.=" AND from_date='$from_date'";
				}
				if ($to_date!='') {
					$condition.=" AND to_date='$to_date'";
				}
				if ($from_airport!='') {
					$condition.=" AND from_airport='$from_airport'";
				}
				if ($to_airport!='') {
					$condition.=" AND to_airport='$to_airport'";
				}
				if ($class!='') {
					$condition.=" AND class='$class'";
				}
				$query=$this->db->query("SELECT * FROM flight_extra_charge WHERE status!=0 $condition");
				// print_r("SELECT * FROM flight_extra_charge WHERE status!=0 $condition");die();

				$query=$query->result();
				$data['data']=$query;
			}
			$data['post']=$post;
			$this->load->view('admin/markup',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function add_markup()
	{
		$from_airport=$this->input->post('from_airport');
		$to_airport=$this->input->post('to_airport');
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$class=$this->input->post('class');
		$parameter_condition=$this->input->post('airlines');
		$type=$this->input->post('markup_type');
		$amount=$this->input->post('markup_value');
		$add_datetime=date('Y-m-d H:i:s');
		$ip=$_SERVER['REMOTE_ADDR'];
		$status=1;
		$query=$this->db->query("INSERT INTO flight_extra_charge(from_airport,to_airport,from_date,to_date,class,parameter_condition,type,amount,status,add_datetime,add_ip,add_by) VALUES('$from_airport','$to_airport','$from_date','$to_date','$class','$parameter_condition','$type','$amount','$status','$add_datetime','$ip',1)");
		
		redirect('Admin/markup');
	}

	public function delete_markup($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE flight_extra_charge SET status=0 WHERE id=$id");
		redirect('Admin/markup');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function create_booking()
	{
		if ($this->session->userdata('admin_login')==1) {
			$this->load->view('admin/create_booking');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}
	public function insert_booking()
	{
		// TO GET AIRPORT NAME
		$from=$this->input->post('from'); 
		$from_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$from'");
		$from_count=$from_city->num_rows();
		if ($from_count>0) {			
			$from_city=$from_city->result();
			$from_city=$from_city[0]->airport_name;
		}
		else{
			$from_city='';
		}
		$to=$this->input->post('to'); 
		$to_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$to'");
		$to_count=$to_city->num_rows();
		if ($to_count>0) {			
			$to_city=$to_city->result();
			$to_city=$to_city[0]->airport_name;
		}
		else{
			$to_city='';
		}
		// FOR flight_booking

		$return_trip=0;
			$departure_date=$this->input->post('departure_date');
		$return_date=$this->input->post('return_date');
		if ($return_date!='') {
			$return_trip=1;		
		}
		$no_person=0;
		$no_child=0;
		$no_infant=0;
		$i=1;
		$passenger_count=$this->input->post('passenger_count');
		while ($i<=$passenger_count) {
			$passenger_type=$this->input->post('passenger_type_'.$i);
			if ($passenger_type=="Adult") {
				$no_person=$no_person + 1;
			}
			elseif ($passenger_type=="Children") {
				$no_child=$no_child+1;
			}
			else{
				$no_infant=$no_infant + 1;
			}
			$i++;
		}

		$travel_date=$this->input->post('departure_date');
		$return_date=$this->input->post('return_date'); 
		$pnr_no=$this->input->post('pnr');
		$contact_first_name=$this->input->post('contact_first_name');
		$contact_last_name=$this->input->post('contact_last_name');
		$contact_email=$this->input->post('email');
		$contact_phone=$this->input->post('mobile_no');
		$booking_source="";
		// $booking_source=$this->input->post('booking_source');
		$contact_address=$this->input->post('textarea');
		// echo "<pre>";print_r($this->input->post());
		$country=$this->input->post('country');
		if ($country=='United States') {
			$state=$this->input->post('state2');
		}
		else{
			$state=$this->input->post('state1');
		}
		$pincode=$this->input->post('pincode');
		$city=$this->input->post('city');
		$gross_total=$this->input->post('gross_total');
		$profit=$this->input->post('profit');
		$gross_actual=$this->input->post('gross_actual');
		$add_ip=$_SERVER['REMOTE_ADDR'];
		$add_time=date('Y-m-d H:i:s');
		$booking_date=date('Y-m-d');
		$booking_status=$this->input->post('booking_status');
		$class=$this->input->post('class_1');

		$last_id=$this->db->query("SELECT max(id) as last_id FROM flight_booking");
		$last_id=$last_id->result();
		$last_id=$last_id[0]->last_id;
		$last_id=$last_id+1;
		$reference_no="F".date('d').'X'.$last_id;
		
		$query=$this->db->query("INSERT INTO flight_booking(from_airport,from_city,to_airport,to_city,return_trip,travel_date,return_date,pnr_no,no_person,no_child,no_infant,contact_first_name,contact_last_name,contact_email,contact_phone,booking_source,add_time,add_ip,add_by,status,contact_address,state,pincode,city,gross_total,profit,gross_actual,booking_date,class,country,booking_status,reference_no)VALUES('$from','$from_city','$to','$to_city',$return_trip,'$travel_date','$return_date','$pnr_no',$no_person,$no_child,$no_infant,'$contact_first_name','$contact_last_name','$contact_email','$contact_phone','$booking_source','$add_time','$add_ip',1,1,'$contact_address','$state','$pincode','$city','$gross_total','$profit','$gross_actual','$booking_date','$class','$country','$booking_status','$reference_no')");
		$booking_id=$this->db->query("SELECT max(id) as id FROM flight_booking");
		$booking_id=$booking_id->result();
		$booking_id=$booking_id[0]->id;
		// FOR passenger_details
		$passenger_count=$this->input->post('passenger_count');
		$i=1;
		while ($i<=$passenger_count) {
			$passenger_type=$this->input->post('passenger_type_'.$i);
			$title=$this->input->post('title_'.$i);
			$first_name=$this->input->post('first_name_'.$i);
			$last_name=$this->input->post('last_name_'.$i);
			$gender=$this->input->post('gender_'.$i);
			$dob=$this->input->post('dob_'.$i);
			$ticket_no=$this->input->post('ticket_no_'.$i);
			$passport_no="";
			$place="";
			$issue_date="";
			$expiry_date="";
			// $passport_no=$this->input->post('passport_no_'.$i);
			// $place=$this->input->post('place_'.$i);
			// $issue_date=$this->input->post('issue_date_'.$i);
			// $expiry_date=$this->input->post('expiry_date_'.$i);
			$nationality=$this->input->post('nationality_'.$i);

			$query=$this->db->query("INSERT INTO passenger_details(booking_id,title,first_name,last_name,dob,identity_card,identity_card_no,ticket_no,passport_place,issue_date,expiry_date,nationality,pax_type,gender) VALUES($booking_id,'$title','$first_name','$last_name','$dob','Passport','$passport_no','$ticket_no','$place','$issue_date','$expiry_date','$nationality','$passenger_type','$gender')");
			$i++;
		}
		// FOR flight_details
		$flight_count=$this->input->post('flight_count');
		$i=1;
		while ($i<=$flight_count) {
			$from_code=$this->input->post('from_'.$i);
			$from_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$from_code'");
			// print_r("SELECT * FROM airports WHERE airport_code='$from'");
			$from_count=$from_city->num_rows();
			if ($from_count>0) {			
				$from_city=$from_city->result();
				$from_city=$from_city[0]->airport_name;
			}
			else{
				$from_count='';
			}
			$from_airport=$this->input->post('from_airport_'.$i);
			$to_code=$this->input->post('to_'.$i);
			$to_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$to_code'");
			$to_count=$to_city->num_rows();
			if ($to_count>0) {			
				$to_city=$to_city->result();
				$to_city=$to_city[0]->airport_name;
			}
			else{
				$to_count='';
			}
			$to_airport=$this->input->post('to_airport_'.$i);
			$depart_date=$this->input->post('depart_date_'.$i);
			$depart_time=$this->input->post('depart_time_'.$i);
			$arrive_date=$this->input->post('arrival_date_'.$i);
			$arrive_time=$this->input->post('arrival_time_'.$i);
			$airline=$this->input->post('airlines_'.$i);
			$flight_no=$this->input->post('flight_no_'.$i);
			$class=$this->input->post('class_'.$i);
			$total_time=$this->input->post('total_time_'.$i);
			$add_ip=$_SERVER['REMOTE_ADDR'];
			$add_time=date('Y-m-d H:i:s');
			$query=$this->db->query("INSERT INTO flight_details(booking_id,from_code,from_airport,to_code,to_airport,depart_date,depart_time,arrive_date,arrive_time,airline,flight_no,class,total_time,add_time,add_ip,add_by) VALUES($booking_id,'$from_code','$from_airport','$to_code','$to_airport','$depart_date','$depart_time','$arrive_date','$arrive_time','$airline','$flight_no','$class','$total_time','$add_time','$add_ip',1)");
			$i++;

		}

		// FOR payment_methods
		$card_count=$this->input->post('card_count');
		$i=1;
		while ($i<=$card_count) {
			$paymode=$this->input->post('payment_method_'.$i);
			$card_type=$this->input->post('card_type_'.$i);
			$card_no=$this->input->post('card_no_'.$i);
			$card_holder_name=$this->input->post('cardholder_name_'.$i);
			$cvc=$this->input->post('cvc_'.$i);
			$expiry=$this->input->post('expiry_'.$i);
			$issue=$this->input->post('card_issue_date_'.$i);
			$amount=$this->input->post('amount_'.$i);
			$taxes=$this->input->post('taxes_'.$i);
			$total_amount=$this->input->post('total_amount_'.$i);
			$status=$this->input->post('status_'.$i);
			if ($status=='Paid in full') {
				$status_code=1;
			}
			else{
				$status_code=0;				
			}
			$query=$this->db->query("INSERT INTO payment_method(booking_id,paymode,card_type,card_no,card_holder_name,cvc,expiry,issue,amount,taxes,total_amount,status_code,status) VALUES($booking_id,'$paymode','$card_type','$card_no','$card_holder_name','$cvc','$expiry','$issue','$amount','$taxes','$total_amount',$status_code,'$status')");
			$i++;

		}
		// FOR payment_count
		$payment_count=$this->input->post('payment_count');
		$i=1;
		while ($i<=$payment_count) {
			$supplier=$this->input->post('payment_supplier_'.$i);
			$pax_type=$this->input->post('payment_passenger_type_'.$i);
			$no_pax=$this->input->post('no_pax_'.$i);
			$base_fare=$this->input->post('base_fare_'.$i);
			$tax=$this->input->post('tax_'.$i);
			$total=$this->input->post('total_'.$i);
			$base_fare_actual=$this->input->post('base_actual_'.$i);
			$tax_actual=$this->input->post('tax_actual_'.$i);
			$issuance_fee=$this->input->post('issuance_'.$i);
			$admin_fees=$this->input->post('admin_fee_1_'.$i);
			$admin_fees2=$this->input->post('admin_fee_2_'.$i);
			$card_fee=$this->input->post('card_fee_'.$i);
			$total_actual=$this->input->post('total_actual_'.$i);
			$add_ip=$_SERVER['REMOTE_ADDR'];
			$add_time=date('Y-m-d H:i:s');
			$query=$this->db->query("INSERT INTO payment_details(booking_id,supplier,pax_type,no_pax,base_fare,tax,total,base_fare_actual,tax_actual,issuance_fee,admin_fees,admin_fees2,card_fee,total_actual,add_time,add_ip,add_by) VALUES($booking_id,'$supplier','$pax_type','$no_pax','$base_fare','$tax','$total','$base_fare_actual','$tax_actual','$issuance_fee','$admin_fees','$admin_fees2','$card_fee','$total_actual','$add_time','$add_ip',1)");
			$i++;
		}
		// die();
		redirect('Admin/booking_list');
	}


	public function booking_edit($id)
	{	
		$flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id=$id");
		$flight_booking=$flight_booking->result();
		$flight_booking=$flight_booking[0];

		$passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id=$id");
		$passenger_count=$passenger_details->num_rows();
		$passenger_details=$passenger_details->result();

		$flight_details=$this->db->query("SELECT * FROM flight_details WHERE booking_id=$id");
		$flight_count=$flight_details->num_rows();
		$flight_details=$flight_details->result();

		$payment_method=$this->db->query("SELECT * FROM payment_method WHERE booking_id=$id");
		$payment_method_count=$payment_method->num_rows();
		$payment_method=$payment_method->result();

		$payment_details=$this->db->query("SELECT * FROM payment_details WHERE booking_id=$id");
		$payment_details_count=$payment_details->num_rows();
		$payment_details=$payment_details->result();
		$data=array('booking_id'=>$id,'flight_booking'=>$flight_booking,'flight_details'=>$flight_details,'payment_method'=>$payment_method,'passenger_details'=>$passenger_details,'payment_details'=>$payment_details,'passenger_count'=>$passenger_count,'flight_count'=>$flight_count,'payment_details_count'=>$payment_details_count,'payment_method_count'=>$payment_method_count);
		$this->load->view('admin/booking_edit',$data);
	}

	public function booking_update()
	{
		$booking_id=$this->input->post('booking_id');
		// TO GET AIRPORT NAME
		$from=$this->input->post('from'); 
		$from_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$from'");
		$from_count=$from_city->num_rows();
		if ($from_count>0) {			
			$from_city=$from_city->result();
			$from_city=$from_city[0]->airport_name;
		}
		else{
			$from_city='';
		}
		$to=$this->input->post('to'); 
		$to_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$to'");
		$to_count=$to_city->num_rows();
		if ($to_count>0) {			
			$to_city=$to_city->result();
			$to_city=$to_city[0]->airport_name;
		}
		else{
			$to_city='';
		}
		// FOR flight_booking

		$return_trip=0;
			$departure_date=$this->input->post('departure_date');
		$return_date=$this->input->post('return_date');
		if ($return_date!='') {
			$return_trip=1;		
		}
		$no_person=0;
		$no_child=0;
		$no_infant=0;
		$i=1;
		$passenger_count=$this->input->post('passenger_count');
		while ($i<=$passenger_count) {
			$passenger_type=$this->input->post('passenger_type_'.$i);
			if ($passenger_type=="Adult") {
				$no_person=$no_person + 1;
			}
			elseif ($passenger_type=="Children") {
				$no_child=$no_child+1;
			}
			else{
				$no_infant=$no_infant + 1;
			}
			$i++;
		}

		$travel_date=$this->input->post('departure_date');
		$return_date=$this->input->post('return_date'); 
		$pnr_no=$this->input->post('pnr');
		$contact_first_name=$this->input->post('contact_first_name');
		$contact_last_name=$this->input->post('contact_last_name');
		$contact_email=$this->input->post('email');
		$contact_phone=$this->input->post('mobile_no');
		$booking_source=$this->input->post('booking_source');
		$contact_address=$this->input->post('textarea');
		// echo "<pre>";print_r($this->input->post());
		$country=$this->input->post('country');
		if ($country=='United States') {
			$state=$this->input->post('state2');
		}
		else{
			$state=$this->input->post('state1');
		}
		$pincode=$this->input->post('pincode');
		$city=$this->input->post('city');
		$gross_total=$this->input->post('gross_total');
		$profit=$this->input->post('profit');
		$gross_actual=$this->input->post('gross_actual');
		$add_ip=$_SERVER['REMOTE_ADDR'];
		$add_time=date('Y-m-d H:i:s');
		$booking_date=date('Y-m-d');
		$booking_status=$this->input->post('booking_status');
		
		$add_time=date('Y-m-d H:i:s');
		$booking_date=date('Y-m-d');
		$booking_status=$this->input->post('booking_status');
		$class=$this->input->post('class_1');
		// FLIGHT BOOKING

		$flight_booking=$this->db->query("UPDATE flight_booking SET from_airport='$from',from_city='$from_city',to_airport='$to',return_trip='$return_trip',no_person=$no_person,no_child=$no_child,no_infant=$no_infant,travel_date='$travel_date',return_date='$return_date',pnr_no='$pnr_no',contact_first_name='$contact_first_name',contact_last_name='$contact_last_name',contact_email='$contact_email',contact_phone='$contact_phone',booking_source='$booking_source',contact_address='$contact_address',country='$country',state='$state',pincode='$pincode',city='$city',gross_total='$gross_total',profit='$profit',gross_actual='$gross_actual',booking_status='$booking_status',class='$class' WHERE id=$booking_id");
		
		// FOR passenger_details
		$passenger_count=$this->input->post('passenger_count');
		$i=1;
		$query=$this->db->query("DELETE FROM passenger_details WHERE booking_id=$booking_id");

		while ($i<=$passenger_count) {
			$passenger_type=$this->input->post('passenger_type_'.$i);
			$title=$this->input->post('title_'.$i);
			$first_name=$this->input->post('first_name_'.$i);
			$last_name=$this->input->post('last_name_'.$i);
			$gender=$this->input->post('gender_'.$i);
			$dob=$this->input->post('dob_'.$i);
			$ticket_no=$this->input->post('ticket_no_'.$i);
			$passport_no=$this->input->post('passport_no_'.$i);
			$place=$this->input->post('place_'.$i);
			$issue_date=$this->input->post('issue_date_'.$i);
			$expiry_date=$this->input->post('expiry_date_'.$i);
			$nationality=$this->input->post('nationality_'.$i);

			$query=$this->db->query("INSERT INTO passenger_details(booking_id,title,first_name,last_name,dob,identity_card,identity_card_no,ticket_no,passport_place,issue_date,expiry_date,nationality,pax_type,gender) VALUES($booking_id,'$title','$first_name','$last_name','$dob','Passport','$passport_no','$ticket_no','$place','$issue_date','$expiry_date','$nationality','$passenger_type','$gender')");
			$i++;
		}
		// FOR flight_details
		$flight_count=$this->input->post('flight_count');
		$i=1;
		$query=$this->db->query("DELETE FROM flight_details WHERE booking_id=$booking_id");

		while ($i<=$flight_count) {
			$from_code=$this->input->post('from_'.$i);
			$from_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$from_code'");
			// print_r("SELECT * FROM airports WHERE airport_code='$from'");
			$from_count=$from_city->num_rows();
			if ($from_count>0) {			
				$from_city=$from_city->result();
				$from_city=$from_city[0]->airport_name;
			}
			else{
				$from_count='';
			}
			$from_airport=$this->input->post('from_airport_'.$i);
			$to_code=$this->input->post('to_'.$i);
			$to_city=$this->db->query("SELECT * FROM airports WHERE airport_code='$to_code'");
			$to_count=$to_city->num_rows();
			if ($to_count>0) {			
				$to_city=$to_city->result();
				$to_city=$to_city[0]->airport_name;
			}
			else{
				$to_count='';
			}
			$to_airport=$this->input->post('to_airport_'.$i);
			$depart_date=$this->input->post('depart_date_'.$i);
			$depart_time=$this->input->post('depart_time_'.$i);
			$arrive_date=$this->input->post('arrival_date_'.$i);
			$arrive_time=$this->input->post('arrival_time_'.$i);
			$airline=$this->input->post('airlines_'.$i);
			$flight_no=$this->input->post('flight_no_'.$i);
			$class=$this->input->post('class_'.$i);
			$total_time=$this->input->post('total_time_'.$i);
			$add_ip=$_SERVER['REMOTE_ADDR'];
			$add_time=date('Y-m-d H:i:s');
			$query=$this->db->query("INSERT INTO flight_details(booking_id,from_code,from_airport,to_code,to_airport,depart_date,depart_time,arrive_date,arrive_time,airline,flight_no,class,total_time,add_time,add_ip,add_by) VALUES($booking_id,'$from_code','$from_airport','$to_code','$to_airport','$depart_date','$depart_time','$arrive_date','$arrive_time','$airline','$flight_no','$class','$total_time','$add_time','$add_ip',1)");
			$i++;

		}

		// FOR payment_methods
		$card_count=$this->input->post('card_count');
		$i=1;
		$query=$this->db->query("DELETE FROM payment_method WHERE booking_id=$booking_id");

		while ($i<=$card_count) {
			$paymode=$this->input->post('payment_method_'.$i);
			$card_type=$this->input->post('card_type_'.$i);
			$card_no=$this->input->post('card_no_'.$i);
			$card_holder_name=$this->input->post('cardholder_name_'.$i);
			$cvc=$this->input->post('cvc_'.$i);
			$expiry=$this->input->post('expiry_'.$i);
			$issue=$this->input->post('card_issue_date_'.$i);
			$amount=$this->input->post('amount_'.$i);
			$taxes=$this->input->post('taxes_'.$i);
			$total_amount=$this->input->post('total_amount_'.$i);
			$status=$this->input->post('status_'.$i);
			if ($status=='Paid in full') {
				$status_code=1;
			}
			else{
				$status_code=0;				
			}
			$query=$this->db->query("INSERT INTO payment_method(booking_id,paymode,card_type,card_no,card_holder_name,cvc,expiry,issue,amount,taxes,total_amount,status_code,status) VALUES($booking_id,'$paymode','$card_type','$card_no','$card_holder_name','$cvc','$expiry','$issue','$amount','$taxes','$total_amount',$status_code,'$status')");
			$i++;

		}
		// FOR payment_count
		$query=$this->db->query("DELETE FROM payment_details WHERE booking_id=$booking_id");
		$payment_count=$this->input->post('payment_count');
		$i=1;
		while ($i<=$payment_count) {
			$supplier=$this->input->post('payment_supplier_'.$i);
			$pax_type=$this->input->post('payment_passenger_type_'.$i);
			$no_pax=$this->input->post('no_pax_'.$i);
			$base_fare=$this->input->post('base_fare_'.$i);
			$tax=$this->input->post('tax_'.$i);
			$total=$this->input->post('total_'.$i);
			$base_fare_actual=$this->input->post('base_actual_'.$i);
			$tax_actual=$this->input->post('tax_actual_'.$i);
			$issuance_fee=$this->input->post('issuance_'.$i);
			$admin_fees=$this->input->post('admin_fee_1_'.$i);
			$admin_fees2=$this->input->post('admin_fee_2_'.$i);
			$card_fee=$this->input->post('card_fee_'.$i);
			$total_actual=$this->input->post('total_actual_'.$i);
			$add_ip=$_SERVER['REMOTE_ADDR'];
			$add_time=date('Y-m-d H:i:s');
			$query=$this->db->query("INSERT INTO payment_details(booking_id,supplier,pax_type,no_pax,base_fare,tax,total,base_fare_actual,tax_actual,issuance_fee,admin_fees,admin_fees2,card_fee,total_actual,add_time,add_ip,add_by) VALUES($booking_id,'$supplier','$pax_type','$no_pax','$base_fare','$tax','$total','$base_fare_actual','$tax_actual','$issuance_fee','$admin_fees','$admin_fees2','$card_fee','$total_actual','$add_time','$add_ip',1)");
			$i++;
		}
		$url='Admin/booking_edit/'.$booking_id;
		redirect($url);
	}


	public function hotel_enquiry()
	{
		$query=$this->db->query("SELECT * FROM hotel_enquiry ORDER BY id DESC ");
		$count=$query->num_rows();
		$query=$query->result();
		$data=array('data'=>$query,'count'=>$count);
		$this->load->view('admin/hotel_enquiry',$data);
	}

	public function cab_enquiry()
	{
		$query=$this->db->query("SELECT * FROM cab_enquiry ORDER BY id DESC ");
		$count=$query->num_rows();
		$query=$query->result();
		$data=array('data'=>$query,'count'=>$count);
		$this->load->view('admin/cab_enquiry',$data);
	}

	public function meta_airlines()
	{
		if ($this->session->userdata('admin_login')==1) {
				
		$data=array();
		$post=0;
		if ($this->input->post()) {
			$airline=$this->input->post('airline');
			$query=$this->db->query("SELECT * FROM meta_airlines WHERE airline='$airline' AND status!=0");
			$query=$query->result();
			$data['data']=$query;
			$post=1;
		}
		$data['post']=$post;
		$this->load->view('admin/meta_airlines',$data);
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}
	public function add_meta_airlines()
	{
		$airline=$this->input->post('airline');
		$supplier=$this->input->post('supplier');
		$company=$this->input->post('company');
		$source=$this->input->post('source');
		if ($this->input->post('status')) {
			$status=1;
		}
		else{
			$status=0;
		}
		$add_time=date('Y-m-d H:i:s');
		$add_ip=$_SERVER['REMOTE_ADDR'];
		$query=$this->db->query("INSERT INTO meta_airlines(airline,supplier,company,source,status,add_time,add_ip,add_by) VALUES('$airline','$supplier','$company','$source',$status,'$add_time','$add_ip',1)");
		redirect('Admin/meta_airlines');
	}

	public function delete_meta_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE meta_airlines SET status=0 WHERE id=$id");
		redirect('Admin/meta_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function active_meta_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE meta_airlines SET status=1 WHERE id=$id");
		redirect('Admin/meta_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function inactive_meta_airline($id)
	{
		if ($this->session->userdata('admin_login')==1) {

		$query=$this->db->query("UPDATE meta_airlines SET status=2 WHERE id=$id");
		redirect('Admin/meta_airlines');
		}
		else{

			redirect('Admin/dashboard');die();
		}
	}

	public function upload_markup()
	{
		$file_name="";
		$config['upload_path']          = './uploads';
        $config['allowed_types']        = 'csv';
        $this->load->library('upload', $config);
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('markup_details'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());        
            $file_name=$data['upload_data']['file_name'];
        }

        $file_path='./uploads/'.$file_name;
        if (($handle = fopen($file_path, 'r')) !== FALSE) {
        	$count=0;
		    while (($data = fgetcsv($handle)) !== FALSE) {
		        // Print each row's data
		        if ($data[0]=="") {
		        	break;
		        }
		        if ($count==0) {
		        	
		        }
		        else{
		        	$reference_no=$data[0];
		        	$from=$data[1];
		        	$to=$data[2];
		        	$status=$data[4];
		        	if ($status=='Active') {
		        		$status=1;
		        	}
		        	else{
		        		$status=0;
		        	}
		        	$airlines=$data[6];
		        	$markup=$data[9];
		        	if ($markup=='F') {
		        		$markup='fixed';
		        	}
		        	elseif ($markup=='A') {
		        		$markup='absolute';
		        	}
		        	elseif ($markup=='P') {
		        		$markup='percentage';
		        	}
		        	$markup_value=$data[10];
		        	$class=$data[13];
		        	if ($class=='E') {
		        		$class="economy";
		        	}
		        	elseif ($class=='PE') {
		        		$class="premium_economy";
		        	}
		        	elseif ($class=='B') {
		        		$class="business_class";
		        	}
		        	elseif ($class=='F') {
		        		$class="first_class";
		        	}
		        	$departure=$data[14];
		        	$date = DateTime::createFromFormat('d/m/Y', $departure);
					$departure= $date->format('Y-m-d');
		        	$arrival=$data[15];
		        	$date = DateTime::createFromFormat('d/m/Y', $arrival);
					$arrival= $date->format('Y-m-d');
		        	$arrival=date("Y-m-d", strtotime($arrival));;
		        	$ip=$_SERVER['REMOTE_ADDR'];
		        	$add_datetime=date('Y-m-d H:i:s');
		        	$query=$this->db->query("INSERT INTO flight_extra_charge(reference_no,from_airport,to_airport,from_date,to_date,class,parameter_condition,type,amount,status,add_datetime,add_ip,add_by) VALUES('$reference_no','$from','$to','$departure','$arrival','$class','$airlines','$markup','$markup_value','$status','$add_datetime','$ip',1)");
		        }
		        $count++;
		    }
		    // Close the file handle
		    fclose($handle);
		} else {
		    echo "Error opening the CSV file.";
		}
		redirect('Admin/markup');
	}
}
?> 