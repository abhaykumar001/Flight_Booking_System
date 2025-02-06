<?php 
/*Payment Status
0  Failed
1  Success
2  Pending
*/
require 'authourize_net/vendor/autoload.php';

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
      $class=$this->input->get('class');
      $no_passengers=$this->input->get('no_adults');
      $children=$this->input->get('no_children');
      $infant=$this->input->get('no_infants');
      // print_r($this->input->post());die();
      $trip_type=$this->input->get('trip');
      if ($trip_type=='round') {
         $return=$this->input->get('return');
         if ($return!='') {
            $return=date("Y-m-d", strtotime($return));
         }
         else{
            $return='';
         }
      }
      else{
         $return="";
      }
      
      $this->session->set_userdata(array('trip_type'=>$trip_type,'from'=>$from1,'to'=>$to1,'departure'=>$departure,'class'=>$class,'return'=>$return,'no_passengers'=>$no_passengers,'children'=>$children,'infant'=>$infant,'travel_class'=>$class));
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
      $add_time=date("Y-m-d H:i:s");
      $ip_address=$_SERVER['REMOTE_ADDR'];
     // print_r($included_airlines);die();
      $query=$this->db->query("INSERT INTO search_log(from_airport,to_airport,departure_date,return_date,class,adult,children,infant,ip_address,add_date) VALUES('$from','$to','$departure','$return','$class',$no_passengers,$children,$infant,'$ip_address','$add_time')");
      $api_response=$this->flight_search_api($from,$to,$departure,$return,$trip_type,$no_passengers,$children,$infant,$class,$included_airlines,$max_price);
      if(array_key_exists('errors',$api_response)){
         redirect('Home/no_flights');
      }
      if ($api_response['meta']['count']==0) {
      $dictionary=array();
      $response=array();
                 redirect('Home/no_flights');
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
      $airports_query=$this->db->query("SELECT * FROM airports");
      $airports_query=$airports_query->result();
      $airports = array_column($airports_query, 'airport_name', 'airport_code');
      // print_r($airportArray);die();
      $array=array('dictionary'=>$dictionary,'data'=>$response,'trip_type'=>$trip_type,'from'=>$from1,'to'=>$to1,'departure'=>$departure,'return'=>$return,'trip_type'=>$trip_type,'controller'=>$this,'fares'=>$carrierFares,'fares_stop'=>$fares_stop,'lowest'=>$lowest,'highest'=>$highest,'airports'=>$airports);
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
      $query=$this->db->query("SELECT * FROM cms WHERE url_link='$id' AND status=1");
      if ($query->num_rows()>0) {
         $query=$query->result();
         $data=$query[0];
         $array=array('page_title'=>$data->page_title,'meta_name'=>$data->meta_name,'meta_description'=>$data->meta_description,'content'=>$data->content);

         // print_r($array);die();
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
      $this->click_report('Booking');
      $data=array('dictionary'=>$dictionaries,'data'=>$data,'controller'=>$this);
      $this->load->view('booking_details',$data);
   }

   public function click_report($page='')
   {
      $api_data=$this->session->userdata('flight_search');
      $api_data=json_decode($api_data,true);
      // print_r(array_keys($api_data));die();
      $data=$api_data['data'];
      $dictionaries=$api_data['dictionaries'];
      $flight_id=$this->session->userdata('flight_id');
      $data=$data[$flight_id];
      // FOR CLICK REPORT
      $from=$this->session->userdata('from');
      $from=explode("-",$from);
      $from_airport=$from[0];
      $to=$this->session->userdata('to');
      $to=explode("-",$to);
      $to_airport=$to[0];
      $departure=$this->session->userdata('departure');
      $return=$this->session->userdata('return');
      $class=$this->session->userdata('class');
      $adult=$this->session->userdata('no_passengers');
      $child=$this->session->userdata('children');
      $infant=$this->session->userdata('infant');
      $supplier="";
      // print_r($data['itineraries'][0]['segments']);
      $airlines=$data['itineraries'][0]['segments'][0]['carrierCode'];
      $price=$data['price']['total'];
      $company="";
      $source="";
      $add_time=date('Y-m-d H:i:s');
      $ip=$_SERVER['REMOTE_ADDR'];
      function getBrowser() {
         $userAgent = $_SERVER['HTTP_USER_AGENT'];
         $browserName = 'Unknown';
         $browserVersion = '';
         // List of user agents and their corresponding browser names
         $browsers = [
           'MSIE'      => 'Internet Explorer',
           'Trident'   => 'Internet Explorer',
           'Edge'      => 'Microsoft Edge',
           'Chrome'    => 'Google Chrome',
           'Safari'    => 'Apple Safari',
           'Firefox'   => 'Mozilla Firefox',
           'Opera'     => 'Opera',
           'OPR'       => 'Opera',
         ];
         foreach ($browsers as $agent => $name) {
           if (strpos($userAgent, $agent) !== false) {
               $browserName = $name;
               preg_match("/{$agent}[\/\s](\d+\.\d+)/", $userAgent, $matches);
               if (isset($matches[1])) {
                   $browserVersion = $matches[1];
               } else {
                   preg_match('/Version[\/\s](\d+\.\d+)/', $userAgent, $matches);
                   $browserVersion = $matches[1] ?? 'Unknown';
               }
               break;
           }
         }

         return [
           'name'    => $browserName,
           'version' => $browserVersion,
         ];
      }

      $browser = getBrowser();
      $browser_name=$browser['name'].'-'.$browser['version'];
      $query=$this->db->query("INSERT INTO click_tracker(from_airport,to_airport,departure_date,return_date,class,adult,child,infant,supplier,airlines,price,company,source,add_time,ip,page,browser) VALUES('$from_airport','$to_airport','$departure','$return','$class','$adult','$child','$infant','$supplier','$airlines','$price','$company','$source','$add_time','$ip','$page','$browser_name')");
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
      if (array_key_exists('carrierCode',$flight['itineraries'][0]['segments'][0])) {
                  $code=$flight['itineraries'][0]['segments'][0]['carrierCode'];
      }
      else{
         $code=$flight['itineraries'][0]['segments'][0]['operating']['carrierCode'];
      }
      $base_fare=$this->rate($code,$flight['price']['base']);
      $extra_charges=$this->rate($code,$flight['price']['total'] - $flight['price']['base']);
      $total=$this->rate($code,$flight['price']['total'])  * $this->session->userdata('no_passengers');

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
      $add_time=date("Y-m-d H:i:s");
      $add_ip=$_SERVER['REMOTE_ADDR'];

      $contact_email=$this->input->post('contact_email');
      $contact_phone=$this->input->post('contact_phone');
      $contact_first_name=$this->input->post('contact_first_name');
      $contact_last_name=$this->input->post('contact_last_name');
      $last_id=$this->db->query("SELECT max(id) as last_id FROM flight_booking");
      $last_id=$last_id->result();
      $last_id=$last_id[0]->last_id;
      $last_id=$last_id+1;
      $reference_no="F".date('d').'X'.$last_id;
      // FOR FLIGHT BOOKING TABLE
      $query=$this->db->query("INSERT INTO flight_booking(from_airport,from_city,to_airport,to_city,return_trip,travel_date,return_date,no_person,no_child,no_infant,class,ticket_price,extra_charges,total_charges,booking_date,user_id,booking_status,pnr_no,status,add_time,add_ip,flight_complete_detail,contact_email,contact_phone,contact_first_name,contact_last_name,payment_status,reference_no,booking_source) VALUES('$from_airport','$from_city','$to_airport','$to_city',$return_trip,'$travel_date','$return_date',$no_passengers,$children,$infant,'$class',$base_fare,$extra_charges,$total,'$booking_date',$user_id,'Pending','$pnr',1,'$add_time','$add_ip','$flight_complete_detail','$contact_email','$contact_phone','$contact_first_name','$contact_last_name',2,'$reference_no','Online')");


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
            // $id_type_id="id_type_".$i;
            // $id_number_id="id_number_".$i;
            $year_id="year_".$i;
            $month_id="birth-month_".$i;
            $date_id="birth-day_".$i;
            $gender_id="gender_".$i;
            $first_name=$this->input->post($first_name_id);
            $middle_name=$this->input->post($middle_name_id);
            $last_name=$this->input->post($last_name_id);
            // $id_type=$this->input->post($id_type_id);
            // $id_number=$this->input->post($id_number_id);
            $year=$this->input->post($year_id);
            $month=$this->input->post($month_id);
            $date=$this->input->post($date_id);
            $dob=$year.'-'.$month.'-'.$date;
            $gender=$this->input->post($gender_id);

            $extra_charges=$this->rate('all',$flight['price']['total'] - $flight['price']['base'])/$no_passengers;
            $seat_price=$this->rate('all',$flight['price']['base'])/$no_passengers;
            $total_price=$this->rate('all',$flight['price']['total'])/$no_passengers;
            $add_time=date("Y-m-d H:i:s");
            $add_ip=$_SERVER['REMOTE_ADDR'];
            $booking_date=date('Y-m-d');
            $query=$this->db->query("INSERT INTO passenger_details(booking_id,first_name,middle_name,last_name,dob,class,extra_charges,seat_price,total_charges,add_time,add_ip,booking_date,status,gender) VALUES($booking_id,'$first_name','$middle_name','$last_name','$dob','$class',$extra_charges,$seat_price,$total_price,'$add_time','$add_ip','$booking_date',1,'$gender')");
            $i++;
         }
         $this->click_report('Payment');

         redirect('Home/payment');
      }
      else{
      }
   }

   public function payment()
   {
      $booking_id=$this->session->userdata('booking_id');
      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$booking_id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
     
      $data=array('flight_booking'=>$flight_booking);
      $this->load->view('payment',$data);
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

      // // define("AUTHORIZENET_LOG_FILE", "phplog");
      // $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
      // // print_r($api_key);
      // // print_r($api_secret);
      // $merchantAuthentication->setName($api_key);
      // $merchantAuthentication->setTransactionKey($api_secret);

      // // Set the transaction's refId
      // $refId = $company_code.'-'. time();
      // // print_r($card_number);
      // // echo "---";
      // // print_r($card_expiry);
      // // echo "---";
      // // print_r($card_cvv);
      // // Create the payment data for a credit card
      // $creditCard = new AnetAPI\CreditCardType();
      // $creditCard->setCardNumber($card_number);
      // $creditCard->setExpirationDate($card_expiry);
      // $creditCard->setCardCode($card_cvv);

      // // Add the payment data to a paymentType object
      // $paymentOne = new AnetAPI\PaymentType();
      // $paymentOne->setCreditCard($creditCard);

      // // Create order information
      // $order = new AnetAPI\OrderType();
      // $order->setInvoiceNumber($order_id);
      // $order->setDescription($order_id);

      // // Set the customer's Bill To address
      // $customerAddress = new AnetAPI\CustomerAddressType();
      // $customerAddress->setFirstName($first_name);
      // $customerAddress->setLastName($last_name);
      // $customerAddress->setAddress($card_street_address);
      // $customerAddress->setCity($card_city);
      // $customerAddress->setState($card_state);
      // $customerAddress->setZip($card_zip);
      // $customerAddress->setCountry($card_country);

      // // Set the customer's identifying information
      // $customerData = new AnetAPI\CustomerDataType();
      // $customerData->setType("individual");
      // $customerData->setId($card_phone);
      // // $customerData->setEmail();

      // // Add values for transaction settings
      // $duplicateWindowSetting = new AnetAPI\SettingType();
      // $duplicateWindowSetting->setSettingName("duplicateWindow");
      // $duplicateWindowSetting->setSettingValue("60");
      // // Create a TransactionRequestType object and add the previous objects to it
      // $transactionRequestType = new AnetAPI\TransactionRequestType();
      // $transactionRequestType->setTransactionType("authCaptureTransaction");
      // $transactionRequestType->setAmount($amount);
      // $transactionRequestType->setOrder($order);
      // $transactionRequestType->setPayment($paymentOne);
      // $transactionRequestType->setBillTo($customerAddress);
      // $transactionRequestType->setCustomer($customerData);
      // $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
 
      // // Assemble the complete transaction request
      // $request = new AnetAPI\CreateTransactionRequest();
      // $request->setMerchantAuthentication($merchantAuthentication);
      // $request->setRefId($refId);
      // $request->setTransactionRequest($transactionRequestType);

      // // Create the controller and get the response
      // $controller = new AnetController\CreateTransactionController($request);
      // $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
      // // echo "<pre>";
      // // print_r($response);
      // // die();

      // // QUERY TO SAVE PAYMENT LOGS
      // $authourize_ref_id=$response->getRefId();
      // if ($response->getTransactionResponse()=="") {
      //    $result_code="";
      //    $result_message_code="";
      //    $result_message_text="";
      //    $errors="";
      //    $transaction_id="";         
      // }
      // else{
      //    if ($response->getMessages()->getResultCode() == "Ok") {
      //       // code...
      //       $result_code=$response->getTransactionResponse()->getResponseCode();
      //       $result_message_code=$response->getTransactionResponse()->getMessages()[0]->getCode();
      //       $result_message_text=$response->getTransactionResponse()->getMessages()[0]->getDescription();
      //       // $errors="";
      //       $transaction_id=$response->getTransactionResponse()->getTransId();
      //    }
      //    else{
      //       print_r($response);die();
      //       $result_code=$response->getTransactionResponse()->getResponseCode();
      //       $result_message_code=$response->getTransactionResponse()->getErrors()[0]->getErrorCode();
      //       // print_r($result_message_code);die();
      //       $result_message_text=$response->getTransactionResponse()->getErrors()[0]->getErrorText();
      //       // $errors="";
      //       $transaction_id=$response->getTransactionResponse()->getTransId();
      //    }

      // }
      // $add_time=date('Y-m-d H:i:s');
      // $query=$this->db->query("INSERT INTO payment_logs(booking_id,authourize_ref_id,result_code,result_message_code,result_message_text,transaction_id,add_time) VALUES($booking_id,'$authourize_ref_id','$result_code','$result_message_code','$result_message_text','$transaction_id','$add_time')");


      //    if ($response != null) {
      //       if ($response->getMessages()->getResultCode() == "Ok") {
      //          $tresponse = $response->getTransactionResponse();
      //          if ($tresponse != null && $tresponse->getMessages() != null) {

      //             $payment_message=$tresponse->getMessages()[0]->getDescription();
      //             $query=$this->db->query("UPDATE flight_booking SET payment_status=1,payment_message='$payment_message' WHERE id='$booking_id'"); 
      //             redirect('Home/payment_success');
      //          } 
      //          else {
      //          if ($tresponse->getErrors() != null) {
      //             $payment_message=$tresponse->getErrors()[0]->getErrorText();
      //             $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
      //             redirect('Home/payment_fail');
                  
      //          }
      //          else{
      //             $payment_message="Unknown Error Occured";
      //             $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
      //             redirect('Home/payment_fail');

      //          }
      //       }
      //    } 
      //    else {
      //       $tresponse = $response->getTransactionResponse();
      //       if ($tresponse != null && $tresponse->getErrors() != null) {

      //          $payment_message=$tresponse->getErrors()[0]->getErrorText();
      //          $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
      //          redirect('Home/payment_fail');
      //       } 
      //       else {

      //          $payment_message=$response->getMessages()->getMessage()[0]->getText();
      //          $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='$payment_message' WHERE id='$booking_id'");
      //       }
      //       redirect('Home/payment_fail');
      //    }
      // } 
      // else {
      //    $query=$this->db->query("UPDATE flight_booking SET payment_status=0,payment_message='Unknown Error Occured' WHERE booking_id='$booking_id'");
      //       redirect('Home/payment_fail');
      // }
      redirect('Home/payment_success');


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

   public function payment_temp()
   {
      $booking_id=$this->session->userdata('booking_id');
      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$booking_id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      // print_r($this->input->post());die();
      $card_no=$this->input->post('card_no');
      $card_name=$this->input->post('card_name');
      $expiry=$this->input->post('expiry_month').'/'.$this->input->post('expiry_year');
      $cvc=$this->input->post('cvv');
      $total_amount= $flight_booking->total_charges;
      $status='Pending';
      $billing_phone=$this->input->post('billing_phone');
      $country=$this->input->post('country');
      if ($country=='United States') {
         $state=$this->input->post('state1');
      }
      else{
         $state=$this->input->post('state2');
      }
      $city=$this->input->post('city');
      $zip_code=$this->input->post('zip_code');
      $query=$this->db->query("INSERT INTO payment_method(booking_id,card_no,expiry,cvc,card_holder_name,total_amount,status,status_code,billing_phone,country,state,city,zip_code) VALUES('$booking_id','$card_no','$expiry','$cvc','$card_name','$total_amount','$status',0,'$billing_phone','$country','$state','$city','$zip_code')");
      // $payment_logs=$this->db->query("SELECT * FROM payment_logs WHERE booking_id='$booking_id'");
      // $payment_logs=$payment_logs->result();
      // $payment_logs=$payment_logs[0];
      $data=array('flight_booking'=>$flight_booking);
      $this->send_confirmation_mail($booking_id);
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
      $first_name=$this->input->post('first_name');
      $last_name=$this->input->post('last_name');
      $address=$this->input->post('address');
      $city=$this->input->post('city');
      $state=$this->input->post('state');
      $zip_code=$this->input->post('zip_code');
      $email=$this->input->post('email');
      $dob=$this->input->post('dob');
      $gender=$this->input->post('gender');
      $message=$this->input->post('message');
      $add_time=date("Y-m-d H::s");
      $add_ip=$_SERVER['REMOTE_ADDR'];
      $query=$this->db->query("INSERT INTO contact(first_name,last_name,address,city,state,zip_code,email,dob,gender,message,add_time,add_ip) VALUES('$first_name','$last_name','$address','$city','$state','$zip_code','$email','$dob','$gender','$message','$add_time','$add_ip')");
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
        // print_r($response['access_token']);
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

   public function airport_code_search()
   {
     $city=$this->input->post('city');
      // $city="DEL";
      $access_token=$this->access_token();
      $url = 'https://api.amadeus.com/v1/reference-data/locations';
      $params = array(
            'subType' => 'AIRPORT',
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
      // print_r($trip_type);die();
      if ($trip_type=='round') {
         if ($return!='') {
            $params['returnDate']=$return;
         }
         
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


   public function rate($condition,$price,$passengers_count=1,$from_airport='',$to_airport=''){
      // R : Route  D: Dates A: Airlines it is here as $condition and parameter_condition in DB C:Class
      $passengers_count=1;
      if ($from_airport=='') {         
         $from_airport=$this->session->userdata('from');
         $from_airport=explode("-",$from_airport);
         $from_airport=$from_airport[0];
      }
      if ($to_airport=='') {
         $to_airport=$this->session->userdata('to');
         $to_airport=explode("-",$to_airport);
         $to_airport=$to_airport[0];
      }
      $from_date=$this->session->userdata('departure');
      $to_date=$this->session->userdata('return');
      $class=$this->session->userdata('travel_class');
      // FOLLOWING COMBINATIONS ARE POSSIBLE
      // RDAC:Route + Dates + Airlines + Class
      // RDC: Route + Dates + Class 
      // RDA: Route + Dates + Airlines
      // RAC: Route + Airlines + Class
      // DAC: Dates + Airlines + Class
      // RD:  Route + Dates
      // RA:  Route + Airlines
      // RC:  Route + Class
      // DA:  Dates + Airlines
      // DC:  Dates + Class
      // AC:  Airlines + Class
      // R:   Route
      // D:   Dates
      // A:   Airlines
      // C:   Class
      // DEFAULT
      $a=0;
      // RDAC:Route + Dates + Airlines + Class

      // For DATES from_date<= '$from_date' AND to_date >='$from_date' 
      if ($to_date!="") {
         $to_condition="AND to_date='".$to_date."'";
      }
      else{
         $to_condition=" ";
      }
      
      $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND  from_date<= '$from_date' AND to_date >='$from_date' AND (class='$class' or class='any') AND parameter_condition='$condition'  AND status=1");
      $a=1;
      $rows=$query->num_rows();
      if ($rows>0) {
         
      }
      else{
         // RDC: Route + Dates + Class 
         $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date<= '$from_date' AND to_date >='$from_date' AND (class='$class'or class='any')  AND parameter_condition=''  AND status=1");
         $rows=$query->num_rows();
         $a=2;

         if ($rows>0) {
         
         }
         else{
            // RDA: Route + Dates + Airlines
             $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date<= '$from_date' AND to_date >='$from_date'  AND parameter_condition='$condition'   AND (class='' or class='any')  AND status=1");
            $rows=$query->num_rows();
            $a=3;
            if ($rows>0) {
         
            }
            else{
              // RAC: Route + Airlines + Class
               $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND parameter_condition='$condition' AND (class='$class' or class='any') AND from_date='' AND status=1");
               $a=4;
               $rows=$query->num_rows();
               if ($rows>0) {
         
               }
               else{
                  // DAC: Dates + Airlines + Class
                  $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date<= '$from_date' AND to_date >='$from_date' AND parameter_condition='$condition' AND (class='$class' or class='any') AND from_airport='' AND status=1");
                  $rows=$query->num_rows();
                  $a=5;
                  if ($rows>0) {
         
                  }
                  else{
                     // RD:  Route + Dates
                     $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date<= '$from_date' AND to_date >='$from_date'  AND parameter_condition='' AND (class='' or class='any')  AND status=1");
                     $rows=$query->num_rows();
                     $a=6;
                     if ($rows>0) {
         
                     }
                     else{
                        // RA:  Route + Airlines
                        $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND parameter_condition='$condition' AND (class='' or class='any') AND from_date='' AND status=1 ");
                        $rows=$query->num_rows();
                        $a=7;

                        if ($rows>0) {
         
                        }
                        else{
                           // RC:  Route + Class
                           $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND (class='$class'or class='any') AND parameter_condition='' AND from_date='' AND status=1");
                           $rows=$query->num_rows();
                           $a=8;
                           if ($rows>0) {
                           }
                           else{
                              // DA:  Dates + Airlines 
                              $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date<= '$from_date' AND to_date >='$from_date' AND parameter_condition='$condition' AND from_airport='' AND (class='' or class='any') AND status=1");
                              $rows=$query->num_rows();
                              $a=9;
                              if ($rows>0) {
                              
                              }
                              else{
                                 // DC:  Dates + Class
                                 $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date<= '$from_date' AND to_date >='$from_date' AND (class='$class'or class='any') AND from_date='' AND from_airport='' AND status=1");
                                 $a=10;
                                 $rows=$query->num_rows();
                                 if ($rows>0) {
                                 }
                                 else{
                                    // AC:  Airlines + Class
                                    $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE parameter_condition='$condition' AND (class='$class'or class='any') AND from_airport='' AND from_date=''  AND status=1");
                                    $rows=$query->num_rows();
                                    $a=11;

                                    if ($rows>0) {

                                    }
                                    else{
                                       // R:   Route
                                       $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport'  AND (class='' or class='any') AND from_date='' AND parameter_condition='' AND status=1");
                                       $a=12;

                                       $rows=$query->num_rows();
                                       if ($rows>0) {

                                       }
                                       else{
                                          // D:   Dates
                                          $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date<= '$from_date' AND to_date >='$from_date' AND (class='' or class='any') AND from_airport='' AND parameter_condition=''  AND status=1");
                                          $a=13;

                                          $rows=$query->num_rows();
                                          if ($rows>0) {
                                          }
                                          else{
                                             // A:   Airlines 
                                             $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE parameter_condition='$condition'   AND (class='' or class='any') AND from_date='' AND from_airport='' AND status=1");
                                             $rows=$query->num_rows();
                                             $a=14;
                                             if ($rows>0) {

                                             }
                                             else{
                                                // C:   Class
                                                $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE (class='$class'or class='any') AND parameter_condition='' AND from_date='' AND from_airport='' AND status=1");
                                                $a=15;

                                                $rows=$query->num_rows();
                                                if ($rows>0) {

                                                }
                                                else{
                                                   // DEFAULT
                                                   $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE default_status=1 AND status=1");
                                                   $a=16;

                                                }
                                             }
                                          }
                                       }
                                    }
                                 }
                              }
                           }
                        }
                     } 
                  } 
               }
            }
         }
      }
      $num_rows=$query->num_rows();
      $query=$query->result();

      if ($num_rows>0) {
         $query=$query[0];
         $type=$query->type;
         $amount=$query->amount;
      }
      else{
         $amount=0;
         $type="";   
      }

      if ($type=='percentage') {
         $price=$price + ( $price * $amount/100 );
      }
      elseif ($type=='absolute') {
         $price=$price + $amount;
      }
      else{
         // $price=$amount;
      }
      if ($passengers_count>1) {
         $price=$price/$passengers_count;
      }
      return $price;
      // return $price.$condition.$amount.'-'.$a;
       
   }
   public function rate_api($from_airport,$to_airport,$from_date,$to_date,$class,$condition,$price,$passengers_count=1)
   {
      $passengers_count=1;
      // R : Route  D: Dates A: Airlines it is here as $condition and parameter_condition in DB C:Class
      // FOLLOWING COMBINATIONS ARE POSSIBLE
      // RDAC:Route + Dates + Airlines + Class
      // RDC: Route + Dates + Class 
      // RDA: Route + Dates + Airlines
      // RAC: Route + Airlines + Class
      // DAC: Dates + Airlines + Class
      // RD:  Route + Dates
      // RA:  Route + Airlines
      // RC:  Route + Class
      // DA:  Dates + Airlines
      // DC:  Dates + Class
      // AC:  Airlines + Class
      // R:   Route
      // D:   Dates
      // A:   Airlines
      // C:   Class
      // DEFAULT
      $a=0;
      // RDAC:Route + Dates + Airlines + Class
      if ($to_date!="") {
         $to_condition="AND to_date='".$to_date."'";
      }
      else{
         $to_condition=" ";
      }
      $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date='$from_date' $to_condition  AND class='$class' AND parameter_condition='$condition'  AND status=1");
      $a=1;
      $rows=$query->num_rows();
      if ($rows>0) {
         
      }
      else{
         // RDC: Route + Dates + Class 
         $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date='$from_date' $to_condition AND class='$class'  AND status=1");
         $rows=$query->num_rows();
         $a=2;

         if ($rows>0) {
         
         }
         else{
            // RDA: Route + Dates + Airlines
             $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date='$from_date' $to_condition  AND parameter_condition='$condition'  AND status=1");
            $rows=$query->num_rows();
            $a=3;
            if ($rows>0) {
         
            }
            else{
              // RAC: Route + Airlines + Class
               $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND parameter_condition='$condition' AND class='$class'  AND status=1");
               $a=4;
               $rows=$query->num_rows();
               if ($rows>0) {
         
               }
               else{
                  // DAC: Dates + Airlines + Class
                  $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date='$from_date' $to_condition AND parameter_condition='$condition' AND class='$class'  AND status=1");
                  $rows=$query->num_rows();
                  $a=5;
                  if ($rows>0) {
         
                  }
                  else{
                     // RD:  Route + Dates
                     $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND from_date='$from_date' $to_condition  AND status=1");
                     $rows=$query->num_rows();
                     $a=6;
                     if ($rows>0) {
         
                     }
                     else{
                        // RA:  Route + Airlines
                        $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND parameter_condition='$condition'  AND status=1 ");
                        $rows=$query->num_rows();
                        $a=7;

                        if ($rows>0) {
         
                        }
                        else{
                           // RC:  Route + Class
                           $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport' AND class='$class'  AND status=1");
                           $rows=$query->num_rows();
                           $a=8;
                           if ($rows>0) {
                           }
                           else{
                              // DA:  Dates + Airlines 
                              $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date='$from_date' $to_condition AND parameter_condition='$condition'  AND status=1");
                              $rows=$query->num_rows();
                              $a=9;
                              if ($rows>0) {
                              
                              }
                              else{
                                 // DC:  Dates + Class
                                 $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date='$from_date' $to_condition AND class='$class'  AND status=1");
                                 $a=10;
                                 $rows=$query->num_rows();
                                 if ($rows>0) {
                                 }
                                 else{
                                    // AC:  Airlines + Class
                                    $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE parameter_condition='$condition' AND class='$class'  AND status=1");
                                    $rows=$query->num_rows();
                                    $a=11;

                                    if ($rows>0) {

                                    }
                                    else{
                                       // R:   Route
                                       $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_airport='$from_airport' AND to_airport='$to_airport'  AND status=1");
                                       $a=12;

                                       $rows=$query->num_rows();
                                       if ($rows>0) {

                                       }
                                       else{
                                          // D:   Dates
                                          $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE from_date='$from_date' $to_condition  AND status=1");
                                          $a=13;

                                          $rows=$query->num_rows();
                                          if ($rows>0) {
                                          }
                                          else{
                                             // A:   Airlines 
                                             $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE parameter_condition='$condition' AND status=1");
                                             $rows=$query->num_rows();
                                             $a=14;
                                             if ($rows>0) {

                                             }
                                             else{
                                                // C:   Class
                                                $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE class='$class' AND status=1");
                                                $a=15;

                                                $rows=$query->num_rows();
                                                if ($rows>0) {

                                                }
                                                else{
                                                   // DEFAULT
                                                   $query=$this->db->query("SELECT * FROM flight_extra_charge WHERE default_status=1 AND status=1");
                                                   $a=16;

                                                }
                                             }
                                          }
                                       }
                                    }
                                 }
                              }
                           }
                        }
                     } 
                  } 
               }
            }
         }
      }
      $num_rows=$query->num_rows();
      $query=$query->result();

      if ($num_rows>0) {
         $query=$query[0];
         $type=$query->type;
         $amount=$query->amount;
      }
      else{
         $amount=0;
         $type="";   
      }

      if ($type=='percentage') {
         $price=$price + ( $price * $amount/100 );
      }
      elseif ($type=='absolute') {
         $price=$price + $amount;
      }
      else{
         $price=$amount;
      }
      if ($passengers_count>1) {
         $price=$price/$passengers_count;
      }
      return $price;
      // return $price.$condition.$amount.'-'.$a;
       
   }


   public function hotel_search()
   {
      $customer_name=$this->input->post('customer_name');
      $city=$this->input->post('city');
      $check_in=$this->input->post('check_in');
      $check_out=$this->input->post('check_out');
      $email=$this->input->post('email');
      $mobile=$this->input->post('phone_no');
      $remarks=$this->input->post('remarks');
      if ($this->input->post('five_star')) {
         $five_star=1;
      }
      else{
         $five_star=0;
      }
      if ($this->input->post('four_star')) {
         $four_star=1;
      }
      else{
         $four_star=0;
      }
      $add_time=date('Y-m-d H:i:s');
      $add_ip=$_SERVER['REMOTE_ADDR'];
      $query=$this->db->query("INSERT INTO hotel_enquiry(customer_name,city,check_in,check_out,email,mobile,remarks,five_star,four_star,add_time,add_ip) VALUES('$customer_name','$city','$check_in','$check_out','$email','$mobile','$remarks',$five_star,$four_star,'$add_time','$add_ip')");
      $this->load->view('call_page');
   }

   public function cab_search()
   {
      $customer_name=$this->input->post('customer_name');
      $city=$this->input->post('city');
      $pickup_date=$this->input->post('pick_up_date');
      $pickup_time=$this->input->post('pick_up_time');
      $drop_date=$this->input->post('drop_date');
      $drop_time=$this->input->post('drop_time');
      $email=$this->input->post('email');
      $phone_no=$this->input->post('phone_no');
      $remarks=$this->input->post('remarks');
      $add_time=date('Y-m-d H:i:s');
      $add_ip=$_SERVER['REMOTE_ADDR'];
      $query=$this->db->query("INSERT INTO cab_enquiry(customer_name,city,pickup_date,pickup_time,drop_date,drop_time,email,phone_no,remarks,add_time,add_ip) VALUES('$customer_name','$city','$pickup_date','$pickup_time','$drop_date','$drop_time','$email','$phone_no','$remarks','$add_time','$add_ip')");
      $this->load->view('call_page');
      
   }
   
   public function no_flights()
   {
      $this->load->view('no_flight');
   }

   public function send_confirmation_mail($id)
   {
      $site_settings=$this->db->query("SELECT * FROM site_settings");
      $site_settings=$site_settings->result();
      $site_settings=$site_settings[0];

      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      $passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id='$id'");
      $passenger_details=$passenger_details->result();

      $payment_method=$this->db->query("SELECT * FROM payment_method WHERE booking_id='$id'");
      $payment_method=$payment_method->result();
      $payment_method=$payment_method[0];
      $card_no=$payment_method->card_no;
      $card_length=strlen($card_no);
      $card_no=str_repeat("X",$card_length - 4).substr($card_no,$card_length - 4);

      $card_holder_name=$payment_method->card_holder_name;
      $data=array('flight_booking'=>$flight_booking,'passenger_details'=>$passenger_details,'card_no'=>$card_no,'card_holder_name'=>$card_holder_name,'site_settings'=>$site_settings);

  $body="";
      $body.='<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Booking Pending</title></head><body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;"><div style="width: 80%; margin: 20px auto; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;"><div style="display: flex; justify-content: flex-end;"><div style="text-align: right;"><div><img src="'.base_url().'uploads/'.$site_settings->site_logo.'" style="height: 200px;width:200px;"></div><div class="flex flex-col"><div class="flex flex-row justify-end item-end"><span>'.$site_settings->site_name.'</span></div><div class="flex flex-row justify-end item-end"><<a href="tel:'.$site_settings->phone_no.'">'.$site_settings->phone_no.'</a></div><div class="flex flex-row justify-end item-end"><a href="mailto:'.$site_settings->email.'">'.$site_settings->email.'</a></div></div></div></div><div style="font-size: 24px; font-weight: bold;">Dear <span>'.$flight_booking->contact_first_name.' '.$flight_booking->contact_last_name.'</span></div><br><div class="flex flex-col">';
      $body.='<div style="font-size: 18px; color: #555;">Your booking is in processing. </div><div style="font-size: 18px; color: #555;">Booking Reference Number - <span>'.$flight_booking->reference_no.'</span></div><div style="font-size: 14px; color: #000; margin-bottom: 20px;">Your e-Ticket will be issued shortly, once your credit card verification has been completed.</div><div style="font-size: 14px; color: #e00; margin-bottom: 20px;"><b>Note:</b> Fares are not guaranteed until ticketed. In the rare event fares increase or any issue to book it online, you will receive a call from our expert. Tickets are Non-refundable & Non Transferable once Booked.</div></div><div style="margin-bottom: 20px;"> <div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Passenger Details</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Name</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Gender</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">DoB</th></tr></thead><tbody class="">';
         foreach ($passenger_details as $key => $value) {
            $body.='<tr class="item-center"><td style="padding: 10px; border: 1px solid #ddd;">'.$value->first_name.' '.$value->last_name.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value->gender.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value->dob.'</td></tr>';
         }
         $body.='</tbody></table></div><div style="margin-bottom: 20px;"><div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Contact Details</div><tablestyle="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Name</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Phone</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Email</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_first_name.' '.$flight_booking->contact_last_name.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_phone.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_email.'</td></tr></tbody></table></div>';
         $body.='<div style="margin-bottom: 20px;"><div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Flight Information</div><br>
         <div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">OutBound =>'.$flight_booking->from_city.'('.$flight_booking->from_airport.') - '.$flight_booking->to_city.'('.$flight_booking->to_airport.')</div>';
         
         $flight_details=$flight_booking->flight_complete_detail;
         $flight_details=json_decode($flight_details,true);
         $flight_details=$flight_details['itineraries'];

         $body.='<table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Airline</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Departing</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Arriving</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Flight No</th></tr></thead><tbody>';
         $departure=$flight_details[0]['segments'];
         foreach ($departure as $key => $value) {
            $departure_datetime=$value['departure']['at'];
            $departure_datetime=str_replace("T"," ",$departure_datetime);
            $departure_datetime=date("d M,Y \n h:i a", strtotime($departure_datetime));
            $arrival_datetime=$value['arrival']['at'];
            $arrival_datetime=str_replace("T"," ",$arrival_datetime);
            $arrival_datetime=date("d M,Y \n h:i a", strtotime($arrival_datetime));
            $body.='<tr><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['departure']['iataCode'].'<br>'.$departure_datetime.'</td class="border border-slate-600"><td style="padding: 10px; border: 1px solid #ddd;">'.$value['arrival']['iataCode'].'<br>'.$arrival_datetime.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'-'.$value['number'].'</td></tr>';
         }
         $body.='</tbody></table>';
         if ($flight_booking->return_date!='') {
            $body.='<div style="background-color: #2f4f93; color: white; padding: 10px; margin: 10px 0 0;">InBound =>'.$flight_booking->to_city.'('.$flight_booking->to_airport.') -  '.$flight_booking->from_city.'('.$flight_booking->from_airport.')</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Airline</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Departing</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Arriving</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Flight No</th></tr></thead><tbody>';
               $departure=$flight_details[1]['segments'];
               foreach ($departure as $key => $value) {
                  $departure_datetime=$value['departure']['at'];
                  $departure_datetime=str_replace("T"," ",$departure_datetime);
                  $departure_datetime=date("d M,Y \n h:i a", strtotime($departure_datetime));
                  $arrival_datetime=$value['arrival']['at'];
                  $arrival_datetime=str_replace("T"," ",$arrival_datetime);
                  $arrival_datetime=date("d M,Y \n h:i a", strtotime($arrival_datetime));
                  $body.='<tr><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['departure']['iataCode'].'<br>'.$departure_datetime.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['arrival']['iataCode'].'<br>'.$arrival_datetime.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'-'.$value['number'].'</td></tr>';
               }
               $body.='</tbody></table></div>';
         }
         $body.='<div cstyle="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Card Details</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Cardholder\'s Name</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">'.$card_holder_name.'</td></tr></tbody></table><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Price Details</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">Total Price <span>$'.$flight_booking->total_charges.'</span></td></tr></tbody></table><span style="font-size: 14px; margin-top: 20px; color: #555;">Note:- For 24*7 assistance, please contact us on : Phone:'.$site_settings->phone_no.'</span><span style="font-size: 14px; margin-top: 20px; color: #555;">Important Information<span><ul class="mt-2 ml-10" style="list-style-type:disc;"> <li>Travelers must make sure they have all of the required travel documents and that they are current and valid for their destination.</li><li>Fares are not guaranteed until tickets are issued. Fares are subject to availability of seats.</li><li>According to airline policies name changes are not allowed once the tickets are issued, though some airlines allow minor corrections after payment of change fees.</li><li>Flight schedules are subject to change by the Airlines due to changes in Airline Operations.</li><li>Date and routing changes will be subject to airline rules and regulations.</li></ul><br><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">Thanks & Regards</h4><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">'.$site_settings->site_name.' Team</h4><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">'.$site_settings->address.'</h4></div></body></html>';
      // echo $body;die();
      // FOR MAIL FUNCTION
      $mail = new PHPMailer();
      $mail->isSMTP();                      
       $mail->Host       = 'smtp.office365.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'sales@farexplorer.com';
      $mail->Password   = '11@Waheguru';
      $mail->SMTPSecure = 'STARTTLS';
      $mail->Port       = 587;
      $mail->From="sales@farexplorer.com";
      $mail->FromName ='FareXplorer';
      $mail->AddReplyTo('sales@farexplorer.com'); 
      $mail->ContentType = "text/html;charset=iso-8859-1";      
      $mail->ContentType = "text/html;charset=iso-8859-1";
      $mail->Subject  = "Your Booking is Pending";
      $mail->AddAddress($flight_booking->contact_email);
      $mail->AddAddress("farexplorer023@gmail.com");
      $mail->AddAddress("sales@farexploere.com");
      $mail->Body = $body;  
      if($mail->send()){
         $success = 1;
      }
      else{
         $success = 0;
         // echo $mail->ErrorInfo;  
      }
      // echo $success;
      $mail->ClearAddresses();

      $mail2 = new PHPMailer();
      $mail2->isSMTP();                      
      $mail2->Host       = 'smtp.gmail.com;';
      $mail2->SMTPAuth   = true;
      $mail2->Username   = 'farexplorer023@gmail.com';
      $mail2->Password   = 'ynfknuhsgempllll';
      $mail2->SMTPSecure = 'tls';
      $mail2->Port       = 587;
      $mail2->From="farexplorer023@gmail.com";
      $mail2->FromName ='FareXplorer';
      $mail2->AddReplyTo('farexplorer023@gmail.com'); 
      $mail2->FromName ='FareXplorer';
      $mail2->AddReplyTo('sales@farexplorer.com'); 
      $mail2->ContentType = "text/html;charset=iso-8859-1";
      $mail2->Subject  = "Your Booking is Pending";
      $mail2->AddAddress("sales@farexplorer.com");
      $mail2->Body = $body;  
      if($mail2->send()){
         $success = 1;
      }
      else{
         $success = 0;
         // echo $mail->ErrorInfo;  
      }
      // echo $success;
      $mail2->ClearAddresses();


   }

   public function send_confirmation_mail2($id)
   {
      $site_settings=$this->db->query("SELECT * FROM site_settings");
      $site_settings=$site_settings->result();
      $site_settings=$site_settings[0];

      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      $passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id='$id'");
      $passenger_details=$passenger_details->result();

      $payment_method=$this->db->query("SELECT * FROM payment_method WHERE booking_id='$id'");
      $payment_method=$payment_method->result();
      $payment_method=$payment_method[0];
      $card_no=$payment_method->card_no;
      $card_length=strlen($card_no);
      $card_no=str_repeat("X",$card_length - 4).substr($card_no,$card_length - 4);

      $card_holder_name=$payment_method->card_holder_name;
      $data=array('flight_booking'=>$flight_booking,'passenger_details'=>$passenger_details,'card_no'=>$card_no,'card_holder_name'=>$card_holder_name,'site_settings'=>$site_settings);

      $body="";
      $body.='<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Booking Pending</title></head><body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;"><div style="width: 80%; margin: 20px auto; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;"><div style="display: flex; justify-content: flex-end;"><div style="text-align: right;"><div><img src="'.base_url().'uploads/'.$site_settings->site_logo.'" style="height: 200px;width:200px;"></div><div class="flex flex-col"><div class="flex flex-row justify-end item-end"><span>'.$site_settings->site_name.'</span></div><div class="flex flex-row justify-end item-end"><a href="tel:'.$site_settings->phone_no.'">'.$site_settings->phone_no.'</a></div><div class="flex flex-row justify-end item-end"><a href="mailto:'.$site_settings->email.'">'.$site_settings->email.'</a></div></div></div></div><div style="font-size: 24px; font-weight: bold;">Dear <span>'.$flight_booking->contact_first_name.' '.$flight_booking->contact_last_name.'</span></div><br><div class="flex flex-col">';
      $body.='<div style="font-size: 18px; color: #555;">Your booking is in processing. </div><div style="font-size: 18px; color: #555;">Booking Reference Number - <span>'.$flight_booking->reference_no.'</span></div><div style="font-size: 14px; color: #000; margin-bottom: 20px;">Your e-Ticket will be issued shortly, once your credit card verification has been completed.</div><div style="font-size: 14px; color: #e00; margin-bottom: 20px;"><b>Note:</b> Fares are not guaranteed until ticketed. In the rare event fares increase or any issue to book it online, you will receive a call from our expert. Tickets are Non-refundable & Non Transferable once Booked.</div></div><div style="margin-bottom: 20px;"> <div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Passenger Details</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Name</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Gender</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">DoB</th></tr></thead><tbody class="">';
         foreach ($passenger_details as $key => $value) {
            $body.='<tr class="item-center"><td style="padding: 10px; border: 1px solid #ddd;">'.$value->first_name.' '.$value->last_name.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value->gender.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value->dob.'</td></tr>';
         }
         $body.='</tbody></table></div><div style="margin-bottom: 20px;"><div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Contact Details</div><tablestyle="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Name</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Phone</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Email</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_first_name.' '.$flight_booking->contact_last_name.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_phone.'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$flight_booking->contact_email.'</td></tr></tbody></table></div>';
         $body.='<div style="margin-bottom: 20px;"><div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Flight Information</div><br>
         <div style="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">OutBound =>'.$flight_booking->from_city.'('.$flight_booking->from_airport.') - '.$flight_booking->to_city.'('.$flight_booking->to_airport.')</div>';
         
         $flight_details=$flight_booking->flight_complete_detail;
         $flight_details=json_decode($flight_details,true);
         $flight_details=$flight_details['itineraries'];

         $body.='<table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Airline</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Departing</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Arriving</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Flight No</th></tr></thead><tbody>';
         $departure=$flight_details[0]['segments'];
         foreach ($departure as $key => $value) {
            $body.='<tr><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['departure']['iataCode'].'<br>'.$value['departure']['at'].'</td class="border border-slate-600"><td style="padding: 10px; border: 1px solid #ddd;">'.$value['arrival']['iataCode'].'<br>'.$value['arrival']['at'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'-'.$value['number'].'</td></tr>';
         }
         $body.='</tbody></table>';
         if ($flight_booking->return_date!='') {
            $body.='<div style="background-color: #2f4f93; color: white; padding: 10px; margin: 10px 0 0;">InBound =>'.$flight_booking->to_city.'('.$flight_booking->to_airport.') -  '.$flight_booking->from_city.'('.$flight_booking->from_airport.')</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Airline</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Departing</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Arriving</th><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Flight No</th></tr></thead><tbody>';
               $departure=$flight_details[1]['segments'];
               foreach ($departure as $key => $value) {
                  $body.='<tr><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['departure']['iataCode'].'<br>'.$value['departure']['at'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['arrival']['iataCode'].'<br>'.$value['arrival']['at'].'</td><td style="padding: 10px; border: 1px solid #ddd;">'.$value['carrierCode'].'-'.$value['number'].'</td></tr>';
               }
               $body.='</tbody></table></div>';
         }
         $body.='<div cstyle="background-color: #2f4f93; color: white; padding: 10px; margin: 0;">Card Details</div><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Cardholder\'s Name</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">'.$card_holder_name.'</td></tr></tbody></table><table style="width: 100%; margin-top: 10px; border-collapse: collapse;"><thead ><tr><th style="padding: 10px; border: 1px solid #ddd; background-color: #2f4f93; color: white;">Price Details</th></tr></thead><tbody><tr><td style="padding: 10px; border: 1px solid #ddd;">Total Price <span>$'.$flight_booking->total_charges.'</span></td></tr></tbody></table><span style="font-size: 14px; margin-top: 20px; color: #555;">Note:- For 24*7 assistance, please contact us on : Phone:'.$site_settings->phone_no.'</span><span style="font-size: 14px; margin-top: 20px; color: #555;">Important Information<span><ul class="mt-2 ml-10" style="list-style-type:disc;"> <li>Travelers must make sure they have all of the required travel documents and that they are current and valid for their destination.</li><li>Fares are not guaranteed until tickets are issued. Fares are subject to availability of seats.</li><li>According to airline policies name changes are not allowed once the tickets are issued, though some airlines allow minor corrections after payment of change fees.</li><li>Flight schedules are subject to change by the Airlines due to changes in Airline Operations.</li><li>Date and routing changes will be subject to airline rules and regulations.</li></ul><br><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">Thanks & Regards</h4><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">'.$site_settings->site_name.' Team</h4><h4 style="color: #555; margin-bottom: -15px; font-weight: 500;">'.$site_settings->address.'</h4></div></body></html>';
      echo $body;die();
      // FOR MAIL FUNCTION
      // $mail = new PHPMailer();
      $mail->isSMTP();                      
       $mail->Host       = 'smtp.office365.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'sales@farexplorer.com';
      $mail->Password   = '11@Waheguru';
      $mail->SMTPSecure = 'STARTTLS';
      $mail->Port       = 587;
      $mail->From="sales@farexplorer.com";
      $mail->FromName ='FareXplorer';
      $mail->AddReplyTo('sales@farexplorer.com'); 
      $mail->ContentType = "text/html;charset=iso-8859-1";      
      // $mail->Host       = 'smtp.gmail.com;';
      // $mail->SMTPAuth   = true;
      // $mail->Username   = 'farexplorer023@gmail.com';
      // $mail->Password   = 'ynfknuhsgempllll';
      // $mail->SMTPSecure = 'tls';
      // $mail->Port       = 587;
      // $mail->From="farexplorer023@gmail.com";
      // $mail->FromName ='FareXplorer';
      // $mail->AddReplyTo('farexplorer023@gmail.com'); 
      $mail->ContentType = "text/html;charset=iso-8859-1";
      $mail->Subject  = "Your Booking is Pending";
      $mail->AddAddress($flight_booking->contact_email);
      $mail->AddAddress("farexplorer023@gmail.com");
      $mail->AddAddress("sales@farexploere.com");
      $mail->Body = $body;  
      if($mail->send()){
         $success = 1;
      }
      else{
         $success = 0;
         echo $mail->ErrorInfo;  
      }
      echo $success;
      $mail->ClearAddresses();


   }


   public function test($id)
   {
      $site_settings=$this->db->query("SELECT * FROM site_settings");
      $site_settings=$site_settings->result();
      $site_settings=$site_settings[0];

      $flight_booking=$this->db->query("SELECT * FROM flight_booking WHERE id='$id'");
      $flight_booking=$flight_booking->result();
      $flight_booking=$flight_booking[0];
      $passenger_details=$this->db->query("SELECT * FROM passenger_details WHERE booking_id='$id'");
      $passenger_details=$passenger_details->result();

      $payment_method=$this->db->query("SELECT * FROM payment_method WHERE booking_id='$id'");
      $payment_method=$payment_method->result();
      $payment_method=$payment_method[0];
      $card_no=$payment_method->card_no;
      $card_length=strlen($card_no);
      $card_no=str_repeat("X",$card_length - 4).substr($card_no,$card_length - 4);

      $card_holder_name=$payment_method->card_holder_name;
      $data=array('flight_booking'=>$flight_booking,'passenger_details'=>$passenger_details,'card_no'=>$card_no,'card_holder_name'=>$card_holder_name,'site_settings'=>$site_settings);

      $this->load->view('confirmation_mail',$data);
   }

   public function flight_search_api_json()
   {
      $from=$this->input->get('from');
      $to=$this->input->get('to');
      $departure=$this->input->get('departure');
      $return=$this->input->get('return');
      // $trip_type=$this->input->get('trip');
      $no_adults=$this->input->get('no_adults');
      $children=$this->input->get('no_children');
      $infant=$this->input->get('no_infants');
      $class=$this->input->get('class');
      $included_airlines=$this->input->get('included_airlines');
      $max_price=$this->input->get('max_price');
      if ($return!="") {
         $trip_type='round';
      }
      else{
         $trip_type='one';
      }
      $api_response=$this->flight_search_api($from,$to,$departure,$return,$trip_type,$no_adults,$children,$infant,$class,$included_airlines,$max_price);
      $flight_data=$api_response['data'];
      $response_data=array();
      $passengers_count=$no_adults+$children+$infant;
      foreach ($flight_data as $key => $value) {        
         $response_data[$key]=array();
         $response_data[$key]['itineraries']=array();
         foreach ($value['itineraries'] as $key2 => $value2) {
            $response_data[$key]['itineraries'][$key2]=array();
            $itineraries=$value['itineraries'][$key2];
            $total_flight_time=str_replace("PT","",$itineraries['duration']);
            $response_data[$key]['total_flight_time']=$total_flight_time;
            $data2=$itineraries['segments'];
            foreach ($data2 as $key3 => $value3) {
                  $flight_time=str_replace("PT","",$value3['duration']);
                  $data3=array();

                  $from=$value3['departure']['iataCode'];
                  $departure=$value3['departure']['at'];
                  $departure=str_replace("T", " ", $departure);
                  $to=$value3['arrival']['iataCode'];
                  $arrival=$value3['arrival']['at'];
                  $arrival=str_replace("T", " ", $arrival);
                  $airline=$value3['carrierCode'];
                  $data3['from']=$from;
                  $data3['departure']=$departure;
                  $data3['to']=$to;
                  $data3['arrival']=$arrival;
                  $data3['airline']=$airline;
                  $data3['duration']=$flight_time;
                  array_push($response_data[$key]['itineraries'][$key2], $data3);
            }
         }
         $price=$value['price']['total'];
         $currency=$value['price']['currency'];

         $price_per_passenger=$this->rate_api($from,$to,$departure,$return,$class,$airline,$price,$passengers_count);
         $response_data[$key]['price']=array('currency'=>$currency,'price'=>$price_per_passenger);
      }
      $json_response=json_encode($response_data);
      // echo "<pre>";print_r($response_data);
      echo $json_response;

   }
}
?>