<?php
   include('header.php');
   if(!isset($_SESSION['userid'])){
        header("Location: login.php"); 
        exit();
   }
   $user_id = $_SESSION['userid'];
   $user = $db->prepare("SELECT * FROM phtv_users WHERE id = '$user_id'");
   $user->execute();
   $feuser = $user->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> My Profile </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    <br />
                    personal digital assistants.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="ss_profiles_box">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 w-100 bd-highlight align-self-center">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_profile_imges">
                                        <img src="images/profilesA.jpg" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_profile_des">
                                        <h4><?= $feuser['full_name'] ?></h4>
                                        <p><?= $feuser['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 flex-shrink-1 bd-highlight align-self-center">
                            <div class="episode_button">
                                <a href="resources/logout"> <img src="images/logout.svg" alt="images"> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_navbar_profiles_css">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 col-sm-3 ss_padding_0">
                <div class="nav flex-column nav-pills ss_profiles_navbar">
                    <a class="nav-link  " href="profile">My Profile</a>
                    <a class="nav-link " href="supercoin_balance">Payload Coin Balance</a>
                    <a class="nav-link" href="#">My Stash</a>
                    <a class="nav-link" href="my-order">My Orders</a>
                    <a class="nav-link" href="message"> Messages </a>
                    <a class="nav-link active" href="change-password">Change Password</a>

                </div>
            </div>
            <div class="col-12 col-lg-10 col-sm-9 ">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="ss_navbar_profiles_boxs">

                            <div class="change_pass">
                                <h1 class="ss_profiles_title"> Change Password </h1>
                                <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                    excepturi sint occaecati cupiditate
                                </p>

                            </div>

                            <form id="changepassword" method="post">
                                <div class="row">
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="current_password"> Current Password </label>
                                            <input type="password" class="form-control" name="current_password"
                                                id="current_password" aria-describedby="emailHelp"
                                                placeholder="Current Password ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="new_password"> New Password </label>
                                            <input type="password" class="form-control" name="new_password"
                                                id="new_password" aria-describedby="emailHelp"
                                                placeholder="New Password ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="confirm_password"> Confirm Paassword </label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                id="confirm_password" aria-describedby="emailHelp"
                                                placeholder=" Confirm Paassword ">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 pt-4 text-right">
                                        <button type="submit" class="button_register"> Change Password </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'change_password'");
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
$(document).ready(function() {
    $("#changepassword").validate({
        rules: {
            current_password: "required",
            new_password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#new_password"
            }
        },
        messages: {
            current_password: "Please enter your current password",
            new_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a confirm password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Password and confirm password are not match"
            }
        },
        submitHandler: function(form) {
            $("#preloder").fadeIn();
            $.ajax({
                url: 'resources/changepassword',
                type: 'POST',
                data: $('#changepassword').serialize(),
                dataType: 'JSON',
                success: function(output) {
                    if (output.success == 'success') {
                        $("#preloder").fadeOut();
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        $("#preloder").fadeOut();
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    $("#preloder").fadeOut();
                    toastr.warning('Something wants wrong').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});
</script>

</body>

</html>