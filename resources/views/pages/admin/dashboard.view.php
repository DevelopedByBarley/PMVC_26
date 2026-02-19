<div class="card-body t-p-0">
    <section class="t-bg-gradient-to-br t-from-slate-900 t-via-slate-800 t-to-emerald-800 t-text-white t-rounded-2xl t-p-8 t-p-md-10 t-relative t-overflow-hidden">
        <div class="t-max-w-2xl">
            <span class="badge text-bg-light t-text-slate-900 t-font-semibold t-mb-4">ADMIN</span>
            <h1 class="display-6 fw-bold t-leading-tight t-mb-3">Dashboard</h1>
            <p class="lead t-text-slate-200 t-mb-0">Áttekintés az admin panelről.</p>
        </div>
    </section>

    <section class="row g-3 t-mt-1">
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Felhasználók</p>
                    <p class="h4 mb-0 t-font-bold"><?= htmlspecialchars((string) ($usersCount ?? '—'), ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Adminok</p>
                    <p class="h4 mb-0 t-font-bold"><?= htmlspecialchars((string) ($adminsCount ?? '—'), ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Utoljára belépett</p>
                    <p class="h6 mb-0 t-font-semibold"><?= htmlspecialchars((string) ($lastLogin ?? '—'), ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </article>
        </div>
    </section>
</div>
