<?php
	require_once "lib/init.php";
	
	$page_title = ($lang == 'en')?"News and Events":"খবর এবং ঘটনা সমূহ";
	
	$infos = $opr->getRSortedRecord("news", "id");
	
	include 'include/header.php';
?>

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

        <!-- Start Blog -->
        <div class="container blog-wrapper padding-lg">
            <div class="row"> 
                <!-- Start Left Column -->
                <div class="col-sm-8 blog-left">
                    <ul class="blog-listing">
                        <?php foreach ($infos as $info): ?>
                            <?php $info = $odb->fetchObjAssoc($info); ?>
                        <li>
                        <?php if (!empty($info->image)): ?>
                            <img src="uploads/news/<?= $info->image ?>" class="img-responsive" alt="">
                        <?php endif ?>
                            <h2><?= ($lang == 'en')?$info->title:$info->bn_title ?></h2>
                            <ul class="post-detail">
                                <li><span class="icon-date-icon ico"></span><?= $ofn->formatDate($info->added) ?></li>
                            </ul>
                            <p><?php
                                if ($lang == 'en') {
									$idet = strip_tags(htmlspecialchars_decode($info->details));
									if (strlen($idet) > 340) {
										echo $ofn->textShorten($idet, 340);
									} else {
										echo $idet;
									}
								} else {
									$idet = strip_tags(htmlspecialchars_decode($info->bn_details));
									if (strlen($idet) > 740) {
										echo $ofn->textShorten($idet, 740);
									} else {
										echo $idet;
									}
								} ?></p>
                            <a href="news-details.php?id=<?= $info->id ?>" class="read-more"><span class="icon-play-icon"></span><?= ($lang == 'en')?"Read More":"আরো পড়ুন" ?></a> </li>
                        <?php endforeach; ?>
                        </ul>
                </div>
                <!-- End Left Column --> 

                <!-- Start Right Column -->
                <div class="col-sm-4">
                    <div class="blog-right">
                        <div class="recent-post">
                            <h3><?= ($lang == 'en')?"Recent News":"সাম্প্রতীক খবরসমূহ" ?></h3>
                            <ul>
				                <?php $ne_infos = $opr->getLimitedRecord("news"); ?>
				                <?php foreach ($ne_infos as $ne_info): ?>
					                <?php $ne_info = $odb->fetchObjAssoc($ne_info); ?>
                                    <li class="clearfix"> <a href="notice-order-details.php?id=<?= $ne_info->id ?>">
                                            <div class="detail">
                                                <h4><?php if ($lang == 'en'): ?>
														<?= $ofn->textShorten($ne_info->title, 20); ?>
													<?php else: ?>
														<?= $ofn->textShorten($ne_info->bn_title, 50); ?>
                                                <?php endif ?></h4>
                                                <p><span class="icon-date-icon ico"></span> <?= $ofn->formatDate($ne_info->added) ?></p>
                                            </div>
                                        </a> </li>
				                <?php endforeach; ?>
                            </ul>
                        </div>
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
        <!-- End Blog -->

<?php include "include/footer.php"; ?>