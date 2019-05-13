<?php
require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($account->checkLoggedIn()) {
//    $stmt = $pdo->prepare("SELECT id FROM content WHERE name LIKE ?");
//    $stmt->execute([$_GET['name'].'%']);
//    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT * FROM content_body WHERE content_id IN (SELECT id FROM content WHERE name LIKE ?)");
    $stmt->execute([$_GET['name'].'%']);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//    var_dump($result);

    echo json_encode($result);
}