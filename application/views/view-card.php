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


        </section>