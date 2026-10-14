<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0b0c0b">

    <title>DIMS — Software Engineering & Web Development</title>

    <meta
        name="description"
        content="DIMS builds dependable software systems, modern web applications, and automation for real operational workflows."
    >
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/') }}">
    <meta property="og:site_name" content="DIMS">
    <meta property="og:type" content="website">
    <meta property="og:title" content="DIMS — Software Engineering & Web Development">
    <meta property="og:description" content="Dependable software systems, modern web applications, and automation for real operational workflows.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="DIMS — Software Engineering & Web Development">
    <meta name="twitter:description" content="Dependable software systems, modern web applications, and automation for real operational workflows.">

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
    <a href="#main-content" class="skip-link">Skip to content</a>

    <x-navbar />

    <main id="main-content">
        <x-hero />
        <x-projects />
        <x-lab />
        <x-stack />
    </main>

    <x-footer />
</body>
</html>
