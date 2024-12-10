<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::latest()->paginate(10);

        return view('admin.sections.reports.index', [
            'reports' => $reports
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return response()->json(['report' => $report]);
    }

    public function update(Request $request, Report $report)
    {
        // $request->validated();

        $payload = $request->all();


        if ($request->has('image')) {
            // don't remove if image generate by seeder
            if ($report->image !== 'reports/article-test.png') {
                Storage::delete($report->image);
            }

            $payload['image'] = $request->file('image')->store('reports');
        }

        $report->update($payload);

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Report berhasil diarsipkan');
    }
}
