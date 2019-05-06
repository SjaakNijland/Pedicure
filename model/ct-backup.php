<?php
require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');



if ($account->checkLoggedIn()) {
    //get data backups en data ect.

    echo "";
//    var_dump($_POST, $_GET, $_REQUEST);

}