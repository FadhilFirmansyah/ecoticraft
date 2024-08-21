var header_navbar = document.getElementById("header-navbar");
var navbar = document.getElementById("navbar");
var back_modal = document.getElementById("back-modal");
var icon_menu = document.getElementById("icon-menu");
var tulisan_tutup = document.getElementById("tulisan-tutup");

icon_menu.addEventListener('click', function () {
    navbar.style.transform = 'translateX(0)';
    back_modal.style.transform = 'translateX(0)';
    // navbar.style.display = 'block';
    // back_modal.style.display = 'block';
});
tulisan_tutup.addEventListener('click', function () {
    navbar.style.transform = 'translateX(100%)';
    back_modal.style.transform = 'translateX(200%)';
    // navbar.style.display = 'none';
    // back_modal.style.display = 'none';
});

window.onclick = function (event) {
    if (event.target == back_modal) {
        navbar.style.transform = 'translateX(100%)';
        back_modal.style.transform = 'translateX(200%)';
        // navbar.style.display = 'none'
        // back_modal.style.display = 'none';
    }
}

window.addEventListener('resize', function () {
    if (screen.width > 450) {
        navbar.removeAttribute('style');
        back_modal.removeAttribute('style');
    }
})




let lastScrollTop = 0; // Inisialisasi posisi scroll sebelumnya

window.addEventListener("scroll", function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (window.getComputedStyle(navbar).display == 'none' || screen.width >= 450) {
        if (scrollTop > lastScrollTop) {
            // Scroll ke bawah
            header_navbar.style.transform = 'translateY(-75px)';
        } else {
            // Scroll ke atas
            header_navbar.style.transform = 'translateY(0)';
        }
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Untuk menghindari nilai negatif
});
