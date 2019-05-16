//var acc = document.getElementsByClassName("accordion");
//var i;
//
//for (i = 0; i < acc.length; i++) {
//  acc[i].addEventListener("click", function() {
//    this.classList.toggle("active");
//    var panel = this.nextElementSibling;
//    if (panel.style.maxHeight){
//      panel.style.maxHeight = null;
//    } else {
//      panel.style.maxHeight = panel.scrollHeight + "px";
//    }
//  });
//}

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
    console.log(panel);
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
  if ((i+1) == acc.length){
//            console.log('ez');
    acc[i].style.borderRadius = "0 0 10px 10px";
  }
}
