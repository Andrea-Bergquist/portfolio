<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $project = Project::with('images')->findOrFail($id);

        return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],

            // Befintliga galleribilder
            'existing_gallery' => ['nullable', 'array'],
            'existing_gallery.*.caption' => ['nullable', 'string', 'max:255'],
            'delete_gallery' => ['nullable', 'array'],
            'delete_gallery.*' => ['integer', 'exists:project_images,id'],

            // Nya galleribilder
            'gallery' => ['nullable', 'array'],
            'gallery.*.image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'gallery.*.caption' => ['nullable', 'string', 'max:255'],
        ]);

        // 1. Hantera ny omslagsbild (sparas i public/img)
        if ($request->hasFile('image')) {
            // Radera gamla bilden från public/img om den finns
            if ($project->image && File::exists(public_path('img/' . $project->image))) {
                File::delete(public_path('img/' . $project->image));
            }

            // Skapa unikt filnamn och flytta till public/img
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);

            $validated['image'] = $filename;
        }

        // 2. Uppdatera grundinformationen
        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? $project->image,
        ]);

        // 3. Radera befintliga galleribilder som markerats med "Ta bort"
        if ($request->filled('delete_gallery')) {
            $imagesToDelete = $project->images()->whereIn('id', $validated['delete_gallery'])->get();

            foreach ($imagesToDelete as $img) {
                if ($img->image && File::exists(public_path('img/' . $img->image))) {
                    File::delete(public_path('img/' . $img->image));
                }
                $img->delete();
            }
        }

        // 4. Uppdatera bildtexter (captions) på kvarvarande galleribilder
        if ($request->filled('existing_gallery')) {
            foreach ($validated['existing_gallery'] as $id => $data) {
                if (in_array($id, $validated['delete_gallery'] ?? [])) {
                    continue;
                }

                $project->images()->where('id', $id)->update([
                    'caption' => $data['caption'] ?? null,
                ]);
            }
        }

        // 5. Spara eventuella nya galleribilder i public/img
        if ($request->has('gallery')) {
            foreach ($request->gallery as $item) {
                if (isset($item['image'])) {
                    $galleryFile = $item['image'];
                    $galleryFilename = time() . '_' . uniqid() . '.' . $galleryFile->getClientOriginalExtension();
                    $galleryFile->move(public_path('img'), $galleryFilename);

                    $project->images()->create([
                        'image' => $galleryFilename,
                        'caption' => $item['caption'] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.index')
            ->with('success', 'Projektet har uppdaterats!');
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
