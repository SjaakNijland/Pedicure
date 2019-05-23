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
            $result = "Je hebt de telefoon geslecteerd";
            $keuze = $_POST['voornaam'] . " wil bereikt worden via de telefoon";
        } elseif(isset($_POST['checkMail']) && !isset($_POST['checkTel'])){
            $result = "Je hebt de mail geslecteerd";
            $keuze = $_POST['voornaam'] . " wil bereikt worden via de mail";
        } elseif(isset($_POST['checkMail']) && isset($_POST['checkTel'])){
            $result = "Je hebt beide geselecteerd";
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

if(isset($errorMessage)){
    echo $errorMessage;
}

?>
<form method="post">
    <input name="voornaam" type="text" placeholder="Voornaam" required>
    <input name="achternaam" type="text" placeholder="Achternaam" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="tel" type="tel" required>
    <input id="check1" name="checkTel" type="checkbox" required>
    <input id="check2" name="checkMail" type="checkbox" required>
    <input name="contact" type="submit" value="Verzenden">
</form>
<br>
<br>
<br>
<br>
<br>
<?php
if(isset($result)){
    echo $result;
}
?>

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
