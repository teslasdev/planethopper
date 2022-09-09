<?php
   include('header.php');
?>

<div class="container-fluid ss_header_sub ss_height100vh ss_blog_subtitle">
    <div class="verticle_middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <div class="images_sspatload ss_ph1_audio">
                        <img src="images/Blogosphere.png" alt="images">
                    </div>

                    <h2> Welcome to the PARAVERSE our official BLOG </h2>
                    <div class="liness"></div>
                    <p> Hot off the press! For those who still read for news, entertainment, and leisure. The PARAVERSE
                        connects all of our content sources and technology. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'blog'");
    $fepages = $pages->fetch(PDO::FETCH_ASSOC);
    
    $banner = $db->query("SELECT * FROM phtv_banner WHERE page_id = '".$fepages['id']."' AND banner_type = 1");
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
<!-- <div class="container-fluid ss_padding_100top">
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
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 8;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = $db->query("SELECT count(*) as blog_count FROM phtv_blog");
    $fepages = $total_pages_sql->fetch(PDO::FETCH_ASSOC);
    $total_rows = $fepages['blog_count'];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    $blogs = $db->query("SELECT a.*, b.name, c.category_name FROM phtv_blog a LEFT JOIN phtv_blog_auther b ON a.auther_id = b.id LEFT JOIN phtv_blog_category c ON a.category_id = c.id GROUP BY a.id LIMIT $offset, $no_of_records_per_page");
    while ($feblog = $blogs->fetch(PDO::FETCH_ASSOC)) {
        $blog_comments = $db->query("SELECT count(*) as comments FROM phtv_blog_comment WHERE blog_id = '".$feblog['id']."'");
        $fecomments = $blog_comments->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid">
    <div class="container">
        <div class="row ss_main_blog_padding">
            <div class="col-lg-12 ">
                <div class="row blog_images">
                    <div class="col-lg-6 align-self-center">
                        <div class="images">
                            <img src="images/blog/<?= $feblog['image'] ?>" alt="blog_images" />
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="blog_main_title">
                            <div class="ss_blog_user">
                                <a href="#"> <?= $feblog['category_name'] ?> </a>
                                <span>|</span>
                                <a href="#"> <?= date('m.d.y',strtotime($feblog['created_at'])) ?> </a>
                                <span>|</span>
                                <a href="#"> <?= $feblog['name'] ?> </a>
                            </div>
                            <h2> <?= $feblog['title'] ?> </h2>
                            <p> <?= $feblog['sub_title'] ?> </p>
                        </div>
                        <p><?= $feblog['description'] ?></p>
                        <div class="d-flex bd-highlight ss_mobile_flex">
                            <div class="p-2 flex-grow-1 bd-highlight align-self-center">
                                <div class="ss_blog_user">
                                    <span> Comments <?= $fecomments['comments'] ?> </span>
                                    <span>|</span>
                                    <span> Likes <?= $feblog['likes'] ?> </span>
                                </div>
                            </div>
                            <div class="p-2 bd-highlight align-self-center">
                                <div class="ss_button_blog">
                                    <a
                                        href="blog-details?id=<?= base64_encode($feblog['id']) ?>&title=<?php $title = explode(' ',$feblog['title']); $title = implode('-', $title); echo $title; ?>">
                                        View More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="container-fluid pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center ss_pagination">
                        <li class="page-item">
                            <a class="page-link" href="?pageno=1">First</a>
                        </li>
                        <li class=" page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                        <li class="page-item <?php if($pageno == $i){ echo 'disabled'; } ?>"><a class="page-link"
                                href="?pageno=<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link" href="
                            ?pageno=<?php echo $total_pages; ?>"><i class="fa fa-angle-right"
                                    aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php 
    $pages = $db->query("SELECT * FROM phtv_pages WHERE slug = 'blog'");
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

</body>

</html>