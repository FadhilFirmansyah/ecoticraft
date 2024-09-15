<?php foreach ($getAllProductVariasi as $p) { ?>
    <tr>
        <td>
            <label class="label-checkbox">
                <input class="checkbox-input" type="checkbox" name="product_ids" value="<?= $p['id'] ?>">
                <span class="checkmark"></span>
                <?= $p['nama'] ?>
            </label>
        </td>
        <td><?= $p['bahan'] ?></td>
        <td class="desc"><?= $p['deskripsi'] ?></td>
        <td><?= $p['variasi'] != '' | $p['variasi'] != null ? $p['variasi'] : '-'; ?></td>
        <td><?= $p['harga_range'] != '' | $p['harga_range'] != null ? $p['harga_range'] : '-' ?></td>
    </tr>
<?php } ?>