<?php
class Functions
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
    }

    public function validateData($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public function validateArray($array){
        foreach ($array as $key => $value){
            $array[$key] = $this->validateData($value);
        }
        return $array;
    }

    public function textShorten($text, $limit){
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,' '));
        $text = $text."...";
        return $text;
    }

    public function formatDate($date){
        return date('d F, Y', strtotime($date));
    }
    public function formatDateTime($date){
        return date('F d, Y, g:i a', strtotime($date));
    }

    public function formatDateForDb($date){
        return date("Y-m-d",strtotime($date));
    }

    public function formatDateForEdit($date){
        return date("m/d/Y",strtotime($date));
    }

    public function todayDateToDb(){
        return date("Y-m-d", time());
    }

}