<?php
    include('header.php');
    $apply_coin = "false";
    if(isset($_REQUEST['applycoin']) && !empty($_REQUEST['applycoin'])){
        $apply_coin = $_REQUEST['applycoin'];
    }
    $feuser = array();
    $coin_balance = 0;
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
        $system_user_id = $_SESSION['system_user_id'];
        $cart = $db->query("SELECT sum(total_amount) as cart_total_amount, sum(total_coin_amount) as total_coin_amount, sum(qty) as total_qty FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
        $fecart = $cart->fetch(PDO::FETCH_ASSOC);
    } else {
        $user_id = $_SESSION['userid'];
        $cart = $db->query("SELECT sum(total_amount) as cart_total_amount, sum(total_coin_amount) as total_coin_amount, sum(qty) as total_qty FROM phtv_product_cart WHERE user_id = '$user_id'");
        $fecart = $cart->fetch(PDO::FETCH_ASSOC);
        $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
        $feuser = $user->fetch();
        $coin_balance = $feuser['coin_balance'];
    }
    $total_amount = $fecart['cart_total_amount'];
    $total_coin_amount = $fecart['total_coin_amount'];
    $total_main = $total_amount - $total_coin_amount;
    $total_paid_amount = $fecart['cart_total_amount'];
    $total_coin_used = 0;
    if($coin_balance >= $total_main && $apply_coin == 'true'){
        $total_paid_amount = $total_paid_amount - $total_main;
        $total_coin_used = $total_main;
    } elseif ($coin_balance > 0 && $apply_coin == 'true') {
        $total_paid_amount = $total_paid_amount - $coin_balance;
        $total_coin_used = $coin_balance;
    }
    $total_paid_amount = number_format($total_paid_amount, 2);
    $total_coin_used = number_format($total_coin_used,2);
    $_SESSION['total_coin_used'] = $total_coin_used;
?>

<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> Checkout </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    personal digital assistants.
                    Facebook and Microsoft announced major investments into conversational.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_shopping_cart_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ss_shopping_box">
                    <div class="ss_complated">
                        <a href="#"> <img src="images/shopping.svg" alt="images"> Completed </a>
                    </div>
                    <div class="ss_shopping_process">
                        <div class="d-flex bd-highlight justify-content-center">
                            <div class="p-2  bd-highlight align-self-center ">
                                <a href="shopping-cart" class="ss_Shopping_boxi">
                                    Shopping Cart
                                    <div class="boxiA">1</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="checkout" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center active">
                                <a href="checkout" class="ss_Shopping_boxi">
                                    Checkout
                                    <div class="boxiA">2</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="completed" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center">
                                <a href="completed" class="ss_Shopping_boxi">
                                    Completed
                                    <div class="boxiA">3</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_checkout_sections">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <div class="ss_checkoutss">
                        <div class=" d-flex bd-highlight ">
                            <div class=" mr-auto  bd-highlight ">
                                <h2>Information</h2>
                            </div>
                            <?php
                                if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
                            ?>
                            <div class=" bd-highlight ">
                                <h3>Returning User? <a href="login"> Log In here </a></h3>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Full Name </label>
                                <input type="text" name="main_full_name" id="main_full_name" class="form-control"
                                    value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>"
                                    placeholder="Please Enter Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Email </label>
                                <input type="email" id="main_email" name="email"
                                    value="<?= isset($feuser['email']) ? $feuser['email'] :'' ?>" class="form-control"
                                    placeholder="Please Enter email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> mobile number </label>
                                <input type="text" id="main_mobile" name="mobile"
                                    value="<?= isset($feuser['mobile']) ? $feuser['mobile'] :'' ?>" class="form-control"
                                    placeholder="Please Enter mobile number">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> address </label>
                                <input type="text" id="main_address" name="address" class="form-control"
                                    placeholder="Please Enter address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> City </label>
                                <input type="text" id="main_city" name="city" class="form-control"
                                    placeholder="Please Enter City" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> State </label>
                                <input type="text" id="main_state" name="state" class="form-control"
                                    placeholder="Please Enter State" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Zip Code </label>
                                <input type="text" id="main_zipcode" name="zipcode" class="form-control"
                                    placeholder="Please Enter Zip Code" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <div class="ss_checkoutss">
                        <div class=" d-flex bd-highlight ">
                            <div class=" mr-auto  bd-highlight ">
                                <h2>Payment Method</h2>
                            </div>
                        </div>
                    </div>
                    <nav class="pt-4 ss_credit_card_tabs">
                        <div class="nav  " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/Credit_Card.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Credit Card </h6>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">

                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/icons8-paypal.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Paypal </h6>
                                    </div>
                                </div>

                            </a>
                            <a class="nav-item nav-link" id="nav-stripe-tab" data-toggle="tab" href="#nav-stripe"
                                role="tab" aria-controls="nav-stripe" aria-selected="false">

                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/icons8-cash-app.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Stripe </h6>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="row py-4">
                                <div class="col-lg-12">
                                    <div class="form-group ss_informationss">
                                        <label> Card Number </label>
                                        <input type="text" class="form-control" value="2525 8565 8565"
                                            placeholder="Please Enter Card Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> CVV </label>
                                        <input type="password" class="form-control" value="526"
                                            placeholder="Please Enter CVV">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> expiry date </label>
                                        <input type="text" class="form-control" value="12-12-2021"
                                            placeholder="Please Enter expiry date">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ss_place_order"> Place Order</button>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!-- <div class="row py-4">
                                <div class="col-lg-12">
                                    <div class="form-group ss_informationss">
                                        <label> Card Number </label>
                                        <input type="text" class="form-control" value="2525 8565 8565"
                                            placeholder="Please Enter Card Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> CVV </label>
                                        <input type="password" class="form-control" value="526"
                                            placeholder="Please Enter CVV">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> expiry date </label>
                                        <input type="text" class="form-control" value="12-12-2021"
                                            placeholder="Please Enter expiry date">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ss_place_order"> Place Order</button> -->
                            <div class="row py-4">
                                <div class="col-lg-12 text-center">
                                    <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                        <input type="hidden" name="first_name"
                                            value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>">
                                        <input type="hidden" name="last_name"
                                            value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>">
                                        <input type="hidden" name="email"
                                            value="<?= isset($feuser['email']) ? $feuser['email'] :'' ?>">
                                        <input type="hidden" name="night_phone_a"
                                            value="<?= isset($feuser['mobile']) ? $feuser['mobile'] :'' ?>">
                                        <input type="hidden" name="discount_amount_cart" id="discount_amount_cart"
                                            value="<?= $total_coin_used ?>">
                                        <input type="hidden" name="address1" id="paypal_address" value="">
                                        <input type="hidden" name="city" id="paypal_city" value="">
                                        <input type="hidden" name="state" id="paypal_state" value="">
                                        <input type="hidden" name="zip" id="paypal_zipcode" value="">
                                        <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" id="item_name" name="item_name" value="test">
                                        <input type="hidden" id="item_number" name="item_number"
                                            value="<?= $fecart['total_qty'] ?>">
                                        <input type="hidden" id="total_amount_paypal" name="amount"
                                            value="<?= $total_paid_amount ?>">
                                        <input type="hidden" name="rm" value="2">
                                        <input type="hidden" name="currency_code"
                                            value="<?php echo PAYPAL_CURRENCY; ?>">
                                        <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                        <input type="hidden" name="cancel_return"
                                            value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                        <button type="image" name="submit" class="btn btn-warning"><img
                                                src="images/download.svg"></button>
                                    </form>
                                    <!-- <div id="paypal-button"></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-stripe" role="tabpanel" aria-labelledby="nav-stripe-tab">
                            <form name="cardpayment" id="payment-form">
                                <div class="row py-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ss_informationss">
                                            <label> Card Number </label>
                                            <input type="text" name="cardnumber" id="card" maxlength="16" required
                                                class="form-input form-control" placeholder="Please Enter Card Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ss_informationss">
                                            <label> CVV </label>
                                            <input type="text" name="cvv" id="cvv" class="form-input2 form-control"
                                                placeholder="Please Enter CVV" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ss_informationss">
                                            <label> expiry date </label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-input2 form-control" name="month"
                                                        id="month" placeholder="MM">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="year" id="year"
                                                        class="form-input2 form-control" placeholder="YYYY" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="payment-errors"></div>
                                    </div>
                                </div>
                                <button type="submit" value="stripe" name="payment_type" class="ss_place_order"
                                    id="makePayment"> Place
                                    Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise">
                    <h2>Add Banner</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
<script src="js/jquery.creditCardValidator.js"></script>
<script>
$("#main_address").keyup(function() {
    var main_address = $(this).val();
    $('#paypal_address').val(main_address);
});
$("#main_city").keyup(function() {
    var main_city = $(this).val();
    $('#paypal_city').val(main_city);
});
$("#main_state").keyup(function() {
    var main_state = $(this).val();
    $('#paypal_state').val(main_state);
});
$("#main_zipcode").keyup(function() {
    var main_zipcode = $(this).val();
    $('#paypal_zipcode').val(main_zipcode);
});
</script>
<script>
function cardFormValidate() {
    var cardValid = 0;

    //card number validation
    $('#card').validateCreditCard(function(result) {
        if (result.valid) {
            $("#card").removeClass('required');
            cardValid = 1;
        } else {
            $("#card").addClass('required');
            cardValid = 0;
        }
    });

    //card details validation
    var expMonth = $("#month").val();
    var expYear = $("#year").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    if (cardValid == 0) {
        $("#card").addClass('required');
        $("#card").focus();
        return false;
    } else if (!regCVV.test(cvv)) {
        $("#card").removeClass('required');
        $("#month").removeClass('required');
        $("#year").removeClass('required');
        $("#cvv").addClass('required');
        $("#cvv").focus();
        return false;
    } else if (!regMonth.test(expMonth)) {
        $("#card").removeClass('required');
        $("#month").addClass('required');
        $("#month").focus();
        return false;
    } else if (!regYear.test(expYear)) {
        $("#card").removeClass('required');
        $("#month").removeClass('required');
        $("#year").addClass('required');
        $("#year").focus();
        return false;
    } else {
        $("#card").removeClass('required');
        $("#month").removeClass('required');
        $("#year").removeClass('required');
        $("#cvv").removeClass('required');
        return true;
    }
}
$(document).ready(function() {
    $('#payment-form input[type=text]').on('keyup', function() {
        cardFormValidate();
    });
    $("#payment-form").submit(function(event) {
        event.preventDefault();
        var main_full_name = $('#main_full_name').val();
        var main_email = $('#main_email').val();
        var main_mobile = $('#main_mobile').val();
        var main_address = $('#main_address').val();
        var main_city = $('#main_city').val();
        var main_state = $('#main_state').val();
        var main_zipcode = $('#main_zipcode').val();
        var applycoin = "<?= isset($_REQUEST['applycoin']) ? $_REQUEST['applycoin']:'false' ?>";
        var total_paid_amount = "<?= $total_paid_amount ?>";
        var total_coin_used = "<?= $total_coin_used ?>";
        var total_qty = "<?= $fecart['total_qty'] ?>";
        if (main_full_name == '') {
            toastr.warning("Please enter full name").delay(1000).fadeOut(
                1000);
        } else if (main_email == '') {
            toastr.warning("Please enter email address").delay(1000).fadeOut(
                1000);
        } else if (main_mobile == '') {
            toastr.warning("Please enter mobile number").delay(1000).fadeOut(
                1000);
        } else if (main_address == '') {
            toastr.warning("Please enter address").delay(1000).fadeOut(
                1000);
        } else if (main_city == '') {
            toastr.warning("Please enter city").delay(1000).fadeOut(
                1000);
        } else if (main_state == '') {
            toastr.warning("Please enter state").delay(1000).fadeOut(
                1000);
        } else if (main_zipcode == '') {
            toastr.warning("Please enter zip code").delay(1000).fadeOut(
                1000);
        } else {
            $("#preloder").fadeIn();
            var formData = new FormData(this);
            formData.append("full_name", main_full_name);
            formData.append("email", main_email);
            formData.append("mobile", main_mobile);
            formData.append("address", main_address);
            formData.append("city", main_city);
            formData.append("state", main_state);
            formData.append("zipcode", main_zipcode);
            formData.append("applycoin", applycoin);
            formData.append("total_paid_amount", total_paid_amount);
            formData.append("total_coin_used", total_coin_used);
            formData.append("total_qty", total_qty);
            $.ajax({
                url: 'resources/stripePayment',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(output) {
                    $("#preloder").fadeOut();
                    var response = JSON.parse(output);
                    if (response.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'completed';
                        }
                        toastr.success(response.message).delay(1000).fadeOut(
                            1000);
                    } else {
                        toastr.warning(response.message).delay(1000).fadeOut(
                            1000);
                    }
                },
                error: function() {
                    $("#preloder").fadeOut();
                    toastr.warning('Something want wrong. Please try again later')
                        .delay(1000)
                        .fadeOut(1000);
                }
            });

            return false;
        }
    });
});
</script>
</body>

</html>