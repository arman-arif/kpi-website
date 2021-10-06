
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Gallary Items";
$m_gallary = "active";

$infos = $odb->getDescData("gallary", "id");

include 'include/header.php';
?>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $page_title; ?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="row">
					<?php foreach ($infos as $info): ?>
					<?php $info = $odb->fetchObjAssoc($info); ?>
					<div class="col-sm-6 col-md-4 col-lg-3" style="min-height: 300px">
						<div class="img-thumbnail .equal-hight" style="height: 95%">
							<h4><?= $info->title ?></h4>
							<img src="../uploads/gallary/thumb/thumb_<?= $info->image ?>" alt="" width="530" height="530" class="img-responsive ">
							<p class="text-center"><?= $info->section ?></p>
							<p class="text-center<?= ($info->status == 1)?" text-success":" text-danger" ?>"><?= ($info->status == 1)?"Published":"Unpublished" ?></p>
							<div class="text-center">
								<a href="../uploads/gallary/<?= $info->image ?>" class="text-info" target="_blank"><span class="ti-new-window"></span></a>&ensp;
								<a href="../uploads/gallary/<?= $info->image ?>" class="text-success" download="gallary_<?= $info->section."_".$info->image ?>"><span class="ti-download"></span></a>
								&ensp;&ensp;<span class="text-muted">&shortmid;</span>&ensp;&ensp;
								
								<?php if ($info->status == 1): ?>
								<a href="modify.php?a=unpub&c=gallary&id=<?= $info->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
								<?php else: ?>
								<a href="modify.php?a=pub&c=gallary&id=<?= $info->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
								<?php endif; ?>&ensp;
								<a href="modify.php?a=del&c=gallary&id=<?= $info->id ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
include "include/footer.php";
?>


