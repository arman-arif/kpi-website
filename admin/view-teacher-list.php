
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Teachers List";
$m_teacher = "active";

$teachers = $odb->getData("teachers");

include 'include/header.php';
?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $page_title; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Photo &amp; Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($teachers as $teacher):
                        ?>
                        <tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
                            <td class="text-center" width="5%"><?php echo $i++; ?></td>
                            <td width="20%"><img src="../uploads/teachers/<?= $teacher['image'] ?>" width="25" height="25">
                                <?= $teacher['name'] ?></td>
                            <td><?php echo $teacher['designation']; ?></td>
                            <td><?php $s_depts = $odb->getData("departments");
                                foreach ($s_depts as $dept){
                                    if ($dept['id'] == $teacher['dept']){
                                        echo $dept['title'];
                                    }
                                }
                            ?></td>
                            <td width="10%" class="text-center"><?php if ($teacher['status'] == 1): ?>
                                <span class="text-success">Published</span>
                                <?php else: ?>
                                <span class="text-danger">Unpublished</span>
                            <?php endif; ?></td>
                            <td class="text-center">
                                <?php if ($teacher['status'] == 1): ?>
                                    <a href="modify.php?a=unpub&c=teachers&id=<?= $teacher['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
                                <?php else: ?>
                                    <a href="modify.php?a=pub&c=teachers&id=<?= $teacher['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
                                <?php endif; ?>
                                <a href="view-teacher-details.php?id=<?= $teacher['id'] ?>" class="text-success"><span class="ti-eye"></span></a>
                                <a href="../teacher-details.php?id=<?= $teacher['id'] ?>" target="_blank" class="text-success"><span class="ti-new-window"></span></a>
                                <a href="edit-teacher.php?id=<?= $teacher['id'] ?>"><span class="ti-pencil-alt"></span></a>
                                <a href="modify.php?a=del&c=teachers&id=<?= $teacher['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
include "include/footer.php";
?>