<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalProfileRequest;
use App\Http\Requests\UpdateMedicalProfileRequest;
use App\Http\Resources\MedicalProfileResource;
use App\Models\MedicalProfile;

class MedicalProfileController extends Controller
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
     * 
     * @param  StoreMedicalProfileRequest  $request
     */
    public function store(StoreMedicalProfileRequest $request)
    {
        $medicalProfile = new MedicalProfile();

        $medicalProfile->user_id                    = $request->user()->id;
        $medicalProfile->height                     = $request->input('height');
        $medicalProfile->weight                     = $request->input('weight');
        $medicalProfile->birthdate                  = $request->input('birthdate');
        $medicalProfile->blood_type                 = $request->input('blood_type');
        $medicalProfile->phone_number               = $request->input('phone_number');
        $medicalProfile->history                    = $request->input('history');
        $medicalProfile->emergency_contact_name     = $request->input('emergency_contact_name');
        $medicalProfile->emergency_contact_phone    = $request->input('emergency_contact_phone');

        $medicalProfile->save();

        return new MedicalProfileResource($medicalProfile);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalProfile $medicalProfile)
    {
        $medicalProfile->load('user');

        return new MedicalProfileResource($medicalProfile);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalProfileRequest $request, MedicalProfile $medicalProfile)
    {
        $medicalProfile->height                     = $request->input('height');
        $medicalProfile->weight                     = $request->input('weight');
        $medicalProfile->birthdate                  = $request->input('birthdate');
        $medicalProfile->blood_type                 = $request->input('blood_type');
        $medicalProfile->phone_number               = $request->input('phone_number');
        $medicalProfile->history                    = $request->input('history');
        $medicalProfile->emergency_contact_name     = $request->input('emergency_contact_name');
        $medicalProfile->emergency_contact_phone    = $request->input('emergency_contact_phone');

        $medicalProfile->save();

        return new MedicalProfileResource($medicalProfile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalProfile $medicalProfile)
    {
        $medicalProfile->delete();

        return response()->noContent();
    }
}
