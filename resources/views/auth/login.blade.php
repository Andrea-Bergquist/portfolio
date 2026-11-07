@extends('layouts.app')

@section('title', 'Logga in | DEV.PORTFOLIO')
@section('description', 'Logga in för att hantera projekt och inställningar på portfolion.')

@section('content')

<div class="flex min-h-[calc(100vh-88px)] items-center justify-center px-6 pt-28 pb-12">
    <div class="w-full max-w-md">

        <!-- Kortets rubrik och ikon -->
        <div class="mb-8 text-center">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-indigo-600 shadow-lg shadow-violet-500/20">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-white">
                Välkommen tillbaka
            </h1>
            <p class="mt-2 text-sm text-slate-400">
                Logga in på ditt konto för att komma åt dashboarden.
            </p>
        </div>

        <!-- Inloggningskort -->
        <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-8 shadow-xl backdrop-blur-sm">

            <!-- Sessionsstatus (t.ex. vid återställt lösenord) -->
            @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-400">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- E-postadress -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300">
                        E-postadress
                    </label>
                    <input id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="namn@exempel.se"
                        class="mt-2 block w-full rounded-xl border border-white/10 bg-slate-950/80 px-4 py-3 text-sm text-slate-100 placeholder-slate-500 transition focus:border-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500/20">

                    @error('email')
                    <p class="mt-2 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lösenord -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-slate-300">
                            Lösenord
                        </label>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-xs font-medium text-violet-400 transition hover:text-violet-300">
                            Glömt lösenordet?
                        </a>
                        @endif
                    </div>

                    <input id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="mt-2 block w-full rounded-xl border border-white/10 bg-slate-950/80 px-4 py-3 text-sm text-slate-100 placeholder-slate-500 transition focus:border-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500/20">

                    @error('password')
                    <p class="mt-2 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kom ihåg mig -->
                <div class="flex items-center">
                    <input id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 rounded border-white/10 bg-slate-950 text-violet-600 focus:ring-violet-500 focus:ring-offset-slate-900">
                    <label for="remember_me" class="ml-2.5 text-sm text-slate-400">
                        Kom ihåg mig
                    </label>
                </div>

                <!-- Logga in-knapp -->
                <button type="submit"
                    class="w-full rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                    Logga in
                </button>
            </form>
        </div>

        <!-- Tillbaka-länk -->
        <p class="mt-6 text-center text-xs text-slate-500">
            <a href="{{ url('/') }}" class="transition hover:text-slate-300">
                ← Tillbaka till startsidan
            </a>
        </p>

    </div>
</div>
@endsection