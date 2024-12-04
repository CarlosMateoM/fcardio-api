<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProfile extends Model
{
    /** @use HasFactory<\Database\Factories\MedicalProfileFactory> */
    use HasFactory;


    protected $fillable = [
        'user_id',
        'height',
        'weight',
        'birthdate',
        'blood_type',
        'phone_number',
        'history',
        'emergency_contact_name',
        'emergency_contact_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
