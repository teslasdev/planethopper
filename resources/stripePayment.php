<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    require_once('../vendor/autoload.php');
    $response = array();
    $stripe = new \Stripe\StripeClient(
        'sk_test_51KWifMHxLeXMwQtEpsySca5raIRTopQ9CKacQD6o99nR3BFs290ewjtd6cFhyFyVvYV7VGQAhR76w1zxAliV4Tjw00x0sAlqjY'
    );
    $user_id = $_SESSION['userid'];
    $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
    $feuser = $user->fetch();
    $coin_balance = $feuser['coin_balance'];
    
    try {
        $stripe_token = $stripe->tokens->create([
            'card' => [
                'number' => $_REQUEST['cardnumber'],
                'exp_month' => $_REQUEST['month'],
                'exp_year' => $_REQUEST['year'],
                'cvc' => $_REQUEST['cvv'],
            ],
        ]);
        $token = $stripe_token->id;
        $total_paid_amount = number_format($_REQUEST['total_paid_amount'], 0);
        $payment = $stripe->charges->create([
            'amount' => $total_paid_amount,
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Payment for the shopping',
            'receipt_email' => $_REQUEST['email']
        ]);
        $total_amount =  $total_paid_amount + $_REQUEST['total_coin_used'];
        $invoice_no = date('Ymdhis').rand(1111, 9999);
        $full_name = $_REQUEST['full_name'];
        $email = $_REQUEST['email'];
        $address_street = $_REQUEST['address'];
        $address_city = $_REQUEST['city'];
        $address_state = $_REQUEST['state'];
        $address_zip = $_REQUEST['zipcode'];
        $txn_id = $payment['balance_transaction'];
        $item_number = $_REQUEST['total_qty'];
        $payment_status = $payment['status'];
        $order = $db->query("INSERT INTO phtv_product_order SET invoice_no = '$invoice_no', user_id = '$user_id', full_name = '$full_name', email = '$email', address ='$address_street', city = '$address_city', zip = '$address_zip', state = '$address_state', payment_type = 'Stripe', transaction_id = '$txn_id', total_amount = '$total_paid_amount', total_product = '$item_number', total_used_coin = '".$_REQUEST['total_coin_used']."', final_amount = '$total_amount', status = 0");
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
            
            $response['success'] = 'success';
            $response['message'] = 'Order Place successfully';
        } else {
            $response['success'] = 'fail';
            $response['message'] = 'Something want wrong. Please try again later';
        }
    } catch (\Stripe\Exception\CardException $e){
        $response['success'] = 'fail';
        $response['message'] = 'Invalid Card Details';
    } catch (\Stripe\Exception\RateLimitException $e){
        $response['success'] = 'fail';
        $response['message'] = 'Too many requests made to the API too quickly';
    } catch (\Stripe\Exception\InvalidRequestException $e){
        $response['success'] = 'fail';
        $response['message'] = 'invalid Parameters';
    } catch (\Stripe\Exception\AuthenticationException $e) {
        $response['success'] = 'fail';
        $response['message'] = 'Authentication with Stripe API failed';
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        $response['success'] = 'fail';
        $response['message'] = 'Network communication with Stripe failed';
    } catch (\Stripe\Exception\ApiErrorException $e) {
        $response['success'] = 'fail';
        $response['message'] = 'Display a very generic error to the user, and maybe send';
    } catch (Exception $e) {
        $response['success'] = 'fail';
        $response['message'] = 'Something else happened, completely unrelated to Stripe';
    }
    echo json_encode($response);
?>