<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    include '../inc/libraries/stripe/init.php';

    $publishable_key     = STRIPE_PUBLISHABLE_KEY;
    $secret_key            = STRIPE_API_KEY;
    if(isset($_REQUEST['stripeToken'])){
        Stripe::setApiKey($secret_key);
        $description     = "Invoice #".rand(99999,999999999);
        $amount_cents     = 100;
        $tokenid        = $_REQUEST['stripeToken'];
        try {
            $charge         = Stripe_Charge::create(array( 
                "amount"         => $amount_cents,
                "currency"         => "usd",
                "source"         => $tokenid,
                "description"     => $description)              
            ); 
            $id            = $charge['id'];
            $amount     = $charge['amount'];
            $balance_transaction = $charge['balance_transaction'];
            $currency     = $charge['currency'];
            $status     = $charge['status'];
            $date     = date("Y-m-d H:i:s");
                
            $result = "succeeded";
            print_r($result);
            die;
            /* You can save the above response in DB */
        // header("location:index.php?id=".$id);
        // exit;
        }catch(Stripe_CardError $e) {            
            $error = $e->getMessage();
            $result = "declined";
        }
    }
    
?>