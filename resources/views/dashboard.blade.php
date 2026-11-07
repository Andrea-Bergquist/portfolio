@extends('layouts.app')

@section('title', 'Portfolio | Laravel Developer')

@section('description', 'Utforska mina webbprojekt och lösningar byggda med Laravel, PHP och modern webbteknik.')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-12 mt-12">

    <!-- Sidhuvud -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-white/10 pb-8">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                <span class="text-xs font-medium uppercase tracking-wider text-violet-400">Admin & Översikt</span>
            </div>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-100">
                Dashboard
            </h1>
            <p class="mt-1 text-sm text-slate-400">
                Hantera dina portfolioprojekt, statistik och inkommande förfrågningar.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="#" class="rounded-lg border border-white/10 bg-slate-900 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                Visa live-sida
            </a>
            <a href="{{ route('admin.create') }}" class="rounded-lg bg-violet-600 px-4 py-2.5 text-sm font-medium text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-500">
                + Nytt projekt
            </a>
        </div>
    </div>

    <!-- Statistikkort (KPI) -->
    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-400">Publicerade projekt</span>
                <span class="rounded-md bg-violet-500/10 px-2 py-1 text-xs font-medium text-violet-400">+2 denna mån</span>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-100">8</p>
        </div>

        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-400">Besökare (30 dagar)</span>
                <span class="rounded-md bg-emerald-500/10 px-2 py-1 text-xs font-medium text-emerald-400">+18%</span>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-100">1 420</p>
        </div>

        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-400">Olästa meddelanden</span>
                <span class="rounded-md bg-amber-500/10 px-2 py-1 text-xs font-medium text-amber-400">Nytt</span>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-100">3</p>
        </div>

        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-400">Laravel-version</span>
                <span class="rounded-md bg-slate-800 px-2 py-1 text-xs font-medium text-slate-400">PHP 8.3</span>
            </div>
            <p class="mt-4 text-3xl font-bold text-violet-400">v11.x</p>
        </div>
    </div>

    <!-- Huvudinnehåll: Projekttabell & Senaste aktivitet -->
    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">

        <!-- Projekttabell (Tar upp 2 av 3 kolumner) -->
        <div class="lg:col-span-2 rounded-xl border border-white/10 bg-slate-900/50 overflow-hidden">
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                <h2 class="text-base font-semibold text-slate-100">Mina projekt</h2>
                <a href="#" class="text-sm text-violet-400 hover:text-violet-300">Visa alla →</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-white/10 bg-slate-950/50 text-xs uppercase text-slate-400">
                        <tr>
                            <th class="px-6 py-3.5 font-medium">Projekt</th>
                            <th class="px-6 py-3.5 font-medium">Tech Stack</th>
                            <th class="px-6 py-3.5 font-medium">Status</th>
                            <th class="px-6 py-3.5 text-right font-medium">Åtgärd</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr class="transition hover:bg-white/[0.02]">
                            <td class="px-6 py-4 font-medium text-slate-100">SaaS Fakturering</td>
                            <td class="px-6 py-4 text-slate-400">Laravel, Livewire, Stripe</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-xs font-medium text-emerald-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Live
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-slate-400 hover:text-violet-400">Redigera</a>
                            </td>
                        </tr>

                        <tr class="transition hover:bg-white/[0.02]">
                            <td class="px-6 py-4 font-medium text-slate-100">Boknings-API</td>
                            <td class="px-6 py-4 text-slate-400">Laravel, Sanctum, Vue</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-xs font-medium text-emerald-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Live
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-slate-400 hover:text-violet-400">Redigera</a>
                            </td>
                        </tr>

                        <tr class="transition hover:bg-white/[0.02]">
                            <td class="px-6 py-4 font-medium text-slate-100">Utvecklarblogg CMS</td>
                            <td class="px-6 py-4 text-slate-400">Laravel, Alpine.js, Tailwind</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 px-2.5 py-0.5 text-xs font-medium text-amber-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span> Utkast
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-slate-400 hover:text-violet-400">Redigera</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sidopanel: Senaste meddelanden (Tar upp 1 av 3 kolumner) -->
        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6">
            <h2 class="text-base font-semibold text-slate-100">Senaste meddelanden</h2>
            <p class="mt-1 text-xs text-slate-400">Från kontaktformuläret på portfolion</p>

            <div class="mt-6 space-y-5">
                <div class="border-b border-white/10 pb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-200">Anna Lindqvist</span>
                        <span class="text-xs text-slate-500">2 tim sedan</span>
                    </div>
                    <p class="mt-1 line-clamp-2 text-xs text-slate-400">
                        Hej! Vi söker en Laravel-utvecklare för ett kortare konsultuppdrag i höst...
                    </p>
                </div>

                <div class="border-b border-white/10 pb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-200">Johan Berg</span>
                        <span class="text-xs text-slate-500">Igår</span>
                    </div>
                    <p class="mt-1 line-clamp-2 text-xs text-slate-400">
                        Grymt snygg portfolio! Skulle gärna vilja diskutera ett API-projekt.
                    </p>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-200">TechRekryt AB</span>
                        <span class="text-xs text-slate-500">3 dagar sedan</span>
                    </div>
                    <p class="mt-1 line-clamp-2 text-xs text-slate-400">
                        Tack för din ansökan, vi vill gärna boka in ett första samtal.
                    </p>
                </div>
            </div>

            <a href="#" class="mt-6 block w-full rounded-lg border border-white/10 bg-slate-950 py-2 text-center text-xs font-medium text-slate-300 transition hover:border-violet-500/50 hover:text-violet-400">
                Öppna inkorgen
            </a>
        </div>

    </div>
</div>
@endsection