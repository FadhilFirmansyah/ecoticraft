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
            products.forEach(product => {
                const getHarga = new Intl.NumberFormat("id", {
                    style: "currency",
                    currency: "IDR",
                    maximumFractionDigits: 0,
                }).format(product.harga);
                let card = `                
                <div class="card-product">
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
                <div class="option-product">
                    <a href="${product.link}" target="_blank"><button>LIHAT PRODUK</button></a>
                </div>
            </div>`;
                card_wrap.insertAdjacentHTML('beforeend', card); // Tambahkan elemen ke dalam 'card_wrap'
            });
            idx++;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });