<?php
   include('header.php');
   if(empty($_REQUEST['id'])){
        header("location:high-voltage-show");
    }
    $titles_id =  base64_decode($_REQUEST['id']);
    $titles = $db->query("SELECT * FROM phtv_voltage_title WHERE id = '$titles_id'");
    $fetitles = $titles->fetch(PDO::FETCH_ASSOC);
    $episode = $db->query("SELECT a.*,b.category_name FROM phtv_voltage_episode a, phtv_voltage_category b WHERE a.category_id = b.id AND voltage_title_id = '".$titles_id."'");
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

<div class="container-fluid ss_episodes_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-7 align-self-center">
                <div class="main_title">
                    <h1> <?= $fetitles['name'] ?> </h1>
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
                        <img src="images/episodesA.jpg" alt="episodes" />
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
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="episodes_blogs">
                    <div class="images">
                        <img src="images/episodesA.jpg" alt="episodes" />
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

<?php
    include('footer.php');
?>

</body>

</html>