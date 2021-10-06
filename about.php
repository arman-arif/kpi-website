<?php
require "lib/init.php";
$page_title = ($lang == 'en')?"About us":"আমাদের সম্পর্কে";
include "include/header.php";
?>

        <!-- Start Banner -->
        <div class="inner-banner blog">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h1><?= $page_title ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner --> 

        <!-- Start About -->
        <section class="about inner padding-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 left-block">
                        <p align="justify"><strong><?= $page_title ?></strong><br>
                            <?php echo htmlspecialchars_decode((($lang == 'en')?$odb->getInfo("about_us"):$odb->getInfo("bn_about_us"))); ?></p>
                        <img src="uploads/images/15281458104.png" class="img-responsive" alt=""><br>
                        <p align="justify"><strong><?= ($lang == 'en')?"Vision":"ভিশন" ?></strong><br>
                            <?php echo htmlspecialchars_decode((($lang == 'en')?$odb->getInfo("vision"):$odb->getInfo("bn_vision"))); ?></p>
                        <p align="justify"><strong><?= ($lang == 'en')?"Mission":"মিশন" ?></strong><br>
                        <?php echo htmlspecialchars_decode((($lang == 'en')?$odb->getInfo("mission"):$odb->getInfo("bn_mission"))); ?></p>
                    </div>
                    <div class="col-md-5 about-right"><br><img src="uploads/images/15281458641.png" class="img-responsive" alt=""> </div>
                </div>
            </div>
        </section>
        <!-- End About -->

<?php include "include/footer.php"; ?>