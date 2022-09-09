<?php
    if($cur_page != 'login' && $cur_page != 'register'){ ?>
<div class="container-fluid newslattterss_sec0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="newslattterss">
                    <h2> SIGN UP for PARAVERSE Magalog, Its not you average newsletter! </h2>
                    <div class="search_box_neller">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text ss_search_btn" id="basic-addon2"> SIGN UP </span>
                            </div>
                        </div>
                    </div>
                    <p> By signing up for the PARAVERSE newsletter you agree to receive electronic communications from
                        PLANET
                        HOPPER TV that may sometimes include advertisements or sponsored content.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

$earn_reward = $db->query("SELECT * FROM phtv_earn_rewards");
$rewards = array();
while ($feearn = $earn_reward->fetch(PDO::FETCH_ASSOC)) {
    $rewards[$feearn['slug']] = $feearn['description'];
}
?>

<div class="container-fluid ss_main_fotter_links">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_footer_link">
                    <a href="#"> About Us </a>
                    <a href="#"> Contact Us </a>
                    <a href="#"> Privacy Policy </a>
                    <a href="#"> Data Commitment </a>
                    <a href="#"> Terms & Conditions </a>
                    <a href="#"> Write for Us </a>
                </div>
            </div>
        </div>
    </div>
    <div class="last_fotter">
        <div class="d-flex bd-highlight align-self-center">
            <div class="ss_earn_rewards_ab">
                <div class="ss_close_fix_button">
                    <a class="cursor-pointer"> <img src="images/closea.svg" alt="images" /> </a>
                </div>
                <div class="ss_des">
                    <h1> <?= $rewards['header'] ?> </h1>
                    <h4> <?= $rewards['header_title'] ?> </h4>
                </div>
                <p> <?= $rewards['header_description'] ?> </p>
                <div class="ss_aboard">
                    <p><?= $rewards['header_details'] ?></p>
                </div>
                <div class="accordion js-accordion">
                    <div class="accordion__item js-accordion-item">
                        <div class="accordion-header js-accordion-header"> <?= $rewards['questions_title'] ?></div>
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <?= $rewards['questions'] ?>
                            </div>
                        </div><!-- end of accordion body -->
                    </div><!-- end of accordion item -->
                    <div class="accordion__item js-accordion-item ">
                        <div class="accordion-header js-accordion-header"> <?= $rewards['rules'] ?></div>
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <ul>
                                    <li> <?= $rewards['rules1'] ?></li>
                                    <li> <?= $rewards['rules2'] ?></li>
                                    <li> <?= $rewards['rules3'] ?></li>
                                    <li> <?= $rewards['rules4'] ?></li>
                                    <li> <?= $rewards['rules5'] ?></li>
                                    <li> <?= $rewards['rules6'] ?></li>
                                    <li> <?= $rewards['rules7'] ?></li>
                                    <li> <?= $rewards['rules8'] ?></li>
                                    <li> <?= $rewards['rules9'] ?></li>
                                    <li> <?= $rewards['rules10'] ?></li>
                                    <li> <?= $rewards['rules11'] ?></li>
                                </ul>
                            </div>
                        </div><!-- end of accordion body -->
                    </div><!-- end of accordion item -->
                    <div class="accordion__item js-accordion-item">
                        <div class="accordion-header js-accordion-header"><?= $rewards['points_title'] ?></div>
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <div class="ss_login_firstss"><?= $rewards['points_title1'] ?></div>
                                <div class="ss_login_firstss"><?= $rewards['points_title2'] ?></div>
                                <ul>
                                    <li> <?= $rewards['points_description1'] ?></li>
                                    <li> <?= $rewards['points_description2'] ?></li>
                                    <li> <?= $rewards['points_description3'] ?></li>
                                    <li> <?= $rewards['points_description4'] ?></li>
                                </ul>
                            </div>
                        </div><!-- end of accordion body -->
                    </div><!-- end of accordion item -->
                    <div class="accordion__item js-accordion-item">
                        <div class="accordion-header js-accordion-header"> <?= $rewards['rewards_title'] ?></div>
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <h2> <?= $rewards['rewards_description'] ?> </h2>
                                <ul>
                                    <li> <?= $rewards['rewards_1'] ?></li>
                                    <li> <?= $rewards['rewards_2'] ?></li>
                                    <li> <?= $rewards['rewards_3'] ?></li>
                                    <li> <?= $rewards['rewards_4'] ?></li>
                                    <li> <?= $rewards['rewards_5'] ?></li>
                                    <li> <?= $rewards['rewards_6'] ?></li>
                                    <li> <?= $rewards['rewards_7'] ?></li>
                                </ul>
                            </div>
                        </div><!-- end of accordion body -->
                    </div><!-- end of accordion item -->
                </div><!-- end of accordion -->
                <div class="ss_register_button">
                    <a href="#"> Register </a>
                </div>
                <div class="ss_link_footer_fix">
                    <p> Already have account ? <a href="#"> Sign In </a></p>
                    <p> <?= $rewards['footer_title'] ?> </p>
                    <p class="mb-0"> <?= $rewards['footer_points'] ?> </p>
                </div>
            </div>
            <div class="p-2 bd-highlight ">
                <a href="#" class="earn_rewardsss ss_footer_fix_button"> EARN REWARDS </a>
            </div>
            <div class="p-2 flex-fill bd-highlight align-self-center planer_hopper_p">
                <p>PLANET HOPPER TV </p>
                <p> 2020 & Beyond </p>
            </div>
        </div>
    </div>
</div>
<div id="backtop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="slider-plugin/owl.carousel.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/float-panel.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/custom.js"></script>
<script>
function myFunction(x) {
    x.classList.toggle("change");
}
</script>