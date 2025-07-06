<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HarvestPrediction;

class PredictionController extends Controller
{
    public function savePrediction(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'plant' => 'required|string',
            'soil' => 'required|string',
            'harvestTime' => 'required|string',
            'carePlan' => 'required|array',
        ]);

       // Simpan ke database
        $prediction = HarvestPrediction::create([
            'user_id' => auth()->id(),
            'title' => 'Prediksi panen ' . $request->plant,
            'location' => $request->location,
            'plant_type' => $request->plant,
            'soil_condition' => $request->soil,
            'harvest_time' => $request->harvestTime,
            'care_plan' => json_encode($request->carePlan),
            'prediction_date' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}