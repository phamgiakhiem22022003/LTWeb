const header = document.querySelector('header');

function fixedNavbar() {
    header.classList.toggle('scrolled', window.pageYOffset > 0); 
}


fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menuBtn = document.querySelector('#menu-btn'); // Fixed: Use menuBtn instead of menu

menuBtn.addEventListener('click', function() {
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
});

let userBtn = document.querySelector('#user-btn');

userBtn.addEventListener('click', function() {
    let userBox = document.querySelector('.profile-detail'); // Fixed: Added '.' before 'profile-detail'
    userBox.classList.toggle('active');
});

// Close dropdown when clicking outside
window.addEventListener('click', function(event) {
    if (!userBtn.contains(event.target) && !userBox.contains(event.target)) {
        userBox.classList.remove('active');
    }
});
