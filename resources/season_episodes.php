<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';

$cinema_id = $_REQUEST['cinema_id'];
$season = $_REQUEST['season'];
$episode = $db->query("SELECT * FROM phtv_cinema_episode WHERE cinema_id = '$cinema_id' AND season = '$season'");
$response = '';
$j = 1;
if($episode->rowCount() > 0) {
    while ($fepisode = $episode->fetch(PDO::FETCH_ASSOC)) {
        $response .= '<div class="epi_number_con">
                        <div class="epi_number align-self-center">' . $j . '.</div>
                        <div class="modal_epi_video">
                            <div class="modal_epi_img">
                                <img class="img-fluid" src="images/poster/' . $fepisode['poster'] . '">
                                <a href="video-detail.php?id='.base64_encode($fepisode['id']).'" class="epi_play_box">
                                    <i class="fa fa-play" aria-hidden="a"></i>
                                </a>
                            </div>
                            <div class="modal_epi_con">
                                <h4>' . $fepisode['title'] . '</h4>
                                <p>' . $fepisode['description'] . '</p>
                                <h5>' . $fepisode['time'] . '</h5>
                            </div>
                        </div>
                    </div>';
        $j++;
    }
} else {
    $response .= '<div class="text-center"><h1>No Episode Available</h1></div>';
}
echo $response;
