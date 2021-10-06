<?php
	require_once 'lib/init.php';
	$odb = new Database();
	$opr = new Published();
	$oup = new Upload();
	$oip = new ImageProcess();
	
	$page_title = "Add Image";
	$m_gallary = "active";
	
	if (isset($_POST['title'])){
		$data = $ofn->validateArray($_POST);
		
		$image= $oup->uploadImage($_FILES, "image", "gallary");
		$data['image'] = $image;
		
		$oip->createThumblnail($image, "gallary");
		
		if ($image != false){
			$odb->insertData('gallary', $data);
			header("location: view-gallary-items.php");
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
								<div class="form-group row">
									<div class="col-md-6">
										<label>Title</label>
                                        <input type="text" name="title" class="form-control" required>
									</div>
									<div class="col-md-6">
										<label>Section</label>
                                        <input type="text" name="section" class="form-control" required>
                                    </div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Attach Image</label>
										<input type="file" name="image" required>
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