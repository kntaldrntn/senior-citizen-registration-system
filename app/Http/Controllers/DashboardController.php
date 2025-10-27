<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SeniorCitizen;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        // 1. Get Total Registered Seniors
        $totalSeniors = SeniorCitizen::count();

        // 2. Get Seniors Registered This Month
        $newThisMonth = SeniorCitizen::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        // 3. Get 5 Most Recently Added Seniors
        $recentSeniors = SeniorCitizen::latest()->take(5)->get();

        // Pass all the statistics to the dashboard view
        return view('dashboard', [
            'totalSeniors' => $totalSeniors,
            'newThisMonth' => $newThisMonth,
            'recentSeniors' => $recentSeniors, 
        ]);
    }
}

