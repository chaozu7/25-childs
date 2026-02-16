document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById('fz-latest-books-loader');
    if (!loader) return;

    const excludeId = loader.getAttribute('data-exclude');

    fetch(`/wp-admin/admin-ajax.php?action=get_latest_books&exclude=${excludeId}`)
        .then(response => response.json())
        .then(res => {
            if (res.success && res.data.length > 0) {
                let html = '<div class="ajax-books-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">';

                res.data.forEach(book => {
                    const imageHtml = book.thumbnail_url ?
                        `<div class="book-thumb" style="margin-bottom:10px;">
                <img src="${book.thumbnail_url}" alt="${book.title}" style="max-width:100%; height:auto; border-radius:4px;">
           </div>` :
                        '';
                    html += `
                         <article class="ajax-book-item" style="border: 1px solid #eee; padding: 15px; border-radius: 8px; display: flex; flex-direction: column;">
            ${imageHtml}
            <h3 style="margin: 0 0 10px 0; font-size: 1.1em;">
                <a href="${book.url}" style="text-decoration:none; color:#333;">${book.title}</a>
            </h3>
            <p style="font-size: 0.8em; color: #777; margin-bottom: 10px;">
                <strong>Date:</strong> ${book.date}<br>
                <strong>Genre:</strong> ${book.genre}
            </p>
            <div class="book-excerpt" style="font-size: 0.85em; line-height: 1.4; color: #444;">
                ${book.excerpt}
            </div>
        </article>`;
                });

                html += '</div>';
                loader.innerHTML = html;
            } else {
                loader.innerHTML = '<p>No other books found.</p>';
            }
        })
        .catch(error => {
            console.error('AJAX Error:', error);
            loader.innerHTML = '<p>Error loading books.</p>';
        });
});