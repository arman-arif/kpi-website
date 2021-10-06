<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "Add Teacher";
$m_teacher = "active";


if (isset($_POST['name'])){

    $errors = [];
    $data = $ofn->validateArray($_POST);

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
        $image = $oup->uploadImage($_FILES, "image", "teachers");
        $data['image'] = $image;

        if ($image != false || $icon != false){
            $odb->insertData('teachers', $data);
            header("location: view-teacher-list.php");
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
                    <div class="row">

                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Teacher Name</label>
                                    <input class="form-control" placeholder="Enter text" required name="name" value="<?= isset($data['name'])?$data['name']:"" ?>">
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" placeholder="Enter text" required name="designation" value="<?= isset($data['designation'])?$data['designation']:"" ?>">
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" required name="dept">
                                        <?php $s_depts = $odb->getData("departments"); ?>
                                        <option value=""> -- Select Department -- </option>
                                        <?php foreach ($s_depts as $dept): ?>
                                        <option value="<?= $dept['id'] ?>"><?php echo $dept['title']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Teacher photo</label>
                                        <input type="file" name="image" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Teacher Description</label>
                                    <textarea class="form-control ckeditor" name="description"><?= isset($data['description'])?$data['description']:"" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Teacher Academics</label>
                                    <textarea class="form-control ckeditor" name="academics"><?= isset($data['academics'])?$data['academics']:"" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Teacher Address</label>
                                    <textarea class="form-control ckeditor" name="address"><?= isset($data['address'])?$data['address']:"" ?></textarea>
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