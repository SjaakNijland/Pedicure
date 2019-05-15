<?php
?>

<div class="container">

    <div class="inner">
        <div class="wrapper">
            <button class="accordion">Behandeling met intake (90 minuten)</button>
            <div class="panel">
                <h2>Algehele voetzorging</h2>
                <hr>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipismod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipismod a aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <button class="accordion">Specialistische technieken</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <button class="accordion">Nagels</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

</div>

<style>
    .inner{
        padding: 50px 0 50px 0;
    }
    .wrapper{
        /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
        background-color: transparent;
    }

.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.accordion:first-child{
    border-radius: 10px 10px 0 0;
    /*box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.51);*/

}

.active, .accordion:hover {
    background-color: #ccc;
}

.active{
    border-radius: 0;
}

.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}

    .odd{
        color: white;
        background-color: #5abeaf;
    }
    .odd:after{
        color: white;
    }

</style>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    function isEven(num) {
        return num % 2 === 0;
    }

    for (i = 0; i < acc.length; i++) {
        if(isEven(i)){
            console.log(acc[i]);
//            acc[i].style.backgroundColor = "#5abeaf";
//            acc[i].style.color = "white";
            acc[i].classList.add("odd");
//            acc[i].style.color = "white";
        }
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
        if ((i+1) == acc.length){
            console.log('ez');
            acc[i].style.borderRadius = "0 0 10px 10px";
        }
    }
</script>