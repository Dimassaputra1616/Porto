You are working inside an existing Laravel 13 project named "dims-lab".

Goal:
Refactor and upgrade the current personal portfolio website into a premium dark "DIMS Digital Lab" site.

Important:
- Do NOT rebuild the Laravel project from scratch.
- Keep the current Laravel structure.
- Use Blade components.
- Keep Tailwind/Vite working.
- Do not add unnecessary packages.
- Keep the site lightweight because it will later be deployed to shared cPanel hosting.
- Do not build admin/database features yet.
- Do not invent fake completed projects.
- Local AI OS is NOT a completed project yet.

Current content structure should be:

1. HERO
Brand:
DIMS.

Title:
BUILDING
DIGITAL
SYSTEMS.

Subtitle:
A digital laboratory where software, infrastructure, networking and artificial intelligence become real systems.

Include:
- dark premium visual
- subtle animated grid
- glow effect
- smooth text reveal
- navigation
- CTA buttons:
  "Explore Projects"
  "Enter The Lab"
- small technology pills:
  Laravel
  Linux
  Networking
  Docker
  PostgreSQL
  AI
  Automation

2. SELECTED PROJECTS
Only show real/active projects:

Project 01
Name: Zinus Ticketing
Category: Enterprise IT Operations
Status: Production
Description:
IT ticketing, asset management, device intelligence, SLA monitoring and operational automation platform.
Tech:
Laravel, PostgreSQL, Livewire, Automation

Project 02
Name: Maritime Commerce
Category: Maritime B2B Platform
Status: Commerce
Description:
B2B marine supplier platform combining company profile, commerce workflows and operational business systems.
Tech:
Next.js, TypeScript, Docker, AI

Project 03
Name: HSE Asset Management
Category: HSE Operations
Status: Enterprise
Description:
Centralized asset management system for HSE operations, equipment tracking, asset records, monitoring and operational accountability.
Tech:
Asset Management, HSE, Operations, Web System

IMPORTANT:
Do NOT put Local AI OS inside Selected Projects.

3. THE LAB
Create a dedicated experimental section.

Current experiment:
Name: Local AI OS
Status: In Development
Description:
Exploring a local-first AI environment for personal tools, automation, agents and system interaction.

The Lab should visually feel experimental:
- terminal-style panel
- system status lines
- blinking cursor
- premium dark appearance
- show Local AI OS clearly as "IN DEVELOPMENT"

4. TECHNOLOGY STACK
Create an animated horizontal marquee / scrolling tech stack containing:
Laravel
PostgreSQL
Linux
Docker
Next.js
TypeScript
Node.js
Nginx
Cloudflare
Proxmox
Python
AI Systems

5. FOOTER / CONTACT
Headline:
Let's build something useful.

Include:
- email placeholder: hello@dimssptr.xyz
- current year
- text:
SOFTWARE · INFRASTRUCTURE · NETWORK · AI

Architecture requirements:
Use these Blade components if possible:

resources/views/components/navbar.blade.php
resources/views/components/hero.blade.php
resources/views/components/projects.blade.php
resources/views/components/lab.blade.php
resources/views/components/stack.blade.php
resources/views/components/footer.blade.php

welcome.blade.php should remain clean and only compose the components.

Visual direction:
- premium
- minimal
- cinematic
- dark
- elegant
- technical
- no generic portfolio template feel
- no excessive gradients
- no AI-slop UI
- strong typography
- generous spacing
- subtle motion
- desktop first but fully responsive
- smooth scrolling
- lightweight CSS animations only
- no heavy animation libraries
- no external JS animation frameworks

Use the existing Tailwind/Vite setup.

Also improve:
- hover states
- card depth
- section separators
- responsive spacing
- typography hierarchy
- consistency of pills/tags
- subtle animations
- accessibility and semantic HTML

Do not touch:
- database setup
- migrations
- authentication
- admin dashboard
- deployment configuration
- environment variables

After implementing:
1. Review all changed files.
2. Fix Blade/Tailwind syntax errors.
3. Ensure npm run build succeeds.
4. Ensure php artisan route:list works.
5. Ensure homepage loads without exceptions.

At the end, give me:
- files changed
- summary of changes
- any commands I need to run