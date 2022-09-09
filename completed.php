<?php
   include('header.php');
?>

<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> Checkout </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    personal digital assistants.
                    Facebook and Microsoft announced major investments into conversational.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_shopping_cart_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ss_shopping_box">
                    <div class="ss_complated">
                        <a href="#"> <img src="images/shopping.svg" alt="images"> Completed </a>
                    </div>
                    <div class="ss_shopping_process">
                        <div class="d-flex bd-highlight justify-content-center">
                            <div class="p-2  bd-highlight align-self-center ">
                                <a href="shopping-cart" class="ss_Shopping_boxi">
                                    Shopping Cart
                                    <div class="boxiA">1</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="checkout" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ">
                                <a href="checkout" class="ss_Shopping_boxi">
                                    Checkout
                                    <div class="boxiA">2</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="completed" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center active">
                                <a href="completed" class="ss_Shopping_boxi">
                                    Completed
                                    <div class="boxiA">3</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ss_thanks_you">
                    <div class="ss_thnaks_images">
                        <img src="images/Check_out_bot.png" alt="images" />
                    </div>
                    <div class="">
                        <h2> Thanks for shopping with Us! </h2>
                        <div class="liness"></div>
                        <p> Your items are being collected and you will receive e-mail confirmation shortly. have a
                            great day!
                        </p>
                        <a class="button_register" href="product">Continue Shopping</a>
                    </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content details_contents">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="images/cancel.svg" alt="images" />
                </button>
            </div>
            <div class="modal-body">
                <div class="ss_details_model">
                    <div class="row">
                        <div class="col-lg-5 align-self-center">
                            <div class="owl-carousel owl-theme" id="ss_slider_details">
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 align-self-center">
                            <div class="ss_blog_details_des">
                                <h2> Cuffed Beanie Planet Hopper TV </h2>
                                <h5> 200.00 WAX <span> ($58.64) </span></h5>
                                <p>
                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                    excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui
                                    officia deserunt mollitia animi, id est laborum et dolorum fuga.
                                </p>
                                <ul>
                                    <li>
                                        <span> Sale ID : </span>
                                        <span> #5395761 </span>
                                    </li>
                                    <li>
                                        <span> Collection : </span>
                                        <span> warclanstime </span>
                                    </li>
                                    <li>
                                        <span> Asset Name : </span>
                                        <span> Goldenbeard Bob </span>
                                    </li>
                                    <li>
                                        <span> Asset ID : </span>
                                        <span class="themcolor"> #1099517828729 </span>
                                    </li>
                                    <li>
                                        <span> Mint Number : </span>
                                        <span> 59of179 (max: 300) - 2 </span>
                                    </li>
                                </ul>
                                <div class="ss_model_button">
                                    <a href="#"> Buy for 0.20 WAX </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>

</body>

</html>