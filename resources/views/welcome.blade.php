@extends('layouts.app')

@section('title', 'Portfolio | Laravel Developer')

@section('description', 'Utforska mina webbprojekt och lösningar byggda med Laravel, PHP och modern webbteknik.')

@section('content')

{{-- HERO --}}
<section id="home" class="relative overflow-hidden pt-36 pb-24 lg:pt-48 lg:pb-36">

    {{-- Background effects --}}
    <div class="pointer-events-none absolute -top-40 left-1/2 h-96 w-96 -translate-x-1/2 rounded-full bg-violet-600/20 blur-[120px]"></div>

    <div class="mx-auto max-w-7xl px-6">

        <div class="relative mx-auto max-w-4xl text-center">

            <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-violet-500/30 bg-violet-500/10 px-4 py-2">
                <span class="h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                <span class="text-sm font-medium text-violet-300">
                    Laravel Developer · Open to opportunities
                </span>
            </div>

            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">
                Jag bygger
                <span class="bg-gradient-to-r from-violet-400 via-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    digitala lösningar
                </span>
                som gör skillnad.
            </h1>

            <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-slate-400">
                Välkommen till min portfolio! Här visar jag upp webbapplikationer,
                system och kreativa lösningar som jag utvecklat med Laravel,
                PHP och modern webbteknik.
            </p>

            <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">

                <a href="#projects"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-7 py-4 font-semibold text-white shadow-lg shadow-violet-600/20 transition hover:-translate-y-1 hover:bg-violet-500">
                    Se mina projekt

                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>

                <a href="#contact"
                    class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/5 px-7 py-4 font-semibold text-white transition hover:bg-white/10">
                    Kontakta mig
                </a>

            </div>

            {{-- Tech stack preview --}}
            <div class="mt-20 border-t border-white/10 pt-10">

                <p class="mb-6 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                    Tekniker jag arbetar med
                </p>

                <div class="flex flex-wrap justify-center gap-x-8 gap-y-5 text-sm font-semibold text-slate-400">

                    <span>Laravel</span>
                    <span>PHP</span>
                    <span>MySQL</span>
                    <span>Tailwind CSS</span>
                    <span>Alpine.js</span>
                    <span>JavaScript</span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- PROJECTS --}}
<section id="projects" class="border-t border-white/5 bg-slate-900/50 py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-14 flex flex-col justify-between gap-6 sm:flex-row sm:items-end">

            <div>
                <span class="text-sm font-semibold uppercase tracking-widest text-violet-400">
                    Portfolio
                </span>

                <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                    Utvalda projekt
                </h2>

                <p class="mt-4 max-w-xl text-slate-400">
                    Ett urval av applikationer och system som jag har utvecklat.
                </p>
            </div>

            <span class="text-sm text-slate-500">
                Mina utvecklingsprojekt
            </span>

        </div>


        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">


            {{-- PROJECT 1 --}}
            <article class="group overflow-hidden rounded-2xl border border-white/10 bg-slate-950 transition duration-300 hover:-translate-y-2 hover:border-violet-500/50">

                <div class="relative overflow-hidden bg-slate-800">

                    <img
                        src="{{ asset('images/projects/project-1.jpg') }}"
                        alt="Skärmdump från projekt ett"
                        class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105">

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 to-transparent"></div>

                </div>

                <div class="p-6">

                    <div class="mb-4 flex flex-wrap gap-2">
                        <span class="rounded-md bg-red-500/10 px-3 py-1 text-xs font-medium text-red-400">Laravel</span>
                        <span class="rounded-md bg-cyan-500/10 px-3 py-1 text-xs font-medium text-cyan-400">Tailwind</span>
                    </div>

                    <h3 class="text-xl font-bold text-white">
                        Projektets namn
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-400">
                        En kort beskrivning av projektet, vilka problem det löser
                        och vilka funktioner som har utvecklats.
                    </p>

                    <a href="#contact"
                        class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-violet-400 transition hover:text-violet-300">
                        Läs mer
                        <span aria-hidden="true">→</span>
                    </a>

                </div>

            </article>


            {{-- PROJECT 2 --}}
            <article class="group overflow-hidden rounded-2xl border border-white/10 bg-slate-950 transition duration-300 hover:-translate-y-2 hover:border-violet-500/50">

                <div class="overflow-hidden bg-slate-800">

                    <img
                        src="{{ asset('images/projects/project-2.jpg') }}"
                        alt="Skärmdump från projekt två"
                        class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105">

                </div>

                <div class="p-6">

                    <div class="mb-4 flex flex-wrap gap-2">
                        <span class="rounded-md bg-red-500/10 px-3 py-1 text-xs font-medium text-red-400">Laravel</span>
                        <span class="rounded-md bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-400">MySQL</span>
                    </div>

                    <h3 class="text-xl font-bold text-white">
                        Projektets namn
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-400">
                        Beskriv projektet och lyft fram de viktigaste funktionerna
                        och teknikerna som användes.
                    </p>

                    <a href="#contact"
                        class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-violet-400 transition hover:text-violet-300">
                        Läs mer →
                    </a>

                </div>

            </article>


            {{-- PROJECT 3 --}}
            <article class="group overflow-hidden rounded-2xl border border-white/10 bg-slate-950 transition duration-300 hover:-translate-y-2 hover:border-violet-500/50">

                <div class="overflow-hidden bg-slate-800">

                    <img
                        src="{{ asset('images/projects/project-3.jpg') }}"
                        alt="Skärmdump från projekt tre"
                        class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105">

                </div>

                <div class="p-6">

                    <div class="mb-4 flex flex-wrap gap-2">
                        <span class="rounded-md bg-red-500/10 px-3 py-1 text-xs font-medium text-red-400">Laravel</span>
                        <span class="rounded-md bg-amber-500/10 px-3 py-1 text-xs font-medium text-amber-400">Alpine.js</span>
                    </div>

                    <h3 class="text-xl font-bold text-white">
                        Projektets namn
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-400">
                        En presentation av ytterligare ett projekt med information
                        om funktionalitet och tekniska lösningar.
                    </p>

                    <a href="#contact"
                        class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-violet-400 transition hover:text-violet-300">
                        Läs mer →
                    </a>

                </div>

            </article>

        </div>

    </div>

</section>


{{-- ABOUT --}}
<section id="about" class="py-24">

    <div class="mx-auto grid max-w-7xl items-center gap-16 px-6 lg:grid-cols-2">

        <div>

            <span class="text-sm font-semibold uppercase tracking-widest text-violet-400">
                Om mig
            </span>

            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                Passion för utveckling och problemlösning.
            </h2>

            <p class="mt-6 leading-8 text-slate-400">
                Jag brinner för att skapa moderna, funktionella och användarvänliga
                webbapplikationer. Mitt huvudsakliga fokus ligger på Laravel och
                PHP där jag bygger allt från administrativa system till
                skräddarsydda webbapplikationer.
            </p>

            <p class="mt-4 leading-8 text-slate-400">
                Jag tycker om hela utvecklingsprocessen – från idé och planering
                till design, databaser, programmering och färdig produkt.
            </p>

            <a href="#contact"
                class="mt-8 inline-flex items-center gap-2 font-semibold text-violet-400 hover:text-violet-300">
                Låt oss prata om ett projekt →
            </a>

        </div>


        {{-- About visual --}}
        <div class="relative">

            <div class="absolute -inset-4 rounded-3xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 blur-2xl"></div>

            <div class="relative rounded-3xl border border-white/10 bg-slate-900 p-8">

                <div class="mb-6 flex items-center gap-3">
                    <div class="h-3 w-3 rounded-full bg-red-400"></div>
                    <div class="h-3 w-3 rounded-full bg-yellow-400"></div>
                    <div class="h-3 w-3 rounded-full bg-green-400"></div>

                    <span class="ml-2 text-xs text-slate-500">developer.php</span>
                </div>

                <div class="space-y-3 font-mono text-sm">

                    <p class="text-violet-400">&lt;?php</p>

                    <p class="text-slate-300">
                        class <span class="text-amber-300">Developer</span>
                    </p>

                    <p class="pl-5 text-slate-400">{</p>

                    <p class="pl-10 text-slate-400">
                        public $name =
                        <span class="text-green-400">'Developer'</span>;
                    </p>

                    <p class="pl-10 text-slate-400">
                        public $focus =
                        <span class="text-green-400">'Laravel'</span>;
                    </p>

                    <p class="pl-10 text-slate-400">
                        public $passion =
                        <span class="text-green-400">'Coding'</span>;
                    </p>

                    <p class="pl-5 text-slate-400">}</p>

                    <p class="pt-3 text-violet-400">// Always learning...</p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- SKILLS --}}
<section id="skills" class="border-y border-white/5 bg-slate-900/50 py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="mx-auto mb-14 max-w-2xl text-center">

            <span class="text-sm font-semibold uppercase tracking-widest text-violet-400">
                Kompetenser
            </span>

            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                Tekniker & verktyg
            </h2>

            <p class="mt-4 text-slate-400">
                Teknikerna jag använder för att bygga moderna och skalbara webbapplikationer.
            </p>

        </div>


        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">

            @php
            $skills = [
            ['name' => 'Laravel', 'description' => 'PHP Framework'],
            ['name' => 'PHP', 'description' => 'Backend Development'],
            ['name' => 'MySQL', 'description' => 'Database'],
            ['name' => 'Tailwind CSS', 'description' => 'Styling'],
            ['name' => 'Alpine.js', 'description' => 'JavaScript'],
            ['name' => 'JavaScript', 'description' => 'Frontend'],
            ['name' => 'Git', 'description' => 'Version Control'],
            ['name' => 'HTML & CSS', 'description' => 'Web Development'],
            ];
            @endphp

            @foreach ($skills as $skill)

            <div class="rounded-2xl border border-white/10 bg-slate-950 p-6 transition hover:border-violet-500/50">

                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>

                <h3 class="font-bold text-white">
                    {{ $skill['name'] }}
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    {{ $skill['description'] }}
                </p>

            </div>

            @endforeach

        </div>

    </div>

</section>


{{-- CONTACT --}}
<section id="contact" class="relative overflow-hidden py-24">

    <div class="pointer-events-none absolute left-1/2 top-1/2 h-96 w-96 -translate-x-1/2 -translate-y-1/2 rounded-full bg-violet-600/10 blur-[120px]"></div>

    <div class="relative mx-auto max-w-3xl px-6 text-center">

        <span class="text-sm font-semibold uppercase tracking-widest text-violet-400">
            Kontakt
        </span>

        <h2 class="mt-4 text-3xl font-bold text-white sm:text-5xl">
            Har du ett intressant projekt?
        </h2>

        <p class="mt-6 text-lg leading-8 text-slate-400">
            Jag är alltid intresserad av nya möjligheter, samarbeten
            och spännande utvecklingsprojekt.
        </p>

        <a href="mailto:din-email@example.com"
            class="mt-10 inline-flex items-center justify-center gap-3 rounded-xl bg-violet-600 px-8 py-4 font-semibold text-white shadow-lg shadow-violet-600/20 transition hover:-translate-y-1 hover:bg-violet-500">

            Kontakta mig

            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>

        </a>

    </div>

</section>

@endsection