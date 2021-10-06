<?php
$nav_depts = $opr->getSortedRecord("departments", "title");
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <title><?php echo $page_title; ?> - <?= ($lang == 'en')?$odb->getInfo("institute_name"):$odb->getInfo("bn_institute_name") ?></title>

    <!-- Reset CSS -->
    <link href="assets/frontend/css/reset.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/frontend/css/fonts.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/frontend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="assets/frontend/assets/select2/css/select2.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/frontend/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/backend/vendors/themify/themify-icons.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="assets/frontend/assets/magnific-popup/css/magnific-popup.css" rel="stylesheet">
    <!-- Iconmoon -->
    <link href="assets/frontend/assets/iconmoon/css/iconmoon.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="assets/frontend/assets/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Animate -->
    <link href="assets/frontend/css/animate.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="assets/frontend/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/frontend/js/html5shiv.min.js"></script>
    <script src="assets/frontend/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- Start Preloader -->
<div id="loading">
    <div class="element">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Header -->
<header>
    <!-- Start Header top Bar -->
    <div class="header-top">
        <div class="container clearfix">
            <ul class="follow-us hidden-xs">
                <li><a href="<?= $odb->getInfo("twitter_url") ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="<?= $odb->getInfo("facebook_url") ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                <li><a href="<?= $odb->getInfo("linkedin_url") ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="<?= $odb->getInfo("gplus_url") ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
            <div class="right-block clearfix">
                <div class="lang-wrapper">
                    <div class="select-lang2">
                        <form method="post" class="change-lang">
                            <?php if ($lang == "bn"): ?>
                            <button type="submit" name="lang" value="en">English</button>
                            <?php else: ?>
                            <button type="submit" name="lang" value="bn">বাংলা</button>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header top Bar -->
    <!-- Start Header Middle -->
    <div class="container header-middle">
        <div class="row"> <span class="col-xs-6 col-sm-3"><a href="index.php"><img src="images/logo.png" class="img-responsive" alt=""></a></span>
            <div class="col-xs-6 col-sm-3"></div>
            <div class="col-xs-6 col-sm-9">
                <div class="contact clearfix">
                    <ul class="hidden-xs">
                        <li> <span><?= ($lang == 'en')?"Email":"ইমেইল" ?></span> <a href="mailto:<?= $odb->getInfo("email") ?>"><?= $odb->getInfo("email") ?></a> </li>
                        <li> <span><?= ($lang == 'en')?"Telephone":"টেলিফোন" ?></span> <a href="tel:<?= $odb->getInfo("telephone") ?>"><?= $odb->getInfo("telephone") ?></a> </li>
                    </ul>
                     </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Navigation -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li> <a href="index.php"><?= ($lang == 'en')?"Home":"হোম" ?></a></li>
                    <li> <a href="about.php"><?= ($lang == 'en')?"About us":"আমাদের সম্পর্কে" ?></a></li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#"><?= ($lang == 'en')?"Departments":"বিভাগসমূহ" ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom: 1px solid #dde5e9;"><a href="departments.php"><?= ($lang == 'en')?"All Departments":"সকল বিভাগসমূহ" ?></a></li>
                            <?php foreach($nav_depts as $dept): ?>
                                <?php $dept = $odb->fetchObjAssoc($dept); ?>
                                <li><a href="department.php?id=<?= $dept->id ?>"><?php echo ($lang == 'en')?$dept->title:$dept->bn_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#"><?= ($lang == 'en')?"Academics":"শিক্ষাবিষয়ক" ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="students.php"><?= ($lang == 'en')?"Students":"ছাত্রছাত্রী" ?></a></li>
                            <li><a href="teachers.php"><?= ($lang == 'en')?"Teachers":"শিক্ষকবৃন্দ" ?></a></li>
                            <li><a href="staffs.php"><?= ($lang == 'en')?"Staffs":"কর্মচারীবৃন্দ" ?></a></li>
                            <li><a href="routine.php"><?= ($lang == 'en')?"Class Routine":"ক্লাস রুটিন" ?></a></li>
                            <li><a href="syllabus.php"><?= ($lang == 'en')?"Syllabus":"সিলেবাস" ?></a></li>
                            <li><a href="results.php"><?= ($lang == 'en')?"Results":"ফলাফল" ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#"><?= ($lang == 'en')?"Announcement":"ঘোষণা" ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="notice-and-order.php"><?= ($lang == 'en')?"Notice & Ordes":"নোটিশ এবং আদেশসমূহ" ?></a></li>
                            <li><a href="news.php"><?= ($lang == 'en')?"News":"খবরসমূহ" ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#"><?= ($lang == 'en')?"More":"আরো" ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li> <a href="gallery.php"><?= ($lang == 'en')?"Gallery":"গ্যালারী" ?></a></li>
                        </ul>
                    </li>
                    <li> <a href="contact.php"><?= ($lang == 'en')?"Contact":"যোগাযোগ" ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Header -->