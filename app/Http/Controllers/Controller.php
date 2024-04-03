<?php

namespace App\Http\Controllers;

use App\Models\Job_Position;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showLanding(){
        $jobLatest = Job_Position::where('is_active', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();

        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->take(4)
                    ->get();

        return view('home.landing', compact('jobLatest','jobPositions'));
    }

    public function showOld(){
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        return view('home.landingold', compact('jobPositions'));
    }
}