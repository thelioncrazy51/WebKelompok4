<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarvestPrediction extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'location',
        'plant_type',
        'soil_condition',
        'harvest_time',
        'care_plan',
        'prediction_date'
    ];

    protected $casts = [
        'care_plan' => 'array',
        'prediction_date' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}