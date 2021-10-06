<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "View Teacher Details";
$m_teacher = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$teachers = $odb->getDataById("teachers", $id);

if ($teachers->num_rows == 0){
    header("location: view-teacher-list.php");
}

$teacher = $teachers->fetch_object();

include 'include/header.php';
?>

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $page_title; ?>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">Teacher Name</th>
                            <td><?php echo $teacher->name; ?></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img src="../uploads/teachers/<?= $teacher->image ?>" width="150"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php if ($teacher->status == 1): ?>
                                    <span class="text-success">Published</span>
                                <?php else: ?>
                                    <span class="text-danger">Unpublished</span>
                                <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td><?php echo $teacher->designation; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $odb->getDataById("departments", $teacher->dept)->fetch_object()->title; ?></td>
                        </tr>
                        <tr>
                            <th>Academics</th>
                            <td><?php echo htmlspecialchars_decode($teacher->academics); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo htmlspecialchars_decode($teacher->description); ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo htmlspecialchars_decode($teacher->address); ?></td>
                        </tr>

                    </table>
                    <div class="text-center">

                        <?php if ($teacher->status == 1): ?>
                            <a href="modify.php?a=unpub&c=teachers&id=<?= $teacher->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span> Unpublish </a>
                        <?php else: ?>
                            <a href="modify.php?a=pub&c=teachers&id=<?= $teacher->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span> Publish </a>
                        <?php endif; ?>

                        <a href="edit-teacher.php?id=<?= $teacher->id ?>"><span class="ti-pencil-alt"></span> Edit</a>
                        <a href="modify.php?a=del&c=teachers&id=<?= $teacher->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

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