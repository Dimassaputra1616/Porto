<!-- HUD Scroll Progress Bar -->
<div class="scroll-progress-track" aria-hidden="true">
    <div class="scroll-progress-bar" data-scroll-progress></div>
</div>

<header class="fixed inset-x-0 top-0 z-50 px-4 pt-4 sm:px-6 lg:px-8" data-header>
    <nav
        class="site-container flex min-h-16 items-center justify-between rounded-full border border-line bg-ink/90 px-4 backdrop-blur-xl sm:px-5"
        aria-label="Primary navigation"
    >
        <a
            href="{{ request()->is('/') ? '#home' : url('/') }}"
            class="inline-flex min-h-11 items-center gap-2 text-sm font-semibold tracking-[0.28em] text-paper transition-colors hover:text-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-accent"
        >
            DIMS
            <span class="h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
            <span class="sr-only">DIMS home</span>
        </a>

        <div class="hidden items-center gap-8 text-[11px] font-medium uppercase tracking-[0.2em] text-muted md:flex">
            <a class="nav-link" data-nav-link data-nav-target="projects" href="{{ request()->is('/') ? '#projects' : url('/#projects') }}">Work</a>
            <a class="nav-link" data-nav-link data-nav-target="lab" href="{{ request()->is('/') ? '#lab' : url('/#lab') }}">Lab</a>
            <a
                class="nav-link {{ request()->is('profile') ? 'text-accent' : '' }}"
                data-nav-link
                data-nav-target="profile"
                href="{{ url('/profile') }}"
                @if(request()->is('profile')) aria-current="page" @endif
            >
                Profile
            </a>
            <a class="nav-link" data-nav-link data-nav-target="stack" href="{{ request()->is('/') ? '#stack' : url('/#stack') }}">Stack</a>
        </div>

        <div class="flex items-center gap-2">
            <button
                type="button"
                class="theme-toggle"
                data-theme-toggle
                aria-label="Switch to light mode"
                aria-pressed="false"
                title="Switch theme"
            >
                <svg data-theme-icon="sun" class="theme-toggle-icon" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <circle cx="10" cy="10" r="3.25" stroke="currentColor" stroke-width="1.5" />
                    <path d="M10 2v2M10 16v2M18 10h-2M4 10H2M15.66 4.34l-1.41 1.41M5.75 14.25l-1.41 1.41M15.66 15.66l-1.41-1.41M5.75 5.75 4.34 4.34" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <svg data-theme-icon="moon" class="theme-toggle-icon" viewBox="0 0 20 20" fill="none" aria-hidden="true" hidden>
                    <path d="M16.5 12.43A6.75 6.75 0 0 1 7.57 3.5a6.75 6.75 0 1 0 8.93 8.93Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <a
                href="{{ request()->is('/') ? '#contact' : url('/#contact') }}"
                class="contact-nav-link hidden min-h-11 items-center rounded-full border border-line px-4 text-[11px] font-medium uppercase tracking-[0.18em] text-paper transition hover:border-accent hover:text-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-accent sm:inline-flex"
                data-nav-link
                data-nav-target="contact"
            >
                Contact
            </a>

            <details class="relative md:hidden">
                <summary
                    class="flex min-h-11 cursor-pointer list-none items-center rounded-full border border-line px-4 text-[11px] font-medium uppercase tracking-[0.18em] text-muted transition hover:border-accent hover:text-paper focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-accent"
                >
                    Menu
                </summary>

                <div class="absolute right-0 top-14 w-48 rounded-2xl border border-line bg-panel p-2 shadow-xl shadow-black/20">
                    <a class="mobile-nav-link" data-nav-link data-nav-target="home" href="{{ request()->is('/') ? '#home' : url('/') }}">Home</a>
                    <a class="mobile-nav-link" data-nav-link data-nav-target="projects" href="{{ request()->is('/') ? '#projects' : url('/#projects') }}">Work</a>
                    <a class="mobile-nav-link" data-nav-link data-nav-target="lab" href="{{ request()->is('/') ? '#lab' : url('/#lab') }}">Lab</a>
                    <a class="mobile-nav-link {{ request()->is('profile') ? 'text-accent' : '' }}" data-nav-link data-nav-target="profile" href="{{ url('/profile') }}">Profile</a>
                    <a class="mobile-nav-link" data-nav-link data-nav-target="stack" href="{{ request()->is('/') ? '#stack' : url('/#stack') }}">Stack</a>
                    <a class="mobile-nav-link" data-nav-link data-nav-target="contact" href="{{ request()->is('/') ? '#contact' : url('/#contact') }}">Contact</a>
                </div>
            </details>
        </div>
    </nav>
</header>
