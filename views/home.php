<?php
$content = $pdo->query("SELECT * FROM content WHERE name LIKE 'home%'")->fetchAll();
?>
<div class="home">
    <br>
    <br>
    <div class="grid-container">
        <div class="grid-item">
            <div data-editable data-name="home-2">
                <?php echo $content[1]['body'] ?>
            </div>
        </div>
        <div class="grid-item">
            <div data-editable data-name="home-3">
                <?php echo $content[2]['body'] ?>
            </div>
        </div>
        <div class="grid-item">
            <div data-editable data-name="home-4">
                <?php echo $content[3]['body'] ?>
            </div>
        </div>
    </div>
    <br>
    <div data-editable data-name="home-5">
        <?php echo $content[4]['body'] ?>
    </div>
    <br>

    <div style="width: 100%; background-color: lightgreen; padding: 30px 0 30px 0px; text-align: center; font-size: 140%">
        <div data-editable data-name="home-6">
            <?php echo $content[5]['body'] ?>
        </div>
    </div>

    <div data-editable data-name="home-1">
        <?php echo $content[0]['body'] ?>
    </div>
    <select>
        <option>Een</option>
        <option>twee</option>
        <option>drie</option>
    </select>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>


<style>
    .home{
        width: 80%;
        margin: 0 auto;
    }
    .grid-container {
        display: grid;
        grid-gap: 5px;
        grid-template-columns: auto auto auto;
        background-color: lightgreen;
        padding: 2px;
    }

    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 20px;
        /*font-size: 30px;*/
        text-align: center;
    }
</style>