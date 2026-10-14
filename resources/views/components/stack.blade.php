<section id="stack" data-nav-section="stack" class="section-rule px-6 py-24 sm:px-8 sm:py-32 lg:px-12" aria-labelledby="stack-title">
    <div class="site-container">
        <div class="mb-12 max-w-2xl sm:mb-16" data-reveal>
            <p class="eyebrow mb-4">Web Stack & Technologies</p>
            <h2 id="stack-title" class="section-title">Tools I use.</h2>
            <p class="mt-6 text-sm leading-7 text-muted sm:text-base">
                A battle-tested stack for building, shipping, and maintaining modern web applications and resilient systems.
            </p>
        </div>

        @php
            $technologies = [
                'Laravel',
                'PostgreSQL',
                'Linux',
                'Docker',
                'Next.js',
                'TypeScript',
                'Node.js',
                'Nginx',
                'Cloudflare',
                'Proxmox',
                'Python',
                'AI Systems',
            ];
        @endphp

        <!-- Animated Horizontal Marquee Ticker -->
        <div class="marquee-container py-4" aria-label="Technology stack ticker" data-reveal style="--reveal-delay: 150ms">
            <div class="marquee-content" aria-hidden="false">
                @foreach($technologies as $tech)
                    <div class="inline-flex items-center gap-3 rounded-full border border-line bg-panel px-5 py-3 text-sm font-mono text-paper whitespace-nowrap transition-colors hover:border-accent hover:text-accent">
                        <span class="h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                        <span>{{ $tech }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Duplicated content for seamless infinite loop -->
            <div class="marquee-content" aria-hidden="true">
                @foreach($technologies as $tech)
                    <div class="inline-flex items-center gap-3 rounded-full border border-line bg-panel px-5 py-3 text-sm font-mono text-paper whitespace-nowrap transition-colors hover:border-accent hover:text-accent">
                        <span class="h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                        <span>{{ $tech }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Accessible Static List for Screen Readers -->
        <div class="sr-only">
            <ul>
                @foreach($technologies as $tech)
                    <li>{{ $tech }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
