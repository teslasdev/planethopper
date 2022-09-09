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
                    <p>Didn't have an account yet? <a href="<?= BASE_URL.'register.php' ?>"> Register Here </a></p>
                    <form id="login-form" method="post">
                        <div class="row">
                            <div class="col-lg-12 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-lg-12 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <label for="password"> Password </label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        aria-describedby="emailHelp" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-6 text-left align-self-center">
                                <div class="custom-control custom-checkbox mr-sm-2 ss_checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing"> Remember
                                        Me </label>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right align-self-center">
                                <a href="forgot-password.php" class="forgot_password"> Forgot Password? </a>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <button type="submit" class="button_register"> LOG IN</button>
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

    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please provide a password"
            },
        },
        submitHandler: function(form) {
            $("#preloder").fadeIn();
            $.ajax({
                url: 'resources/login',
                type: 'POST',
                data: $('#login-form').serialize(),
                dataType: 'JSON',
                success: function(output) {
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'index';
                        }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else if (output.success == 'shopping-cart') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'shopping-cart';
                        }
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