<?php
   include('header.php');
?>
<div class="container-fluid ss_login_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="ss_login_box">
                    <div class="login_logo">
                        <img src="images/planethopper-TV-logo.png" alt="login-logo" />
                    </div>
                    <p>Already have an account? <a href="<?= BASE_URL.'login.php' ?>"> Login Here </a></p>
                    <form id="register" method="post">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail1"> Full Name </label>
                                    <input type="text" class="form-control" name="fullname" id="fullname"
                                        aria-describedby="emailHelp" placeholder="Enter your fullname " value=""
                                        require>
                                </div>
                            </div>
                            <div class="col-lg-12 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> E-mail </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="E mail " value="" require>
                                </div>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> Password </label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        aria-describedby="emailHelp" placeholder=" Password " require>
                                </div>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> Confirm Password </label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        id="confirm_password" aria-describedby="emailHelp"
                                        placeholder=" Confirm Password " require>
                                </div>
                            </div>
                            <div class="col-lg-12 text-left">
                                <div class="custom-control custom-checkbox mr-sm-2 ss_checkbox">
                                    <input type="checkbox" name="agreetandc" class="custom-control-input"
                                        id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">I agree to the <a
                                            href="#"> Terms of service </a> and <a href="#"> Privacy policy. </a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <button type="submit" id="button_register" class="button_register"> register
                                    now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>

<script>
$('#planet_logo').owlCarousel({
    loop: false,
    margin: 10,
    dots: false,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
});

$(document).ready(function() {

    function showLoading() {
        document.getElementById("page-loader").style = "visibility: visible";
    }

    function hideLoading() {
        document.getElementById("page-loader").style = "visibility: hidden";
    }
    $("#register").validate({
        rules: {
            fullname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            fullname: "Please enter your full name",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Password and confirm password are not match"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function(form) {
            $("#preloder").fadeIn();
            $.ajax({
                url: 'resources/register',
                type: 'POST',
                data: $('#register').serialize(),
                dataType: 'JSON',
                success: function(output) {
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'login';
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
});
</script>
</body>

</html>