<?php
if(LOGGED_IN){
    ?>
<div class="backup">
    <button class="backupBut" id="backupEdit"></button>
    <button class="backupBut options" id="backupSave">✔</button>
    <button class="backupBut options" id="backupCancel">X</button>
</div>
<?php
}
?>

<style>
    .backup{
        position: fixed;
        right: 2%;
        top: 2%;
        z-index: 99999;
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

<div class="menu-desktop">
    <div class="topbar">
        <i class="fas fa-map-marker-alt"></i>
        <span style="font-size: 9pt;">Bergerweg 57, 1816 BN Alkmaar</span>
        <i class="fas fa-phone"></i>
        <span style="font-size: 9pt;">(+31) 06 513 046 51</span>
         <i class="fas fa-envelope"></i>
        <span style="font-size: 9pt;">pedicurepraktijksol@gmail.com</span>
    </div>
    <nav class="desktop-menu" id="navbar">
        <div id="logo">
            <a href="home">
                 <img src="img/logo.svg">
            </a>
        </div>
        <ul id="shrink">
            <li class="item"><a href="home" class="desktop-item">Home</a></li>
            <li class="item"><a href="about" class="desktop-item">Over Mij</a></li>
            <li class="item"><a href="behandelingen" class="desktop-item">Behandelingen</a></li>
            <li class="item"><a href="tips" class="desktop-item">Tips</a></li>
            <li class="item"><a href="tarieven" class="desktop-item">Tarieven</a></li>
            <li class="item"><a href="contact" class="desktop-item">Contact</a></li>
            <li class="item"><a href="" class="button">afspraak maken</a></li>
            <?php
                if(LOGGED_IN){
                    ?><li class="item" style="background-color: lightgrey;"><a href="admin" class="desktop-item">Admin</a></li><?php
                }
            ?>
        </ul>
    </nav>
</div>

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
            <li><a href="tips">Tips</a></li>
            <li><a href="tarieven">Prijslijst</a></li>
            <li><a href="contact">Contact</a></li>
            <div class="menu-block">
                <a class="menu-links" href="tel:+310651304651">+31 06 513 046 51</a>
                <a class="menu-links" href="mailto:pedicurepraktijksol@gmail.com" style="color: #5abeaf; font-size: 20px;">pedicurepraktijksol@gmail.com
                </a>
            </div>
        </ul>
    </div>
</div>
