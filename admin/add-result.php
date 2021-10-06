<?php
	require_once 'lib/init.php';
	$odb = new Database();
	$opr = new Published();
	$oup = new Upload();
	
	$page_title = "Add Result";
	$m_result = "active";
	
	if (isset($_POST['dept'])){
		$data = $ofn->validateArray($_POST);
		
		$file= $oup->uploadFile($_FILES, "file", "results");
		$data['file'] = $file;
		
		if ($file != false){
			$odb->insertData('results', $data);
			header("location: view-result-list.php");
		}
	}
	
	include 'include/header.php';
?>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-6">
			<?php if (isset($file)): ?>
				<?php if ($file == false): ?>
					<p class="alert alert-danger"><?php echo $file; ?></p>
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
								<div class="form-group row">
									<div class="col-md-6">
										<label>Department</label>
										<select class="form-control" name="dept" required>
											<option value=""> -- Select Department -- </option>
											<?php $s_depts = $opr->getSortedRecord("departments", "title"); ?>
											<?php foreach ($s_depts as $d_info): ?>
												<?php $d_info = $odb->fetchObjAssoc($d_info); ?>
												<option value="<?= $d_info->id ?>"<?= (isset($data['dept']) && $data['dept'] == $d_info->id) ? " selected":"" ?>><?= $d_info->title ?></option>
											<?php endforeach; ?>
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
										<label>Year</label>
										<select name="year" class="form-control" required>
											<option value=""> -- Select Year -- </option>
											<?php
												$current_year = date("Y");
												for ($year =  $current_year+1; $year >= 1963; $year--): ?>
											<option value="<?= $year ?>"<?= (isset($data['year']) && $data['year'] == $year)?" selected":"" ?>><?= $year ?></option>
											<?php endfor; ?>
										</select>
									</div>
									<div class="col-md-6">
										<label>Attached File</label>
										<input type="file" name="file" class="my-file" required>
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