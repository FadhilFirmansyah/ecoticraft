let btn = document.getElementById("flow_btn");
let maxVh = window.innerHeight; // ukuran tinggi layar

window.addEventListener('scroll', function () {
    let Ylevel = window.scrollY;

    if(Ylevel > maxVh*0.75){
        btn.style.bottom = "5%";
    } else {
        btn.style.bottom = "-10%";
    }

})