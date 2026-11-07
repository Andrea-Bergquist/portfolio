<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        // Spara huvudbilden i storage/app/public/projects
        $coverPath = $request->file('image')->store('projects', 'public');

        // Skapa projektet
        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $coverPath,
        ]);

        // Spara eventuella galleribilder via relationen images()
        if ($request->has('gallery')) {
            foreach ($request->gallery as $item) {
                if (isset($item['image'])) {
                    $galleryPath = $item['image']->store('projects/gallery', 'public');

                    $project->images()->create([
                        'image' => $galleryPath,
                        'caption' => $item['caption'] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.index')
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
        //
    }
}
