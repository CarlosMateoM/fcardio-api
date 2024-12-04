<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTracking extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityTrackingFactory> */
    use HasFactory;


    protected $fillable = [
        'user_id',
        'date',
        'time',
        'exercise_type',
        'resting_heart_rate',
        'max_heart_rate',
        'recovering_heart_rate',
        'systolic_pressure',
        'diastolic_pressure',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
