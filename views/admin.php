<?php

if(LOGGED_IN){

    if (!empty($_POST['test'])) {
        if($account->changePassword($_POST['password'], $_POST['password2'])){
            $message = "Succesvol veranderd";
        } else{
            $message = "Er is een fout opgetreden, probeer opnieuw";
        }

    }

    $content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'home%'")->fetchAll(PDO::FETCH_ASSOC);
    array_unshift($content, "");

    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="?logout">Uitloggen</a>
<hr>
    <h2 style="text-align: center">De reviews van de home aanpassen</h2>
<div class="home-testimonials" style="width: 50%; margin-bottom: 50px">
    <div class="slide1">
        <div class="inner">
            <div data-editable data-name="content[10]">
                <?php echo $content[10]['body']; ?>
            </div>
        </div>
    </div>
    <div class="slide2">
        <div class="inner" data-editable data-name="content[11]">
            <?php echo $content[11]['body']; ?>
        </div>
    </div>
    <div class="slide3">
        <div class="inner" data-editable data-name="content[12]">
            <?php echo $content[12]['body']; ?>
        </div>
    </div>
</div>
<hr>
        <h2 style="text-align: center">Wachtwoord aanpassen</h2>
        <form method="post">
        <input name="password" type="password" placeholder="Nieuw Wachtwoord">
        <input name="password2" type="password" placeholder="Wachtwoord herhalen">
        <input name="test" type="submit" value="Aanpassen">
        </form>
    <?php echo !empty($message) ? $message : null; ?>
<br><br>

<?php
}
