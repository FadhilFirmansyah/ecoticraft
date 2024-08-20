document.addEventListener("DOMContentLoaded", function () {
    let carousel = document.querySelector(".carousel");
    let items = carousel.querySelectorAll(".item");
    let dotsContainer = document.querySelector(".dots");
    let currentIndex = 0;
    let intervalId;
  
    // Insert dots into the DOM
    items.forEach((_, index) => {
      let dot = document.createElement("span");
      dot.classList.add("dot");
      if (index === 0) dot.classList.add("active");
      dot.dataset.index = index;
      dotsContainer.appendChild(dot);
    });
  
    let dots = document.querySelectorAll(".dot");
  
    // Function to show a specific item
    function showItem(index) {
      items.forEach((item, idx) => {
        item.classList.remove("active");
        dots[idx].classList.remove("active");
        if (idx === index) {
          item.classList.add("active");
          dots[idx].classList.add("active");
        }
      });
      currentIndex = index;
    }
  
    // Event listeners for buttons
    document.querySelector(".prev").addEventListener("click", () => {
      showItem((currentIndex - 1 + items.length) % items.length);
    });
  
    document.querySelector(".next").addEventListener("click", () => {
      showItem((currentIndex + 1) % items.length);
    });
  
    // Event listeners for dots
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        let index = parseInt(dot.dataset.index);
        showItem(index);
      });
    });
  
    // Function to automatically switch slides every 5 seconds
    function autoSlide() {
      intervalId = setInterval(() => {
        showItem((currentIndex + 1) % items.length);
      }, 5000);
    }
  
    // Start auto sliding
    showItem((currentIndex + 1) % items.length);
    autoSlide();
  
    // Pause auto sliding when hovering over the carousel
    carousel.addEventListener("mouseenter", () => {
      clearInterval(intervalId);
    });
  
    // Resume auto sliding when leaving the carousel
    carousel.addEventListener("mouseleave", () => {
      autoSlide();
    });
  });