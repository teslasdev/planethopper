<?php
include('header.php');
if(!isset($_REQUEST['id'])){
    header("location:my-order");
}
$order_id = base64_decode($_REQUEST['id']);
$order = $db->query("SELECT * FROM phtv_product_order WHERE id = '$order_id'");
$feorder = $order->fetch(PDO::FETCH_ASSOC);
$user = $db->query("SELECT * FROM phtv_users WHERE id = '".$feorder['user_id']."'")->fetch(PDO::FETCH_ASSOC);

$order_product = $db->query("SELECT * FROM phtv_product_order_items  WHERE order_id = '$order_id'");
?>
<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> Order Detail </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    personal digital assistants.
                    Facebook and Microsoft announced major investments into conversational.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_order_tracking">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <div class="d-flex bd-highlight ss_order_produvts_list">
                    <div class="ss_order-tracking_des">
                        <h2> Delivery Address </h2>
                        <p> <?= $feorder['full_name'] ?> </p>
                        <div class="py-3">
                            <p><?= $feorder['address'] ?>, <?= $feorder['city'] ?>, <?= $feorder['state'] ?>
                                <?= $feorder['zip'] ?> </p>
                            <p> Phone number : <span> <?= ($feorder['mobile']) ? $feorder['mobile']:$user['mobile'] ?>
                                </span></p>
                        </div>
                        <p> Payment Type : <span> <?= $feorder['payment_type'] ?> </span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 align-self-center">
                <div class="d-flex bd-highlight ss_order_produvts_list ss_media_padd">
                    <div class="ss_order-tracking_des">
                        <h2> Your Rewards </h2>
                        <div class="d-flex bd-highlight pt-3">
                            <div class="p-2  bd-highlight">
                                <div class="ss_coin_images">
                                    <img src="images/money.png" alt="images" />
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight ss_reward_points">
                                <h4>30 SuperCoins</h4>
                                <p> Go to the SuperCoin Zone to know more</p>
                            </div>
                        </div>


                        <div class="d-flex bd-highlight pt-3">
                            <div class="p-2 bd-highlight">
                                <div class="ss_coin_images">
                                    <img src="images/money.png" alt="images" />
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight ss_reward_points">
                                <h4>$50 Saved Using SuperCoins
                                </h4>
                                <p> 69 coins paid </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 align-self-center">
                <div class="ss_order-tracking_des ss_media_padd">
                    <h2> More actions </h2>
                    <div class="d-flex bd-highlight mb-3">
                        <div class=" bd-highlight align-self-center ">
                            <div class="ss_more_cation">
                                <img src="images/invoice.svg" alt="images" />
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center">
                            <p>Download Invoice</p>
                        </div>
                        <div class="ml-auto p-2 bd-highlight align-self-center">
                            <a href="admin/order-invoice" class="ss_dowload_invoces">
                                Download Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_tracking_progress_bar">
    <div class="container">
        <div class="row ss_main_tracking_track">
            <div class="col-lg-12 px-0">
                <h2>Order Tracking</h2>
            </div>
        </div>
        <div class="ss_progress_bar_order">
            <div class="d-flex bd-highlight ss_order_traking_bar">
                <?php if($feorder['status'] == 0){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 1){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Confirmed </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['confirm_date'])) ?> </p>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 2){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Confirmed </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['confirm_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Shipped </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['shipped_date'])) ?> </p>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 6){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Confirmed </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['confirm_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Shipped </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['shipped_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Out For Delivery </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['out_for_delivery_date'])) ?> </p>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 3){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Confirmed </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['confirm_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Shipped </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['shipped_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Out For Delivery </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['out_for_delivery_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Delivered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['delivered_date'])) ?> </p>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 4){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Confirmed </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['confirm_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Shipped </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['shipped_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Out For Delivery </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['out_for_delivery_date'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="d-flex bd-highlight">
                        <div class=" flex-grow-1 bd-highlight">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking"></div>
                                <h3> Delivered </h3>
                                <p> <?= (!empty($feorder['out_for_delivery_date'])) ? date('D, jS M Y', strtotime($feorder['delivered_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                        <div class=" bd-highlight ss_last_order_right">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking"></div>
                                <h3> Completed </h3>
                                <p> <?= (!empty($feorder['completed_date'])) ? date('D, jS M Y', strtotime($feorder['completed_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($feorder['status'] == 5){ ?>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="d-flex bd-highlight">
                        <div class=" flex-grow-1 bd-highlight">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking"></div>
                                <h3> Confirmed </h3>
                                <p> <?= (!empty($feorder['confirm_date'])) ? date('D, jS M Y', strtotime($feorder['confirm_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                        <div class=" bd-highlight ss_last_order_right">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking ss_line_tracking1"></div>
                                <h3> Cancelled </h3>
                                <p> <?= (!empty($feorder['cancelled_date'])) ? date('D, jS M Y', strtotime($feorder['cancelled_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--<div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Ordered </h3>
                        <p> <?= date('D, jS M Y', strtotime($feorder['created_at'])) ?> </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="ss_tracking_points">
                        <div class="ss_line_tracking"></div>
                        <h3> Shipped </h3>
                        <p> <?= (!empty($feorder['shipped_date'])) ? date('D, jS M Y', strtotime($feorder['shipped_date'])) :' - ' ?>
                        </p>
                    </div>
                </div>
                <div class=" flex-fill bd-highlight">
                    <div class="d-flex bd-highlight">
                        <div class=" flex-grow-1 bd-highlight">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking"></div>
                                <h3> Out For Delivery </h3>
                                <p> <?= (!empty($feorder['out_for_delivery_date'])) ? date('D, jS M Y', strtotime($feorder['out_for_delivery_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                        <div class=" bd-highlight ss_last_order_right">
                            <div class="ss_tracking_points">
                                <div class="ss_line_tracking"></div>
                                <h3> Delivered </h3>
                                <p> <?= (!empty($feorder['delivered_date'])) ? date('D, jS M Y', strtotime($feorder['delivered_date'])) :' - ' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="row ss_main_tracking_track pt-4">
            <div class="col-lg-12 px-0">
                <h2> Product </h2>
            </div>
        </div>
        <?php 
            while ($feorder_product = $order_product->fetch(PDO::FETCH_ASSOC)) { 
                $product_id = $feorder_product['product_id'];
                $product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
                $feproduct = $product->fetch(PDO::FETCH_ASSOC);

                $color = $db->query("SELECT * FROM phtv_product_color WHERE id = '".$feorder_product['color_id']."'");
                $fecolor = $color->fetch(PDO::FETCH_ASSOC);

                $size = $db->query("SELECT * FROM phtv_product_size WHERE id = '".$feorder_product['size_id']."'");
                $fesize = $size->fetch(PDO::FETCH_ASSOC);

                $image = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '$product_id' LIMIT 0,1");
                $feimage = $image->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="ss_navbar_profiles_boxs ss_table_scroll">
            <div class="d-flex bd-highlight ss_order_tables">
                <div class="p-2 bd-highlight align-self-center">
                    <div class="ss_profile_imges">
                        <img src="images/product/<?= $feimage['image'] ?>" alt="images">
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center">
                    <div class="ss_profile_des">
                        <h4> <?= $feproduct['name'] ?> </h4>
                        <div class="d-flex bd-highlight ss_order_sub_details">
                            <div class="  bd-highlight align-self-center"> Color : <span> <?= $fecolor['color_name'] ?>
                                </span>
                            </div>
                            <div class="px-2  bd-highlight align-self-center"> |</div>
                            <div class="  bd-highlight align-self-center">Size : <span> <?= $fesize['size_name'] ?>
                                </span></div>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_prices_coin">
                    <span> $<?= $feorder_product['total_amount'] ?> </span>
                    <span> + </span>
                    <span class="ss_money_heights"> <img src="images/money.png" alt="images">
                        <?= $feorder_product['couns_used'] ?> </span>
                </div>
                <?php if($feorder['status'] == 0){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Ordered on <?= date('M d, Y', strtotime($feorder['created_at'])) ?> </h2>
                        <p class="ss_delivered_des"> Your item has been ordered </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } else if($feorder['status'] == 1){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Confirmed on <?= date('M d, Y', strtotime($feorder['confirm_date'])) ?>
                        </h2>
                        <p class="ss_delivered_des"> Your item has been Confirmed </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } else if($feorder['status'] == 2){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Shipped on <?= date('M d, Y', strtotime($feorder['shipped_date'])) ?> </h2>
                        <p class="ss_delivered_des"> Your item has been Shipped </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } else if($feorder['status'] == 3){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Delivered on <?= date('M d, Y', strtotime($feorder['delivered_date'])) ?>
                        </h2>
                        <p class="ss_delivered_des"> Your item has been Delivered </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } else if($feorder['status'] == 5){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal ss_subtotal_red">
                        <h2> Cancelled on <?= date('M d, Y', strtotime($feorder['cancelled_date'])) ?>
                        </h2>
                    </div>
                </div>
                <?php } else if($feorder['status'] == 6){ ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Out For Delivery on
                            <?= date('M d, Y', strtotime($feorder['out_for_delivery_date'])) ?>
                        </h2>
                        <p class="ss_delivered_des"> Your item has been out for delivery </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } else { ?>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <h2> Completed on <?= date('M d, Y', strtotime($feorder['completed_date'])) ?>
                        </h2>
                        <p class="ss_delivered_des"> Your item has been Completed </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <!-- <div class="ss_navbar_profiles_boxs ss_table_scroll">
            <div class="d-flex bd-highlight ss_order_tables">
                <div class="p-2 bd-highlight align-self-center">
                    <div class="ss_profile_imges">
                        <img src="images/product-imagesB.png" alt="images">
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center">
                    <div class="ss_profile_des">
                        <h4> Cuffed Beanie Planet Hopper TV </h4>
                        <div class="d-flex bd-highlight ss_order_sub_details">
                            <div class="  bd-highlight align-self-center"> Color : <span> Blue </span>
                            </div>
                            <div class="px-2  bd-highlight align-self-center"> |</div>
                            <div class="  bd-highlight align-self-center">Size : <span> L </span></div>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_prices_coin">
                    <span>
                        $49
                    </span>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <p class="ss_delivered_des"> Your item has been delivered </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="ss_navbar_profiles_boxs ss_table_scroll">
            <div class="d-flex bd-highlight ss_order_tables">
                <div class="p-2 bd-highlight align-self-center">
                    <div class="ss_profile_imges">
                        <img src="images/product-imagesB.png" alt="images">
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center">
                    <div class="ss_profile_des">
                        <h4> Cuffed Beanie Planet Hopper TV </h4>
                        <div class="d-flex bd-highlight ss_order_sub_details">
                            <div class="  bd-highlight align-self-center"> Color : <span> Blue </span>
                            </div>
                            <div class="px-2  bd-highlight align-self-center"> |</div>
                            <div class="  bd-highlight align-self-center">Size : <span> L </span></div>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_prices_coin">
                    <span>
                        $49
                    </span>
                </div>
                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                    <div class="ss_subtotal">
                        <p class="ss_delivered_des"> Your item has been delivered </p>
                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                            Product</a>
                    </div>
                </div>
            </div>
        </div> -->


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
</body>

</html>