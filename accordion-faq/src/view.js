document.addEventListener("DOMContentLoaded", function() {
    const triggers = document.querySelectorAll('.faq-question-trigger');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const item = this.closest('.faq-item');
            const content = item.querySelector('.faq-answer-content');
            const isOpen = item.classList.contains('faq-open');

            // Opcjonalnie: zamknij inne
            document.querySelectorAll('.faq-item').forEach(el => {
                el.classList.remove('faq-open');
                el.querySelector('.faq-answer-content').style.display = 'none';
            });

            if (!isOpen) {
                item.classList.add('faq-open');
                content.style.display = 'block';
            }
        });
    });
});