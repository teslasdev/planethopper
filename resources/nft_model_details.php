<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    $nft_id =  $_REQUEST['nft_id'];
    $nft = $db->query("SELECT a.*, b.name as category_name, c.name as collection_name FROM phtv_nft_info a, phtv_nft_categories b, phtv_nft_collection c WHERE a.collection_id = c.id AND a.category_id = b.id AND a.id = '$nft_id'");
    $fenft = $nft->fetch(PDO::FETCH_ASSOC);
    $fenft['nft_id'] = base64_encode($fenft['id']);
    echo json_encode($fenft);
?>