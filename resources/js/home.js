// ZeroDay 2026 – landing oldal viselkedése: visszaszámláló, szegmentált
// választók, scroll-reveal. A layout `defer`-rel tölti be.

(function () {
    /* ---------- Visszaszámláló ---------- */
    const cd = document.querySelector('.zd-countdown');
    if (cd) {
        const target = new Date(cd.dataset.target).getTime();
        const out = {
            days: cd.querySelector('[data-cd="days"]'),
            hours: cd.querySelector('[data-cd="hours"]'),
            minutes: cd.querySelector('[data-cd="minutes"]'),
            seconds: cd.querySelector('[data-cd="seconds"]'),
        };
        const msg = cd.querySelector('[data-cd="msg"]');
        const pad = n => String(n).padStart(2, '0');

        const tick = () => {
            const diff = target - Date.now();

            if (diff <= 0) {
                Object.values(out).forEach(el => (el.textContent = '00'));
                msg.hidden = false;
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
        const timer = setInterval(tick, 1000);
    }

    /* ---------- Szegmentált választók ---------- */
    document.querySelectorAll('[data-segmented]').forEach(group => {
        group.addEventListener('change', () => {
            group.querySelectorAll('.zd-seg').forEach(seg => {
                const input = seg.querySelector('input');
                seg.classList.toggle('is-checked', !!input && input.checked);
            });
        });
    });

    /* ---------- Reveal ---------- */
    const items = document.querySelectorAll('.zd-reveal');

    if (!('IntersectionObserver' in window) ||
        window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        items.forEach(el => el.classList.add('is-visible'));
        return;
    }

    const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    items.forEach(el => io.observe(el));
})();
