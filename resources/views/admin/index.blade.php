@extends('layouts.app')

@section('title', 'Hantera projekt | Admin')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-12 mt-12">

    <!-- Sidhuvud (matchar create-sidan) -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-white/10 pb-8">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                <span class="text-xs font-medium uppercase tracking-wider text-violet-400">Admin & Portfolio</span>
            </div>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-100">
                Hantera projekt
            </h1>
            <p class="mt-1 text-sm text-slate-400">
                Redigera, uppdatera eller radera befintliga projekt i din portfolio.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="rounded-lg border border-white/10 bg-slate-900 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                ← Dashboard
            </a>
            <a href="{{ route('admin.create') }}" class="rounded-lg bg-violet-600 px-4 py-2.5 text-sm font-medium text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-500">
                + Nytt projekt
            </a>
        </div>
    </div>

    <!-- Bekräftelsemeddelande vid skapande/ändring/radering -->
    @if (session('success'))
    <div class="mt-6 rounded-xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-sm text-emerald-300">
        {{ session('success') }}
    </div>
    @endif

    <!-- Projektlista -->
    <div class="mt-8 rounded-xl border border-white/10 bg-slate-900/50 backdrop-blur-sm overflow-hidden">
        <div class="flex items-center justify-between border-b border-white/10 p-6">
            <div>
                <h2 class="text-base font-semibold text-slate-100">Mina projekt</h2>
                <p class="text-xs text-slate-400 py-3">Totalt {{ $projects->count() }} projekt i din portfolio.</p>
            </div>
        </div>

        @if ($projects->isEmpty())
        <div class="p-12 text-center">
            <p class="text-sm text-slate-400">Du har inte skapat några projekt ännu.</p>
            <a href="{{ route('admin.create') }}" class="mt-4 inline-block rounded-lg border border-violet-500/30 bg-violet-500/10 px-4 py-2 text-xs font-medium text-violet-300 transition hover:bg-violet-500/20">
                + Skapa ditt första projekt
            </a>
        </div>
        @else
        <div class="divide-y divide-white/10">
            @foreach ($projects as $project)
            <div class="flex flex-col gap-4 p-6 sm:flex-row sm:items-center sm:justify-between transition hover:bg-slate-800/30">

                <!-- Bild, titel & beskrivning -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"
                        class="h-16 w-24 shrink-0 rounded-lg border border-white/10 object-cover bg-slate-950">
                    <div>
                        <h3 class="text-base font-semibold text-slate-100">{{ $project->title }}</h3>
                        <p class="mt-1 line-clamp-1 text-sm text-slate-400 max-w-md">
                            {{ $project->description }}
                        </p>
                        <span class="mt-1.5 inline-block text-xs text-slate-500">
                            Skapad: {{ $project->created_at->format('Y-m-d') }}
                        </span>
                    </div>
                </div>

                <!-- Åtgärder (Ändra & Radera) -->
                <div class="flex items-center gap-3 self-end sm:self-center shrink-0">
                    <a href="{{ route('admin.edit', $project) }}"
                        class="rounded-lg border border-white/10 bg-slate-900 px-3.5 py-2 text-xs font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        Ändra
                    </a>

                    <form action="{{ route('admin.destroy', $project) }}" method="POST"
                        onsubmit="return confirm('Är du säker på att du vill radera detta projekt?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="rounded-lg border border-rose-500/20 bg-rose-500/10 px-3.5 py-2 text-xs font-medium text-rose-300 transition hover:bg-rose-500/20 hover:text-rose-200 cursor-pointer">
                            Radera
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>
        @endif
    </div>

</div>
@endsection