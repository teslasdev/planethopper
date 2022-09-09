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
                    <p>Activate your account</p>
                    <form id="activate" method="post">
                        <div class="row">
                            <input type="hidden" name="email" value="<?= $_GET['Email'] ?>">
                            <input type="hidden" name="user_id" value="<?= $_GET['key'] ?>">
                            <div class="col-lg-12 pt-4">
                                <button type="submit" id="button_register" class="button_register"> Activate Now</button>
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
        $("#activate").submit(function(e) {
            $("#preloder").fadeIn();
            e.preventDefault();
            $.ajax({
                url: 'resources/activatAccount',
                type: 'POST',
                data: $('#activate').serialize(),
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
        });
    });
</script>
</body>
</html>