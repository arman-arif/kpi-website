<?php
class Email extends Connection {
    public function __construct(){
        parent::__construct();
    }

    public function sendEmail($to, $sub, $msg){
        mail($to, $sub, $msg);// or (die("Message send failed"));
//        $result = $this->query("INSERT INTO composed_email (recepaint, subject, message) VALUES ('$to', '$sub', '$msg')");
//        if ($result){
//            $_SESSION['message'] = "Message sent successfully!";
//        } else {
//            die("Query faild! Reason: " . $this->error);
//        }
    }

    public function readStatus($id){
        $sql = "UPDATE message SET seen = 1 WHERE id = " . $id;
        $result = $this->query($sql);
        if (!$result){
            die("Query faild! Reason: " . $this->error);
        }
    }

    public function unreadStatus($id){
        $sql = "UPDATE message SET seen = 0 WHERE id = " . $id;
        $result = $this->query($sql);
        if (!$result){
            die("Query faild! Reason: " . $this->error);
        }
    }

    public function getUnreadMessage(){
		$sql = "SELECT * FROM message WHERE seen = 0 ";
		$result = $this->query($sql);
		if ($result) {
			return $result;
		} else {
			die("Query faild! Reason: " . $this->error);
		}
    }
}