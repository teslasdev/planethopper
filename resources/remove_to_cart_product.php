<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    
    if(isset($_REQUEST['cart_id']) && !empty($_REQUEST['cart_id'])){
        $remove = $db->query("DELETE FROM phtv_product_cart WHERE id = '".$_REQUEST['cart_id']."'");
        if($remove){
            $success['success'] = "success";
            $success['message'] = "Cart item removed successfully";
        } else {
            $success['success'] = "fail";
            $success['message'] = "Something wants wrong. please try again later";
        }
    } else {
        $success['success'] = "fail";
        $success['message'] = "Something wants wrong. please try again later";
    }
    echo json_encode($success);
?>