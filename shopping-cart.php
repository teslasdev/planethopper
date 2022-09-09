<?php
    include('header.php');
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
        $user_id = $_SESSION['userid'];
        $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
        $feuser = $user->fetch();
        $coin_balance = $feuser['coin_balance'];
        $cart = $db->query("SELECT a.*, a.id as cart_id, b.*, c.color_name,d.size_name,e.image FROM phtv_product_cart a, phtv_product b, phtv_product_color c, phtv_product_size d, phtv_product_images = e WHERE a.product_id = b.id AND a.color_id = c.id AND a.size_id = d.id AND a.product_id = e.product_id AND a.user_id = '$user_id' GROUP BY a.id");
    } else {
        if(!isset($_SESSION['system_user_id']) && empty($_SESSION['system_user_id'])){
            $_SESSION['system_user_id'] = uniqid();
            $coin_balance = 0;
            $system_user_id = $_SESSION['system_user_id'];
            $cart = $db->query("SELECT a.*, a.id as cart_id, b.*, c.color_name,d.size_name,e.image FROM phtv_product_cart a, phtv_product b, phtv_product_color c, phtv_product_size d, phtv_product_images = e WHERE a.product_id = b.id AND a.color_id = c.id AND a.size_id = d.id AND a.product_id = e.product_id AND a.system_user_id = '$system_user_id' GROUP BY a.id");
        } else {
            $system_user_id = $_SESSION['system_user_id'];
            $cart = $db->query("SELECT a.*, a.id as cart_id, b.*, c.color_name,d.size_name,e.image FROM phtv_product_cart a, phtv_product b, phtv_product_color c, phtv_product_size d, phtv_product_images = e WHERE a.product_id = b.id AND a.color_id = c.id AND a.size_id = d.id AND a.product_id = e.product_id AND a.system_user_id = '$system_user_id' GROUP BY a.id");
        }
    }
    
?>

<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> Shopping Cart </h2>
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
                            <div class="p-2  bd-highlight align-self-center active">
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
                            <div class="p-2  bd-highlight align-self-center">
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
<div class="container-fluid ss_products_slidem ">
    <div class="container">
        <div class="row  order-wrapper-bottom">
            <div class="col-lg-8">
                <div class="ss_shopping_order">
                    <ul>
                        <li>
                            <div class="ss_main_order_h">
                                <h2> Order Summary </h2>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight pay_using_coin">
                                <div class="p-2 flex-grow-1 bd-highlight align-self-center">
                                    <div class="ss_coin_manages">
                                        <h2> Pay Using SuperCoins </h2>
                                        <div class="d-flex flex-row bd-highlight ">
                                            <div class="bd-highlight">
                                                <h4> Balance : </h4>
                                            </div>
                                            <div class="bd-highlight">
                                                <img src="images/coin.svg" alt="images" />
                                                <span> <?= isset($feuser['coin_balance']) ? $feuser['coin_balance']:0 ?>
                                                </span>
                                            </div>
                                        </div>
                                        <p> Save $<?= isset($feuser['coin_balance']) ? $feuser['coin_balance']:0 ?>
                                            Using <?= isset($feuser['coin_balance']) ? $feuser['coin_balance']:0 ?>
                                            SuperCoins </p>
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center">
                                    <button type="button" id="apply_savings" class="ss_apply"> Apply </button>
                                </div>
                            </div>
                        </li>
                        <?php 
                            $total_amount = 0;
                            $total_quentity = 0;
                            $total_save = 0;
                            while($fecart = $cart->fetch()){ 
                                $image = ($fecart['image'] != '') ? 'images/product/'.$fecart['image']:'images/product-imagesE.png';
                                $main_price = $fecart['total_amount'] - $fecart['total_coin_amount'];
                                $total_amount = $total_amount + $fecart['total_amount'];
                                $total_quentity = $total_quentity + $fecart['qty'];
                                if($coin_balance >= $main_price){
                                    $total_save = $total_save + $main_price;
                                    $coin_balance = $coin_balance - $main_price;
                                    $price = $fecart['total_coin_amount'];
                                    $show_coin = $main_price;
                                } else {
                                    $price = $fecart['total_amount'];
                                    $show_coin = 0;
                                }
                        ?>
                        <li id="remove_cart_<?= $fecart['cart_id'] ?>">
                            <div class="d-flex bd-highlight ss_order_flexx">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_order_products_images">
                                        <img src="<?= $image ?>" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_order_products_des">
                                        <h2> <?= $fecart['name'] ?> </h2>
                                        <p><?= $fecart['description'] ?></p>
                                        <h4> Size : <span> <?= $fecart['size_name'] ?> </span></h4>
                                        <div class="ss_quantity">
                                            <h3>Quantity : <span> <?= $fecart['qty'] ?> </span> </h3>
                                        </div>
                                        <div class="d-flex bd-highlight ">
                                            <div class=" bd-highlight align-self-center">
                                                <h3> $<?= $fecart['total_amount'] ?> </h3>
                                            </div>
                                            <div class=" px-3 bd-highlight align-self-center ss_coin_prices">
                                                <p> Or Pay $<?= $price ?> <span>+</span> <img src="images/coin.svg"
                                                        alt="images">
                                                    <?= $show_coin ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center remove-cart">
                                    <button type="button" class="btn btn-danger remove-from-cart"
                                        id="<?= $fecart['cart_id'] ?>"> X </button>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- <li>
                            <div class="d-flex bd-highlight ss_order_flexx">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_order_products_images">
                                        <img src="images/product-imagesA.png" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_order_products_des">
                                        <h2> Cuffed Beanie Planet Hopper TV s</h2>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias </p>
                                        <h4> Size : <span> XS </span></h4>
                                        <div class="ss_quantity">
                                            <h3>Quantity : <span> 15 </span> </h3>
                                        </div>
                                        <div class="d-flex bd-highlight ">
                                            <div class=" bd-highlight align-self-center">
                                                <h3> $526 </h3>
                                            </div>
                                            <div class=" px-3 bd-highlight align-self-center ss_coin_prices">
                                                <p> Or Pay $506 <span>+</span> <img src="images/coin.svg" alt="images">
                                                    20 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_order_flexx">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_order_products_images">
                                        <img src="images/product-imagesB.png" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_order_products_des">
                                        <h2> Cuffed Beanie Planet Hopper TV </h2>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias </p>
                                        <h4> Size : <span> XS </span></h4>
                                        <div class="ss_quantity">
                                            <h3>Quantity : <span> 15 </span> </h3>
                                        </div>
                                        <div class="d-flex bd-highlight ">
                                            <div class=" bd-highlight align-self-center">
                                                <h3> $526 </h3>
                                            </div>
                                            <div class=" px-3 bd-highlight align-self-center ss_coin_prices">
                                                <p> Or Pay $506 <span>+</span> <img src="images/coin.svg" alt="images">
                                                    20 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_order_flexx">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_order_products_images">
                                        <img src="images/product-imagesC.png" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_order_products_des">
                                        <h2> Cuffed Beanie Planet Hopper TV </h2>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias </p>
                                        <h4> Size : <span> XS </span></h4>
                                        <div class="ss_quantity">
                                            <h3>Quantity : <span> 15 </span> </h3>
                                        </div>
                                        <div class="d-flex bd-highlight ">
                                            <div class=" bd-highlight align-self-center">
                                                <h3> $526 </h3>
                                            </div>
                                            <div class=" px-3 bd-highlight align-self-center ss_coin_prices">
                                                <p> Or Pay $506 <span>+</span> <img src="images/coin.svg" alt="images">
                                                    20 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ss_mian_summery">
                    <ul>
                        <li>
                            <h2> price details </h2>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_price_order ">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3 id="total_quentity">Price (<?= $total_quentity ?> items)</h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h4 id="total_amount_data"> $<?= $total_amount ?> </h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_price_order ">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3>Buy more & Save more</h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h4 id="total_save_data"> - $0 </h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_price_order ">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3> Shipping </h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h4> Free shipping </h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight ss_price_order ">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3> order total </h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h4 id="main_amount_data"> $<?= $total_amount ?> </h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ss_save_order py-4">


                    <div class="d-flex bd-highlight">
                        <div class=" flex-grow-1 bd-highlight text-left">
                            <p class="" id="save_text"> You will save $0 on this order </p>
                        </div>
                        <div class=" bd-highlight">
                            <a href="checkout?applycoin=false" id="apply_count_checkout" class="ss_apply">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="container-fluid ">
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

        <script>
        $('.add').click(function() {
            if ($(this).prev().val() < 3) {
                $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.sub').click(function() {
            if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
            }
        });
        $('#apply_savings').click(function() {
            var total_amount = parseFloat("<?= $total_amount ?>");
            var main_amount = total_amount;
            var total_save = parseFloat("<?= $total_save ?>");
            var total_quentity = "<?= $total_quentity ?>";
            total_amount = total_amount - total_save;
            $('#total_amount_data').html("$" + main_amount.toFixed(2));
            $('#total_save_data').html("$" + total_save.toFixed(2));
            $('#main_amount_data').html("$" + total_amount.toFixed(2));
            $('#save_text').html("You will save $" + total_save + " on this order");
            $('#total_quentity').html("Price (" + total_quentity + " items)");
            $('#apply_count_checkout').attr('href', 'checkout?applycoin=true');
        });
        </script>
        <script>
        $(document).ready(function() {
            $(document).on('click', '.remove-from-cart', function() {
                var cart_id = $(this).attr('id');
                $.ajax({
                    url: "resources/remove_to_cart_product",
                    method: "POST",
                    data: {
                        cart_id: cart_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'shopping-cart';
                            }
                            toastr.success(data.message).delay(1000).fadeOut(1000);
                        } else {
                            toastr.warning(data.message).delay(1000).fadeOut(1000);
                        }
                    }
                })
            });
        });
        </script>
        </body>

        </html>