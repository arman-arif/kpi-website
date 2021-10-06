<?php
require_once 'lib/init.php';
$odb = new Database();
$oem = new Email();

$page_title = "Message Details";
$m_email = "active";

$id = (int) isset($_GET['id']) ? $_GET['id'] : 0 ;
$action = isset($_GET['action']) ? $_GET['action'] : "" ;

if (isset($_GET['action'])){
    if ($action == "read"){
        $oem->readStatus($id);
    }
    if ($action == "unread"){
        $oem->unreadStatus($id);
    }
    die(header("location: view-email-list.php"));
}

$infos = $odb->getDataById("message", $id);

$oem->readStatus($id);


if ($infos->num_rows == 0){
    header("location: view-email-list.php");
}

$info = $infos->fetch_object();

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
                            <th width="20%">Sender Name</th>
                            <td><?php echo $info->sender; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Email Address</th>
                            <td><?php echo $info->email; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Phone Number</th>
                            <td><?php echo $info->phone; ?></td>
                        </tr>
                        <tr>
                            <th>Email Sent On</th>
                            <td><?= $ofn->formatDate($info->added) ?></td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td><?= $info->message ?></td>
                        </tr>

                    </table>
                    <div class="text-center">
                        <?php if ($info->seen == 0): ?>
                            <a href="?action=read&id=<?= $info->id ?>"><span class="fa fa-envelope-o"></span> Mark as read</a>&ensp;&ensp;
                        <?php else: ?>
                            <a href="?action=unread&id=<?= $info->id ?>"><span class="fa fa-envelope-open-o"></span> Mark as unread</a>&ensp;&ensp;
                        <?php endif; ?>

                        <a href="modify.php?a=del&c=message&id=<?= $info->id ?>" class="text-danger"><span class="ti-trash"></span> Delete</a>

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