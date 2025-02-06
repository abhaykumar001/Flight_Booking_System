<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{

	public function index()
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		$this->load->view('dashboard');
	}

	public function profile()
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT * FROM users WHERE id=$user_id");
		$query=$query->result();
		$query=$query[0];
		$data=array('data'=>$query);
		// print_r($data);
		$this->load->view('profile',$data);
	}

	public function profile_update()
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		// print_r($this->input->post());
		$email=$this->input->post('email');
		$first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$mobile_no=$this->input->post('phone');
		$address_l1=$this->input->post('address_line1');
		$address_l2=$this->input->post('address_line2');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$country=$this->input->post('country');
		$zip_code=$this->input->post('zip');
		$dob=$this->input->post('dob');
		$modify_ip=getenv('HTTP_CLIENT_IP');
		$modify_time=date("Y-m-d H:I:s");
		$user_id=$this->session->userdata('user_id');

		$query=$this->db->query("UPDATE users SET email='$email',first_name='$first_name',last_name='$last_name',mobile_no='$mobile_no',address_l1='$address_l1',address_l2='$address_l2',city='$city',state='$state',country='$country',zip_code='$zip_code',dob='$dob',modify_ip='$modify_ip',modify_time='$modify_time' WHERE id=$user_id");
		if ($query) {
			redirect('Dashboard/profile');
		}
	}
	public function last_booking()
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT * FROM users WHERE id=$user_id");
		$query=$query->result();
		$query=$query[0];

		$phone=$query->mobile_no;
		$email=$query->email;

		$flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE user_id='$user_id' OR contact_phone='$phone' OR contact_email='$email' ORDER BY id DESC");
		$count=$flight_booking->num_rows();
		if ($count > 0 ) {
			
			$flight_booking=$flight_booking->result();
				
			$flight_booking=$flight_booking[0];

			$booking_id=$flight_booking->id;

			$passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id=$booking_id");
			$passenger_details=$passenger_details->result();
			$array=array('flight_booking'=>$flight_booking,'passenger_details'=>$passenger_details);

			$this->load->view('last_booking',$array);
		}
		else{
			$this->load->view('no_booking');
		}

	}

	public function bookings()
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT * FROM users WHERE id=$user_id");
		$query=$query->result();
		$query=$query[0];

		$phone=$query->mobile_no;
		$email=$query->email;

		$flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE user_id='$user_id' OR contact_phone='$phone' OR contact_email='$email' ORDER BY id DESC");
		$count=$flight_booking->num_rows();
		if ($count>0) {
			// code...
			$flight_booking=$flight_booking->result();

			$array=array('flight_booking'=>$flight_booking);
			$this->load->view('booking',$array);
		}
		else{
			$this->load->view('no_booking');
		}
	}

	public function booking_details($id)
	{
		$login=0;
		if (array_key_exists('login_status',$this->session->userdata())) {
         if ($this->session->userdata('login_status')==1) {
         	$login=1;
         }
      	}
      	if ($login!=1) {
      		redirect('Home/login');
      	}
		$user_id=$this->session->userdata('user_id');


		$flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE user_id='$user_id' AND id=$id ORDER BY id DESC");
		$count=$flight_booking->num_rows();
		if ($count>0) {
			// code...
		$flight_booking=$flight_booking->result();
		$flight_booking=$flight_booking[0];

		$booking_id=$flight_booking->id;

		$passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id=$booking_id");
		$passenger_details=$passenger_details->result();

		$array=array('flight_booking'=>$flight_booking,'passenger_details'=>$passenger_details);

		$this->load->view('last_booking',$array);
		}
		else{
			echo "error occured";
		}
	}

	


}
?>