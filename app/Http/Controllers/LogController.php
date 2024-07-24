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

    public function index(ShowAuditRequest $request)
    {
        $logs = $this->logService->index($request->validated());

        return view('audit.index', ['logs' => $logs]);
    }

    public function api_index(ShowAuditRequest $request)
    {
        $logs = $this->logService->index($request->validated());

        return response(json_encode($logs, JSON_PRETTY_PRINT))->header('Content-Type', 'text/plain');
    }
}
