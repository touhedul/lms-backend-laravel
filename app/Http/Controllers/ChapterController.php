<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Chapter::where('course_id', $request->query('course_id'))->orderBy('sort_order')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->validated());
        return $chapter;
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return $chapter;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());
        $chapter->load('lessons');
        return $chapter;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return response()->noContent();
    }


    public function updateOrder(Request $request)
    {
        $courseId = '';
         foreach ($request->chapters as $index => $chapterData) {
            $chapter = Chapter::find($chapterData['id']);
            $courseId = $chapter->course_id;
            if ($chapter) {
                $chapter->sort_order = $index;
                $chapter->save();
            }
        }

        return Chapter::where('course_id', $courseId)->with('lessons')->orderBy('sort_order')->get();
    }
}
