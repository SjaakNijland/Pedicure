<?php
class Account extends PDO
{
    private static $instance;
    public static function getInstance ($db_host, $db_name, $db_username, $db_password){
        if (!self::$instance){
            self::$instance = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
        }
        return self::$instance;
    }

    public function __construct( $table = 'users', $id_rowName = 'id', $username_rowName = 'username', $password_rowName = 'password', $db_host = DB_HOST, $db_name=DB_NAME, $db_username=DB_USERNAME, $db_password=DB_PASSWORD)
    {
        if(session_id() == '') {
            session_start();
        }
        $this->table = $table;
        $this->id_rowName = $id_rowName;
        $this->username_rowName = $username_rowName;
        $this->password_rowName = $password_rowName;

        $this->db = $this->getInstance($db_host, $db_name, $db_username, $db_password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function logout(){
        $_SESSION['LOGGED_IN'] = 0;
        session_unset();
        session_destroy();
    }

    public function login($username, $password){
        $stmt = $this->db->prepare("SELECT `" . $this->password_rowName . "`,`" . $this->id_rowName . "` FROM `" . $this->table . "` WHERE ". $this->username_rowName ." = :username");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        if($stmt->execute()){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                if(password_verify($password, $user[$this->password_rowName])){
                    $_SESSION['LOGGED_IN'] = $user[$this->id_rowName];
                    return 1;
                } else {
                    return 0;
                }
            }
        } else{
            return 0;
        }
    }

    public function register($username, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO `". $this->table ."` (`". $this->username_rowName ."`, `" . $this->password_rowName ."`) VALUES (:username, '$password')");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        if ($stmt->execute()){
            return 1;
        } else{
            return 0;
        }
    }

    public function changePassword($newPassword, $newPasswordCheck){
        if($newPassword === $newPasswordCheck){
            $password = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE `" . $this->table . "` SET `" . $this->password_rowName . "` = :password WHERE `" . $this->id_rowName . "` = " . $_SESSION['USER_ID']);
            $stmt->bindValue(':password', $password);
            if($stmt->execute()){
                return 1;
            } else{
                return 0;
            }
        } else{
            return 0;
        }
    }

    public function checkLoggedIn(){
        return isset($_SESSION['LOGGED_IN']) ? $_SESSION['LOGGED_IN'] : 0;
    }

}