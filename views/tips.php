<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'tips%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

?>
<div class="container">
    <div class="page-banner">
        <img src="img/tips.png">
        <div class="background-layer"></div>
    </div>
    <div class="wave-background">
        <div class="inner">
            <div class="page-info">
                <p class="title">Tips</p>
                <div data-editable data-name="content[34]" class="quote">
                    <?php echo $content[0]['body']; ?>
                </div>
                <div data-editable data-name="content[35]" class="tip-info">
                    <?php echo $content[1]['body']; ?>
                </div>
                <div class="tip-block">
                    <div data-editable data-name="content[36]" class="tips-title">
                        <?php echo $content[2]['body']; ?>
                    </div>
                    <div data-editable data-name="content[37]" class="tip-block-info">
                        <?php echo $content[3]['body']; ?>
                    </div>
                </div>
                <div class="tip-block">
                    <div data-editable data-name="content[38]" class="tips-title">
                        <?php echo $content[4]['body']; ?>
                    </div>
                    <div data-editable data-name="content[39]" class="tip-block-info">
                        <?php echo $content[5]['body']; ?>
                    </div>
                </div>
                <div class="tip-block">
                    <div data-editable data-name="content[40]" class="tips-title">
                        <?php echo $content[6]['body']; ?>
                    </div>
                    <div data-editable data-name="content[41]" class="tip-block-info">
                        <?php echo $content[7]['body']; ?>
                    </div>
                </div>
                <div class="tip-block">
                    <div data-editable data-name="content[42]" class="tips-title">
                        <?php echo $content[8]['body']; ?>
                    </div>
                    <div data-editable data-name="content[43]" class="tip-block-info">
                        <?php echo $content[9]['body']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.tip-block-info{}
</style>
