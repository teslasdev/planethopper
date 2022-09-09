<?php
   include('header.php');
   $category = $db->query("SELECT * FROM phtv_live_tv_24_7_category");
   $episode_id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id']:'';
   if(empty($episode_id)){
        $letest_episode = $db->query("SELECT * FROM phtv_live_tv_24_7_page ORDER BY id DESC LIMIT 0,1");
    } else {
        $episode_id = base64_decode($episode_id);
        $letest_episode = $db->query("SELECT * FROM phtv_live_tv_24_7_page WHERE id = '$episode_id'");
    }
    $felatest = $letest_episode->fetch(PDO::FETCH_ASSOC);
    $category_id = $felatest['category_id'];
    $category1 = $db->query("SELECT * FROM phtv_live_tv_24_7_page WHERE category_id = '$category_id'");
?>

<div class="container-fluid ss_padding_live_events main-video-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 ss_mobile_padd_0">
                <div class="ss_live_video">
                    <div class="video_images">
                        <img src="images/live_events.png" alt="video">
                        <div class="ss_add_live">
                            <a href="#"> <img src="images/PHTV247.png" alt="images" /> </a>
                        </div>
                        <div class="ss_video_player">
                            <div class="rSlider">
                                <span class="slide"></span>
                                <input id="range" type="range" min="0" max="50000">
                            </div>
                            <div class="d-flex bd-highlight justify-content-center">
                                <div class="p-2 flex-fill bd-highlight">
                                    <div class="d-flex bd-highlight ss_volume ">
                                        <div class=" bd-highlight ss_volume_icons align-self-center"><a href="#"><i
                                                    class="fa fa-volume-up" aria-hidden="true"></i></a></div>
                                        <div class=" bd-highlight align-self-center">
                                            <div class="rSlider ss_rslider">
                                                <span class="Vslide"></span>
                                                <input id="volume" type="range" min="0" max="50000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 flex-fill bd-highlight text-center">
                                    <div class="ss_play_button">
                                        <a href="#"><i class="fa fa-backward" aria-hidden="true"></i> </a>
                                        <a href="#"> <i class="fa fa-pause" aria-hidden="true"></i> </a>
                                        <a href="#"> <i class="fa fa-forward" aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                                <div class="p-2 flex-fill bd-highlight text-right">
                                    <p>12.45/28.32</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <iframe style="width: 100%;height:100%" src="<?= $felatest['youtube_link'] ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> -->
                </div>
                <div class="ss_video_des">
                    <h2> <?= $felatest['title'] ?> </h2>
                    <p><?= $felatest['description'] ?></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ss_live_TV_events">
                    <?php while ($fecategory1 = $category1->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/phtv_24_7/<?= $fecategory1['thumbnail'] ?>" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4><?= $fecategory1['title'] ?></h4>
                                <p><?= $fecategory1['description'] ?></p>
                                <!-- <p> 01:24 PM - 02:23 PM </p> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpgQ.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Copenhagen Ridin</h4>
                                <p>Red Bull Copenride 2021</p>
                                <p> 02:23 PM - 02:25 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg2.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Pushing Progression: Freerunning</h4>
                                <p>Every dream has a point of no return</p>
                                <p> 01:24 PM - 02:23 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg11.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Red Bull Skateboarding Presents: You Good?</h4>
                                <p>A globe-trotting skate adventure</p>
                                <p> 04:00 PM - 04:22 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg12.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Finals – Bosnia and Herzegovina</h4>
                                <p>Red Bull Cliff Diving World Series 2021</p>
                                <p>07:58 PM - 09:28 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg13.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Bike Life – New York's bike scene</h4>
                                <p>Stories in Motion S2E5</p>
                                <p> 11:43 PM - 11:53 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Moto 9</h4>
                                <p>The world's best places for riding</p>
                                <p> 01:24 PM - 02:23 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpgQ.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Copenhagen Ridin</h4>
                                <p>Red Bull Copenride 2021</p>
                                <p> 02:23 PM - 02:25 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg12.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Finals – Bosnia and Herzegovina</h4>
                                <p>Red Bull Cliff Diving World Series 2021</p>
                                <p>07:58 PM - 09:28 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg13.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Bike Life – New York's bike scene</h4>
                                <p>Stories in Motion S2E5</p>
                                <p> 11:43 PM - 11:53 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Moto 9</h4>
                                <p>The world's best places for riding</p>
                                <p> 01:24 PM - 02:23 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpgQ.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Copenhagen Ridin</h4>
                                <p>Red Bull Copenride 2021</p>
                                <p> 02:23 PM - 02:25 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg12.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Finals – Bosnia and Herzegovina</h4>
                                <p>Red Bull Cliff Diving World Series 2021</p>
                                <p>07:58 PM - 09:28 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg13.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Bike Life – New York's bike scene</h4>
                                <p>Stories in Motion S2E5</p>
                                <p> 11:43 PM - 11:53 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpg.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Moto 9</h4>
                                <p>The world's best places for riding</p>
                                <p> 01:24 PM - 02:23 PM </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                            <div class="ss_profile_imges">
                                <img src="images/im_i_h_180,w_320,q_70,f_jpgQ.jfif" alt="images">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                            <div class="ss_profile_des">
                                <h4>Copenhagen Ridin</h4>
                                <p>Red Bull Copenride 2021</p>
                                <p> 02:23 PM - 02:25 PM </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ss_evenst_live_bg">
    <input type="hidden" id="category_ids" name="category_ids" value="<?= $category->rowCount() ?>">
    <?php 
        if($category->rowCount() > 0){
            $a = 0;
            while($fecategory = $category->fetch(PDO::FETCH_ASSOC)){ 
                $episode = $db->query("SELECT * FROM phtv_live_tv_24_7_page WHERE category_id = '".$fecategory['id']."'");
    ?>
    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> <?= $fecategory['name'] ?> </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_livechatingssss" id="ss_livechatings<?= $a ?>">
                <?php 
                    if($episode->rowCount() > 0){ 
                        while ($fepisode = $episode->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/phtv_24_7/<?= $fepisode['thumbnail'] ?>" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2><?= $fepisode['title'] ?></h2>
                            <p class="ss_live_small"><?= $fepisode['description'] ?></p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="liveTV?id=<?= base64_encode($fepisode['id']) ?>" class="ss_video_playbutton">
                            <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <?php } } else { ?>
                <div class="text-center">
                    <h2> No Episode Available </h2>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="item">
                <div class="episodes_blogs_livechat">
                    <div class="images">
                        <img src="images/bjubku68ohpqqe7tr623.webp" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Tom Pidcock takes on his first World Cup season </h2>
                        <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p class="ss_uppercases">Parkour</p>
                            </div>
                            <div class=" bd-highlight">
                                <p>2 min</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                </div>
            </div>
            <div class="item">
                <div class="episodes_blogs_livechat">
                    <div class="images">
                        <img src="images/ep9ujepj9ii2i6pw4wvx.webp" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Course preview with Szymon Godziek </h2>
                        <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p class="ss_uppercases">Parkour</p>
                            </div>
                            <div class=" bd-highlight">
                                <p>2 min</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                </div>
            </div>
            <div class="item">
                <div class="episodes_blogs_livechat">
                    <div class="images">
                        <img src="images/prslfhub3igafpnxjtfl.webp" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> It was rough. It was tough. It was Red Bull Romaniacs </h2>
                        <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p class="ss_uppercases">Parkour</p>
                            </div>
                            <div class=" bd-highlight">
                                <p>2 min</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                </div>
            </div>
            <div class="item">
                <div class="episodes_blogs_livechat">
                    <div class="images">
                        <img src="images/fim-hard-enduro-5-red-bull-tko-daily-recap-art.jfif" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Emil Johansson's winning run </h2>
                        <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p class="ss_uppercases">Parkour</p>
                            </div>
                            <div class=" bd-highlight">
                                <p>2 min</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                </div>
            </div>
            <div class="item">
                <div class="episodes_blogs_livechat">
                    <div class="images">
                        <img src="images/wudlsofwvjzsecvz7l1u.webp" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Adrenaline Spike </h2>
                        <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p class="ss_uppercases">Parkour</p>
                            </div>
                            <div class=" bd-highlight">
                                <p>2 min</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php 
        $a++;
            } 
        } else {
    ?>
<div class="container-fluid ss_episodes_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 align-self-center">
                <div class="main_title">
                    <h1> No Data Available </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Freerunning around the world
                        </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_live_slider " id="ss_events_live_slider_B">
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/rljzn7stz8mu9xsbpdjj.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/5d009c89-7f86-488b-b8db-82457c521be4.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Tom Pidcock takes on his first World Cup season </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/FO-2184X6M1WBH11.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Course preview with Szymon Godziek </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/v4c2qmkzcervhw0iig7f.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> It was rough. It was tough. It was Red Bull Romaniacs </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/fim-hard-enduro-5-red-bull-tko-daily-recap-art.jfif" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Emil Johansson's winning run </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/wudlsofwvjzsecvz7l1u.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Celebrate the heroes of summer
                        </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_live_slider " id="ss_events_live_slider_C">
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/bjubku68ohpqqe7tr62312.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/rbkckelxiyag63zowcbj.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Tom Pidcock takes on his first World Cup season </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/ix2s7xuco4z2kwhhbxmz.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Course preview with Szymon Godziek </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/j0canri9gk5cpw2f4r1p.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> It was rough. It was tough. It was Red Bull Romaniacs </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/fo-1zbsm65cd5n11-featuremedia.jfif" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Emil Johansson's winning run </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/wudlsofwvjzsecvz7l1u.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ss_live_events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex bd-highlight ss_main_title">
                        <div class="p-2  bd-highlight align-self-center">
                            <h1> Upcoming live events </h1>
                        </div>
                        <div class="p-2  bd-highlight align-self-center">
                            <div class="ss_main_title_img">
                                <img src="images/h1title.png" alt="title">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ss_live_events_slider">
                <div class="owl-carousel owl-theme ss_live_slider" id="ss_live_events_slider1">
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/uci-world-cup-lenzerheide-hero-art.jfif" alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/uci-mtb-worldcup-logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> UCI Mountain Bike World Championships </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 1 July – 1 November
                                    2021 </p>
                                <p><img src="images/Flag_of_Bosnia_and_Herzegovina.svg" alt="images" /> Zandvoort,
                                    Netherlands </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/super-formula-japan-round-5-motegi-hero-art.jfif" alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/superformulalive_titletreatment_logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> Red Bull Cliff Diving World Series </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 28 August 2021 </p>
                                <p><img src="images/Zandvoort_vlag.svg" alt="images" /> Mostar, Bosnia & Herzegovina
                                </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/megaloop.jfif" alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/megaloop-logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> Red Bull Megaloop </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 1 July – 1 November
                                    2021 </p>
                                <p><img src="images/Zandvoort_vlag.svg" alt="images" /> Zandvoort, Netherlands </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/fia-world-rally-championship-greece-2021-featured-image.jfif"
                                    alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/wrc-logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> FIA World Rally Championship </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 10 – 12 September 2021
                                </p>
                                <p><img src="images/Zandvoort_vlag.svg" alt="images" /> Zandvoort, Netherlands </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/uci-world-cup-lenzerheide-hero-art.jfif" alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/uci-mtb-worldcup-logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> UCI Mountain Bike World Championships </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 1 July – 1 November
                                    2021 </p>
                                <p><img src="images/Flag_of_Bosnia_and_Herzegovina.svg" alt="images" /> Zandvoort,
                                    Netherlands </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ss_live_events_box">
                            <div class="images">
                                <img src="images/super-formula-japan-round-5-motegi-hero-art.jfif" alt="images" />
                                <div class="ss_live_event_logo">
                                    <div class="verticle_middle">
                                        <img src="images/superformulalive_titletreatment_logo.png" alt="images" />
                                    </div>
                                </div>
                            </div>
                            <div class="ss_des">
                                <h2> Red Bull Cliff Diving World Series </h2>
                                <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 28 August 2021 </p>
                                <p><img src="images/Zandvoort_vlag.svg" alt="images" /> Mostar, Bosnia & Herzegovina
                                </p>
                                <p class="ss_uppercases">Kitesurfing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Films and documentaries
                        </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_live_slider " id="ss_events_live_slider_D">
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/qcuuyb54kbrgxecpn7kd.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/the-longest-wave-featured-image.jfif" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Tom Pidcock takes on his first World Cup season </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/tfj1rie28oskgtylefcm.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Course preview with Szymon Godziek </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/trents-vision-cover-art.jfif" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> It was rough. It was tough. It was Red Bull Romaniacs </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/laura-stigger-cover-art.jfif" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Emil Johansson's winning run </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="item">
                    <div class="episodes_blogs_livechat">
                        <div class="images">
                            <img src="images/wudlsofwvjzsecvz7l1u.webp" alt="episodes" />
                        </div>
                        <div class="des">
                            <h2> Adrenaline Spike </h2>
                            <p class="ss_live_small">Uniting the worlds of VALORANT and freerunning</p>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-grow-1 bd-highlight">
                                    <p class="ss_uppercases">Parkour</p>
                                </div>
                                <div class=" bd-highlight">
                                    <p>2 min</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="ss_video_playbutton"> <i class="fa fa-play" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<?php
    include('footer.php');
?>

<script>
$(window).on("load", function() {
    var range = $("#range").attr("value");
    $("#demo")(range);
    $(".slide").css("width", "50%");
    $(document).on('input change', '#range', function() {
        $('#demo')($(this).val());
        var slideWidth = $(this).val() * 100 / 50000;
        $(".slide").css("width", slideWidth + "%");
    });
});
</script>
<script>
$(window).on("load", function() {
    var range = $("#volume").attr("value");
    $("#demo")(range);
    $(".Vslide").css("width", "50%");
    $(document).on('input change', '#volume', function() {
        $('#demo')($(this).val());
        var slideWidth = $(this).val() * 100 / 50000;
        $(".Vslide").css("width", slideWidth + "%");
    });
});
</script>
</body>

</html>