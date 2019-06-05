<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'tips%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

?>
<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="inner">
        <div class="page-info">
            <p class="title">Tips</p>
            <div data-editable data-name="content[34]" class="quote">
                <?php echo $content[0]['body']; ?>
            </div>

<!--            <p class="quote">"Voeten verdienen uw aandacht!"</p>-->
            <div data-editable data-name="content[35]" class="tip-info">
                <?php echo $content[1]['body']; ?>
            </div>
<!--            <p class="tip-info">Met <b>dagelijkse aandacht en zorg</b> kunt u <b>zelf invloed</b> uitoefenen op de <b>gezond van uw voeten</b> zodat u <b>klachten kunt voorkomen of verminderen</b></p>-->
            <div class="tip-block">
                <div data-editable data-name="content[36]" class="tips-title">
                    <?php echo $content[2]['body']; ?>
                </div>
<!--                <p class="tips-title">Voeten wassen</p>-->
                <div data-editable data-name="content[37]" class="tip-block-info">
                    <?php echo $content[3]['body']; ?>
                </div>
<!--                <div class="tip-block-info">-->
<!--                    <p>Was uw voeten dagelijks met lauw water en bij voorkeur zonder zeep. Blijf ook niet te lang met uw voeten in het water, een droge huid kan hiervan het gevolg zijn. Droog natte voeten goed af, vooral tussen de tenen en geef ze even de tijd ook volledig te drogen.-->
<!--                    Smeer uw voeten dagelijks na het wassen in met wat lotion of hydraterende crème zodat de huid niet uitdroogt.-->
<!--                    </p>-->
<!--                </div>-->
            </div>
            <div class="tip-block">
                <div data-editable data-name="content[38]" class="tips-title">
                    <?php echo $content[4]['body']; ?>
                </div>
<!--                <p class="tips-title">Schoeisel en sokken</p>-->
                <div data-editable data-name="content[39]" class="tip-block-info">
                    <?php echo $content[5]['body']; ?>
                </div>
<!--                <div class="tip-block-info">-->
<!--                    <p>Draag bij voorkeur katoenen of wollen sokken zonder dikke naden en verschoon ze dagelijks.-->
<!--                        Goed passende schoenen, die bovendien voldoende ventileren, zijn essentieel in uw dagelijks loopcomfort en in het voorkomen van pijnlijke voeten.  Laat u voorlichten in een goede schoenenzaak over de voor u juiste maat en pasvorm. Koop uw schoenen bovendien aan het einde van de dag dan kunnen uw voeten namelijk al wat opgezet zijn.-->
<!--                        Wissel zo mogelijk dagelijks van schoenen-->
<!--                        Voorkom ingegroeide teennagels-->
<!--                        <br>-->
<!--                        De grootste risicofactoren voor het ontstaan van ingroeiende teennagels zijn:-->
<!--                        <ul>-->
<!--                            <li>Druk door slecht passend schoeisel</li>-->
<!--                            <li>Het verkeerd (te kort en/of niet recht) knippen van de nagels</li>-->
<!--                            <li>Een weke nagelomgeving door veel baden, transpiratie of synthetische sokken</li>-->
<!--                        </ul>-->
<!--                        Tip: “Pedi- of Wandelwol”is een 100% natuurproduct dat u als antidrukmiddel zelf goed kunt gebruiken en toepassen. Geschikt voor wandelaars, sporters of mensen die snel last van pijnlijke drukplekken, blaren of koude voeten hebben. Vraag er eens naar als u in de praktijk bent.-->
<!--                    </p>-->
<!--                </div>-->
            </div>
            <div class="tip-block">
                <div data-editable data-name="content[40]" class="tips-title">
                    <?php echo $content[6]['body']; ?>
                </div>
<!--                <p class="tips-title">Bescherm uw voeten tegen schimmelinfecties</p>-->
                <div data-editable data-name="content[41]" class="tip-block-info">
                    <?php echo $content[7]['body']; ?>
                </div>
<!--                <div class="tip-block-info">-->
<!--                    <p>Gebruik badslippers in publieke natte ruimten zoals zwembaden, sauna’s, kleedkamers van sportschool of -vereniging, gymzalen.-->
<!--                      Komt u regelmatig in publieke natte ruimten controleer uw voeten goed op mogelijke signalen van voetschimmel zoals kleine blaasjes en nagels die van kleur veranderen.-->
<!--                    </p>-->
<!--                </div>-->
            </div>
            <div class="tip-block">
                <div data-editable data-name="content[42]" class="tips-title">
                    <?php echo $content[8]['body']; ?>
                </div>
<!--                <p class="tips-title">Eelt en kloven</p>-->
                <div data-editable data-name="content[43]" class="tip-block-info">
                    <?php echo $content[9]['body']; ?>
                </div>
<!--                <div class="tip-block-info">-->
<!--                    <p>Eelt doet zich voor op plaatsen op de voet waar veel druk of wrijving plaatsvindt. Voortdurende druk en eeltvorming kan leiden tot likdoornvorming.-->
<!--                        Kloven kunnen ontstaan op eelt locaties waar het eelt erg droog is en de huid minder elastisch is geworden.-->
<!--                        Door zelf regelmatig met een voetvijl u voeten te behandelen en de voeten in te smeren met een verzorgende crème kunt u klachten door overmatig eelt of kloven voorkomen.-->
<!--                    </p>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<style>
.tip-block-info{}
</style>