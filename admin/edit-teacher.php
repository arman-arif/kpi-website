<?php
require_once 'lib/init.php';

$odb = new Database();
$oup = new Upload();
$odl = new Delete();

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;

$page_title = "Edit Teacher";
$m_teacher = "active";

$teachers = $odb->getDataById("teachers", $id);
$r_info = $teachers->fetch_object();

if ($teachers->num_rows == 0){
    header("location: view-teacher-list.php");
}

if (isset($_POST['name'])){

    $erros = [];
    $data = $ofn->validateArray($_POST);

    $image = $data['old_image'];
    unset($data['old_image']);

    if (empty($data['description']) || empty($data['academics']) || empty($data['address'])){
        if (empty($data['description'])){
            array_push($errors,"Description should not be empty");
        }
        if (empty($data['academics'])){
            array_push($errors,"Academics should not be empty");
        }
        if (empty($data['address'])){
            array_push($errors,"Address should not be empty");
        }
    } else {
        if (!empty($_FILES['image']['name'])){
            $image = $oup->uploadImage($_FILES, "image", "teachers");
            if ($image != false){
                $odl->deleteImage($r_info->image, "teachers");
            }
        }

        $data['image'] = $image;

        if ($image != false){
            $odb->updateData('teachers', $data, $id);
            header("location: view-teacher-details.php?id=$id");
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
                                <img src="../uploads/teachers/<?= $r_info->image ?>" width="150" style="margin: 0 auto;">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $r_info->image ?>" name="old_image">
                                <div class="form-group">
                                    <label>Teacher name</label>
                                    <input class="form-control" placeholder="Enter text" required name="name" value="<?= isset($data['name'])?$data['name']:$r_info->name ?>">
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" placeholder="Enter text" required name="designation" value="<?= isset($data['designation'])?$data['designation']:$r_info->designation ?>">
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" required name="dept">
                                        <?php $s_depts = $odb->getData("departments"); ?>
                                        <option value=""> -- Select Department -- </option>
                                        <?php foreach ($s_depts as $dept): ?>
                                            <option value="<?= $dept['id'] ?>"<?= ($dept['id']==$r_info->dept)?" selected":"" ?>><?php echo $dept['title']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Teacher Photo <small>(Change Photo)</small></label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Teacher Description</label>
                                    <textarea class="form-control ckeditor" name="description"><?= isset($data['description'])?$data['description']:htmlspecialchars_decode($r_info->description) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Teacher Academics</label>
                                    <textarea class="form-control ckeditor" name="academics"><?= isset($data['academics'])?$data['academics']:htmlspecialchars_decode($r_info->academics) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Teacher Address</label>
                                    <textarea class="form-control ckeditor" name="address"><?= isset($data['address'])?$data['address']:htmlspecialchars_decode($r_info->address) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value=""> -- Select Publication Status -- </option>
                                        <option value="1"<?= (isset($data['status']) && $data['status'] == 1) ? " selected" : (($r_info->status == 1 ) ? " selected" : "") ?>>Published</option>
                                        <option value="0"<?= (isset($data['status']) && $data['status'] == 0) ? " selected" : (($r_info->status == 0 ) ? " selected" : "") ?>>Unpublished</option>
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