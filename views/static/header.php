<?php
if(LOGGED_IN){
    ?>

    <div class="backup">
        <i id="backupEdit" class="fa fa-history fa-2x circle-icon backupBut"></i>
        <i id="backupSave" class="fa fa-check fa-2x circle-icon backupBut options"></i>
        <i id="backupCancel" class="fa fa-times fa-2x circle-icon backupBut options"></i>

</div>
<?php
}
?>

<style>

    .circle-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        vertical-align: middle;
        color: white;
    }

    .backup{
        position: fixed;
        right: 2%;
        top: 2%;
        z-index: 99999;
    }

    .options{
        display: none;
    }
    .backupBut:hover{
        cursor: pointer;
    }

    #backupEdit{
        background-color: orange;
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
                    ?><li class="item"><a href="admin" class="button">Admin</a></li><?php
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
