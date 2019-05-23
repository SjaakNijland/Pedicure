$(document).ready(function(){
    window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    document.getElementById("shrink").style.margin = "5px";
    document.getElementById("logo").style.padding = "0px";

  } else {
    document.getElementById("shrink").style.margin = "16px 0 16px 0";
    document.getElementById("logo").style.paddingTop = "10px";
    navbar.classList.remove("sticky");
  }
}
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


$(document).ready(function() {
  $(window).scroll(function() {
    if($(document).scrollTop() > 10) {
    $('#nav').addClass('shrink');
        }
     else {
    $('#nav').removeClass('shrink');
    }
  });
});
