<?php
require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($account->checkLoggedIn()){
    foreach ($_POST['content'] as $key => $value) {
        $pdo->prepare("INSERT INTO content_body (body, content_id) VALUES (?, ?) ")->execute([$value, $key]);
        $pdo->prepare("UPDATE content SET body_id = ? WHERE `id` = ?")->execute([$pdo->lastInsertId(), $key]);
    }
}
