<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuntang Cikidul</title>
    <link rel="stylesheet" type="text/css" href="style/opening.css">
    <link rel="icon" href="assets/Icon moon 1.png" >
</head>
<body>
    <header>
        <a href="#" class="logo">ECOTICRAFT</a>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#profile">Profile</a></li>
            <!-- <li><a href="insert.php">Tambah</a></li>     -->
            <li><a href="view.php">Produk</a></li>
            <li><a href="" class="active">Login</a></li>
        </ul>
    </header>
    <section>
        <img src="assets/stars.png" id="stars">
        
        <img src="assets/moonph.png" id="moon">
        <img src="assets/Morningph.png" id="behind">
        <h2 id="text">EcoMastery</h2>
        <div class="jarak">
        <a href="#home" id="btn">Get Started</a>
        </div>
        <!-- <div class="jarak">
        <a href="insert.php" id="btn">Tambah Produk</a>
        </div> -->
        <!-- <a href="view.php" id="btn2">Tampilkan</a> -->
        
        <img src="assets/phk.png" id="front">
    </section>
    <div class="sec">
        <h2 id="home">ECENG GONDOK CIKIDUL</h2> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, omnis praesentium quis ratione libero eaque amet sunt dignissimos assumenda excepturi? Autem ex amet est voluptate ab illo quo laboriosam officiis?
        Veniam, animi fugit. Qui esse exercitationem nam, repellendus blanditiis debitis voluptates. Nam magni id molestiae ipsum, quas libero? Sunt, nostrum! Obcaecati quasi exercitationem quos delectus ad in repudiandae consequatur molestiae.
        Officiis illum ipsa tempora aliquam hic repellendus adipisci veritatis quidem modi ipsum natus laudantium assumenda at soluta voluptate, dolores excepturi, officia dolore? Itaque reprehenderit fugiat rem incidunt, distinctio molestias minima?
        Eaque itaque ullam ipsam debitis sunt dolore eveniet voluptate magnam? Repellat consectetur ipsum ipsam architecto necessitatibus earum asperiores quas, optio non inventore, a delectus iusto quo, facilis beatae illum cumque!
        Tenetur commodi, explicabo animi repudiandae temporibus quia cum obcaecati porro saepe voluptate vitae. Molestiae, impedit natus incidunt qui facere esse! Nulla excepturi natus ullam incidunt, tenetur veritatis dolore illum voluptatum!</p>
        
        <h2 style="text-align: center; margin-top: 175px;" id="profile">ECOMASTERY</h2> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, omnis praesentium quis ratione libero eaque amet sunt dignissimos assumenda excepturi? Autem ex amet est voluptate ab illo quo laboriosam officiis?
        Veniam, animi fugit. Qui esse exercitationem nam, repellendus blanditiis debitis voluptates. Nam magni id molestiae ipsum, quas libero? Sunt, nostrum! Obcaecati quasi exercitationem quos delectus ad in repudiandae consequatur molestiae.
        Officiis illum ipsa tempora aliquam hic repellendus adipisci veritatis quidem modi ipsum natus laudantium assumenda at soluta voluptate, dolores excepturi, officia dolore? Itaque reprehenderit fugiat rem incidunt, distinctio molestias minima?
        Eaque itaque ullam ipsam debitis sunt dolore eveniet voluptate magnam? Repellat consectetur ipsum ipsam architecto necessitatibus earum asperiores quas, optio non inventore, a delectus iusto quo, facilis beatae illum cumque!
        Tenetur commodi, explicabo animi repudiandae temporibus quia cum obcaecati porro saepe voluptate vitae. Molestiae, impedit natus incidunt qui facere esse! Nulla excepturi natus ullam incidunt, tenetur veritatis dolore illum voluptatum!</p>
    </div>
    <script>
        let stars = document.getElementById('stars');
        let moon = document.getElementById('moon');
        let mountains_behind = document.getElementById('behind');
        let text = document.getElementById('text');
        let btn = document.getElementById('btn');
        let mountains_front = document.getElementById('front');
        let header = document.querySelector('header');

        window.addEventListener('scroll',function(){
            let value = window.scrollY;
            stars.style.left =  value*0.25+'px';
            moon.style.top =  value*1.05+'px';
            behind.style.top =  value*0.5+'px';
            front.style.top =  value*0+'px';
            text.style.marginRight = value*4+'px';
            text.style.marginTop = value*1.5+'px';
            btn.style.marginTop = value*1.5+'px';
            btn2.style.marginTop = value*1.5+'px';
            header.style.top=value*0.5+'px';
        })
    </script>
</body>
</html>