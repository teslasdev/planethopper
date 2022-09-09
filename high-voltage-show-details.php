<?php
    include('header.php');
    if(empty($_REQUEST['id'])){
        header("location:high-voltage-show");
    }
    $computerId = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT'].$_SERVER['REMOTE_ADDR']);
    $episode_id =  base64_decode($_REQUEST['id']);
    $views = $db->query("SELECT * FROM phtv_episode_views WHERE episode_id = '$episode_id' AND browser_id = '$computerId'");

    $episode = $db->query("SELECT a.*,b.category_name FROM phtv_voltage_episode a, phtv_voltage_category b WHERE a.category_id = b.id AND a.id = '".$episode_id."'");
    $feepisode = $episode->fetch(PDO::FETCH_ASSOC);

    $total_views = $feepisode['view'];
    if($views->rowCount() == 0){
        $total_views = $total_views + 1;
        $update_view = $db->query("UPDATE phtv_voltage_episode SET view = '$total_views' WHERE id = '$episode_id'");
        $insert_view = $db->query("INSERT INTO phtv_episode_views SET episode_id = '$episode_id', browser_id = '$computerId'");
    }

    $title = $db->query("SELECT * FROM phtv_voltage_title WHERE id = '".$feepisode['voltage_title_id']."'");
    $fetitle = $title->fetch(PDO::FETCH_ASSOC);
    $episodes = $db->query("SELECT a.*,b.category_name FROM phtv_voltage_episode a, phtv_voltage_category b WHERE a.category_id = b.id AND voltage_title_id = '".$feepisode['voltage_title_id']."' AND a.id != '$episode_id'");

    $admin = $db->query("SELECT * FROM phtv_admin WHERE id = '".$feepisode['admin_id']."'");
    $feadmin = $admin->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">
                <div class="ss_live_video">
                    <div class="video_images">
                        <!-- <img src="images/slider_img.jpg" alt="video"> -->
                        <?php if($feepisode['video_type'] == 1){ ?>
                        <video id="my-video" class="video-js vjs-theme-fantasy" controls preload="auto" width="100%"
                            height="100%" poster="images/episode_image/<?= $feepisode['image'] ?>" data-setup="{}">
                            <source src="images/episode_image/<?= $feepisode['video'] ?>" type="video/mp4" />
                        </video>
                        <?php } else { ?>
                        <iframe id="my-video" width="100%" height="100%" src="<?= $feepisode['video'] ?>">
                        </iframe>
                        <?php } ?>
                        <div class="ss_button_play_puch">
                        </div>
                        <div class="ss_video_back_info">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <a href="high-voltage-show" class="ss_back_arrow">
                                        <img src="images/left_arrow.svg" alt="images" />
                                    </a>
                                </div>
                                <div class="p-2 bd-highlight">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ss_video_des">
                    <h2><?= $feepisode['title'] ?></h2>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">
                            <div class="d-flex bd-highlight align-self-center">
                                <div class="  bd-highlight align-self-center">
                                    <div class="profiles_images">
                                        <?php if(empty($feadmin['admin_avatar'])){ ?>
                                        <img src="images/profilesA.jpg" alt="profile_images">
                                        <?php } else { ?>
                                        <img src="images/<?= $feadmin['admin_avatar'] ?>" alt="profile_images">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="p-4  bd-highlight align-self-center">
                                    <div class="ss_profile_des">
                                        <h2><?= $feadmin['admin_name'] ?></h2>
                                        <p> Main Character (as Roberto) </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight ss__right_mobile_left align-self-center ">
                            <a href="#" class="like_and_dislike">
                                <img src="images/view_A.png"> <span> <?= $total_views ?> viewers </span>
                            </a>
                            <a id="<?= $episode_id ?>" class="like_and_dislike like_user">
                                <img src="images/like.png"> <span id="episode_likes"><?= $feepisode['likes'] ?>
                                    Liked</span>
                            </a>
                            <a id="<?= $episode_id ?>" class="like_and_dislike dislike_user">
                                <img src="images/dislike.png"> <span id="episode_dislikes"><?= $feepisode['dislike'] ?>
                                    Dislike</span>
                            </a>
                        </div>
                    </div>
                    <div class="desss">
                        <?= $feepisode['description'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-12  align-self-center">
                <div class="main_title">
                    <h1> <?= $fetitle['name'] ?> </h1>
                </div>
            </div>
            <div class="col-lg-6  col-5 align-self-center text-right">
            </div>
        </div>
        <div class="row episodes_sections">
            <?php 
            if($episodes->rowCount() > 0){
                while ($feepisodes = $episodes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <a href="high-voltage-show-details?id=<?= base64_encode($feepisodes['id']) ?>">
                    <div class="episodes_blogs">
                        <div class="images">
                            <img src="images/episode_image/<?= $feepisodes['image'] ?>" alt="episodes" />
                        </div>
                        <div class="des text-white">
                            <p><?= $feepisodes['category_name'] ?></p>
                            <h2> <?= $feepisodes['title'] ?> </h2>
                            <p> <?= date('F d, Y',strtotime($feepisodes['created_at'])) ?> </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } 
                } else { ?>
            <div class="col-lg-12 col-sm-12 col-md-12 text-center">
                <h2> No more Episode Available </h2>
            </div>
            <?php } ?>
        </div>
    </div>
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
<script>
$(document).ready(function() {
    $(document).on('click', '.like_user', function() {
        var episode_id = $(this).attr('id');
        $.ajax({
            url: 'resources/episode_like',
            type: 'POST',
            data: {
                episode_id: episode_id
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    $('#episode_likes').html(output.likes + ' Liked');
                    $('#episode_dislikes').html(output.dislike + ' Dislike');
                    // toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    });
    $(document).on('click', '.dislike_user', function() {
        var episode_id = $(this).attr('id');
        $.ajax({
            url: 'resources/episode_dislike',
            type: 'POST',
            data: {
                episode_id: episode_id
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    $('#episode_likes').html(output.likes + ' Liked');
                    $('#episode_dislikes').html(output.dislike + ' Dislike');
                    // toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function() {
                toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
            }
        });
    });
});
</script>
</body>

</html>