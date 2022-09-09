<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    $response = array();
    $episode_id = $_REQUEST['episode_id'];
    $episode = $db->query("SELECT * FROM phtv_voltage_episode WHERE id = '$episode_id'");
    $feepisode = $episode->fetch(PDO::FETCH_ASSOC);
    $likes = $feepisode['likes'];
    $dislike = $feepisode['dislike'];
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
        if(!isset($_SESSION['system_user_id']) && empty($_SESSION['system_user_id'])){
            $_SESSION['system_user_id'] = uniqid();
        }
        $system_user_id = $_SESSION['system_user_id'];
        $check_already = $db->query("SELECT * FROM phtv_episode_likes WHERE system_user_id = '$system_user_id' AND episode_id = '$episode_id'");
        $check_desliked = $db->query("SELECT * FROM phtv_episode_unlike WHERE system_user_id = '$system_user_id' AND episode_id = '$episode_id'");
        if($check_desliked->rowCount() == 0){
            $insert = $db->query("INSERT into phtv_episode_unlike SET system_user_id = '$system_user_id', episode_id = '$episode_id'");
            $dislike = $dislike + 1;
            $update = $db->query("UPDATE phtv_voltage_episode SET dislike = '$dislike' WHERE id = '$episode_id'");
            if($check_already->rowCount() > 0){
                $likes = $likes - 1;
                $update = $db->query("UPDATE phtv_voltage_episode SET likes = '$likes' WHERE id = '$episode_id'");
                $delete = $db->query("DELETE FROM phtv_episode_likes WHERE system_user_id = '$system_user_id' AND episode_id = '$episode_id'");
            }
            if($insert){
                $response['success'] = 'success';
                $response['message'] = "Episode Disliked Successfully";
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
        $check_already = $db->query("SELECT * FROM phtv_episode_likes WHERE user_id = '$user_id' AND episode_id = '$episode_id'");
        $check_desliked = $db->query("SELECT * FROM phtv_episode_unlike WHERE user_id = '$user_id' AND episode_id = '$episode_id'");
        if($check_desliked->rowCount() == 0){
            $insert = $db->query("INSERT into phtv_episode_unlike SET user_id = '$user_id', episode_id = '$episode_id'");
            $dislike = $dislike + 1;
            $update = $db->query("UPDATE phtv_voltage_episode SET dislike = '$dislike' WHERE id = '$episode_id'");
            
            if($check_already->rowCount() > 0){
                $likes = $likes - 1;
                $update = $db->query("UPDATE phtv_voltage_episode SET likes = '$likes' WHERE id = '$episode_id'");
                $delete = $db->query("DELETE FROM phtv_episode_likes WHERE user_id = '$user_id' AND episode_id = '$episode_id'");
            }
            if($insert){
                $response['success'] = 'success';
                $response['message'] = "Episode Disliked Successfully";
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