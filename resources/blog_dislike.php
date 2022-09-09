<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    $response = array();
    $blog_id = $_REQUEST['blog_id'];
    $blog = $db->query("SELECT * FROM phtv_blog WHERE id = '$blog_id'");
    $feblog = $blog->fetch(PDO::FETCH_ASSOC);
    $likes = $feblog['likes'];
    $dislike = $feblog['dislikes'];
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
        if(!isset($_SESSION['system_user_id']) && empty($_SESSION['system_user_id'])){
            $_SESSION['system_user_id'] = uniqid();
        }
        $system_user_id = $_SESSION['system_user_id'];
        $check_already = $db->query("SELECT * FROM phtv_blog_likes WHERE system_user_id = '$system_user_id' AND blog_id = '$blog_id'");
        $check_desliked = $db->query("SELECT * FROM phtv_blog_unlike WHERE system_user_id = '$system_user_id' AND blog_id = '$blog_id'");
        if($check_desliked->rowCount() == 0){
            $insert = $db->query("INSERT into phtv_blog_unlike SET system_user_id = '$system_user_id', blog_id = '$blog_id'");
            $dislike = $dislike + 1;
            $update = $db->query("UPDATE phtv_blog SET dislikes = '$dislike' WHERE id = '$blog_id'");
            if($check_already->rowCount() > 0){
                $likes = $likes - 1;
                $update = $db->query("UPDATE phtv_blog SET likes = '$likes' WHERE id = '$blog_id'");
                $delete = $db->query("DELETE FROM phtv_blog_likes WHERE system_user_id = '$system_user_id' AND blog_id = '$blog_id'");
            }
            if($insert){
                $response['success'] = 'success';
                $response['message'] = "Blog Disliked Successfully";
                $response['likes'] = $likes;
                $response['dislike'] = $dislike;
            } else {
                $response['success'] = 'fail';
                $response['message'] = "Something want wrong. Please try again later";
            }
        } else {
            $response['success'] = 'fail';
            $response['message'] = "You already disliked";
        }
    } else {
        $user_id = $_SESSION['userid'];
        $check_already = $db->query("SELECT * FROM phtv_blog_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'");
        $check_desliked = $db->query("SELECT * FROM phtv_blog_unlike WHERE user_id = '$user_id' AND blog_id = '$blog_id'");
        if($check_desliked->rowCount() == 0){
            $insert = $db->query("INSERT into phtv_blog_unlike SET user_id = '$user_id', blog_id = '$blog_id'");
            $dislike = $dislike + 1;
            $update = $db->query("UPDATE phtv_blog SET dislikes = '$dislike' WHERE id = '$blog_id'");
            
            if($check_already->rowCount() > 0){
                $likes = $likes - 1;
                $update = $db->query("UPDATE phtv_blog SET likes = '$likes' WHERE id = '$blog_id'");
                $delete = $db->query("DELETE FROM phtv_blog_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'");
            }
            if($insert){
                $response['success'] = 'success';
                $response['message'] = "Blog Disliked Successfully";
                $response['likes'] = $likes;
                $response['dislike'] = $dislike;
            } else {
                $response['success'] = 'fail';
                $response['message'] = "Something want wrong. Please try again later";
            }
        } else {
            $response['success'] = 'fail';
            $response['message'] = "You already disliked";
        }
    }
    echo json_encode($response);
    die;
?>