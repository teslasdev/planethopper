<?php
   include('header.php');
?>

<div class="container-fluid ss_login_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ss_login_box">
                    <div class="login_logo">
                        <img src="images/planethopper-TV-logo.png" alt="login-logo"/>
                    </div>
                    <p>Already have an account? <a href="<?= BASE_URL.'login.php' ?>"> Login Here </a></p>
                    <form id="forgort-form" method="post">
                        <div class="row">
                            <div class="col-lg-12 text-left align-self-center">
                                <div class="form-group ss_textbox">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <button type="submit" class="button_register"> Forgot Password</button>
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

        $("#forgort-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required:"Please enter email address",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function(form) {
                $("#preloder").fadeIn();
                $.ajax({
                    url: 'resources/forgort_password',
                    type: 'POST',
                    data: $('#forgort-form').serialize(),
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
                        toastr.warning('Signup not successfully').delay(1000).fadeOut(1000);
                    }
                });
            }
        });
    });
</script>
</body>
</html>