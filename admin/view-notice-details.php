<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "View Notice Details";
$m_notice = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$notice = $odb->getDataById("notice", $id);

if ($notice->num_rows == 0){
    header("location: view-notice-list.php");
}

$info = $notice->fetch_object();

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
                            <th width="20%">Notice Title</th>
                            <td><?php echo $info->title; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Notice Title [Bangla]</th>
                            <td><?php echo $info->bn_title; ?></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php if ($info->status == 1): ?>
                                    <span class="text-success">Published</span>
                                <?php else: ?>
                                    <span class="text-danger">Unpublished</span>
                                <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th>Notice Details</th>
                            <td><?php echo htmlspecialchars_decode($info->details); ?></td>
                        </tr>
                        <tr>
                            <th>Notice Details [Bangla]</th>
                            <td><?php echo htmlspecialchars_decode($info->bn_details); ?></td>
                        </tr>
                        <tr>
                            <th>Attached File</th>
                            <td>
                                File name: <?= $info->file ?> &ensp;
                                <a href="../uploads/files/notice/<?= $info->file ?>" class="my-link my-blue"><span class="ti-link"></span></a>&ensp;
                                <a href="../uploads/files/notice/<?= $info->file ?>" class="my-link my-green" download="kpi_<?= $info->file ?>"><span class="ti-download"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Added</th>
                            <td><?= $ofn->formatDate($info->added) ?></td>
                        </tr>

                    </table>
                    <div class="text-center">

                        <?php if ($info->status == 1): ?>
                            <a href="modify.php?a=unpub&c=notice&id=<?= $info->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span> Unpublish </a>
                        <?php else: ?>
                            <a href="modify.php?a=pub&c=notice&id=<?= $info->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span> Publish </a>
                        <?php endif; ?>
                        &ensp;
                        <a href="../notice-order-details.php?id=<?= $info->id ?>" target="_blank" class="text-success"><span class="ti-new-window"></span> View</a>
                        &ensp;
                        <a href="edit-notice.php?id=<?= $info->id ?>"><span class="ti-pencil-alt"></span> Edit</a>
                        &ensp;
                        <a href="modify.php?a=del&c=notice&id=<?= $info->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

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