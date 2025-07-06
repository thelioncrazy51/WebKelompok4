<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $predictions = HarvestPrediction::where('user_id', auth()->id())
            ->orderBy('prediction_date', 'desc')
            ->get();
        
        return view('history.index', compact('predictions'));
    }

    public function show($id)
    {
        $prediction = HarvestPrediction::where('user_id', auth()->id())
            ->findOrFail($id);
        
        return view('history.show', compact('prediction'));
    }
}
