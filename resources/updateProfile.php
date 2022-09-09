<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
	$full_name = $_REQUEST['full_name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $user_id = $_SESSION['userid'];
    $update = $db->query("UPDATE phtv_users SET full_name = '$full_name',email = '$email',mobile = '$mobile' WHERE id = '$user_id'");   
    if($update){
        $success['success'] = "success";
        $success['message'] = "User data updated successfully";
    }else{
        $success['success'] = "fail";
        $success['message'] = "User data not updated";
    }
    echo json_encode($success);
?>