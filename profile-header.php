<?php
if(empty($_SESSION['userid'])){
    header("location:login");
}
    $user_id = $_SESSION['userid'];
    $user = $db->prepare("SELECT * FROM phtv_users WHERE id = '$user_id'");
    $user->execute();
    $feuser = $user->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> My Profile </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    <br />
                    personal digital assistants.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="ss_profiles_box">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 w-100 bd-highlight align-self-center">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 bd-highlight align-self-center">
                                    <div class="ss_profile_imges">
                                        <img src="images/profilesA.jpg" alt="images">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight align-self-center ">
                                    <div class="ss_profile_des">
                                        <h4><?= $feuser['full_name'] ?></h4>
                                        <p><?= $feuser['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 flex-shrink-1 bd-highlight align-self-center">
                            <div class="episode_button">
                                <a href="resources/logout"> <img src="images/logout.svg" alt="images"> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>