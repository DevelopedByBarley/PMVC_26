<div style="min-height: 100vh; background: linear-gradient(135deg, #0f172a 0%, #1e293b 45%, #450a0a 100%); display: flex; align-items: center; justify-content: center; padding: 2rem 1rem; position: relative; overflow: hidden;">

    <!-- Background decoration -->
    <div style="position: absolute; top: -120px; right: -120px; width: 480px; height: 480px; border-radius: 50%; background: radial-gradient(circle, rgba(239,68,68,0.12) 0%, transparent 70%); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -150px; left: -80px; width: 550px; height: 550px; border-radius: 50%; background: radial-gradient(circle, rgba(220,38,38,0.09) 0%, transparent 70%); pointer-events: none;"></div>

    <div class="w-100" style="max-width: 440px; position: relative; z-index: 1;">

        <!-- Logo / Brand -->
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center tw-w-14 tw-h-14 tw-rounded-2xl mb-3"
                 style="background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 8px 24px rgba(239,68,68,0.35);">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 9h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1z"/>
                </svg>
            </div>
            <h1 class="fw-bold mb-1" style="color: #f8fafc; font-size: 1.6rem;">Admin belépés</h1>
            <p class="small mb-0" style="color: #64748b;">Add meg az admin belépési adataidat</p>
        </div>

        <!-- Card -->
        <div class="tw-rounded-2xl p-4 p-md-5"
             style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.09); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);">

            <form method="POST" action="/admin/login" class="d-flex flex-column gap-3">
                <?= csrf('admin_login') ?>

                <!-- Email -->
                <div>
                    <label class="form-label fw-semibold mb-1" for="email"
                           style="color: #cbd5e1; font-size: 0.875rem;">
                        Email cím
                    </label>
                    <input class="form-control"
                           id="email" name="email" type="email"
                           value="<?= htmlspecialchars(oldValue('email', ''), ENT_QUOTES, 'UTF-8') ?>"
                           placeholder="admin@domain.hu"
                           required
                           style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); color: #e2e8f0; border-radius: 12px; padding: 0.65rem 1rem; transition: all 0.2s;"
                           onfocus="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(239,68,68,0.5)'; this.style.boxShadow='0 0 0 3px rgba(239,68,68,0.12)';"
                           onblur="this.style.background='rgba(255,255,255,0.06)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';">
                    <?php errors('email', $errors ?? []); ?>
                </div>

                <!-- Password -->
                <div>
                    <label class="form-label fw-semibold mb-1" for="password"
                           style="color: #cbd5e1; font-size: 0.875rem;">
                        Jelszó
                    </label>
                    <div class="position-relative">
                        <input class="form-control"
                               id="password" name="password" type="password"
                               placeholder="••••••••"
                               required
                               style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); color: #e2e8f0; border-radius: 12px; padding: 0.65rem 2.8rem 0.65rem 1rem; transition: all 0.2s;"
                               onfocus="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(239,68,68,0.5)'; this.style.boxShadow='0 0 0 3px rgba(239,68,68,0.12)';"
                               onblur="this.style.background='rgba(255,255,255,0.06)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';">
                        <!-- Toggle visibility -->
                        <button type="button" id="togglePassword"
                                class="position-absolute top-50 translate-middle-y border-0 bg-transparent p-0 d-flex align-items-center"
                                style="right: 12px; color: #64748b; cursor: pointer; transition: color 0.2s;"
                                onmouseover="this.style.color='#94a3b8';"
                                onmouseout="this.style.color='#64748b';"
                                onclick="var i=document.getElementById('password'); i.type=i.type==='password'?'text':'password'; this.querySelector('.eye-icon').style.opacity=i.type==='text'?'0.5':'1';">
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </button>
                    </div>
                    <?php errors('password', $errors ?? []); ?>
                </div>

                <!-- Remember + Forgot -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="remember" name="remember" type="checkbox" value="1"
                               style="background-color: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.2);">
                        <label class="form-check-label small" for="remember" style="color: #94a3b8;">
                            Emlékezz rám
                        </label>
                    </div>
                    <a href="/admin/forgot-password"
                       class="small fw-semibold text-decoration-none"
                       style="color: #f87171; transition: color 0.2s;"
                       onmouseover="this.style.color='#fca5a5';"
                       onmouseout="this.style.color='#f87171';">
                        Elfelejtett jelszó?
                    </a>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="btn fw-semibold w-100 mt-1"
                        style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; border: none; border-radius: 12px; padding: 0.75rem; font-size: 1rem; box-shadow: 0 4px 16px rgba(239,68,68,0.3); transition: all 0.2s;"
                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(239,68,68,0.45)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 16px rgba(239,68,68,0.3)';">
                    Belépés &rarr;
                </button>

            </form>
        </div>

        <!-- Back to site -->
        <div class="text-center mt-4">
            <a href="/"
               class="small text-decoration-none d-inline-flex align-items-center gap-1"
               style="color: #475569; transition: color 0.2s;"
               onmouseover="this.style.color='#94a3b8';"
               onmouseout="this.style.color='#475569';">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Vissza a főoldalra
            </a>
        </div>

    </div>
</div>

<style>
    #email::placeholder, #password::placeholder {
        color: #475569;
    }
    #email, #password {
        color-scheme: dark;
    }
</style>
