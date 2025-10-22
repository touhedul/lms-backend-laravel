<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Course;

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

    public function featuredCourses()
    {
        return Course::where('is_featured', true)->get();
    }
}
