<?php require_once 'lib/init.php';

$page_title = ($lang == 'en')?"Notice & Office Orders":"নোটিশ এবং অফিস অর্ডার";

$infos = $opr->getRSortedRecord("notice", "id");

include "include/header.php"; ?>

        <!-- Start Banner -->
        <div class="inner-banner blog">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h1><?= ($lang == 'en')?"Notice & Orders":"নোটিশ এবং আদেশসমূহ" ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner --> 

        <!-- Start News & Events -->
        <section class="news-wrapper padding-lg">
            <div class="container">
                <ol class="ord-listing">
                    <?php foreach ($infos as $info): ?>
                    <?php $info = $odb->fetchObjAssoc($info); ?>
                    <li>
                        <h5><a href="notice-order-details.php?id=<?= $info->id ?>"><?= ($lang == 'en')?$info->title:$info->bn_title ?></a></h5>
						<?php
						if ($lang == 'en'){
							$idet = strip_tags(htmlspecialchars_decode($info->details));
							if (strlen($idet) > 340){
								echo $ofn->textShorten($idet, 340);
								?> <a href="notice-order-details.php?id=<?= $info->id ?>">Read More</a><?php
							} else {
								echo $idet;
							}
						} else {
							$idet = strip_tags(htmlspecialchars_decode($info->bn_details));
							if (strlen($idet) > 740){
								echo $ofn->textShorten($idet, 740);
								?> <a href="notice-order-details.php?id=<?= $info->id ?>">আরো পড়ুন</a><?php
							} else {
								echo $idet;
							}
						}
						?>
                        <br style="margin-bottom: 20px;"> <?= ($lang == 'en')?"Attachment":"সংযুক্তি" ?>:
                        <a class="my-btn" target="_blank" href="uploads/files/notice/<?= $info->file ?>"><span class="ti-new-window"></span></a>
                        <a class="my-btn green-btn" href="uploads/files/notice/<?= $info->file ?>" download="kpi_<?= $info->file ?>"><span class="ti-download"></span> <?= ($lang == 'en')?"Download":"ডাউনলোড" ?></a>
                        <br><small><?= $ofn->formatDate($info->added) ?></small>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </section>
        <!-- End News & Events -->

<?php include 'include/footer.php' ?>