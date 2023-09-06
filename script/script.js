function toggleMenu() {
  var navbar = document.getElementById("myNavbar");
  if (navbar.className === "navbar") {
    navbar.className += " responsive";
  } else {
    navbar.className = "navbar";
  }
}



var slides = document.querySelectorAll('.slide');
var prevBtn = document.getElementById('prevBtn');
var nextBtn = document.getElementById('nextBtn');
var currentSlide = 0;

function showSlide(n) {
  slides[currentSlide].className = 'slide';
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].className = 'slide active';
  slides[(currentSlide + 1) % slides.length].className = 'slide next';
  slides[(currentSlide - 1 + slides.length) % slides.length].className = 'slide prev';
}

document.addEventListener('DOMContentLoaded', function () {
  showSlide(currentSlide);
});

prevBtn.addEventListener('click', function () {
  showSlide(currentSlide - 1);
});

nextBtn.addEventListener('click', function () {
  showSlide(currentSlide + 1);
});








