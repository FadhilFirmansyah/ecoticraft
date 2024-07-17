// SISTEM PARALLAX

let header_comp = document.getElementsByClassName('header-bg-component')[0];
let title_hero_wrap = document.getElementsByClassName('title-hero-wrap')[0];

let circle_sh = document.getElementById('circle-sub-hero');
let text_sh = document.getElementById('text-sub-hero');

let product_sect = document.getElementById("product_sect");
let card_wraps = document.getElementsByClassName("products-wrap");


let maxVh = window.innerHeight; // ukuran maksimal dari sebuah device

window.addEventListener('load', function () {
    circle_sh.style.transform = "translateX(-350px)";
    text_sh.style.transform = "translateX(200px)";
});

window.addEventListener('scroll', function () {
    let Ylevel = window.scrollY;
    if (Ylevel > 150) {
        title_hero_wrap.style.left = `${((Ylevel * 1.05) + (-50))}px`;
    } else {
        title_hero_wrap.style.left = 'auto';
    }


    if (Ylevel > (maxVh / 2)) {
        if (Ylevel <= maxVh) {
            text_sh.style.transform = `translateX(${(Ylevel - maxVh) * (-1)}px)`;
            circle_sh.style.transform = `translateX(${(Ylevel - maxVh)}px)`;
        } else {
            circle_sh.style.transform = "translateX(0)";
            text_sh.style.transform = "translateX(0)";
        }
    }


})





// ==== PRODUCTS DATA ==== //

fetch('https://haydar-hilmy.github.io/ecoticraft/products-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        Array.from(card_wraps).forEach(card_wrap => {
            data.forEach(product => {
                const getHarga = new Intl.NumberFormat("id", {
                    style: "currency",
                    currency: "IDR",
                    maximumFractionDigits: 0,
                }).format(product.harga);
                let card = `
                <div class="card-product">
                    <div style="background-image: url('assets/products/${product.gambar}');" class="img-product"></div>
                    <div class="title-product">
                        <h4>${product.nama}</h4>
                        <h5>${product.sub_nama}</h5>
                    </div>
                    <div class="option-product">
                        <h4>${getHarga}</h4>
                        <a href"${product.link}" target="_blank"><button>BUY</button></a>
                    </div>
                </div>`;
                card_wrap.insertAdjacentHTML('beforeend', card); // Tambahkan elemen ke dalam 'card_wrap'
            });
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });


