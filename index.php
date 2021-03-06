<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Amsterdam');
session_start();
header('Content-type:text/html; charset=utf-8');

require_once "includes/config.php";
require_once "model/Account.php";
require_once "model/functions.php";

$account = new Account('users', 'id', 'email', 'password');
define('LOGGED_IN', $account->checkLoggedIn());

if (isset($_GET['logout'])){
    if(LOGGED_IN){
        $account->logout();
        redirect("home");
    }
}

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

require_once "views/static/head.php";
require_once "views/static/header.php";
if(file_exists('views/'. $action . '.php')){
    include_once 'views/'. $action . '.php';
} else {
    include_once 'views/static/404.php';
}
require_once "views/static/footer.php";
