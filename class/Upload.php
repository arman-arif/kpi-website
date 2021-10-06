<?php
class Upload
{
    public function uploadImage($data, $key, $path="images"){
        $file_name = $data[$key]['name'];
//        $directory = $_SERVER['DOCUMENT_ROOT'] . "/kpi/uploads/";
        $directory = "../uploads/";
        $tmp = explode('.',$file_name);
        $ext = end($tmp);
        $unique_name = $path . '_';
        $unique_name .= substr(md5(time()),0,6) . '_';
        $unique_name .= substr(md5(rand()),0,3) . '_';
        $unique_name .= substr(md5($file_name),0,6) .'.'.$ext;

        $file_size = $data[$key]['size'];
        $upload_file = $directory . $path . "/" . $unique_name;
        $file_type = $data[$key]['type'];
        $tmp_file = $data[$key]['tmp_name'];

        if (empty($file_name)){
            $_SESSION['err_msg'] = "No image file selected";
        } else {
            if ($file_type == "image/jpeg" || $file_type == "image/png"){
                if($file_size > 5242880){
                    $_SESSION['err_msg'] = "File is too learge";
                } else {
                    if (file_exists($upload_file)){
                        $_SESSION['err_msg'] = "File already exists";
                    } else {
                        if (move_uploaded_file($tmp_file, $upload_file)){
                            return $unique_name;
                        } else {
                            return false;
                        }
                    }
                }
            } else {
                $_SESSION['err_msg'] = "Invalid file format";
            }
        }
    }

    public function uploadFile($data, $key, $path="docs"){
        $file_name = $data[$key]['name'];
//        $directory = $_SERVER['DOCUMENT_ROOT'] . "/kpi/uploads/files/";
        $directory = "../uploads/files/";
        $tmp = explode('.', $file_name);
        $ext = end($tmp);
        $unique_name = $path . '_';
        $unique_name .= substr(md5(time()),0,6) . '_';
        $unique_name .= substr(md5(rand()),0,6) . '_';
        $unique_name .= substr(md5($file_name),0,12) .'.'.$ext;

        $file_size = $data[$key]['size'];
        $upload_file = $directory . $path . "/" . $unique_name;
        $tmp_file = $data[$key]['tmp_name'];

        if (empty($file_name)){
            $_SESSION['err_msg'] = "No file selected";
        } else {
            if($file_size > 5242880){
                $_SESSION['err_msg'] = "File is too learge";
            } else {
                if (file_exists($upload_file)){
                    $_SESSION['err_msg'] = "File already exists";
                } else {
                    if (move_uploaded_file($tmp_file, $upload_file)){
                        return $unique_name;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
}