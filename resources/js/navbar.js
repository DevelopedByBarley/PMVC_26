// ZeroDay 2026 – navbar: mobil menü, scroll állapot, aktív szekció jelölés.
// A layout `defer`-rel tölti be.

(function () {
    const nav = document.getElementById('zdNavbar');
    const burger = nav.querySelector('.zd-burger');
    const menu = document.getElementById('zdNavMenu');
    const bar = document.getElementById('zdProgressBar');
    const links = [...nav.querySelectorAll('.zd-nav-links a')];

    /* Visszaszámláló a fejlécben */
    const clock = document.querySelector('[data-clock]');

    if (clock) {
        const target = new Date(clock.dataset.target).getTime();
        const done = document.querySelector('[data-clock-done]');
        const out = {
            days: clock.querySelector('[data-clock-unit="days"]'),
            hours: clock.querySelector('[data-clock-unit="hours"]'),
            minutes: clock.querySelector('[data-clock-unit="minutes"]'),
            seconds: clock.querySelector('[data-clock-unit="seconds"]'),
        };
        const pad = n => String(n).padStart(2, '0');

        const tick = () => {
            const diff = target - Date.now();

            if (!Number.isFinite(target) || diff <= 0) {
                Object.values(out).forEach(el => (el.textContent = '00'));
                if (done) done.hidden = false;
                clearInterval(timer);
                return;
            }

            const s = Math.floor(diff / 1000);
            out.days.textContent = pad(Math.floor(s / 86400));
            out.hours.textContent = pad(Math.floor((s % 86400) / 3600));
            out.minutes.textContent = pad(Math.floor((s % 3600) / 60));
            out.seconds.textContent = pad(s % 60);
        };

        tick();
        var timer = setInterval(tick, 1000);
    }

    /* Mobil menü */
    burger.addEventListener('click', function () {
        const open = menu.classList.toggle('is-open');
        burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    menu.addEventListener('click', function (e) {
        if (e.target.closest('a')) {
            menu.classList.remove('is-open');
            burger.setAttribute('aria-expanded', 'false');
        }
    });

    /* Scroll állapot + olvasási progressz */
    function onScroll() {
        nav.classList.toggle('is-scrolled', window.scrollY > 12);

        const max = document.documentElement.scrollHeight - window.innerHeight;
        bar.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* Aktív szekció kiemelése */
    const sections = links
        .map(a => document.querySelector(a.getAttribute('href')))
        .filter(Boolean);

    if (sections.length && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                links.forEach(a => a.classList.toggle(
                    'is-active',
                    a.getAttribute('href') === '#' + entry.target.id
                ));
            });
        }, { rootMargin: '-45% 0px -50% 0px' });

        sections.forEach(s => observer.observe(s));
    }
})();
