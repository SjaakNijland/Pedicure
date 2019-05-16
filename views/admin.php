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
    $content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'home%'")->fetchAll(PDO::FETCH_ASSOC);
    array_unshift($content, "");
    ?>
<div class="home-testimonials" style="width: 50%; margin-bottom: 50px">
    <div class="slide1">
        <div class="inner">
            <div data-editable data-name="content[6]">
                <?php echo $content[6]['body']; ?>
<!--                <p class="testimonial-titel">Testimonials</p>-->
<!--                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--                <p>Patiënt</p>-->
            </div>
        </div>
    </div>
    <div class="slide2">
        <div class="inner" data-editable data-name="content[7]">
            <?php echo $content[7]['body']; ?>
<!--            <p class="testimonial-titel">Testimonials2</p>-->
<!--            <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--            <p class="testimonial-name">Yenoah van Waard</p>-->
<!--            <p>Patiënt</p>-->
        </div>
    </div>
    <div class="slide3">
        <div class="inner" data-editable data-name="content[8]">
            <?php echo $content[8]['body']; ?>
<!--            <p class="testimonial-titel">Testimonials3</p>-->
<!--            <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--            <p class="testimonial-name">Yenoah van Waard</p>-->
<!--            <p>Patiënt</p>-->
        </div>
    </div>
</div>

<?php
}
