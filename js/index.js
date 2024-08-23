// SISTEM PARALLAX

let hero_index = document.getElementById("hero-index");

let maskot_wrap = document.getElementById("maskot-wrap");

let header_comp = document.getElementsByClassName('header-bg-component')[0];
let title_hero_wrap = document.getElementsByClassName('title-hero-wrap')[0];

let circle_sh = document.getElementById('circle-sub-hero');
let text_sh = document.getElementById('text-sub-hero');

let product_sect = document.getElementById("product_sect");
let card_wraps = document.getElementsByClassName("products-wrap");
let umkm_wraps = document.getElementsByClassName("card-umkm-wrap");



let maxVh = window.innerHeight; // ukuran maksimal dari sebuah device

window.addEventListener('load', function () {
    circle_sh.style.transform = "translateX(-350px)";
    text_sh.style.transform = "translateX(312px)";
});

window.addEventListener('scroll', function () {
    let Ylevel = window.scrollY;

    // TULISAN DI HERO
    if (Ylevel > 150) {
        title_hero_wrap.style.left = `${((Ylevel * 1.05) + (-50))}px`;
    } else {
        title_hero_wrap.style.left = 'auto';
    }


    // TULISAN DI ABOUT ECENG GONDOK
    if (Ylevel > (maxVh * 0.75)) {
        hero_index.style.transform = `translateY(-${maxVh}px)`;
        maskot_wrap.style.opacity = '0';

        circle_sh.style.transform = "translateX(0)";
        text_sh.style.transform = "translateX(0)";
        
        circle_sh.style.opacity = "1";
        text_sh.style.opacity = "1";
    } else {
        hero_index.style.transform = `translateY(0px)`;
        maskot_wrap.style.opacity = '1';

        circle_sh.style.transform = "translateX(-350px)";
        text_sh.style.transform = "translateX(312px)";

        circle_sh.style.opacity = "0";
        text_sh.style.opacity = "0";
    }

})

// END OF SISTEM PARALLAX



// ==== QUERY PRODUCTS DATA ==== //
fetch('https://haydar-hilmy.github.io/ecoticraft/products-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        let idx = 0;
        Array.from(card_wraps).forEach(card_wrap => {
            let products = data[idx];
            let isStop = 0;
            products.forEach(product => {
                if (isStop < 3) {
                    const getHarga = new Intl.NumberFormat("id", {
                        style: "currency",
                        currency: "IDR",
                        maximumFractionDigits: 0,
                    }).format(product.harga);
                    let card = `                
                    <div class="card-product">
                    <a href="https://shopee.co.id/cikidul07" target='_self'>
                <div style="background-image: url('assets/products/${product.gambar}');" class="img-product"></div>
                <div class="title-product">
                    <span>
                        <h4>${product.nama}</h4>
                        <h5>${product.sub_nama}</h5>
                    </span>
                    <span>
                        <h4>${getHarga}</h4>
                    </span>
                </div>
                </a>
                </div>
                `;
                    card_wrap.insertAdjacentHTML('beforeend', card); // Tambahkan elemen ke dalam 'card_wrap'
                    isStop++;
                }
            });
            idx++;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });

// END OF PRODUCTS DATA


// ==== QUERY UMKM DATA ==== //

fetch('https://haydar-hilmy.github.io/ecoticraft/umkm-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(datas => {
        let idx = 0;
        Array.from(umkm_wraps).forEach(umkm_wrap => {
            for (let i = 0; i < 3; i++) {
                let card = `
                        <div class="card-product">
                        <div style="background-image: url('assets/umkm/${datas[idx].gambar}');" class="img-product"></div>
                        <div class="title-product">
                        <span>
                        <h4>${datas[idx].judul}</h4>
                        <h5>${datas[idx].alamat_singkat}</h5>
                        </span>
                        </div>
                        </div>`;
                umkm_wrap.insertAdjacentHTML('beforeend', card);
                idx++;
            }
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
// END OF UMKM DATA
