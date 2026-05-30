<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Inline script to detect system dark mode preference and apply it immediately --}}
    <script>
        (function() {
            const appearance = '{{ $appearance ?? 'system' }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Inline style to set the HTML background color based on our theme in app.css --}}
    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    @fonts

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    <x-inertia::head>
        <title>{{ config('app.name', 'Laravel') }}</title>
    </x-inertia::head>
</head>

<body class="font-sans antialiased">
    <native:top-bar title="Laravel">
        <native:top-bar-action id="search" icon="more" label="Search" url="/fuck" />

        <native:top-bar-group id="more" icon="info" label="More">
            <native:top-bar-action id="help" icon="help" label="Login" url="/login" />
            <native:top-bar-action id="about" icon="info" label="Register" url="/register" />

        </native:top-bar-group>
    </native:top-bar>


    <native:side-nav gestures-enabled="true">
        <native:side-nav-header title="My App" subtitle="user@example.com" icon="person" />

        <native:side-nav-item id="home" label="Home" icon="home" url="/home" :active="true" />

        <native:side-nav-group heading="Account" :expanded="false">
            <native:side-nav-item id="profile" label="Profile" icon="person" url="/login" />
            <native:side-nav-item id="settings" label="Settings" icon="settings" url="/register" />
        </native:side-nav-group>

        <native:horizontal-divider />

        <native:side-nav-item id="help" label="Help" icon="help" url="https://help.example.com"
            open-in-browser="true" />
    </native:side-nav>

    <x-inertia::app />
</body>

</html>
