<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'tarieven%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

?>

<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="inner">
        <div class="page-info">
            <p class="title">Tarieven</p>
            <div data-editable data-name="content[44]" class="quote">
                <?php echo $content[0]['body']; ?>
            </div>
<!--            <p class="quote">"Verdienen uw voeten ook meer aandacht?"</p>-->

            <div data-editable data-name="content[45]">
                <?php echo $content[1]['body']; ?>
            </div>
<!--            <p>Voor specialistische behandelingen zoals het plaatsen van een-->
<!--            nagelbeugel, repareren van een beschadigde nagel met-->
<!--            Gel of het toepassen van antidruktechnieken door-->
<!--            middel van vilt toepassingen of maatwerk orthesen, wordt-->
<!--            vooraf een prijsopgave gegeven.-->
<!--            </p>-->
            <div class="price-list">
                <div data-editable data-name="content[46]" class="title-row">
                    <?php echo $content[2]['body']; ?>
                </div>
<!--                <div class="title-row">-->
<!--                    <p>Prijslijst Pedicure Sol</p>-->
<!--                </div>-->
                <div data-editable data-name="content[47]" class="price-row">
                    <?php echo $content[3]['body']; ?>
                </div>
<!--                    <div class="price-row">-->
<!--                        <p>Algehele voetverzorging (45 min)				€35</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>1e behandeling met intake/voetonderzoek			€55</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Pedicure plus: algehele voetverzorging + scrub/massage		€45</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Algehele voetverzorging + nagels lakken 				€45</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Intake/voetonderzoek						€20</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Nagels lakken (reinigen, kleurlak, top coat)			€15</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Toeslag per 15 minuten						€10</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Cadeaubonnen vanaf						€20</p>-->
<!--                    </div>-->
<!--                    <div class="price-row">-->
<!--                        <p>Toeslag behandeling op locatie €10</p>-->
<!--                    </div>-->
            </div>

            <div class="price-button">
                <a href="" class="button">afspraak maken</a>
            </div>
        </div>
        <div class="care-info">
            <div data-editable data-name="content[48]" class="care-title">
                <?php echo $content[4]['body']; ?>
            </div>
<!--            <p class="care-title">Zorgvezekering</p>-->
            <div data-editable data-name="content[49]">
                <?php echo $content[5]['body']; ?>
            </div>
<!--            <p>Mensen met diabetes kunnen een verhoogd risico hebben op het ontstaan van voetproblemen. De praktijkondersteuner van uw huisartsenpraktijk is doorgaans degene die dit beoordeelt. Afhankelijk van uw risicoprofiel kunt u vanuit de basis en/of aanvullende zorgverzekering een deel van de kosten van de pedicure behandeling vergoed krijgen. Ook voor enkele andere aandoeningen kunnen de kosten van de behandeling soms vergoed worden. Kijk voor een volledig overzicht op-->
<!--            <a  href="" class="read-more-link">www.zorgwijzer.nl/vergoedingen/pedicure</a>-->
<!--            </p>-->
<!--            <p>Indien verhinderd voor een gemaakte afspraak graag 24 uur voorafgaand afmelden, zonder afmelding wordt de behandeling voor 50% in rekening gebracht.-->
<!--            Betaling geschiedt contant-->
<!--            </p>-->
        </div>
    </div>
</div>

<style>
    /*.price-row p{*/
        /*padding-bottom: 16px;*/
        /*border-bottom: 1px solid black;*/
    /*}*/

    p a{
        color: #5ABEAF;
        font-weight: bold;
        text-decoration: none;
    }
</style>