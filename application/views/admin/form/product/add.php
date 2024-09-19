<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">


<div class="title-wrap">
    <h1 class="title-content"><?= $title_form ?></h1>
    <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>


<form loadTo="#productBtn" id="form-ajax" action="/api/addproduct" class="admin-form" method="post" enctype="multipart/form-data" isDanger="false">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="input-group-wrap">

        <div class="input-group">
            <label class="label-form" for="nama">Nama Produk <span>*</span></label>
            <input placeholder="Wajib diisi" class="input-form" type="text" name="nama" id="nama" required>
        </div>

        <div class="input-group">
            <label class="label-form" for="bahan">Bahan Produk <span>*</span></label>
            <input value="Eceng Gondok" placeholder="Wajib diisi" class="input-form" type="text" name="bahan" id="nama" required>
        </div>

        <div class="input-group">
            <label class="label-form" for="deskripsi">Deskripsi Produk</label>
            <textarea placeholder="Opsional" name="deskripsi" id="deskripsi"></textarea>
        </div>

        <div class="input-group">
            <label class="label-form" for="link">Link</label>
            <input placeholder="Opsional" class="input-form" type="url" name="link" id="link">
        </div>

        <div class="input-group" id="drop-area">
            <label for="fileElem">Gambar</label>
            <p class="info">Drag and drop your image</p>
            <input name="gambar" type="file" id="fileElem" accept="image/*" style="display:none">
            <button class="button-primary" type="button" id="chooseImg">Pilih gambar</button>
            <div id="preview-img" class="preview-img"></div>
        </div>


        <div class="input-group">
            <label>Variasi</label>
            <p class="info">Klik tanda <b>+</b> untuk menambahkan variasi lain</p>

            <div class="variant-input" id="variant-input" variant="product">
                <div class="variant">
                    <input type="number" name="harga[]" placeholder="Harga">
                    <input type="text" name="variasi[]" placeholder="Nama Variasi">
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