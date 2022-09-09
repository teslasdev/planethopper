<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    error_reporting(0);
	$email = $_REQUEST['email'];
	$forgot_emails = $db->query("SELECT * FROM phtv_users WHERE email = '$email'");
	if($forgot_emails->rowCount() > 0){
        $femaile = $forgot_emails->fetch();
        $Password = $femaile['password'];

        $sendMail = forgotPasswordUser($email,$Password);

        if($sendMail){
			$success['success'] = "success";
            $success['message'] = "Your Reset Password Link Sent To Your Email";
		}else{
			$success['success'] = "fail";
            $success['message'] = "Please Enter Valid Email";
		}
    } else{
    	$success['success'] = "fail";
        $success['message'] = "Please Enter Valid Email";
    }		
    echo json_encode($success);
?>