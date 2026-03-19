<!-- Page Header -->
<div class="tw-bg-[linear-gradient(135deg,#0f172a_0%,#1e293b_50%,#450a0a_100%)] tw-py-10 tw-relative tw-overflow-hidden">
    <div class="tw-absolute tw-top-[-60px] tw-right-[-60px] tw-w-[300px] tw-h-[300px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(239,68,68,0.12)_0%,transparent_70%)]"></div>
    <div class="tw-absolute tw-bottom-[-80px] tw-left-[-40px] tw-w-[350px] tw-h-[350px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(220,38,38,0.08)_0%,transparent_70%)]"></div>
    <div class="container tw-relative tw-z-10">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge px-3 py-1 fw-semibold tw-bg-[rgba(239,68,68,0.18)] tw-text-red-300 tw-border tw-border-[rgba(239,68,68,0.3)] tw-rounded-full tw-text-[0.75rem] tw-tracking-[0.05em]">
                        ✦ Admin Panel
                    </span>
                </div>
                <h1 class="fw-bold mb-1 tw-text-slate-50 tw-text-[1.75rem]">
                    Üdv, <?= htmlspecialchars($adminName ?? 'Admin', ENT_QUOTES, 'UTF-8') ?>!
                </h1>
                <p class="mb-0 small tw-text-slate-500">
                    <?= date('Y. F j., l') ?> &mdash; Áttekintés
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="/admin/users"
                   class="btn btn-sm fw-semibold tw-bg-white/[0.06] tw-text-slate-200 tw-border tw-border-white/[0.12] tw-rounded-[10px] tw-transition-all tw-duration-200 hover:tw-bg-white/10 text-decoration-none">
                    Felhasználók
                </a>
                <a href="/admin/posts"
                   class="btn btn-sm fw-semibold tw-bg-[linear-gradient(135deg,#ef4444,#dc2626)] tw-text-white tw-border-0 tw-rounded-[10px] tw-shadow-[0_2px_10px_rgba(239,68,68,0.3)] tw-transition-all tw-duration-200 hover:tw--translate-y-px text-decoration-none">
                    Bejegyzések
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">

    <!-- Stats Row -->
    <div class="row g-3 mb-4">

        <!-- Users -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100 tw-transition-all tw-duration-[250ms] hover:tw--translate-y-[3px] hover:tw-shadow-[0_10px_32px_rgba(0,0,0,0.1)]">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(239,68,68,0.15),rgba(220,38,38,0.15))]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ef4444" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.276zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                        </div>
                        <span class="badge small tw-bg-[rgba(239,68,68,0.1)] tw-text-red-500 tw-rounded-[8px] tw-text-[0.7rem]">
                            +0% ma
                        </span>
                    </div>
                    <div class="fw-bold mb-1 tw-text-[2rem] tw-leading-none tw-text-[var(--text-main)]">
                        <?= number_format($usersCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium tw-text-[var(--text-muted)]">Felhasználók</div>
                </div>
            </div>
        </div>

        <!-- Admins -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100 tw-transition-all tw-duration-[250ms] hover:tw--translate-y-[3px] hover:tw-shadow-[0_10px_32px_rgba(0,0,0,0.1)]">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(167,139,250,0.15),rgba(139,92,246,0.15))]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#a78bfa" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                        <span class="badge small tw-bg-[rgba(167,139,250,0.1)] tw-text-violet-400 tw-rounded-[8px] tw-text-[0.7rem]">
                            Admin
                        </span>
                    </div>
                    <div class="fw-bold mb-1 tw-text-[2rem] tw-leading-none tw-text-[var(--text-main)]">
                        <?= number_format($adminsCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium tw-text-[var(--text-muted)]">Adminisztrátorok</div>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100 tw-transition-all tw-duration-[250ms] hover:tw--translate-y-[3px] hover:tw-shadow-[0_10px_32px_rgba(0,0,0,0.1)]">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(16,185,129,0.15),rgba(5,150,105,0.15))]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#10b981" viewBox="0 0 16 16">
                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                        </div>
                        <span class="badge small tw-bg-[rgba(16,185,129,0.1)] tw-text-emerald-500 tw-rounded-[8px] tw-text-[0.7rem]">
                            Összes
                        </span>
                    </div>
                    <div class="fw-bold mb-1 tw-text-[2rem] tw-leading-none tw-text-[var(--text-main)]">
                        <?= number_format($postsCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium tw-text-[var(--text-muted)]">Bejegyzések</div>
                </div>
            </div>
        </div>

        <!-- Last login -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100 tw-transition-all tw-duration-[250ms] hover:tw--translate-y-[3px] hover:tw-shadow-[0_10px_32px_rgba(0,0,0,0.1)]">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(251,191,36,0.15),rgba(245,158,11,0.15))]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#f59e0b" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                        </div>
                        <span class="badge small tw-bg-[rgba(251,191,36,0.1)] tw-text-amber-500 tw-rounded-[8px] tw-text-[0.7rem]">
                            Aktív
                        </span>
                    </div>
                    <div class="fw-bold mb-1 tw-text-[1.1rem] tw-leading-[1.3] tw-text-[var(--text-main)]">
                        <?= date('H:i') ?>
                    </div>
                    <div class="small fw-medium tw-text-[var(--text-muted)]">Utolsó belépés</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tables Row -->
    <div class="row g-3">

        <!-- Recent Users -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 tw-border-b tw-border-[var(--border)]">
                        <div class="d-flex align-items-center gap-2">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(239,68,68,0.15),rgba(220,38,38,0.15))]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ef4444" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold tw-text-[var(--text-main)] tw-text-[0.95rem]">Legújabb felhasználók</span>
                        </div>
                        <a href="/admin/users" class="small fw-semibold text-decoration-none tw-text-red-500">
                            Összes &rarr;
                        </a>
                    </div>

                    <?php if ($recentUsers->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 tw-text-sm">
                                <thead>
                                    <tr class="tw-bg-[var(--bg-body)]">
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Név</th>
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Email</th>
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Regisztrált</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentUsers as $user): ?>
                                        <tr>
                                            <td class="px-4 py-3 border-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="tw-w-8 tw-h-8 tw-rounded-full d-flex align-items-center justify-content-center fw-bold tw-bg-[linear-gradient(135deg,#ef4444,#dc2626)] tw-text-white tw-text-[0.75rem] tw-shrink-0">
                                                        <?= strtoupper(substr($user->name ?? '?', 0, 1)) ?>
                                                    </div>
                                                    <span class="fw-medium tw-text-[var(--text-main)]">
                                                        <?= htmlspecialchars($user->name ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 border-0 tw-text-[var(--text-muted)]">
                                                <?= htmlspecialchars($user->email ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                            </td>
                                            <td class="px-4 py-3 border-0 tw-text-[var(--text-muted)]">
                                                <?= $user->created_at ? $user->created_at->format('Y.m.d') : '—' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="px-4 pb-3">
                            <?php paginate($recentUsers); ?>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column align-items-center justify-content-center py-5 tw-text-[var(--text-muted)]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="mb-3 opacity-50" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.276zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                            <p class="small mb-0">Még nincs felhasználó</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 tw-border-b tw-border-[var(--border)]">
                        <div class="d-flex align-items-center gap-2">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(16,185,129,0.15),rgba(5,150,105,0.15))]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#10b981" viewBox="0 0 16 16">
                                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold tw-text-[var(--text-main)] tw-text-[0.95rem]">Legújabb bejegyzések</span>
                        </div>
                        <a href="/admin/posts" class="small fw-semibold text-decoration-none tw-text-emerald-500">
                            Összes &rarr;
                        </a>
                    </div>

                    <?php if (!empty($recentPosts) && count($recentPosts) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 tw-text-sm">
                                <thead>
                                    <tr class="tw-bg-[var(--bg-body)]">
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Cím</th>
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Státusz</th>
                                        <th class="px-4 py-3 fw-semibold border-0 tw-text-[var(--text-muted)] tw-text-[0.75rem] text-uppercase tw-tracking-[0.05em]">Dátum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentPosts as $post): ?>
                                        <tr>
                                            <td class="px-4 py-3 border-0">
                                                <span class="fw-medium d-inline-block tw-max-w-[180px] tw-truncate tw-text-[var(--text-main)]">
                                                    <?= htmlspecialchars($post->title ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 border-0">
                                                <?php $published = $post->published ?? true; ?>
                                                <?php if ($published): ?>
                                                    <span class="badge tw-bg-[rgba(16,185,129,0.12)] tw-text-emerald-500 tw-rounded-[8px] tw-text-[0.72rem] fw-semibold tw-px-[10px] tw-py-[4px]">Aktív</span>
                                                <?php else: ?>
                                                    <span class="badge tw-bg-[rgba(148,163,184,0.15)] tw-text-slate-400 tw-rounded-[8px] tw-text-[0.72rem] fw-semibold tw-px-[10px] tw-py-[4px]">Piszkozat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3 border-0 tw-text-[var(--text-muted)]">
                                                <?= $post->created_at ? $post->created_at->format('Y.m.d') : '—' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column align-items-center justify-content-center py-5 tw-text-[var(--text-muted)]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="mb-3 opacity-50" viewBox="0 0 16 16">
                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                            <p class="small mb-0">Még nincs bejegyzés</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="row g-3 mt-1">
        <div class="col-12">
            <div class="card border-0 shadow-sm tw-rounded-2xl">
                <div class="card-body p-4">
                    <h6 class="fw-semibold mb-3 tw-text-[var(--text-main)] tw-text-[0.9rem] text-uppercase tw-tracking-[0.06em]">
                        Gyors műveletek
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="/admin/posts/create"
                           class="btn btn-sm fw-semibold tw-bg-[linear-gradient(135deg,#ef4444,#dc2626)] tw-text-white tw-border-0 tw-rounded-[10px] tw-shadow-[0_2px_8px_rgba(239,68,68,0.25)] tw-transition-all tw-duration-200 hover:tw--translate-y-px text-decoration-none">
                            + Új bejegyzés
                        </a>
                        <a href="/admin/users"
                           class="btn btn-sm fw-semibold tw-bg-[var(--bg-body)] tw-text-[var(--text-muted)] tw-border tw-border-[var(--border)] tw-rounded-[10px] tw-transition-all tw-duration-200 text-decoration-none">
                            Felhasználók kezelése
                        </a>
                        <a href="/admin/settings"
                           class="btn btn-sm fw-semibold tw-bg-[var(--bg-body)] tw-text-[var(--text-muted)] tw-border tw-border-[var(--border)] tw-rounded-[10px] tw-transition-all tw-duration-200 text-decoration-none">
                            Beállítások
                        </a>
                        <form method="POST" action="/admin/logout" class="m-0">
                            <button type="submit"
                                    class="btn btn-sm fw-semibold tw-bg-[rgba(239,68,68,0.08)] tw-text-red-500 tw-border tw-border-[rgba(239,68,68,0.2)] tw-rounded-[10px] tw-transition-all tw-duration-200 hover:tw-bg-[rgba(239,68,68,0.15)]">
                                Kilépés
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
