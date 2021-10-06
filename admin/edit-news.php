<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();
$odl = new Delete();

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;

$page_title = "Edit News";
$m_news = "active";

$all_info = $odb->getDataById("news", $id);
$r_info = $all_info->fetch_object();

if ($all_info->num_rows == 0){
    header("location: view-news-list.php");
}

if (isset($_POST['title'])){
    $data = $ofn->validateArray($_POST);
    $file = $data['old_file'];
	$image = $data['old_image'];
	unset($data['old_file']);
	unset($data['old_image']);

    if (empty($data['details'])){
        $err_msg="Details should not be empty";
    } else {
        if (!empty($_FILES['file']['name'])){
            $file = $oup->uploadFile($_FILES, "file", "news");
            if ($file != false){
                if (!empty($r_info->file)){
	                $odl->deleteFile($r_info->file, "news");
                }
            }
        }
	    if (!empty($_FILES['image']['name'])){
		    $image = $oup->uploadImage($_FILES, "image", "news");
		    if ($image != false){
			    if (!empty($r_info->image)){
				    $odl->deleteImage($r_info->image, "news");
                }
		    }
	    }

        $data['file'] = $file;
        $data['image'] = $image;
        
        $odb->updateData('news', $data, $id);
        header("location: view-news-list.php");
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
                        
                        <?php if (!empty($r_info->image)): ?>
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <img src="../uploads/news/<?= $r_info->image ?>" alt="" class="img-thumbnail img-responsive"><br><br>
                            </div>
                            <div class="col-md-3"></div>
                        <?php endif ?>
                       
                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="old_file" value="<?= $r_info->file ?>">
                                <input type="hidden" name="old_image" value="<?= $r_info->image ?>">
                                <div class="form-group">
                                    <label>News Title</label>
                                    <input class="form-control" placeholder="Enter text" required name="title" value="<?= isset($data['title'])?$data['title']:$r_info->title ?>">
                                </div>
                                <div class="form-group">
                                    <label>News Title [Bangla]</label>
                                    <input class="form-control" placeholder="Enter text" required name="bn_title" value="<?= isset($data['bn_title'])?$data['bn_title']:$r_info->bn_title ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Add Image </label> <small>[Change]</small>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Attach File </label> <small>[Change]</small>
                                        <input type="file" name="file"><br>
                                        <?php if (!empty($r_info->file)): ?>
                                            <span>Attached file: <?= $r_info->file ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Noice Details</label>
                                    <textarea class="form-control ckeditor" name="details" required><?= isset($data['details'])?$data['details']:htmlspecialchars_decode($r_info->details) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Noice Details [Bangla]</label>
                                    <textarea class="form-control ckeditor" name="bn_details" required><?= isset($data['bn_details'])?$data['bn_details']:htmlspecialchars_decode($r_info->bn_details) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value=""> -- Select Publication Status -- </option>
                                        <option value="1"<?= (isset($data['status']) && $data['status'] == 1) ? " selected":(($r_info->status == 1) ? " selected":"") ?>>Published</option>
                                        <option value="0"<?= (isset($data['status']) && $data['status'] == 0) ? " selected":(($r_info->status == 0) ? " selected":"") ?>>Unpublished</option>
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