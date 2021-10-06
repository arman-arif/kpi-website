<?php
require_once 'lib/init.php';

$odb = new Database();
$oup = new Upload();
$odl = new Delete();

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;

$page_title = "Edit Department";
$m_dept = "active";

$dept = $odb->getDataById("departments", $id)->fetch_object();

if (isset($_POST['title'])){
    $data = $ofn->validateArray($_POST);

    $image = $data['old_image'];
    unset($data['old_image']);
    $icon = $data['old_icon'];
    unset($data['old_icon']);

    if (empty($data['description'])){
        $err_msg="Description should not be empty";
    } else {
        if (!empty($_FILES['image']['name'])){
            $image = $oup->uploadImage($_FILES, "image", "departments");
            if ($image != false){
                $odl->deleteImage($dept->image, "departments");
            }
        }
        if (!empty($_FILES['icon']['name'])){
            $icon = $oup->uploadImage($_FILES, "icon", "departments");
            if ($icon != false){
                $odl->deleteImage($dept->icon, "departments");
            }
        }

        $data['image'] = $image;
        $data['icon'] = $icon;

        if ($image != false && $icon != false){
            $odb->updateData('departments', $data, $id);
            header("location: view-dept-details.php?id=$id");
        }
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
            <?php if (isset($icon)): ?>
                <?php if ($icon == false): ?>
                    <p class="alert alert-danger"><?php echo $icon; ?></p>
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
                            <div class="mx-auto text-center">
                                <img src="../uploads/departments/<?= $dept->icon ?>" width="100" height="100" style="margin: 0 auto;">
                                
                            </div>
                            <div class="mx-auto text-center">
                                <img src="../uploads/departments/<?= $dept->image ?>" width="300" style="margin: 0 auto;">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $dept->image ?>" name="old_image">
                                <input type="hidden" value="<?= $dept->icon ?>" name="old_icon">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Department Title</label>
                                        <input class="form-control" placeholder="Enter text" required name="title" value="<?= isset($data['title'])?$data['title']:$dept->title ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Department Title [Bangla]</label>
                                        <input class="form-control" placeholder="Enter text" required name="bn_title" value="<?= isset($data['bn_title'])?$data['bn_title']:$dept->bn_title ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Department Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Department Logo</label>
                                        <input type="file" name="icon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Department Description</label>
                                    <textarea class="form-control ckeditor" name="description"><?= isset($data['description'])?$data['description']:htmlspecialchars_decode($dept->description) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Department Description [Bangla]</label>
                                    <textarea class="form-control ckeditor" name="bn_description"><?= isset($data['bn_description'])?$data['bn_description']:htmlspecialchars_decode($dept->bn_description) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value=""> -- Select Publication Status -- </option>
                                        <option value="1"<?= (isset($data['status']) && $data['status'] == 1) ? " selected" : (($dept->status == 1 ) ? " selected" : "") ?>>Published</option>
                                        <option value="0"<?= (isset($data['status']) && $data['status'] == 0) ? " selected" : (($dept->status == 0 ) ? " selected" : "") ?>>Unpublished</option>
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