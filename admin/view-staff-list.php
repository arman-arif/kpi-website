
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Staffs List";
$m_staff = "active";

$infos = $odb->getData("staffs");

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
                            <th>Academics</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($infos as $info):
                        ?>
                        <tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
                            <td class="text-center" width="5%"><?php echo $i++; ?></td>
                            <td width="20%"><img src="../uploads/staffs/<?= $info['image'] ?>" width="25" height="25">
                                <?= $info['name'] ?></td>
                            <td><?php echo $info['designation']; ?></td>
                            <td><?php
                                $info_acad = strip_tags(htmlspecialchars_decode($info['academics']));
                                echo ($info_acad < 30)?$info_acad:$ofn->textShorten($info_acad, 30) ?></td>
                            <td width="10%" class="text-center"><?php if ($info['status'] == 1): ?>
                                <span class="text-success">Published</span>
                                <?php else: ?>
                                <span class="text-danger">Unpublished</span>
                            <?php endif; ?></td>
                            <td class="text-center">
                                <?php if ($info['status'] == 1): ?>
                                    <a href="modify.php?a=unpub&c=staffs&id=<?= $info['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
                                <?php else: ?>
                                    <a href="modify.php?a=pub&c=staffs&id=<?= $info['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
                                <?php endif; ?>
                                <a href="view-staff-details.php?id=<?= $info['id'] ?>" class="text-success"><span class="ti-eye"></span></a>
                                <a href="../staff-details.php?id=<?= $info['id'] ?>" target="_blank" class="text-success"><span class="ti-new-window"></span></a>
                                <a href="edit-staff.php?id=<?= $info['id'] ?>"><span class="ti-pencil-alt"></span></a>
                                <a href="modify.php?a=del&c=staffs&id=<?= $info['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
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