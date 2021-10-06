<?php
require_once 'lib/init.php';
$odb = new Database();
$opr = new Published();
$oup = new Upload();
$odl = new Delete();
$oip = new ImageProcess();

$page_title = "Edit Slider";
$m_slide = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0;

$item = $odb->getDataById("slider", $id);
if ($item->num_rows == 0){
	header("location: view-slider-list.php");
}
$item = $item->fetch_object();

if (isset($_POST['title'])){
	$data = $ofn->validateArray($_POST);
	
	$image = $data['old_image'];
	unset($data['old_image']);
	
	if (!empty($_FILES['image']['name'])){
		$image= $oup->uploadImage($_FILES, "image", "slider");
		if ($image != false){
			$odl->deleteImage($item->image, "slider");
		}
	}
	
	$data['image'] = $image;
	
	if ($image != false){
		$odb->updateData('slider', $data, $id);
		header("location: view-slider-list.php");
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
					<img src="../uploads/slider/<?= $item->image ?>" class="img-thumbnail img-responsive" alt=""><br><br>
					<div class="row">
						<div class="col-lg-12">
							<form role="form" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<div class="col-md-6">
										<label>Title</label>
										<input type="text" name="title" class="form-control" required value="<?= isset($data['title'])?$data['title']:$item->title ?>">
									</div>
									<div class="col-md-6">
										<label>Text Top</label>
										<input type="text" name="text_top" class="form-control" value="<?= isset($data['text_top'])?$data['text_top']:$item->text_top ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Attach Slider Image</label>
										<input type="file" name="image">
										<input type="hidden" name="old_image" value="<?= $item->image ?>">
									</div>
								</div>
								<div class="form-group">
									<label>Heading Text</label>
									<input type="text" name="heading" class="form-control" value="<?= isset($data['heading'])?$data['heading']:$item->heading ?>">
								</div>
								<div class="form-group">
									<label>Caption Text</label>
									<textarea name="caption" class="form-control" maxlength="300"><?= isset($data['caption'])?$data['caption']:$item->caption ?></textarea>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Button Name</label>
										<input type="text" name="btn_name" class="form-control" value="<?= isset($data['btn_name'])?$data['btn_name']:$item->btn_name ?>">
									</div>
									<div class="col-md-6">
										<label>Button Url</label>
										<input type="text" name="btn_url" class="form-control" value="<?= isset($data['btn_url'])?$data['btn_url']:$item->btn_url ?>">
									</div>
								</div>
								<div class="form-group">
									<label>Publication Status</label>
									<select class="form-control" name="status" required>
										<option value=""> -- Select Publication Status -- </option>
										<option value="1"<?= (isset($data['status']) && $data['status'] == 1) ? " selected":(($item->status == 1) ? " selected":"") ?>>Published</option>
										<option value="0"<?= (isset($data['status']) && $data['status'] == 0) ? " selected":(($item->status == 0) ? " selected":"") ?>>Unpublished</option>
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