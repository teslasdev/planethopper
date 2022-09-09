<?php
   include('header.php');
?>

<div class="container-fluid ss_login_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="ss_login_box">
                    <div class="login_logo">
                        <img src="images/planethopper-TV-logo.png" alt="login-logo"/>
                    </div>
                    <p>Reset your Password</p>
                    <form id="reset-password-form" method="post">
                        <input type="hidden" id="Email" name="Email" value="<?= base64_decode($_REQUEST['Email']) ?>" class="form-control"/>
                        <input type="hidden" id="old_password" name="old_password" value="<?= $_REQUEST['Password'] ?>" class="form-control"/>
                        <div class="row">
                            <div class="col-lg-12 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <label for="password"> Password </label>
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <label for="confirm_password"> confirm_password </label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <button type="submit" class="button_register"> Reset Password</button>
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
    $(document).ready(function () {

        function showLoading(){
            document.getElementById("page-loader").style = "visibility: visible";
        }
        function hideLoading(){
            document.getElementById("page-loader").style = "visibility: hidden";
        }
        $("#reset-password-form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo :"#password"
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo:"Password and confirm password are not match"
                }
            },
            submitHandler: function(form) {
                $("#preloder").fadeIn();
                $.ajax({
                    url: 'resources/reset_password',
                    type: 'POST',
                    data: $('#reset-password-form').serialize(),
                    dataType : 'JSON',
                    success: function (output) {
                        if(output.success == 'success'){
                            toastr.options.onHidden = function() { window.location.href = 'login'; }
                            toastr.success(output.message).delay(1000).fadeOut(1000);
                        } else {
                            $("#preloder").fadeOut();
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }
                    },
                    error: function(){
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