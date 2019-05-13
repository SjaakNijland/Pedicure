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

?>


<div class="container">
    <div class="banner">
        <div class="inner">
            <div class="banner-title">
                <p>Pedicure
                Praktijk
                Sol</p>
            </div>
            <div class="banner-text-mobile">
                <p>Voor iedereen</p>
                <p>die verzorgde</p>
                <p>voeten wil</p>
            </div>
            <div class="banner-text">
                <p>Voor iedereen
                die verzorgde
                voeten wil</p>
            </div>
            <div class="banner-button">
                <a href="" class="button">afspraak maken</a>
            </div>
        </div>
    </div>
    <div class="home-about">
        <div class="inner">
            <div class="title" data-editable data-name="content[1]">
            </div>
        </div>
        <div class="inner block left">
            <div class="secondary-title" data-editable data-name="content[2]">
                <?php echo $content[2]['body'] ?>
            </div>
            <div data-editable data-name="content[3]">
                <?php echo $content[3]['body'] ?>
            </div>
            <div class="about-color-text" data-editable data-name="content[4]">
                <?php echo $content[4]['body'] ?>
            </div>
            </div>
        </div>
    </div>
    <div class="home-testimonials slide">
        <div class="slide1">
            <div class="inner">
                <p class="testimonial-titel">Testimonials</p>
                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>
                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>
                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>
                <p class="testimonial-name">Yenoah van Waard</p>
                <p>Patiënt</p>
            </div>
        </div>
        <div class="slide2">
            <div class="inner">
                <p class="testimonial-titel">Testimonials2</p>
                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>
                <p class="testimonial-name">Yenoah van Waard</p>
                <p>Patiënt</p>
            </div>
        </div>
        <div class="slide3">
            <div class="inner">
                <p class="testimonial-titel">Testimonials3</p>
                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>
                <p class="testimonial-name">Yenoah van Waard</p>
                <p>Patiënt</p>
            </div>
        </div>
    </div>
    <div class="home-gallery slide">
        <div class="gallery-image">
            <img src="img/Joke.png" alt="joke sol">
        </div>
        <div class="gallery-image">
            <img src="img/feet.png" alt="feet">
        </div>
        <div class="gallery-image">
            <img src="img/red-feet.jpg" alt="feet">
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
