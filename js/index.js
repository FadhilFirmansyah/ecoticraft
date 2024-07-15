// SISTEM PARALLAX

let header_comp = document.getElementsByClassName('header-bg-component')[0];
let title_hero_wrap = document.getElementsByClassName('title-hero-wrap')[0];

let circle_sh = document.getElementById('circle-sub-hero');
let text_sh = document.getElementById('text-sub-hero');

let maxVh = window.innerHeight; // ukuran maksimal dari sebuah device

window.addEventListener('load', function(){
    circle_sh.style.transform = "translateX(-200px)";
    text_sh.style.transform = "translateX(200px)";
});

window.addEventListener('scroll', function() {
    let Ylevel = window.scrollY;
    if(Ylevel > 150){
        title_hero_wrap.style.left = `${((Ylevel * 1.05)+(-50))}px`;
    } else {
        title_hero_wrap.style.left = 'auto';
    }
    if(Ylevel > (maxVh/2)){
        if(Ylevel <= maxVh){
            text_sh.style.transform = `translateX(${(Ylevel-maxVh) * (-1)}px)`;
            circle_sh.style.transform = `translateX(${(Ylevel-maxVh)}px)`;
        } else {
            circle_sh.style.transform = "translateX(0)";
            text_sh.style.transform = "translateX(0)";
        }
    }
})



// DUMMY

let card = `<div class="card-product">

                <div style="background-image: url('assets/products/topi.jpg');" class="img-product"></div>

                <div class="title-product">
                    <h4>Topi</h4>
                    <h5>Eceng Gondok</h5>
                </div>

                <div class="option-product">
                    <h4>Rp. 50.000</h4>
                    <button>BUY</button>
                </div>
            </div>`;
let card_wrap = document.getElementsByClassName("products-wrap")[0];

for(let i = 0; i < 10; i++){
    card_wrap.innerHTML += card;
}