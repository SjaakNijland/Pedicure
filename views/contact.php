<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'contact%'")->fetchAll(PDO::FETCH_ASSOC);
array_unshift($content, "");

if (!empty($_POST['contact'])) {
//voornaam, achternaam
//    email, telefoon,
    $errorMessage = "";
    $result = "";
    $keuze = "";

    if(!strlen(trim($_POST['voornaam']))){
        $errorMessage = "Vul een geldige voornaam in";
    } elseif(!strlen(trim($_POST['achternaam']))){
        $errorMessage = "Vul een geldige achternaam in";
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errorMessage = "Vul een geldige email in";
    } elseif(!is_numeric($_POST['tel'])){
        $errorMessage = "Vul een geldig telefoonnummer in, alleen maar nummers toegestaan";
    } else{
        if(isset($_POST['checkTel']) && !isset($_POST['checkMail'])){
            $result = "<b class='color';>U heeft aangevinkt bereikbaar te zijn via uw telefoonnummer.</b> Ik zal zo snel mogelijk contact met u opnemen. Houd uw telefoon in de gaten, u kunt gebeld worden door het nummer: <b class='color';>(+31) 06 513 046 51.</b>";
            $keuze = $_POST['voornaam'] . " wil bereikt worden via de telefoon";
        } elseif(isset($_POST['checkMail']) && !isset($_POST['checkTel'])){
            $result = "<b class='color';>U heeft aangevinkt bereikbaar te zijn via uw e-mail.</b> Ik zal zo snel mogelijk contact met u opnemen. Houd uw e-mail in de gaten, u kunt gemaild worden door het e-mailadres:  <b class='color';>pedicurepraktijksol@gmail.com</b>";
            $keuze = $_POST['voornaam'] . " wil bereikt worden via de mail";
        } elseif(isset($_POST['checkMail']) && isset($_POST['checkTel'])){
            $result = "<b class='color';>U heeft aangevinkt bereikbaar te zijn via uw e-mail en telefoonnummer.</b> Ik zal zo snel mogelijk contact met u opnemen. Houd uw e-mail en telefoon in de gaten, u kunt gemaild worden door het e-mailadres: <b class='color';>pedicurepraktijksol@gmail.com</b> of gebeld worden door het nummer: <b class='color';>(+31) 06 513 046 51.</b>";
            $keuze = $_POST['voornaam'] . " vind via de telefoon en mail beide prima om bereikt te worden.";
        }
        $from = "test@koenschutte.nl";
        $to = "koenschutte@hotmail.nl";
        $subject = "Nieuwe afspraak maken";
        $message = "Er is een nieuwe afspraak ingevuld op pedicurepraktijksol.nl \n\n".$keuze."\nDe gegevens\nVoornaam: ".$_POST['voornaam']." \nAchternaam: ".$_POST['achternaam']."\nEmail: ".$_POST['email']."\nTelefoon: ".$_POST['tel']." ";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
    }
}
//$result = "<b class='color';>U heeft aangevinkt bereikbaar te zijn via uw e-mail en telefoonnummer.</b> Ik zal zo snel mogelijk contact met u opnemen. Houd uw e-mail en telefoon in de gaten, u kunt gemaild worden door het e-mailadres: <b class='color';>pedicurepraktijksol@gmail.com</b> of gebeld worden door het nummer: <b class='color';>(+31) 06 513 046 51.</b>";
?>

<div class="container">
    <div class="page-banner">
        <img src="img/contact.png">
        <div class="background-layer"></div>
    </div>
    <div class="wave-background">
        <div class="inner">
            <div class="page-info">
                <p class="title">Contact</p>
                <div class="contact-info">
                    <p class="contact-info-title">Contactgegevens</p>
                    <p class="contact-info-content"><i class="fas fa-phone"></i> (+31) 06 513 046 51</p>
                    <p class="contact-info-content"><i class="fas fa-envelope"></i> pedicurepraktijksol@gmail.com</p>
                    <form method="post" class="contact-form">
                        <?php
                        if(isset($errorMessage)){
                            ?>
                            <div class="contact-message">
                                <span><?php echo $errorMessage ?></span>
                            </div>
                            <?php
                        }
                        if(isset($result)){
                            ?>
                            <div class="contact-message">
                                <span><?php echo $result ?></span>
                            </div>
                            <?php
                        } else {
                            ?>
                            <input name="voornaam" type="text" placeholder="Voornaam" required>
                            <input name="achternaam" type="text" placeholder="Achternaam" required>
                            <input name="email" type="email" placeholder="Email">
                            <input name="tel" type="tel" placeholder="Telefoon">
                            <p class="check-row"><input id="check1" name="checkTel" type="checkbox" class="check"
                                                        required>Ik ben bereikbaar via Telefoon</p>
                            <p class="check-row"><input id="check2" name="checkMail" type="checkbox" class="check"
                                                        value=" " required>Ik ben bereikbaar via mail</p>
                            <input name="contact" type="submit" value="Verzenden" class="button">
                            <?php
                        }
                        ?>
                    </form>
                    <p class="contact-info-title">Waar vind u pedicurepraktijk Sol?</p>
                    <p class="contact-info-second-title">Pedicurepraktijk Sol bevindt zich op 2 locaties</p>
                    <div class="contact-map-block">
                        <p class="map-title">Bergerweg 57, 1816 BN</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2421.2016134793835!2d4.729247216002199!3d52.63827043520969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47cf57bd042af8ad%3A0x7118242ce1a7bec5!2sBergerweg+57%2C+1816+BN+Alkmaar!5e0!3m2!1snl!2snl!4v1559128310920!5m2!1snl!2snl"  allowfullscreen></iframe>
                        <p class="map-info"> Alkmaar: praktijk aan huis Bergerweg 57, 1816 BN. De praktijkruimte bevindt zich op de 1e etage.  Er is vrij parkeren aan de Bergerweg en in het Rembrandtkwartier achter de Bergerweg. </p>
                    </div>
                    <div class="contact-map-block">
                        <p class="map-title">Bakkerspleintje 24 in Castricum.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2426.239372364189!2d4.660626551710857!3d52.54719487972026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5f76a81624c6d%3A0xf0d8225c447ae89!2sBakkerspleintje+24%2C+1901+EZ+Castricum!5e0!3m2!1snl!2snl!4v1560249997545!5m2!1snl!2snl"  allowfullscreen></iframe>
                        <p class="map-info">Castricum: op dinsdag houdt Pedicurepraktijk Sol praktijk in sfeervolle salon van Cosmo Hairstyling aan het Bakkerspleintje 24 in Castricum. U kunt gedurende 2 uur gratis parkeren met een parkeerschijf in de nabije omgeving.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var check1 = document.getElementById("check1");
var check2 = document.getElementById("check2");

check1.addEventListener("change", function(){
    if(check1.checked){
        check2.required = false;
    } else {
        check2.required = true;
    }
});
check2.addEventListener("change", function(){
    if(check2.checked){
        check1.required = false;
    } else {
        check1.required = true;
    }
})
</script>
