<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
        if(!isset($_SESSION['system_user_id']) && empty($_SESSION['system_user_id'])){
            $_SESSION['system_user_id'] = uniqid();
        }
        $system_user_id = $_SESSION['system_user_id'];
        $product_id = $_REQUEST['product_id'];
        $product_color_id = $_REQUEST['product_color_id'];
        $product_size_id = $_REQUEST['product_size_id'];
        $product_quentity = $_REQUEST['product_quentity'];
        $user_id = $_SESSION['userid'];
        $check_cart = $db->query("SELECT * FROM phtv_product_cart WHERE product_id = '$product_id' AND system_user_id = '$system_user_id'");
        if($check_cart->rowCount() > 0){
            $fecart = $check_cart->fetch();
            $cart_id = $fecart['id'];
            $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
            $feproduct = $product->fetch();
            if($feproduct['stock'] >= $product_quentity){
                $product_price = $feproduct['price'];
                $product_coin_price = $feproduct['coin_price'];
                $total_amount = $product_price * $product_quentity;
                $total_coin_amount = $product_coin_price * $product_quentity;
                $update = $db->query("UPDATE phtv_product_cart SET qty = '$product_quentity', coin_amount = '$product_coin_price', amount = '$product_price', total_amount = '$total_amount', total_coin_amount = '$total_coin_amount' WHERE id = '$cart_id'");
                if($update){
                    $cart_items = 0;
                    if(!empty($_SESSION['userid'])){
                        $user_id = $_SESSION['userid'];
                        $cart = $db->query("SELECT * FROM phtv_product_cart WHERE user_id = '$user_id'");
                        $cart_items = $cart->rowCount();
                    } else {
                        if(isset($_SESSION['system_user_id']) && !empty($_SESSION['system_user_id'])){
                            $system_user_id = $_SESSION['system_user_id'];
                            $cart = $db->query("SELECT * FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
                            $cart_items = $cart->rowCount();
                        }
                    }
                    $success['success'] = "success";
                    $success['message'] = "Cart updated successfully";
                    $success['cart_count'] = $cart_items;
                } else {
                    $success['success'] = "fail";
                    $success['message'] = "Cart not updated. please try again later";
                }
            } else {
                $success['success'] = "fail";
                $success['message'] = "This product have ".$feproduct['stock']." quentity in stock.";
            }
        } else {
            $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
            $feproduct = $product->fetch();
            if($feproduct['stock'] >= $product_quentity){
                $product_price = $feproduct['price'];
                $total_amount = $product_price * $product_quentity;
                $product_coin_price = $feproduct['coin_price'];
                $total_coin_amount = $product_coin_price * $product_quentity;
                $update = $db->query("INSERT INTO phtv_product_cart SET product_id = '$product_id', system_user_id = '$system_user_id', color_id = '$product_color_id', size_id = '$product_size_id', qty = '$product_quentity', coin_amount = '$product_coin_price', amount = '$product_price', total_amount = '$total_amount', total_coin_amount = '$total_coin_amount'");
                if($update){
                    $cart_items = 0;
                    if(!empty($_SESSION['userid'])){
                        $user_id = $_SESSION['userid'];
                        $cart = $db->query("SELECT * FROM phtv_product_cart WHERE user_id = '$user_id'");
                        $cart_items = $cart->rowCount();
                    } else {
                        if(isset($_SESSION['system_user_id']) && !empty($_SESSION['system_user_id'])){
                            $system_user_id = $_SESSION['system_user_id'];
                            $cart = $db->query("SELECT * FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
                            $cart_items = $cart->rowCount();
                        }
                    }
                    $success['success'] = "success";
                    $success['message'] = "Add to cart successfully";
                    $success['cart_count'] = $cart_items;
                } else {
                    $success['success'] = "fail";
                    $success['message'] = "Add to cart not successfully. please try again later";
                }
            } else {
                $success['success'] = "fail";
                $success['message'] = "This product have ".$feproduct['stock']." quentity in stock.";
            }
        }
    } else {
        $product_id = $_REQUEST['product_id'];
        $product_color_id = $_REQUEST['product_color_id'];
        $product_size_id = $_REQUEST['product_size_id'];
        $product_quentity = $_REQUEST['product_quentity'];
        $user_id = $_SESSION['userid'];
        $check_cart = $db->query("SELECT * FROM phtv_product_cart WHERE product_id = '$product_id' AND user_id = '$user_id'");
        if($check_cart->rowCount() > 0){
            $fecart = $check_cart->fetch();
            $cart_id = $fecart['id'];
            $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
            $feproduct = $product->fetch();
            if($feproduct['stock'] >= $product_quentity){
                $product_price = $feproduct['price'];
                $product_coin_price = $feproduct['coin_price'];
                $total_amount = $product_price * $product_quentity;
                $total_coin_amount = $product_coin_price * $product_quentity;
                $update = $db->query("UPDATE phtv_product_cart SET qty = '$product_quentity', coin_amount = '$product_coin_price', amount = '$product_price', total_amount = '$total_amount', total_coin_amount = '$total_coin_amount' WHERE id = '$cart_id'");
                if($update){
                    $cart_items = 0;
                    if(!empty($_SESSION['userid'])){
                        $user_id = $_SESSION['userid'];
                        $cart = $db->query("SELECT * FROM phtv_product_cart WHERE user_id = '$user_id'");
                        $cart_items = $cart->rowCount();
                    } else {
                        if(isset($_SESSION['system_user_id']) && !empty($_SESSION['system_user_id'])){
                            $system_user_id = $_SESSION['system_user_id'];
                            $cart = $db->query("SELECT * FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
                            $cart_items = $cart->rowCount();
                        }
                    }
                    $success['success'] = "success";
                    $success['message'] = "Cart updated successfully";
                    $success['cart_count'] = $cart_items;
                } else {
                    $success['success'] = "fail";
                    $success['message'] = "Cart not updated. please try again later";
                }
            } else {
                $success['success'] = "fail";
                $success['message'] = "This product have ".$feproduct['stock']." quentity in stock.";
            }
        } else {
            $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
            $feproduct = $product->fetch();
            if($feproduct['stock'] >= $product_quentity){
                $product_price = $feproduct['price'];
                $total_amount = $product_price * $product_quentity;
                $product_coin_price = $feproduct['coin_price'];
                $total_coin_amount = $product_coin_price * $product_quentity;
                $update = $db->query("INSERT INTO phtv_product_cart SET product_id = '$product_id', user_id = '$user_id', color_id = '$product_color_id', size_id = '$product_size_id', qty = '$product_quentity', coin_amount = '$product_coin_price', amount = '$product_price', total_amount = '$total_amount', total_coin_amount = '$total_coin_amount'");
                if($update){
                    $cart_items = 0;
                    if(!empty($_SESSION['userid'])){
                        $user_id = $_SESSION['userid'];
                        $cart = $db->query("SELECT * FROM phtv_product_cart WHERE user_id = '$user_id'");
                        $cart_items = $cart->rowCount();
                    } else {
                        if(isset($_SESSION['system_user_id']) && !empty($_SESSION['system_user_id'])){
                            $system_user_id = $_SESSION['system_user_id'];
                            $cart = $db->query("SELECT * FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
                            $cart_items = $cart->rowCount();
                        }
                    }
                    $success['success'] = "success";
                    $success['message'] = "Add to cart successfully";
                    $success['cart_count'] = $cart_items;
                } else {
                    $success['success'] = "fail";
                    $success['message'] = "Add to cart not successfully. please try again later";
                }
            } else {
                $success['success'] = "fail";
                $success['message'] = "This product have ".$feproduct['stock']." quentity in stock.";
            }
        }
    }
    echo json_encode($success);
?>