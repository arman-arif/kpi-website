<?php

spl_autoload_register(function ($class_name){
    $class_file = "../class/" . $class_name . ".php";
    if ( file_exists($class_file)){
        require_once $class_file;
//        echo $class_file . "<br>";
    } else {
        return false;
    }
});

