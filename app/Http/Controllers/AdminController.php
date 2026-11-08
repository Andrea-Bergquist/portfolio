<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('images')->latest()->get();

        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'max:4096'],
            'gallery' => ['nullable', 'array'],
            'gallery.*.image' => ['required', 'image', 'max:4096'],
            'gallery.*.caption' => ['nullable', 'string', 'max:255'],
        ]);

        // Spara huvudbilden i public/img
        $coverFile = $request->file('image');
        $coverName = time() . '_' . Str::random(8) . '.' . $coverFile->getClientOriginalExtension();
        $coverFile->move(public_path('img'), $coverName);
        $coverPath = 'img/' . $coverName;

        // Skapa projektet
        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $coverPath,
        ]);

        // Spara eventuella galleribilder i public/img
        $gallery = $request->file('gallery', []);

        foreach ($gallery as $index => $item) {
            if (isset($item['image'])) {
                $galleryFile = $item['image'];

                $galleryName = time() . '_' . Str::random(8) . '.' .
                    $galleryFile->getClientOriginalExtension();

                $galleryFile->move(public_path('img'), $galleryName);

                $project->images()->create([
                    'image' => 'img/' . $galleryName,
                    'caption' => $request->input("gallery.$index.caption"),
                ]);
            }
        }

        return redirect()
            ->route('dashboard')
            ->with('success', 'Projektet har sparats!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', 'Projektet har tagits bort!');
    }
}
