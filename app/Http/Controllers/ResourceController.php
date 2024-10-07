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
        // Fetch all resources with their category names
        $resources = Resource::with('category')->get();

        $baseUrl = url('storage');

        // Map resources to include necessary details and category info
        $resourcesWithDetails = $resources->map(function ($resource) use ($baseUrl) {
            // Append base URL to the path and thumbnail
            $resource->path = $baseUrl . '/' . $resource->path;
            $resource->thumbnail = $baseUrl . '/' . $resource->thumbnail;

            // Check if animation_type is "Video" to set isVideo
            $resource->isVideo = $resource->animation_type === 'Video';

            // Return the resource details along with the category info
            return [
                'id' => $resource->id,
                'name' => $resource->name,
                'path' => $resource->path,
                'thumbnail' => $resource->thumbnail,
                'category' => $resource->category->name, // Fetch category name here
                'category_id' => $resource->category->id, // Fetch category ID here
                'isVideo' => $resource->isVideo
            ];
        });

        // Group resources by category name
        $groupedResources = $resourcesWithDetails->groupBy('category');

        // Structure the response
        // Structure the response
        $response = $groupedResources->map(function ($animations, $categoryName) {
            return [
                'category' => $categoryName, // Use category name here
                'category_id' => $animations[0]['category_id'], // Access category_id from the first animation
                // 'animations' => $animations->toArray() // Animations array
                'animations' => $animations->shuffle()->toArray() // Animations array
            ];
        })->values();


        return response()->json($response);
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
