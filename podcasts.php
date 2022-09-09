<?php
include('header.php');
$podcast = $db->query("SELECT * FROM phtv_podcast");
?>
<div class="container-fluid ss_podcast_audiocasts ss_height100vh">
    <div class="verticle_middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center ss_des_podcast">
                    <div class="images_sspatload ss_ph1_audio">
                        <img src="images/PH1_Audiocast.png" alt="images">
                    </div>
                    <div class="images_sspatload ss_ph1_audio">
                        <img src="images/Audiocasts.png" alt="images">
                    </div>
                    <h2> Audiocasts From PHTV </h2>
                    <div class="liness"></div>
                    <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy
                        Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($podcast->rowCount() > 0) {
    while ($fepodcast = $podcast->fetch(PDO::FETCH_ASSOC)) {
        $episode = $db->query("SELECT * FROM phtv_podcast_episode WHERE podcast_id = '" . $fepodcast['id'] . "'");
        $episode1 = $db->query("SELECT * FROM phtv_podcast_episode WHERE podcast_id = '" . $fepodcast['id'] . "' LIMIT 0,1");
        $oneepisode = $episode1->fetch(PDO::FETCH_ASSOC);
        if(!empty($fepodcast['created_by_id'])){
            $create = $db->query("SELECT * FROM phtv_created_by WHERE id IN (".$fepodcast['created_by_id'].")");
        } else {
            $create = $db->query("SELECT * FROM phtv_created_by WHERE id = 0");
        }
        if(!empty($fepodcast['hosts_id'])){
            $hosted = $db->query("SELECT * FROM phtv_hosted_by WHERE id IN (".$fepodcast['hosts_id'].")");
        } else {
            $hosted = $db->query("SELECT * FROM phtv_hosted_by WHERE id = 0");
        }
        if(!empty($fepodcast['sponsored_by_id'])){
            $sponsored = $db->query("SELECT * FROM phtv_sponsored_by WHERE id IN (".$fepodcast['sponsored_by_id'].")");
        } else {
            $sponsored = $db->query("SELECT * FROM phtv_sponsored_by WHERE id = 0");
        }
?>
<div class="container-fluid ss_musi">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-4">
                <div class="images">
                    <img src="images/podcast_image/<?= $fepodcast['image'] ?>" alt="images" />
                </div>
            </div>
            <div class="col-lg-10 col-sm-8">
                <div class="d-flex bd-highlight ss_mobile_block">
                    <div class="py-2 flex-grow-1 bd-highlight align-self-center">
                        <div class=" ss_pod_contents">
                            <div class="d-flex bd-highlight w-100 flex-wrap">
                                <div class="flex-grow-1 bd-highlight">
                                    <h2> <?= $fepodcast['title'] ?> </h2>
                                    <div class="liness"></div>
                                    <div class="py-2">
                                        <div class="d-flex bd-highlight ss_mobiles_inlines">
                                            <?php if($create->rowCount() > 0){ ?>
                                            <div class="p-2 bd-highlight">
                                                <div class="d-flex bd-highlight">
                                                    <div class=" bd-highlight align-self-center">
                                                        <h4> Created by </h4>
                                                    </div>
                                                    <?php while($fecreated = $create->fetch(PDO::FETCH_ASSOC)){ ?>
                                                    <div class=" bd-highlight px-2 align-self-center">
                                                        <div class="ss_profiles_creatr">
                                                            <img src="images/created_by/<?= $fecreated['image'] ?>"
                                                                alt="images" />
                                                        </div>
                                                    </div>
                                                    <div class=" bd-highlight align-self-center">
                                                        <p><?= $fecreated['name'] ?></p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="pl-3 pr-2 bd-highlight align-self-center remove-mobile">
                                                <h4> | </h4>
                                            </div>
                                            <?php } if($hosted->rowCount() > 0){ ?>
                                            <div class="p-2 bd-highlight">
                                                <div class="d-flex bd-highlight">
                                                    <div class=" bd-highlight align-self-center">
                                                        <h4> Hosted by </h4>
                                                    </div>
                                                    <?php while($fehosted = $hosted->fetch(PDO::FETCH_ASSOC)){ ?>
                                                    <div class=" bd-highlight px-2 align-self-center">
                                                        <div class="ss_profiles_creatr">
                                                            <img src="images/hosted_by/<?= $fehosted['image'] ?>"
                                                                alt="images" />
                                                        </div>
                                                    </div>
                                                    <div class=" bd-highlight align-self-center">
                                                        <p><?= $fehosted['name'] ?></p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="pl-3 pr-2 bd-highlight align-self-center remove-mobile">
                                                <h4> | </h4>
                                            </div>
                                            <?php } if($sponsored->rowCount() > 0){ ?>
                                            <div class="p-2 bd-highlight">
                                                <div class="d-flex bd-highlight ">
                                                    <div class=" bd-highlight align-self-center">
                                                        <h4> Sponsor by </h4>
                                                    </div>
                                                    <?php while($fesponsored = $sponsored->fetch(PDO::FETCH_ASSOC)){ ?>
                                                    <div class=" bd-highlight px-2 align-self-center">
                                                        <div class="ss_profiles_creatr">
                                                            <img src="images/sponsored_by/<?= $fesponsored['image'] ?>"
                                                                alt="images" />
                                                        </div>
                                                    </div>
                                                    <div class=" bd-highlight align-self-center">
                                                        <p><?= $fesponsored['name'] ?></p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex bd-highlight">
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <h4> Created by </h4>
                                                </div>
                                                <div class="p-2  bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/profilesA.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/me3.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                                <div class="pl-3 pr-2 bd-highlight align-self-center">
                                                    <h4> | </h4>
                                                </div>
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <h4> Hosted by </h4>
                                                </div>
                                                <div class="p-2  bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/profilesA.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/me3.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                                <div class="pl-3 pr-2 bd-highlight align-self-center">
                                                    <h4> | </h4>
                                                </div>
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <h4> Sponsored by </h4>
                                                </div>
                                                <div class="p-2  bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/profilesA.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                                <div class="p-2 bd-highlight align-self-center">
                                                    <div class="ss_profiles_creatr">
                                                        <img src="images/me3.jpg" alt="images"/>
                                                    </div>
                                                </div>
                                                <div class=" bd-highlight align-self-center">
                                                    <p>John T</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    <div class="ss_music_tags">
                                        <p><?= $fepodcast['description'] ?></p>
                                        <div class="ss_tags">
                                            <a href="login"> Sign in to earn Payload Discount Coins </a>
                                            <a href="#" style="display: none"> Share Audiocast episodes to
                                                recieve payload Discount
                                                Coins </a>
                                        </div>
                                        <div class="py-2">
                                            <div class="ss_social_media_products podcast_social_icons">
                                                <a href="<?= ($fepodcast['fb_link']) ? $fepodcast['fb_link'] : '#' ?>">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                                <a
                                                    href="<?= ($fepodcast['twiter_link']) ? $fepodcast['twiter_link'] : '#' ?>">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                                <a
                                                    href="<?= ($fepodcast['google_link']) ? $fepodcast['google_link'] : '#' ?>"><i
                                                        class="fa fa-google-plus" aria-hidden="true"></i>
                                                </a>
                                                <a
                                                    href="<?= ($fepodcast['insta_link']) ? $fepodcast['insta_link'] : '#' ?>">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-highlight">
                                </div>
                            </div>
                            <!--                            <p> Host/s : -->
                            <? //= $fepodcast['host_name']
                                    ?>
                            <!--, Created by :-->
                            <!--                                -->
                            <? //= $fepodcast['created_by_name']
                                    ?>
                            <!--,-->
                            <!--                                Sponsored by : -->
                            <? //= $fepodcast['sponsored_by_name']
                                    ?>
                            <!--</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($episode->rowCount() > 0) { ?>
            <div class="col-lg-12">
                <div class="ss_playstore_music">

                    <div class="d-flex bd-highlight mb-3">
                        <div class="p-2 bd-highlight align-self-center">

                            <div class="d-flex bd-highlight  align-self-center">
                                <div class=" bd-highlight align-self-center">

                                    <div class=" bd-highlight align-self-center">
                                        <div class="ss_play">
                                            <i class="fa fa-play startplayer" key="<?= $fepodcast['id'] ?>"
                                                id="startplayer_<?= $fepodcast['id'] ?>" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                </div>
                                <div class=" bd-highlight align-self-center">

                                    <div class="mr-auto  bd-highlight align-self-center">
                                        <div class="ss_des_play">
                                            <h3 id="audiocast_title<?= $fepodcast['id'] ?>"><?= $oneepisode['title'] ?>
                                            </h3>
                                            <p id="audiocast_authername<?= $fepodcast['id'] ?>">
                                                <?= $oneepisode['short_description'] ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="ml-auto p-2 bd-highlight align-self-center">

                            <div class="p-2 bd-highlight align-self-center ss_social_media_relative">
                                <div class="ss_social_media_button">
                                    <a href="#" class="share_button"> Share this Episode </a>
                                </div>
                                <div class="ss_music">
                                    <div class="ss_social_media">
                                        <a id="twitterlink"
                                            href="http://twitter.com/share?url=<?= BASE_URL ?>images/podcast_mp3/<?= $oneepisode['mp3_file'] ?>"
                                            target="_blank">
                                            <img src="images/twitterA.svg" alt="youtube"> </a>
                                        <a href="<?= ($fepodcast['twiter_link']) ? $fepodcast['twiter_link'] : '#' ?>">
                                            <img src="images/youtubeshaA.svg" alt="youtube"> </a>
                                        <a id="facebooklink"
                                            href="https://www.facebook.com/sharer/sharer.php?u=<?= BASE_URL ?>images/podcast_mp3/<?= $oneepisode['mp3_file'] ?>"
                                            target="_blank"> <img src="images/fb.svg" alt="youtube"> </a>
                                        <a href="<?= ($fepodcast['insta_link']) ? $fepodcast['insta_link'] : '#' ?>">
                                            <img src="images/instagram.svg" alt="youtube"> </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="py-3">
                        <div class="rSlider">
                            <audio id="buzzer<?= $fepodcast['id'] ?>" controls style="border-radius: 40px;width:100%">
                                <source id="podcast_player<?= $fepodcast['id'] ?>"
                                    src="images/podcast_mp3/<?= $oneepisode['mp3_file'] ?>" type="audio/mpeg">
                            </audio>
                            <!-- <span class="slide" style="width: 50%;"></span>
                                        <input id="range" type="range" min="0" max="50000"> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-12">
                <div class="ss_player_music">
                    <h3>In This Playlist</h3>
                    <div class="ss_playstore_music_scroll">
                        <?php if ($episode->rowCount() > 0) {
                                    while ($fepisode = $episode->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="button" audiocast_title="<?= $fepisode['title'] ?>"
                                                audiocast_auther="<?= $fepisode['short_description'] ?>"
                                                class="ss_play podcast_start"
                                                id="images/podcast_mp3/<?= $fepisode['mp3_file'] ?>"
                                                key="<?= $fepodcast['id'] ?>">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5><?= $fepisode['title'] ?></h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>
                                                <?php
                                                                $length = $fepisode['length'];
                                                                $explode = explode(':', $length);
                                                                echo $explode[0] . " hr " . $explode[1] . " min " . $explode[2] . " sec";
                                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                                } else { ?>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center">
                                            <h5>No Podcast episode available</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list active">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ss_list">
                                    <div class="row mx-0">
                                        <div class="col-auto">
                                            <div class="d-flex bd-highlight ">
                                                <div class=" bd-highlight align-self-center">
                                                    <button type="submit" class="ss_play">
                                                        <i class="fa fa-play" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col p-0 ss_line_events">
                                            <div class="d-flex bd-highlight">
                                                <div class=" w-100 bd-highlight align-self-center ">
                                                    <h5>I’m Begining To See The Light</h5>
                                                </div>
                                                <div class=" flex-shrink-1 bd-highlight align-self-center">
                                                    <h6>1 hr 8 min</h6>
                                                </div>
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
<?php } ?>
<div class="container-fluid ss_musi ss_margin_bottom_mobiles"></div>
<?php } else { ?>
<div class="container-fluid ss_musi ss_margin_bottom_mobiles">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise">
                    <h2>No Podcast Available</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- <div class="container-fluid ss_musi">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-4">
                <div class="images">
                    <img src="images/hot_deal.png" alt="images" />
                </div>
            </div>
            <div class="col-lg-10 col-sm-8">
                <div class="d-flex bd-highlight ss_mobile_block">
                    <div class="py-2 flex-grow-1 bd-highlight align-self-center">
                        <div class="ss_des">
                            <h2> Happy Holidays for You </h2>
                            <p> Creat By: Apollo Music </p>
                            <div class="liness"></div>
                        </div>
                    </div>
                </div>
                <div class="ss_music_tags">
                    <p>
                        The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                        personal digital assistants.
                        Facebook and Microsoft announced major investments into conversational user interfaces, and
                        Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots
                        became available the public, the public largely shrugged. The advantages of conversational
                        interfaces paled next to their drawbacks.
                    </p>
                    <div class="ss_tags">
                        <a href="#"> Sign in to earn Payload Discount Coins </a>
                        <a href="#" style="display: none"> Share Audiocast episodes to recieve payload Discount
                            Coins </a>
                    </div>
                    <div class="py-2">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_playstore_music">
                    <div class="d-flex bd-highlight">
                        <div class=" bd-highlight align-self-center">
                            <div class="ss_play">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="mr-auto  bd-highlight align-self-center">
                            <div class="ss_des_play">
                                <h3>The robots are coming for your office, with NYT’s Kevin Roose</h3>
                                <p>Decoder with Nilay Patel</p>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ss_social_media_relative">
                            <div class="ss_social_media_button">
                                <a href="#" class="share_button"> Share this Episode </a>
                            </div>
                            <div class="ss_music">
                                <div class="ss_social_media">
                                    <a href="#"> <img src="images/twitterA.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/youtubeshaA.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/fb.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/instagram.svg" alt="youtube"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="rSlider ">
                            <span class="slide" style="width: 50%;"></span>
                            <input id="range" type="range" min="0" max="50000">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ss_player_music">
                    <h3>In This Playlist</h3>
                    <div class="ss_playstore_music_scroll">
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list active">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_musi">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-4">
                <div class="images">
                    <img src="images/hot_deal_B.png" alt="images" />
                </div>
            </div>
            <div class="col-lg-10 col-sm-8">
                <div class="d-flex bd-highlight ss_mobile_block">
                    <div class="py-2 flex-grow-1 bd-highlight align-self-center">
                        <div class="ss_des">
                            <h2> Happy Holidays for You </h2>
                            <p> Creat By: Apollo Music </p>
                            <div class="liness"></div>
                        </div>
                    </div>
                </div>
                <div class="ss_music_tags">
                    <p>
                        The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                        personal digital assistants.
                        Facebook and Microsoft announced major investments into conversational user interfaces, and
                        Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots
                        became available the public, the public largely shrugged. The advantages of conversational
                        interfaces paled next to their drawbacks.
                    </p>
                    <div class="ss_tags">
                        <a href="#"> Sign in to earn Payload Discount Coins </a>
                        <a href="#" style="display: none"> Share Audiocast episodes to recieve payload Discount
                            Coins </a>
                    </div>
                    <div class="py-2">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_playstore_music">
                    <div class="d-flex bd-highlight">
                        <div class=" bd-highlight align-self-center">
                            <div class="ss_play">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="mr-auto  bd-highlight align-self-center">
                            <div class="ss_des_play">
                                <h3>The robots are coming for your office, with NYT’s Kevin Roose</h3>
                                <p>Decoder with Nilay Patel</p>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ss_social_media_relative">
                            <div class="ss_social_media_button">
                                <a href="#" class="share_button"> Share this Episode </a>
                            </div>
                            <div class="ss_music">
                                <div class="ss_social_media">
                                    <a href="#"> <img src="images/twitterA.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/youtubeshaA.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/fb.svg" alt="youtube"> </a>
                                    <a href="#"> <img src="images/instagram.svg" alt="youtube"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="rSlider ">
                            <span class="slide" style="width: 50%;"></span>
                            <input id="range" type="range" min="0" max="50000">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ss_player_music">
                    <h3>In This Playlist</h3>
                    <div class="ss_playstore_music_scroll">
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list active">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss_list">
                            <div class="row mx-0">
                                <div class="col-auto">
                                    <div class="d-flex bd-highlight ">
                                        <div class=" bd-highlight align-self-center">
                                            <button type="submit" class="ss_play">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 ss_line_events">
                                    <div class="d-flex bd-highlight">
                                        <div class=" w-100 bd-highlight align-self-center ">
                                            <h5>I’m Begining To See The Light</h5>
                                        </div>
                                        <div class=" flex-shrink-1 bd-highlight align-self-center">
                                            <h6>1 hr 8 min</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
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
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'podcasts'");
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
<script>
$(document).ready(function() {
    $('.ss_music').click(function(e) {
        /*--- Content div id and class you want to be toggle ---*/
        e.stopPropagation();
    });
    $('.share_button').click(function(e) {
        /*--- That div(Button) id and class you want to click to toggle div ---*/
        e.preventDefault();
        e.stopPropagation();
        $('.ss_music').fadeToggle(); /*--- Content div id and class you want to be toggle ---*/
    });
    $(document).on('click', '.startplayer', function() {
        pauseAll();
        var id = $(this).attr('key');
        $('#buzzer' + id).trigger("play");
        $(this).removeClass('fa-play');
        $(this).addClass('fa-pause');
        $('#startplayer_' + id).addClass("stopplayer");
        $('#startplayer_' + id).removeClass("startplayer");
    });
    $(document).on('click', '.stopplayer', function() {
        pauseAll();
        var id = $(this).attr('key');
        $('#buzzer' + id).trigger("pause");
        $(this).addClass('fa-play');
        $(this).removeClass('fa-pause');
        $('#startplayer_' + id).addClass("startplayer");
        $('#startplayer_' + id).removeClass("stopplayer");
    });
    $(document).on('click', '.podcast_start', function() {
        pauseAll();
        var audio_url = $(this).attr('id');
        var audio_key = $(this).attr('key');
        var audiocast_title = $(this).attr('audiocast_title');
        $('#audiocast_title' + audio_key).html(audiocast_title);
        var audiocast_auther = $(this).attr('audiocast_auther');
        $('#audiocast_authername' + audio_key).html(audiocast_auther);
        $('#facebooklink').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=<?= BASE_URL ?>' +
            audio_url);
        $('#twitterlink').attr('href', 'http://twitter.com/share?url=<?= BASE_URL ?>' +
            audio_url);
        change(audio_url, audio_key);
        $('#startplayer_' + audio_key).addClass('fa-pause');
        $('#startplayer_' + audio_key).removeClass('fa-play');
        $('#startplayer_' + audio_key).addClass("stopplayer");
        $('#startplayer_' + audio_key).removeClass("startplayer");
        $(this).addClass('podcast_pause');
        $(this).removeClass('podcast_start');
        $('.podcast_start').find('i').removeClass('fa-pause').addClass('fa-play');
        $('.podcast_pause').find('i').removeClass('fa-pause').addClass('fa-play');
        var itag = $(this).find('i').removeClass('fa-play').addClass('fa-pause');
        $('div').removeClass('ss_active');
        $(this).closest('div.ss_list').addClass('ss_active');
    });
    $(document).on('click', '.podcast_pause', function() {
        pauseAll();
        var audio_url = $(this).attr('id');
        var audio_key = $(this).attr('key');
        var audiocast_title = $(this).attr('audiocast_title');
        $('#audiocast_title' + audio_key).html(audiocast_title);
        var audiocast_auther = $(this).attr('audiocast_auther');
        $('#audiocast_authername' + audio_key).html(audiocast_auther);
        pause(audio_url, audio_key);
        $('#startplayer_' + audio_key).addClass('fa-play');
        $('#startplayer_' + audio_key).removeClass('fa-pause');
        $('#startplayer_' + audio_key).addClass("startplayer");
        $('#startplayer_' + audio_key).removeClass("stopplayer");
        $(this).addClass('podcast_start');
        $(this).removeClass('podcast_pause');
        $('.podcast_start').find('i').removeClass('fa-pause').addClass('fa-play');
        $('.podcast_pause').find('i').removeClass('fa-pause').addClass('fa-play');
        var itag = $(this).find('i').removeClass('fa-pause').addClass('fa-play');
        $('div').removeClass('ss_active');
        $(this).closest('div.ss_list').addClass('ss_active');
    });

    function change(sourceUrl, key) {
        var audio = $("#buzzer" + key);
        $("#podcast_player" + key).attr("src", sourceUrl);
        audio[0].pause();
        audio[0].load();
        audio[0].oncanplaythrough = audio[0].play();
    }

    function pause(sourceUrl, key) {
        var audio = $("#buzzer" + key);
        $("#podcast_player" + key).attr("src", sourceUrl);
        audio[0].play();
        audio[0].load();
        audio[0].oncanplaythrough = audio[0].pause();
    }

    function pauseAll() {
        $('audio').each(function() {
            this.pause(); // Stop playing
            this.currentTime = 0; // Reset time
        });
        $('.startplayer').each(function() {
            var id = $(this).attr('key');
            $('#startplayer_' + id).addClass("startplayer");
            $('#startplayer_' + id).removeClass("stopplayer");
            $(this).addClass('fa-play');
            $(this).removeClass('fa-pause');
        });
        $('.stopplayer').each(function() {
            var id = $(this).attr('key');
            $('#startplayer_' + id).addClass("startplayer");
            $('#startplayer_' + id).removeClass("stopplayer");
            $(this).addClass('fa-play');
            $(this).removeClass('fa-pause');
        });
        $('.podcast_start').each(function() {
            var audio_url = $(this).attr('id');
            var audio_key = $(this).attr('key');
            $('#startplayer_' + audio_key).addClass('fa-play');
            $('#startplayer_' + audio_key).removeClass('fa-pause');
            $(this).addClass('podcast_start');
            $(this).removeClass('podcast_pause');
            $('.podcast_start').find('i').removeClass('fa-pause').addClass('fa-play');
            $('.podcast_pause').find('i').removeClass('fa-pause').addClass('fa-play');
            var itag = $(this).find('i').removeClass('fa-pause').addClass('fa-play');
            $('div').removeClass('ss_active');
            $(this).closest('div.ss_list').addClass('ss_active');
        });
        $('.podcast_pause').each(function() {
            var audio_url = $(this).attr('id');
            var audio_key = $(this).attr('key');
            $('#startplayer_' + audio_key).addClass('fa-play');
            $('#startplayer_' + audio_key).removeClass('fa-pause');
            $(this).addClass('podcast_start');
            $(this).removeClass('podcast_pause');
            $('.podcast_start').find('i').removeClass('fa-pause').addClass('fa-play');
            $('.podcast_pause').find('i').removeClass('fa-pause').addClass('fa-play');
            var itag = $(this).find('i').removeClass('fa-pause').addClass('fa-play');
            $('div').removeClass('ss_active');
            $(this).closest('div.ss_list').addClass('ss_active');
        });
    }
});
$(document).click(function() {
    $('.ss_music').hide(); /*--- Content div id and class you want to be toggle ---*/
});
</script>
</body>

</html>