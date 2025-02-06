<?php

$siteKey = "6LftGtEpAAAAAKn5MF_W5FJ_N-Um76B606AM8MbU";
$secretKey = "6LftGtEpAAAAADohckluzQLrIgLPHEV52imT-jLu";
// Email settings 
$recipientEmail = 'admin@example.com'; 
 
// Assign default values  
$postData = $valErr = $statusMsg = $api_error = ''; 
$status = 'error'; 
 
// If the form is submitted 
if(isset($_POST['submit_frm'])){ 
    // Retrieve value from the form input fields 
    $postData = $_POST; 
    $name = trim($_POST['name']); 
    $email = trim($_POST['email']); 
    $message = trim($_POST['message']); 
 
    // Validate input fields 
    if(empty($name)){ 
        $valErr .= 'Please enter your name.<br/>'; 
    } 
    if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    if(empty($message)){ 
        $valErr .= 'Please enter message.<br/>'; 
    } 
 
    // Check whether submitted input data is valid 
    if(empty($valErr)){ 
        // Validate reCAPTCHA response 
        if(!empty($_POST['g-recaptcha-response'])){ 
 
            // Google reCAPTCHA verification API Request 
            $api_url = 'https://www.google.com/recaptcha/api/siteverify'; 
            $resq_data = array( 
                'secret' => $secretKey, 
                'response' => $_POST['g-recaptcha-response'], 
                'remoteip' => $_SERVER['REMOTE_ADDR'] 
            ); 
 
            $curlConfig = array( 
                CURLOPT_URL => $api_url, 
                CURLOPT_POST => true, 
                CURLOPT_RETURNTRANSFER => true, 
                CURLOPT_POSTFIELDS => $resq_data, 
                CURLOPT_SSL_VERIFYPEER => false 
            ); 
 
            $ch = curl_init(); 
            curl_setopt_array($ch, $curlConfig); 
            $response = curl_exec($ch); 
            if (curl_errno($ch)) { 
                $api_error = curl_error($ch); 
            } 
            curl_close($ch); 
 
            // Decode JSON data of API response in array 
            $responseData = json_decode($response); 
 
            // If the reCAPTCHA API response is valid 
            if(!empty($responseData) && $responseData->success){ 
                // Send email notification to the site admin 
                $to = $recipientEmail; 
                $subject = 'New Contact Request Submitted'; 
                $htmlContent = " 
                    <h4>Contact request details</h4> 
                    <p><b>Name: </b>".$name."</p> 
                    <p><b>Email: </b>".$email."</p> 
                    <p><b>Message: </b>".$message."</p> 
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // Sender info header 
                $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n"; 
                 
                // Send email 
                @mail($to, $subject, $htmlContent, $headers); 
                 
                $status = 'success'; 
                $statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
                $postData = ''; 
            }else{ 
                $statusMsg = !empty($api_error)?$api_error:'The reCAPTCHA verification failed, please try again.'; 
            } 
        }else{ 
            $statusMsg = 'Something went wrong, please try again.'; 
        } 
    }else{ 
        $valErr = !empty($valErr)?'<br/>'.trim($valErr, '<br/>'):''; 
        $statusMsg = 'Please fill all the mandatory fields:'.$valErr; 
    } 
} 
 
?>
