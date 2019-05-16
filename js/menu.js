$(document).ready(function(){
    $(".menu_items").click(function(){
        if ($('#menu-icon').hasClass('fa-bars')){
            $('#menu-icon').removeClass('fa-bars');
            $('#menu-icon').addClass('fa-times');
            $(".menu_mobile ul").css("display", "block");
            $("#menu-icon").css("color", "#FF8C6C");
        }
        else {
            $('#menu-icon').removeClass('fa-times');
            $('#menu-icon').addClass('fa-bars');
            $(".menu_mobile ul").css("display", "none");
            $("#menu-icon").css("color", "#5ABEAF");
        }
    });
});

//var nav = document.getElementsById('nav');

window.onscroll = function(){
    if (window.pageYOffset >100) {
    nav.style.background = "#ffffff";
    nav.style.boxShadow = "0px 0px 30px 0px #cdcdcd";
  }
  else {
      nav.style.background = "transparent";
      nav.style.boxShadow = "none";
  }
}
