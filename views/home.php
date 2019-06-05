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

//var_dump($content);

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
                <?php echo $content[1]['body']; ?>
            </div>
        </div>
        <div class="inner block left">
            <div class="secondary-title" data-editable data-name="content[2]">
                <?php echo $content[2]['body']; ?>
            </div>
            <div data-editable data-name="content[3]">
                <?php echo $content[3]['body']; ?>
            </div>
            <div class="about-color-text" data-editable data-name="content[4]">
                <?php echo $content[4]['body']; ?>
            </div>
            <a href="" class="about-image-button desktop">Lees Meer</a>
        </div>
        <div class="about-image block right">
            <div class="image-layer-1">
                <img src="img/shape-blue.png" alt="" class="background-layer-1">
                <div class="inner desktop">
                    <div class="image-layer2">
                        <div class="ct-img" data-editable data-name="content[5]">
                            <?php echo $content[5]['body']; ?>
                        </div>
<!--                        <img src="img/Joke.png" alt="Joke Sol">-->
                        <a href="" class="about-image-button mobile">Lees Meer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-info">
        <div class="info-text">
            <div class="inner">
                <div class="info-title" data-editable data-name="content[6]">
                    <?php echo $content[6]['body']; ?>
                </div>
                <div class="sec-info-title" data-editable data-name="content[7]">
                    <?php echo $content[7]['body']; ?>
                </div>
                <div class="info" data-editable data-name="content[8]">
                    <?php echo $content[8]['body']; ?>
                </div>
            </div>
<!--            <div class="inner" data-editable data-name="content[5]">-->
<!--                <p class="info-title">Goed om te weten</p>-->
<!--                <p class="sec-info-title">Wat bied ik aan</p>-->
<!--                <p class="info">Lidmaatschap provoet, de brancheorganisatie van pedicures <a href="" class="read-more-link white">Lees meer</a></p>-->
<!--                <p class="info">Een tip: bv. Tip voor een eerste bezoek: kom op schoenen die u al enige tijd heeft/draagt, ze geven informatie over de drukpunten en hoe u de voeten belast.</p>-->
<!--            </div>-->
        </div>
        <div class="home-info-image">
            <div class="image-layer-1">
                <img class="background-layer-1" src="img/shape.png" alt="">
                <div class="inner">
                    <div class="image-layer-2">
                        <div data-editable data-name="content[9]" class="ct-img">
                            <?php echo $content[9]['body']; ?>
                        </div>
<!--                        <img src="img/red-feet.jpg" alt="">-->
                        <div class="info-button">
                            <a href="behandelingen" class="button">Behandelingen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-testimonials slide">
        <div class="slide1">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[10]['body']; ?>
<!--                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--                <p>Patiënt</p>-->
            </div>
        </div>
        <div class="slide2">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[11]['body']; ?>
<!--                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--                <p class="testimonial-name">Yenoah van Waard</p>-->
<!--                <p>Patiënt</p>-->
            </div>
        </div>
        <div class="slide3">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[12]['body']; ?>
<!--                <p>"Mijn evaring was fijn, ik ben overtuigd van de pedicure in de praktijk. Ik zal binnenkort weer een afspraak maken."</p>-->
<!--                <p class="testimonial-name">Yenoah van Waard</p>-->
<!--                <p>Patiënt</p>-->
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
    <div class="maps">
        <iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=Spuistraat%20210%2C%201012%20VT%20Amsterdam%2C%20Netherlands+(Mijn%20bedrijfsnaam)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/nl/maak-een-google-map/">Maak een Google Map</a> van <a href="https://www.mapsdirections.info/nl/">Nederland Kaart</a></iframe>
    </div>
</div>
