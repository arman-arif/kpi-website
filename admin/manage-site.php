<?php
require_once 'lib/init.php';

$odb = new Database();
$oup = new Upload();
$odl = new Delete();

$page_title = "Manage Site";
$m_site = "active";


if (isset($_POST['save'])){
	unset($_POST['save']);
	$data = $ofn->validateArray($_POST);
	
	foreach ($data as $title => $content) {
		$odb->updateInfo($title, $content);
	}
	
	if (!empty($_FILES['principal_photo']['name'])){
	    $image = $oup->uploadImage($_FILES, "principal_photo");
		if ($image != false){
			$odl->deleteImage($odb->getFile('info', 'principal_photo'), 'images');
			$odb->query("UPDATE info SET file = '$image' WHERE title = 'principal_photo'");
        }
    }
	
	
	
	header("location: manage-site.php");
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
					<div class="row m-4">
						<div class="col-lg-12">
							<form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Institute Name</label>
                                    <input class="form-control" placeholder="Enter text" required name="institute_name" value="<?= isset($data["institute_name"])?$data["institute_name"]:$odb->getInfo("institute_name") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Institute Name [Bangla]</label>
                                    <input class="form-control" placeholder="Enter text" required name="bn_institute_name" value="<?= isset($data["bn_institute_name"])?$data["bn_institute_name"]:$odb->getInfo("bn_institute_name") ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Principal Name</label>
                                        <input class="form-control" placeholder="Enter text" required name="principal_name" value="<?= isset($data["principal_name"])?$data["principal_name"]:$odb->getInfo("principal_name") ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Principal Name [Bangla]</label>
                                        <input class="form-control" placeholder="Enter text" required name="bn_principal_name" value="<?= isset($data["bn_principal_name"])?$data["bn_principal_name"]:$odb->getInfo("bn_principal_name") ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Principal Message</label>
                                    <textarea class="form-control ckeditor" required name="principal_message"><?= isset($data["principal_message"])?$data["principal_message"]:$odb->getInfo("principal_message") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Principal Message [Bangla]</label>
                                    <textarea class="form-control ckeditor" required name="bn_principal_message"><?= isset($data["bn_principal_message"])?$data["bn_principal_message"]:$odb->getInfo("bn_principal_message") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Principal Photo</label><br>
                                    <img height="150" src="../uploads/images/<?= $odb->getFile("info", "principal_photo") ?>" alt="">
                                    <input type="hidden" name="old_photo" value="<?= $odb->getFile("info", "principal_photo"); ?>">
                                    <br><br><small><b>[Change Photo]</b></small>
                                    <input type="file" name="principal_photo">
                                </div>
                                <div class="form-group">
                                    <label>Institute Email</label>
                                    <input class="form-control" type="text" required name="email" value="<?= isset($data["email"])?$data["email"]:$odb->getInfo("email") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Institute Telephone</label>
                                    <input class="form-control" type="text" required name="telephone" value="<?= isset($data["telephone"])?$data["telephone"]:$odb->getInfo("telephone") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Institute Location</label>
                                    <input class="form-control" type="text" required name="location" value="<?= isset($data["location"])?$data["location"]:$odb->getInfo("location") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Institute Location [Bangla]</label>
                                    <input class="form-control" type="text" required name="bn_location" value="<?= isset($data["bn_location"])?$data["bn_location"]:$odb->getInfo("bn_location") ?>">
                                </div>
                                <div class="form-group">
                                    <label>About us (Short)</label>
                                    <textarea class="form-control" required rows="2" name="about"><?= isset($data["about"])?$data["about"]:$odb->getInfo("about") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>About us (Short) [Bangla]</label>
                                    <textarea class="form-control" required rows="2" name="bn_about"><?= isset($data["bn_about"])?$data["bn_about"]:$odb->getInfo("bn_about") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>About us (Long)</label>
                                    <textarea class="form-control" required rows="10" name="about_us"><?= isset($data["about_us"])?$data["about_us"]:$odb->getInfo("about_us") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>About us (Long) [Bangla]</label>
                                    <textarea class="form-control" required rows="10" name="bn_about_us"><?= isset($data["bn_about_us"])?$data["bn_about_us"]:$odb->getInfo("bn_about_us") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Vision (About Page)</label>
                                    <textarea class="form-control" required rows="3" name="vision"><?= isset($data["vision"])?$data["vision"]:$odb->getInfo("vision") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Vision (About Page) [Bangla]</label>
                                    <textarea class="form-control" required rows="3" name="bn_vision"><?= isset($data["bn_vision"])?$data["bn_vision"]:$odb->getInfo("bn_vision") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mission (About Page)</label>
                                    <textarea class="form-control" required rows="3" name="mission"><?= isset($data["mission"])?$data["mission"]:$odb->getInfo("mission") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mission (About Page) [Bangla]</label>
                                    <textarea class="form-control" required rows="3" name="bn_mission"><?= isset($data["bn_mission"])?$data["bn_mission"]:$odb->getInfo("bn_mission") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Facebook Url</label>
                                    <input class="form-control" type="text" required name="facebook_url" value="<?= isset($data["facebook_url"])?$data["facebook_url"]:$odb->getInfo("facebook_url") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Twitter Url</label>
                                    <input class="form-control" type="text" required name="twitter_url" value="<?= isset($data["twitter_url"])?$data["twitter_url"]:$odb->getInfo("twitter_url") ?>">
                                </div>
                                <div class="form-group">
                                    <label>LinkedIn Url</label>
                                    <input class="form-control" type="text" required name="linkedin_url" value="<?= isset($data["linkedin_url"])?$data["linkedin_url"]:$odb->getInfo("linkedin_url") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Google Plus Url</label>
                                    <input class="form-control" type="text" required name="gplus_url" value="<?= isset($data["gplus_url"])?$data["gplus_url"]:$odb->getInfo("gplus_url") ?>">
                                </div>
                                
								<button type="submit" class="btn btn-default btn-block" name="save">Save</button>
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