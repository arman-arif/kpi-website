<?php
require_once "lib/init.php";
$page_title = ($lang == 'en')?"All Departments":"সকল বিভাগসমূহ";
$all_depts = $opr->getSortedRecord("departments", "title");

include 'include/header.php' ?>
        <!-- Start Banner -->
        <div class="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <h1><?= ($lang == 'en')?"All Departments":"সকল বিভাগসমূহ" ?></h1>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-3"> <a href="//www.btebadmission.gov.bd" target="_blank" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt"><?= ($lang == 'en')?"Apply Online":"অনলাইন আবেদন করুন" ?></span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </a> <a href="#" class="download-prospects"></a> </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start Cources Section -->
        <section class="our-cources sub padding-lg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h2> <span></span> <?= ($lang == 'en')?"What do you want to study?":"আপনি কোন বিষয়ে পড়তে চান?" ?></h2>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <ul class="row course-list inner">
                    <?php foreach ($all_depts as $dept): ?>
                    <li class="col-xs-6 col-sm-4 col-md-3">
                        <div class="inner">
                            <figure><img src="uploads/departments/<?= $dept['image'] ?>" width="189" height="209" alt=""></figure>
                            <h3><?php echo ($lang == 'en')?$dept['title']:$dept['bn_title']; ?></h3>
                            <p><?php $d_desc = ($lang == "en")?$dept['description']:$dept['bn_description'];
								echo $ofn->textShorten(strip_tags(htmlspecialchars_decode($d_desc)), 50); ?></p>
                            <div class="fess-box"><img src="uploads/departments/<?= $dept['icon'] ?>" width="50" alt=""> </div>
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

<?php include 'include/footer.php' ?>