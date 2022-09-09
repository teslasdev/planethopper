<?php
    include('header.php');
    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $s3 = S3Client::factory(
        array(
            'credentials' => array(
                'key' => IAM_KEY,
                'secret' => IAM_SECRET
            ),
            'version' => 'latest',
            'region'  => 'us-east-2'
        )
    );
?>

<div class="slider_album">
    <div class="main_slider">
        <div class="carousel slide" id="main-carousel" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block img-fluid ss_slider_images_planet" src="images/slider_img.jpg" alt="">
                    <div class="carousel-caption d-md-block ss_bottom_snbjkb ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="ss_new_planet_stream">
                                        <img src="images/P.H cinema.png" alt="images" />
                                    </div>

                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 bd-highlight align-self-center">
                                            <div class="epi_play">
                                                <a href="#">Play <i class="fa fa-play" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight align-self-center">
                                            <div class="ss_main_title_imagemlkm">
                                                <img src="images/cosmic_comedy.png" alt="imges" />
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="#" class="ss_epink">Episodes & info </a>
                                    </h4>
                                    <p>this wekend of the best sesone<br>
                                        for black hall</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- /.carousel-inner -->
        </div>
    </div>
</div>
<section class="ss_section_paddibg">
    <?php
        $category = $db->query("SELECT * FROM phtv_cinema_categories");
        if($category->rowCount() > 0){
            $a = 1;
            while ($fecategory = $category->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="album_box<?= ($a == 1) ? '':'1' ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="album_title">
                        <h3> <?= $fecategory['name'] ?> </h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?php
                        $previews = $db->query("SELECT * FROM phtv_cinema WHERE category_id = '".$fecategory['id']."'");
                        if($previews->rowCount() > 0){
                    ?>
                    <div class="owl-carousel owl-theme" id="album_slider<?= $a ?>">
                        <?php
                            while ($fepreviews = $previews->fetch(PDO::FETCH_ASSOC)) {
                                $cinema_types = $fepreviews['cinema_types'];
                                $types = $db->query("SELECT * FROM phtv_cinema_types WHERE id IN ($cinema_types)");
                                $keyPath = $fepreviews['trailer_link'];
                                $result = $s3->getCommand('GetObject', array(
                                    'Bucket' => BUCKET_NAME,
                                    'Key'    => $keyPath
                                ));
                                $request = $s3->createPresignedRequest($result, '+10 minutes');
                                $signedUrl = (string) $request->getUri();
                        ?>
                        <div class="item">
                            <div class="album_img">
                                <img class="img-fluid" src="images/poster/<?= $fepreviews['poster'] ?>">
                                <div class="ss_album_simages"><img src="images/dss.png" alt="" /></div>
                                <div class="album_info">
                                    <h4><a id="<?= $fepreviews['id'] ?>" class="getEpisodes" data-toggle="modal" data-target=".bd-example-modal-lg">Episodes &
                                            info </a></h4>
                                </div>
                                <div class="main_al_con">
                                    <div class="album_con">
                                        <div class="d-flex bd-highlight">
                                            <div class=" bd-highlight align-self-end">
                                                <div class="album_video">
                                                    <a href="#" data-toggle="modal" data-target="#myModal" id="<?= $signedUrl ?>" class="album_btn copy_to_click"><i class="fa fa-play" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class=" bd-highlight align-self-end">
                                                <div class="link_box">
                                                    <a class="like_cinema" id="<?= $fepreviews['id'] ?>">
                                                        <div class="link_bg">
                                                            <img class="img-fluid" src="images/like.png">
                                                        </div>
                                                    </a>
                                                    <a class="laugh_cinema" id="<?= $fepreviews['id'] ?>">
                                                        <div class="link_bg">
                                                            <img class="img-fluid" src="images/b.png">
                                                        </div>
                                                    </a>
                                                    <a class="normal_cinema" id="<?= $fepreviews['id'] ?>">
                                                        <div class="link_bg">
                                                            <img class="img-fluid" src="images/g.png">
                                                        </div>
                                                    </a>
                                                    <a class="unlike_cinema" id="<?= $fepreviews['id'] ?>">
                                                        <div class="link_bg">
                                                            <img class="img-fluid" src="images/dislike.png">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ml-auto  bd-highlight align-self-end">
                                                <div class="model_youhave_images">
                                                    <img src="images/cosmic_comedy.png" alt="imges">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="album_text mr-auto">
                                            <div class="ss_Genres">
                                                <ul>
                                                    <?php while ($fetypes = $types->fetch(PDO::FETCH_ASSOC)){ ?>
                                                        <li><?= $fetypes['name'] ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } else { ?>
                        <div class="text-center">
                            <h3>No Videos Available</h3>
                        </div>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php $a++; } } else { ?>
    <div class="album_box1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="album_title text-center p-5">
                        <h1> No Cinemas Available </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="episode_information">
            <div class="epi_img">
                <div class="model_imagesss">
                    <img class="img-fluid" src="images/modal_bg.jpg">
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
                                    <h5><span>2020</span></h5>
                                    <h6>16+</h6>
                                    <h5><span>2 Seasons</span></h5>
                                </div>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="epi_modal_title">
                                <div class="epi_title mr-auto">Episodes</div>
                                <div class="epi_select">
                                    <select class="">
                                        <option value="" data-display-text="Season 1">None</option>
                                        <option value="apples">Season 1</option>
                                        <option value="bananas">Season 2</option>
                                        <option value="oranges">Season 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11 ml-auto mr-auto mt-5">
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">1.</div>
                                <div class="modal_epi_video">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me1.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">2.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me2.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">3.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me3.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">4.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me4.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">5.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me5.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">6.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me2.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="epi_number_con">
                                <div class="epi_number align-self-center">7.</div>
                                <div class="modal_epi_video bg_none">
                                    <div class="modal_epi_img">
                                        <img class="img-fluid" src="images/me3.jpg">
                                        <div class="epi_play_box">
                                            <i class="fa fa-play" aria-hidden="a"></i>
                                        </div>
                                    </div>
                                    <div class="modal_epi_con">
                                        <h4>We Only See Each Other at Wedding and Funerals</h4>
                                        <p>Years after they rose to fame as young crime-fighting superheroes, the
                                            estranged Hargreeves sibling .com together to make their father’s death.</p>
                                        <h5>05 : 59 m</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog ss_video_model modal-dialog-centered" role="document">
        <div class="modal-content ss_video_round">
            <div class="">
                <button type="button" class="close ss_close_bua" data-dismiss="modal" aria-label="Close">
                    <img src="images/closea.svg" alt="images">
                </button>
            </div>
            <div class="modal-body">
                <video controls id="video1">
                    <source id="cinematic_video" src="images/fims.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>
<?php
    include('footer.php');
?>

<script>
$('.copy_to_click').on('click', function() {
    let url = $(this).attr('id');
    $("#cinematic_video").attr("src", url);
    $('#video1')[0].pause();
    $('#video1')[0].load();
    $('#video1')[0].oncanplaythrough = $('#video1')[0].play();
})
$('#myModal').on('hidden.bs.modal', function() {
    $('#video1')[0].pause();
})
</script>
<script type="text/javascript">
    $('.like_cinema').on('click', function() {
        let cinema_id = $(this).attr('id');
        $.ajax({
            url: 'resources/cinema_review',
            type: 'POST',
            data: {
                cinema_id: cinema_id,
                like:1,
                unlike:0,
                laugh:0,
                normal:0
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    })
    $('.laugh_cinema').on('click', function() {
        let cinema_id = $(this).attr('id');
        $.ajax({
            url: 'resources/cinema_review',
            type: 'POST',
            data: {
                cinema_id: cinema_id,
                like:0,
                unlike:0,
                laugh:1,
                normal:0
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    })
    $('.normal_cinema').on('click', function() {
        let cinema_id = $(this).attr('id');
        $.ajax({
            url: 'resources/cinema_review',
            type: 'POST',
            data: {
                cinema_id: cinema_id,
                like:0,
                unlike:0,
                laugh:0,
                normal:1
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    })
    $('.unlike_cinema').on('click', function() {
        let cinema_id = $(this).attr('id');
        $.ajax({
            url: 'resources/cinema_review',
            type: 'POST',
            data: {
                cinema_id: cinema_id,
                like:0,
                unlike:1,
                laugh:0,
                normal:0
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    })

    $('.getEpisodes').on('click', function() {
        let cinema_id = $(this).attr('id');
        $.ajax({
            url: 'resources/cinema_episodes',
            type: 'POST',
            data: {
                cinema_id: cinema_id
            },
            success: function(output) {
                $('#episode_information').html(output);
                $('#changeSeason').on('change', function() {
                    let cinema_id = $(this).attr('key');
                    let season = $(this).val();
                    $.ajax({
                        url: 'resources/season_episodes',
                        type: 'POST',
                        data: {
                            cinema_id: cinema_id,
                            season:season
                        },
                        success: function(output) {
                            $('#season_episodes').html(output);
                        }
                    });
                });
            }
        });
    });
</script>
</body>

</html>