const mode_hitam = document.getElementById('theme');
mode_hitam.addEventListener('click', function() {
    if (!document.body.classList.contains('dark')) {
        document.body.classList.add('dark');
    }
    else {
        document.body.classList.remove('dark');
    }
});

const aboutLink = document.getElementById('about');
aboutLink.addEventListener('click', function() {
    document.location.href = 'about.html';
});

const contactLink = document.getElementById('contact');
contactLink.addEventListener('click', function() {
    alert('Sedang dalam pengembangan');
});

const hamburger = document.getElementById('hamburger');
const menu = document.getElementById('menu');

hamburger.addEventListener('click', function() {
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        menu.style.display = 'flex';
    } else {
        menu.style.display = 'none';
    }
});

if (window.innerWidth < 768) {
    menu.style.display = 'block';
} else {
    menu.style.display = 'none';
}