<?php
require_once 'lib/init.php';

$page_title = "Admin Dashboard";

$odb = new Database();
$opr = new Published();
$oem = new Email();

include 'include/header.php';
?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Welcome to Admin Panel
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="view-email-list.php" class="list-group-item">
                        <i class="fa fa-envelope-o"></i> Total Emails [<?= $odb->getData("message")->num_rows ?>]
                        <span class="pull-right text-muted small"><em><?=
							$oem->getUnreadMessage()->num_rows;
							?> New emails</em>
                        </span>
                    </a>
                    <a href="view-slider-list.php" class="list-group-item">
                        <i class="fa fa-image fa-fw"></i> Total Slideshow - [<?= $odb->getData("slider")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("slider")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-notice-list.php" class="list-group-item">
                        <i class="fa fa-files-o fa-fw"></i> Total Notice - [<?= $odb->getData("notice")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("notice")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-news-list.php" class="list-group-item">
                        <i class="fa fa-file-text-o fa-fw"></i> Total News - [<?= $odb->getData("news")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("news")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-dept-list.php" class="list-group-item">
                        <i class="fa fa-book fa-fw"></i> Total Departments - [<?= $odb->getData("departments")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("departments")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-student-list.php" class="list-group-item">
                        <i class="fa fa-graduation-cap fa-fw"></i> Total Students - [<?= $odb->getData("students")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("students")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-teacher-list.php" class="list-group-item">
                        <i class="fa fa-user-secret fa-fw"></i> Total Teachers - [<?= $odb->getData("teachers")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("teachers")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                    <a href="view-staff-list.php" class="list-group-item">
                        <i class="fa fa-user-o fa-fw"></i> Total Staffs - [<?= $odb->getData("staffs")->num_rows; ?>]
                        <span class="pull-right text-muted small"><em><?=
                                $opr->getRecord("staffs")->num_rows;
                                ?> Published</em>
                        </span>
                    </a>
                </div>
                <a href="?logout=1" class="btn btn-default btn-block">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>