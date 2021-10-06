
<?php
	require_once 'lib/init.php';
	$odb = new Database();
	
	$page_title = "Routine List";
	$m_routine = "active";
	
	$infos = $odb->getDescData("routine", "dept");
	
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
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTable">
						<thead>
						<tr>
							<th>S/N</th>
							<th>Department</th>
							<th>Semester</th>
							<th>Shift</th>
							<th>Regulation</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$i = 1;
							foreach ($infos as $info):
								?>
								<tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
									<td class="text-center" width="5%"><?php echo $i++; ?></td>
									<td width="20%"><?=
                                            $odb->getDataById("departments", $info['dept'])->fetch_object()->title;
                                            ?></td>
									<td width="20%"><?= $info['semester'] ?> Semester</td>
									<td width="10%"><?= $info['shift'] ?> Shift</td>
									<td width="10%"><?= $info['regulation'] ?></td>
									<td class="text-center"><?php if ($info['status'] == 1): ?>
											<span class="text-success">Published</span>
										<?php else: ?>
											<span class="text-danger">Unpublished</span>
										<?php endif; ?></td>
									<td class="text-center">
                                        <a href="../uploads/files/routine/<?= $info['file'] ?>" class="text-info" target="_blank"><span class="ti-new-window"></span></a>&ensp;
                                        <a href="../uploads/files/routine/<?= $info['file'] ?>" class="text-success" download="routine_<?= $info['semester']."_semester_".$info['regulation'] ?>"><span class="ti-download"></span></a>
                                        &ensp;&ensp;<span class="text-muted">&shortmid;</span>&ensp;&ensp;
          
										<?php if ($info['status'] == 1): ?>
											<a href="modify.php?a=unpub&c=routine&id=<?= $info['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
										<?php else: ?>
											<a href="modify.php?a=pub&c=routine&id=<?= $info['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
										<?php endif; ?>&ensp;
										<a href="edit-routine.php?id=<?= $info['id'] ?>"><span class="ti-pencil-alt"></span></a>&ensp;
										<a href="modify.php?a=del&c=routine&id=<?= $info['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
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