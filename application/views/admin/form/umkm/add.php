<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">

<!-- FORM ADD UMKM -->
<div class="title-wrap">
    <h1 class="title-content"><?= $title_form ?></h1>
    <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>


<form loadTo="#umkmBtn" id="form-ajax" action="/api/addumkm" class="admin-form" method="POST" enctype="multipart/form-data" isDanger="false">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="input-group-wrap">

        <div class="input-group">
            <label class="label-form" for="judul">Judul <span>*</span></label>
            <input placeholder="Wajib diisi" class="input-form" type="text" name="judul" id="judul" required>
        </div>

        <div class="input-group">
            <label class="label-form" for="umkm">Pemilik <span>*</span></label>
            <input placeholder="Wajib diisi" class="input-form" type="text" name="pemilik" id="pemilik" required>
        </div>

        <div class="input-group">
            <label class="label-form" for="alamat_singkat">Alamat Singkat <span>*</span></label>
            <input placeholder="Wajib diisi" class="input-form" type="text" name="alamat_singkat" id="alamat_singkat" required>
        </div>

        <div class="input-group">
            <label class="label-form" for="alamat_lengkap">Alamat Lengkap</label>
            <input placeholder="Opsional" class="input-form" type="text" name="alamat_lengkap" id="alamat_lengkap">
        </div>

        <div class="input-group">
            <label class="label-form" for="no_telp">No. Telp <span>*</span></label>
            <input placeholder="Wajib diisi" class="input-form" type="text" name="no_telp" id="no_telp" required>
        </div>

        <div class="input-group" id="drop-area">
            <label for="fileElem">Gambar Utama <span>*</span></label>
            <p class="info">Pilih 1 gambar</p>
            <input name="gambar" type="file" id="fileElem" accept="image/*" style="display:none">
            <button class="button-primary" type="button" id="chooseImg">Pilih gambar</button>
            <div id="preview-img" class="preview-img"></div>
        </div>

        <div class="input-group">
            <label class="label-form" for="maps">Link Maps</label>
            <input placeholder="Opsional" class="input-form" type="text" name="maps" id="maps">
        </div>

        <div class="input-group">
            <label class="label-form" for="link">Link Lain</label>
            <input placeholder="Opsional" class="input-form" type="link" name="link" id="link">
        </div>

        <div class="input-group">
            <label class="label-form" for="deskripsi">Deskripsi</label>
            <textarea placeholder="Opsional" name="deskripsi" id="deskripsi"></textarea>
        </div>



        <div class="input-group">
            <label>Produk Lain</label>
            <p class="info">Jika ada produk lain yang ingin ditampilkan, isikan form di bawah</p>
            <p class="info">Klik tanda <b>+</b> untuk menambahkan produk lain</p>

            <div id="multi-preview-img" class="preview-img"></div>
            <div class="variant-input" id="variant-input" variant="umkm">
                <div class="variant variant-type2">
                    <input type="text" name="judul_variant[]" placeholder="Judul Produk">
                    <textarea name="deskripsi_variant[]" placeholder="Deskripsi Produk"></textarea>
                    <input type="number" name="harga_variant[]" placeholder="Harga Produk">

                    <input name="gambar_variant[]" class="fileElem" type="file" accept="image/*" style="display:none">
                    <button class="button-primary chooseImg" type="button">Pilih gambar</button>
                    
                    <button type="button" class="variant-btn add-var">+</button>
                </div>
            </div>

        </div>




    </div>

    <div class="controller">
        <div class="button-group">
            <button type="reset" class="second">Reset Input</button>
            <button type="submit" class="primary">Tambahkan</button>
        </div>
    </div>


</form>

<div class="popup-wrap" id="popup-wrap">
    <div class="box" id="box-popup">
        <h2 id="title-popup"></h2>
        <div id="content-popup"></div>
        <div id="option-popup">
            <button class="warning" id="cancel-btn" type="button">Tidak</button>
            <button class="normal" type="submit">Ya</button>
        </div>
    </div>
</div>