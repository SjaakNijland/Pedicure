<?php

if(LOGGED_IN){

    if (!empty($_POST['test'])) {
        if($account->changePassword($_POST['password'], $_POST['password2'])){
            $message = "Succesvol veranderd";
        } else{
            $message = "Er is een fout opgetreden, probeer opnieuw";
        }

    }

    $content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'home%'")->fetchAll(PDO::FETCH_ASSOC);
    array_unshift($content, "");
    ?>
    <div class="inner">
      <div class="logout">
          <a href="?logout" class="button">Uitloggen</a>
      </div>
      <hr>
    <h2 style="text-align: center">De reviews van de home aanpassen</h2>

    <?php
    $xpath1 = new DOMXPath(@DOMDocument::loadHTML($content[13]['body']));
    $src1 = $xpath1->evaluate("string(//img/@src)");
    $xpath2 = new DOMXPath(@DOMDocument::loadHTML($content[14]['body']));
    $src2 = $xpath2->evaluate("string(//img/@src)");
    $xpath3 = new DOMXPath(@DOMDocument::loadHTML($content[15]['body']));
    $src3 = $xpath3->evaluate("string(//img/@src)");
    ?>

<div class="home-testimonials">
    <div class="admin-block">
        <div class="slidefix" style="background-image: url('<?php echo $src1 ?>')">
            <div class="inner">
                <div data-editable data-name="content[10]">
                    <?php echo $content[10]['body']; ?>
                </div>
            </div>
        </div>
        <div class="slidefix" style="background-image: url('<?php echo $src2 ?>')">
            <div class="inner" data-editable data-name="content[11]">
                <?php echo $content[11]['body']; ?>
            </div>
        </div>
        <div class="slidefix" style="background-image: url('<?php echo $src3 ?>')">
            <div class="inner" data-editable data-name="content[12]">
                <?php echo $content[12]['body']; ?>
            </div>
        </div>
    </div>

    <div class="admin-block">
      <div data-editable data-name="content[50]" class="admin-img">
          <?php echo $content[13]['body']; ?>
      </div>
      <hr>
      <div data-editable data-name="content[51]" class="admin-img">
          <?php echo $content[14]['body']; ?>
      </div>
      <hr>
      <div data-editable data-name="content[52]" class="admin-img">
          <?php echo $content[15]['body']; ?>
      </div>
    </div>
</div>
<div class="admin-wide">
    <div class="admin-block">
        <h2 style="color: black">Home img</h2>
        <div data-editable data-name="content[53]" class="admin-img">
            <?php echo $content[16]['body']; ?>
        </div>
        <div data-editable data-name="content[54]" class="admin-img">
            <?php echo $content[17]['body']; ?>
        </div>
        <div data-editable data-name="content[55]" class="admin-img">
            <?php echo $content[18]['body']; ?>
        </div>
    </div>
    <div class="admin-block">
      <h2 style="text-align: center">Wachtwoord aanpassen</h2>
      <form method="post">
      <input name="password" type="password" placeholder="Nieuw Wachtwoord">
      <input name="password2" type="password" placeholder="Wachtwoord herhalen">
      <input name="test" type="submit" value="Aanpassen">
      </form>
    <?php echo !empty($message) ? $message : null; ?>
    </div>
  </div>
</div>

    <style>
    .slidefix{
        box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.4);
        background-repeat: no-repeat;
        background-position: center;

        background-size: cover;
        padding: 50px 0;
        height: 400px
    }

        .admin-img img{
            width: 100%;
            height: auto;
            /*color: black;*/
        }
        .admin-img div{
            width: 200px;
        }

        /*Change password*/
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
    </style>

<?php
} else {
    redirect("login");
}
