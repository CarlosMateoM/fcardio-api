<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityTrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     * 
     * 
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                        => $this->id,
            'date'                      => $this->date,
            'time'                      => $this->time,
            'exercise_type'             => $this->exercise_type,
            'resting_heart_rate'        => $this->resting_heart_rate,
            'max_heart_rate'            => $this->max_heart_rate,
            'recovering_heart_rate'     => $this->recovering_heart_rate,
            'systolic_pressure'         => $this->systolic_pressure,
            'diastolic_pressure'        => $this->diastolic_pressure,
            'user'                      => new UserResource($this->whenLoaded('user')),
        ];
    }
}
