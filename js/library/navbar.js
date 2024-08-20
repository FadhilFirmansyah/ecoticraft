var header_navbar = document.getElementById("header-navbar");
var navbar = document.getElementById("navbar");
var back_modal = document.getElementById("back-modal");
var icon_menu = document.getElementById("icon-menu");
var tulisan_tutup = document.getElementById("tulisan-tutup");

icon_menu.addEventListener('click', function(){
    navbar.style.display = 'block';
    back_modal.style.display = 'block';    
});
tulisan_tutup.addEventListener('click', function(){
    navbar.style.display = 'none';
    back_modal.style.display = 'none';
});

window.addEventListener('resize', function(){
    if(screen.width > 450){
        navbar.removeAttribute('style');
        back_modal.removeAttribute('style');
     }
})

window.onclick = function(event) {
    if (event.target == back_modal) {
        navbar.style.display = 'none'
        back_modal.style.display = 'none';
    }
  }