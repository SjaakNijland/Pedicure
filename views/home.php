<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'home%'")->fetchAll(PDO::FETCH_ASSOC);
array_unshift($content, "");

?>

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
                <a href="contact" class="button">afspraak maken</a>
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
                        <a href="about" class="about-image-button mobile">Lees Meer</a>
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
        </div>
        <div class="home-info-image">
            <div class="image-layer-1">
                <img class="background-layer-1" src="img/shape.png" alt="">
                <div class="inner">
                    <div class="image-layer-2">
                        <div data-editable data-name="content[9]" class="ct-img">
                            <?php echo $content[9]['body']; ?>
                        </div>
                        <div class="info-button">
                            <a href="behandelingen" class="button">Behandelingen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    //echo $content[13]['body'];
    $html =  $content[13]['body'];
    //$src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($content[13]['body']))->xpath("//img/@src"));

    $xpath1 = new DOMXPath(@DOMDocument::loadHTML($content[13]['body']));
    $src1 = $xpath1->evaluate("string(//img/@src)");
    $xpath2 = new DOMXPath(@DOMDocument::loadHTML($content[14]['body']));
    $src2 = $xpath2->evaluate("string(//img/@src)");
    $xpath3 = new DOMXPath(@DOMDocument::loadHTML($content[15]['body']));
    $src3 = $xpath3->evaluate("string(//img/@src)");
//    echo $src;

    ?>

    <div class="home-testimonials slide">
        <div class="slidefix" style="background-image: url('<?php echo $src1 ?>')">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[10]['body']; ?>
            </div>
        </div>
        <div class="slidefix" style="background-image: url('<?php echo $src2 ?>')">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[11]['body']; ?>
            </div>
        </div>
        <div class="slidefix" style="background-image: url('<?php echo $src3 ?>')">
            <div class="inner">
                <p class="testimonial-titel">Reviews pedicurepraktijk Sol</p>
                <?php echo $content[12]['body']; ?>
            </div>
        </div>
    </div>
    <div class="home-gallery slide">
        <div class="gallery-image">
<!--            <img src="img/Joke.png" alt="joke sol">-->
            <?php echo $content[16]['body']; ?>
        </div>
        <div class="gallery-image">
<!--            <img src="img/feet.png" alt="feet">-->
            <?php echo $content[17]['body']; ?>
        </div>
        <div class="gallery-image">
            <?php echo $content[18]['body']; ?>
        </div>
<!--        <div class="gallery-image">-->
<!--            <img src="img/red-feet.jpg" alt="feet">-->
<!--        </div>-->
    </div>
    <div class="maps">
      <iframe width="100%" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2421.2016134793835!2d4.729247216002199!3d52.63827043520969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47cf57bd042af8ad%3A0x7118242ce1a7bec5!2sBergerweg+57%2C+1816+BN+Alkmaar!5e0!3m2!1snl!2snl!4v1559128310920!5m2!1snl!2snl"  allowfullscreen></iframe>
    </div>
</div>


<style>
    .slidefix{
        /*background-image: url('../img/gigi.jpg');*/
        box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.4);
        background-repeat: no-repeat;
        background-position: center;

        background-size: cover;
        /*background-position: center;*/
        padding: 50px 0;
        height: 400px
    }
</style>