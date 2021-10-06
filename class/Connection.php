<?php

class Connection extends mysqli{
    private $host = DB_HOST;
    private $username = DB_USER;
    private $passwd = DB_PASS;
    private $dbname = DB_NAME;

    public function __construct(){
        parent::__construct($this->host, $this->username, $this->passwd, $this->dbname);
        if ($this->connect_error) {
            die("<h3 style='color: red'>Connection error!</h3> Reason: " . $this->connect_error);
        }
    }
    public function escapeStringArray($array){
        foreach ($array as $key => $item) {
            $array[$key] = $this->real_escape_string($item);
        }
        return $array;
    }
    public function fetchObjAssoc($array){
        return json_decode(json_encode($array), false);
    }
}