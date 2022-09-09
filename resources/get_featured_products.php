<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];
$category_id = $_REQUEST['category_id'];
$brand_id = $_REQUEST['brand_id'];
if(!empty($category_id) && !empty($brand_id)){
    $product = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id WHERE b.product_brand_id = '$brand_id' AND b.product_category_id = '$category_id' ORDER BY review_rate DESC LIMIT $start,$limit");
} elseif(!empty($category_id)){
    $product = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id WHERE b.product_category_id = '$category_id' ORDER BY review_rate DESC LIMIT $start,$limit");
} elseif(!empty($brand_id)){
    $product = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id WHERE b.product_brand_id = '$brand_id' ORDER BY review_rate DESC LIMIT $start,$limit");
} else {
    $product = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id GROUP BY a.product_id ORDER BY review_rate DESC LIMIT $start,$limit");
}
$response = '';
while ($feproduct = $product->fetch()) {
    if(!empty($feproduct['product_id'])){
        $pimage = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $feproduct['product_id'] . "' LIMIT 1");
        $fepimage = $pimage->fetch();
        $response .= '<div class="col-lg-3 col-sm-6">
                        <div class="ss_products_boxi">
                            <div class="images">
                                <div class="ss_vertical_align_middle">
                                    <img src="images/product/' . $fepimage['image'] . '" alt="images" />
                                </div>
                                <div class="ss_button">
                                    <a href="product-detail.php?item=' . $feproduct['product_id'] . '"> Product Info </a>
                                </div>
                            </div>
                            <div class="_ss_product_des">
                                <h3>' . $feproduct['name'] . '</h3>
                                <p> $ ' . $feproduct['price'] . ' </p>

                            </div>
                        </div>
                    </div>';
    }
}
echo $response;