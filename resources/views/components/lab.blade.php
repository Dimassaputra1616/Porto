<section id="lab" data-nav-section="lab" class="section-rule px-6 py-24 sm:px-8 sm:py-32 lg:px-12" aria-labelledby="lab-title">
    <div class="site-container">
        <div class="grid gap-12 lg:grid-cols-[minmax(0,0.85fr)_minmax(30rem,1.15fr)] lg:items-start lg:gap-14">
            <!-- Left Column: Context & Experiment Overview -->
            <div>
                <div data-reveal>
                    <p class="eyebrow mb-3 flex items-center gap-2">
                        <span>Laboratory / Experiment 01</span>
                        <span class="h-1 w-1 rounded-full bg-accent" aria-hidden="true"></span>
                        <span class="text-accent font-mono text-[10px]">R&D</span>
                    </p>
                    <h2 id="lab-title" class="section-title max-w-xl">Still exploring.</h2>
                    <p class="mt-5 max-w-xl text-base leading-relaxed text-muted">
                        A dedicated research environment where software engineering, modern web technologies, local models, and autonomous agents collide before they are hardened for production.
                    </p>
                </div>

                <!-- Sleek Experiment Spec Sheet (No Nested Clutter) -->
                <div class="mt-8 rounded-2xl border border-line bg-panel/90 p-6 sm:p-7 backdrop-blur-sm" data-reveal style="--reveal-delay: 150ms">
                    <div class="flex items-start justify-between gap-4 border-b border-line pb-4">
                        <div>
                            <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-dim">Project Codename</span>
                            <h3 class="text-2xl font-medium tracking-tight text-paper mt-0.5">Local AI OS</h3>
                        </div>
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-accent/40 bg-accent/10 px-3 py-1 text-[11px] font-mono text-accent">
                            <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                            IN DEVELOPMENT
                        </span>
                    </div>

                    <p class="mt-4 text-sm leading-relaxed text-muted">
                        Exploring a local-first AI environment for personal tools, automation, agents and system interaction.
                    </p>

                    <!-- Technical Specs Table -->
                    <div class="mt-6 divide-y divide-line/40 border-y border-line/40 font-mono text-xs">
                        <div class="flex justify-between py-2.5">
                            <span class="text-subtle">[STATUS]</span>
                            <span class="text-accent font-semibold">IN DEVELOPMENT / ACTIVE</span>
                        </div>
                        <div class="flex justify-between py-2.5">
                            <span class="text-subtle">[RUNTIME]</span>
                            <span class="text-paper">Linux Host IPC · Ollama / vLLM</span>
                        </div>
                        <div class="flex justify-between py-2.5">
                            <span class="text-subtle">[PRIVACY]</span>
                            <span class="text-paper">100% Local-First · Air-Gapped</span>
                        </div>
                        <div class="flex justify-between py-2.5">
                            <span class="text-subtle">[TARGET]</span>
                            <span class="text-paper">System Automation & Autonomous Agents</span>
                        </div>
                    </div>

                    <!-- Focus Areas Pills -->
                    <div class="mt-6 flex flex-wrap items-center gap-2" aria-label="Local AI OS focus areas">
                        <span class="eyebrow text-dim mr-1">Focus:</span>
                        @foreach(['Local-first', 'Automation', 'Agents', 'System interaction'] as $focus)
                            <span class="project-tag font-mono text-xs">{{ $focus }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column: Clean Realistic IDE Window -->
            <div class="terminal-window flex flex-col" data-reveal="scale" style="--reveal-delay: 200ms" role="region" aria-label="Live Coding Lab Terminal">
                <!-- Editor Top Header & Tabs Bar -->
                <div class="terminal-header flex items-center justify-between border-b border-line bg-black/60 px-4 py-2.5">
                    <div class="flex items-center gap-3">
                        <!-- macOS Window Buttons -->
                        <div class="flex items-center gap-1.5" aria-hidden="true">
                            <span class="h-3 w-3 rounded-full bg-[#ff5f56]/90 border border-[#e0443e]"></span>
                            <span class="h-3 w-3 rounded-full bg-[#ffbd2e]/90 border border-[#dea123]"></span>
                            <span class="h-3 w-3 rounded-full bg-[#27c93f]/90 border border-[#1aab29]"></span>
                        </div>

                        <!-- Realistic Dual Tabs Bar (Mobile Overflow Protected) -->
                        <div class="flex items-center gap-1 ml-1 sm:ml-2 overflow-x-auto shrink-0 max-w-[calc(100vw-9rem)] sm:max-w-none" role="tablist">
                            <div
                                class="terminal-tab terminal-tab-active shrink-0 flex items-center gap-2 rounded-md px-2.5 sm:px-3 py-1 font-mono text-xs transition-colors"
                                data-terminal-tab="agent_daemon.py"
                            >
                                <span class="h-1.5 w-1.5 rounded-full bg-accent" data-tab-dot></span>
                                <span class="text-paper font-medium">agent_daemon.py</span>
                            </div>
                            <div
                                class="terminal-tab terminal-tab-inactive shrink-0 flex items-center gap-2 rounded-md px-2.5 sm:px-3 py-1 font-mono text-xs transition-colors"
                                data-terminal-tab="task_planner.py"
                            >
                                <span class="h-1.5 w-1.5 rounded-full bg-muted/40" data-tab-dot></span>
                                <span class="text-muted">task_planner.py</span>
                            </div>
                        </div>
                    </div>

                    <!-- Header Language Meta -->
                    <div class="hidden sm:flex items-center gap-2 font-mono text-[11px] text-muted">
                        <span>Python 3.12</span>
                        <span class="text-line">•</span>
                        <span>UTF-8</span>
                    </div>
                </div>

                <!-- Editor Workspace Area -->
                <div class="p-5 font-mono text-xs leading-relaxed min-h-[16.5rem]">
                    <div class="flex items-start">
                        <!-- Line Numbers Gutter -->
                        <div class="code-gutter select-none" data-terminal-gutter aria-hidden="true">
                            <div>01</div>
                            <div>02</div>
                            <div>03</div>
                            <div>04</div>
                            <div>05</div>
                            <div>06</div>
                            <div>07</div>
                            <div>08</div>
                            <div>09</div>
                            <div>10</div>
                        </div>

                        <!-- Code Content Container (Live Typed via JS) -->
                        <div class="flex-1 pl-4 overflow-x-auto" data-terminal-code-body>
                            <div class="code-line"><span class="code-comment"># Local AI OS - Host Daemon</span></div>
                            <div class="code-line"><span class="code-keyword">import</span> <span class="code-plain">asyncio</span></div>
                            <div class="code-line"><span class="code-keyword">from</span> <span class="code-plain">dims.lab</span> <span class="code-keyword">import</span> <span class="code-plain">LocalEngine, Agent</span></div>
                            <div class="code-line"></div>
                            <div class="code-line"><span class="code-keyword">async def</span> <span class="code-fn">run_daemon</span><span class="code-plain">():</span></div>
                            <div class="code-line"><span class="code-plain">    engine = LocalEngine(privacy=</span><span class="code-string">"air-gapped"</span><span class="code-plain">)</span></div>
                            <div class="code-line"><span class="code-plain">    agent = Agent(role=</span><span class="code-string">"system-automator"</span><span class="code-plain">)</span></div>
                            <div class="code-line"></div>
                            <div class="code-line"><span class="code-fn">    print</span><span class="code-plain">(</span><span class="code-string">">> Mounting host IPC socket..."</span><span class="code-plain">)</span></div>
                            <div class="code-line"><span class="code-keyword">    await</span> <span class="code-plain">engine.listen(</span><span class="code-string">"/run/dims-lab.sock"</span><span class="code-plain">)</span><span class="terminal-cursor" aria-hidden="true">_</span></div>
                        </div>
                    </div>
                </div>

                <!-- Integrated Terminal Console Drawer -->
                <div class="mt-auto border-t border-line/70 bg-black/60 p-4 font-mono text-xs">
                    <div class="flex items-center justify-between border-b border-line/40 pb-2 mb-2.5 text-[10px] text-muted tracking-wider uppercase">
                        <div class="flex items-center gap-2">
                            <span class="text-accent">●</span>
                            <span class="font-semibold text-paper">TERMINAL</span>
                            <span class="text-muted/60">bash (local-ai-os)</span>
                        </div>
                        <span class="hidden sm:inline text-muted/70">air-gapped · 100% offline</span>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-accent">
                            <span class="select-none text-muted">dims@lab:~$</span>
                            <span class="text-paper font-semibold" data-terminal-console-cmd>python agent_daemon.py</span>
                            <span class="terminal-cursor text-accent" data-terminal-console-cursor>_</span>
                        </div>
                        <div class="space-y-1 pt-1 text-[11px]" data-terminal-console-logs>
                            <div class="text-[#85e89d]">[OK] Local LLM engine initialized: 7B (quantized)</div>
                            <div class="text-muted">[IPC] Socket listening on unix:///run/dims-lab.sock</div>
                            <div class="text-accent">[STATUS] All subsystems nominal. Daemon listening...</div>
                        </div>
                    </div>
                </div>

                <!-- Editor Status Bar (Bottom) -->
                <div class="flex items-center justify-between border-t border-line/50 bg-black/70 px-4 py-2 font-mono text-[10px] text-muted">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 text-accent font-semibold">
                            <span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse" aria-hidden="true"></span>
                            LIVE CODING
                        </span>
                        <span>main*</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span>Ln <span data-terminal-ln>10</span>, Col <span data-terminal-col>36</span></span>
                        <span>Spaces: 4</span>
                        <span class="hidden sm:inline">Air-Gapped</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
