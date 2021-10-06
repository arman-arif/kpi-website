<?php
require_once 'lib/init.php';
$odb = new Database();
$oem = new Email();

$page_title = "Send Email or Message";
$m_email = "active";

$email = isset($_GET['email']) ? $_GET['email'] : "" ;

if (isset($_POST['send'])){
    unset($_POST['send']);
    if (empty($email)){
        $to = $email;
    } else {
        $to = $_POST['to'];
    }
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];

    $oem->sendEmail($to, $sub, $msg);

    $status = true;
}

include 'include/header.php';
?>

    <div class="row">
        <div class="col-lg-10">

            <?php if (isset($status) && $status == true): ?>
                <p class="alert alert-success">
                    Email / Message sent to <?= $to ?> successfully!
                </p>
            <?php endif; ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $page_title; ?>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="to">To:</label>
                            <input type="text" name="to" class="form-control" required value="<?= (isset($to))?"$to":"$email"; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sub">Subject:</label>
                            <input type="text" name="sub" class="form-control" required value="">
                        </div>
                        <div class="form-group">
                            <label for="msg">Message:</label>
                            <textarea name="msg" class="form-control" rows="8" required></textarea>
                        </div>
                        <button name="send" class="btn btn-warning btn-block">Send Email</button>
                    </form>
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