<!-- Page Header -->
<div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0c4a6e 100%); padding: 2.5rem 0; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -60px; right: -60px; width: 300px; height: 300px; border-radius: 50%; background: radial-gradient(circle, rgba(14,165,233,0.12) 0%, transparent 70%); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -80px; left: -40px; width: 350px; height: 350px; border-radius: 50%; background: radial-gradient(circle, rgba(16,185,129,0.08) 0%, transparent 70%); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge px-3 py-1 fw-semibold"
                          style="background: rgba(14,165,233,0.18); color: #38bdf8; border: 1px solid rgba(14,165,233,0.3); border-radius: 50px; font-size: 0.75rem; letter-spacing: 0.05em;">
                        ✦ Admin Panel
                    </span>
                </div>
                <h1 class="fw-bold mb-1" style="color: #f8fafc; font-size: 1.75rem;">
                    Üdv, <?= htmlspecialchars($adminName ?? 'Admin', ENT_QUOTES, 'UTF-8') ?>!
                </h1>
                <p class="mb-0 small" style="color: #64748b;">
                    <?= date('Y. F j., l') ?> &mdash; Áttekintés
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="/admin/users"
                   class="btn btn-sm fw-semibold"
                   style="background: rgba(255,255,255,0.06); color: #e2e8f0; border: 1px solid rgba(255,255,255,0.12); border-radius: 10px; padding: 8px 18px; text-decoration: none; transition: all 0.2s;"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)';"
                   onmouseout="this.style.background='rgba(255,255,255,0.06)';">
                    Felhasználók
                </a>
                <a href="/admin/posts"
                   class="btn btn-sm fw-semibold"
                   style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: white; border: none; border-radius: 10px; padding: 8px 18px; text-decoration: none; box-shadow: 0 2px 10px rgba(14,165,233,0.3); transition: all 0.2s;"
                   onmouseover="this.style.transform='translateY(-1px)';"
                   onmouseout="this.style.transform='translateY(0)';">
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
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100"
                 style="transition: all 0.25s;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 32px rgba(0,0,0,0.1)';"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, rgba(14,165,233,0.15), rgba(56,189,248,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0ea5e9" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.276zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                        </div>
                        <span class="badge small" style="background: rgba(14,165,233,0.1); color: #0ea5e9; border-radius: 8px; font-size: 0.7rem;">
                            +0% ma
                        </span>
                    </div>
                    <div class="fw-bold mb-1" style="font-size: 2rem; color: #0f172a; line-height: 1;">
                        <?= number_format($usersCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium" style="color: #64748b;">Felhasználók</div>
                </div>
            </div>
        </div>

        <!-- Admins -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100"
                 style="transition: all 0.25s;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 32px rgba(0,0,0,0.1)';"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, rgba(167,139,250,0.15), rgba(139,92,246,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#a78bfa" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                        <span class="badge small" style="background: rgba(167,139,250,0.1); color: #a78bfa; border-radius: 8px; font-size: 0.7rem;">
                            Admin
                        </span>
                    </div>
                    <div class="fw-bold mb-1" style="font-size: 2rem; color: #0f172a; line-height: 1;">
                        <?= number_format($adminsCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium" style="color: #64748b;">Adminisztrátorok</div>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100"
                 style="transition: all 0.25s;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 32px rgba(0,0,0,0.1)';"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(5,150,105,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#10b981" viewBox="0 0 16 16">
                                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                        </div>
                        <span class="badge small" style="background: rgba(16,185,129,0.1); color: #10b981; border-radius: 8px; font-size: 0.7rem;">
                            Összes
                        </span>
                    </div>
                    <div class="fw-bold mb-1" style="font-size: 2rem; color: #0f172a; line-height: 1;">
                        <?= number_format($postsCount ?? 0) ?>
                    </div>
                    <div class="small fw-medium" style="color: #64748b;">Bejegyzések</div>
                </div>
            </div>
        </div>

        <!-- Last login -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm tw-rounded-2xl h-100"
                 style="transition: all 0.25s;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 32px rgba(0,0,0,0.1)';"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="tw-w-11 tw-h-11 tw-rounded-xl d-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, rgba(251,191,36,0.15), rgba(245,158,11,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#f59e0b" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                        </div>
                        <span class="badge small" style="background: rgba(251,191,36,0.1); color: #f59e0b; border-radius: 8px; font-size: 0.7rem;">
                            Aktív
                        </span>
                    </div>
                    <div class="fw-bold mb-1" style="font-size: 1.1rem; color: #0f172a; line-height: 1.3;">
                        <?= date('H:i') ?>
                    </div>
                    <div class="small fw-medium" style="color: #64748b;">Utolsó belépés</div>
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
                    <div class="d-flex align-items-center justify-content-between px-4 py-3"
                         style="border-bottom: 1px solid #f1f5f9;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center"
                                 style="background: linear-gradient(135deg, rgba(14,165,233,0.15), rgba(56,189,248,0.15));">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#0ea5e9" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold" style="color: #0f172a; font-size: 0.95rem;">Legújabb felhasználók</span>
                        </div>
                        <a href="/admin/users" class="small fw-semibold text-decoration-none" style="color: #0ea5e9;">
                            Összes &rarr;
                        </a>
                    </div>

                    <?php if (!empty($recentUsers) && count($recentUsers) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                                <thead>
                                    <tr style="background: #f8fafc;">
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Név</th>
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Email</th>
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Regisztrált</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentUsers as $user): ?>
                                        <tr>
                                            <td class="px-4 py-3 border-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="tw-w-8 tw-h-8 tw-rounded-full d-flex align-items-center justify-content-center fw-bold"
                                                         style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: white; font-size: 0.75rem; flex-shrink: 0;">
                                                        <?= strtoupper(substr($user->name ?? '?', 0, 1)) ?>
                                                    </div>
                                                    <span class="fw-medium" style="color: #1e293b;">
                                                        <?= htmlspecialchars($user->name ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 border-0" style="color: #64748b;">
                                                <?= htmlspecialchars($user->email ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                            </td>
                                            <td class="px-4 py-3 border-0" style="color: #94a3b8;">
                                                <?= $user->created_at ? $user->created_at->format('Y.m.d') : '—' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column align-items-center justify-content-center py-5" style="color: #cbd5e1;">
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
                    <div class="d-flex align-items-center justify-content-between px-4 py-3"
                         style="border-bottom: 1px solid #f1f5f9;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center"
                                 style="background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(5,150,105,0.15));">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#10b981" viewBox="0 0 16 16">
                                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2L9.5 1.5zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold" style="color: #0f172a; font-size: 0.95rem;">Legújabb bejegyzések</span>
                        </div>
                        <a href="/admin/posts" class="small fw-semibold text-decoration-none" style="color: #10b981;">
                            Összes &rarr;
                        </a>
                    </div>

                    <?php if (!empty($recentPosts) && count($recentPosts) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                                <thead>
                                    <tr style="background: #f8fafc;">
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Cím</th>
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Státusz</th>
                                        <th class="px-4 py-3 fw-semibold border-0" style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Dátum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentPosts as $post): ?>
                                        <tr>
                                            <td class="px-4 py-3 border-0">
                                                <span class="fw-medium d-inline-block" style="color: #1e293b; max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    <?= htmlspecialchars($post->title ?? '—', ENT_QUOTES, 'UTF-8') ?>
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 border-0">
                                                <?php $published = $post->published ?? true; ?>
                                                <span class="badge"
                                                      style="background: <?= $published ? 'rgba(16,185,129,0.12)' : 'rgba(148,163,184,0.15)' ?>; color: <?= $published ? '#10b981' : '#94a3b8' ?>; border-radius: 8px; font-size: 0.72rem; font-weight: 600; padding: 4px 10px;">
                                                    <?= $published ? 'Aktív' : 'Piszkozat' ?>
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 border-0" style="color: #94a3b8;">
                                                <?= $post->created_at ? $post->created_at->format('Y.m.d') : '—' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column align-items-center justify-content-center py-5" style="color: #cbd5e1;">
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
                    <h6 class="fw-semibold mb-3" style="color: #0f172a; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.06em;">
                        Gyors műveletek
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="/admin/posts/create"
                           class="btn btn-sm fw-semibold"
                           style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: white; border: none; border-radius: 10px; padding: 8px 20px; text-decoration: none; box-shadow: 0 2px 8px rgba(14,165,233,0.25); transition: all 0.2s;"
                           onmouseover="this.style.transform='translateY(-1px)';"
                           onmouseout="this.style.transform='translateY(0)';">
                            + Új bejegyzés
                        </a>
                        <a href="/admin/users"
                           class="btn btn-sm fw-semibold"
                           style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; border-radius: 10px; padding: 8px 20px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#e2e8f0';"
                           onmouseout="this.style.background='#f1f5f9';">
                            Felhasználók kezelése
                        </a>
                        <a href="/admin/settings"
                           class="btn btn-sm fw-semibold"
                           style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; border-radius: 10px; padding: 8px 20px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.background='#e2e8f0';"
                           onmouseout="this.style.background='#f1f5f9';">
                            Beállítások
                        </a>
                        <form method="POST" action="/admin/logout" class="m-0">
                            <button type="submit"
                                    class="btn btn-sm fw-semibold"
                                    style="background: rgba(239,68,68,0.08); color: #ef4444; border: 1px solid rgba(239,68,68,0.2); border-radius: 10px; padding: 8px 20px; transition: all 0.2s;"
                                    onmouseover="this.style.background='rgba(239,68,68,0.15)';"
                                    onmouseout="this.style.background='rgba(239,68,68,0.08)';">
                                Kilépés
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
