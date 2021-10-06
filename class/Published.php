<?php
class Published extends Connection {
    public function __construct(){
        parent::__construct();
    }

    public function getRecord($table){
        $sql = "SELECT * FROM " . $table . " WHERE status = 1";
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
        }
    }

    public function getSortedRecord($table, $sort_by){
        $sql = "SELECT * FROM " . $table . " WHERE status = 1 ORDER BY $sort_by ASC";
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
        }
    }

    public function getRSortedRecord($table, $sort_by){
        $sql = "SELECT * FROM " . $table . " WHERE status = 1 ORDER BY $sort_by DESC";
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
        }
    }

    public function getLimitedRecord($table, $limit="5"){
        $sql = "SELECT * FROM " . $table . " WHERE status = 1 ORDER BY id DESC LIMIT " . $limit;
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
        }
    }
	
	public function getRandomRecord($table, $limit="1000"){
		$sql = "SELECT * FROM $table WHERE status = 1 ORDER BY RAND() LIMIT $limit";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	
	public function getRecordByColumn($table, $column, $col_data, $sort_by){
		$sql = "SELECT * FROM " . $table . " WHERE status = 1 AND $column = '$col_data' ORDER BY $sort_by ASC";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	
	public function filterRecordBy($table, $column1, $column2, $column3, $data1, $data2, $data3, $sort_by){
		$sql = "SELECT * FROM " . $table . " WHERE status = 1 AND $column1 = '$data1' AND $column2 = '$data2' AND $column3 = '$data3' ORDER BY $sort_by ASC";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}

}