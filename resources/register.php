<?php
    // session_start(); 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    error_reporting(0);
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);

    $check = $db->prepare("SELECT * FROM phtv_users WHERE email = '$email'");
    $check->execute();
    if($check->rowCount() == 0){
        $insert = $db->query("INSERT INTO phtv_users SET full_name = '$fullname', email = '$email', password = '$password'");
        if($insert){
            $user_id = $db->lastInsertId();
            $send = signUpActivationLink($email, $user_id);
            $output['success'] = "success";
            $output['message'] = "Signup Successfully";
        } else {
            $output['success'] = "fail";
            $output['message'] = "Sign up not success. please try again later";
        }
    } else {
        $output['success'] = "fail";
        $output['message'] = "This email is already exist!";
    }  
    echo json_encode($output);
 ?>