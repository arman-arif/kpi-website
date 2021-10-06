
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($page_title)?$page_title:""; ?></title>

    <!-- Core CSS - Include with every page -->
<!--    <link href="../assets/backend/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="../assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link href="../assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/backend/vendors/themify/themify-icons.css">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../assets/backend/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../assets/backend/css/plugins/timeline/timeline.css" rel="stylesheet">

    <link href="../assets/backend/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="../assets/backend/css/sb-admin.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown"><a href="../" target="_blank"><i class="fa fa-globe"></i></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
<!--                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>-->
<!--                    </li>-->
<!--                    <li class="divider"></li>-->
                    <li><a href="change-password.php"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                    <li><a href="?logout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li class="<?php echo isset($m_site)?$m_site:"" ; ?>">
                        <a href="manage-site.php"><i class="fa fa-globe fa-fw"></i> Manage Site Info</a>
                    </li>
                    <li class="<?php echo isset($m_slide)?$m_slide:"" ; ?>">
                        <a href="#"><i class="fa fa-image fa-fw"></i> Manage Slideshow<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="add-slider.php"><i class="fa fa-plus fa-fw"></i> Add Slider</a></li>
                            <li><a href="view-slider-list.php"><i class="fa fa-list fa-fw"></i> Slider List</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo (isset($m_notice) or isset($m_news))?"active":"" ; ?>">
                        <a href="#"><i class="fa fa-bullhorn fa-fw"></i> Announcement<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php echo isset($m_notice)?$m_notice:"" ; ?>">
                                <a href="#"><i class="fa fa-file-o fa-fw"></i> Manage Notice<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-notice.php"><i class="fa fa-plus fa-fw"></i> Add Notice</a></li>
                                    <li><a href="view-notice-list.php"><i class="fa fa-list fa-fw"></i> Notice List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_news)?$m_news:"" ; ?>">
                                <a href="#"><i class="fa fa-file fa-fw"></i> Manage News<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-news.php"><i class="fa fa-plus fa-fw"></i> Add News</a></li>
                                    <li><a href="view-news-list.php"><i class="fa fa-list fa-fw"></i> News List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
<?php
    if (isset($m_dept) || isset($m_stu) || isset($m_result) || isset($m_syllabus) || isset($m_routine) || isset($m_teacher) || isset($m_staff)){
        $m_academics = "active";
    }
?>
                    <li class="<?= isset($m_academics)?$m_academics:"" ?>">
                        <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Academics<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="<?php echo isset($m_dept)?$m_dept:"" ; ?>">
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Departments<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-dept.php"><i class="fa fa-plus fa-fw"></i> Add Department</a></li>
                                    <li><a href="view-dept-list.php"><i class="fa fa-list fa-fw"></i> Department List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_stu)?$m_stu:"" ; ?>">
                                <a href="#"><i class="fa fa-users fa-fw"></i> Manage Students<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-student.php"><i class="fa fa-plus fa-fw"></i> Add Student</a></li>
                                    <li><a href="view-student-list.php"><i class="fa fa-list fa-fw"></i> Student List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_result)?$m_result:"" ; ?>">
                                <a href="#"><i class="fa fa-file-text fa-fw"></i> Manage Results<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-result.php"><i class="fa fa-plus fa-fw"></i> Add Result</a></li>
                                    <li><a href="view-result-list.php"><i class="fa fa-list fa-fw"></i> Result List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_syllabus)?$m_syllabus:"" ; ?>">
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Manage Syllabus<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-syllabus.php"><i class="fa fa-plus fa-fw"></i> Add Syllabus</a></li>
                                    <li><a href="view-syllabus-list.php"><i class="fa fa-list fa-fw"></i> Syllabus List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_routine)?$m_routine:"" ; ?>">
                                <a href="#"><i class="fa fa-clock-o fa-fw"></i> Manage Routine<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-routine.php"><i class="fa fa-plus fa-fw"></i> Add Routine</a></li>
                                    <li><a href="view-routine-list.php"><i class="fa fa-list fa-fw"></i> Routine List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_teacher)?$m_teacher:"" ; ?>">
                                <a href="#"><i class="fa fa-user-secret fa-fw"></i> Manage Teachers<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-teacher.php"><i class="fa fa-plus fa-fw"></i> Add Teacher</a></li>
                                    <li><a href="view-teacher-list.php"><i class="fa fa-list fa-fw"></i> Teacher List</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo isset($m_staff)?$m_staff:"" ; ?>">
                                <a href="#"><i class="fa fa-user-md fa-fw"></i> Manage Staffs<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="add-staff.php"><i class="fa fa-plus fa-fw"></i> Add Staff</a></li>
                                    <li><a href="view-staff-list.php"><i class="fa fa-list fa-fw"></i> Staff List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?php echo isset($m_gallary)?$m_gallary:"" ; ?>">
                        <a href="#"><i class="fa fa-file-image-o fa-fw"></i> Manage Gallary<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="add-image.php"><i class="fa fa-plus fa-fw"></i> Add Image</a></li>
                            <li><a href="view-gallary-items.php"><i class="fa fa-list fa-fw"></i> Gallary Items</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($m_email)?$m_email:"" ; ?>">
                        <a href="#"><i class="fa fa-link fa-fw"></i> Email / Message <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="view-email-list.php"><i class="fa fa-inbox fa-fw"></i> Inbox</a></li>
                            <li><a href="send-email.php"><i class="fa fa-edit fa-fw"></i> Compose</a></li>
                        </ul>
                    </li>
                    <div hidden="hidden">
                        <li class="<?php echo isset($m_page)?$m_page:"" ; ?> d-none">
                            <a href="#"><i class="fa fa-square-o fa-fw"></i> Manage Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="add-page.php"><i class="fa fa-plus fa-fw"></i> Add Page</a></li>
                                <li><a href="view-page-list.php"><i class="fa fa-list fa-fw"></i> Page List</a></li>
                            </ul>
                        </li>
                    </div>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $page_title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <?php if (isset($err_msg)): ?>
                    <p class="alert alert-danger"><?php echo $err_msg; ?></p>
                <?php endif; ?>
                <?php if (isset($errors)): ?>
                    <p class="alert alert-danger"><?php
                        foreach ($errors as $error) {
                            echo "$error <br>";
                        }?></p>
                <?php endif; ?>
                <?php if (isset($message)): ?>
                    <p class="alert alert-success"><?php echo $message; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['message'])): ?>
                    <p class="alert alert-success"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4"></div>
        </div>