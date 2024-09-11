const input = document.querySelectorAll('.input-form');
const label = document.querySelectorAll('.label-form');

for (let i = 0; i < input.length; i++) {
    window.addEventListener('load', function(){
        if (input[i].value != "") {
            label[i].style.transform = "translateY(-100%)";
            label[i].style.opacity = "1";
        }
    })
    input[i].addEventListener('focus', function () {
        label[i].style.transform = "translateY(-100%)";
        label[i].style.opacity = "1";
    })
    input[i].addEventListener('blur', function () {
        if (input[i].value == null || input[i].value == "") {
            label[i].style.transform = "translateY(0)";
            label[i].style.opacity = "0.7";
        }
    })
}