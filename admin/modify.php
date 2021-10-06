<?php
include "lib/init.php";

$odel = new Delete();
$odb = new Database();
$oem = new Email();

$id = (int) isset($_GET['id'])? $_GET['id'] : 0;
$act = isset($_GET['a']) ? $_GET['a'] : "";
$cnt = isset($_GET['c']) ? $_GET['c'] : "";

if ($act == "del"){
    if ($cnt == "departments"){
        $odel->deleteImageByRecord($cnt, $id, $cnt);
    }
    if ($cnt == "students"){
        $odel->deleteImageByRecord($cnt, $id, $cnt);
    }
    if ($cnt == "teachers"){
        $odel->deleteImageByRecord($cnt, $id, $cnt);
    }
    if ($cnt == "staffs"){
        $odel->deleteImageByRecord($cnt, $id, $cnt);
    }
    if ($cnt == "slider"){
        $odel->deleteImageByRecord($cnt, $id, $cnt);
    }
    if ($cnt == "gallary"){
		$file = $odb->getDataById($cnt, $id)->fetch_object()->image;
		$odel->deleteImage("thumb_".$file, "gallary/thumb");
		$odel->deleteImageByRecord($cnt, $id, $cnt);
	}
    $odel->deleteRecord($cnt, $id);
    exit("<script>window.history.back();window.history.back();</script>");
}

if ($act == "pub"){
    $odb->publishData($cnt, $id);
    exit("<script>window.history.back();</script>");
}

if ($act == "unpub"){
    $odb->unpublishData($cnt, $id);
    exit("<script>window.history.back();</script>");
}

if ($act == "read"){
	$oem->readStatus($id);
	exit("<script>window.history.back();</script>");
}

if ($act == "unread"){
	$oem->unreadStatus($id);
	exit("<script>window.history.back();</script>");
}