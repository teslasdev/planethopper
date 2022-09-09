<?php
include('header.php');
include('profile-header.php');
$user_id = $_SESSION['userid'];
$order = $db->query("SELECT * FROM phtv_product_order WHERE user_id = '$user_id'");
?>
<div class="container-fluid ss_navbar_profiles_css">
    <div class="container">
        <div class="row">
            <div class=" col-12 col-lg-2 col-sm-3 ss_padding_0 ">
                <div class="nav flex-column nav-pills ss_profiles_navbar">
                    <a class="nav-link  " href="profile">My Profile</a>
                    <a class="nav-link " href="supercoin_balance">Payload Coin Balance</a>
                    <a class="nav-link" href="#">My Stash</a>
                    <a class="nav-link active" href="my-order">My Orders</a>
                    <a class="nav-link" href="message"> Messages </a>
                    <a class="nav-link" href="change-password">Change Password</a>
                </div>
            </div>
            <div class="col-12 col-lg-10 col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <?php 
                            if($order->rowCount() > 0){
                                while ($feorder = $order->fetch(PDO::FETCH_ASSOC)) {
                                    $images = $db->query("SELECT b.image FROM phtv_product_order_items a LEFT JOIN phtv_product_images b ON a.product_id = b.product_id WHERE a.order_id = '".$feorder['id']."' GROUP BY a.order_id LIMIT 0,1");
                                    $feimages = $images->fetch(PDO::FETCH_ASSOC);
                                    
                        ?>
                        <div class="ss_navbar_profiles_boxs ss_table_scroll">
                            <div class="d-flex bd-highlight ss_order_tables">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_profile_imges">
                                        <img src="images/product/<?= $feimages['image'] ?>" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    <div class="ss_profile_des">
                                        <h4> <a href="order-detail?id=<?= base64_encode($feorder['id']) ?>"><?= $feorder['invoice_no'] ?>
                                            </a></h4>
                                        <div class="d-flex bd-highlight ss_order_sub_details">
                                            <div class="  bd-highlight align-self-center"> Total Product : <span>
                                                    <?= $feorder['total_product'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $<?= $feorder['total_amount'] ?>
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
                        <?php } } else { ?>
                        <div class="ss_navbar_profiles_boxs ss_table_scroll">
                            <div class="d-flex bd-highlight ss_order_tables">
                                <div class="p-2 flex-fill bd-highlight align-self-center text-center">
                                    No Orders Available
                                </div>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal ss_subtotal_red">
                                        <h2> Cancelled on Sep 01, 2018 </h2>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal ss_subtotal_red">
                                        <h2>Refund completed </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="ss_refund_des">
                                <h3>Refund Completed <span>Refund ID: </span>
                                    <span>CR2201201243071298860807</span>
                                </h3>
                                <p> ₹499.0 has been refunded to your your account on Feb 01. PhonePe Wallet refunds will
                                    take 7 business days. </p>
                                <p>For any questions, please contact your bank with reference number 202418477484.</p>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal">
                                        <h2> Delivered on May 07, 2021 </h2>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal">
                                        <h2> Delivered on May 07, 2021 </h2>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal">
                                        <h2> Delivered on May 07, 2021 </h2>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal">
                                        <h2> Delivered on May 07, 2021 </h2>
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
                                <div class="p-2 flex-fill bd-highlight align-self-center">
                                    $49
                                </div>
                                <div class="p-2 flex-fill bd-highlight align-self-center ss_winth_controll">
                                    <div class="ss_subtotal">
                                        <h2> Delivered on May 07, 2021 </h2>
                                        <p class="ss_delivered_des"> Your item has been delivered </p>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> Rate & Review
                                            Product</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'my_order'");
    $fepages = $pages->fetch(PDO::FETCH_ASSOC);
    
    $banner = $db->query("SELECT * FROM phtv_banner WHERE page_id = '".$fepages['id']."' AND banner_type = 2");
    if($banner->rowCount() > 0){
    $febanner = $banner->fetch(PDO::FETCH_ASSOC);
        if ($febanner['link_type'] == 1) {
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise cc-banner-image-size">
                    <!-- <h2>Add Banner</h2> -->
                    <a href="<?= $febanner['link'] ?>" target="_Blank"><img
                            src="images/banner_image/<?= $febanner['image'] ?>" width="100%" alt="episodes" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise">
                    <a href="<?= $febanner['link'] ?>" target="_Blank">
                        <h2><?= $febanner['title'] ?></h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
} 
} else { ?>
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
<?php } ?>
<!-- <div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise">
                    <h2>Add Banner</h2>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?php
include('footer.php');
?>
</body>

</html>