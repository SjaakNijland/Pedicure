<?php
$content = $pdo->query("SELECT * FROM content WHERE name LIKE 'home%'")->fetchAll();
array_unshift($content, "");

?>


<div class="container">
    <div class="banner">
        <div class="inner">
            <div class="banner-title">
                <p>Pedicure</p>
                <p>Praktijk</p>
                <p>Sol</p>
            </div>
            <div class="banner-text">
                <p>Voor iedereen</p>
                <p>die verzorgde</p>
                <p>voeten wil</p>
            </div>
            <div class="banner-button">
                <a href="" class="button">afspraak maken</a>
            </div>
        </div>
    </div>
    <div class="home-about">
        <div class="inner">
            <div class="title" data-editable data-name="home-1">
                <?php echo $content[1]['body'] ?>
            </div>
            <div class="secondary-title" data-editable data-name="home-2">
                <?php echo $content[2]['body'] ?>
            </div>
            <div data-editable data-name="home-3">
                <?php echo $content[3]['body'] ?>
            </div>
<!--            <p>Wat bied ik aan Medisch pedicure en beoefen mijn vak met hart en ziel in Alkmaar West en 1 dag per week in Castricum.<br>-->
<!--                <a href="#" class="read-more-link">Lees meer</a>-->
<!--            </p>-->
            <div class="about-color-text" data-editable data-name="home-4">
                <?php echo $content[4]['body'] ?>
            </div>
<!--            <p class="about-color-text">-->
<!--                Iedere klant wordt met de grootste aandacht behandeld en krijgt eeb voet verzorging advies mee naar huis.</p>-->
            <div class="about-image">
                <img src="img/Joke.png" alt="Joke Sol">
                <a href="" class="about-image-button">Lees Meer</a>
            </div>
        </div>
    </div>
</div>
