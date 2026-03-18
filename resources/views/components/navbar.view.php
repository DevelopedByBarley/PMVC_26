<nav class="navbar navbar-expand-lg tw-sticky tw-top-0 tw-z-50" id="mainNavbar"
     style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(0,0,0,0.06); transition: all 0.3s ease;">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/"
           style="font-size: 1.25rem; color: #0f172a; text-decoration: none;">
            <span class="tw-inline-flex tw-items-center tw-justify-center tw-w-9 tw-h-9 tw-rounded-xl"
                  style="background: linear-gradient(135deg, #0ea5e9, #10b981);">
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
            <span style="background: linear-gradient(135deg, #0f172a, #0ea5e9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
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
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium"
                       href="/"
                       style="color: #475569; transition: all 0.2s;">
                        Főoldal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium"
                       href="/posts"
                       style="color: #475569; transition: all 0.2s;">
                        Bejegyzések
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium"
                       href="/about"
                       style="color: #475569; transition: all 0.2s;">
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
                       style="display:inline-flex; align-items:center; justify-content:center; width:30px; height:30px; border-radius:8px; text-decoration:none; font-size:1.1rem; transition:all 0.2s;
                              <?= $currentLang === $code ? 'background:rgba(14,165,233,0.12); box-shadow:0 0 0 2px rgba(14,165,233,0.4);' : 'opacity:0.5;' ?>"
                       onmouseover="this.style.opacity='1'; this.style.background='rgba(14,165,233,0.08)';"
                       onmouseout="this.style.opacity='<?= $currentLang === $code ? '1' : '0.5' ?>'; this.style.background='<?= $currentLang === $code ? 'rgba(14,165,233,0.12)' : 'transparent' ?>';">
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
                        <button type="submit" class="btn btn-sm"
                                style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; border-radius: 10px; padding: 6px 16px; font-weight: 500; transition: all 0.2s;">
                            Kilépés
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/user/login"
                       class="btn btn-sm"
                       style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; border-radius: 10px; padding: 6px 18px; font-weight: 500; transition: all 0.2s; text-decoration: none;">
                        Bejelentkezés
                    </a>
                    <a href="/user/register"
                       class="btn btn-sm"
                       style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: #fff; border: none; border-radius: 10px; padding: 6px 18px; font-weight: 600; transition: all 0.2s; text-decoration: none; box-shadow: 0 2px 8px rgba(14,165,233,0.3);">
                        Regisztráció
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<style>
    #mainNavbar .nav-link:hover {
        background: #f1f5f9;
        color: #0ea5e9 !important;
    }
    #mainNavbar .nav-link.active {
        background: linear-gradient(135deg, rgba(14,165,233,0.1), rgba(16,185,129,0.1));
        color: #0ea5e9 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('mainNavbar');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 20) {
                navbar.style.boxShadow = '0 4px 24px rgba(0,0,0,0.08)';
                navbar.style.background = 'rgba(255,255,255,0.97)';
            } else {
                navbar.style.boxShadow = 'none';
                navbar.style.background = 'rgba(255,255,255,0.85)';
            }
        });

        // Active link highlight
        const currentPath = window.location.pathname;
        document.querySelectorAll('#mainNavbar .nav-link').forEach(function (link) {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>
