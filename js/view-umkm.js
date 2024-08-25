
const urlParams = new URLSearchParams(window.location.search);
const getId = urlParams.get('id');

let main = document.getElementById("main");

let umkm_product = document.getElementById("umkm-product");
let title_umkm_product = document.getElementById("title-umkm-product");
let product_wrap = document.getElementById("product-wrap");

let nama_umkm = "";
let produk_lain = {};

fetch('https://haydar-hilmy.github.io/ecoticraft/umkm-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(datas => {
        const selectedData = datas.find(data => data.id == getId);
        if (selectedData) {
            let card = `
                        <h1>${selectedData.judul}</h1>

        <section class="main-content">
            <div style="background-image: url('assets/umkm/${selectedData.gambar}');" class="img-banner">
            ${selectedData.gambar != "" ? "" : "gambar tidak tersedia :("}
            </div>

            <aside>
                <p>
                    ${selectedData.deskripsi}
                </p>
                <p>
                    ${selectedData.alamat_lengkap}
                </p>
                <h4>
                    ${selectedData.pemilik != "" ? "Oleh " + selectedData.pemilik : ""}
                </h4>

                <div class="link-option">
                    <a href="https://wa.me/${selectedData.no_telp}" target="_blank">${selectedData.no_telp} <img src="assets/logo/whatsapp.png"
                            alt="wa"></a>
                    <a href="${selectedData.maps}"
                        target="_blank">Google Maps <img src="assets/logo/gmaps.png" alt="maps"></a>
                </div>
            </aside>


        </section>`;

            nama_umkm = selectedData.judul;
            if (selectedData.produk_lain && Object.keys(selectedData.produk_lain).length > 0) {
                produk_lain = selectedData.produk_lain;
            }

            main.innerHTML = card;



            umkm_product.style.display = 'none';

            if (Object.keys(produk_lain).length > 0) {
                umkm_product.style.display = 'block';
                title_umkm_product.innerHTML = "Produk " + nama_umkm;

                produk_lain.forEach(data => {
                    let card = `
            <div class="product">
                        <div class="img" style="background-image: url('assets/umkm/${data.gambar}');"></div>
                        <aside>
                            <h4>${data.judul}</h4>
                            <p>${data.deskripsi}</p>
                            <p>${data.harga}</p>
                        </aside>
                    </div>
            `;
                    product_wrap.innerHTML += card;
                });
            }

            document.title = nama_umkm;
            
        } else {
            main.innerHTML = '<p class="not-found"><span>404</span> Not Found >ᴗ<</p>';
            document.title = "404 Not Found";
        }
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });

