<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {

        $reportsHandled = Report::where('is_solved', true)->count(); 
        $totalReports = Report::count(); 
        $totalReporters = Report::distinct('email')->count(); 
        
        $reports = Report::select('id', 'name', 'email', 'is_solved', 'created_at')->latest()->get();

        return view('admin.sections.dashboard', compact('reportsHandled', 'totalReports', 'totalReporters', 'reports'));
    }
}