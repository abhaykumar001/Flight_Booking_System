<?php 
/*Payment Status
0  Failed
1  Success
2  Pending
*/
require 'authourize_net/vendor/autoload.php';
// require_once 'constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class Home extends CI_Controller {
    public function index() {
       $this->load->view('home');
    }
    
    public function flight_search(){
      // print_r($this->input->post());die();
      if (!($this->input->get('from') or $this->input->get('to') or $this->input->get('departure'))) {
         $this->session->set_userdata(array('flight_search_message'=>'Something Went Wrong'));
         redirect('');
      }
      $currentURL = current_url();
      $params   = $_SERVER['QUERY_STRING'];
      $full_url = $currentURL . '?' . $params; 
      $this->session->set_userdata(array('search_url'=>$full_url));
      // $trip_type=$this->input->post('trip_type');
      $from=$this->input->get('from_details');
      $from1=$this->input->get('from_details');
      $from=explode('-',$from);
      $from=$from[0];
      $to=$this->input->get('to_details');
      $to1=$this->input->get('to_details');
      $to=explode('-',$to);
      $to=$to[0];
      $departure=$this->input->get('departure');
      $departure=date("Y-m-d", strtotime($departure));
      $class=$this->input->get('class-select');
      $no_passengers=$this->input->get('no_adults');
      $children=$this->input->get('no_children');
      $infant=$this->input->get('no_infants');
      // print_r($this->input->post());die();
      $trip_type=$this->input->get('triptype');
      if ($trip_type=='round') {
         $return=$this->input->get('return');
         $return=date("Y-m-d", strtotime($return));
      }
      else{
         $return="";
      }
      $travel_class=$this->input->get('class-select');
      $this->session->set_userdata(array('trip_type'=>$trip_type,'from'=>$from1,'to'=>$to1,'departure'=>$departure,'class'=>$class,'return'=>$return,'no_passengers'=>$no_passengers,'children'=>$children,'infant'=>$infant,'travel_class'=>$travel_class));
      if (array_key_exists('include_airlines',$this->input->get())) {
         $included_airlines=$this->input->get('include_airlines');
      }
      else{
         $included_airlines='';
      }
      if (array_key_exists('max_fare',$this->input->get())) {
         $max_price=$this->input->get('max_fare');
      }
      else{
         $max_price='';
      }
     // print_r($included_airlines);die();
      $api_response=$this->flight_search_api($from,$to,$departure,$return,$trip_type,$no_passengers,$children,$infant,$travel_class,$included_airlines,$max_price);
      // print_r($api_response);die();
      if ($api_response['meta']['count']==0) {
      $dictionary=array();
      $response=array();
               // code...
      }
      else{
      $dictionary=$api_response['dictionaries'];
      $response=$api_response['data'];
      }
      // print_r($trip_type);die();
      // Initialize an array to store the fare data for each carrier
      $carrierFares = [];
      // Loop through the data array
      $lowest=0;
      $highest=0;
      foreach ($response as $flightOffer) {
         // Check if the 'price' and 'total' keys are set
         if (isset($flightOffer['price']) && isset($flightOffer['price']['total'])) {
            // Get the total fare
            $fare = $flightOffer['price']['total'];
            if ($lowest==0 OR $fare < $lowest) {
               $lowest=$fare;
            }
            if ($highest==0 OR $fare > $highest) {
               $highest=$fare;
            }
            // Loop through each itinerary
            foreach ($flightOffer['itineraries'] as $itinerary) {
            // Count the number of stops
               $stopCount = count($itinerary['segments']) - 1;
               // Determine the stop category
               if ($stopCount == 0) {
               $stopCategory = 'Non Stop';
               }
               elseif ($stopCount == 1) {
                  $stopCategory = '1 Stop';
               } else {
                  $stopCategory = '2+ Stop';
               }
               // Loop through each segment in the itinerary
               foreach ($itinerary['segments'] as $segment) {
                  // Get the carrier code
                  $carrierCode = $segment['carrierCode'];
                  // Initialize the carrier entry if not already done
                  if (!isset($carrierFares[$carrierCode])) {
                     $carrierFares[$carrierCode] = [
                     'Lowest' => $fare,
                     'Non Stop' => 0,
                     '1 Stop' => 0,
                     '2+ Stop' => 0
                     ];
                  }
                  // Update the lowest fare if applicable
                  if ($fare < $carrierFares[$carrierCode]['Lowest']) {
                     $carrierFares[$carrierCode]['Lowest'] = $fare;
                  }
                  // Update the fare for the stop category if applicable
                  if ($carrierFares[$carrierCode][$stopCategory] == 0 || $fare < $carrierFares[$carrierCode][$stopCategory]) {
                     $carrierFares[$carrierCode][$stopCategory] = $fare;
                  }
               }
            }
         }
      }

      $fares_stop=array('Non Stop'=>0,'1 Stop'=>0,'2+ Stop'=>0);
      foreach ($carrierFares as $key => $value) {
         if (($value['Non Stop']<$fares_stop['Non Stop'] OR $fares_stop['Non Stop']==0) AND $value['Non Stop'] > 0) {
            $fares_stop['Non Stop']=$value['Non Stop'];
         }
         
         if (($value['1 Stop']<$fares_stop['1 Stop'] OR $fares_stop['1 Stop']==0) AND $value['1 Stop'] > 0) {
            $fares_stop['1 Stop']=$value['1 Stop'];
         }

         if (($value['2+ Stop']<$fares_stop['2+ Stop'] OR $fares_stop['2+ Stop']==0) AND $value['2+ Stop'] > 0) {
            $fares_stop['2+ Stop']=$value['2+ Stop'];
         }
      }
      // print_r($highest);
      // echo "<br>";
      // print_r($lowest);die();
      $array=array('dictionary'=>$dictionary,'data'=>$response,'trip_type'=>$trip_type,'from'=>$from1,'to'=>$to1,'departure'=>$departure,'return'=>$return,'trip_type'=>$trip_type,'controller'=>$this,'fares'=>$carrierFares,'fares_stop'=>$fares_stop,'lowest'=>$lowest,'highest'=>$highest);
      // echo "<pre>";print_r($array['fares']);die();
      $this->load->view('flight_search',$array);
      
    }

    public function login(){
      $this->load->view('login');
    }

    public function login_action(){
       $username=$this->input->post('username');
       $password=$this->input->post('password');
       if ($username=="" or $password=="") {
           $this->session->set_userdata(array('login_message'=>'Username or Password is wrong'));
         redirect('Home/login');
       }
       $query=$this->db->query("SELECT * FROM users WHERE email='$username' AND password='$password' AND status=1");
       $count=$query->num_rows();
       // print_r("SELECT * FROM users WHERE email='$username' AND password='$password' AND status=1");die();
       if ($count>0) {
          $data=$query->result();
          $data=$data[0];
          $user_id=$data->id;
          $email=$data->email;
          $first_name=$data->first_name;
          $last_name=$data->last_name;
          
          // TO UPDATE LAST LOGIN DETAILS
          $last_login=date("Y-m-d H:i:s");
          $last_login_ip=getenv('HTTP_CLIENT_IP');
          $query=$this->db->query("UPDATE users SET login_count=login_count+1,last_login='$last_login',last_login_ip='$last_login_ip'");

         // SETTING USER SESSION DATA 
          $array=array('user_id'=>$user_id,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'login_status'=>1);
          $this->session->set_userdata($array);
          redirect('Home');
       }
       else{
         $this->session->set_userdata(array('login_message'=>'Username or Password is wrong'));
         redirect('Home/login');
       }
    }

    public function logout()
    {
      // print_r($this->session->userdata());
       $this->session->unset_userdata('user_id');
       $this->session->unset_userdata('email');
       $this->session->unset_userdata('first_name');
       $this->session->unset_userdata('last_name');
       $this->session->unset_userdata('login_status');
       redirect('');
    }
    public function register(){
       $this->load->view('register');
    }

   public function register_action(){
      // print_r($this->input->post());die();
      $first_name=$this->input->post('first_name');
      $last_name=$this->input->post('last_name');
      $email=$this->input->post('email');
      $password=$this->input->post('password');
      $last_login=date("Y-m-d H:i:s");
      $last_login_ip=getenv('HTTP_CLIENT_IP');
      // ADDING NEW USER
      $query=$this->db->query("INSERT INTO users(first_name,last_name,email,password,last_login_ip,last_login,login_count,status) VALUES('$first_name','$last_name','$email','$password','$last_login_ip','$last_login',1,1)");
       if ($query) {
         $data = $this->db->query("SELECT * FROM users WHERE email='$email'");
         $data=$data->result();
         $data = $data[0];
         $user_id=$data->id;
         // SETTING USER DATA
         $array=array('user_id'=>$user_id,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'login_status'=>1);
          $this->session->set_userdata($array);
          redirect('Home');
       }
    }

   public function forgot_password(){
       // code...
   }

   public function page($id)
   {
      $query=$this->db->query("SELECT * FROM cms WHERE id=$id");
      if ($query->num_rows()>0) {
         $query=$query->result();
         $data=$query[0];
         $array=array('page_title'=>$data->page_title,'meta_name'=>$data->meta_name,'meta_description'=>$data->meta_description,'content'=>$data->content);
         $this->load->view('page',$array);
      }
      else{
         redirect('Home/not_found');
      }
   }

   public function booking()
   {
      $api_data=$this->session->userdata('flight_search');
      $api_data=json_decode($api_data,true);
      // print_r(array_keys($api_data));die();
      $data=$api_data['data'];
      $dictionaries=$api_data['dictionaries'];
      $flight_id=$this->session->userdata('flight_id');
      $data=$data[$flight_id];
      // print_r($flight_id);die();
      $data=array('dictionary'=>$dictionaries,'data'=>$data,'controller'=>$this);
      $this->load->view('booking_details',$data);
   }

   public function booking_create()
   {
      // echo "<pre>";print_r($this->input->post());
      // echo "<br>";print_r($this->session->userdata());
      // die();
      // ADDING DETAILS TO flight_booking
      $from=$this->session->userdata('from');
      $from=explode("-",$from);
      $from_airport=$from[0];
      $from_city=$from[1];
      
      $to=$this->session->userdata('to');
      $to=explode("-",$to);
      $to_airport=$to[0];
      $to_city=$to[1];

      $travel_date=$this->session->userdata('departure');

      if (array_key_exists('return',$this->session->userdata())) {
         $return_trip=1;
         $return_date=$this->session->userdata('return');
      }
      else{
         $return_trip=0;
         $return_date='';
      }

      $no_passengers=$this->session->userdata('no_passengers');
      $children=$this->session->userdata('children');
      $infant=$this->session->userdata('infant');
      $class=$this->session->userdata('class');
      $all_flight=$this->session->userdata('flight_search');
      $all_flight=json_decode($all_flight,true);
      $all_flight=$all_flight['data'];
      $flight_id=$this->session->userdata('flight_id');
      $flight=$all_flight[$flight_id];
      $flight_complete_detail=json_encode($flight);
      $base_fare=$this->rate('all',$flight['price']['base']);
      $extra_charges=$this->rate('all',$flight['price']['total'] - $flight['price']['base']);
      $total=$this->rate('all',$flight['price']['total']);

      $booking_date=date('Y-m-d');

      if (array_key_exists('user_id',$this->session->userdata())) {
         $user_id=$this->session->userdata('user_id');
      }
      else{
         $user_id=0;
      }
      $query=$this->db->query("SELECT count(id) as count FROM flight_booking");
      $query=$query->result();
      $count=$query[0]->count + 1;
      $pnr=date('m').date('d').$count;
      $add_time=date("Y-m-d H:m:s");
      $add_ip=$_SERVER['REMOTE_ADDR'];

      $contact_email=$this->input->post('contact_email');
      $contact_phone=$this->input->post('contact_phone');
      $contact_first_name=$this->input->post('contact_first_name');
      $contact_last_name=$this->input->post('contact_last_name');

      // FOR FLIGHT BOOKING TABLE
      $query=$this->db->query("INSERT INTO flight_booking(from_airport,from_city,to_airport,to_city,return_trip,travel_date,return_date,no_person,no_child,no_infant,class,ticket_price,extra_charges,total_charges,booking_date,user_id,booking_status,pnr_no,status,add_time,add_ip,flight_complete_detail,contact_email,contact_phone,contact_first_name,contact_last_name,payment_status) VALUES('$from_airport','$from_city','$to_airport','$to_city',$return_trip,'$travel_date','$return_date',$no_passengers,$children,$infant,'$class',$base_fare,$extra_charges,$total,'$booking_date',$user_id,'Pending','$pnr',1,'$add_time','$add_ip','$flight_complete_detail','$contact_email','$contact_phone','$contact_first_name','$contact_last_name',2)");


      // FOR PASSENGER DETAILS
      $query=$this->db->query("SELECT * FROM flight_booking ORDER BY id DESC LIMIT 1");
      $query=$query->result();
      $booking_id=$query[0]->id;
      $this->session->set_userdata(array('booking_id'=>$booking_id));
      if ($query) {
         // FOR PASSENGER DETAILS
         $i=1;
         while ($i<=$no_passengers) {
            $first_name_id="first_name_".$i;
            $middle_name_id="middle_name_".$i;
            $last_name_id="last_name_".$i;
            $id_type_id="id_type_".$i;
            $id_number_id="id_number_".$i;
            $year_id="year_".$i;
            $month_id="birth-month_".$i;
            $date_id="birth-day_".$i;
            $first_name=$this->input->post($first_name_id);
            $middle_name=$this->input->post($middle_name_id);
            $last_name=$this->input->post($last_name_id);
            $id_type=$this->input->post($id_type_id);
            $id_number=$this->input->post($id_number_id);
            $year=$this->input->post($year_id);
            $month=$this->input->post($month_id);
            $date=$this->input->post($date_id);
            $dob=$year.'-'.$month.'-'.$date;
            $extra_charges=$this->rate('all',$flight['price']['total'] - $flight['price']['base'])/$no_passengers;
            $seat_price=$this->rate('all',$flight['price']['base'])/$no_passengers;
            $total_price=$this->rate('all',$flight['price']['total'])/$no_passengers;
            $add_time=date("Y-m-d H:m:s");
            $add_ip=$_SERVER['REMOTE_ADDR'];
            $booking_date=date('Y-m-d');
            $query=$this->db->query("INSERT INTO passenger_details(booking_id,first_name,middle_name,last_name,identity_card,identity_card_no,dob,class,extra_charges,seat_price,total_charges,add_time,add_ip,booking_date,status) VALUES($booking_id,'$first_name','$middle_name','$last_name','$id_type','$id_number','$dob','$class',$extra_charges,$seat_price,$total_price,'$add_time','$add_ip','$booking_date',1)");
            $i++;
         }
         redirect('Home/payment');
      }
      else{
      }
   }

   public function payment()
   {
      $this->load->view('payment');
   }

   public function payment_process()
   {
      // DATA FOR PAYMENT PROCESSING
      $card_number=$this->input->post('card_number');
      $card_month=$this->input->post('card_month');
      $card_year=$this->input->post('card_year');
      $card_expiry=$card_year.'-'.$card_month;
      $card_cvv=$this->input->post('card_cvv');
      $card_name=$this->input->post('card_name');
      $card_name=explode(" ",$card_name);
      $first_name=$card_name[0];
      if (array_key_exists(1,$card_name)) {
         $last_name=$card_name[1];
      }
      else{
         $last_name="";
      }
      $card_street_address=$this->input->post('card_street_address');
      $card_country=$this->input->post('card_country');
      $card_city=$this->input->post('card_city');
      if ($card_country=='United States') {
         $card_state=$this->input->post('card_state2');
      }
      else{
         $card_state=$this->input->post('card_state');
      }
      $card_zip=$this->input->post('card_zip');
      $card_phone=$this->input->post('card_phone');

      $amount=1;
      $booking_id=$this->session->userdata('booking_id');
      $site_settings=$this->db->query("SELECT * FROM site_settings");
      $site_settings=$site_settings->result();
      $site_settings=$site_settings[0];
      $company_code=$site_settings->company_code;
      $api_key=$site_settings->api_key;
      $api_secret=$site_settings->api_secret;
      $order_id=$company_code.'-'.$booking_id;

      // define("AUTHORIZENET_LOG_FILE", "phplog");
      $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
      $merchantAuthentication->setName($api_key);
      $merchantAuthentication->setTransactionKey($api_secret);

      // Set the transaction's refId
      $refId = $company_code.'-'. time();
      // print_r($card_number);
      // echo "---";
      // print_r($card_expiry);
      // echo "---";
      // print_r($card_cvv);
      // Create the payment data for a credit card
      $creditCard = new AnetAPI\CreditCardType();
      $creditCard->setCardNumber($card_number);
      $creditCard->setExpirationDate($card_expiry);
      $creditCard->setCardCode($card_cvv);

      // Add the payment data to a paymentType object
      $paymentOne = new AnetAPI\PaymentType();
      $paymentOne->setCreditCard($creditCard);

      // Create order information
      $order = new AnetAPI\OrderType();
      $order->setInvoiceNumber($order_id);
      $order->setDescription($order_id);

      // Set the customer's Bill To address
      $customerAddress = new AnetAPI\CustomerAddressType();
      $customerAddress->setFirstName($first_name);
      $customerAddress->setLastName($last_name);
      $customerAddress->setAddress($card_street_address);
      $customerAddress->setCity($card_city);
      $customerAddress->setState($card_state);
      $customerAddress->setZip($card_zip);
      $customerAddress->setCountry($card_country);

      // Set the customer's identifying information
      $customerData = new AnetAPI\CustomerDataType();
      $customerData->setType("individual");
      $customerData->setId($card_phone);
      // $customerData->setEmail();

      // Add values for transaction settings
      $duplicateWindowSetting = new AnetAPI\SettingType();
      $duplicateWindowSetting->setSettingName("duplicateWindow");
      $duplicateWindowSetting->setSettingValue("60");
      // Create a TransactionRequestType object and add the previous objects to it
      $transactionRequestType = new AnetAPI\TransactionRequestType();
      $transactionRequestType->setTransactionType("authCaptureTransaction");
      $transactionRequestType->setAmount($amount);
      $transactionRequestType->setOrder($order);
      $transactionRequestType->setPayment($paymentOne);
      $transactionRequestType->setBillTo($customerAddress);
      $transactionRequestType->setCustomer($customerData);
      $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
 
      // Assemble the complete transaction request
      $request = new AnetAPI\CreateTransactionRequest();
      $request->setMerchantAuthentication($merchantAuthentication);
      $request->setRefId($refId);
      $request->setTransactionRequest($transactionRequestType);

      // Create the controller and get the response
      $controller = new AnetController\CreateTransactionController($request);
      $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
      // echo "<pre>";
      // print_r($response);
      // die();

      // QUERY TO SAVE PAYMENT LOGS
      $authourize_ref_id=$response->getRefId();
      if ($response->getTransactionResponse()=="") {
         $result_code="";
         $result_message_code="";
         $result_message_text="";
         $errors="";
         $transaction_id="";         
      }
      else{
         if ($response->getMessages()->getResultCode() == "Ok") {
            // code...
            $result_code=$response->getTransactionResponse()->getResponseCode();
            $result_message_code=$response->getTransactionResponse()->getMessages()[0]->getCode();
            $result_message_text=$response->getTransactionResponse()->getMessages()[0]->getDescription();
            // $errors="";
            $transaction_id=$response->getTransactionResponse()->getTransId();
         }
         else{
            $result_code=$response->getTransactionResponse()->getResponseCode();
            $result_message_code=$response->getTransactionResponse()->getErrors()[0]->getErrorCode();
            // print_r($result_message_code);die();
            $result_message_text=$response->getTransactionResponse()->getErrors()[0]->getErrorText();
            // $errors="";
            $transaction_id=$response->getTransactionResponse()->getTransId();
         }

      }
      $add_time=date('Y-m-d H:m:s');
      $query=$this->db->query("INSERT INTO payment_logs(booking_id,authourize_ref_id,result_code,result_message_code,result_message_text,transaction_id,add_time) VALUES($booking_id,'$authourize_ref_id','$result_code','$result_message_code','$result_message_text','$transaction_id','$add_time')");


         if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
               $tresponse = $response->getTransactionResponse();
               if ($tresponse != null && $tresponse->getMessages() != null) {

                  $payment_message=$tresponse->getMessages()[0]->getDescription();
                  $query=$this->db->query("UPDATE flight_booking SET payment_status=1,payment_message='$payment_message' WHERE id='$booking_id'"); 
                  redirect('Home/payment_success');
               } 
               else {
               if ($tresponse->getErrors() != null) {
                  $payment_message=$tresponse->getErrors()[0]->getErrorText();
                  $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
                  redirect('Home/payment_fail');
                  
               }
               else{
                  $payment_message="Unknown Error Occured";
                  $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
                  redirect('Home/payment_fail');

               }
            }
         } 
         else {
            $tresponse = $response->getTransactionResponse();
            if ($tresponse != null && $tresponse->getErrors() != null) {

               $payment_message=$tresponse->getErrors()[0]->getErrorText();
               $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
               redirect('Home/payment_fail');
            } 
            else {

               $payment_message=$response->getMessages()->getMessage()[0]->getText();
               $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
            }
            redirect('Home/payment_fail');
         }
      } 
      else {
         $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='Unknown Error Occured' WHERE booking_id='$booking_id'");
            redirect('Home/payment_fail');
      }

   }

   public function payment_success()
   {
      $booking_id=$this->session->userdata('booking_id');
      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$booking_id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      $payment_logs=$this->db->query("SELECT * FROM payment_logs WHERE booking_id='$booking_id'");
      $payment_logs=$payment_logs->result();
      $payment_logs=$payment_logs[0];
      $data=array('flight_booking'=>$flight_booking,'payment_logs'=>$payment_logs);
      $this->load->view('payment_success',$data);
   }

   public function payment_fail()
   {
      $booking_id=$this->session->userdata('booking_id');
      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$booking_id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      $payment_logs=$this->db->query("SELECT * FROM payment_logs WHERE booking_id='$booking_id'");
      $payment_logs=$payment_logs->result();
      $payment_logs=$payment_logs[0];
      $data=array('flight_booking'=>$flight_booking,'payment_logs'=>$payment_logs);
      $this->load->view('payment_fail',$data);
   }

   public function not_found()
   {
      $this->load->view('not_found');
   }

   public function contact()
   {
      $this->load->view('contact');
   }

   public function contact_action()
   {
      // print_r($this->input->post());
      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $subject=$this->input->post('subject');
      $message=$this->input->post('message');
      $add_time=date("Y-m-d H:m:s");
      $add_ip=$_SERVER['REMOTE_ADDR'];
      $query=$this->db->query("INSERT INTO contact(name,email,subject,message,add_time,add_ip) VALUES('$name','$email','$subject','$message','$add_time','$add_ip')");
      if ($query) {
         $this->session->set_userdata(array('contact_message'=>"Your query has been submitted we will get back to you shortly"));
         redirect('Home/contact');
      }
   }

   public function corportate_booking()
   {
      $this->load->view('corporate_booking');
   }
  

   // AMADEUS API 

   // FOR ACCESS TOKEN
   public function access_token(){
        // TO GET ACCESS TOKEN
        $url = 'https://api.amadeus.com/v1/security/oauth2/token'; // Replace with your API endpoint
        $api_key = 'oQkM8X6uiglsvziyVHQKmy2RNdMmGA7x'; // Replace with your x-api-key
        $api_secret='AQC0bHk9M03I6W4D';

        // MASTERS END
        
        // CODES FOR ACCESS TOKEN START
        $data = array(
            'client_secret' =>$api_secret,
            'client_id' =>$api_key,
            'grant_type'=>'client_credentials'
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'x-api-key: ' . $api_key
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response=json_decode($response,true);
        $access_token=$response['access_token'];
        return $access_token;
        // CODES FOR ACCESS TOKEN END
   }

   public function airport_search(){
      $city=$this->input->post('city');
      // $city="DEL";
      $access_token=$this->access_token();
      $url = 'https://api.amadeus.com/v1/reference-data/locations';
      $params = array(
            'subType' => 'CITY',
            'keyword' => $city,
            'page' => array(
                'limit' => 50,
                'offset' => 0
            ),
            'sort' => 'analytics.travelers.score',
            'view' => 'FULL'
      ); 

      $query_string = http_build_query($params);
      $url .= '?' . $query_string;
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$access_token,
            'Content-Type: application/json'
          ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
        // echo "<pre>";
      echo $response;
   }

   public function flight_search_api($from,$to,$departure,$return,$trip_type,$no_passengers,$children,$infants,$travel_class,$included_airlines,$maxPrice)
   {
      // print_r($departure);
      // echo "<br>";
      // print_r($return);die();
      $params = array(
            'originLocationCode' => $from,
            'destinationLocationCode' =>$to,
            'departureDate'=>$departure,
            'adults'=>$no_passengers,
            'children'=>$children,
            'infants'=>$infants,
            'currencyCode'=>'USD',
            'travelClass'=>$travel_class,
            'max'=>10
      );
      if ($trip_type=='round') {
               $params['returnDate']=$return;
         
      }
      if ($maxPrice!='') {
            $params['maxPrice']=(int)$maxPrice;  
         
      }
      if($included_airlines!=''){
            $params['includedAirlineCodes']=$included_airlines;  
      }
      // print_r($params);die();
      $access_token=$this->access_token();
      $url = 'https://api.amadeus.com/v2/shopping/flight-offers';

      $query_string = http_build_query($params);
      $query_string=str_replace('%2C',',',$query_string);
      $url .= '?' . $query_string;
      // print_r($url);die();
      $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$access_token,
            'Content-Type: application/json'
          ),
        ));
      $response = curl_exec($curl);
      curl_close($curl);
      $this->session->set_userdata(array('flight_search'=>$response));
      $response=json_decode($response,true);
      // echo "<pre>";print_r($response);die();
      return $response;
   }

   public function set_flight()
   {
      $id=$this->input->post('id');
      $this->session->set_userdata(array('flight_id'=>$id));
      echo 1;
   }


   public function flight_booking_api()
   {
      // code...
   }


   public function rate($condition,$price)
   {
      $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE parameter_condition='$condition' AND status=1");
      $query=$query->result();
      $query=$query[0];
      $type=$query->type;
      $amount=$query->amount;

      if ($type=='percentage') {
         $price=$price + ( $price * $amount/100 );
      }
      else{
         $price=$price + $amount;
      }

      return $price;
       
   }
 
}
?>