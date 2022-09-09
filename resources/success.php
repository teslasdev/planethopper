<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    
    $response = $_REQUEST;
    
    if($response['payment_status'] == 'Completed'){
        $user_id = $_SESSION['userid'];
        $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
        $feuser = $user->fetch();
        $coin_balance = $feuser['coin_balance'];
        
        $total_coin_used = isset($_SESSION['total_coin_used']) ? $_SESSION['total_coin_used']:0;
        $payment_gross = $response['payment_gross'];
        $total_amount =  $payment_gross + $total_coin_used;
        $invoice_no = date('Ymdhis').rand(1111, 9999);
        $full_name = $response['address_name'];
        $email = $response['payer_email'];
        $address_street = $response['address_street'];
        $address_city = $response['address_city'];
        $address_state = $response['address_state'];
        $address_zip = $response['address_zip'];
        $txn_id = $response['txn_id'];
        $item_number = $response['item_number'];
        $payment_status = $response['payment_status'];
        $order = $db->query("INSERT INTO phtv_product_order SET invoice_no = '$invoice_no', user_id = '$user_id', full_name = '$full_name', email = '$email', address ='$address_street', city = '$address_city', zip = '$address_zip', state = '$address_state', payment_type = 'PayPal', transaction_id = '$txn_id', total_amount = '$payment_gross', total_product = '$item_number', total_used_coin = '$total_coin_used', final_amount = '$total_amount', status = 'Pending'");
        if($order){
            $order_id = $db->lastInsertId();
            $cart = $db->query("SELECT * FROM phtv_product_cart WHERE user_id = '$user_id'");
            while($fecart = $cart->fetch(PDO::FETCH_ASSOC)){
                $product_id = $fecart['product_id'];
                $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
                $feproduct = $product->fetch(PDO::FETCH_ASSOC);
                
                $main_price = $fecart['total_amount'] - $fecart['total_coin_amount'];
                $total_amount = $total_amount + $fecart['total_amount'];
                $total_quentity = $total_quentity + $fecart['qty'];
                if($coin_balance >= $main_price){
                    $total_save = $total_save + $main_price;
                    $coin_balance = $coin_balance - $main_price;
                    $price = $fecart['total_coin_amount'];
                    $show_coin = $main_price;
                    $order_item_insert = $db->query("INSERT INTO phtv_product_order_items SET order_id = '$order_id', product_id = '$product_id', amount = '".$fecart['coin_amount']."', qty = '".$fecart['qty']."', total_amount = '$price', color_id = '".$fecart['color_id']."', size_id = '".$fecart['size_id']."', couns_used = '$show_coin', is_preorder = '".$feproduct['is_preorder']."'");
                } else {
                    $price = $fecart['total_amount'];
                    $show_coin = 0;
                    $order_item_insert = $db->query("INSERT INTO phtv_product_order_items SET order_id = '$order_id', product_id = '$product_id', amount = '".$fecart['amount']."', qty = '".$fecart['qty']."', total_amount = '$price', color_id = '".$fecart['color_id']."', size_id = '".$fecart['size_id']."', couns_used = '$show_coin', is_preorder = '".$feproduct['is_preorder']."'");
                }
                $remaining_product = $feproduct['stock'] - $fecart['qty'];
                $update_product = $db->query("UPDATE phtv_product SET stock = '$remaining_product' WHERE id = '$product_id'");
            }
            $update_user_coin = $db->query("UPDATE phtv_users SET coin_balance = '$coin_balance' WHERE id ='$user_id'");
            $delete_cart = $db->query("DELETE FROM phtv_product_cart WHERE user_id = '$user_id'");
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Payment succesfully Updated');
                window.location.href='../completed.php';
                </script>");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Something want wrong');
                window.location.href='../shopping-cart.php';
                </script>");
        }
    } else {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Payment not succesfully. Please try again later');
                window.location.href='../shopping-cart.php';
                </script>");
    }
?>