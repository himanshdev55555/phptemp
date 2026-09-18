        </section>

        <aside class="sidebar">
            <h2>Quick Links</h2>

            <ul>
                <li>
                    <a href="/" data-page="home">Home</a>
                </li>
                <li>
                    <a href="/about" data-page="about">About</a>
                </li>
                <li>
                    <a href="/contact" data-page="contact">Contact</a>
                </li>
            </ul>
        </aside>
    </div>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> My PHP Website</p>
</footer>

<script>
document.addEventListener('click', function (event) {
    const link = event.target.closest('[data-page]');

    if (!link) {
        return;
    }

    event.preventDefault();

    const page = link.dataset.page;

    fetch(`pages/${page}.php`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Page could not be loaded');
            }

            return response.text();
        })
        .then(html => {
            document.querySelector('#page-content').innerHTML = html;

            history.pushState(
                {},
                '',
                link.getAttribute('href')
            );
        })
        .catch(error => {
            document.querySelector('#page-content').innerHTML =
                '<p>Unable to load this page.</p>';

            console.error(error);
        });
});

window.addEventListener('popstate', function () {
    const path = window.location.pathname;

    let page = 'home';

    if (path === '/about') {
        page = 'about';
    } else if (path === '/contact') {
        page = 'contact';
    }

    fetch(`pages/${page}.php`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#page-content').innerHTML = html;
        });
});
</script>

</body>
</html>
