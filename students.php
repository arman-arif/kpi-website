<?php
require_once "lib/init.php";

$page_title = ($lang == 'en')?"All Students":"সকল ছাত্রছাত্রী";

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
			<div class="col-sm-3">
				<div class="blog-left">
					<div class="stu-filter">
                        <form class="filter-block clearfix">
                            <?php
                                $dept = isset($_GET['dept'])?$_GET['dept']:"";
                                $shift = isset($_GET['shift'])?$_GET['shift']:"";
                                $semester = isset($_GET['semester'])?$_GET['semester']:"";
                            ?>
                            <select name="dept" required>
                                <option value=""> <?= ($lang == 'en')?"Select Department":"বিভাগ নির্বাচন করুন" ?> </option>
                                <?php
                                $f_depts = $opr->getSortedRecord("departments", "title");
                                foreach ($f_depts as $f_dept):
								$f_dept = $odb->fetchObjAssoc($f_dept);
								?><option value="<?= $f_dept->id ?>"<?= ($dept == $f_dept->id)?" selected":"" ?>><?= ($lang == 'en')?$f_dept->title:$f_dept->bn_title ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="shift" required>
                                <option value=""><?= ($lang == 'en')?"Select Shift":"শিফট নির্বাচন করুন"; ?></option>
                                <option value="1st"<?= ($shift == "1st")?" selected":"" ?>><?= ($lang == 'en')?"1st Shift":"১ম শিফট"; ?></option>
                                <option value="2nd"<?= ($dept == "2nd")?" selected":"" ?>><?= ($lang == 'en')?"2nd Shift":"২য় শিফট"; ?></option>
                            </select>
                            <select name="semester" required>
                                <option value=""><?= ($lang == 'en')?"Select Semester":"সেমিস্টার নির্বাচন করুন"; ?></option>
                                <option value="1st"<?= ($semester == "1st")?" selected":"" ?>><?= ($lang == 'en')?"1st Semester":"১ম সেমিস্টার"; ?></option>
                                <option value="2nd"<?= ($semester == "2nd")?" selected":"" ?>><?= ($lang == 'en')?"2nd Semester":"২য় সেমিস্টার"; ?></option>
                                <option value="3rd"<?= ($semester == "3rd")?" selected":"" ?>><?= ($lang == 'en')?"3rd Semester":"৩য় সেমিস্টার"; ?></option>
                                <option value="4th"<?= ($semester == "4th")?" selected":"" ?>><?= ($lang == 'en')?"4th Semester":"৪র্থ সেমিস্টার"; ?></option>
                                <option value="5th"<?= ($semester == "5th")?" selected":"" ?>><?= ($lang == 'en')?"5th Semester":"৫ম সেমিস্টার"; ?></option>
                                <option value="6th"<?= ($semester == "6th")?" selected":"" ?>><?= ($lang == 'en')?"6th Semester":"৬ষ্ঠ সেমিস্টার"; ?></option>
                                <option value="7th"<?= ($semester == "7th")?" selected":"" ?>><?= ($lang == 'en')?"7th Semester":"৭ম সেমিস্টার"; ?></option>
                                <option value="8th"<?= ($semester == "8th")?" selected":"" ?>><?= ($lang == 'en')?"8th Semester":"৮ম সেমিস্টার"; ?></option>
                            </select>
                            <button class="search"><span class="ti-filter"></span></button>
                        </form>
						<h5><?= ($lang == "en")?"Departments":"বিভাগসমূহ" ?></h5>
                        <ul>
                            <li><a href="students.php"><?= ($lang == "en")?"All Departments":"সকল বিভাগসমূহ" ?></a></li>
                            <?php
							$f_depts = $opr->getSortedRecord("departments", "title");
							foreach ($f_depts as $f_dept):
							$f_dept = $odb->fetchObjAssoc($f_dept);
							?>
							<li><a href="?dept=<?= $f_dept->id ?>"><?= ($lang == 'en')?$f_dept->title:$f_dept->bn_title; ?></a></li>
							<?php endforeach; ?>
						</ul>
                        <br>
                        <h5><?= ($lang == 'en')?"Shifts":"শিফটসমূহ"; ?></h5>
						<ul>
							<li><a href="students.php"><?= ($lang == 'en')?"Both Shift":"উভয় শিফট"; ?></a></li>
							<li><a href="?shift=1st"><?= ($lang == 'en')?"1st Shift":"১ম শিফট"; ?></a></li>
							<li><a href="?shift=2nd"><?= ($lang == 'en')?"2nd Shift":"২য় শিফট"; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-9 blog-right">
				<table class="table table-bordered table-striped">
					<tr style="text-align: center; font-weight: bold; color: #333333;">
						<th><?= ($lang == 'en')?"S/N":"ক্রম" ?></th>
						<th><?= ($lang == 'en')?"Name":"নাম" ?></th>
						<th><?= ($lang == 'en')?"Department":"বিভাগ" ?></th>
						<th><?= ($lang == 'en')?"Semester":"পর্ব" ?></th>
						<th><?= ($lang == 'en')?"Shift":"শিফট" ?></th>
						<th><?= ($lang == 'en')?"Roll":"রোল" ?></th>
						<th><?= ($lang == 'en')?"Reg. No":"রেজি. নং" ?></th>
						<th><?= ($lang == 'en')?"Session":"সেশন" ?></th>
						<th><?= ($lang == 'en')?"View":"দেখুন" ?></th>
					</tr>
					<?php $i = 1;
					if (isset($_GET['dept']) && isset($_GET['shift']) && isset($_GET['semester'])){
						$infos = $opr->filterRecordBy("students", "dept",  "shift", "semester",$_GET['dept'], $_GET['shift'], $_GET['semester'], "semester");
					} elseif (isset($_GET['dept'])){
						$infos = $opr->getRecordByColumn("students", "dept", $_GET['dept'], "semester");
					} elseif (isset($_GET['shift'])){
						$infos = $opr->getRecordByColumn("students", "shift", $_GET['shift'], "semester");
					} else {
						$infos = $opr->getSortedRecord("students", "semester");
					}
					foreach ($infos as $info):
						$info = $odb->fetchObjAssoc($info);
					?><tr>
						<td style="text-align: center;"><?= $i++; ?></td>
						<td><?= $info->name ?></td>
						<td><?php if ($lang == 'en'):
						echo $odb->getDataById("departments", $info->dept)->fetch_object()->title;
						else:
						echo $odb->getDataById("departments", $info->dept)->fetch_object()->bn_title;
						endif; ?></td>
						<td><?php if ($lang == 'en'){
						        echo $info->semester;
                            } else {
						        $isem = ($info->semester == "1st")?"১ম":"";
						        $isem = ($info->semester == "2nd")?"২য়":$isem;
						        $isem = ($info->semester == "3rd")?"৩য়":$isem;
						        $isem = ($info->semester == "4th")?"৪র্থ":$isem;
						        $isem = ($info->semester == "5th")?"৫ম":$isem;
						        $isem = ($info->semester == "6th")?"৬ষ্ঠ":$isem;
						        $isem = ($info->semester == "7th")?"৭ম":$isem;
						        $isem = ($info->semester == "8th")?"৮ম":$isem;
						        echo $isem;
                            } ?></td>
						<td><?php
                            if ($lang == 'en'){
                                echo $info->shift;
                            } else {
                                echo ($info->shift == '1st')?"১ম":"২য়";
                            }
                            ?></td>
						<td><?= $info->roll ?></td>
						<td><?= $info->reg ?></td>
						<td><?= $info->session ?></td>
						<td style="text-align: center;">
							<a href="student-details.php?id=<?= $info->id ?>">&rarr;</a></td>
					</tr><?php endforeach; ?>
				</table>
			
			</div>
		</div>
	</div>
	<!-- End Blog -->

<?php include "include/footer.php"; ?>