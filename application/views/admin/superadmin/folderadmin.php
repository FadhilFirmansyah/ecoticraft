<?php foreach ($css as $key) { ?>
    <link rel="stylesheet" href="<?= $key ?>">
<?php } ?>


<div class="title-wrap">
    <h1 class="title-content"><?= $title_form ?></h1>
    <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>

<div class="table-div">
    <form loadTo="#folderadminBtn" id="form-ajax" method="GET" action="/api/admin/delimg" isDanger="true">
        <table class="product">

            <thead>
                <tr>
                    <th>
                        <label class="label-checkbox">
                            <input type="checkbox" id="checkbox-input-main">
                            <span class="checkmark"></span>
                            Nama
                        </label>
                    </th>
                    <th>Gambar</th>
                    <th>Ukuran</th>
                </tr>
            </thead>

            <tbody id="product-list">

                <tr>
                    <td colspan="7" class="btn-more"><button type="button">Product Image</button></td>
                </tr>

                <?php
                $directory = FCPATH . 'assets/products/';
                $files = scandir($directory);

                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

                foreach ($files as $file) {
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);


                    if (in_array(strtolower($file_extension), $allowed_extensions)) {
                        $file_size = filesize($directory . $file);
                        $file_size_kb = round($file_size / 1024, 2); ?>
                        <tr>
                            <td>
                                <label class="label-checkbox">
                                    <input class="checkbox-input" type="checkbox" name="umkm_ids[]" value="<?= $file ?>">
                                    <span class="checkmark"></span>
                                    <?= $file ?>
                                </label>
                            </td>
                            <td><img src='<?= base_url('assets/products/' . $file) ?>' title='<?= $file ?>' /></td>
                            <td><?= $file_size_kb ?> KB</td>
                        </tr>
                <?php }
                } ?>

                <tr>
                    <td colspan="7" class="btn-more"><button type="button">UMKM Image</button></td>
                </tr>

                <?php
                $directory = FCPATH . 'assets/umkm/';
                $files = scandir($directory);

                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

                foreach ($files as $file) {
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);


                    if (in_array(strtolower($file_extension), $allowed_extensions)) {
                        $file_size = filesize($directory . $file);
                        $file_size_kb = round($file_size / 1024, 2); ?>
                        <tr>
                            <td>
                                <label class="label-checkbox">
                                    <input class="checkbox-input" type="checkbox" name="umkm_ids[]" value="<?= $file ?>">
                                    <span class="checkmark"></span>
                                    <?= $file ?>
                                </label>
                            </td>
                            <td><img src='<?= base_url('assets/umkm/' . $file) ?>' title='<?= $file ?>' /></td>
                            <td><?= $file_size_kb ?> KB</td>
                        </tr>
                <?php }
                } ?>

                <?php
                $directory = FCPATH . 'assets/umkm/produk_lain';
                $files = scandir($directory);

                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

                foreach ($files as $file) {
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);


                    if (in_array(strtolower($file_extension), $allowed_extensions)) {
                        $file_size = filesize($directory . $file);
                        $file_size_kb = round($file_size / 1024, 2); ?>
                        <tr>
                            <td>
                                <label class="label-checkbox">
                                    <input class="checkbox-input" type="checkbox" name="umkm_ids[]" value="<?= $file ?>">
                                    <span class="checkmark"></span>
                                    <?= $file ?>
                                </label>
                            </td>
                            <td><img src='<?= base_url('assets/umkm/produk_lain' . $file) ?>' title='<?= $file ?>' /></td>
                            <td><?= $file_size_kb ?> KB</td>
                        </tr>
                <?php }
                } ?>

            </tbody>

        </table>

        <div class="controller-table">

            <div class="btn-wrap">
                <button disabled contentPopup="Apakah anda yakin ingin menghapus?" titlePopup="Info" id="warning-btn" type="button" class="warning"><i class="fa fa-trash"></i> Hapus</button>
            </div>
        </div>
    </form>

    </table>

</div>



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