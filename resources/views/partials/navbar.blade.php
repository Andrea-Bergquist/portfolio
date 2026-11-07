<nav
    x-data="{ open: false }"
    class="fixed top-0 z-50 w-full border-b border-white/10 bg-slate-950/90 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-6">

        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ url('/') }}"
                class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-indigo-600 shadow-lg shadow-violet-500/20">
                    <svg class="h-6 w-6 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 17l-5-5 5-5m8 10l5-5-5-5m-2-12l-4 20" />
                    </svg>
                </div>

                <div>
                    <span class="block text-lg font-bold tracking-tight text-white">
                        DEV<span class="text-violet-400">.</span>PORTFOLIO
                    </span>
                    <span class="block text-xs text-slate-500">
                        Laravel Developer
                    </span>
                </div>
            </a>

            {{-- Desktop navigation --}}
            <div class="hidden items-center gap-8 md:flex">

                <a href="#home"
                    class="text-sm font-medium text-slate-300 transition hover:text-violet-400">
                    Hem
                </a>

                <a href="#projects"
                    class="text-sm font-medium text-slate-300 transition hover:text-violet-400">
                    Projekt
                </a>

                <a href="#about"
                    class="text-sm font-medium text-slate-300 transition hover:text-violet-400">
                    Om mig
                </a>

                <a href="#skills"
                    class="text-sm font-medium text-slate-300 transition hover:text-violet-400">
                    Kompetenser
                </a>

                <a href="#contact"
                    class="rounded-xl bg-violet-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-violet-500">
                    Kontakta mig
                </a>

            </div>

            {{-- Mobile menu button --}}
            <button
                @click="open = !open"
                type="button"
                class="rounded-lg p-2 text-slate-300 transition hover:bg-white/10 md:hidden"
                aria-label="Öppna meny"
                :aria-expanded="open">
                <svg x-show="!open"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg x-show="open"
                    x-cloak
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        {{-- Mobile navigation --}}
        <div
            x-show="open"
            x-cloak
            x-transition
            @click.outside="open = false"
            @keydown.escape.window="open = false"
            class="border-t border-white/10 py-5 md:hidden">
            <div class="flex flex-col gap-4">

                <a @click="open = false"
                    href="#home"
                    class="text-sm text-slate-300 hover:text-violet-400">
                    Hem
                </a>

                <a @click="open = false"
                    href="#projects"
                    class="text-sm text-slate-300 hover:text-violet-400">
                    Projekt
                </a>

                <a @click="open = false"
                    href="#about"
                    class="text-sm text-slate-300 hover:text-violet-400">
                    Om mig
                </a>

                <a @click="open = false"
                    href="#skills"
                    class="text-sm text-slate-300 hover:text-violet-400">
                    Kompetenser
                </a>

                <a @click="open = false"
                    href="#contact"
                    class="mt-2 rounded-xl bg-violet-600 px-5 py-3 text-center text-sm font-semibold text-white">
                    Kontakta mig
                </a>

            </div>
        </div>

    </div>
</nav>