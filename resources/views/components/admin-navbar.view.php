<?php

if (checkAuth('admin')): ?>
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/admin/dashboard">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form method="POST" action="/admin/logout">
                            <button type="submit" class="nav-link btn btn-link">Kilépés</button>
                        </form>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-secondary small">Admin</span>
                    <form method="POST" action="/admin/logout" class="m-0">
                        <button class="btn btn-outline-dark btn-sm" type="submit">Kilépés</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>