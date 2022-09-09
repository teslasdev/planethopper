<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    $nfts = $db->query("SELECT * FROM phtv_nft_info WHERE duration > 0");
    if($nfts->rowCount() > 0){
        while ($fenfts = $nfts->fetch(PDO::FETCH_ASSOC)) {
            $days = $fenfts['duration'] - 1;
            $nft_id = $fenfts['id'];
            $update = $db->query("UPDATE phtv_nft_info SET duration = '$days' WHERE id = '$nft_id'");
        }
    }
?>