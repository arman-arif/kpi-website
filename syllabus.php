<?php
require_once 'lib/init.php';
	
$page_title = ($lang == 'en')?"Syllabus":"সিলেবাস";

$infos = $opr->getRSortedRecord("syllabus", "regulation");
	
	include "include/header.php"; ?>
	
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
	
	<!-- Start News & Events -->
	<section class="news-wrapper padding-lg">
		<div class="container">
			<div class="table-responsive table-dark">
				<table class="table table-striped table-bordered table-hover">
					<thead>
					<tr style="font-weight: bold">
                        <th class="text-center"><?= ($lang == 'en')?"S/N":"ক্রম" ?></th>
                        <th class="text-center"><?= ($lang == 'en')?"Department":"বিভাগ" ?></th>
                        <th class="text-center"><?= ($lang == 'en')?"Semester":"পর্ব" ?></th>
                        <th class="text-center"><?= ($lang == 'en')?"Regulation":"প্রবিধান" ?></th>
                        <th class="text-center"><?= ($lang == 'en')?"View":"দেখুন" ?> / <?= ($lang == 'en')?"Download":"ডাউনলোড করুন" ?></th>
					</tr>
					</thead>
					<tbody>
					<?php
						$i = 1;
						foreach ($infos as $info):
							?>
							<tr class="<?php echo ($i%2==0)?"even":"odd"; ?>" style="color: #303030">
								<td class="text-center" width="5%"><?php echo $i++; ?></td>
								<td width="25%"><?php if ($lang == 'en'):
										echo $odb->getDataById("departments", $info['dept'])->fetch_object()->title;
									else:
										echo $odb->getDataById("departments", $info['dept'])->fetch_object()->bn_title;
									endif; ?></td>
								<td width="25%"><?php if ($lang == 'en'){
										echo $info['semester'];
									} else {
										$isem = ($info['semester'] == "1st")?"১ম":"";
										$isem = ($info['semester'] == "2nd")?"২য়":$isem;
										$isem = ($info['semester'] == "3rd")?"৩য়":$isem;
										$isem = ($info['semester'] == "4th")?"৪র্থ":$isem;
										$isem = ($info['semester'] == "5th")?"৫ম":$isem;
										$isem = ($info['semester'] == "6th")?"৬ষ্ঠ":$isem;
										$isem = ($info['semester'] == "7th")?"৭ম":$isem;
										$isem = ($info['semester'] == "8th")?"৮ম":$isem;
										echo $isem;
									} ?> <?= ($lang == 'en')?"Semester":"পর্ব" ?></td>
								<td width="20%" style="text-align: center;"><?= $info['regulation'] ?></td>
								<td class="text-center">
									<a href="uploads/files/syllabus/<?= $info['file'] ?>" class="my-btn" target="_blank"><span class="ti-new-window"></span></a>&ensp;
									<a href="uploads/files/syllabus/<?= $info['file'] ?>" class="my-btn green-btn" download="syllabus_<?= $info['semester']."_semester_".$info['regulation'] ?>"><span class="ti-download">
                                            <?= ($lang == 'en')?"Download":"ডাউনলোড" ?></span></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<!-- End News & Events -->

<?php include 'include/footer.php' ?>