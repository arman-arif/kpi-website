<?php
require_once 'lib/init.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$info = $odb->getDataById("notice", $id)->fetch_object();

$page_title = ($lang == 'en')?"Notice Details":"নোটিশ বিবরণ";

include 'include/header.php'; ?>


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

    <!-- Start Blog Detail -->
    <div class="container blog-wrapper padding-lg">
        <div class="row">
            <!-- Start Left Column -->
            <div class="col-sm-8 blog-left">
                <ul class="blog-listing detail">
                    <li>
                        <h2><?= ($lang == 'en')?$info->title:$info->bn_title ?></h2>
                        <ul class="post-detail">
                            <li><span class="icon-date-icon ico"></span> <?= $ofn->formatDate($info->added) ?></li>
                        </ul>
                        <div>
                            <p>
								<?= ($lang == 'en')?"Attachment":"সংযুক্তি" ?>:
                                <a class="my-btn" target="_blank" href="uploads/files/notice/<?= $info->file ?>"><span class="ti-new-window"></span></a>
                                <a class="my-btn green-btn" href="uploads/files/notice/<?= $info->file ?>" download="kpi_<?= $info->file ?>"><span class="ti-download"></span> <?= ($lang == 'en')?"Download":"ডাউনলোড" ?></a>
                            </p>
                            <?php if ($lang == 'en'): ?>
								<?= htmlspecialchars_decode($info->details) ?>
							<?php else: ?>
								<?= htmlspecialchars_decode($info->bn_details) ?>
                            <?php endif ?>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Left Column -->

            <!-- Start Right Column -->
            <div class="col-sm-4">
                <div class="blog-right">
                    <div class="recent-post">
                        <h3><?= ($lang == 'en')?"Recent Notice":"সাম্প্রতীক নোটিশ" ?></h3>
                        <ul>
                            <?php $re_infos = $opr->getLimitedRecord("notice"); ?>
                            <?php foreach ($re_infos as $re_info): ?>
                            <?php $re_info = $odb->fetchObjAssoc($re_info); ?>
                            <li class="clearfix"> <a href="notice-order-details.php?id=<?= $re_info->id ?>">
                                    <div class="detail">
                                        <h4><?php if ($lang == 'en'): ?>
                                                <?= $ofn->textShorten($re_info->title, 20); ?>
											<?php else: ?>
												<?= $ofn->textShorten($re_info->bn_title, 40); ?>
                                        <?php endif ?></h4>
                                        <p><span class="icon-date-icon ico"></span> <?= $ofn->formatDate($re_info->added) ?></p>
                                    </div>
                                </a> </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Right Column -->
        </div>
    </div>
    <!-- End Blog Detail -->

<?php include 'include/footer.php' ?>