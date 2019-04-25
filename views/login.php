<?php
if (!LOGGED_IN){
    if (!empty($_POST['login'])) {
        if($account->login($_POST['email'], $_POST['password'])){
            redirect("home");
        } else {
            $error = "De e-mail of het wachtwoord is onjuist";
        }
    }
?>
    <?php echo !empty($error) ? $error : null; ?>

    <span>Inloggen</span>
    <form method="post">
        <input name="email" type="email" placeholder="Email" value="<?php echo !empty($error) ? $_POST['email'] : null; ?>">
        <input name="password" type="password" placeholder="Wachtwoord">
        <input name="login" type="submit" value="Inloggen">
    </form>
<!--    <span>Registreren</span>-->
<!--    <form method="post">-->
<!--        <input name="rEmail" type="email" placeholder="Email">-->
<!--        <input name="rPassword" type="password" placeholder="Wachtwoord">-->
<!--        <input name="register" type="submit" value="Registreren">-->
<!--    </form>-->

<?php
} else{
    redirect("home");
}
