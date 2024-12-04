<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreActivityTrackingRequest;
use App\Http\Requests\UpdateActivityTrackingRequest;
use App\Http\Resources\ActivityTrackingResource;
use App\Models\ActivityTracking;

class ActivityTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityTrackingRequest $request)
    {
        $activityTracking = new ActivityTracking();

        $activityTracking->user_id                  = $request->user()->id;
        $activityTracking->date                     = $request->input('date');
        $activityTracking->time                     = $request->input('time');
        $activityTracking->exercise_type            = $request->input('exercise_type');
        $activityTracking->resting_heart_rate       = $request->input('resting_heart_rate');
        $activityTracking->max_heart_rate           = $request->input('max_heart_rate');
        $activityTracking->recovering_heart_rate    = $request->input('recovering_heart_rate');
        $activityTracking->systolic_pressure        = $request->input('systolic_pressure');
        $activityTracking->diastolic_pressure       = $request->input('diastolic_pressure');

        $activityTracking->save();

        return new ActivityTrackingResource($activityTracking);
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityTracking $activityTracking)
    {
        $activityTracking->load('user');

        return new ActivityTrackingResource($activityTracking);
    }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityTrackingRequest $request, ActivityTracking $activityTracking)
    {
        $activityTracking->date                     = $request->input('date');
        $activityTracking->time                     = $request->input('time');
        $activityTracking->exercise_type            = $request->input('exercise_type');
        $activityTracking->resting_heart_rate       = $request->input('resting_heart_rate');
        $activityTracking->max_heart_rate           = $request->input('max_heart_rate');
        $activityTracking->recovering_heart_rate    = $request->input('recovering_heart_rate');
        $activityTracking->systolic_pressure        = $request->input('systolic_pressure');
        $activityTracking->diastolic_pressure       = $request->input('diastolic_pressure');

        $activityTracking->save();

        return new ActivityTrackingResource($activityTracking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityTracking $activityTracking)
    {
        $activityTracking->delete();

        return response()->noContent();
    }
}
