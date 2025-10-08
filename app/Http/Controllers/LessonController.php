<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Lesson::where('chapter_id', $request->query('chapter_id'))->orderBy('sort_order')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());
        return $lesson;
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return $lesson;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());
        return $lesson;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->noContent();
    }


    public function updateOrder(Request $request)
    {
        foreach ($request->lessons as $index => $lessonData) {
            $lesson = Lesson::find($lessonData['id']);
            $chapterId = $lesson->chapter_id;
            if ($lesson) {
                $lesson->sort_order = $index;
                $lesson->save();
            }
        }
        $chapter = Chapter::where('id',$chapterId)->with('lessons')->first();
        return $chapter;
    }

    public function uploadVideo(Request $request, Lesson $lesson)
    {
        $request->validate([
            'video' => 'required|mimes:mp4|max:20480',
        ]);

        $path = $request->file('video')->store('lesson-video','public');

        $lesson->update(['video' => $path]);

        return response()->json($lesson);
    }
}
