<?php
require_once 'lib/init.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$dept_info = $odb->getDataById("departments", $id)->fetch_object();

$page_title = ($lang == 'en')?"$dept_info->title Department":"$dept_info->bn_title বিভাগ";

include 'include/header.php';
?>
    <!-- Start Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <img src="uploads/departments/<?= $dept_info->icon ?>" width="80" height="80" class="fl-right">
                        <h1 class="text-uppercase"><?= ($lang == 'en')?$dept_info->title:$dept_info->bn_title ?></h1>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-3"><a href="http://www.btebadmission.gov.bd/" class="apply-online clearfix">
                        <div class="left clearfix"><span class="icon"><img src="images/apply-online-sm-ico.png"
                                                                           class="img-responsive" alt=""></span> <span
                                    class="txt"><?= ($lang == 'en')?"Apply Online":"অনলাইন আবেদন করুন" ?></span></div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                    </a> <a href="#" class="download-prospects brochure" disabled=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Course Description -->
    <section class="about inner padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5 left-block">
                    <h2><?= ($lang == 'en')?"DEPARTMENT DESCRIPTION":"বিভাগের বিবরণ" ?></h2>
                    <?php echo htmlspecialchars_decode((($lang == "en")?$dept_info->description:$dept_info->bn_description)); ?>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <div class="enquire-wrapper">
                        <figure><img src="uploads/departments/<?= $dept_info->image ?>"
                                                                 class="img-responsive" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="course-detail clearfix">
                        <div class="duration clearfix">
                            <div class="icon"><span class="icon-duration-icon"></span></div>
                            <div class="detail"><span><?= ($lang == 'en')?"Duration":"সময়কাল" ?></span> <?= ($lang == 'en')?"4 YEAR":"৪ বছর" ?></div>
                        </div>
                        <div class="duration eligible clearfix">
                            <div class="icon"><span class="icon-eligibility-icon"></span></div>
                            <div class="detail"><span><?= ($lang == 'en')?"ELIGIBILITY":"যোগ্যতা" ?>:</span> <?= ($lang == 'en')?"SSC/Dakhil/":"এস.এস.সি/দাখিল" ?><br>
                                <?= ($lang == 'en')?"SSC(Voc)/Equivalent":"এস.এস.সি(ভোক)/সমমান" ?>
                            </div>
                        </div>
                        <div class="duration fee clearfix">
                        </div>
                        <a href="http://www.btebadmission.gov.bd/" target="_blank" class="btn"><?= ($lang == 'en')?"apply now":"আবেদন করুন" ?> <span
                                    class="icon-more-icon"></span></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Course Description -->

    <!-- Start Course Details Tab -->
    <section class="details-tab">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs course-tab">
                        <li class="text-uppercase" style="margin: 20px;"><span class="icon-parents-icon"
                                                                               style="font-size: 40px;"></span>
                            <span style="margin-left: 5px; font-size: 20px;"><?= ($lang == 'en')?"Main Teachers":"মূল শিক্ষকবৃন্দ" ?></span></li>
                    </ul>
                    <ul class="row browse-teachers-list clearfix">
                        <?php $dept_teachers = $odb->getData("teachers"); ?>
                        <?php if ($dept_teachers->num_rows > 0): ?>
                        <?php foreach ($dept_teachers as $tr): ?>
                        <?php $tr = $odb->fetchObjAssoc($tr); ?>
                        <?php if ($id == $tr->dept): ?>
                        <li class="col-xs-6 col-sm-3">
                            <figure><img src="uploads/teachers/<?= $tr->image ?>" alt="" width="124" height="124"></figure>
                            <!-- Teacher Photo -->
                            <h3><?= $tr->name ?></h3><!-- Teacher Name -->
                            <span class="designation"><?= $tr->designation ?></span>
                        </li><?php endif ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>No teacher found</p>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!-- End Course Details Tab -->

<?php include 'include/footer.php'; ?>