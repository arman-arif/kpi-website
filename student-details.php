<?php
require_once 'lib/init.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$info = $odb->getDataById("students", $id)->fetch_object();

$page_title = ($lang == 'en')?"Student Details":"ছাত্র বিবরণ";

include 'include/header.php';
?>

<div class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="content">
					<h1 style="text-align: center;"><?= $page_title ?></h1>
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
			<div class="col-md-5"> <img src="uploads/students/<?= $info->image ?>" class="img-responsive" alt=""> </div>
			<div class="col-md-7">
				<h2><?= $info->name ?></h2>
				<h5>Department: <?= $odb->getDataById("departments", $info->dept)->fetch_object()->title ?> Technology</h5><br>
				<h6><?= $info->shift ?> Shift, <?= $info->semester ?> Semester</h6><br>
				<h6>Roll: <?= $info->roll ?></h6><br>
				<h6>Reg. No: <?= $info->reg ?></h6><br>
				<h6>Session: <?= $info->session ?></h6><br>
				<h6>Contact: <?= $info->contact ?></h6>
			</div>
		</div>
	</div>
</section>
<!-- End About -->

<?php include "include/footer.php"; ?>
