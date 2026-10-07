<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #0c4a6e 70%, #0f172a 100%); min-height: 88vh; display: flex; align-items: center; position: relative; overflow: hidden;">

    <!-- Background decoration -->
    <div style="position: absolute; top: -100px; right: -100px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(14,165,233,0.15) 0%, transparent 70%); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -150px; left: -100px; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(16,185,129,0.1) 0%, transparent 70%); pointer-events: none;"></div>

    <div class="container py-5">
        <div class="row align-items-center g-5">

            <!-- Text content -->
            <div class="col-lg-6">
                <div class="mb-3">
                    <span class="badge px-3 py-2 fw-semibold" style="background: rgba(14,165,233,0.15); color: #38bdf8; border: 1px solid rgba(14,165,233,0.3); border-radius: 50px; font-size: 0.8rem; letter-spacing: 0.05em;">
                        ✦ PHP MVC Keretrendszer
                    </span>
                </div>
                <h1 class="display-4 fw-bold lh-sm mb-4" style="color: #f8fafc;">
                    Fejlessz gyorsabban,<br>
                    <span style="background: linear-gradient(135deg, #38bdf8, #34d399); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        okosabban.
                    </span>
                </h1>
                <p class="lead mb-5" style="color: #94a3b8; line-height: 1.8; font-size: 1.1rem;">
                    Egy modern, könnyűsúlyú PHP MVC keretrendszer, amely lehetővé teszi a tiszta kódolást,
                    gyors fejlesztést és méretezhető alkalmazások készítését — Laravel-hez hasonló elegancia és egyszerűség.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/register"
                       class="btn btn-lg px-4 py-3 fw-semibold"
                       style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: white; border: none; border-radius: 14px; box-shadow: 0 4px 20px rgba(14,165,233,0.4); transition: all 0.3s; text-decoration: none;"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 28px rgba(14,165,233,0.5)';"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(14,165,233,0.4)';">
                        Kezdés most &rarr;
                    </a>
                    <a href="/posts"
                       class="btn btn-lg px-4 py-3 fw-semibold"
                       style="background: rgba(255,255,255,0.06); color: #e2e8f0; border: 1px solid rgba(255,255,255,0.12); border-radius: 14px; transition: all 0.3s; text-decoration: none;"
                       onmouseover="this.style.background='rgba(255,255,255,0.1)';"
                       onmouseout="this.style.background='rgba(255,255,255,0.06)';">
                        Bejegyzések &rarr;
                    </a>
                </div>

                <!-- Stats row -->
                <div class="d-flex flex-wrap gap-4 mt-5 pt-4" style="border-top: 1px solid rgba(255,255,255,0.06);">
                    <div>
                        <div class="fw-bold fs-4" style="color: #38bdf8;">MVC</div>
                        <div class="small" style="color: #64748b;">Architektúra</div>
                    </div>
                    <div style="width: 1px; background: rgba(255,255,255,0.08);"></div>
                    <div>
                        <div class="fw-bold fs-4" style="color: #34d399;">Bootstrap 5</div>
                        <div class="small" style="color: #64748b;">+ Tailwind CSS</div>
                    </div>
                    <div style="width: 1px; background: rgba(255,255,255,0.08);"></div>
                    <div>
                        <div class="fw-bold fs-4" style="color: #a78bfa;">PHP 8</div>
                        <div class="small" style="color: #64748b;">Modern szintaxis</div>
                    </div>
                </div>
            </div>

            <!-- Code card -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="tw-rounded-2xl overflow-hidden shadow-lg" style="background: #1e293b; border: 1px solid rgba(255,255,255,0.08);">
                    <!-- Window bar -->
                    <div class="d-flex align-items-center gap-2 px-4 py-3" style="background: #0f172a; border-bottom: 1px solid rgba(255,255,255,0.06);">
                        <span style="width:12px; height:12px; border-radius:50%; background:#ef4444;"></span>
                        <span style="width:12px; height:12px; border-radius:50%; background:#f59e0b;"></span>
                        <span style="width:12px; height:12px; border-radius:50%; background:#10b981;"></span>
                        <span class="ms-2 small" style="color: #475569; font-family: monospace;">routes/web.php</span>
                    </div>
                    <pre class="p-4 m-0 small" style="font-family: 'Courier New', monospace; color: #94a3b8; line-height: 1.8; overflow-x: auto;"><span style="color:#64748b;">// Útvonalak definiálása</span>
<span style="color:#38bdf8;">$router</span><span style="color:#e2e8f0;">-></span><span style="color:#34d399;">get</span><span style="color:#e2e8f0;">(</span><span style="color:#fbbf24;">'/'</span><span style="color:#e2e8f0;">, [</span>
    <span style="color:#a78bfa;">HomeController</span><span style="color:#e2e8f0;">::class,</span>
    <span style="color:#fbbf24;">'index'</span>
<span style="color:#e2e8f0;">]);</span>

<span style="color:#38bdf8;">$router</span><span style="color:#e2e8f0;">-></span><span style="color:#34d399;">post</span><span style="color:#e2e8f0;">(</span><span style="color:#fbbf24;">'/posts'</span><span style="color:#e2e8f0;">, [</span>
    <span style="color:#a78bfa;">PostController</span><span style="color:#e2e8f0;">::class,</span>
    <span style="color:#fbbf24;">'store'</span>
<span style="color:#e2e8f0;">])-></span><span style="color:#34d399;">middleware</span><span style="color:#e2e8f0;">(</span>
    <span style="color:#a78bfa;">AuthMiddleware</span><span style="color:#e2e8f0;">::class</span>
<span style="color:#e2e8f0;">);</span>
</pre>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5" style="background: #f8fafc;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge px-3 py-2 mb-3 fw-semibold" style="background: rgba(14,165,233,0.1); color: #0ea5e9; border: 1px solid rgba(14,165,233,0.2); border-radius: 50px; font-size: 0.8rem;">
                Funkciók
            </span>
            <h2 class="fw-bold mb-3" style="color: #0f172a; font-size: 2rem;">Minden, amire szükséged van</h2>
            <p class="text-secondary mx-auto" style="max-width: 500px; line-height: 1.7;">
                A PMVC keretrendszer mindent tartalmaz, amivel profi webalkalmazásokat fejleszthetsz gyorsan és hatékonyan.
            </p>
        </div>

        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(14,165,233,0.15), rgba(16,185,129,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0ea5e9" viewBox="0 0 16 16">
                                <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5zm0 1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"/>
                                <path d="M7 7h2v2H7z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">MVC Architektúra</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            Tiszta szétválasztás a Model, View és Controller rétegek között. Átlátható, karbantartható kódszerkezet.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(167,139,250,0.15), rgba(139,92,246,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#a78bfa" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">Rugalmas Router</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            GET, POST, PUT, DELETE metódusok támogatása. Middleware-ek könnyű hozzáadása az útvonalakhoz.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(5,150,105,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#10b981" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12zm0-10a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H5a.5.5 0 0 1 0-1h2.5V4.5A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">Validáció</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            Beépített input validáció, hibakezelés és visszajelzés. Többnyelvű hibaüzenetek (HU/EN) támogatása.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(251,191,36,0.15), rgba(245,158,11,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#f59e0b" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">Autentikáció</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            Session-alapú bejelentkezés, admin/user szerepkörök, middleware védelem a privát oldalakhoz.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(239,68,68,0.15), rgba(220,38,38,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ef4444" viewBox="0 0 16 16">
                                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">Adatbázis</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            Egyszerű adatbázis kapcsolat, migrációk és seedek. Biztonságos lekérdezések PDO segítségével.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm tw-rounded-2xl p-1" style="transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 40px rgba(0,0,0,0.1)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                    <div class="card-body p-4">
                        <div class="tw-w-12 tw-h-12 tw-rounded-xl d-flex align-items-center justify-content-center mb-4"
                             style="background: linear-gradient(135deg, rgba(14,165,233,0.15), rgba(56,189,248,0.15));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#38bdf8" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0f172a;">Flash üzenetek</h5>
                        <p class="text-secondary small lh-lg mb-0">
                            Toast értesítések és alert komponensek az azonnali visszajelzéshez. Session-alapú átmeneti adatok.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
    <div class="container py-4 text-center">
        <h2 class="fw-bold mb-3 display-6" style="color: #f8fafc;">
            Regisztráció és bejelentkezés<br>
            <span style="background: linear-gradient(135deg, #38bdf8, #34d399); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                egy helyen.
            </span>
        </h2>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="/register"
               class="btn btn-lg px-5 py-3 fw-semibold"
               style="background: linear-gradient(135deg, #0ea5e9, #10b981); color: white; border: none; border-radius: 14px; box-shadow: 0 4px 20px rgba(14,165,233,0.35); transition: all 0.3s; text-decoration: none;"
               onmouseover="this.style.transform='translateY(-2px)';"
               onmouseout="this.style.transform='translateY(0)';">
                Regisztráció &rarr;
            </a>
            <a href="/login"
               class="btn btn-lg px-5 py-3 fw-semibold"
               style="background: transparent; color: #e2e8f0; border: 1px solid rgba(255,255,255,0.2); border-radius: 14px; transition: all 0.3s; text-decoration: none;"
               onmouseover="this.style.background='rgba(255,255,255,0.06)';"
               onmouseout="this.style.background='transparent';">
                Bejelentkezés
            </a>
        </div>
    </div>
</section>
