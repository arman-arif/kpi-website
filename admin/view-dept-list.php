
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Department List";
$m_dept = "active";

$depts = $odb->getData("departments");

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
                            <th>Logo &amp; Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($depts as $dept):
                        ?>
                        <tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
                            <td class="text-center" width="5%"><?php echo $i++; ?></td>
                            <td width="20%"><img src="../uploads/departments/<?= $dept['icon'] ?>" width="25" height="25">
                                <?= $dept['title'] ?>/<?= $dept['bn_title'] ?></td>
                            <td width="45%"><?php
                                $desc = $dept['description'];
                                $desc = htmlspecialchars_decode($desc);
                                $desc = strip_tags($desc);
                                $desc = (strlen($desc) > 50) ? $ofn->textShorten($desc, 50) : $desc;
                                echo $desc;
                                ?></td>
                            <td width="10%" class="text-center"><?php if ($dept['status'] == 1): ?>
                                <span class="text-success">Published</span>
                                <?php else: ?>
                                <span class="text-danger">Unpublished</span>
                            <?php endif; ?></td>
                            <td width="10%" class="text-center">
                                <?php if ($dept['status'] == 1): ?>
                                    <a href="modify.php?a=unpub&c=departments&id=<?= $dept['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
                                <?php else: ?>
                                    <a href="modify.php?a=pub&c=departments&id=<?= $dept['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
                                <?php endif; ?>
                                <a href="view-dept-details.php?id=<?= $dept['id'] ?>" class="text-success"><span class="ti-eye"></span></a>
                                <a href="../department.php?id=<?= $dept['id'] ?>" target="_blank" class="text-success"><span class="ti-new-window"></span></a>
                                <a href="edit-dept.php?id=<?= $dept['id'] ?>"><span class="ti-pencil-alt"></span></a>
                                <a href="modify.php?a=del&c=departments&id=<?= $dept['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
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