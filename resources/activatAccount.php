<?php
    // session_start(); 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    error_reporting(0);
    $email = base64_decode($_REQUEST['email']);
    $user_id = base64_decode($_REQUEST['user_id']);

    $check = $db->prepare("SELECT * FROM phtv_users WHERE email = '$email' AND id = '$user_id'");
    $check->execute();
    if($check->rowCount() > 0){
        $update = $db->query("UPDATE phtv_users SET is_active = '1', is_verified = '1' WHERE id ='$user_id'");
        if($update){
            $output['success'] = "success";
            $output['message'] = "Account varified successfully";
        } else {
            $output['success'] = "fail";
            $output['message'] = "Account not vrified. please try again later";
        }
    } else {
        $output['success'] = "fail";
        $output['message'] = "Your link is expired. please try another link";
    }  
    echo json_encode($output);
 ?>