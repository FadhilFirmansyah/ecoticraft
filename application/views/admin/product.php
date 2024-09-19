<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">


<div class="title-wrap">
  <h1 class="title-content">Produk</h1>
  <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>

<section class="main-section">

  <div class="table-div">
    <h4>Daftar Produk</h4>
    <form loadTo="#productBtn" id="form-ajax" method="GET" action="/api/delproduct" isDanger="true">
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
            <th>Bahan</th>
            <th>Deskripsi</th>
            <th>Variasi</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody id="product-list">

          <?php foreach ($getAllProductVariasi as $p) { ?>
            <tr>
              <td>
                <label class="label-checkbox">
                  <input class="checkbox-input" type="checkbox" name="product_ids[]" value="<?= $p['id'] ?>">
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


        </tbody>

        <tfoot>
          <tr>
            <td colspan="5" class="btn-more"><button loadMoreData="getallproduct" loadDataLimit="10" id="load-more-btn" type="button">Load more</button></td>
          </tr>
        </tfoot>

      </table>

      <div class="controller-table">

        <div class="btn-wrap">
          <button type="button" formGetPost="POST" openform="product/add" class="primary open-form"><i class="fa fa-plus"></i> Tambah Produk</button>
        </div>

        <div class="btn-wrap">
          <button disabled contentPopup="Apakah anda yakin ingin menghapus?" titlePopup="Info" id="warning-btn" type="button" class="warning"><i class="fa fa-trash"></i> Hapus</button>
          <button disabled openform="product/edit" formGetPost="POST" id="edit-btn" type="button" class="normal open-form"><i class="fa fa-pencil"></i> Edit</button>
        </div>
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


    </form>
  </div>


</section>