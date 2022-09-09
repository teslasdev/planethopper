<?php
    include('header.php');
    $nft_id =  base64_decode($_REQUEST['id']);
    $nft = $db->query("SELECT a.*, b.name as category_name, c.name as collection_name FROM phtv_nft_info a, phtv_nft_categories b, phtv_nft_collection c WHERE a.collection_id = c.id AND a.category_id = b.id AND a.id = '$nft_id'");
    $fenft = $nft->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid ss_marketplace_details">
    <div class="container">
        <div class="ss_details_model">
            <div class="row">
                <div class="col-lg-3 align-self-center">
                    <div class="owl-carousel owl-theme" id="ss_slider_details">
                        <div class="item">
                            <?php if($fenft['image_type'] == 'image'){ ?>
                            <div class="ss_model_images ss_nft_marketplace_images">
                                <img src="images/nft_info_image/<?= $fenft['image'] ?>" alt="details" />
                            </div>
                            <?php } else if($fenft['image_type'] == 'gif'){ ?>
                            <div class="ss_model_images ss_vertical_align_middle">
                                <img src="images/nft_info_image/<?= $fenft['image'] ?>" alt="details" />
                            </div>
                            <?php } else if($fenft['image_type'] == 'video'){ ?>
                            <div class="ss_model_images ss_nft_marketplace_images">
                                <div class="ss_nft_middles">
                                    <video width="670" height="500" controls>
                                        <source src="images/nft_info_image/<?= $fenft['image'] ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <?php } else if($fenft['image_type'] == 'audio'){ ?>
                            <div class="ss_model_images  ss_nft_marketplace_images">
                                <img src="images/nft_info_image/<?= $fenft['thumbnail'] ?>" alt="images"
                                    class="audio_thumbnail_details" />
                                <audio controls poster='images/planethopper-TV-logo.png'>
                                    <source src="images/nft_info_image/<?= $fenft['image'] ?>" type="audio/mpeg">
                                </audio>
                            </div>
                            <?php } else { ?>
                            <div class="ss_model_images">
                                <img src="images/planethopper-TV-logo.png" alt="images" />
                            </div>
                            <?php } ?>
                        </div>
                        <!-- <div class="item">
                            <div class="ss_model_images">
                                <img src="images/nft_info_image/<?= $fenft['image'] ?>" alt="details" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="ss_model_images">
                                <img src="images/nft_info_image/<?= $fenft['image'] ?>" alt="details" />
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 align-self-center">
                    <div class="ss_blog_details_des">
                        <h2> <?= $fenft['name'] ?> </h2>
                        <h5> <?= $fenft['price'] ?> USD <span> ($58.64) </span></h5>
                        <p><?= $fenft['description'] ?></p>
                        <ul>
                            <li>
                                <span> Sale ID : </span>
                                <span> <?= $fenft['sale_id'] ?> </span>
                            </li>
                            <li>
                                <span> Collection : </span>
                                <span> <?= $fenft['collection_name'] ?> </span>
                            </li>
                            <li>
                                <span> Asset Name : </span>
                                <span> <?= $fenft['assets_name'] ?> </span>
                            </li>
                            <li>
                                <span> Asset ID : </span>
                                <span class="themcolor"> <?= $fenft['assets_id'] ?> </span>
                            </li>
                            <li>
                                <span> Mint Number : </span>
                                <span> <?= $fenft['meant_no'] ?> (max: 300) - 2 </span>
                            </li>
                        </ul>
                        <div class="ss_model_button">
                            <a href="#"> Buy for 0.20 Pay </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_main_attributes ">
    <div class="container">
        <div class="col-lg-12">
            <div class="ss_attributes_section">
                <h2> Immutable Attributes </h2>
                <ul class="ss_immitable_Des">
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> name</div>
                            <div class="flex-fill bd-highlight"><?= $fenft['attribute_name'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> img</div>
                            <div class="flex-fill bd-highlight"><?= $fenft['attribute_image'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> backimg</div>
                            <div class="flex-fill bd-highlight"><?= $fenft['attribute_bg_image'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> object</div>
                            <div class="flex-fill bd-highlight"><?= $fenft['attribute_object'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> object_collection</div>
                            <div class="flex-fill bd-highlight"> <?= $fenft['attribute_object_collection'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> object_number</div>
                            <div class="flex-fill bd-highlight"> <?= $fenft['attribute_object_no'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> border_color</div>
                            <div class="flex-fill bd-highlight"> <?= $fenft['attribute_border_color'] ?></div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex bd-highlight">
                            <div class=" bd-highlight"> border_type</div>
                            <div class="flex-fill bd-highlight"> <?= $fenft['attribute_border_type'] ?></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_price_history_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ss_price_history">
                <h2> Price History </h2>
                <p> This price history is based on all NFT sales with the same template ID, but the price might
                    fluctuate for specific NFTs </p>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-3">
                <div class="price_history_box">
                    Suggested Price
                    0.60 USD($0.17)
                </div>
            </div>
            <div class="col-lg-3">
                <div class="price_history_box">
                    Min 0.01 USD($0.00)
                </div>
            </div>
            <div class="col-lg-3">
                <div class="price_history_box">
                    Max
                    50.00 USD($14.26)
                </div>
            </div>
            <div class="col-lg-3">
                <div class="price_history_box">
                    Sales
                    22
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_trading_history">
                    <h2><img src="images/noun_swap_2283375.svg" alt="images"> Trading History </h2>
                    <div class="filtter_ss">
                        <a href="#" class="d-flex bd-highlight Filter_down ">
                            <div class=" bd-highlight"> Filter</div>
                            <div class="ml-auto  bd-highlight"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        </a>
                        <div class="ss_trading_box">
                            <ul>
                                <li>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input"
                                            id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">
                                            Listings </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input"
                                            id="customControlAutosizing2">
                                        <label class="custom-control-label" for="customControlAutosizing2">Sales</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input"
                                            id="customControlAutosizing6">
                                        <label class="custom-control-label" for="customControlAutosizing6">
                                            Bids </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input"
                                            id="customControlAutosizing8">
                                        <label class="custom-control-label" for="customControlAutosizing8">
                                            Trasfers </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ss_main_trading">
                        <div class=" table-responsive">
                            <table class="table table-striped header-fixed">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Asset Price</th>
                                        <th>Quantity sold or traded</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th> Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                    <tr>
                                        <td class="filterable-cell"><span> <i class="fa fa-tag" aria-hidden="true"></i>
                                                List</span>
                                        </td>
                                        <td class="filterable-cell"><span>Ξ</span> <span>0.0166</span></td>
                                        <td class="filterable-cell"><span>2</span></td>
                                        <td class="filterable-cell">
                                            <div class="d-flex bd-highlight">
                                                <div class=" pr-2 bd-highlight align-self-center">
                                                    <div class="ss_trading_profiles">
                                                        <img src="images/unnamed.jpg" alt="profiles" />
                                                    </div>
                                                </div>
                                                <div class=" flex-fill bd-highlight align-self-center">
                                                    CryptoFinanceTeam
                                                </div>
                                            </div>
                                        </td>
                                        <td class="filterable-cell"><span></span></td>
                                        <td class="filterable-cell"><span> an hour ago</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_lastday_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class=" active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Last Days</a>
                        </li>
                        <li class="nav-item">
                            <a class="" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Last Sales</a>
                        </li>
                    </ul>
                    <div class="tab-content ss_chart_tabdes" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <canvas id="myChart" width="100%" height=""></canvas>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <canvas id="myChart1" width="100%" height=""></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'nft_marketplace_details'");
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
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['4 APR', '5 APR', '6 APR', '7 APR', '8 APR', '9 APR'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['4 APR', '5 APR', '6 APR', '7 APR', '8 APR', '9 APR'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>

</html>