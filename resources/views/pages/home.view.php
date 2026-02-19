<div class="card-body t-p-0">
    <section class="t-bg-gradient-to-br t-from-slate-900 t-via-slate-800 t-to-emerald-800 t-text-white t-rounded-2xl t-p-8 t-p-md-10 t-relative t-overflow-hidden">
        <div class="t-max-w-3xl">
            <span class="badge text-bg-light t-text-slate-900 t-font-semibold t-mb-4">NEW GENERATION PMVC</span>
            <h1 class="display-5 fw-bold t-leading-tight t-mb-3"><?= htmlspecialchars($heading ?? 'Ship Faster, Build Better', ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="lead t-text-slate-200 t-mb-4"><?= htmlspecialchars($message ?? 'Modern PHP architecture with clean routing, custom views, migrations and seeders in one lightweight stack.', ENT_QUOTES, 'UTF-8') ?></p>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-light btn-lg t-font-semibold">Get Started</button>
                <button class="btn t-bg-emerald-500 t-text-white t-border-0 t-px-5 t-py-3 t-rounded-lg t-font-semibold">Live Demo</button>
            </div>
        </div>
    </section>

    <section class="row g-3 t-mt-1">
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <h3 class="h5 t-font-semibold t-mb-2">Clean Routing</h3>
                    <p class="text-secondary mb-0">Controller-based routes with lightweight Illuminate integration.</p>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <h3 class="h5 t-font-semibold t-mb-2">Simple Views</h3>
                    <p class="text-secondary mb-0">Composable `view.php` rendering with reusable layout structure.</p>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="card h-100 border-0 shadow-sm t-rounded-xl">
                <div class="card-body">
                    <h3 class="h5 t-font-semibold t-mb-2">Data Ready</h3>
                    <p class="text-secondary mb-0">Database connection, migrations and seeders prepared for scale.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="row g-3 t-mt-1">
        <div class="col-md-3 col-6">
            <div class="card border-0 bg-light h-100 t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Requests/day</p>
                    <p class="h4 mb-0 t-font-bold">120k+</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 bg-light h-100 t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Avg. latency</p>
                    <p class="h4 mb-0 t-font-bold">34ms</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 bg-light h-100 t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Deploy time</p>
                    <p class="h4 mb-0 t-font-bold">3 min</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 bg-light h-100 t-rounded-xl">
                <div class="card-body">
                    <p class="small text-secondary mb-1">Uptime</p>
                    <p class="h4 mb-0 t-font-bold">99.99%</p>
                </div>
            </div>
        </div>
    </section>
    <section class="card border-0 shadow-sm t-rounded-xl t-mt-1">
        <div class="card-body">
            <h2 class="h5 t-font-semibold t-mb-3">Quick Submit (Validator Demo)</h2>
            <form method="POST" action="/test" class="row g-3" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label class="form-label t-font-semibold" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" value="<?= htmlspecialchars(oldValue('name', ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="John Doe" required>
                    <?php errors('name', $errors ?? []); ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label t-font-semibold" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" value="<?= htmlspecialchars(oldValue('email', ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="john@example.com" required>
                    <?php errors('email', $errors ?? []); ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label t-font-semibold" for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="********" required>
                    <?php errors('password', $errors ?? []); ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label t-font-semibold" for="file">File upload</label>
                    <input class="form-control" id="file" name="file" type="file" required>
                    <?php errors('file', $errors ?? []); ?>
                </div>
                <div class="col-12">
                    <button class="btn t-bg-emerald-500 t-text-white t-border-0 t-px-5 t-py-2 t-rounded-lg t-font-semibold" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>