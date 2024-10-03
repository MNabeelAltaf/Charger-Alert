<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function index()
    {

        // Get all resources
        // $resources = Resource::all();
        // $baseUrl = url('storage');
        // $videoExtensions = ['mp4', 'avi', 'mov', 'flv', 'webm'];
        // $resourcesWithDetails = $resources->map(function ($resource) use ($baseUrl, $videoExtensions) {
        //     $resource->path = $baseUrl . '/' . $resource->path; // Append base URL to the path
        //     $resource->thumbnail = $baseUrl . '/' . $resource->thumbnail; // Append base URL to the path
        //     $resource->isVideo = in_array(pathinfo($resource->path, PATHINFO_EXTENSION), $videoExtensions);
        //     return $resource;
        // });
        // return view('dashboard', compact('resourcesWithDetails'));


        $all_categories = Category::get();

        return view('dashboard', compact('all_categories'));
    }

    public function view_category_animations(Request $request)
    {

        $categoryID = $request->category_id;

        $category = Category::find($categoryID);

        if ($category) {
            $categoryName = $category->name;
        } else {

            return back()->with('error', 'Category not found.');
        }

        $animations = Resource::where('category_id', $categoryID)->get();

        return view('view_all_animations', ['animations' => $animations, 'category_name' => $categoryName]);
    }



    public function create_anim(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'path' => 'required|file|mimes:mp4,avi,mov,flv,webm,json,txt|max:10240',
                'thumbnail' => 'required|file|mimes:jpg,jpeg,webp,png|max:10240',
                'category' => 'required',
                'animation_type' => 'required',
            ]);




            $uploadedFile = $request->file('path');
            $extension = $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('resources', uniqid() . '.' . $extension, 'public');

            $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
            Resource::create([
                'name' => $validated['name'],
                'path' => $filePath,
                'thumbnail' => $thumbnailPath,
                'category_id' => $validated['category'],
                'animation_type' => $validated['animation_type'],
            ]);

            return back()->with('success', 'Successfully created');
        } catch (ValidationException $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
    public function add_new_animation()
    {
        $category = Category::get();

        return view('add_new_animation', compact('category'));
    }


    public function view_anim(Request $request)
    {
        $anim_id = $request->animation_id;

        $resource = Resource::where('id', $anim_id)->first();

        $category_id = $resource->category_id;

        $category = Category::where('id', $category_id)->first();


        return view('view_animation', compact('resource', 'category'));
    }


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

    public function edit_animation(Request $request)
    {

        dd("to be implemented");

        $animation_id = $request->item_id;

        $resource = Resource::where('id', $animation_id)->first();

        $category_id = $resource->category_id;

        // already saved category
        $category = Category::where('id', $category_id)->first();


        // all categories in table
        $categories = Category::all();



        return view('edit-animation', compact('resource', 'category', 'categories'));
    }

    public function edit_animation_data(Request $request)
    {

        dd("remaining...");

        $animation_id = $request->item_id; // Ensure this value is passed from the form
        $resource = Resource::findOrFail($animation_id);

        // Update resource properties
        $resource->name = $request->name;
        $resource->category_id = $request->category;
        $resource->animation_type = $request->animation_type;

        // Handle thumbnail file upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $resource->thumbnail = $thumbnailPath;
        }

        // Handle animation file upload
        if ($request->hasFile('path')) {
            $animationPath = $request->file('path')->store('animations', 'public');
            $resource->path = $animationPath;
        }

        // Save the updated resource
        $resource->save();

        // Redirect with a success message
        return back()->with('success', 'Animation data updated successfully.');
    }

    public function edit_category_view(Request $request)
    {

        dd("to be implemented");

        $cat_id = $request->category_id;

        $category_data = Category::where('id', $cat_id)->first();

        return view('edit_category', ['category_data' => $category_data]);
    }

    public function edit_category(Request $request)
    {
        $cat_name = $request->name;
        $cat_thumb = $request->thumb;

        dd($cat_name, $cat_thumb);

    }


    public function category_view()
    {

        $all_categories = Category::all();
        return  view('category', compact('all_categories'));
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $category_name = $request->category;

        $category_name_lower = strtolower($category_name);

        $existingCategory = Category::whereRaw('LOWER(name) = ?', [$category_name_lower])->first();

        if ($existingCategory) {
            return back()->with('error', 'Category already exists.');
        }

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('category_thumbnails', 'public');
        }

        Category::create([
            'name' => $category_name,
            'thumb' => $thumbnailPath ?  $thumbnailPath : null
        ]);

        return back()->with('success', 'Category has been added');
    }



    public function delete_anim(Request $request)
    {



        $animation_id = $request->animation_id;

        $resource = Resource::find($animation_id);

        if ($resource) {
            $resource->delete();
            return redirect()->route('dashboard')
                ->with('success', 'Animation deleted successfully.');
        }

        return redirect()->route('dashboard')
            ->with('error', 'Animation not found.');
    }
}
