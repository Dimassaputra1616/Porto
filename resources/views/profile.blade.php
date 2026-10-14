<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0b0c0b">

    <title>Dimas Saputra — Software & Web Developer</title>

    <meta
        name="description"
        content="Profile, personal biodata, and career roadmap of Dimas Saputra, a software and web developer building reliable applications and modern web systems."
    >
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/profile') }}">
    <meta property="og:site_name" content="DIMS">
    <meta property="og:type" content="profile">
    <meta property="og:title" content="Dimas Saputra — Software & Web Developer">
    <meta property="og:description" content="Software and web developer focusing on dependable web applications, backend architectures, and automation.">
    <meta property="og:url" content="{{ url('/profile') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Dimas Saputra — Software & Web Developer">
    <meta name="twitter:description" content="Software and web developer focusing on dependable web applications, backend architectures, and automation.">

    <script>
        (() => {
            document.documentElement.classList.add('js-ready');
            let storedTheme = null;

            try {
                storedTheme = window.localStorage.getItem('dims-theme');
            } catch (error) {
                storedTheme = null;
            }

            const systemTheme = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
            document.documentElement.dataset.theme = storedTheme === 'light' || storedTheme === 'dark' ? storedTheme : systemTheme;
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-ink font-sans text-paper antialiased">
    <a href="#profile" class="skip-link">Skip to content</a>

    <x-navbar />

    <main id="profile" class="pt-24 pb-20 sm:pt-28">
        <div class="site-container px-4 sm:px-8 lg:px-12">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 mb-8">
                <a href="{{ url('/') }}" class="eyebrow hover:text-accent transition-colors">DIMS LAB</a>
                <span class="text-dim text-xs font-mono">/</span>
                <span class="eyebrow text-accent">PROFILE & DOSSIER</span>
            </div>

            <!-- Master Layout: Sticky ID Dossier (Left) + Executive Story & Roadmap (Right) -->
            <div class="grid gap-12 lg:grid-cols-[22rem_minmax(0,1fr)] lg:items-start lg:gap-14">

                <!-- LEFT COLUMN: Sticky Personal Dossier Badge -->
                <aside class="lg:sticky lg:top-28" data-reveal>
                    <div class="rounded-2xl border border-line bg-panel p-5 sm:p-6 shadow-2xl shadow-black/20">
                        <!-- Dossier Header Tag -->
                        <div class="flex items-center justify-between border-b border-line/60 pb-3.5 mb-5">
                            <span class="eyebrow text-accent">Biodata Pribadi</span>
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-line bg-ink/40 px-2.5 py-0.5 text-[10px] font-mono text-muted">
                                <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                                DS-DEV
                            </span>
                        </div>

                        <!-- Portrait Image Container & Identity -->
                        <div class="text-center pb-5 border-b border-line/60">
                            <div class="relative mx-auto h-28 w-28 shrink-0 overflow-hidden rounded-2xl border border-accent/40 bg-ink/60 shadow-xl shadow-accent/5">
                                @if(file_exists(public_path('images/dimas.jpg')))
                                    <img
                                        src="{{ asset('images/dimas.jpg') }}"
                                        alt="Dimas Saputra"
                                        class="h-full w-full object-cover object-top transition-transform duration-300 hover:scale-105"
                                    >
                                @elseif(file_exists(public_path('images/dimas.png')))
                                    <img
                                        src="{{ asset('images/dimas.png') }}"
                                        alt="Dimas Saputra"
                                        class="h-full w-full object-cover object-top transition-transform duration-300 hover:scale-105"
                                    >
                                @elseif(file_exists(public_path('images/dimas.webp')))
                                    <img
                                        src="{{ asset('images/dimas.webp') }}"
                                        alt="Dimas Saputra"
                                        class="h-full w-full object-cover object-top transition-transform duration-300 hover:scale-105"
                                    >
                                @else
                                    <!-- High-Resolution Sample Portrait Preview -->
                                    <img
                                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&auto=format&fit=crop&q=80"
                                        alt="Dimas Saputra Portrait Preview"
                                        class="h-full w-full object-cover object-top transition-transform duration-300 hover:scale-105"
                                    >
                                @endif
                                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-white/10 pointer-events-none"></div>
                            </div>

                            <h2 class="mt-3.5 text-xl font-medium tracking-tight text-paper font-sans">
                                Dimas Saputra
                            </h2>
                            <p class="mt-0.5 text-xs font-mono text-accent">
                                Software & Web Developer
                            </p>
                        </div>

                        <!-- Biodata Pribadi Data Sheet -->
                        <div class="mt-4">
                            <dl class="divide-y divide-line/40 font-mono text-xs">
                                <div class="flex items-baseline justify-between py-2.5 gap-3">
                                    <dt class="text-dim text-[11px] uppercase tracking-wider shrink-0">Kelahiran</dt>
                                    <dd class="text-paper text-right">Jakarta, 16 Mei 2000</dd>
                                </div>
                                <div class="flex items-baseline justify-between py-2.5 gap-3">
                                    <dt class="text-dim text-[11px] uppercase tracking-wider shrink-0">Domisili</dt>
                                    <dd class="text-paper text-right">Tangerang, Banten (WNI)</dd>
                                </div>
                                <div class="flex items-start justify-between py-2.5 gap-3">
                                    <dt class="text-dim text-[11px] uppercase tracking-wider shrink-0 pt-0.5">Pendidikan</dt>
                                    <dd class="text-right">
                                        <span class="block text-paper">SMK Darussalam Panongan</span>
                                        <span class="block text-[11px] text-dim">2015 — 2018</span>
                                    </dd>
                                </div>
                                <div class="flex items-baseline justify-between py-2.5 gap-3">
                                    <dt class="text-dim text-[11px] uppercase tracking-wider shrink-0">Email</dt>
                                    <dd class="text-right">
                                        <a href="mailto:hello@dimssptr.xyz" class="text-accent hover:underline">hello@dimssptr.xyz</a>
                                    </dd>
                                </div>
                                <div class="flex items-baseline justify-between py-2.5 gap-3">
                                    <dt class="text-dim text-[11px] uppercase tracking-wider shrink-0">WhatsApp</dt>
                                    <dd class="text-right">
                                        <a href="https://wa.me/6281993449940" target="_blank" rel="noreferrer" class="text-accent hover:underline">+62 819 9344 9940</a>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Action Buttons in Sidebar -->
                        <div class="mt-6 pt-5 border-t border-line/60 flex flex-col gap-2.5">
                            <a href="mailto:hello@dimssptr.xyz" class="button button-primary w-full justify-center text-xs min-h-11">
                                <span>Get in Touch</span>
                                <svg class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3.5 12.5 12.5 3.5M5 3.5h7.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <div class="grid grid-cols-2 gap-2">
                                <a
                                    href="https://wa.me/6281993449940"
                                    target="_blank"
                                    rel="noreferrer"
                                    class="button button-secondary justify-center text-xs !min-h-10 !px-2"
                                >
                                    <span>WhatsApp</span>
                                </a>
                                <a
                                    href="https://github.com/dimassputra1616"
                                    target="_blank"
                                    rel="noreferrer"
                                    class="button button-secondary justify-center text-xs !min-h-10 !px-2"
                                >
                                    <span>GitHub</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- RIGHT COLUMN: Narrative, Principles & Career Changelog -->
                <div class="space-y-16">

                    <!-- 1. Executive Headline & Narrative -->
                    <section aria-labelledby="headline-title" data-reveal>
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <p class="eyebrow text-dim">About The Developer</p>
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-accent/40 bg-accent/10 px-3 py-1 text-xs font-mono text-accent">
                                <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                                Available for Projects
                            </span>
                        </div>

                        <h1 id="headline-title" class="text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-paper leading-[1.08]">
                            Building dependable web software that holds up.
                        </h1>

                        <p class="mt-3 font-mono text-sm sm:text-base text-accent">
                            Dimas Saputra · Software & Web Developer
                        </p>

                        <div class="mt-6 space-y-4 text-base leading-relaxed text-muted sm:text-lg sm:leading-8">
                            <p>
                                I am a software and web developer with a strong focus on clean architecture, performance stability, and practical automation. My engineering approach bridges full-stack web development with deep understanding of host environments—ensuring that every application not only functions properly in development, but remains robust, scalable, and easy to maintain in production.
                            </p>
                            <p class="text-sm sm:text-base text-subtle">
                                Primary specializations include the modern Laravel ecosystem, relational schema design with PostgreSQL, responsive interfaces with Tailwind CSS and Livewire, and containerized deployment workflows using Docker.
                            </p>
                        </div>

                        <!-- Quick Technical Metrics -->
                        <div class="mt-8 grid grid-cols-2 gap-4 border-t border-line/60 pt-6 sm:grid-cols-4 font-mono text-xs">
                            <div class="rounded-xl border border-line bg-panel p-3.5">
                                <span class="text-dim block text-[10px] uppercase">Core Platform</span>
                                <span class="text-paper font-semibold mt-1 block">Laravel & PHP 8.3</span>
                            </div>
                            <div class="rounded-xl border border-line bg-panel p-3.5">
                                <span class="text-dim block text-[10px] uppercase">Database</span>
                                <span class="text-paper font-semibold mt-1 block">PostgreSQL · MySQL</span>
                            </div>
                            <div class="rounded-xl border border-line bg-panel p-3.5">
                                <span class="text-dim block text-[10px] uppercase">Container</span>
                                <span class="text-paper font-semibold mt-1 block">Docker · Linux</span>
                            </div>
                            <div class="rounded-xl border border-line bg-panel p-3.5">
                                <span class="text-dim block text-[10px] uppercase">Architecture</span>
                                <span class="text-accent font-semibold mt-1 block">Systems Over Hype</span>
                            </div>
                        </div>
                    </section>

                    <!-- 2. Core Engineering Principles -->
                    <section class="border-t border-line pt-12" aria-labelledby="principles-title">
                        <div class="mb-8" data-reveal>
                            <p class="eyebrow mb-2">Development Philosophy</p>
                            <h3 id="principles-title" class="text-2xl font-medium tracking-tight text-paper">How I build systems.</h3>
                            <p class="mt-2 text-sm text-muted">Core engineering practices applied across every application.</p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-3">
                            <div class="rounded-2xl border border-line bg-panel p-5 sm:p-6 flex flex-col justify-between" data-reveal style="--reveal-delay: 0ms">
                                <div>
                                    <span class="font-mono text-xs font-semibold text-accent">01 // CODE ARCHITECTURE</span>
                                    <h4 class="text-base font-medium text-paper mt-3">Clean & Maintainable</h4>
                                    <p class="mt-2 text-xs leading-relaxed text-muted">
                                        Explicit contracts, structured request validation, clean Eloquent relations, and zero unnecessary dependencies.
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-line bg-panel p-5 sm:p-6 flex flex-col justify-between" data-reveal style="--reveal-delay: 120ms">
                                <div>
                                    <span class="font-mono text-xs font-semibold text-accent">02 // PERFORMANCE</span>
                                    <h4 class="text-base font-medium text-paper mt-3">Operational Reliability</h4>
                                    <p class="mt-2 text-xs leading-relaxed text-muted">
                                        Query optimization, database indexing, background queues, and caching to ensure web apps remain responsive under load.
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-line bg-panel p-5 sm:p-6 flex flex-col justify-between" data-reveal style="--reveal-delay: 240ms">
                                <div>
                                    <span class="font-mono text-xs font-semibold text-accent">03 // DEPLOYMENT</span>
                                    <h4 class="text-base font-medium text-paper mt-3">Host & DevOps Control</h4>
                                    <p class="mt-2 text-xs leading-relaxed text-muted">
                                        Practical Linux administration, Nginx tuning, and automated deployment pipelines from shared cPanel to cloud servers.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- 3. Career Changelog & Milestones -->
                    <section class="border-t border-line pt-12" aria-labelledby="changelog-title">
                        <div class="mb-10" data-reveal>
                            <p class="eyebrow mb-2">Experience & Milestones</p>
                            <h3 id="changelog-title" class="text-2xl font-medium tracking-tight text-paper">Career Changelog.</h3>
                            <p class="mt-2 text-sm text-muted">Record of engineering and deploying production applications.</p>
                        </div>

                        <!-- Timeline Items (Unified Page Scroll) -->
                        <div class="space-y-0" aria-label="Career Journey Timeline">
                            <!-- 2024 - Present -->
                            <div class="timeline-item" data-reveal style="--reveal-delay: 0ms">
                                <span class="timeline-dot" aria-hidden="true"></span>
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-mono text-xs font-semibold text-accent">2024 — PRESENT</span>
                                    <span class="rounded-full border border-line bg-ink/60 px-2.5 py-0.5 font-mono text-[10px] text-muted">Active Role</span>
                                </div>
                                <h4 class="mt-2 text-lg font-medium text-paper">IT Staff & Internal Systems Developer</h4>
                                <p class="mt-0.5 font-mono text-xs text-dim">Enterprise Web Applications, Incident Ticketing & Workflow Automation</p>
                                <p class="mt-3 text-sm leading-relaxed text-muted">
                                    Driving internal software development and operational efficiency across the organization. Architected and deployed production web systems including an <strong class="text-paper font-semibold">Enterprise IT Ticketing System</strong>, <strong class="text-paper font-semibold">HSE Asset Management Platform</strong>, and a <strong class="text-paper font-semibold">Maritime B2B Commerce System</strong>. Designed and implemented a <strong class="text-paper font-semibold">Financial Management Web Application integrated with a Telegram Bot</strong> for automated, real-time transaction logging and cash-flow monitoring directly from chat.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach(['Laravel', 'PostgreSQL', 'Livewire', 'Telegram Bot API', 'Asset Tracking', 'B2B Commerce'] as $tech)
                                        <span class="project-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- 2021 - 2024 -->
                            <div class="timeline-item" data-reveal style="--reveal-delay: 100ms">
                                <span class="timeline-dot" aria-hidden="true"></span>
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-mono text-xs font-semibold text-subtle">2021 — 2024</span>
                                    <span class="rounded-full border border-line bg-ink/60 px-2.5 py-0.5 font-mono text-[10px] text-muted">Fieldwork</span>
                                </div>
                                <h4 class="mt-2 text-lg font-medium text-paper">Freelance IT Specialist & Web Developer</h4>
                                <p class="mt-0.5 font-mono text-xs text-dim">Client Web Interfaces, Network Infrastructure & Surveillance Systems</p>
                                <p class="mt-3 text-sm leading-relaxed text-muted">
                                    Delivered end-to-end technology solutions for local businesses and independent clients. Designed and built modern, high-converting landing pages and responsive user interfaces, while deploying on-site network cabling, router topologies, and commercial IP CCTV security surveillance. Bridged client-facing digital design with physical hardware infrastructure.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach(['Landing Pages', 'UI Design', 'Network Deployment', 'CCTV Surveillance', 'Client Delivery'] as $skill)
                                        <span class="project-tag">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- 2018 - 2020 -->
                            <div class="timeline-item" data-reveal style="--reveal-delay: 200ms">
                                <span class="timeline-dot" aria-hidden="true"></span>
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-mono text-xs font-semibold text-subtle">2018 — 2020</span>
                                    <span class="rounded-full border border-line bg-ink/60 px-2.5 py-0.5 font-mono text-[10px] text-muted">Origins</span>
                                </div>
                                <h4 class="mt-2 text-lg font-medium text-paper">Industrial Production Operator</h4>
                                <p class="mt-0.5 font-mono text-xs text-dim">Manufacturing Operations & Early Tech Transition</p>
                                <p class="mt-3 text-sm leading-relaxed text-muted">
                                    Maintained strict operational standards, assembly workflows, and quality assurance in a high-pace manufacturing environment. Developed strong work discipline and procedural precision, while dedicating off-shift hours to learning computer fundamentals, basic programming, and web development.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach(['Industrial SOP', 'Quality Control', 'Operational Discipline', 'Self-Taught Tech'] as $skill)
                                        <span class="project-tag">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>
