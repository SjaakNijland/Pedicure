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


//echo "<pre>";
//var_dump(json_encode($content));
//echo "</pre>";
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
            <div class="title" data-editable data-name="content[1]">
                <!--            Wie is Pedicure Praktijk Sol-->
                <?php echo $content[1]['body'] ?>
            </div>
            <div class="secondary-title" data-editable data-name="content[2]">
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
<div style="position:fixed; top:0; right:0; background-color: green; padding: 5px;">
    <h2>Backup</h2>
    <p id="ez"></p>
    <select id="backup"></select>
</div>

<?php
echo "<br><br><br><br><br><br><br><br><hr>";
$string = '<p>

</p>
<img alt="177624" class="align-right" height="154" src="assets/ct-uploads/141f7ec3dd0a25827f5a7397c81f32f8.jpg" width="247">
<p>
    twee honderd iq indy gap holy molyweq wqe
</p>
<p>

</p>
<p>
    wqeq eQW
</p>
<img alt="2941764 lfs13" height="480" src="assets/ct-uploads/1fda7e9879e64b0ffaf1cd138b4938e1.png" width="480">
<h1>
    HOI
</h1>
<p>
    EZZ
</p>';
//echo $string;
//var_dump(htmlspecialchars($string));
//$string2 = preg_replace('/\s+/', '', $string);
//var_dump(htmlspecialchars($string2));
//var_dump(simplexml_load_string($string));

$dom = new DOMDocument;
$dom->loadHTML($string);
foreach($dom->getElementsByTagName('*') as $node)
{
//   echo "ez<br>";
    $array[] = htmlspecialchars($dom->saveHTML($node));
}

//print("<pre>".print_r($array,true)."</pre>");

?>
