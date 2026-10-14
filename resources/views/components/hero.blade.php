<section
    id="home"
    data-nav-section="home"
    class="relative isolate flex min-h-[calc(100dvh-1rem)] items-center overflow-hidden px-6 pb-20 pt-28 sm:px-8 lg:px-12"
    aria-labelledby="hero-title"
>
    <!-- Background Grid & Glow -->
    <div class="hero-grid absolute inset-0 pointer-events-none" aria-hidden="true"></div>
    <div class="hero-glow" aria-hidden="true"></div>

    <div class="site-container relative w-full z-10">
        <div class="max-w-5xl">
            <p class="hero-reveal eyebrow mb-8 flex items-center gap-2">
                <span class="tracking-[0.25em]">DIMS.</span>
                <span class="h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                <span>Digital Systems Lab</span>
            </p>

            <h1 id="hero-title" class="hero-reveal hero-delay-1 max-w-5xl text-[clamp(2.75rem,9.5vw,8.5rem)] font-medium leading-[0.88] tracking-[-0.075em]">
                <span class="block text-paper">BUILDING</span>
                <span class="block text-paper">DIGITAL</span>
                <span class="block text-dim">SYSTEMS.</span>
            </h1>

            <p class="hero-reveal hero-delay-2 mt-8 max-w-2xl text-base leading-7 text-muted sm:text-lg sm:leading-8">
                A digital laboratory where software engineering, modern web applications, and artificial intelligence become real systems.
            </p>

            <div class="hero-reveal hero-delay-3 mt-10 flex flex-wrap items-center gap-3">
                <a href="#projects" class="button button-primary">
                    Explore Projects
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                        <path d="M3.5 12.5 12.5 3.5M5 3.5h7.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="#lab" class="button button-secondary">
                    Enter The Lab
                    <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                </a>
            </div>

            <div class="hero-reveal hero-delay-4 mt-12 flex flex-wrap items-center gap-2 border-t border-line/60 pt-6">
                <span class="eyebrow mr-2">Core Tech:</span>
                @foreach(['Laravel', 'PHP', 'TypeScript', 'Docker', 'PostgreSQL', 'AI', 'Automation'] as $tech)
                    <span class="project-tag hover:border-accent hover:text-accent transition-colors">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
