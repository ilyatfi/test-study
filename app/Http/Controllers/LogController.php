<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {
        return view('audit.index');
    }

    public function send_api(Request $request)
    {
        // Validation
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $audit = Auth::user()
            ->logs()
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->get();
        
        return response()->json($audit);
    }
}
