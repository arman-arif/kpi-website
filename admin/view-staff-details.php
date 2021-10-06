<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "View Staff Details";
$m_staff = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$staffs = $odb->getDataById("staffs", $id);

if ($staffs->num_rows == 0){
    header("location: view-staff-list.php");
}

$staff = $staffs->fetch_object();

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
                            <th width="20%">Staff Name</th>
                            <td><?php echo $staff->name; ?></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img src="../uploads/staffs/<?= $staff->image ?>" width="150"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php if ($staff->status == 1): ?>
                                    <span class="text-success">Published</span>
                                <?php else: ?>
                                    <span class="text-danger">Unpublished</span>
                                <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td><?php echo $staff->designation; ?></td>
                        </tr>
                        <tr>
                            <th>Academics</th>
                            <td><?php echo htmlspecialchars_decode($staff->academics); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo htmlspecialchars_decode($staff->description); ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo htmlspecialchars_decode($staff->address); ?></td>
                        </tr>

                    </table>
                    <div class="text-center">

                        <?php if ($staff->status == 1): ?>
                            <a href="modify.php?a=unpub&c=staffs&id=<?= $staff->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span> Unpublish </a>
                        <?php else: ?>
                            <a href="modify.php?a=pub&c=staffs&id=<?= $staff->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span> Publish </a>
                        <?php endif; ?>
                        &ensp;
                        <a href="../staff-details.php?id=<?= $staff->id ?>" target="_blank" class="text-success"><span class="ti-new-window"></span> View</a>
                        &ensp;
                        <a href="edit-staff.php?id=<?= $staff->id ?>"><span class="ti-pencil-alt"></span> Edit</a>
                        &ensp;
                        <a href="modify.php?a=del&c=staffs&id=<?= $staff->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

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