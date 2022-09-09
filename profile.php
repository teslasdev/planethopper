<?php
   include('header.php');
   include('profile-header.php');
?>
<div class="container-fluid ss_navbar_profiles_css">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 col-sm-3 ss_padding_0 ">
                <div class="nav flex-column nav-pills ss_profiles_navbar">
                    <a class="nav-link  active" href="profile">My Profile</a>
                    <a class="nav-link " href="supercoin_balance">Payload Coin Balance</a>
                    <a class="nav-link" href="#">My Stash</a>
                    <a class="nav-link" href="my-order">My Orders</a>
                    <a class="nav-link" href="message"> Messages </a>
                    <a class="nav-link" href="change-password">Change Password</a>
                </div>
            </div>
            <div class="col-12 col-lg-10 col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="ss_navbar_profiles_boxs">
                            <h1 class="ss_profiles_title"> Personal Information </h1>
                            <form id="updateProfile">
                                <div class="row">
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="full_name"> Full Name </label>
                                            <input type="text" class="form-control" id="full_name" name="full_name"
                                                aria-describedby="emailHelp" placeholder="Full Name "
                                                value="<?= $feuser['full_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="email"> Email Address </label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="emailHelp" placeholder="Email Address "
                                                value="<?= $feuser['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <div class="form-group ss_textbox">
                                            <label for="mobile"> Mobile Number </label>
                                            <input type="  " class="form-control" id="mobile" name="mobile"
                                                aria-describedby="emailHelp" placeholder=" Mobile Number "
                                                value="<?= $feuser['mobile'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-4 text-right">
                                        <button type="submit" class="button_register"> Edit Profile </button>
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
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'profile'");
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
   include('footer.php');
?>

<script>
$(document).ready(function() {
    $("#updateProfile").validate({
        rules: {
            full_name: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                minlength: 9,
                maxlength: 10,
                number: true
            }
        },
        messages: {
            full_name: "Please enter your full name",
            mobile: {
                required: "Please provide a mobile",
                minlength: "Your mobile number must be at least 10 digit long"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function(form) {
            $("#preloder").fadeIn();
            $.ajax({
                url: 'resources/updateProfile',
                type: 'POST',
                data: $('#updateProfile').serialize(),
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
                    toastr.warning('Update profile not successfully').delay(1000)
                        .fadeOut(1000);
                }
            });
        }
    });
});
</script>

</body>

</html>