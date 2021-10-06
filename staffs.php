<?php
require_once "lib/init.php";
$page_title = ($lang == 'en')?"All Staffs":"সকল কর্মচারী";
$all_staffs = $opr->getSortedRecord("staffs", "designation");

include 'include/header.php' ?>
        <!-- Start Banner -->
        <div class="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <h1><?= $page_title ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

    <!-- Start Browse Teacher -->
    <section class="browse-teacher padding-lg">
        <div class="container">
            <h2><span></span> <?= ($lang == 'en')?"OUR STAFFS":"আমাদের কর্মচারীবৃন্দ" ?> </h2>
            <ul class="row browse-teachers-list clearfix">
                <?php foreach ($all_staffs as $staff): ?>
                <?php $staff = $odb->fetchObjAssoc($staff); ?>
                <li class="col-xs-6 col-sm-3">
                    <figure> <img src="uploads/staffs/<?= $staff->image ?>" width="124" height="124" alt=""> </figure>
                    <h3><a href="staff-details.php?id=<?= $staff->id ?>"><?= $staff->name ?></a></h3>
                    <span class="designation"><?= $staff->designation ?></span>
                    <p class="equal-hight"></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!-- end Browse Teacher -->

<?php include 'include/footer.php' ?>