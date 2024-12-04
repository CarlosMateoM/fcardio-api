<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                        => $this->id,
            'height'                    => $this->height,
            'weight'                    => $this->weight,
            'birthdate'                 => $this->birthdate,
            'blood_type'                => $this->blood_type,
            'phone_number'              => $this->phone_number,
            'history'                   => $this->history,
            'emergency_contact_name'    => $this->emergency_contact_name,
            'emergency_contact_phone'   => $this->emergency_contact_phone,
            'user'                      => new UserResource($this->whenLoaded('user')),
        ]; 
    }
}
