<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $resources = Resource::with('category')->get();

        $baseUrl = url('storage');
        $resourcesWithDetails = $resources->map(function ($resource) use ($baseUrl) {
            $resource->path = $baseUrl . '/' . $resource->path;
            $resource->thumbnail = $baseUrl . '/' . $resource->thumbnail;
            $resource->isVideo = $resource->animation_type === 'Video';
            return [
                'id' => $resource->id,
                'name' => $resource->name,
                'path' => $resource->path,
                'thumbnail' => $resource->thumbnail,
                'category' => $resource->category->name,
                'category_id' => $resource->category->id,
                'isVideo' => $resource->isVideo
            ];
        });

        $groupedResources = $resourcesWithDetails->groupBy('category');
        $response = $groupedResources->map(function ($animations, $categoryName) {

            $category = Resource::with('category')
                ->where('category_id', $animations[0]['category_id'])
                ->first()->category;

            return [
                'category' => $categoryName,
                'category_id' => $animations[0]['category_id'],
                'priority' => $category->priority,
                'visibility' => $category->visibility,
                'animations' => $animations->shuffle()->toArray(),
            ];
        })->values();


        $sortedResponse = collect($response)->sort(function ($a, $b) {
            // Check if both priorities are null
            if (is_null($a['priority']) && is_null($b['priority'])) return 0;
            if (is_null($a['priority'])) return 1;
            if (is_null($b['priority'])) return -1;

            return $a['priority'] <=> $b['priority'];
        })->values();


        return response()->json($sortedResponse);


    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'path' => 'required|file|mimes:mp4,avi,mov,flv,webm,json|max:10240',
                'thumbnail' => 'required|file|mimes:jpg,jpeg,webp|max:10240',
            ]);

            $filePath = $request->file('path')->store('resources', 'public');
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
            $resource = Resource::create([
                'name' => $validated['name'],
                'path' => $filePath,
                'thumbnail' => $thumbnailPath,
            ]);

            return response()->json($resource, 201);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->validator->errors(),
                'message' => 'Validation failed',
            ], 422);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Resource::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update($request->all());
        return response()->json($resource);
    }

    public function destroy(string $id)
    {
        $resource = Resource::find($id);

        if ($resource) {
            $resource->delete();
            return response()->json(['message' => 'Resource deleted successfully.'], 200);
        } else {
            return response()->json(['message' => 'Resource not found.'], 404);
        }
    }
}
