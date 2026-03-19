<div class="tw-min-h-screen tw-bg-[linear-gradient(135deg,#0f172a_0%,#1e293b_45%,#0c4a6e_100%)] tw-flex tw-items-center tw-justify-center tw-p-8 tw-relative tw-overflow-hidden">

    <div class="tw-absolute tw-top-[-120px] tw-right-[-120px] tw-w-[480px] tw-h-[480px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(14,165,233,0.12)_0%,transparent_70%)]"></div>
    <div class="tw-absolute tw-bottom-[-150px] tw-left-[-80px] tw-w-[550px] tw-h-[550px] tw-rounded-full tw-pointer-events-none tw-bg-[radial-gradient(circle,rgba(16,185,129,0.09)_0%,transparent_70%)]"></div>

    <div class="w-100 tw-max-w-[440px] tw-relative tw-z-10">

        <!-- Logo / Brand -->
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center mb-3 tw-w-14 tw-h-14 tw-rounded-2xl tw-bg-[linear-gradient(135deg,#0ea5e9,#10b981)] tw-shadow-[0_8px_24px_rgba(14,165,233,0.35)]">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.294 10 8 10c-2.294 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
            </div>
            <h1 class="fw-bold mb-1 tw-text-slate-50 tw-text-[1.6rem]">Bejelentkezés</h1>
            <p class="small mb-0 tw-text-slate-500">Add meg a belépési adataidat</p>
        </div>

        <!-- Card -->
        <div class="tw-rounded-2xl p-4 p-md-5 tw-bg-white/[0.04] tw-border tw-border-white/[0.09] tw-backdrop-blur-[16px]">

            <form method="POST" action="/user/login" class="d-flex flex-column gap-3">
                <?= csrf('user_login') ?>

                <!-- Email -->
                <div>
                    <label class="form-label fw-semibold mb-1 tw-text-slate-300 tw-text-sm" for="email">
                        Email cím
                    </label>
                    <input class="form-control tw-bg-white/[0.06] tw-border-white/[0.1] tw-text-slate-200 tw-rounded-[12px] tw-transition-all tw-duration-200 placeholder:tw-text-slate-500 focus:tw-bg-white/10 focus:tw-border-sky-500/50 focus:tw-shadow-[0_0_0_3px_rgba(14,165,233,0.12)]"
                           id="email" name="email" type="email"
                           value="<?= htmlspecialchars(oldValue('email', ''), ENT_QUOTES, 'UTF-8') ?>"
                           placeholder="pelda@domain.hu"
                           required
                           data-validate="email">
                    <?php errors('email', $errors ?? []); ?>
                </div>

                <!-- Password -->
                <div>
                    <label class="form-label fw-semibold mb-1 tw-text-slate-300 tw-text-sm" for="password">
                        Jelszó
                    </label>
                    <div class="position-relative">
                        <input class="form-control tw-bg-white/[0.06] tw-border-white/[0.1] tw-text-slate-200 tw-rounded-[12px] tw-transition-all tw-duration-200 placeholder:tw-text-slate-500 focus:tw-bg-white/10 focus:tw-border-sky-500/50 focus:tw-shadow-[0_0_0_3px_rgba(14,165,233,0.12)]"
                               id="password" name="password" type="password"
                               placeholder="••••••••"
                               required>
                        <button type="button"
                                class="position-absolute top-50 translate-middle-y border-0 bg-transparent p-0 d-flex align-items-center tw-right-[12px] tw-text-slate-500 hover:tw-text-slate-400 tw-transition-colors tw-duration-200"
                                onclick="var i=document.getElementById('password'); i.type=i.type==='password'?'text':'password'; this.querySelector('.eye-icon').style.opacity=i.type==='text'?'0.5':'1';">
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </button>
                    </div>
                    <?php errors('password', $errors ?? []); ?>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="btn fw-semibold w-100 mt-1 tw-text-white tw-border-0 tw-rounded-[12px] tw-py-3 tw-text-base tw-bg-[linear-gradient(135deg,#0ea5e9,#10b981)] tw-shadow-[0_4px_16px_rgba(14,165,233,0.3)] tw-transition-all tw-duration-200 hover:tw--translate-y-px hover:tw-shadow-[0_6px_20px_rgba(14,165,233,0.45)]">
                    Belépés &rarr;
                </button>

            </form>
        </div>

        <!-- Register link -->
        <div class="text-center mt-4">
            <span class="small tw-text-slate-500">Még nincs fiókod?</span>
            <a href="/user/register"
               class="small fw-semibold text-decoration-none ms-1 tw-text-sky-300 hover:tw-text-sky-200 tw-transition-colors tw-duration-200">
                Regisztrálj itt
            </a>
        </div>

        <!-- Back to site -->
        <div class="text-center mt-2">
            <a href="/"
               class="small text-decoration-none d-inline-flex align-items-center gap-1 tw-text-slate-500 hover:tw-text-slate-400 tw-transition-colors tw-duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Vissza a főoldalra
            </a>
        </div>

    </div>
</div>
