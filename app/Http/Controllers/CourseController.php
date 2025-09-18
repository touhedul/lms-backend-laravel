<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\Level;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        $course = Course::create([
            'title' => $validated['title'],
            'user_id' => auth()->id(),
        ]);

        return response()->json($course, 201);
    }

    public function show(Course $course)
    {
        return $course;
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validated = $request->validated();

        $course->update($validated);

        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }

    public function metadata()
    {
        return [
            'categories' => Category::all(),
            'levels' => Level::all(),
            'languages' => Language::all(),
        ];
    }
}
