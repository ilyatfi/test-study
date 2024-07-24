<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowAuditRequest;
use App\Services\LogService;

class LogController extends Controller
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function index()
    {
        return view('audit.index');
    }

    public function send_api(ShowAuditRequest $request)
    {
        $logs = $this->logService->send_api($request->validated());

        return view('audit.results', ['logs' => $logs]);
    }
}
