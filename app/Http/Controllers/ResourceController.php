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
        return $this->category_api();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $app_version = $request->input('version');
        return $this->category_api($app_version);
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


    // api function
    public function category_api($app_version = 'default_version')
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
                'isVideo' => $resource->isVideo,
                'priority' => $resource->category->priority,
                'order' => $resource->position,
            ];
        });


        $groupedResources = $resourcesWithDetails
        ->groupBy('category')
        ->map(function ($group) {
            return $group->sortBy('order')->values();
        });




        $response = $groupedResources->map(function ($animations, $categoryName) use ($app_version) {

            $category = Resource::with('category')
                ->where('category_id', $animations[0]['category_id'])
                ->first()->category;

            return [
                'app_version' => $app_version,
                'category' => $categoryName,
                'category_id' => $animations[0]['category_id'],
                'priority' => $category->priority,
                'visibility' => $category->visibility,
                // 'animations' => collect($animations)->shuffle(),
                'animations' => collect($animations),
            ];
        })->values();


        $withPriority = $response->filter(function ($item) {
            return $item['priority'] !== null;
        });

        $withoutPriority = $response->filter(function ($item) {
            return $item['priority'] === null;
        });

        // $withoutPriority = $withoutPriority->shuffle();


        $finalResponse = $withPriority->merge($withoutPriority);


        $sortedResponse = $finalResponse->sort(function ($a, $b) {
            if (is_null($a['priority']) && is_null($b['priority'])) return 0;
            if (is_null($a['priority'])) return 1;
            if (is_null($b['priority'])) return -1;

            return $a['priority'] <=> $b['priority'];
        })->values();

        return response()->json($sortedResponse);
    }
}
