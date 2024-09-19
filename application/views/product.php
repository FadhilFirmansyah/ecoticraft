<div class="hero">

  <section>

    <div class="title-hero-wrap" id="title-hero-wrap">
      <h2 class="title">
        Produk<br>Kerajinan<br>
        <span>
          ECENG GONDOK
        </span>
      </h2>
      <h3 class="sub-title">
        ━━ TUNTANG ━━
      </h3>
    </div>

    <div class="img-banner" style="background-image: url('assets/background/ganci-nobg.png');"></div>
  </section>

</div>

<section class="grid-photo">

  <section class="justified-grid-gallery">
    <figure style="--width: 640; --height: 520; ">
      <img src="assets/products/tas1.jpg">
    </figure>
    <figure style="--width: 500; --height: 420; ">
      <img src="assets/products/vas-gentong.jpg">
    </figure>
    <figure style="--width: 710; --height: 580; ">
      <img src="assets/products/topi.jpg">
    </figure>
    <figure style="--width: 760; --height: 540; ">
      <img src="assets/products/ganci.jpg">
    </figure>
    <figure style="--width: 690; --height: 570; ">
      <img src="assets/products/tas2.jpg">
    </figure>
    <figure style="--width: 540; --height: 340; ">
      <img src="assets/products/kotak-hantaran.jpg">
    </figure>
    <!-- If you need something fancier, check out https://gridzy.gallery/ -->
  </section>

</section>


<section class="product-section">
  <div class="product-wrap-outer">
    <div class="products-wrap">

    <?php foreach ($getAllProduct as $key) { ?>

      <div class="card-product">
      <div style="background-image: url('assets/products/${product.gambar}');" class="img-product"></div>
      <div class="title-product">
      <span>
      <h4><?= $key['nama'] ?></h4>
      <h5>${product.sub_nama}</h5>
      </span>
      <span>
      <h4>${getHarga}</h4>
      </span>
      </div>
      <div class="option-product">
      <a href="${product.link}" target="_blank"><button>LIHAT PRODUK</button></a>
      </div>
      </div>
      <?php } ?>
      
    </div>
  </div>
</section>


<!-- QUERY STATIC MENGGUNAKAN JSON KE GITHUB PRIBADI -->
<!-- <script src="js/product-query.js"></script> -->