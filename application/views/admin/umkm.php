<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">


<div class="title-wrap">
  <h1 class="title-content">UMKM</h1>
  <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>

<section class="main-section">

  <div class="table-div">
    <h4>Daftar UMKM</h4>
    <form loadTo="#umkmBtn" id="form-ajax" method="GET" action="/api/delumkm" isDanger="true">
      <table class="product">
        <thead>
          <tr>
            <th>
              <label class="label-checkbox">
                <input type="checkbox" id="checkbox-input-main">
                <span class="checkmark"></span>
                Judul
              </label>
            </th>
            <th>Alamat Singkat</th>
            <th>No.Telp</th>
            <th>Link</th>
            <th>Maps</th>
            <th>Pemilik</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody id="product-list">

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
              <td style="word-break: break-all;"><?= $p['link'] ?></td>
              <td><?= $p['maps'] ?></td>
              <td><?= $p['pemilik'] ?></td>
              <td class="desc"><?= $p['deskripsi'] ?></td>
            </tr>
          <?php } ?>


        </tbody>

        <tfoot>
          <tr>
            <td colspan="7" class="btn-more"><button loadMoreData="getallumkm" loadDataLimit="10" id="load-more-btn" type="button">Load more</button></td>
          </tr>
        </tfoot>

      </table>

      <div class="controller-table">

        <div class="btn-wrap">
          <button type="button" openform="umkm/add" class="primary open-form"><i class="fa fa-plus"></i> Tambah UMKM</button>
        </div>

        <div class="btn-wrap">
          <button disabled contentPopup="Apakah anda yakin ingin menghapus?" titlePopup="Info" id="warning-btn" type="button" class="warning"><i class="fa fa-trash"></i> Hapus</button>
          <button disabled openform="umkm/edit" id="edit-btn" type="button" class="normal open-form"><i class="fa fa-pencil"></i> Edit</button>
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