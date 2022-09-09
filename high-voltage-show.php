<?php
   include('header.php');
   $logo = $db->query("SELECT * FROM phtv_voltage_logo");
   $titles = $db->query("SELECT * FROM phtv_voltage_title");
?>

<div class="container-fluid ss_high_voltage_show ss_height100vh ">
    <div class="verticle_middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center ss_high_voltage_sub">

                    <div class="images_sspatload">
                        <img src="images/Hivo_3x.png" alt="images">
                    </div>

                    <h2> Check Out High Voltage Our Flagship show </h2>
                    <div class="liness"></div>
                    <p> Full Size Run is a weekly talk show about sneakers and style hosted by rapper Trinidad Jame$,
                        Matt Welty, and Brendan Dunne. Each episode, the hosts discuss and debate the hottest topics in
                        sneaker culture and streetwear. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ss_logo_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" id="planet_logo_show">
                    <?php while ($felogo = $logo->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="item">
                        <div class="ss_logo_box">
                            <img src="images/high_voltage_logos/<?= $felogo['image'] ?>" alt="logo" />
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    while ($fetitles = $titles->fetch(PDO::FETCH_ASSOC)) {
        $episode = $db->query("SELECT a.*,b.category_name FROM phtv_voltage_episode a, phtv_voltage_category b WHERE a.category_id = b.id AND voltage_title_id = '".$fetitles['id']."'");
?>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-7 align-self-center">
                <div class="main_title">
                    <h1> <?= $fetitles['name'] ?> </h1>
                </div>
            </div>
            <div class="col-lg-6 col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="all-high-voltage-show?id=<?= base64_encode($fetitles['id']) ?>"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <?php 
            if($episode->rowCount() > 0){
                while ($feepisode = $episode->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <a href="high-voltage-show-details?id=<?= base64_encode($feepisode['id']) ?>">
                    <div class="episodes_blogs">
                        <div class="images">
                            <img src="images/episode_image/<?= $feepisode['image'] ?>" alt="episodes" />
                        </div>
                        <div class="des text-white">
                            <p><?= $feepisode['category_name'] ?></p>
                            <h2> <?= $feepisode['title'] ?> </h2>
                            <p> <?= date('F d, Y',strtotime($feepisode['created_at'])) ?> </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } 
                } else { ?>
            <div class="col-lg-12 col-sm-12 col-md-12 text-center">
                <h2> No Episode Available </h2>
            </div>
            <?php } ?>
            <!-- <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="episodes_blogs">
                    <div class="images">
                        <img src="images/episodesB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Melody Ehsani Explains Why Her Air Jordans </h2>
                        <p> Mar 26, 2021 </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="episodes_blogs">
                    <div class="images">
                        <img src="images/episodesC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Melody Ehsani Explains Why Her Air Jordans </h2>
                        <p> Mar 26, 2021 </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="episodes_blogs margin-right0">
                    <div class="images">
                        <img src="images/episodesD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <h2> Melody Ehsani Explains Why Her Air Jordans </h2>
                        <p> Mar 26, 2021 </p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php } ?>
<!-- <div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-7 align-self-center">
                <div class="main_title">
                    <h1> Stock Raving </h1>
                </div>
            </div>
            <div class="col-lg-6 col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="#"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/stockA.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/stockB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/stockC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs margin-right0">
                    <div class="images">
                        <img src="images/stockD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-7  align-self-center">
                <div class="main_title">
                    <h1> Gamer Girl </h1>
                </div>
            </div>
            <div class="col-lg-6  col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="#"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/gamerA.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/gamerB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/gamerC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs margin-right0">
                    <div class="images">
                        <img src="images/gamerD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-7  align-self-center">
                <div class="main_title">
                    <h1> Kicking & streaming </h1>
                </div>
            </div>
            <div class="col-lg-6  col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="#"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/kickingA.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/kickingB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/kickingC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs margin-right0">
                    <div class="images">
                        <img src="images/kickingD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-7  align-self-center">
                <div class="main_title">
                    <h1> Sports Spectrum </h1>
                </div>
            </div>
            <div class="col-lg-6  col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="#"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/sportsA.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/sportsB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/sportsC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs margin-right0">
                    <div class="images">
                        <img src="images/sportsD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid stock_raving_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-7  align-self-center">
                <div class="main_title">
                    <h1> 4everFit </h1>
                </div>
            </div>
            <div class="col-lg-6  col-5 align-self-center text-right">
                <div class="episode_button">
                    <a href="#"> View All </a>
                </div>
            </div>
        </div>
        <div class="row episodes_sections">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/4everFitA.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/4everFitB.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs">
                    <div class="images">
                        <img src="images/4everFitC.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="stock_blogs margin-right0">
                    <div class="images">
                        <img src="images/4everFitD.jpg" alt="episodes" />
                    </div>
                    <div class="des">
                        <p>Lifestyle</p>
                        <h2> Vestibulum iet nibh urna magna lacinia </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'high_voltage_show'");
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
$('#planet_logo_show').owlCarousel({
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
</script>
</body>

</html>