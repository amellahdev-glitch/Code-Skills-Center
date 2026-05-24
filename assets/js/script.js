const mobileMenu = document.getElementById('mobile-menu');
const navLinks = document.querySelector('.nav-links');

mobileMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function switchModal(currentModalId, targetModalId) {
    closeModal(currentModalId);
    openModal(targetModalId);
}
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
// Dynamic Course Filtering
// function filterCourses(category) {
//     const cards = document.querySelectorAll('.course-card');
//     const buttons = document.querySelectorAll('.tab-btn');
    
//     // Update active tab button look
//     buttons.forEach(btn => btn.classList.remove('active'));
//     event.target.classList.add('active');

//     // Filter Logic
//     cards.forEach(card => {
//         if (category === 'all') {
//             card.style.display = 'block';
//         } else if (card.classList.contains(category)) {
//             card.style.display = 'block';
//         } else {
//             card.style.display = 'none';
//         }
//     });
// }
