<?php foreach ($getAllUmkm as $p) { ?>
    <tr>
        <td>
            <label class="label-checkbox">
                <input class="checkbox-input" type="checkbox" name="umkm_ids[]" value="<?= $p['id'] ?>">
                <span class="checkmark"></span>
                <?= $p['judul'] ?>
            </label>
        </td>
        <td><?= $p['alamat_singkat'] ?></td>
        <td><?= $p['no_telp'] ?></td>
        <td><?= $p['link'] ?></td>
        <td><?= $p['maps'] ?></td>
        <td><?= $p['pemilik'] ?></td>
        <td class="desc"><?= $p['deskripsi'] ?></td>
    </tr>
<?php } ?>