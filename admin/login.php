
<?php
session_start();

require_once '../lib/db-config.php';
require_once 'lib/autoload.php';

$oal = new AdminLogin();

if (isset($_POST['login'])){
    $password = $_POST['password'];
    $username = $_POST['username'];

    $err_msg = $oal->adminLogin($username, $password);
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="../assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../assets/backend/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../assets/backend/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="form login_form">
            <div style="width: 100%; display: grid;">
                <img src="../uploads/Logo.png" width="150" alt="" style="width: 150px; margin: 0 auto; align-self: center;">
                    <h4 style="margin: 0 auto; padding-top: 30px">KHULNA POLYTECHNIC INSTITUTE</h4>
            </div>
          <section class="login_content">
            <form method="post">
              <h1 class="text-uppercase">Admin Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo isset($username)?$username:""; ?>"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required value="<?php echo isset($password)?$password:""; ?>"/>
              </div>
              <div>
                <button class="btn btn-default btn-block submit text-uppercase" name="login" type="submit">Log in</button>
              </div>
              <div class="clearfix"></div>
            </form>
              <?php if (isset($err_msg)): ?>
                  <p class="alert alert-danger">
                      <?php echo $err_msg; ?>
                  </p>
              <?php endif; ?>
          </section>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
