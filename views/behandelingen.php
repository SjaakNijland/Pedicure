<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'behandelingen%'")->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="inner">
        <div class="page-info">
            <p class="title">Behandelingen</p>
            <div data-editable data-name="content[22]" class="quote">
                <?php echo $content[0]['body']; ?>
            </div>
            <div data-editable data-name="content[23]">
                <?php echo $content[1]['body']; ?>
            </div>
        </div>
    </div>
    <div class="accordion-background">
        <div class="inner">
            <div class="wrapper">
                <button class="accordion">
                    <div class="inherit" data-editable data-name="content[24]">
                        <?php echo $content[2]['body']; ?>
                    </div>
                </button>
                <div class="panel" data-editable data-name="content[25]">
                    <?php echo $content[3]['body']; ?>
                </div>
                <button class="accordion">
                    <div class="inherit" data-editable data-name="content[26]">
                        <?php echo $content[4]['body']; ?>
                    </div>
                </button>
                <div class="panel">
                    <div class="inherit" data-editable data-name="content[27]">
                        <?php echo $content[5]['body']; ?>
                    </div>
                </div>
                <button class="accordion">
                    <div class="inherit" data-editable data-name="content[28]">
                        <?php echo $content[6]['body']; ?>
                    </div>
                    </button>
                <div class="panel">
                    <div data-editable data-name="content[29]">
                        <?php echo $content[7]['body']; ?>
                    </div>
                </div>
                <button class="accordion">
                    <div class="inherit" data-editable data-name="content[30]">
                        <?php echo $content[8]['body']; ?>
                    </div>
                </button>
                <div class="panel">
                    <div data-editable data-name="content[31]">
                        <?php echo $content[9]['body']; ?>
                    </div>
                </div>
                <button class="accordion">
                    <div data-editable data-name="content[32]">
                        <?php echo $content[10]['body']; ?>
                    </div>
                </button>
                <div class="panel">
                    <div data-editable data-name="content[33]">
                        <?php echo $content[11]['body']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .inherit{
        display: inherit;
    }
</style>
