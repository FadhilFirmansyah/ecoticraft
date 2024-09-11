<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">

<div class="title-wrap">
  <h1 class="title-content">Produk</h1>
  <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>

<section class="main-section">

  <div class="table-div">
    <h4>Daftar Produk</h4>
    <table class="product">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Bahan</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Variasi</th>
          <th>Gambar</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>1</td>
          <td>Keranjang Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Keranjang anyaman yang terbuat dari eceng gondok, kuat dan ramah lingkungan.</td>
          <td>Rp150.000</td>
          <td>S, M, L</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>

        <tr>
          <td>2</td>
          <td>Tas Tangan Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Tas tangan elegan dari anyaman eceng gondok, cocok untuk sehari-hari.</td>
          <td>Rp250.000</td>
          <td>M, L</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>

        <tr>
          <td>3</td>
          <td>Dompet Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Dompet kecil yang simpel dan stylish, terbuat dari bahan alami.</td>
          <td>Rp80.000</td>
          <td>S</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>

        <tr>
          <td>4</td>
          <td>Topi Pantai Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Topi pantai lebar yang terbuat dari bahan eceng gondok, melindungi dari sinar matahari.</td>
          <td>Rp100.000</td>
          <td>L</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>

        <tr>
          <td>5</td>
          <td>Vas Bunga Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Vas bunga minimalis dengan tekstur alami eceng gondok.</td>
          <td>Rp120.000</td>
          <td>S, M</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>

        <tr>
          <td>6</td>
          <td>Alas Piring Eceng Gondok</td>
          <td>Eceng Gondok</td>
          <td>Alas piring unik yang terbuat dari eceng gondok, tahan lama dan ramah lingkungan.</td>
          <td>Rp60.000</td>
          <td>M</td>
          <td>asasas asas</td>
          <td><a href="#">Link Produk</a></td>
        </tr>


      </tbody>
    </table>
  </div>

</section>


<script>
  //   var quill = new Quill('#editor', {
  //     theme: 'snow',
  //     modules: {
  //       toolbar: [
  //         [{ 'header': [1, 2, false] }],
  //         ['bold', 'italic', 'underline'],
  //         ['link', 'blockquote', 'code-block'],
  //         [{ 'list': 'ordered'}, { 'list': 'bullet' }]
  //       ]
  //     }
  //   });
  // document.getElementById('submit').addEventListener('click', function() {
  //   var editorContent = quill.root.innerHTML; // Ambil konten dalam bentuk HTML
  //   console.log(editorContent);
  // });
</script>