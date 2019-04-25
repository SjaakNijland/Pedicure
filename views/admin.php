<?php

if(LOGGED_IN){

    if (!empty($_POST['test'])) {
        if($account->changePassword($_POST['password'], $_POST['password2'])){
        } else{
        }

    }

        ?>
    <form method="post">
    <input name="password" type="password" placeholder="Wachtwoord">
    <input name="password2" type="password" placeholder="Wachtwoord herhalen">
    <input name="test" type="submit" value="Inloggen">
    </form>

    <?php

}