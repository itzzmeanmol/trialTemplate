// localStorage.setItem('color', "red") //set the value to the checkbox's value
var body1 = document.querySelector('#template1-header');
var body2 = document.querySelector('.sidenav');
var kids = document.getElementById('color-selector').children;
body1.style.backgroundColor = localStorage.getItem('color');
body2.style.backgroundColor = localStorage.getItem('color');


console.log(kids);

function toggle(el) {
    el.className = localStorage.getItem('highlight');

    for (var i = 0; i < kids.length; i++) {
        kids[i].className = "spn2";

    }
    el.className = "spn1";



    var clr = window.getComputedStyle(el, null).getPropertyValue("background-color");
    body1.style.backgroundColor = clr;
    body2.style.backgroundColor = clr;
    localStorage.setItem('highlight', el.className);
    localStorage.setItem('color', clr) //set the value to the checkbox's value


}