<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function view_event(Request $request)
    {
        $categories = Category::all();

        $added_category = [];

        foreach ($categories as $priorities) {
            if ($priorities->priority != null) {
                $added_category[] = [
                    'id' => $priorities->id,
                    'category_name' => $priorities->name,
                    'priority_value' => $priorities->priority,
                ];
            }
        }

        $filtered_categories = $categories->filter(function ($category) use ($added_category) {
            foreach ($added_category as $added) {
                if ($category->name === $added['category_name']) {
                    return false;
                }
            }
            return true;
        });


        return view('coming_events', ['priority_added_category' => $added_category, 'filtered_categories' => $filtered_categories]);
    }


    public function delete_priority(Request $category_id)
    {
        $category_id = $category_id->category_id;

        $category_data = Category::find($category_id);

        if (!$category_data) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $category_data->priority = null;
        $category_data->save();

        return redirect()->back()->with('success', 'Category has removed from events');
    }


    public function set_category_priority(Request $request)
    {

        $category_id = $request->category;
        $priority_value = $request->priority_value;

        $category_data = Category::find($category_id);

        if (!$category_data){
            return redirect()->back()->with('error','Error Occurred!');
        }

        $category_data->priority = $priority_value;
        $category_data->save();

        return redirect()->back()->with('success','Priority Set Successfully');

    }

}
