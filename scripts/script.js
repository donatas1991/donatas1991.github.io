Fancybox.bind("[data-fancybox]", {
  wheel: "zoom"
});

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  btn = document.querySelector('.scroll-top-btn');
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
}

function scrollToTop() {
  currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
  if (currentScroll > 0) {
    window.requestAnimationFrame(scrollToTop);
    window.scrollTo(0, currentScroll - (currentScroll / 8));
  }
}



