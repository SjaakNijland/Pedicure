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

    private $pass_hash;
    public function __construct( $table = 'users', $id_rowName = 'id', $username_rowName = 'username', $password_rowName = 'password', $db_host = DB_HOST, $db_name=DB_NAME, $db_username=DB_USERNAME, $db_password=DB_PASSWORD)
    {
        if(session_id() == '') {
            session_start();
        }
        $this->Return_array = [];
        $this->table = $table;
        $this->id_rowName = $id_rowName;
        $this->username_rowName = $username_rowName;
        $this->password_rowName = $password_rowName;

        $this->db = $this->getInstance($db_host, $db_name, $db_username, $db_password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(version_compare(phpversion(), '5.5', '<')){
            $this->pass_hash = 0;
        }else{
            $this->pass_hash = 1;
        }
    }

    public function logout($returnLocation = './'){
        $_SESSION['LOGGED_IN'] = 0;
        session_unset();
        session_destroy();
    }

    public function login($username, $password, $get_rows_array = array()){
        $select_string = "";
        if (!empty($get_rows_array)) {
            $select_string = ",".implode(",", $get_rows_array);
        }
        $stmt = $this->db->prepare("SELECT `" . $this->password_rowName . "`,`" . $this->id_rowName . "` $select_string FROM `" . $this->table . "` WHERE ". $this->username_rowName ." = :username");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        if($stmt->execute()){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            $success = 0;
            switch ($this->pass_hash){
                case 1:
                    if(password_verify($password, $row[$this->password_rowName])){
                        $success = 1;
                    }else{
                        $success = 0;
                    }
                    break;
                case 0:
                    if(hash('whirlpool', $password) == $row[$this->password_rowName]){
                        $success = 1;
                    }else{
                        $success = 0;
                    }
                    break;
            }
            if($success){
                $_SESSION['LOGGED_IN'] = 1;
                return 1;
            } else{
                return 0;
            }
        } else{
            return 0;
        }
    }

    public function register($username, $password, $additional_rows_assoc = array()){

        switch ($this->pass_hash){
            case 1:
                $password = password_hash($password, PASSWORD_DEFAULT);
                break;
            case 0:
                $password = hash('whirlpool', $password);
                break;
        }
        $rows = '';
        $values = '';
        foreach ($additional_rows_assoc as $key => $value){
            $rows .= ", `$key`";
            $values .= ", :" . str_replace(' ', '_', $key) . "PDO_VALUE";
        }
        $stmt = $this->db->prepare("INSERT INTO `". $this->table ."` (`". $this->username_rowName ."`, `" . $this->password_rowName ."` " . $rows . ") VALUES (:username, '$password' " . $values . ")");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        foreach ($additional_rows_assoc as $key => $value) {
            $stmt->bindValue(':' . str_replace(' ', '_', $key) . "PDO_VALUE", filter_var($value, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        }
        if ($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
    }

    public function checkLoggedIn(){
        return isset($_SESSION['LOGGED_IN']) ? $_SESSION['LOGGED_IN'] : 0;
    }

}























<?php
//if (!LOGGED_IN){
    if (!empty($_POST['login'])) {
        if ($account->login($_POST['email'], $_POST['password'])) {
            redirect("home");
        } else {
            //Invalid login
        }
    }

    if (!empty($_POST['register'])) {
        if ($account->register($_POST['rEmail'], $_POST['rPassword'])) {
            $account->login($_POST['rEmail'], $_POST['rPassword']);
            redirect('home');
        } else {
            //Invalid register
        }
    }

    ?>
    <span>Inloggen</span>
    <form method="post">
        <input name="email" type="email" placeholder="Email">
        <input name="password" type="password" placeholder="Wachtwoord">
        <input name="login" type="submit" value="Inloggen">
    </form>
    <span>Registreren</span>
    <form method="post">
        <input name="rEmail" type="email" placeholder="Email">
        <input name="rPassword" type="password" placeholder="Wachtwoord">
        <input name="register" type="submit" value="Registreren">
    </form>

<?php
//} else{
//    echo "Al ingelogd";
//}



<!--    --><?php //echo $content->select([], ['name' => 'home-1'])->fetch(PDO::FETCH_ASSOC)['body']; ?>
