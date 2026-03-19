<!-- Page Header -->
<div class="tw-bg-[linear-gradient(135deg,#0f172a_0%,#1e293b_50%,#450a0a_100%)] tw-py-10 tw-relative tw-overflow-hidden">
    <div class="tw-absolute tw-top-[-60px] tw-right-[-60px] tw-w-[300px] tw-h-[300px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(239,68,68,0.12)_0%,transparent_70%)]"></div>
    <div class="tw-absolute tw-bottom-[-80px] tw-left-[-40px] tw-w-[350px] tw-h-[350px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(220,38,38,0.08)_0%,transparent_70%)]"></div>
    <div class="container tw-relative tw-z-10">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge px-3 py-1 fw-semibold tw-bg-[rgba(239,68,68,0.18)] tw-text-red-300 tw-border tw-border-[rgba(239,68,68,0.3)] tw-rounded-full tw-text-[0.75rem] tw-tracking-[0.05em]">
                ✦ Admin Panel
            </span>
        </div>
        <h1 class="fw-bold mb-1 tw-text-slate-50 tw-text-[1.75rem]">Beállítások</h1>
        <p class="mb-0 small tw-text-slate-500">Személyes megjelenési és nyelvi beállítások</p>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <form method="POST" action="/admin/settings">
                <?= csrf() ?>

                <!-- Megjelenés -->
                <div class="card border-0 shadow-sm tw-rounded-2xl mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(239,68,68,0.15),rgba(220,38,38,0.15))]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ef4444" viewBox="0 0 16 16">
                                    <path d="M8 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM4.5 6.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    <path d="M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold tw-text-[var(--text-main)] tw-text-[0.95rem]">Megjelenés</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium small tw-text-[var(--text-muted)]">Téma</label>
                            <div class="d-flex gap-3">
                                <?php $currentTheme = $settings->theme ?? 'light'; ?>

                                <label class="theme-option<?= $currentTheme === 'light' ? ' theme-option-selected' : '' ?> d-flex align-items-center gap-2 px-4 py-3 tw-rounded-xl flex-fill tw-border-2 tw-border-[var(--border)] tw-bg-[var(--bg-body)] tw-cursor-pointer tw-transition-all tw-duration-200"
                                       data-value="light">
                                    <input type="radio" name="theme" value="light" class="d-none" <?= $currentTheme === 'light' ? 'checked' : '' ?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="<?= $currentTheme === 'light' ? '#ef4444' : '#94a3b8' ?>" viewBox="0 0 16 16">
                                        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8z"/>
                                    </svg>
                                    <span class="fw-medium small tw-text-[<?= $currentTheme === 'light' ? '#ef4444' : 'var(--text-muted)' ?>]">Világos</span>
                                </label>

                                <label class="theme-option<?= $currentTheme === 'dark' ? ' theme-option-selected' : '' ?> d-flex align-items-center gap-2 px-4 py-3 tw-rounded-xl flex-fill tw-border-2 tw-border-[var(--border)] tw-bg-[var(--bg-body)] tw-cursor-pointer tw-transition-all tw-duration-200"
                                       data-value="dark">
                                    <input type="radio" name="theme" value="dark" class="d-none" <?= $currentTheme === 'dark' ? 'checked' : '' ?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="<?= $currentTheme === 'dark' ? '#ef4444' : '#94a3b8' ?>" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                    </svg>
                                    <span class="fw-medium small tw-text-[<?= $currentTheme === 'dark' ? '#ef4444' : 'var(--text-muted)' ?>]">Sötét</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nyelv & Időzóna -->
                <div class="card border-0 shadow-sm tw-rounded-2xl mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <div class="tw-w-8 tw-h-8 tw-rounded-lg d-flex align-items-center justify-content-center tw-bg-[linear-gradient(135deg,rgba(16,185,129,0.15),rgba(5,150,105,0.15))]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#10b981" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 1.928-2.37 3.184-2.512a6.942 6.942 0 0 0-3.184 2.512zM3.559 7.5H1.025A6.985 6.985 0 0 1 4.03 2.87 8.177 8.177 0 0 0 3.56 7.5zm.256 1a8.17 8.17 0 0 0 .493 2.631A6.986 6.986 0 0 1 1.025 8.5h2.79zm1.504 0a7.175 7.175 0 0 1-.587 2.527c-.573-.47-1.12-1.063-1.606-1.768A7.17 7.17 0 0 1 3.56 8.5h1.76zm.736 2.849a8.165 8.165 0 0 0 1.067.37 7.16 7.16 0 0 1-1.067-.37z"/>
                                </svg>
                            </div>
                            <span class="fw-semibold tw-text-[var(--text-main)] tw-text-[0.95rem]">Nyelv & Időzóna</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium small tw-text-[var(--text-muted)]">Nyelv</label>
                            <select name="language" class="form-select tw-rounded-[10px] tw-text-[0.9rem]">
                                <option value="hu" <?= ($settings->language ?? 'en') === 'hu' ? 'selected' : '' ?>>Magyar</option>
                                <option value="en" <?= ($settings->language ?? 'en') === 'en' ? 'selected' : '' ?>>English</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label fw-medium small tw-text-[var(--text-muted)]">Időzóna</label>
                            <select name="timezone" class="form-select tw-rounded-[10px] tw-text-[0.9rem]">
                                <option value="Europe/Budapest" <?= ($settings->timezone ?? '') === 'Europe/Budapest' ? 'selected' : '' ?>>Europe/Budapest (CET)</option>
                                <option value="UTC"             <?= ($settings->timezone ?? '') === 'UTC'             ? 'selected' : '' ?>>UTC</option>
                                <option value="Europe/London"   <?= ($settings->timezone ?? '') === 'Europe/London'   ? 'selected' : '' ?>>Europe/London (GMT)</option>
                                <option value="America/New_York"<?= ($settings->timezone ?? '') === 'America/New_York'? 'selected' : '' ?>>America/New_York (EST)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn fw-semibold tw-bg-[linear-gradient(135deg,#ef4444,#dc2626)] tw-text-white tw-border-0 tw-rounded-[10px] tw-px-7 tw-py-[10px] tw-shadow-[0_2px_10px_rgba(239,68,68,0.3)] tw-transition-all tw-duration-200 hover:tw--translate-y-px">
                        Mentés
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.theme-option').forEach(function (label) {
        label.addEventListener('click', function () {
            const selected = this.dataset.value;

            document.querySelectorAll('.theme-option').forEach(function (l) {
                const isSelected = l.dataset.value === selected;
                l.classList.toggle('theme-option-selected', isSelected);
                l.querySelector('svg').setAttribute('fill', isSelected ? '#ef4444' : '#94a3b8');
                l.querySelector('span').style.color = isSelected ? '#ef4444' : 'var(--text-muted)';
            });

            document.documentElement.setAttribute('data-theme', selected);
        });
    });
</script>
