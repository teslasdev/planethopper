<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

	$old_password = $_REQUEST['current_password'];
    $new_password = $_REQUEST['new_password'];
    $confirm_password = $_REQUEST['confirm_password'];
    $user_id = $_SESSION['userid'];
    $old_password = md5($old_password);
    $check = $db->query("SELECT * FROM phtv_users WHERE id = '$user_id'");
    $fecheck = $check->fetch();
    if($new_password == $confirm_password){
        if($old_password == $fecheck['password']){
            $new_password = md5($new_password);
            $update = $db->query("UPDATE phtv_users SET password = '$new_password' WHERE id = '$user_id'");	
            if($update){
                $success['success'] = "success";
                $success['message'] = "Password change successfully";
            }else{
                $success['success'] = "fail";
                $success['message'] = "Password not change";
            }
        } else {
            $success['success'] = "fail";
            $success['message'] = "Old Password not metch";
        }
    } else {
        $success['success'] = "fail";
        $success['message'] = "New password and confirm password are not match";
    }
    echo json_encode($success);
?>