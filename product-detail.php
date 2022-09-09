<?php
include('header.php');
if (!isset($_REQUEST['item'])) {
?>
<script>
window.location.href = "product.php";
</script>
<?php
}
$product_id = $_REQUEST['item'];
$product = $db->query("SELECT * FROM phtv_product WHERE id = '$product_id'");
$feproduct = $product->fetch();
$avarage = round($feproduct['avg_rating']);

$image = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '$product_id'");
$image1 = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '$product_id'");
$colors = $db->query("SELECT a.*, b.* FROM phtv_product_multi_color a, phtv_product_color b WHERE a.color_id = b.id AND a.product_id = '$product_id'");
$size = $db->query("SELECT a.*, b.* FROM phtv_product_multi_size a, phtv_product_size b WHERE a.size_id = b.id AND a.product_id = '$product_id'");
$review = $db->query("SELECT a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_users b ON a.user_id = b.id WHERE a.product_id = '$product_id'");

$fetured = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id WHERE b.id != '$product_id' GROUP BY a.product_id ORDER BY review_rate DESC");

?>
<div class="container-fluid ss_marketplace_details">
    <div class="container">
        <div class="ss_details_model">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <div id="wrap" class="my-5">
                        <div class="row">
                            <div class="col-12">
                                <!-- Carousel -->
                                <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                                    <div class="carousel-inner ss_border_pp">
                                        <?php
                                        $c = 0;
                                        while ($feimage = $image->fetch()) {
                                        ?>
                                        <div class="carousel-item <?= ($c == 0) ? 'active' : '' ?>"
                                            data-slide-number="<?= $c ?>" data-toggle="lightbox" data-gallery="gallery"
                                            data-remote="https://source.unsplash.com/vbNTwfO9we0/1600x900.jpg">
                                            <img src="images/product/<?= $feimage['image'] ?>" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <?php
                                            $c++;
                                        }
                                        ?>
                                        <!-- <div class="carousel-item" data-slide-number="1" data-toggle="lightbox"
                                            data-gallery="gallery"
                                            data-remote="https://source.unsplash.com/DEhwkPYevhE/1600x900.jpg">
                                            <img src="images/product-imagesB.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item" data-slide-number="2" data-toggle="lightbox"
                                            data-gallery="gallery"
                                            data-remote="https://source.unsplash.com/-RV5PjUDq9U/1600x900.jpg">
                                            <img src="images/product-imagesC.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item" data-slide-number="3" data-toggle="lightbox"
                                            data-gallery="gallery"
                                            data-remote="https://source.unsplash.com/sd0rPap7Uus/1600x900.jpg">
                                            <img src="images/product-imagesD.png" class="d-block w-100" alt="...">
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Carousel Navigatiom -->
                                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-slide-number="0">
                                            <div class="row mx-0 ss_item_productsp">
                                                <?php
                                                $d = 0;
                                                    while ($feimage1 = $image1->fetch()) {
                                                ?>
                                                <div id="carousel-selector-<?= $d ?>"
                                                    class="thumb col-3 px-1 py-2 <?= ($d == 0) ? 'selected' : '' ?>"
                                                    data-target="#carousel" data-slide-to="<?= $d ?>">
                                                    <div class="images">
                                                        <img src="images/product/<?= $feimage1['image'] ?>"
                                                            class="img-fluid" alt="...">
                                                    </div>
                                                </div>
                                                <?php
                                                    $d++;
                                                }
                                                ?>
                                                <!-- <div id="carousel-selector-1" class="thumb col-3 px-1 py-2"
                                                    data-target="#carousel" data-slide-to="1">
                                                    <div class="images">
                                                        <img src="images/product-imagesB.png" class="img-fluid"
                                                            alt="...">
                                                    </div>
                                                </div>
                                                <div id="carousel-selector-2" class="thumb col-3 px-1 py-2"
                                                    data-target="#carousel" data-slide-to="2">
                                                    <div class="images">
                                                        <img src="images/product-imagesC.png" class="img-fluid"
                                                            alt="...">
                                                    </div>
                                                </div>
                                                <div id="carousel-selector-3" class="thumb col-3 px-1 py-2"
                                                    data-target="#carousel" data-slide-to="3">
                                                    <div class="images">
                                                        <img src="images/product-imagesD.png" class="img-fluid"
                                                            alt="...">
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-thumbs" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-thumbs" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="ss_products_details">
                        <h2> <?= $feproduct['name'] ?> </h2>
                        <div class="d-flex bd-highlight mb-2 ">
                            <div class="p-2 bd-highlight align-self-center">
                                <div class="ss_rating">
                                    <?php 
                                        if($avarage == 5){
                                    ?>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php   
                                        } elseif ($avarage == 4) {
                                    ?>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php   
                                        } elseif ($avarage == 3) {
                                    ?>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php
                                        } elseif ($avarage == 2) {
                                    ?>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php
                                        } elseif ($avarage == 1) {
                                    ?>
                                    <a href="#" class="active"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="p-2 bd-highlight align-self-center">
                                <span><?= $review->rowCount() ?> Customer Review</span>
                            </div>
                        </div>
                        <h3> $ <?= $feproduct['price'] ?> </h3>
                        <p> <?= $feproduct['description'] ?> </p>
                        <div class="d-flex bd-highlight py-2  ">
                            <div class=" bd-highlight ss_color_select_title ">
                                <h5>SELECT COLOR</h5>
                            </div>
                            <div class="bd-highlight">
                                <div class="ss_select_color">
                                    <?php
                                    $a = 0;
                                    while ($fecolor = $colors->fetch()) {
                                    ?>
                                    <div>
                                        <input id="radio-<?= $fecolor['id'] ?>" class="radio-custom radioD"
                                            name="radio-group" value="<?=$fecolor['color_id'] ?>" type="radio"
                                            <?= ($a == 0) ? 'checked' : '' ?>>
                                        <label for="radio-<?= $fecolor['id'] ?>" class="radio-custom-label radioD-label"
                                            style="--product-colors: <?= $fecolor['color_code'] ?>;"></label>
                                    </div>
                                    <?php
                                        $a++;
                                    } ?>
                                    <!-- <div>
                                        <input id="radio-1" class="radio-custom radioA" name="radio-group" type="radio"
                                            checked>
                                        <label for="radio-1" class="radio-custom-label radioA-label "></label>
                                    </div> -->
                                    <!-- <div>
                                        <input id="radio-2" class="radio-custom radioB" name="radio-group" type="radio">
                                        <label for="radio-2" class="radio-custom-label radioB-label"></label>
                                    </div>
                                    <div>
                                        <input id="radio-3" class="radio-custom radioC" name="radio-group" type="radio">
                                        <label for="radio-3" class="radio-custom-label radioC-label"></label>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight py-2 pb-0">
                            <div class=" bd-highlight ss_color_select_title ">
                                <h5>Select Size</h5>
                            </div>
                            <div class="bd-highlight">
                                <div class="switch-field ss_select_size">
                                    <?php
                                    $b = 0;
                                    while ($fesize = $size->fetch()) {
                                    ?>
                                    <input type="radio" id="radio-size<?= $b ?>" value="<?= $fesize['size_id'] ?>"
                                        name="switch-one" value="yes" <?= ($b == 0) ? 'checked' : '' ?> />
                                    <label for="radio-size<?= $b ?>"><?= $fesize['size_name'] ?></label>
                                    <?php
                                        $b++;
                                    } ?>
                                    <!-- <input type="radio" id="radio-two" name="switch-one" value="no" />
                                    <label for="radio-two">S</label>
                                    <input type="radio" id="radio-three" name="switch-one" value="no" />
                                    <label for="radio-three">M</label>
                                    <input type="radio" id="radio-four" name="switch-one" value="no" />
                                    <label for="radio-four">L</label> -->
                                </div>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight py-2  ">
                            <div class=" bd-highlight ss_color_select_title ">
                                <h5>Availability</h5>
                            </div>
                            <div class="bd-highlight">
                                <?php if ($feproduct['stock'] > 0) { ?>
                                <p class="ss_stock">In stock</p>
                                <?php } else { ?>
                                <p class="ss_stock">Out Of stock</p>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="ss_liness"></div>
                        <div class="d-flex bd-highlight mb-3">
                            <div class="pr-2 bd-highlight">
                                <div class="input-group ss_input_add_sub ">
                                    <div class="input-group-prepend">
                                        <input type='button' value='-' class='minus' field='quantity' />
                                    </div>
                                    <input class="form-control qty" type="text" id="product_quentity" name="quantity"
                                        value='1' />
                                    <div class="input-group-append">
                                        <input type='button' value='+' class='plus' field='quantity' />
                                    </div>
                                </div>
                            </div>
                            <div class="pr-2 bd-highlight">
                                <div class="episode_button">
                                    <button type="button" id="add_to_cart"> ADD TO CART </button>
                                </div>
                            </div>
                            <div class="pr-2 bd-highlight">
                                <a href="#" class="ss_like_icons"> <img src="images/StashS_2x.png" alt="images" /> </a>
                            </div>
                        </div>
                        <div class="py-4 shar_ss_products">
                            <h4>Share this product to receive payload discount coins</h4>
                            <div class="ss_social_media_products">
                                <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_description">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs ss_des_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true"> Description </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Addtional info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Reviews (<?= $review->rowCount() ?>)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="py-2">
                            <div class="row">
                                <?= $feproduct['description'] ?>
                                <!-- <div class="col-lg-7">
                                    <div class="ss_sub_containss">
                                        <p>
                                            Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum
                                            vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet
                                            Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna.
                                            Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus
                                            placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia
                                            nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget
                                            posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis
                                            lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor
                                            sit amet.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="ss_features">
                                        <h2>SIZE & FIT</h2>
                                        <ul>
                                            <li>Our Model wears a UK 8/ EU 36/ Us 4</li>
                                            <li>Model is 170/ 5’7” Tall</li>
                                            <li> Shoulder seam to hem measures appox 58”/ 147 cm in lenght </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-3">
                                    <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula
                                        a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum
                                        imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna.</p>
                                    <p> Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus
                                        placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia
                                        nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed
                                        id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna,
                                        condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.
                                    </p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="ss_sub_containss">
                            <?= $feproduct['additional_info'] ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="review_listss">
                            <?php 
                                while($fereview = $review->fetch()){
                                    $user_img = ($fereview['image'] != '') ? 'images/users/'.$fereview['image']:'images/profilesA.jpg';
                            ?>
                            <div class="ss_profiles_box">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 bd-highlight align-self-center">
                                        <div class="ss_profile_imges">
                                            <img src="<?= $user_img ?>" alt="images">
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight align-self-center ">
                                        <div class="ss_profile_des">
                                            <h4><?= $fereview['full_name'] ?></h4>
                                            <p><?= $fereview['review'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- <div class="ss_profiles_box">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 bd-highlight align-self-center">
                                        <div class="ss_profile_imges">
                                            <img src="images/profilesA.jpg" alt="images">
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight align-self-center ">
                                        <div class="ss_profile_des">
                                            <h4>Dharshani Arumugam</h4>
                                            <p> expected thick cloth T-Shirt and got it. Looks nice and hope will last
                                                longer. I bought slightly a bigger size to have more comfort.</p>
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
<div class="container-fluid ss_mian_featured_padd">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">
                <div class="ss_best_products_des">
                    <h2>Featured Products </h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" id="ss_Featured_Products">
                    <?php while ($fefetured = $fetured->fetch()) {
                        $pimage = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $fefetured['product_id'] . "' LIMIT 1");
                        $fepimage = $pimage->fetch();
                    ?>
                    <div class="item">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <img src="images/product/<?= $fepimage['image'] ?>" alt="images">
                                <div class="ss_button">
                                    <a href="product-detail.php?item=<?= $fefetured['product_id'] ?>"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3><?= $fefetured['name'] ?></h3>
                                <p> $ <?= $fefetured['price'] ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="item">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <img src="images/product-imagesB.png" alt="images">
                                <div class="ss_button">
                                    <a href="#"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3>Cuffed Beanie Planet Hopper TV</h3>
                                <p> $ 42.00 </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <img src="images/product-imagesC.png" alt="images">
                                <div class="ss_button">
                                    <a href="#"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3>Cuffed Beanie Planet Hopper TV</h3>
                                <p> $ 42.00 </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <img src="images/product-imagesD.png" alt="images">
                                <div class="ss_button">
                                    <a href="#"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3>Cuffed Beanie Planet Hopper TV</h3>
                                <p> $ 42.00 </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <img src="images/product-imagesE.png" alt="images">
                                <div class="ss_button">
                                    <a href="#"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3>Cuffed Beanie Planet Hopper TV</h3>
                                <p> $ 42.00 </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'product_details'");
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
<script>
jQuery(document).ready(function() {
    // This button will increment the value
    $(".plus").click(function(e) {
        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If is not undefined
        if (!isNaN(currentVal) && currentVal < 20) {
            // Increment
            $(field).val(currentVal + 1);
        }

    });
    // This button will decrement the value till 0
    $(".minus").click(function(e) {
        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $(field).val(currentVal - 1);
        }

    });
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '#add_to_cart', function() {
        var product_id = "<?= $product_id ?>";
        var product_color_id = $('input[name="radio-group"]:checked').val();
        var product_size_id = $('input[name="switch-one"]:checked').val();
        var product_quentity = $('#product_quentity').val();
        var product_avail = "<?= $feproduct['stock'] ?>";
        if (product_quentity > product_avail) {
            toastr.warning("Available stock is " + product_avail).delay(1000).fadeOut(1000);
        } else {
            $.ajax({
                url: "resources/add_to_cart_product",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_color_id: product_color_id,
                    product_size_id: product_size_id,
                    product_quentity: product_quentity
                },
                dataType: "json",
                success: function(data) {
                    if (data.success == 'login') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'login';
                        }
                        toastr.warning(data.message).delay(1000).fadeOut(1000);
                    } else {
                        if (data.success == 'success') {
                            $("#lblCartCount").html(data.cart_count);
                            toastr.success(data.message).delay(1000).fadeOut(1000);
                        } else {
                            toastr.warning(data.message).delay(1000).fadeOut(1000);
                        }
                    }
                }
            })
        }
    });
});
</script>
</body>

</html>