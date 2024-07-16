const product_section = document.getElementsByClassName('products-wrap');
let isDown = false;
let startX;
let scrollLeft;

Array.from(product_section).forEach(slider => {
    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
    });
});



// =========== CAROUSEL ===========

document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.carousel-wrap');
    let currentIndex = 0;

    let totalItem = document.querySelectorAll('.item-carousel').length;

    carousel.style.width = (totalItem * 100) + '%';
  
    function showSlide(index) {
      const slideWidth = document.querySelector('.item-carousel').offsetWidth;
      const newTransformValue = -index * slideWidth;
      carousel.style.transform = `translateX(${newTransformValue}px)`;
      currentIndex = index;
    }
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalItem;
      showSlide(currentIndex);
    }
  
    setInterval(nextSlide, 5000);
  });
  