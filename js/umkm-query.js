
let umkm_wraps = document.querySelector(".products-wrap");


fetch('https://haydar-hilmy.github.io/ecoticraft/umkm-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(datas => {
        datas.forEach(data => {
            let card = `
                        <div class="card-product" id="umkm${data.id}">
                        <div style="background-image: url('assets/umkm/${data.gambar}');" class="img-product ${data.gambar == '' ? 'no-img-product' : ''}">${data.gambar == '' ? 'gambar tidak tersedia :(' : ''}</div>
                        <div class="title-product">
                        <span>
                        <h4>${data.judul}</h4>
                        <h5>${data.alamat_lengkap}</h5>
                        <div class="link-option">
                        <a style="${data.no_telp == "" ? "opacity: 0.5;" : ""}" href="https://wa.me/${data.no_telp}" target="_blank">${data.no_telp} <img src="assets/logo/whatsapp.png"></a>
                        <a href="${data.maps}" target="_blank"><img src="assets/logo/gmaps.png"></a>
                        </div>
                        </span>
                        </div>
                        </div>`;
            umkm_wraps.innerHTML += card;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });