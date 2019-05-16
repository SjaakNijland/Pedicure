<?php
if(LOGGED_IN){
    ?>
<div class="backup">
    <button class="backupBut" id="backupEdit"></button>
    <button class="backupBut options" id="backupSave"></button>
    <button class="backupBut options" id="backupCancel"></button>
</div>
<?php
}
?>

<style>
    .backup{
        position: fixed;
        right: 2%;
        top: 2%;
        z-index: 100;
    }
    .backupBut{
        border: 0;
        border-radius: 50%;
        padding: 20px;
        cursor: pointer;
    }
    .options{
        display: none;
    }
    #backupEdit{
        background-color: yellow;
        display: none;
    }
    #backupSave{
        background-color: green;
        margin-right: 10px;
        float: left;
    }
    #backupCancel{
        background-color: red;
        float: left;
    }
</style>

<div class="menu" id="nav">
    <div class="menu_logo">
        <a href="home"><img src="img/logo.svg"></a>
    </div>
    <div class="menu_items">
        <i id="menu-icon" class="fas fa-bars menu_hamburg"></i>
    </div>
    <div class="menu_mobile">
        <ul>
            <li><a href="home" class="item">Home</a></li>
            <li><a href="behandelingen">Behandelingen</a></li>
            <li><a href="">Tips</a></li>
            <li><a href="">Prijslijst</a></li>
            <li><a href="contact">Contact</a></li>
            <div class="menu-block">
                <a class="menu-links" href="tel:+310651304651">+31 06 513 046 51</a>
                <a class="menu-links" href="mailto:pedicurepraktijksol@gmail.com" style="color: #5abeaf; font-size: 20px;">pedicurepraktijksol@gmail.com
                </a>
            </div>
        </ul>
    </div>
</div>
