<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "View Department";
$m_dept = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$depts = $odb->getDataById("departments", $id);

if ($depts->num_rows == 0){
    header("location: view-dept-list.php");
}

$dept = $depts->fetch_object();

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

                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">Department Title</th>
                            <td><?php echo $dept->title; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Title [Bangla]</th>
                            <td><?php echo $dept->bn_title; ?></td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td><img src="../uploads/departments/<?= $dept->icon ?>" width="70" height="70"></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="../uploads/departments/<?= $dept->image ?>" width="400"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php if ($dept->status == 1): ?>
                                <span class="text-success">Published</span>
                                <?php else: ?>
                                <span class="text-danger">Unpublished</span>
                            <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo htmlspecialchars_decode($dept->description); ?></td>
                        </tr>
                        <tr>
                            <th>Description [Bangla]</th>
                            <td><?php echo htmlspecialchars_decode($dept->bn_description); ?></td>
                        </tr>
                    </table>
                    <div class="text-center">

                        <?php if ($dept->status == 1): ?>
                            <a href="modify.php?a=unpub&c=departments&id=<?= $dept->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span> Unpublish </a>
                        <?php else: ?>
                            <a href="modify.php?a=pub&c=departments&id=<?= $dept->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span> Publish </a>
                        <?php endif; ?>

                        <a href="edit-dept.php?id=<?= $dept->id ?>"><span class="ti-pencil-alt"></span> Edit</a>
                        <a href="modify.php?a=del&c=departments&id=<?= $dept->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

                    </div>

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