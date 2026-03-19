<?php if (checkAuth('admin')): ?>

<nav id="adminNavbar"
     class="navbar navbar-expand-lg tw-sticky tw-top-0 tw-z-50"
     style="background: rgba(15,23,42,0.97); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.06); transition: box-shadow 0.3s ease;">

    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-decoration-none" href="/admin/dashboard">
            <span class="d-inline-flex align-items-center justify-content-center tw-w-8 tw-h-8 tw-rounded-lg"
                  style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
            </span>
            <span style="background: linear-gradient(135deg, #f8fafc, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-size: 1rem;">
                Admin Panel
            </span>
        </a>

        <!-- Mobile toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#adminNavCollapse"
                aria-controls="adminNavCollapse" aria-expanded="false" aria-label="Menü"
                style="color: #94a3b8;">
            <span class="navbar-toggler-icon" style="filter: invert(1) opacity(0.6);"></span>
        </button>

        <!-- Nav items -->
        <div class="collapse navbar-collapse" id="adminNavCollapse">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium admin-nav-link"
                       href="/admin/dashboard"
                       style="color: #94a3b8; font-size: 0.875rem; transition: all 0.2s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 mb-1" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
             <!--    <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium admin-nav-link"
                       href="/admin/users"
                       style="color: #94a3b8; font-size: 0.875rem; transition: all 0.2s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 mb-1" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                        Felhasználók
                    </a>
                </li> -->
        <!--         <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium admin-nav-link"
                       href="/admin/posts"
                       style="color: #94a3b8; font-size: 0.875rem; transition: all 0.2s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 mb-1" viewBox="0 0 16 16">
                            <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5z"/>
                        </svg>
                        Bejegyzések
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 tw-rounded-lg fw-medium admin-nav-link"
                       href="/admin/settings"
                       style="color: #94a3b8; font-size: 0.875rem; transition: all 0.2s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 mb-1" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.892 3.433-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.892-1.64-.901-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                        Beállítások
                    </a>
                </li>
            </ul>

            <!-- Right side: admin badge + logout -->
            <div class="d-flex align-items-center gap-3">

                <!-- Admin badge -->
                <div class="d-none d-lg-flex align-items-center gap-2 px-3 py-2 tw-rounded-xl"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                    <div class="d-flex align-items-center justify-content-center tw-w-7 tw-h-7 tw-rounded-lg"
                         style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="white" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="fw-semibold lh-1" style="color: #e2e8f0; font-size: 0.8rem;">
                            <?php
                                $adminId = $_SESSION['admin_id'] ?? null;
                                if ($adminId) {
                                    $adminRecord = \App\Models\Admin::find($adminId);
                                    echo htmlspecialchars($adminRecord?->name ?? 'Admin', ENT_QUOTES, 'UTF-8');
                                } else {
                                    echo 'Admin';
                                }
                            ?>
                        </div>
                        <div style="color: #475569; font-size: 0.7rem;">Adminisztrátor</div>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="/admin/logout" class="m-0">
                    <button type="submit"
                            class="btn btn-sm fw-semibold d-flex align-items-center gap-2"
                            style="background: rgba(239,68,68,0.1); color: #f87171; border: 1px solid rgba(239,68,68,0.2); border-radius: 10px; padding: 7px 14px; transition: all 0.2s;"
                            onmouseover="this.style.background='rgba(239,68,68,0.18)'; this.style.borderColor='rgba(239,68,68,0.4)';"
                            onmouseout="this.style.background='rgba(239,68,68,0.1)'; this.style.borderColor='rgba(239,68,68,0.2)';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        Kilépés
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>

<style>
    .admin-nav-link:hover {
        background: rgba(255,255,255,0.06) !important;
        color: #e2e8f0 !important;
    }
    .admin-nav-link.active {
        background: rgba(239,68,68,0.15) !important;
        color: #f87171 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname;
        document.querySelectorAll('#adminNavbar .admin-nav-link').forEach(function (link) {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>

<?php endif; ?>
