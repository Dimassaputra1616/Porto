const themeStorageKey = 'dims-theme';

const getPreferredTheme = () => {
    const currentTheme = document.documentElement.dataset.theme;

    if (currentTheme === 'light' || currentTheme === 'dark') {
        return currentTheme;
    }

    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
};

const updateThemeControls = (theme) => {
    const nextTheme = theme === 'dark' ? 'light' : 'dark';

    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
        toggle.setAttribute('aria-label', `Switch to ${nextTheme} mode`);
        toggle.setAttribute('aria-pressed', String(theme === 'light'));
        toggle.setAttribute('title', `Switch to ${nextTheme} mode`);
        toggle.querySelector('[data-theme-icon="sun"]').hidden = theme !== 'dark';
        toggle.querySelector('[data-theme-icon="moon"]').hidden = theme !== 'light';
    });

    const themeColor = document.querySelector('meta[name="theme-color"]');

    if (themeColor) {
        themeColor.setAttribute('content', theme === 'light' ? '#dfeacc' : '#0b0c0b');
    }
};

const setTheme = (theme, persist = true) => {
    document.documentElement.dataset.theme = theme;
    document.documentElement.style.colorScheme = theme;
    updateThemeControls(theme);

    if (persist) {
        try {
            window.localStorage.setItem(themeStorageKey, theme);
        } catch (error) {
            // Theme switching still works when storage is unavailable.
        }
    }
};

setTheme(getPreferredTheme(), false);

document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
    toggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.dataset.theme;
        setTheme(currentTheme === 'dark' ? 'light' : 'dark');
    });
});

const navigationLinks = document.querySelectorAll('[data-nav-link]');
const navigationSections = document.querySelectorAll('[data-nav-section]');

const setActiveNavigation = (sectionId) => {
    navigationLinks.forEach((link) => {
        if (link.dataset.navTarget === sectionId) {
            link.setAttribute('aria-current', 'location');
        } else {
            link.removeAttribute('aria-current');
        }
    });
};

if (window.location.pathname.startsWith('/profile')) {
    setActiveNavigation('profile');
} else {
    setActiveNavigation('home');
}

if (navigationSections.length > 0 && 'IntersectionObserver' in window) {
    const navigationObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setActiveNavigation(entry.target.dataset.navSection);
            }
        });
    }, {
        rootMargin: '-30% 0px -55% 0px',
        threshold: 0,
    });

    navigationSections.forEach((section) => navigationObserver.observe(section));
}

// HUD Scroll Progress Bar
const scrollProgressBar = document.querySelector('[data-scroll-progress]');

if (scrollProgressBar) {
    let scrollTicking = false;

    const updateScrollProgress = () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight > 0 ? Math.min(Math.max(scrollTop / docHeight, 0), 1) : 0;

        scrollProgressBar.style.transform = `scaleX(${progress})`;
        scrollTicking = false;
    };

    window.addEventListener('scroll', () => {
        if (!scrollTicking) {
            window.requestAnimationFrame(updateScrollProgress);
            scrollTicking = true;
        }
    }, { passive: true });

    updateScrollProgress();
}

// Bidirectional Scroll Reveal Observer (Animates on Scroll Down & Up)
const revealElements = document.querySelectorAll('[data-reveal]');

if (revealElements.length > 0 && 'IntersectionObserver' in window) {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        revealElements.forEach((el) => el.classList.add('is-revealed'));
    } else {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                } else {
                    if (entry.boundingClientRect.top < 0) {
                        entry.target.dataset.revealFrom = 'top';
                    } else {
                        entry.target.dataset.revealFrom = 'bottom';
                    }
                    entry.target.classList.remove('is-revealed');
                }
            });
        }, {
            rootMargin: '0px 0px -20px 0px',
            threshold: 0,
        });

        revealElements.forEach((el) => revealObserver.observe(el));
    }
} else {
    revealElements.forEach((el) => el.classList.add('is-revealed'));
}

// Career Timeline Illumination (Dynamic on Scroll Up & Down)
const timelineItems = document.querySelectorAll('.timeline-item');

if (timelineItems.length > 0 && 'IntersectionObserver' in window) {
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('timeline-active');
            } else {
                entry.target.classList.remove('timeline-active');
            }
        });
    }, {
        rootMargin: '-15% 0px -30% 0px',
        threshold: 0.1,
    });

    timelineItems.forEach((item) => timelineObserver.observe(item));
}

document.querySelectorAll('details').forEach((menu) => {
    menu.querySelectorAll('[data-nav-link]').forEach((link) => {
        link.addEventListener('click', () => menu.removeAttribute('open'));
    });

    document.addEventListener('click', (event) => {
        if (!menu.contains(event.target)) {
            menu.removeAttribute('open');
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menu.hasAttribute('open')) {
            menu.removeAttribute('open');
        }
    });
});

const projectFilters = document.querySelectorAll('[data-project-filter]');
const projectItems = document.querySelectorAll('[data-project-item]');
const projectEmptyState = document.querySelector('[data-project-empty]');

projectFilters.forEach((filter) => {
    filter.addEventListener('click', () => {
        const selectedCategory = filter.dataset.projectFilter;

        projectFilters.forEach((projectFilter) => {
            projectFilter.setAttribute(
                'aria-pressed',
                String(projectFilter === filter),
            );
        });

        let visibleProjectCount = 0;

        projectItems.forEach((projectItem) => {
            const matchesCategory = selectedCategory === 'all'
                || projectItem.dataset.projectCategory === selectedCategory;

            projectItem.hidden = ! matchesCategory;

            if (matchesCategory) {
                visibleProjectCount += 1;
            }
        });

        if (projectEmptyState) {
            projectEmptyState.hidden = visibleProjectCount > 0;
        }
    });
});

// Full Live Coding Terminal Simulation
const codeBody = document.querySelector('[data-terminal-code-body]');
const codeGutter = document.querySelector('[data-terminal-gutter]');
const terminalTabs = document.querySelectorAll('[data-terminal-tab]');
const lnElement = document.querySelector('[data-terminal-ln]');
const colElement = document.querySelector('[data-terminal-col]');
const consoleCmd = document.querySelector('[data-terminal-console-cmd]');
const consoleLogs = document.querySelector('[data-terminal-console-logs]');
const consoleCursor = document.querySelector('[data-terminal-console-cursor]');

if (codeBody && codeGutter) {
    const scripts = [
        {
            filename: 'agent_daemon.py',
            lines: [
                '# Local AI OS - Host Daemon',
                'import asyncio',
                'from dims.lab import LocalEngine, Agent',
                '',
                'async def run_daemon():',
                '    engine = LocalEngine(privacy="air-gapped")',
                '    agent = Agent(role="system-automator")',
                '',
                '    print(">> Mounting host IPC socket...")',
                '    await engine.listen("/run/dims-lab.sock")',
                '    await agent.watch_events()',
            ],
            cmd: 'python agent_daemon.py',
            logs: [
                { text: '[OK] Local LLM engine initialized: 7B (quantized)', class: 'text-[#85e89d]' },
                { text: '[IPC] Socket listening on unix:///run/dims-lab.sock', class: 'text-subtle' },
                { text: '[STATUS] All subsystems nominal. Daemon listening...', class: 'text-accent' },
            ],
        },
        {
            filename: 'task_planner.py',
            lines: [
                '# Local AI OS - Autonomous Execution',
                'from dims.lab import LocalModel, VectorStore',
                '',
                'async def dispatch_task(prompt: str):',
                '    db = VectorStore(path="./embeddings")',
                '    ctx = await db.query(prompt, top_k=3)',
                '',
                '    model = LocalModel(name="qwen2.5-coder")',
                '    stream = await model.generate(prompt, ctx)',
                '    return await stream.execute_offline()',
            ],
            cmd: 'python task_planner.py --offline',
            logs: [
                { text: '[MEMORY] Local vector index: 1,420 chunks loaded', class: 'text-[#85e89d]' },
                { text: '[INFERENCE] Evaluating prompt via zero-telemetry pipeline', class: 'text-subtle' },
                { text: '[EXEC] Task completed in 142ms · 100% air-gapped', class: 'text-accent' },
            ],
        },
    ];

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!prefersReducedMotion) {
        const escapeHtml = (str) => str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Single-pass tokenizer to avoid nested regex tag replacement collisions
        const highlightPython = (line) => {
            const trimmed = line.trimStart();
            if (trimmed.startsWith('#')) {
                return `<span class="code-comment">${escapeHtml(line)}</span>`;
            }

            const tokenRegex = /("(?:\\.|[^"\\])*"|'(?:\\.|[^'\\])*')|\b(async|def|class|return|await|from|import|if|else|True|False|while)\b|\b(print|self|None|str|int)\b|(\b\d+\b)/g;

            let result = '';
            let lastIndex = 0;
            let match;

            while ((match = tokenRegex.exec(line)) !== null) {
                if (match.index > lastIndex) {
                    result += escapeHtml(line.slice(lastIndex, match.index));
                }

                if (match[1]) {
                    result += `<span class="code-string">${escapeHtml(match[1])}</span>`;
                } else if (match[2]) {
                    result += `<span class="code-keyword">${escapeHtml(match[2])}</span>`;
                } else if (match[3]) {
                    result += `<span class="code-fn">${escapeHtml(match[3])}</span>`;
                } else if (match[4]) {
                    result += `<span class="code-number">${escapeHtml(match[4])}</span>`;
                }

                lastIndex = tokenRegex.lastIndex;
            }

            if (lastIndex < line.length) {
                result += escapeHtml(line.slice(lastIndex));
            }

            return result;
        };

        let currentScriptIdx = 0;

        const updateActiveTab = (activeFilename) => {
            terminalTabs.forEach((tab) => {
                const isActive = tab.dataset.terminalTab === activeFilename;
                const dot = tab.querySelector('[data-tab-dot]');
                const title = tab.querySelector('span:not([data-tab-dot])');

                if (isActive) {
                    tab.classList.add('terminal-tab-active');
                    tab.classList.remove('terminal-tab-inactive');
                    if (dot) {
                        dot.className = 'h-1.5 w-1.5 rounded-full bg-accent';
                    }
                    if (title) {
                        title.className = 'text-paper font-medium';
                    }
                } else {
                    tab.classList.remove('terminal-tab-active');
                    tab.classList.add('terminal-tab-inactive');
                    if (dot) {
                        dot.className = 'h-1.5 w-1.5 rounded-full bg-muted/40';
                    }
                    if (title) {
                        title.className = 'text-muted';
                    }
                }
            });
        };

        const runEditorSimulation = () => {
            const script = scripts[currentScriptIdx];
            updateActiveTab(script.filename);

            // Reset Gutter line numbers
            codeGutter.innerHTML = '';
            for (let i = 1; i <= script.lines.length; i += 1) {
                const num = String(i).padStart(2, '0');
                const div = document.createElement('div');
                div.textContent = num;
                codeGutter.appendChild(div);
            }

            // Reset Code Body lines
            codeBody.innerHTML = '';
            const lineElements = [];
            for (let i = 0; i < script.lines.length; i += 1) {
                const lineDiv = document.createElement('div');
                lineDiv.className = 'code-line';
                codeBody.appendChild(lineDiv);
                lineElements.push(lineDiv);
            }

            // Reset Integrated Terminal Drawer
            if (consoleCmd) consoleCmd.textContent = '';
            if (consoleLogs) consoleLogs.innerHTML = '';
            if (consoleCursor) consoleCursor.hidden = false;

            let lineIndex = 0;
            let charIndex = 0;

            const typeChar = () => {
                if (lineIndex >= script.lines.length) {
                    setTimeout(runConsoleSimulation, 500);
                    return;
                }

                const lineText = script.lines[lineIndex];

                if (charIndex <= lineText.length) {
                    const partialText = lineText.substring(0, charIndex);
                    lineElements[lineIndex].innerHTML = highlightPython(partialText)
                        + '<span class="terminal-cursor" aria-hidden="true">_</span>';

                    if (lnElement) lnElement.textContent = String(lineIndex + 1);
                    if (colElement) colElement.textContent = String(charIndex + 1);

                    charIndex += 1;
                    const delay = (lineText.length === 0) ? 40 : 22 + Math.random() * 26;
                    setTimeout(typeChar, delay);
                } else {
                    lineElements[lineIndex].innerHTML = highlightPython(lineText);
                    lineIndex += 1;
                    charIndex = 0;
                    setTimeout(typeChar, 110);
                }
            };

            const runConsoleSimulation = () => {
                let cmdCharIdx = 0;
                const cmdText = script.cmd;

                const typeCmd = () => {
                    if (cmdCharIdx <= cmdText.length) {
                        if (consoleCmd) {
                            consoleCmd.textContent = cmdText.substring(0, cmdCharIdx);
                        }
                        cmdCharIdx += 1;
                        setTimeout(typeCmd, 35 + Math.random() * 25);
                    } else {
                        if (consoleCursor) consoleCursor.hidden = true;

                        script.logs.forEach((log, idx) => {
                            setTimeout(() => {
                                if (consoleLogs) {
                                    const logDiv = document.createElement('div');
                                    logDiv.className = log.class || 'text-muted';
                                    logDiv.textContent = log.text;
                                    consoleLogs.appendChild(logDiv);
                                }
                            }, (idx + 1) * 320);
                        });

                        setTimeout(() => {
                            currentScriptIdx = (currentScriptIdx + 1) % scripts.length;
                            runEditorSimulation();
                        }, 4600);
                    }
                };

                typeCmd();
            };

            setTimeout(typeChar, 600);
        };

        setTimeout(runEditorSimulation, 800);
    }
}

// Project Screenshot Carousel Controller
document.querySelectorAll('[data-project-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('[data-carousel-track]');
    if (!track) return;

    const slides = track.children;
    const totalSlides = slides.length;
    if (totalSlides <= 1) return;

    let currentIndex = 0;
    const prevBtn = carousel.querySelector('[data-carousel-prev]');
    const nextBtn = carousel.querySelector('[data-carousel-next]');
    const dots = carousel.querySelectorAll('[data-carousel-dot]');

    const updateCarousel = (index) => {
        currentIndex = (index + totalSlides) % totalSlides;
        track.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.className = 'h-1.5 rounded-full transition-all duration-300 bg-accent w-5';
            } else {
                dot.className = 'h-1.5 rounded-full transition-all duration-300 bg-white/50 w-1.5';
            }
        });
    };

    if (prevBtn) {
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            updateCarousel(currentIndex - 1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            updateCarousel(currentIndex + 1);
        });
    }

    dots.forEach((dot) => {
        dot.addEventListener('click', (e) => {
            e.stopPropagation();
            const targetIdx = parseInt(dot.dataset.carouselDot, 10);
            updateCarousel(targetIdx);
        });
    });

    // Touch swipe gestures for mobile carousel
    let touchStartX = 0;
    track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
        const touchEndX = e.changedTouches[0].screenX;
        const diff = touchEndX - touchStartX;
        if (Math.abs(diff) > 40) {
            if (diff < 0) {
                updateCarousel(currentIndex + 1);
            } else {
                updateCarousel(currentIndex - 1);
            }
        }
    }, { passive: true });
});

// Fullscreen Lightbox Modal Controller
const lightbox = document.getElementById('project-lightbox');
const lightboxImg = document.getElementById('lightbox-img');
const lightboxCaption = document.getElementById('lightbox-caption');
const lightboxClose = document.getElementById('lightbox-close');
const lightboxPrev = document.getElementById('lightbox-prev');
const lightboxNext = document.getElementById('lightbox-next');

if (lightbox && lightboxImg && lightboxClose) {
    let allLightboxImages = [];
    let currentLightboxIdx = 0;

    const updateLightboxView = (idx) => {
        if (allLightboxImages.length === 0) return;
        currentLightboxIdx = (idx + allLightboxImages.length) % allLightboxImages.length;
        const currentItem = allLightboxImages[currentLightboxIdx];
        lightboxImg.src = currentItem.src;
        lightboxImg.alt = currentItem.title || 'Project Screenshot';
        if (lightboxCaption) {
            lightboxCaption.textContent = currentItem.title || 'Screenshot Preview';
        }
    };

    const openLightbox = (triggerEl) => {
        // Collect sibling screenshots from the same project card
        const card = triggerEl.closest('[data-project-item]');
        const siblings = card ? card.querySelectorAll('[data-lightbox-trigger]') : [triggerEl];

        allLightboxImages = Array.from(siblings).map((el) => ({
            src: el.dataset.imgSrc,
            title: el.dataset.imgTitle,
        }));

        currentLightboxIdx = allLightboxImages.findIndex((item) => item.src === triggerEl.dataset.imgSrc);
        if (currentLightboxIdx === -1) currentLightboxIdx = 0;

        if (lightboxPrev && lightboxNext) {
            const hasMultiple = allLightboxImages.length > 1;
            lightboxPrev.style.display = hasMultiple ? 'flex' : 'none';
            lightboxNext.style.display = hasMultiple ? 'flex' : 'none';
        }

        updateLightboxView(currentLightboxIdx);
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        lightboxImg.src = '';
        document.body.style.overflow = '';
    };

    document.querySelectorAll('[data-lightbox-trigger]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            if (trigger.dataset.imgSrc) {
                openLightbox(trigger);
            }
        });
    });

    if (lightboxPrev) {
        lightboxPrev.addEventListener('click', (e) => {
            e.stopPropagation();
            updateLightboxView(currentLightboxIdx - 1);
        });
    }

    if (lightboxNext) {
        lightboxNext.addEventListener('click', (e) => {
            e.stopPropagation();
            updateLightboxView(currentLightboxIdx + 1);
        });
    }

    lightboxClose.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox || e.target.classList.contains('backdrop-blur-md')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                updateLightboxView(currentLightboxIdx - 1);
            } else if (e.key === 'ArrowRight') {
                updateLightboxView(currentLightboxIdx + 1);
            }
        }
    });
}

