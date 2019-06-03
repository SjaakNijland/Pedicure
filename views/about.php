<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'about%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

?>

<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="inner">
        <div class="page-info">
            <p class="title">Over mij</p>
            <div data-editable data-name="content[13]" class="quote">
                <?php echo $content[0]['body']; ?>
            </div>
            <div class="about-image">

                <div class="layer-1">
                    <img src="img/shape-blue.png" alt="">
                    <div data-editable data-name="content[14]" class="layer-2 ct-img">
                        <?php echo $content[1]['body']; ?>
                    </div>
<!--                    <img class="layer-2" src="img/about.jpg" alt="">-->
                </div>
            </div>
            <div class="about-text">
                <div data-editable data-name="content[15]" class="about-blue-title desktop">
                    <?php echo $content[2]['body']; ?>
                </div>
                <div data-editable data-name="content[16]" class="about-title">
                    <?php echo $content[3]['body']; ?>
                </div>
                <div data-editable data-name="content[17]">
                    <?php echo $content[4]['body']; ?>
                </div>
          </div>
        </div>
    </div>
    <div class="partners">
        <div class="inner">
            <div data-editable data-name="content[18]" class="title">
                <?php echo $content[5]['body']; ?>
            </div>
        </div>
        <div class="partners-logo">
            <div class="inner">
                <div class="logos">
                    <img src="img/provoet.png" alt="">
                    <img src="img/hyp.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="more-info">
        <div class="inner">
            <div class="info-block blue">
                <div data-editable data-name="content[19]">
                    <?php echo $content[6]['body']; ?>
                </div>
                <a href="behandelingen" class="button"> Bekijk Behandelingen</a>
            </div>
            <div class="info-block orange">
                <div data-editable data-name="content[20]">
                    <?php echo $content[7]['body']; ?>
                </div>
                <a href="tips" class="button"> Bekijk Tips</a>
            </div>
            <div class="info-block blue">
                <div data-editable data-name="content[21]">
                    <?php echo $content[8]['body']; ?>
                </div>
                <a href="tarieven" class="button"> Bekijk Tarieven</a>
            </div>
        </div>
    </div>
</div>