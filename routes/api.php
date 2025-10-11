<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LessonController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('courses/{course}/upload-image', [CourseController::class, 'uploadImage']);
    Route::post('courses/publish-unpublish/{course}', [CourseController::class, 'publishUnpublish']);
    Route::get('courses/my', [CourseController::class, 'myCourses']);
    Route::apiResource('courses', CourseController::class);
    Route::get('course-metadata', [CourseController::class, 'metadata']);

    Route::apiResource('outcomes', OutcomeController::class);
    Route::post('/outcome-order', [OutcomeController::class, 'updateOrder']);

    Route::apiResource('requirements', RequirementController::class);
    Route::post('/requirement-order', [RequirementController::class, 'updateOrder']);

    Route::apiResource('chapters', ChapterController::class);
    Route::post('/chapter-order', [ChapterController::class, 'updateOrder']);

    Route::post('lessons/{lesson}/upload-video', [LessonController::class, 'uploadVideo']);
    Route::apiResource('lessons', LessonController::class);
    Route::post('/lesson-order', [LessonController::class, 'updateOrder']);

});
