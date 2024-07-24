<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LogService
{
    public function index(array $request)
    {
        $startDate = $request['start_date'];
        $endDate = $request['end_date'];

        $logs = Auth::user()
            ->logs()
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->get();
        
        return $logs;
    }
}
