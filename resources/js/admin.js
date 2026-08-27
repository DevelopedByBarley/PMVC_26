// ZeroDay 2026 – admin felület: aktív menüpont jelölés + toast indítás.
// A layout `defer`-rel tölti be.

(function () {
    /* ---------- Aktív menüpont ---------- */
    const path = window.location.pathname;

    document.querySelectorAll('#adminNavbar .admin-nav-link').forEach((link) => {
        const href = link.getAttribute('href');
        if (!href) return;

        // A /admin/registrations/12 is jelölje az /admin/registrations menüpontot.
        if (path === href || path.startsWith(href + '/')) {
            link.classList.add('active');
        }
    });

    /* ---------- Toast ---------- */
    if (window.bootstrap && window.bootstrap.Toast) {
        document.querySelectorAll('.toast').forEach((element) => {
            window.bootstrap.Toast.getOrCreateInstance(element).show();
        });
    }
})();
