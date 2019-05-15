<div class="backup">
    <button class="backupBut" id="backupEdit"></button>
    <button class="backupBut options" id="backupSave"></button>
    <button class="backupBut options" id="backupCancel"></button>
</div>
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
<div class="menu">
    <div class="menu_logo">
        <img src="img/logo.svg">
    </div>
    <div class="menu_items">
        <i id="menu-icon" class="fas fa-bars menu_hamburg"></i>
    </div>
    <div class="menu_mobile">
        <ul>
            <li><a href="" class="item">Home</a></li>
            <li><a href="">Behandelingen</a></li>
            <li><a href="">Tips</a></li>
            <li><a href="">Prijslijst</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>
</div>
