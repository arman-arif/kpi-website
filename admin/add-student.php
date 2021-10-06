<?php
require_once 'lib/init.php';
$odb = new Database();
$opr = new Published();
$oup = new Upload();

$page_title = "Add Student";
$m_stu = "active";


if (isset($_POST['name'])){
	
	$data = $ofn->validateArray($_POST);
	
	$image = $oup->uploadImage($_FILES, "image", "students");
	$data['image'] = $image;
	
	if ($image != false){
		$odb->insertData('students', $data);
		header("location: view-student-list.php");
	}
}

include 'include/header.php';
?>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-6">
			<?php if (isset($image)): ?>
				<?php if ($image == false): ?>
					<p class="alert alert-danger"><?php echo $image; ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="col-lg-4"></div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $page_title; ?>
				</div>
				<div class="panel-body">
					<div class="row">
						
						<div class="col-lg-12">
							<form role="form" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Student Name</label>
									<input class="form-control" placeholder="Enter text" required name="name" value="<?= isset($data['name'])?$data['name']:"" ?>">
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Student photo</label>
										<input type="file" name="image" required>
									</div>
									<div class="col-md-6">
										<label>Department</label>
										<select class="form-control" required name="dept">
											<?php $s_depts = $opr->getRecord("departments"); ?>
											<option value=""> -- Select Department -- </option>
											<?php foreach ($s_depts as $dept): ?>
												<option value="<?= $dept['id'] ?>"><?php echo $dept['title']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Shift</label>
										<select class="form-control" name="shift" required>
											<option value=""> -- Select Shift -- </option>
											<option<?= (isset($data['shift']) && $data['shift'] == "1st") ? " selected":"" ?> value="1st">1st Shift</option>
											<option<?= (isset($data['shift']) && $data['shift'] == "2nd") ? " selected":"" ?> value="2nd">2nd Shift</option>
										</select>
									</div>
									<div class="col-md-6">
										<label>Semester</label>
										<select class="form-control" name="semester" required>
											<option value=""> -- Select Semester -- </option>
											<option<?= (isset($data['semester']) && $data['semester'] == "1st") ? " selected":"" ?> value="1st">1st Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "2nd") ? " selected":"" ?> value="2nd">2nd Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "3rd") ? " selected":"" ?> value="3rd">3rd Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "4th") ? " selected":"" ?> value="4th">4th Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "5th") ? " selected":"" ?> value="5th">5th Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "6th") ? " selected":"" ?> value="6th">6th Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "7th") ? " selected":"" ?> value="7th">7th Semester</option>
											<option<?= (isset($data['semester']) && $data['semester'] == "8th") ? " selected":"" ?> value="8th">8th Semester</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Student Roll</label>
										<input class="form-control" placeholder="Enter text" required name="roll" value="<?= isset($data['roll'])?$data['roll']:"" ?>">
									</div>
									<div class="col-md-6">
										<label>Student Reg. No</label>
										<input class="form-control" placeholder="Enter text" required name="reg" value="<?= isset($data['reg'])?$data['reg']:"" ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Session</label>
										<input class="form-control" placeholder="Enter text" required name="session" value="<?= isset($data['session'])?$data['session']:"" ?>">
									</div>
									<div class="col-md-6">
										<label>Contact No</label>
										<input class="form-control" placeholder="Enter text" required name="contact" value="<?= isset($data['contact'])?$data['contact']:"" ?>">
									</div>
								</div>
								<div class="form-group">
									<label>Publication Status</label>
									<select class="form-control" name="status" required>
										<option value=""> -- Select Publication Status -- </option>
										<option value="1"<?= (isset($data['status']) && $data['status'] == 1) ? " selected":"" ?>>Published</option>
										<option value="0"<?= (isset($data['status']) && $data['status'] == 0) ? " selected":"" ?>>Unpublished</option>
									</select>
								</div>
								<button type="submit" class="btn btn-default btn-block">Submit</button>
							</form>
						</div>
						<!-- /.col-lg-6 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

<?php
include 'include/footer.php';
?>