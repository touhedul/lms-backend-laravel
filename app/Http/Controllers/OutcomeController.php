<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Http\Requests\StoreOutcomeRequest;
use App\Http\Requests\UpdateOutcomeRequest;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Outcome::where('course_id', $request->query('course_id'))->orderBy('sort_order')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutcomeRequest $request)
    {
        $outcome = Outcome::create($request->validated());
        return $outcome;
    }

    /**
     * Display the specified resource.
     */
    public function show(Outcome $outcome)
    {
        return $outcome;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        $outcome->update($request->validated());
        return $outcome;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outcome $outcome)
    {
        $outcome->delete();
        return response()->noContent();
    }


    public function updateOrder(Request $request)
    {
         foreach ($request->outcomes as $index => $outcomeData) {
            $outcome = Outcome::find($outcomeData['id']);
            if ($outcome) {
                $outcome->sort_order = $index;
                $outcome->save();
            }
        }
        return response()->noContent();
    }
}
