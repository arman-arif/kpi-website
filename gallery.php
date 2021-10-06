<?php
require_once "lib/init.php";

$page_title = ($lang == 'en')?"Gallery":"গ্যালারী";

include "include/header.php";?>

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

        <!-- Start Campus Tour -->
        <section class="campus-tour padding-lg"> 

            <!-- gallery filter -->
            <div class="container text-center">
                <div class="isotopeFilters">
                    <ul class="gallery-filter clearfix">
                        <li class="active"><a href="#" data-filter="*"><?= ($lang == 'en')?"All":"সব" ?></a></li>
                        <?php
                            $secs = $odb->getDistinctRow("gallary", "section");
						foreach ($secs as $sec):
                            $sec = $odb->fetchObjAssoc($sec)->section;
                        ?>
                        <li><a href="#" data-filter=".<?= strtolower(str_replace(" ", "-", $sec)) ?>"><?= $sec ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- end filter -->

            <ul class="gallery clearfix isotopeContainer">
                <?php
                $gitems = $opr->getRecord("gallary");
				foreach ($gitems as $gitem):
                    $gitem = $odb->fetchObjAssoc($gitem);
                ?>
                <li class="isotopeSelector <?= strtolower(str_replace(" ", "-", $gitem->section)) ?>">
                    <div class="overlay">
                        <h5><?= $gitem->title ?></h5>
                        <p><?= $gitem->section ?></p>
                        <a class="galleryItem" href="uploads/gallary/<?= $gitem->image ?>"><span class="icon-enlarge-icon"></span></a> </div>
                    <figure><img src="uploads/gallary/thumb/thumb_<?= $gitem->image ?>" class="img-responsive" alt=""></figure>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="text-center">
                <ul class="pagination blue"></ul>
            </div>
        </section>
        <!-- End Campus Tour --> 
<?php include "include/footer.php"; ?>