<?php
if (!LOGGED_IN){
    if (!empty($_POST['changeNewP'])) {
        if($account->resetPassword($_POST['password'], $_POST['password2'], $_GET['token'], $_GET['id'])){
            redirect("home");
        } else{
            $message = "Er is een fout opgetreden, probeer opnieuw";
        }
    }

    if (!empty($_POST['login'])) {
        if($account->login($_POST['email'], $_POST['password'])){
            redirect("home");
        } else {
            $error = "<span style='color: #FF8C6C; font-style: italic;'>De e-mail of het wachtwoord is onjuist</span>";
        }
    }
//    if (!empty($_POST['register'])) {
//        if($account->register($_POST['rEmail'], $_POST['rPassword'])){
//            redirect("home");
//        } else {
//            $error = "<span style='color: #FF8C6C; font-style: italic;'>De e-mail of het wachtwoord is onjuist</span>";
//        }
//    }
    if (!empty($_POST['recover'])) {
        if ($url = $account->forgotPassword($_POST['email'])){
            $link = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . $url;
            $from = "test@koenschutte.nl";
//            $to = $_POST['email'];
            $to = "19844@ma-web.nl";
            $subject = "Wachtwoord resetten";
            $message = '<html><body>Reset je wachtwoord: <a href="http://koenschutte.nl/pedicure/login?recover'.$url.'" target="_blank">Wachtwoord resetten</a></body></html>';
//            $message = '<html><body>Reset je wachtwoord: <a href="'.$link.'" target="_blank">Wachtwoord resetten</a></body></html>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$from.'' . "\r\n";
            mail($to,$subject,$message, $headers);
        }

    }


        if(!isset($_GET['recover'])){
?>
            <center>
        <form method="post">
            <br>
            <div class="imgcontainer">
                <img src="img/logo.svg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="email"><b></b></label>
                <input type="text" placeholder="Email" name="email" required>
                <br>

                <label for="password"><b></b></label>
                <input type="password" placeholder="Wachtwoord" name="password" required>
                <br>
                <a href="?recover">Wachtwoord vergeten?</a>
                <br>
                <?php echo !empty($error) ? $error : null; ?>

                <br>
                <input type="submit" name="login" value="Inloggen">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>

        </form>
    </center>
        <?php
    } elseif(isset($_GET['token'])){
?>
            <form method="post">
                <input name="password" type="password" placeholder="Nieuw Wachtwoord">
                <input name="password2" type="password" placeholder="Wachtwoord herhalen">
                <input name="changeNewP" type="submit" value="Aanpassen">
            </form>

            <?php
            echo !empty($message) ? $message : null;
    } else{
?>
        <center>
            <form method="post">
                <br>
                <div class="imgcontainer">
                    <img src="img/logo.svg" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="email"><b></b></label>
                    <input type="text" placeholder="Email" name="email" required>
                    <br>

                    <input type="submit" name="recover" value="Vertuur herstel mail">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>

            </form>
        </center>
        <?php
    }

    ?>
<!--    <span>Registreren</span>-->
<!--    <form method="post">-->
<!--        <input name="rEmail" type="email" placeholder="Email">-->
<!--        <input name="rPassword" type="password" placeholder="Wachtwoord">-->
<!--        <input name="register" type="submit" value="Registreren">-->
<!--    </form>-->
    <style>

        input[type=text], input[type=password] {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 3px;
        }

        input[type=text], input[type=password] {
            outline-color:#FF8C6C;
            outline-width: 3px;

        }

        input[type=submit] {
            background-color: #FF8C6C;
            color: #fff;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 25%;
            border-radius: 3px;
        }

        input[type=submit]:hover {
            opacity: 0.8;
            color: #fff;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;

        }

        .imgcontainer {
            padding-top: 95px;
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 20%;
        }

        .container {
            padding-top: 20px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 800px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }

            img.avatar {
                width: 40%;
            }

            input[type=submit] {
                width: 65%;
            }
            input[type=text], input[type=password] {
                width: 65%;
            }

        }


    </style>
<?php
} else{
    redirect("home");
}
