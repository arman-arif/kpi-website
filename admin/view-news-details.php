<?php
require_once 'lib/init.php';
$odb = new Database();
$oup = new Upload();

$page_title = "View News Details";
$m_news = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$news = $odb->getDataById("news", $id);

if ($news->num_rows == 0){
    header("location: view-news-list.php");
}

$info = $news->fetch_object();

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
                            <th width="20%">News Title</th>
                            <td><?php echo $info->title; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">News Title [Bangla]</th>
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
                        <?php if (!empty($info->image)): ?>
                            <tr>
                                <th>Image</th>
                                <td><img src="../uploads/news/<?= $info->image ?>" alt="" class="img-responsive"><br><br>
                                    <a href="../uploads/news/<?= $info->image ?>" class="my-link my-green" download="kpi_image_<?= $info->image ?>"><span class="ti-download"></span> Download Image</a>
                                </td>
                            </tr>
                        <?php endif ?>
                        
                        <tr>
                            <th>News Details</th>
                            <td><?php echo strip_tags(htmlspecialchars_decode($info->details)); ?></td>
                        </tr>
                        <tr>
                            <th>News Details [Bangla]</th>
                            <td><?php echo strip_tags(htmlspecialchars_decode($info->bn_details)); ?></td>
                        </tr>
                        <?php if (!empty($info->file)): ?>
                            <tr>
                                <th>Attached File</th>
                                <td>
                                    File name: <?= $info->file ?> &ensp;
                                    <a href="../uploads/files/news/<?= $info->file ?>" class="my-link my-blue"><span class="ti-link"></span></a>&ensp;
                                    <a href="../uploads/files/news/<?= $info->file ?>" class="my-link my-green" download="kpi_<?= $info->file ?>"><span class="ti-download"></span></a>
                                </td>
                            </tr>
                        <?php endif ?>
                        <tr>
                            <th>Added</th>
                            <td><?= $ofn->formatDate($info->added) ?></td>
                        </tr>

                    </table>
                    <div class="text-center">

                        <?php if ($info->status == 1): ?>
                            <a href="modify.php?a=unpub&c=news&id=<?= $info->id ?>" class="text-warning"><span  class="ti-arrow-circle-down"></span> Unpublish </a>
                        <?php else: ?>
                            <a href="modify.php?a=pub&c=news&id=<?= $info->id ?>" class="text-primary"><span  class="ti-arrow-circle-up"></span> Publish </a>
                        <?php endif; ?>
                        &ensp;
                        <a href="../news-details.php?id=<?= $info->id ?>" target="_blank" class="text-success"><span class="ti-new-window"></span> View</a>
                        &ensp;
                        <a href="edit-news.php?id=<?= $info->id ?>"><span class="ti-pencil-alt"></span> Edit</a>
                        &ensp;
                        <a href="modify.php?a=del&c=news&id=<?= $info->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

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