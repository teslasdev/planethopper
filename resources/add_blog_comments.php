<?php
    // session_start(); 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    $blog_id = $_REQUEST['blog_id'];
    $comment_name = addslashes($_REQUEST['comment_name']);
    $comment_email = $_REQUEST['comment_email'];
    $comment = addslashes($_REQUEST['comment']);
    $user_id = isset($_SESSION['userid']) ? $_SESSION['userid']:null;
    $created_at = date('Y-m-d H:i:s');
    $insert = $db->query("INSERT INTO phtv_blog_comment SET blog_id = '$blog_id', name = '$comment_name', email = '$comment_email', comment = '$comment', user_id = '$user_id', created_at = '$created_at'");
    if($insert){
        $output['success'] = "success";
        $output['message'] = "Comment Added Successfully";
    } else {
        $output['success'] = "fail";
        $output['message'] = "Comment not Added. please try again later";
    }
    echo json_encode($output);
 ?>