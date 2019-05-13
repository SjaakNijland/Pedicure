<?php
require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($account->checkLoggedIn()) {
    $stmt = $pdo->prepare("SELECT * FROM content_body WHERE content_id=?");
    $stmt->execute([preg_replace('/[^0-9]/', '', $_GET['name'])]);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    echo json_encode($result);
}