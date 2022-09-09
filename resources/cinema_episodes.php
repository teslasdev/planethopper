<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';

$cinema_id = $_REQUEST['cinema_id'];
$previews = $db->query("SELECT * FROM phtv_cinema WHERE id = '$cinema_id'");
$fepreviews = $previews->fetch(PDO::FETCH_ASSOC);

$episode = $db->query("SELECT * FROM phtv_cinema_episode WHERE cinema_id = '$cinema_id' AND season = 1");
$response = '';
$response .= '<div class="epi_img">
    <div class="model_imagesss">
        <img class="img-fluid" src="images/poster/'.$fepreviews['poster'].'">
        <div class="model_title_images">
            <img src="images/cosmic_comedy.png" alt="images" />
        </div>
    </div>
    <div class="epi_modal_con">
        <div class="tool_epi">
            <div class="epi_play">
                <a href="#">Play <i class="fa fa-play" aria-hidden="true"></i></a>
            </div>
            <div class="epi_t_box">
                <div class="epi_tool_box">
                    <a href="#"> <img src="images/StashS_2x.png" alt="" </a>
                </div>
                <div class="epi_tool_box">
                    <a href="#"><img class="img-fluid" src="images/like.png"></a>
                </div>
                <div class="epi_tool_box">
                    <a href="#"><img class="img-fluid" src="images/dislike.png"></a>
                </div>
                <div class="epi_tool_box">
                    <a href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-lg-12">
                <div class="modal_des">
                    <div class="match">
                        <h5><span>'.$fepreviews['year'].'</span></h5>
                        <h6>'.$fepreviews['age'].'+</h6>
                        <h5><span>'.$fepreviews['total_season'].' Seasons</span></h5>
                    </div>
                    '.$fepreviews['description'].'
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="epi_modal_title">
                    <div class="epi_title mr-auto">Episodes</div>
                    <div class="epi_select">
                        <select class="changeSeason" id="changeSeason" key="'.$cinema_id.'">';
                        for($i = 1; $i <= $fepreviews['total_season']; $i++) {
                            $response .= '<option value="'.$i.'">Season '.$i.'</option>';
                        }
$response .= '</select>
                    </div>
                </div>
            </div>
            <div class="col-lg-11 ml-auto mr-auto mt-5" id="season_episodes">';
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
$response .= '</div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="more_like">
                    <h3>More Like this</h3>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="like_box">
                                <div class="like_img">
                                    <div class="like_time">2h 23m</div>
                                    <img class="img-fluid" src="images/like1.jpg">
                                    <div class="like_play">
                                        <i class="fa fa-play" aria-hidden="a"></i>
                                    </div>
                                </div>
                                <div class="like_con_box">
                                    <div class="like_con">
                                        <h3>We Only See Each Other at Wedding and Funerals</h3>
                                        <div class="like_match">
                                            <div class="match_text">Crew Picked <br><span>2020</span></div>
                                            <div class="plus_p">16+</div>
                                            <div class="add_box ml-auto">
                                                <img src="images/StashS_2x.png" alt="images" />
                                            </div>
                                        </div>
                                    </div>
                                    <p>Years after they rose to fame as young crime-fighting superheroes,
                                        the
                                        estranged Hargreeves sibling .com together to make their father’s
                                        death.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="like_box">
                                <div class="like_img">
                                    <div class="like_time">2h 23m</div>
                                    <img class="img-fluid" src="images/like2.jpg">
                                    <div class="like_play">
                                        <i class="fa fa-play" aria-hidden="a"></i>
                                    </div>
                                </div>
                                <div class="like_con_box">
                                    <div class="like_con">
                                        <h3>We Only See Each Other at Wedding and Funerals</h3>
                                        <div class="like_match">
                                            <div class="match_text">Crew Picked <br><span>2020</span></div>
                                            <div class="plus_p">16+</div>
                                            <div class="add_box ml-auto">
                                                <img src="images/StashS_2x.png" alt="images" />
                                            </div>
                                        </div>
                                    </div>
                                    <p>Years after they rose to fame as young crime-fighting superheroes,
                                        the
                                        estranged Hargreeves sibling .com together to make their father’s
                                        death.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="like_box">
                                <div class="like_img">
                                    <div class="like_time">2h 23m</div>
                                    <img class="img-fluid" src="images/like3.jpg">
                                    <div class="like_play">
                                        <i class="fa fa-play" aria-hidden="a"></i>
                                    </div>
                                </div>
                                <div class="like_con_box">
                                    <div class="like_con">
                                        <h3>We Only See Each Other at Wedding and Funerals</h3>
                                        <div class="like_match">
                                            <div class="match_text">Crew Picked <br><span>2020</span></div>
                                            <div class="plus_p">16+</div>
                                            <div class="add_box ml-auto">
                                                <img src="images/StashS_2x.png" alt="images" />
                                            </div>
                                        </div>
                                    </div>
                                    <p>Years after they rose to fame as young crime-fighting superheroes,
                                        the
                                        estranged Hargreeves sibling .com together to make their father’s
                                        death.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="modal_down">
                <div class="modal_border">
                    <div class="down_box_arrow"><a href="#"><i class="fa fa-angle-down"
                                                               aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="modal_about">
                    <h3>About John Wick</h3>
                    <p><span>Director:</span> Chad Stahelski</p>
                    <p><span>Cast:</span>Keanu Reeves, Michael Nyqvist, Bridget Moynahan, Action Thrillers
                    </p>
                    <p><span>Genres:</span>Crime Movies, Action Thrillers, Crime Action & Adventure</p>
                    <p><span>This movie is:</span>Violent, Gritty, Dark</p>
                    <p><span>Maturity rating :</span>Violence, language, Recommended for ages 16 and up</p>
                </div>
            </div>
        </div>
    </div>
</div>';
echo $response;
die;
