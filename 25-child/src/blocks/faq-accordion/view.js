window.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.fz-faq-item');

    accordions.forEach(item => {
        const trigger = item.querySelector('.fz-faq-trigger');
        trigger.addEventListener('click', () => {
            // Zamknij inne (opcjonalnie)
            // accordions.forEach(el => el.classList.remove('is-open')); 

            item.classList.toggle('is-open');
        });
    });
});