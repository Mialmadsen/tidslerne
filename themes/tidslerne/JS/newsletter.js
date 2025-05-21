
document.addEventListener('DOMContentLoaded', function () {
    const button = document.querySelector('.newsletter-trigger'); 
    const modal = document.getElementById('newsletter-popup');
    const closeBtn = document.querySelector('.close-button');

    if (button && modal) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            modal.style.display = 'block';
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    }

    
    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
