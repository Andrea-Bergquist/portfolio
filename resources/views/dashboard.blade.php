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
            <a href="{{ route('admin.index') }}" class="rounded-lg border border-white/10 bg-slate-900 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                Visa alla projekt
            </a>
            <a href="{{ route('admin.create') }}" class="rounded-lg bg-violet-600 px-4 py-2.5 text-sm font-medium text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-500">
                + Nytt projekt
            </a>
        </div>
    </div>

</div>
@endsection