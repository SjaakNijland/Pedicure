<?php

$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'home%'")->fetchAll(PDO::FETCH_ASSOC);
//$content = $pdo->query("
//SELECT CASE content.body_id WHEN NULL
// THEN
// (SELECT content.*, content_body.*
//FROM content
//JOIN content_body ON content.id = content_body.content_id
//LEFT OUTER JOIN content_body p2 ON (content.id = p2.content_id AND
//    (content_body.date < p2.date OR content_body.date = p2.date AND content_body.id < p2.id))
//WHERE p2.id IS NULL AND content.name LIKE 'home%')")->fetchAll(PDO::FETCH_ASSOC);

array_unshift($content, "");


echo "<pre>";
//var_dump(json_encode($content));
echo "</pre>";
?>
<!--<select style="z-index: 3000000">-->
<!--    <option value="volvo">Volvo</option>-->
<!--    <option value="saab">Saab</option>-->
<!--    <option value="mercedes">Mercedes</option>-->
<!--    <option value="audi">Audi</option>-->
<!--</select>-->

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
            <div class="title" data-editable data-name="content[1]">
                <!--            Wie is Pedicure Praktijk Sol-->
                <?php echo $content[1]['body'] ?>
            </div>
            <div class="secondary-title" data-editable data-name="content[2]">
                <!--                Wat bied ik aan-->
                <?php echo $content[2]['body'] ?>
            </div>
            <div data-editable data-name="content[3]">
<!--                <p>-->
<!--                    Wat bied ik aan Medisch pedicure en beoefen mijn vak met hart en ziel in Alkmaar West en 1 dag per week in Castricum.<br><a class="read-more-link" href="test">Lees meer</a>-->
<!--                </p>-->
                <?php echo $content[3]['body'] ?>
            </div>
<!--            <p>-->
<!--                Iedere klant wordt met de grootste aandacht behandeld en krijgt een voet verzorging advies mee naar huis.-->
<!--            </p>-->
<!--            <p>Wat bied ik aan Medisch pedicure en beoefen mijn vak met hart en ziel in Alkmaar West en 1 dag per week in Castricum.<br>-->
<!--                <a href="#" class="read-more-link">Lees meer</a>-->
<!--            </p>-->
            <div class="about-color-text" data-editable data-name="content[4]">
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
<!--SELECT content.*, CASE  WHEN content.body_id = NULL-->
<!--THEN-->
<!--(SELECT content.*, content_body.*-->
<!--FROM content-->
<!--JOIN content_body ON content.id = content_body.content_id-->
<!--LEFT OUTER JOIN content_body p2 ON (content.id = p2.content_id AND-->
<!--(content_body.date < p2.date OR content_body.date = p2.date AND content_body.id < p2.id))-->
<!--WHERE p2.id IS NULL AND content.name LIKE 'home%')-->
<!--ELSE-->
<!--(SELECT content.*, content_body.*-->
<!--FROM content-->
<!--JOIN content_body ON content_body.id = content.body_id-->
<!--WHERE content.name LIKE 'home%')-->
<!--END FROM content-->