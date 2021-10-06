
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Students List";
$m_stu = "active";

$students = $odb->getData("students");

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
							<th>Photo &amp; Name</th>
							<th>Department</th>
							<th>Shift</th>
							<th>Semester</th>
							<th>Roll/Reg. No</th>
							<th>Session</th>
							<th>Contact</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($students as $student):
							?>
							<tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
								<td class="text-center" width="5%"><?php echo $i++; ?></td>
								<td><img src="../uploads/students/<?= $student['image'] ?>" width="25" height="25">
									<?= $student['name'] ?></td>
								<td><?php $s_depts = $odb->getData("departments");
									foreach ($s_depts as $dept){
										if ($dept['id'] == $student['dept']){
											echo $dept['title'];
										}
									}
									?></td>
								<td><?= $student['shift'] ?></td>
								<td><?= $student['semester'] ?></td>
								<td><?= $student['roll'] ?>/<?= $student['reg'] ?></td>
								<td><?= $student['session'] ?></td>
								<td><?= $student['contact'] ?></td>
								<td class="text-center"><?php if ($student['status'] == 1): ?>
										<span class="text-success">Published</span>
									<?php else: ?>
										<span class="text-danger">Unpublished</span>
									<?php endif; ?></td>
								<td class="text-center">
									<?php if ($student['status'] == 1): ?>
										<a href="modify.php?a=unpub&c=students&id=<?= $student['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
									<?php else: ?>
										<a href="modify.php?a=pub&c=students&id=<?= $student['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
									<?php endif; ?>&ensp;
									<a href="../student-details.php?id=<?= $student['id'] ?>" target="_blank" class="text-success"><span class="ti-new-window"></span></a>&ensp;
									<a href="edit-student.php?id=<?= $student['id'] ?>"><span class="ti-pencil-alt"></span></a>&ensp;
									<a href="modify.php?a=del&c=students&id=<?= $student['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
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