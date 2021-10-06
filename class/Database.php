<?php
class Database extends Connection{
    public function __construct(){
       parent::__construct();
    }

    public function getData($table){
        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC";
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error . __LINE__);
        }
    }

    public function getDataById($table, $id){
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $result = $this->query($sql);
        if ($result) {
            return $result;
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error . __LINE__);
        }
    }

    public function publishData($table, $id){
        $sql = "UPDATE $table SET status = 1 WHERE id = " . $id;
        $result = $this->query($sql);
        if ($result){
            $_SESSION['message'] = "<b>Success!</b> Record published";
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error . __LINE__);
        }
    }

    public function unpublishData($table, $id){
        $sql = "UPDATE $table SET status = 0 WHERE id = " . $id;
        $result = $this->query($sql);
        if ($result){
            $_SESSION['message'] = "<b>Success!</b> Record unpublished";
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error . __LINE__);
        }
    }

    function insertData($table, $data){
        $data = $this->escapeStringArray($data);
        $sql = "INSERT INTO $table (id";
        foreach ($data as $key => $value){
            $sql .= ", ".$key;
        }
        $sql .= ") VALUES (NULL";
        foreach ($data as $key => $value) {
            $sql .= ", '$value'";
        }
        $sql .= ");";

        $result = $this->query("$sql");
        if ($result){
            $_SESSION['message'] = "Data inserted successfully";
        } else {
            die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error . __LINE__);
        }
    }

    function updateData($table, $data, $id){
        $data = $this->escapeStringArray($data);
        $sql = "UPDATE $table SET id = '$id'";
        foreach ($data as $key => $value){
            $sql .= ", $key = '$value'";
        }
        $sql .= " WHERE id = $id";

        $result = $this->query($sql);
        if ($result){
            $_SESSION['message'] = "Data updated successfully!";
        } else {
            die("<h4 style='color: red'>Query Failed! :</h4> Reaseon " . $this->error . __LINE__);
        }
    }
	
	public function getDescData($table, $sort_by){
		$sql = "SELECT * FROM " . $table . " ORDER BY $sort_by DESC";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	public function getAscData($table, $sort_by){
		$sql = "SELECT * FROM " . $table . " ORDER BY $sort_by ASC";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	
	public function getDistinctRow($table, $row){
		$sql = "SELECT DISTINCT $row FROM $table";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	
	public function getRandomData($table, $limit="1000"){
		$sql = "SELECT * FROM $table ORDER BY RAND() LIMIT $limit";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}

	public function getInfo($title){
    	$sql = "SELECT * FROM info WHERE title = '$title'";
		$result = $this->query($sql);
		if ($result) {
			return $result->fetch_object()->content;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	public function updateInfo($title, $content){
 		$sql = "UPDATE info SET content = '$content' WHERE title = '$title'";
		$result = $this->query($sql);
		if ($result) {
			return true;
		} else {
			die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
		}
	}
	
	public function getFile($table, $title){
		return $this->query("SELECT file FROM $table WHERE title = '$title'")->fetch_object()->file or die("<h4 style='color: red'>Query Failed! </h4> Reaseon: " . $this->error ." ". __LINE__);
	}
	
}