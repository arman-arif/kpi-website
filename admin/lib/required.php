<?php
if (!isset($_SESSION['admin']['username'])){
    header("location: login.php");
}
if (isset($_GET['logout'])){
    if ($_GET['logout'] == 1){
        session_unset();
        session_destroy();
        header("location: login.php");
    }
}