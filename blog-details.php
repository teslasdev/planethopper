<?php
   include('header.php');
   $blog_id = base64_decode($_REQUEST['id']);
   $blog = $db->query("SELECT a.*, b.name, c.category_name FROM phtv_blog a LEFT JOIN phtv_blog_auther b ON a.auther_id = b.id LEFT JOIN phtv_blog_category c ON a.category_id = c.id WHERE a.id = '$blog_id'");
   $feblog = $blog->fetch(PDO::FETCH_ASSOC);

   $blog_comments = $db->query("SELECT count(*) as comments FROM phtv_blog_comment WHERE blog_id = '$blog_id'");
    $feblog_comments = $blog_comments->fetch(PDO::FETCH_ASSOC);

    $comments = $db->query("SELECT * FROM phtv_blog_comment WHERE blog_id = '$blog_id'");
?>

<div class="container-fluid ss_blog_details_images">
    <div class="images">
        <img src="images/blog/<?= $feblog['image'] ?>" alt=" blog_images" />
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_blog_details">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="mr-auto p-2 bd-highlight">
                            <h1><?= $feblog['title'] ?></h1>
                        </div>
                        <div class="p-2 bd-highlight">
                            <a id="<?= $blog_id ?>" class="like_and_dislike like_user">
                                <img src="images/like.png" /> <span id="blog_likes"><?= $feblog['likes'] ?> Liked</span>
                            </a>
                        </div>
                        <div class="p-2 bd-highlight">
                            <a id="<?= $blog_id ?>" class="like_and_dislike dislike_user">
                                <img src="images/dislike.png" /> <span id="blog_dislikes"><?= $feblog['dislikes'] ?>
                                    Dislike</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight mb-3 ss_blo_category_details">
                        <div class="p-2 bd-highlight align-self-center">
                            <h6>Posted by </h6>
                            <span> <?= $feblog['name'] ?> on <?= date('F d, Y', strtotime($feblog['created_at'])) ?>
                            </span>
                        </div>
                        <div class="p-2 bd-highlight align-self-center">
                            <h6> Category : </h6>
                            <span> <?= $feblog['category_name'] ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($feblog['video'] != ''){ ?>
<div class="container-fluid ss_blog_detailsss">
    <div class="container">
        <div class="container-fluid ss_padding_live_events">
            <div class="ss_live_video">
                <div class="video_images">
                    <!-- <img src="images/slider_img.jpg" alt="video"> -->
                    <video id="my-video" class="video-js vjs-theme-fantasy" controls preload="auto" width="100%"
                        height="100%" poster="images/blog/<?= $feblog['image'] ?>" data-setup="{}">
                        <source src="images/blog/<?= $feblog['video'] ?>" type="video/mp4" />
                    </video>
                    <div class="ss_video_back_info">
                        <div class="d-flex bd-highlight">
                            <!-- <div class="p-2 flex-grow-1 bd-highlight">
                                <a href="#" class="ss_back_arrow">
                                    <img src="images/left_arrow.svg" alt="images" />
                                </a>
                            </div> -->
                            <!-- <div class="p-2 bd-highlight">
                                <a href=" #" class="ss_info_icons" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </a>
                            </div> -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="container-fluid ss_blog_detailsss">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p><?= $feblog['description'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid sscomments_ss">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex bd-highlight mb-3">
                    <div class="p-2 bd-highlight align-self-center">
                        <div class="ss_commentss">
                            <h2> Comments </h2>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight align-self-center">
                        <div class="blog_comments">
                            <a href="#"> <i class="fa fa-comments" aria-hidden="true"></i> </a>
                            <span> <?= $feblog_comments['comments'] ?> </span>
                        </div>
                    </div>
                </div>
                <?php if ($feblog_comments['comments'] > 0) {
                    while ($fecomments = $comments->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="d-flex bd-highlight ss_user_comments">
                    <div class="p-2  bd-highlight align-self-center align-self-xl-start">
                        <div class="images">
                            <img src="images/profilesA.jpg" alt="profiles" />
                        </div>
                    </div>
                    <div class="p-2 bd-highlight align-self-center align-self-xl-start">
                        <h5><?= $fecomments['name'] ?></h5>
                        <span><?= date('F d, Y',strtotime($fecomments['created_at'])) ?> at
                            <?= date('H:i A',strtotime($fecomments['created_at'])) ?>
                        </span>
                        <p> <?= $fecomments['comment'] ?> </p>
                    </div>
                </div>
                <?php } } else { ?>
                <div class="d-flex bd-highlight ss_user_comments">
                    <div class="text-center">
                        <h5>No Comments Available</h5>
                    </div>
                </div>
                <?php }?>
                <div class="ss_comments_leave">
                    <div class="ss_commentss">
                        <h2> Leave a comment </h2>
                    </div>
                    <form id="submitComment" method="post">
                        <input type="hidden" name="blog_id" id="blog_id" value="<?= $blog_id ?>">
                        <div class="row pt-4">
                            <div class="col-lg-6 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <input type="text" name="comment_name" id="comment_name" required
                                        class="form-control" placeholder=" Your Name ">
                                </div>
                            </div>
                            <div class="col-lg-6 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <input type="email" name="comment_email" id="comment_email" required
                                        class="form-control" placeholder=" E-mail ">
                                </div>
                            </div>
                            <div class="col-lg-12 text-left align-self-center ">
                                <div class="form-group ss_textbox">
                                    <textarea class="form-control" name="comment" id="comment" required
                                        placeholder="Your Comment" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-left align-self-center ss_post_comments ">
                                <button type="submit"> Post Comment <span> <i class="fa fa-arrow-right"
                                            aria-hidden="true"></i> </span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

<?php
    include('footer.php');
?>
<script>
$(document).ready(function() {
    function showLoading() {
        document.getElementById("page-loader").style = "visibility: visible";
    }

    function hideLoading() {
        document.getElementById("page-loader").style = "visibility: hidden";
    }
    $("#submitComment").validate({
        rules: {
            comment_name: "required",
            comment_email: {
                required: true,
                email: true
            },
            comment: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            comment_name: "Please enter your name",
            comment_email: {
                required: "Please provide a email address",
                email: "Please enter valid email"
            },
            comment: {
                required: "Please provide a comment",
                minlength: "Your password must be at least 5 characters long"
            },
        },
        submitHandler: function(form) {
            var blog_id = "<?= $_REQUEST['id'] ?>";
            $("#preloder").fadeIn();
            $.ajax({
                url: 'resources/add_blog_comments',
                type: 'POST',
                data: $('#submitComment').serialize(),
                dataType: 'JSON',
                success: function(output) {
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'blog-details?id=' + blog_id;
                        }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        $("#preloder").fadeOut();
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    $("#preloder").fadeOut();
                    toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
                }
            });
        }
    });
    $(document).on('click', '.like_user', function() {
        var blog_id = $(this).attr('id');
        $.ajax({
            url: 'resources/blog_like',
            type: 'POST',
            data: {
                blog_id: blog_id
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    $('#blog_likes').html(output.likes + ' Liked');
                    $('#blog_dislikes').html(output.dislike + ' Dislike');
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
        var blog_id = $(this).attr('id');
        $.ajax({
            url: 'resources/blog_dislike',
            type: 'POST',
            data: {
                blog_id: blog_id
            },
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    $('#blog_likes').html(output.likes + ' Liked');
                    $('#blog_dislikes').html(output.dislike + ' Dislike');
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