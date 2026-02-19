<div class="card-body t-p-0">
    <section class="t-bg-gradient-to-br t-from-slate-900 t-via-slate-800 t-to-emerald-800 t-text-white t-rounded-2xl t-p-8 t-p-md-10 t-relative t-overflow-hidden">
        <div class="t-max-w-2xl">
            <span class="badge text-bg-light t-text-slate-900 t-font-semibold t-mb-4">BEJELENTKEZÉS</span>
            <h1 class="display-6 fw-bold t-leading-tight t-mb-3">Üdv újra!</h1>
            <p class="lead t-text-slate-200 t-mb-0">Kérlek jelentkezz be a fiókodba.</p>
        </div>
    </section>

    <section class="card border-0 shadow-sm t-rounded-xl t-mt-1">
        <div class="card-body">
            <form method="POST" action="/login" class="row g-3">
                <div class="col-12">
                    <label class="form-label t-font-semibold" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" value="<?= htmlspecialchars(oldValue('email', ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="email@domain.hu" required>
                    <?php errors('email', $errors ?? []); ?>
                </div>
                <div class="col-12">
                    <label class="form-label t-font-semibold" for="password">Jelszó</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="********" required>
                    <?php errors('password', $errors ?? []); ?>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" id="remember" name="remember" type="checkbox" value="1">
                        <label class="form-check-label" for="remember">Emlékezz rám</label>
                    </div>
                    <a class="text-decoration-none t-text-emerald-600 t-font-semibold" href="/forgot-password">Elfelejtett jelszó?</a>
                </div>
                <div class="col-12">
                    <button class="btn t-bg-emerald-500 t-text-white t-border-0 t-px-5 t-py-2 t-rounded-lg t-font-semibold" type="submit">
                        Bejelentkezés
                    </button>
                </div>
                <div class="col-12">
                    <p class="text-secondary mb-0">
                        Nincs még fiókod? <a class="text-decoration-none t-text-emerald-600 t-font-semibold" href="/register">Regisztráció</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
</div>
