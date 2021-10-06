<?php
require_once "lib/init.php";
$page_title = ($lang == 'en')?"All Teachers":"সকল শিক্ষকবৃন্দ";
$all_teachers = $opr->getSortedRecord("teachers", "dept");

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
            <h2><span></span> <?= ($lang == 'en')?"OUR TEACHERS":"আমাদের শিক্ষকবৃন্দ" ?> </h2>
            <ul class="row browse-teachers-list clearfix">
                <?php foreach ($all_teachers as $teacher): ?>
                <?php $teacher = $odb->fetchObjAssoc($teacher); ?>
                <li class="col-xs-6 col-sm-3">
                    <figure> <img src="uploads/teachers/<?= $teacher->image ?>" width="124" height="124" alt=""> </figure>
                    <h3><a href="teacher-details.php?id=<?= $teacher->id ?>"><?= $teacher->name ?></a></h3>
                    <span class="designation"><?= $teacher->designation ?></span>
                    <p class="equal-hight"><?php
                        echo $odb->getDataById("departments", $teacher->dept)->fetch_object()->title;
                        ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!-- end Browse Teacher -->

<?php include 'include/footer.php' ?>