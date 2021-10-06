<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "Add Department";
$m_dept = "active";

if (isset($_POST['title'])){
    $data = $ofn->validateArray($_POST);

    if (empty($data['description'])){
        $err_msg="Description should not be empty";
    } else {
        $image = $oup->uploadImage($_FILES, "image", "departments");
        $icon = $oup->uploadImage($_FILES, "icon", "departments");
        $data['image'] = $image;
        $data['icon'] = $icon;

        if ($image != false && $icon != false){
            $odb->insertData('departments', $data);
            header("location: view-dept-list.php");
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
                    <div class="row">

                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Department Title</label>
                                        <input class="form-control" placeholder="Enter text" required name="title" value="<?= isset($data['title'])?$data['title']:"" ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Department Title [Bangla]</label>
                                        <input class="form-control" placeholder="Enter text" required name="bn_title" value="<?= isset($data['bn_title'])?$data['bn_title']:"" ?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Department Image</label>
                                        <input type="file" name="image" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Department Logo</label>
                                        <input type="file" name="icon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Department Description</label>
                                    <textarea class="form-control ckeditor" name="description" required><?= isset($data['description'])?$data['description']:"" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Department Description [Bangla]</label>
                                    <textarea class="form-control ckeditor" name="bn_description" required><?= isset($data['bn_description'])?$data['bn_description']:"" ?></textarea>
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