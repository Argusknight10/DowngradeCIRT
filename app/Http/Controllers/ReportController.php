<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.sections.reports-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('reports');
        }

        $validatedData['created_at'] = now();

        Report::create($validatedData);

        return redirect()->route('home')->with('success', 'Terimakasih, Form pengaduan berhasil dikirimkan');
    }
}
