<?php
require_once 'lib/init.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$info = $odb->getDataById("teachers", $id)->fetch_object();

$page_title = ($lang == 'en')?"Teacher Details":"শিক্ষক বিবরণ";


include 'include/header.php';
?>

<div class="inner-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1 class="text-center"><?= $page_title ?></h1>
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
            <div class="col-md-5 about-right"> <img src="uploads/teachers/<?= $info->image ?>" class="img-responsive" alt=""> </div>
            <div class="col-md-7 left-block">
                <h2><?= $info->name ?></h2>
                <h5>Designation: <?= $info->designation ?></h5><br>
                <h5>Department: <?= $odb->getDataById("departments", $info->dept)->fetch_object()->title ?></h5><br>
                <h6>Academics:</h6>
                <?php echo htmlspecialchars_decode($info->academics); ?><br>
                <h6>Address:</h6>
                <?php echo htmlspecialchars_decode($info->address); ?>
                <h6>Description:</h6>
                <?php echo htmlspecialchars_decode($info->description); ?>
            </div>
        </div>
    </div>
</section>
<!-- End About -->

<?php include "include/footer.php"; ?>
