<?php

require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($account->checkLoggedIn()) {

    if(!empty($_GET)){
        $stmt = $pdo->prepare("SELECT * FROM content_body WHERE content_id IN (SELECT id FROM content WHERE name LIKE ?) ORDER BY date DESC");
        $stmt->execute([$_GET['name'].'%']);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo json_encode($result);
    } else if(!empty($_POST)){

        foreach (json_decode($_POST['updatedBackups']) as $key => $value) {
            $pdo->prepare("UPDATE content SET body_id = ? WHERE `id` = ?")->execute([intval($value), intval($key)]);
        }
    }
}
