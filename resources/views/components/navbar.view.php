<nav class="navbar navbar-expand-lg tw-sticky tw-top-0 tw-z-50 tw-bg-white/85 tw-backdrop-blur-[12px] tw-border-b tw-border-black/[0.06] tw-transition-all tw-duration-300"
     id="mainNavbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold tw-text-slate-900 tw-text-[1.25rem] tw-no-underline" href="/">
            <span class="tw-inline-flex tw-items-center tw-justify-center tw-w-9 tw-h-9 tw-rounded-xl tw-bg-[linear-gradient(135deg,#0ea5e9,#10b981)]">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38
                             0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13
                             -.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66
                             .07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15
                             -.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27
                             .68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12
                             .51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48
                             0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
            </span>
            <span class="tw-bg-[linear-gradient(135deg,#0f172a,#0ea5e9)] tw-bg-clip-text tw-text-transparent">
                PMVC
            </span>
        </a>

        <!-- Mobile toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNavbarCollapse"
                aria-controls="mainNavbarCollapse" aria-expanded="false" aria-label="Menü">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav items -->
        <div class="collapse navbar-collapse" id="mainNavbarCollapse">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium tw-text-slate-500 tw-transition-all tw-duration-200 hover:tw-bg-slate-100 hover:tw-text-sky-500"
                       href="/">
                        Főoldal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium tw-text-slate-500 tw-transition-all tw-duration-200 hover:tw-bg-slate-100 hover:tw-text-sky-500"
                       href="/posts">
                        Bejegyzések
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium tw-text-slate-500 tw-transition-all tw-duration-200 hover:tw-bg-slate-100 hover:tw-text-sky-500"
                       href="/about">
                        Névjegy
                    </a>
                </li>
            </ul>

            <!-- Language switcher -->
            <?php $currentLang = \Core\Language::get(); ?>
            <div class="d-flex align-items-center gap-1 me-2">
                <?php foreach (['hu' => '🇭🇺', 'en' => '🇬🇧'] as $code => $flag): ?>
                    <a href="/lang/<?= $code ?>"
                       title="<?= strtoupper($code) ?>"
                       class="tw-inline-flex tw-items-center tw-justify-center tw-w-[30px] tw-h-[30px] tw-rounded-[8px] tw-no-underline tw-text-[1.1rem] tw-transition-all tw-duration-200 hover:tw-opacity-100 hover:tw-bg-[rgba(14,165,233,0.08)] <?= $currentLang === $code ? 'tw-bg-[rgba(14,165,233,0.12)] tw-shadow-[0_0_0_2px_rgba(14,165,233,0.4)]' : 'tw-opacity-50' ?>">
                        <?= $flag ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Auth buttons -->
            <div class="d-flex align-items-center gap-2">
                <?php if (checkAuth('user')): ?>
                    <span class="text-secondary small d-none d-lg-inline">
                        Üdv, <strong><?= htmlspecialchars($_SESSION['user']['name'] ?? 'Felhasználó', ENT_QUOTES, 'UTF-8') ?></strong>
                    </span>
                    <form method="POST" action="/user/logout" class="m-0">
                        <?php if (function_exists('csrf_field')) echo 'csrf'; ?>
                        <button type="submit"
                                class="btn btn-sm tw-bg-slate-100 tw-text-slate-500 tw-border tw-border-slate-200 tw-rounded-[10px] tw-px-4 tw-py-[6px] fw-medium tw-transition-all tw-duration-200 hover:tw-bg-slate-200">
                            Kilépés
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/user/login"
                       class="btn btn-sm tw-bg-slate-100 tw-text-slate-500 tw-border tw-border-slate-200 tw-rounded-[10px] tw-px-[18px] tw-py-[6px] fw-medium tw-transition-all tw-duration-200 hover:tw-bg-slate-200 tw-no-underline">
                        Bejelentkezés
                    </a>
                    <a href="/user/register"
                       class="btn btn-sm tw-bg-[linear-gradient(135deg,#0ea5e9,#10b981)] tw-text-white tw-border-0 tw-rounded-[10px] tw-px-[18px] tw-py-[6px] fw-semibold tw-transition-all tw-duration-200 tw-shadow-[0_2px_8px_rgba(14,165,233,0.3)] hover:tw--translate-y-px hover:tw-shadow-[0_4px_12px_rgba(14,165,233,0.45)] tw-no-underline">
                        Regisztráció
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('mainNavbar');

        window.addEventListener('scroll', function () {
            navbar.classList.toggle('shadow-sm', window.scrollY > 20);
        });

        const currentPath = window.location.pathname;
        document.querySelectorAll('#mainNavbar .nav-link').forEach(function (link) {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('tw-bg-[linear-gradient(135deg,rgba(14,165,233,0.1),rgba(16,185,129,0.1))]', 'tw-text-sky-500');
                link.classList.remove('tw-text-slate-500');
            }
        });
    });
</script>
