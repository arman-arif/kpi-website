
<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Notice List";
$m_notice = "active";

$infos = $odb->getData("notice");

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
                            <th>Title</th>
                            <th>Details</th>
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
                            <td width="30%"><?= $info['title'] ?></td>
                            <td width="40%"><?php $info_det = strip_tags(htmlspecialchars_decode($info['details']));
                                echo (strlen($info_det) < 40)?$info_det:$ofn->textShorten($info_det, 40); ?></td>
                            <td class="text-center"><?php if ($info['status'] == 1): ?>
                                <span class="text-success">Published</span>
                                <?php else: ?>
                                <span class="text-danger">Unpublished</span>
                            <?php endif; ?></td>
                            <td class="text-center">
                                <?php if ($info['status'] == 1): ?>
                                    <a href="modify.php?a=unpub&c=notice&id=<?= $info['id'] ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span></a>
                                <?php else: ?>
                                    <a href="modify.php?a=pub&c=notice&id=<?= $info['id'] ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span></a>
                                <?php endif; ?>
                                <a href="view-notice-details.php?id=<?= $info['id'] ?>" class="text-success"><span class="ti-eye"></span></a>
                                <a href="../notice-order-details.php?id=<?= $info['id'] ?>" target="_blank" class="text-success"><span class="ti-new-window"></span></a>
                                <a href="edit-notice.php?id=<?= $info['id'] ?>"><span class="ti-pencil-alt"></span></a>
                                <a href="modify.php?a=del&c=notice&id=<?= $info['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
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