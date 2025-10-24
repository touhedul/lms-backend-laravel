<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Course;
use App\Models\Language;
use App\Models\Level;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        //
        return Category::all();
    }
    public function levels()
    {
        //
        return Level::all();
    }
    public function languages()
    {
        //
        return Language::all();
    }

    public function featuredCourses()
    {
        return Course::where('is_featured', true)->get();
    }

    public function allCourses(Request $request)
    {
        return
            Course::query()
                ->where('status',1)
                ->when($request->category_ids, function($query) use ($request){
                        $query->whereIn('category_id', explode(',', $request->category_ids));
                })
                ->when($request->level_ids, function($query) use ($request){
                        $query->whereIn('level_id', explode(',', $request->level_ids));
                })
                ->when($request->language_ids, function($query) use ($request){
                        $query->whereIn('language_id', explode(',', $request->language_ids));
                })
                ->get();
    }
}
