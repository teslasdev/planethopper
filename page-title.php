<?php

$cur_page = (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']));
$weAreLive = 0;
if ($cur_page == 'planet_git' || $cur_page == 'index') {
    $titleName = 'Home | Planet Hopper TV';
    $active_home = "active";
}
if ($cur_page == 'blog-details') {
    $titleName = 'Blog | Details';
}
if ($cur_page == 'blog') {
    $titleName = 'Blog | Planet Hopper TV';
    $active_blog = "active";
}
if ($cur_page == 'change-password') {
    $titleName = 'Profile | Change Password';
}
if ($cur_page == 'checkout') {
    $titleName = 'Checkout';
}
if ($cur_page == 'cinematics') {
$titleName = 'Cinematics';
$active_cinematics = "active";
}
if ($cur_page == 'completed') {
    $titleName = 'Completed shopping';
}
if ($cur_page == 'high-voltage-show') {
    $titleName = 'High Voltage Show';
    $active_highVoltageShow = "active";
}
if ($cur_page == 'high-voltage-show-details') {
    $titleName = 'High Voltage Details';
    $active_highVoltageShow = "active";
}
if ($cur_page == 'live-chat') {
    $titleName = 'Live Stream';
    $active_liveChat = "active";
    $weAreLive = 1;
}
if ($cur_page == 'liveTV') {
    $titleName = 'Live TV';
    $active_liveTv = "active";
}
if ($cur_page == 'login') {
    $titleName = 'Login';
}
if ($cur_page == 'message') {
    $titleName = 'Messages';
}
if ($cur_page == 'my-order') {
    $titleName = 'Order list';
}
if ($cur_page == 'nft-marketplace-details') {
    $titleName = 'NFT Marketplace details';
    $active_NFTMarketplace = "active";
}
if ($cur_page == 'nft-marketplace') {
    $titleName = 'NFT Marketplace';
    $active_NFTMarketplace = "active";
}
if ($cur_page == 'order-tracking') {
    $titleName = 'Order tracking';
}
if ($cur_page == 'podcasts') {
    $titleName = 'Audiocast';
    $active_podcasts = "active";
}
if ($cur_page == 'product-detail') {
    $titleName = 'Product detail';
    $active_product = "active";
}
if ($cur_page == 'product') {
    $titleName = 'Product';
    $active_product = "active";
}
if ($cur_page == 'profile') {
    $titleName = 'Profile';
}
if ($cur_page == 'register') {
    $titleName = 'Register';
}
if ($cur_page == 'shopping-cart') {
    $titleName = 'Shopping Cart';
}
if ($cur_page == 'supercoin-balance') {
    $titleName = 'Supercoin Balance';
}
if ($cur_page == 'forgot-password') {
    $titleName = 'Forgot Password';
}
if ($cur_page == 'activate') {
    $titleName = 'Verify Account';
}
if ($cur_page == 'live-events') {
    $titleName = 'Live Events';
}
if ($cur_page == 'all-high-voltage-show') {
    $titleName = 'High Voltage Show';
}
if ($cur_page == 'video-detail') {
    $titleName = 'Video Detail';
}

?>