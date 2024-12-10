<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashedReportController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::onlyTrashed()
            ->latest();

        if ($request->query('q')) {
            $reports->search($request->query('q'));
        }

        return view('admin.sections.reports.trashed', [
            'reports' => $reports->paginate(10)->appends($request->query())
        ]);
    }

    public function restore(string $id)
    {
        $report = Report::withTrashed()->find($id);

        if (!$report) abort(404);

        $report->restore();

        return redirect()
            ->route('admin.trashed.reports.index')
            ->with('success', 'Laporan berhasil dikembalikan');
    }

    public function force(string $id)
    {
        $report = Report::withTrashed()->find($id);

        if (!$report) abort(404);

        if ($report->image) {
            Storage::delete($report->image);
        }

        $report->forceDelete();

        return redirect()
            ->route('admin.trashed.reports.index')
            ->with('success', 'Laporan berhasil dihapus permanen');
    }
}
