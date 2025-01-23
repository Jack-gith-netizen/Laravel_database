document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.getElementById('header-menu');

    menuToggle.addEventListener('click', function () {
        const isExpanded = this.getAttribute('aria-expanded') === 'true'; 
        menu.classList.toggle('show');
        this.setAttribute('aria-expanded', !isExpanded);
    });
});
