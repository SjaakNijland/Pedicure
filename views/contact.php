<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'contact%'")->fetchAll(PDO::FETCH_ASSOC);
array_unshift($content, "");

//var_dump($content);

?>

<div data-editable data-name="content[10]">
    <?php echo $content[1]['body'] ?>
</div>
<hr>
<hr>
<br>
<div></div>
<div></div>
<div></div>

<div data-editable data-name="content[11]">
    <?php echo $content[2]['body'] ?>
</div>

<style>
    .backup-option:checked{
        background-color: lightgrey;
    }
</style>