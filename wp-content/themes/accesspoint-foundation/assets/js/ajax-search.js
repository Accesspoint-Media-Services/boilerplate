document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('blog-search-input');
    const container = document.querySelector('.blog__archive--inner');

    if (!input || !container || typeof ajaxSearchData === 'undefined') {
        return;
    }

    let debounceTimer;
    let controller;

    const runSearch = async (term) => {
        if (controller) {
            controller.abort();
        }

        controller = new AbortController();

        const formData = new FormData();
        formData.append('action', 'ajax_search_posts');
        formData.append('nonce', ajaxSearchData.nonce);
        formData.append('term', term);

        container.classList.add('is-loading');

        try {
            const response = await fetch(ajaxSearchData.ajax_url, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin',
                signal: controller.signal,
            });

            if (!response.ok) {
                throw new Error(`HTTP error: ${response.status}`);
            }

            const data = await response.json();

            if (data.success) {
                container.innerHTML = data.data.html;
            }
        } catch (error) {
            if (error.name !== 'AbortError') {
                console.error('Search request failed:', error);
            }
        } finally {
            container.classList.remove('is-loading');
        }
    };

    input.addEventListener('input', (event) => {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            runSearch(event.target.value.trim());
        }, 300);
    });
});