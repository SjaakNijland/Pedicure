<?php
require_once "../includes/config.php";
require_once "../model/Account.php";

$account = new Account('users', 'id', 'email', 'password');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($account->checkLoggedIn()){
    foreach ($_POST['content'] as $key => $value) {

        $stmt = $pdo->prepare("SELECT * FROM content_body WHERE body = ? AND content_id = ?");
        $stmt->execute([$value, $key]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) == 1){
            //Backup found
            echo "\nBackup found\n";
            echo $result[0]['id'];

            $pdo->prepare("UPDATE content SET body_id = ? WHERE `id` = ?")->execute([$result[0]['id'], $key]);

        } else{
            echo "\nNew body added\n";

            $pdo->prepare("INSERT INTO content_body (body, content_id) VALUES (?, ?) ")->execute([$value, $key]);
            $pdo->prepare("UPDATE content SET body_id = ? WHERE `id` = ?")->execute([$pdo->lastInsertId(), $key]);
        }

    }
}
