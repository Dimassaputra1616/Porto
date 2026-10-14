@php
    $projects = config('portfolio.projects', []);
    $filters = config('portfolio.filters', []);
@endphp

<section id="projects" data-nav-section="projects" class="section-rule px-6 py-24 sm:px-8 sm:py-32 lg:px-12" aria-labelledby="projects-title">
    <div class="site-container">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between mb-12 sm:mb-16">
            <div class="max-w-2xl" data-reveal>
                <p class="eyebrow mb-4">Selected Projects</p>
                <h2 id="projects-title" class="section-title">Built for real work.</h2>
                <p class="mt-6 max-w-xl text-sm leading-7 text-muted sm:text-base">
                    Active, production-grade systems engineered around operational realities and real business workflows.
                </p>
            </div>

            <div class="project-filters flex flex-wrap gap-2" role="group" aria-label="Filter projects" data-reveal style="--reveal-delay: 100ms">
                @foreach($filters as $filter => $label)
                    <button
                        type="button"
                        class="project-filter"
                        data-project-filter="{{ $filter }}"
                        aria-pressed="{{ $filter === 'all' ? 'true' : 'false' }}"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="space-y-8 lg:space-y-10" data-project-list aria-label="Selected projects">
            @foreach($projects as $project)
                @php
                    $validImages = [];

                    // Auto-detect any screenshots directly inside public/images/projects/{slug}/
                    $slugDir = public_path('images/projects/' . $project['slug']);
                    if (is_dir($slugDir)) {
                        $scanned = glob($slugDir . '/*.{png,jpg,jpeg,webp,PNG,JPG,JPEG,WEBP}', GLOB_BRACE);
                        if (!empty($scanned)) {
                            sort($scanned);
                            foreach ($scanned as $filePath) {
                                $validImages[] = asset('images/projects/' . $project['slug'] . '/' . basename($filePath));
                            }
                        }
                    }

                    // Fallback to explicitly configured images
                    if (empty($validImages) && !empty($project['images'])) {
                        foreach ($project['images'] as $img) {
                            if (file_exists(public_path($img))) {
                                $validImages[] = asset($img);
                            }
                        }
                    }
                @endphp

                <article
                    class="featured-project group"
                    data-project-item
                    data-project-category="{{ $project['category'] }}"
                    data-reveal
                    style="--reveal-delay: {{ ($loop->index % 2) * 100 }}ms"
                >
                    <div class="grid gap-6 lg:grid-cols-[1.15fr_1fr] lg:gap-10 lg:items-center">
                        <!-- Left Column: Interactive Screenshot Showcase Frame -->
                        <div class="project-showcase relative overflow-hidden rounded-xl border border-line bg-black/40" data-project-carousel>
                            @if(!empty($validImages))
                                <!-- Real Screenshots Slider -->
                                <div class="relative aspect-[16/10] w-full overflow-hidden">
                                    <div class="flex h-full w-full transition-transform duration-500 ease-out" data-carousel-track>
                                        @foreach($validImages as $imgUrl)
                                            <div
                                                class="h-full w-full shrink-0 cursor-zoom-in select-none"
                                                data-lightbox-trigger
                                                data-img-src="{{ $imgUrl }}"
                                                data-img-title="{{ $project['title'] }} (Screenshot {{ $loop->iteration }} / {{ count($validImages) }})"
                                                title="Click to view full screenshot"
                                            >
                                                <img
                                                    src="{{ $imgUrl }}"
                                                    alt="{{ $project['title'] }} screenshot {{ $loop->iteration }}"
                                                    class="h-full w-full object-cover object-top transition-transform duration-300 hover:scale-105"
                                                    loading="lazy"
                                                >
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Slide Navigation (Next / Prev) -->
                                    @if(count($validImages) > 1)
                                        <button
                                            type="button"
                                            class="absolute left-2.5 top-1/2 -translate-y-1/2 flex h-8 w-8 items-center justify-center rounded-full bg-black/80 text-paper border border-white/20 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity hover:bg-accent hover:text-ink font-bold text-sm shadow-lg z-10 cursor-pointer"
                                            data-carousel-prev
                                            aria-label="Previous screenshot"
                                        >
                                            ‹
                                        </button>
                                        <button
                                            type="button"
                                            class="absolute right-2.5 top-1/2 -translate-y-1/2 flex h-8 w-8 items-center justify-center rounded-full bg-black/80 text-paper border border-white/20 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity hover:bg-accent hover:text-ink font-bold text-sm shadow-lg z-10 cursor-pointer"
                                            data-carousel-next
                                            aria-label="Next screenshot"
                                        >
                                            ›
                                        </button>

                                        <!-- Pagination Dots -->
                                        <div class="absolute bottom-2.5 inset-x-0 flex items-center justify-center gap-1.5 z-10 pointer-events-auto" data-carousel-dots>
                                            @foreach($validImages as $i => $img)
                                                <button
                                                    type="button"
                                                    class="h-1.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-accent w-5' : 'bg-white/50 w-1.5' }}"
                                                    data-carousel-dot="{{ $i }}"
                                                    aria-label="Go to slide {{ $i + 1 }}"
                                                ></button>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Screenshot Counter & Zoom Hint Badge -->
                                    <div class="absolute top-2.5 right-2.5 flex items-center gap-1.5 rounded-md bg-black/80 px-2 py-1 text-[10px] font-mono text-accent backdrop-blur-sm pointer-events-none border border-white/10 z-10">
                                        <svg class="h-3 w-3" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                            <path d="M10 2h4v4M14 2l-5 5M6 14H2v-4M2 14l5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>{{ count($validImages) }} SS · Zoom</span>
                                    </div>
                                </div>
                            @else
                                <!-- Sleek Cyber Blueprint Frame when real images are not yet added to disk -->
                                <div class="relative aspect-[16/10] w-full flex flex-col justify-between p-4 sm:p-5 border border-dashed border-line/60 bg-gradient-to-br from-panel/90 via-ink/80 to-panel/70">
                                    <div class="flex items-center justify-between font-mono text-[10px] text-dim">
                                        <span class="flex items-center gap-1.5 text-accent">
                                            <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse"></span>
                                            DEMO PREVIEW FRAME
                                        </span>
                                        <span class="uppercase tracking-wider">Live Showcase</span>
                                    </div>

                                    <div class="my-auto py-3 text-center">
                                        <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl border border-accent/40 bg-accent/10 text-accent mb-2.5">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                            </svg>
                                        </div>
                                        <p class="font-mono text-xs font-medium text-paper">{{ $project['title'] }} Demo Preview</p>
                                        <p class="mt-1 font-mono text-[10px] text-muted">
                                            Simpan file gambar di: <br class="sm:hidden">
                                            <code class="rounded bg-ink/70 px-1.5 py-0.5 text-accent/90">public/images/projects/{{ $project['slug'] }}/</code>
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between border-t border-line/40 pt-2 font-mono text-[10px] text-dim">
                                        <span>● Interactive Showcase</span>
                                        <span class="text-accent">Auto-Slider Ready</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Right Column: Narrative, Capabilities, Tags & Live Button -->
                        <div class="flex flex-col justify-between h-full">
                            <!-- Category Label & Status Badge -->
                            <div class="flex items-center justify-between gap-4 border-b border-line/60 pb-3.5 mb-3.5">
                                <div class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                                    <span class="eyebrow text-dim tracking-wider">{{ $project['label'] }}</span>
                                </div>

                                <span class="inline-flex items-center gap-1.5 rounded-full border border-line/70 bg-ink/40 px-2.5 py-0.5 text-[10px] font-mono uppercase tracking-wider text-accent backdrop-blur-sm">
                                    <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                                    {{ $project['status'] }}
                                </span>
                            </div>

                            <!-- Title & Description -->
                            <div>
                                <h3 class="text-2xl sm:text-3xl font-medium tracking-tight text-paper transition-colors duration-200 group-hover:text-accent">
                                    {{ $project['title'] }}
                                </h3>
                                <p class="mt-2 text-sm leading-relaxed text-muted">
                                    {{ $project['description'] }}
                                </p>
                            </div>

                            <!-- Key Capabilities Highlights List -->
                            @if(!empty($project['highlights']))
                                <div class="project-capabilities-box my-3.5 rounded-xl border border-line/60 bg-ink/30 p-3 sm:p-3.5">
                                    <ul class="space-y-1.5 font-mono text-xs text-subtle">
                                        @foreach($project['highlights'] as $highlight)
                                            <li class="flex items-center gap-2">
                                                <svg class="h-3.5 w-3.5 shrink-0 text-accent" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                                    <path d="M13.5 4.5 6.5 11.5 2.5 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span class="leading-tight">{{ $highlight }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Bottom Bar: Tech Stack Tags & Direct Action Button -->
                            <div class="pt-3.5 border-t border-line/50 flex flex-wrap items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-1.5" aria-label="{{ $project['title'] }} technologies">
                                    @foreach($project['technologies'] as $technology)
                                        <span class="project-tag">{{ $technology }}</span>
                                    @endforeach
                                </div>

                                <div class="flex items-center gap-3">
                                    @if(!empty($project['url']) && $project['url'] !== '#')
                                        <a
                                            href="{{ $project['url'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="button button-primary !min-h-9 !px-4 !text-xs font-mono group/btn shrink-0"
                                        >
                                            <span>Visit {{ $project['url_label'] ?? 'Live App' }}</span>
                                            <svg class="h-3.5 w-3.5 transition-transform duration-200 group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                                <path d="M3.5 12.5 12.5 3.5M5 3.5h7.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    @else
                                        <a
                                            href="#contact"
                                            class="button button-secondary !min-h-9 !px-4 !text-xs font-mono shrink-0"
                                            title="Enterprise system deployed in closed internal network. Contact for live demo or walkthrough."
                                        >
                                            <span>Request Demo</span>
                                            <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Fullscreen Lightbox Modal for Hi-Res Screenshots -->
        <div
            id="project-lightbox"
            class="fixed inset-0 z-[120] hidden items-center justify-center bg-black/95 p-4 sm:p-6 backdrop-blur-md"
            role="dialog"
            aria-modal="true"
            aria-label="Screenshot Preview"
        >
            <div class="relative max-h-[95vh] max-w-6xl w-full flex flex-col items-center">
                <!-- Lightbox Header Bar -->
                <div class="flex w-full items-center justify-between pb-3 text-paper font-mono text-xs">
                    <span id="lightbox-caption" class="text-accent font-medium">Screenshot Preview</span>
                    <button
                        type="button"
                        id="lightbox-close"
                        class="rounded-full border border-line bg-panel px-3.5 py-1.5 text-xs text-muted hover:border-accent hover:text-accent transition-colors cursor-pointer"
                        aria-label="Close screenshot preview"
                    >
                        ✕ Close (Esc)
                    </button>
                </div>

                <!-- Lightbox Image Container -->
                <div class="relative w-full max-h-[84vh] overflow-hidden rounded-xl border border-line bg-black/70 flex items-center justify-center p-2">
                    <img
                        id="lightbox-img"
                        src=""
                        alt="Full Preview Screenshot"
                        class="max-h-[80vh] w-auto max-w-full object-contain rounded-lg"
                    >

                    <!-- Lightbox Navigation Controls -->
                    <button
                        type="button"
                        id="lightbox-prev"
                        class="absolute left-3 top-1/2 -translate-y-1/2 flex h-10 w-10 items-center justify-center rounded-full bg-black/80 text-paper border border-white/20 hover:bg-accent hover:text-ink font-bold text-lg transition-colors cursor-pointer shadow-xl"
                        aria-label="Previous screenshot"
                    >
                        ‹
                    </button>
                    <button
                        type="button"
                        id="lightbox-next"
                        class="absolute right-3 top-1/2 -translate-y-1/2 flex h-10 w-10 items-center justify-center rounded-full bg-black/80 text-paper border border-white/20 hover:bg-accent hover:text-ink font-bold text-lg transition-colors cursor-pointer shadow-xl"
                        aria-label="Next screenshot"
                    >
                        ›
                    </button>
                </div>
            </div>
        </div>

        <p class="experience-empty mt-8" data-project-empty hidden>
            No projects found in this category.
        </p>
    </div>
</section>
