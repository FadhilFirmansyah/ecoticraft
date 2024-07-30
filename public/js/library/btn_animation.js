let backbtn = document.getElementById("flow_btn");
let maxVh = window.innerHeight; // ukuran tinggi layar

window.addEventListener('scroll', function () {
    let Ylevel = window.scrollY;

    if(Ylevel > maxVh*0.75){
        backbtn.style.bottom = "5%";
    } else {
        backbtn.style.bottom = "-10%";
    }

})

let socmed = document.getElementById("socmed");

