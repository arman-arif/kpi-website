<?php
class AdminLogin extends Connection {
    public function __construct(){
        parent::__construct();
    }
    public function adminLogin($username, $password){
        $username = $this->real_escape_string($username);
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = $this->query($query);
        $row = $result->fetch_assoc();
        $check = $result->num_rows;

        $dbpass = $row['password'];
        $encpass = md5($password);

        if ($result){

            if ($check>0){
                if ($dbpass == $encpass){
                    $_SESSION['admin']['id'] = $row['id'];
                    $_SESSION['admin']['username'] = $row['username'];
                    $_SESSION['admin']['email'] = $row['email'];
                    $_SESSION['admin']['name'] = $row['name'];
                    $_SESSION['admin']['last_active'] = time();

                    header("Location: index.php");
                } else {
                    return "Wrong username or password combination";
                }
            } else {
                return "Something went wrong";
            }

        } else {
            die("Could not login. <br> Query Failed!" . $this->error);
        }

    }

    public function rememberAdminLogin($username, $password){
        $username = $this->real_escape_string($username);
        $query = "SELECT password FROM admin WHERE username = '$username'";
        $result = $this->query($query);
        $row = $result->fetch_assoc();

        $dbpass = $row['password'];
        $encpass = md5($password);

        if ($dbpass == $encpass){
            $username = base64_encode($username);
            $password = base64_encode($password);

            setcookie("admin_username", $username, time()+(86400 * 7));
            setcookie("admin_password", $password, time()+(86400 * 7));
        }
    }

    public function forgetAdminLogin(){
        setcookie('admin_username', "", time()-1);
        setcookie('admin_password', "", time()-1);
    }

}
