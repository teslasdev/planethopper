<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';
$response = array();
$cinema_id = $_REQUEST['cinema_id'];
if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
    if(!isset($_SESSION['system_user_id']) && empty($_SESSION['system_user_id'])){
        $_SESSION['system_user_id'] = uniqid();
    }
    $system_user_id = $_SESSION['system_user_id'];
    $check = $db->query("SELECT * FROM phtv_cinema_review WHERE cinema_id = '$cinema_id' AND system_user_id = '$system_user_id'");
    if($check->rowCount() > 0){
        $delete = $db->query("DELETE FROM phtv_cinema_review WHERE cinema_id = '$cinema_id' AND system_user_id = '$system_user_id'");
    }
    if($_REQUEST['like'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', system_user_id = '$system_user_id', is_like = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif ($_REQUEST['unlike'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', system_user_id = '$system_user_id', is_unlike = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif($_REQUEST['laugh'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', system_user_id = '$system_user_id', is_laugh = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif($_REQUEST['normal'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', system_user_id = '$system_user_id', is_normal = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    }
} else {
    $user_id = $_SESSION['userid'];
    $check = $db->query("SELECT * FROM phtv_cinema_review WHERE cinema_id = '$cinema_id' AND user_id = '$user_id'");
    if($check->rowCount() > 0){
        $delete = $db->query("DELETE FROM phtv_cinema_review WHERE cinema_id = '$cinema_id' AND user_id = '$user_id'");
    }
    if($_REQUEST['like'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', user_id = '$user_id', is_like = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif($_REQUEST['unlike'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', user_id = '$user_id', is_unlike = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif($_REQUEST['laugh'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', user_id = '$user_id', is_laugh = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    } elseif($_REQUEST['normal'] == 1){
        $insert = $db->query("INSERT into phtv_cinema_review SET cinema_id = '$cinema_id', user_id = '$user_id', is_normal = 1");
        if($insert){
            $response['success'] = 'success';
            $response['message'] = "Cinema Review Added Successfully";
        } else {
            $response['success'] = 'fail';
            $response['message'] = "Something want wrong. Please try again later";
        }
    }
}
echo json_encode($response);
die;