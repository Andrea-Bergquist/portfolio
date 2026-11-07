<!DOCTYPE html>
<html lang="sv" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Portfolio | Laravel Developer')</title>

    <meta name="description"
        content="@yield('description', 'Min personliga utvecklarportfolio med projekt byggda i Laravel.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-padding-top: 90px;
        }
    </style>
</head>

<body class="bg-slate-950 text-slate-100 antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-white/10 bg-slate-950">
        <div class="mx-auto max-w-7xl px-6 py-8">
            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">

                <p class="text-sm text-slate-500">
                    © {{ date('Y') }} Portfolio. Alla rättigheter förbehållna.
                </p>

                <p class="text-sm text-slate-500">
                    Byggd med <span class="text-violet-400">Laravel</span> & Tailwind CSS
                </p>

            </div>
        </div>
    </footer>

</body>

</html>