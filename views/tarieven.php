<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'tarieven%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

?>

<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="wave-background">
        <div class="inner">
            <div class="page-info">
                <p class="title">Tarieven</p>
                <div data-editable data-name="content[44]" class="quote">
                    <?php echo $content[0]['body']; ?>
                </div>
                <div data-editable data-name="content[45]">
                    <?php echo $content[1]['body']; ?>
                </div>
                <div class="price-list">
                    <div data-editable data-name="content[46]" class="title-row">
                        <?php echo $content[2]['body']; ?>
                    </div>

                    <div data-editable data-name="content[47]" class="price-row">
                        <?php echo $content[3]['body']; ?>
                    </div>
                </div>

                <div class="price-button">
                    <a href="" class="button">afspraak maken</a>
                </div>
            </div>
            <div class="care-info">
                <div data-editable data-name="content[48]" class="care-title">
                    <?php echo $content[4]['body']; ?>
                </div>
                <div data-editable data-name="content[49]">
                    <?php echo $content[5]['body']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .price-row p{
        padding-bottom: 16px;
        border-bottom: 1px solid black;
    }
    .price-row p:last-child{
        border: none;
        padding-bottom: 0;
    }

    p a{
        color: #5ABEAF;
        font-weight: bold;
        text-decoration: none;
    }
</style>
