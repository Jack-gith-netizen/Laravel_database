document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.getElementById('header-menu');

    menuToggle.addEventListener('click', function () {
        const isExpanded = this.getAttribute('aria-expanded') === 'true'; 
        menu.classList.toggle('show');
        this.setAttribute('aria-expanded', !isExpanded);
    });
});

window.addEventListener('scroll', function () {
    const header = document.querySelector('.site-header');
    const scrollPosition = window.scrollY;
    if (scrollPosition > 200) {
      header.style.top = '0';
    } else {
      header.style.top = '-200px';
    }
  });