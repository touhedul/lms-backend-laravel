<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Http\Requests\StoreRequirementRequest;
use App\Http\Requests\UpdateRequirementRequest;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Requirement::where('course_id', $request->query('course_id'))->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequirementRequest $request)
    {
        $requirement = Requirement::create($request->validated());
        return $requirement;
    }

    /**
     * Display the specified resource.
     */
    public function show(Requirement $requirement)
    {
        return $requirement;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequirementRequest $request, Requirement $requirement)
    {
        $requirement->update($request->validated());
        return $requirement;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        return response()->noContent();
    }
}
