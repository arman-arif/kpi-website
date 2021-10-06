<?php


class Delete extends Connection {
    public function __construct(){
        parent::__construct();
    }
    public function deleteRecord($table, $id){
        $sql = "DELETE FROM $table WHERE id = " . $id;
        $result = $this->query($sql);
        if ($result){
            $_SESSION['message'] = "Record deleted successfully";
        } else {
            die("Query failed! Reason: " . $this->error . __LINE__);
        }
    }
    public function deleteImageByRecord($table, $id, $path = "images"){
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $image = $row['image'];
        $check = $result->num_rows;
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/kpi/uploads/";

        $file = $directory . $path . "/" . $image;
        $file = ($check == 1) ? $file : "";

        if ($check>0){
            if ( !file_exists($file) ){
                $_SESSION['err_msg'] = "Image not found";
            } else {
                unlink($file) or ($_SESSION['err_msg'] = "Couldn't delete image");
            }
        } else {
            $_SESSION['err_msg'] = "No record found";

            if ( !file_exists($file) ){
                $_SESSION['err_msg'] = "Image not found";
            } else {
                unlink($file) or ($_SESSION['err_msg'] = "Couldn't delete image");
            }
        }
    }
    public function deleteImage($image, $path){
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/kpi/uploads/";
        $file = $directory . $path."/".$image;
        if (file_exists($file)){
            unlink($file) or ($_SESSION['err_msg'] = "Couldn't delete image");
        } else {
            $_SESSION['err_msg'] = "Image not found";
        }
    }
    public function deleteFile($file, $path){
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/kpi/uploads/files/";
        $file = $directory . $path."/".$file;
        if (file_exists($file)){
            unlink($file) or ($_SESSION['err_msg'] = "Couldn't delete file");
        } else {
            $_SESSION['err_msg'] = "File not found";
        }
    }

}