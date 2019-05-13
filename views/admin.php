<?php

if(LOGGED_IN){

    if (!empty($_POST['test'])) {
        if($account->changePassword($_POST['password'], $_POST['password2'])){
        } else{
        }

    }

        ?>
<!--    <form method="post">-->
<!--    <input name="password" type="password" placeholder="Wachtwoord">-->
<!--    <input name="password2" type="password" placeholder="Wachtwoord herhalen">-->
<!--    <input name="test" type="submit" value="Aanpassen">-->
<!--    </form>-->

    <?php
    $content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id")->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($content); $i++){
        echo $content[$i]['content_id'] . "\n";
    }
}