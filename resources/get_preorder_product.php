<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];
$category_id = $_REQUEST['category_id'];
$brand_id = $_REQUEST['brand_id'];
if(!empty($category_id) && !empty($brand_id)){
    $product = $db->query("SELECT * FROM phtv_product WHERE is_preorder = 1 AND product_brand_id = '$brand_id' AND product_category_id = '$category_id' ORDER BY id DESC LIMIT $start,$limit");
} elseif(!empty($category_id)){
    $product = $db->query("SELECT * FROM phtv_product WHERE is_preorder = 1 AND product_category_id = '$category_id' ORDER BY id DESC LIMIT $start,$limit");
} elseif(!empty($brand_id)){
    $product = $db->query("SELECT * FROM phtv_product WHERE is_preorder = 1 AND product_brand_id = '$brand_id' ORDER BY id DESC LIMIT $start,$limit");
} else {
    $product = $db->query("SELECT * FROM phtv_product WHERE is_preorder = 1 ORDER BY id DESC LIMIT $start,$limit");
}
$response = '';
while ($feproduct = $product->fetch()) {
    $pimage = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $feproduct['id'] . "' LIMIT 1");
    $fepimage = $pimage->fetch();
    $response .= '<div class="col-lg-3 col-sm-6">
                    <div class="ss_products_boxi">
                        <div class="images">
                            <div class="ss_vertical_align_middle">
                                <img src="images/product/' . $fepimage['image'] . '" alt="images" />
                            </div>
                            <div class="ss_button">
                                <a href="product-detail.php?item=' . $feproduct['id'] . '"> Product Info </a>
                            </div>
                        </div>
                        <div class="_ss_product_des">
                            <h3>' . $feproduct['name'] . '</h3>
                            <p> $ ' . $feproduct['price'] . ' </p>

                        </div>
                    </div>
                </div>';
}
echo $response;