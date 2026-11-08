@extends('layouts.app')

@section('title', 'Nytt projekt | Admin')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-12 mt-12">

    <!-- Sidhuvud -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-white/10 pb-8">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                <span class="text-xs font-medium uppercase tracking-wider text-violet-400">Admin & Portfolio</span>
            </div>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-100">
                Skapa nytt projekt
            </h1>
            <p class="mt-1 text-sm text-slate-400">
                Lägg till ett nytt projekt med omslagsbild och galleribilder i din portfolio.
            </p>
        </div>

        <a href="{{ route('dashboard') }}" class="rounded-lg border border-white/10 bg-slate-900 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
            ← Tillbaka
        </a>
    </div>

    <!-- Valideringsfel -->
    @if ($errors->any())
    <div class="mt-6 rounded-xl border border-rose-500/20 bg-rose-500/10 p-4 text-sm text-rose-300">
        <p class="font-semibold text-rose-200">Det uppstod några fel i formuläret:</p>
        <ul class="mt-2 list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Formulär -->
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-8">
        @csrf

        <!-- Grundinformation -->
        <div class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm space-y-6">
            <h2 class="text-base font-semibold text-slate-100 border-b border-white/10 pb-4">
                Projektinformation
            </h2>

            <!-- Titel -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-300">Projekttitel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    placeholder="t.ex. SaaS Faktureringssystem"
                    class="mt-2 block w-full rounded-lg border border-white/10 bg-slate-950 px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500">
            </div>

            <!-- Beskrivning -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-300">Beskrivning</label>
                <textarea name="description" id="description" rows="5" required
                    placeholder="Beskriv projektet, tekniker som använts och vilka problem det löser..."
                    class="mt-2 block w-full rounded-lg border border-white/10 bg-slate-950 px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500">{{ old('description') }}</textarea>
            </div>

            <!-- Huvudbild -->
            <div>
                <label for="image" class="block text-sm font-medium text-slate-300">Huvudbild (Omslag)</label>
                <input type="file" name="image" id="image" accept="image/*" required
                    class="mt-2 block w-full text-sm text-slate-400 file:mr-4 file:rounded-lg file:border-0 file:bg-violet-600/20 file:px-4 file:py-2 file:text-sm file:font-medium file:text-violet-400 hover:file:bg-violet-600/30 cursor-pointer">
                <p class="mt-1.5 text-xs text-slate-500">PNG, JPG eller WEBP (max 4MB). Visas på projektkortet.</p>
            </div>
        </div>

        <!-- Galleribilder (ProjectImage) -->
        <div x-data="{ items: [] }" class="rounded-xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-sm space-y-6">
            <div class="flex items-center justify-between border-b border-white/10 pb-4">
                <div>
                    <h2 class="text-base font-semibold text-slate-100">Galleribilder (Valfritt)</h2>
                    <p class="text-xs text-slate-400">Lägg till extra skärmdumpar med bildtext för projektsidan.</p>
                </div>
                <button type="button" @click="items.push(Date.now())"
                    class="rounded-lg border border-violet-500/30 bg-violet-500/10 px-3 py-1.5 text-xs font-medium text-violet-300 transition hover:bg-violet-500/20">
                    + Lägg till bild
                </button>
            </div>

            <template x-if="items.length === 0">
                <p class="text-center py-6 text-sm text-slate-500 border border-dashed border-white/10 rounded-lg">
                    Inga extra galleribilder tillagda ännu.
                </p>
            </template>

            <div class="space-y-4">
                <template x-for="(id, index) in items" :key="id">
                    <div class="grid grid-cols-1 gap-4 rounded-lg border border-white/10 bg-slate-950/60 p-4 sm:grid-cols-12 items-end">
                        <div class="sm:col-span-5">
                            <label class="block text-xs font-medium text-slate-400">Bildfil</label>
                            <input type="file" :name="'gallery[' + index + '][image]'" accept="image/*" required
                                class="mt-1.5 block w-full text-xs text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-slate-800 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-slate-200 hover:file:bg-slate-700">
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-xs font-medium text-slate-400">Bildtext (Caption)</label>
                            <input type="text" :name="`gallery[${index}][caption]`" placeholder="t.ex. Vy över adminpanelen"
                                class="mt-1.5 block w-full rounded-lg border border-white/10 bg-slate-900 px-3 py-1.5 text-sm text-slate-100 placeholder-slate-500 focus:border-violet-500 focus:outline-none">
                        </div>

                        <div class="sm:col-span-1 text-right">
                            <button type="button" @click="items.splice(index, 1)"
                                class="rounded-lg p-2 text-slate-500 hover:bg-rose-500/10 hover:text-rose-400 transition" title="Ta bort">
                                ✕
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Spara-knappar -->
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('admin.index') }}" class="rounded-lg border border-white/10 bg-slate-900 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                Avbryt
            </a>
            <button type="submit" class="rounded-lg bg-violet-600 px-6 py-2.5 text-sm font-medium text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-500 cursor-pointer">
                Spara projekt
            </button>
        </div>
    </form>
</div>
@endsection