
<?php
require_once "lib/init.php";

$page_title = ($lang == 'en')?$odb->getInfo("institute_name"):$odb->getInfo("bn_institute_name");
$page = "home";

$all_depts = $opr->getSortedRecord("departments", "title");

include 'include/header.php';
include 'include/banner.php';
?>



        <!-- Start About Section -->
        <section class="about">
            <div class="container">
                <ul class="row our-links">
                    <li class="col-sm-4 clearfix equal-hight"></li>
                    <li class="col-sm-4 apply-online clearfix equal-hight">
                        <div class="icon"><img src="images/apply-online-ico.png" class="img-responsive" alt=""></div>
                        <div class="detail">
                            <h3><?= ($lang == 'en')?"Apply Online":"অনলাইন আবেদন করুন" ?></h3>
                            <a href="http://btebadmission.com" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a> </div>
                    </li>
                    <li class="col-sm-4 clearfix equal-hight"></li>
                </ul>
            </div>

            <hr>
            <!-- Start Listing -->
            <div class="container">
                <div class="row padding-lg">
                    <div class="col-sm-12 head-block">
                        <h2><?= ($lang == "en")?"Latest Notice":"সর্বশেষ নোটিশ" ?></h2>

                    </div>
                    <div class="col-sm-12">
                        <ol class="ord-listing">
                            <?php $notices = $opr->getLimitedRecord("notice", 3); ?>
                            <?php foreach ($notices as $notice): ?>
                                <?php $notice = $odb->fetchObjAssoc($notice); ?>
                                <li>
                                    <h5><a href="notice-order-details.php?id=<?= $notice->id ?>"><?= ($lang == 'en')?$notice->title:$notice->bn_title ?></a></h5>
                                    <?php
                                    if ($lang == 'en'){
										$idet = strip_tags(htmlspecialchars_decode($notice->details));
										if (strlen($idet) > 340){
											echo $ofn->textShorten($idet, 340);
											?> <a href="notice-order-details.php?id=<?= $notice->id ?>">Read More</a><?php
										} else {
											echo $idet;
										}
                                    } else {
										$idet = strip_tags(htmlspecialchars_decode($notice->bn_details));
										if (strlen($idet) > 740){
											echo $ofn->textShorten($idet, 740);
											?> <a href="notice-order-details.php?id=<?= $notice->id ?>">আরো পড়ুন</a><?php
										} else {
											echo $idet;
										}
                                    }
                                    ?>
                                    <br><small><?= $ofn->formatDate($notice->added) ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                        <a href="notice-and-order.php" class="read-more my-btn" style="float: right;"><span class="icon-play-icon"></span> <?= ($lang == "en")?"See All Notice":"সকল নোটিশ দেখুন" ?></a>
                    </div>
                </div>
            </div>
            <!-- End Listing -->
            <hr>

            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-push-4 left-block"> <span class="sm-head"></span>
                        <h2><?= (($lang == "en")?$odb->getInfo("principal_name"):$odb->getInfo("bn_principal_name")); ?></h2>
                        <h5><?= ($lang == "en")?"Message from Principal":"অধ্যক্ষ কর্তৃক বার্তা" ?></h5>
                        <p><?= $ofn->textShorten(strip_tags(htmlspecialchars_decode((($lang == "en")?$odb->getInfo("principal_message"):$odb->getInfo("bn_principal_message")))), 429) ?></p>
                        <div class="know-more-wrapper"> <a href="principal-message.php" class="know-more"><?= ($lang == "en")?"Read More":"আরো পড়ুন" ?> <span class="icon-more-icon"></span></a> </div>
                    </div>
                    <div class="col-sm-2 col-sm-pull-8">
                        <div class="image-block">
                            <div id="thumbnail_container"> <img src="uploads/images/<?= $odb->getFile("info", "principal_photo"); ?>" id="thumbnail" class="img-responsive" alt=""> </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section --> 

        <!-- Start Cources Section -->
        <section class="our-cources padding-lg">
            <div class="container">
                <h2> <span></span> <?= ($lang == 'en')?"What do you want to study?":"আপনি কোন বিষয়ে পড়তে চান?" ?></h2>
                <ul class="course-list owl-carousel">
                    <?php foreach ($all_depts as $dept): ?>
                        <li>
                            <div class="inner">
                                <figure><img src="uploads/departments/<?= $dept['image'] ?>" width="189" height="209" alt=""></figure>
                                <h3><?php echo ($lang == 'en')?$dept['title']:$dept['bn_title']; ?></h3>
                                <p><?php $d_desc = ($lang == "en")?$dept['description']:$dept['bn_description'];
                                    echo $ofn->textShorten(strip_tags(htmlspecialchars_decode($d_desc)), 40); ?></p>
                                <div class="fess-box"><img src="uploads/departments/<?= $dept['icon'] ?>" width="50" height="50" alt=""> </div>
                                <div class="bottom-txt clearfix">
                                    <div class="duration">
                                        <h4><?= ($lang == 'en')?"4 Year":"৪ বছর মেয়াদী" ?></h4>
                                        <span> <?= ($lang == 'en')?"Courses":"কোর্স" ?></span> </div>
                                    <a href="department.php?id=<?= $dept['id'] ?>"><span class="icon-more-icon"></span></a> </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        <!-- End Cources Section --> 

        <!-- Start Campus Tour Section -->
        <section class="campus-tour padding-lg">
            <div class="container">
                <h2><span></span><?= ($lang == 'en')?"TAKE A CAMPUS TOUR":"শিক্ষাঙ্গন ঘুরে আসুন" ?></h2>
            </div>
            <ul class="gallery clearfix">
				<?php
				$g_items = $opr->getRandomRecord("gallary", "10");
				foreach ($g_items as $item):
				$item = $odb->fetchObjAssoc($item);
				?>
                <li>
                    <div class="overlay">
                        <h5><?= $item->title ?></h5>
                        <p><?= $item->section ?></p>
                        <a class="galleryItem" href="uploads/gallary/<?= $item->image ?>"><span class="icon-enlarge-icon"></span></a> </div>
                    <figure><img src="uploads/gallary/thumb/thumb_<?= $item->image ?>" class="img-responsive" alt=""></figure>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <!-- End Campus Tour Section -->

<?php include 'include/footer.php'; ?>