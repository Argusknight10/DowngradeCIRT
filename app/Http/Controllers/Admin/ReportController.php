<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use App\Models\Report;
use Illuminate\Support\Str;
use App\Mail\NotifAdminMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reportsQuery = Report::query()
            ->with('topics') 
            ->select('*')
            ->latest();

        // dd($reportsQuery);
    
        if ($request->query('status')) {
            if ($request->query('status') === 'sudah') {
                $reportsQuery->where('is_solved', true);
            } elseif ($request->query('status') === 'belum') {
                $reportsQuery->where('is_solved', false);
            }
        } else {
            $reportsQuery->where('is_solved', false);
        }
    
        if ($request->query('p')) {
            $reportsQuery->search($request->query('p'));
        }

        $reports = $reportsQuery->paginate(10)->appends($request->query());

        foreach ($reports as $report) {

            $formattedTopics = [];
            $reportTopicNames = $report->topics->pluck('topic', 'id')->toArray();

            foreach ($report->topics as $topic) {
                $topicId = $topic->id;
                $reportDescription = $report->description; 

                if ($topicId == 5) {
                    $formattedTopics[] = '<strong>' . $reportDescription . '</strong>';
                } elseif (isset($reportTopicNames[$topicId])) {
                    $formattedTopics[] = '<strong>' . $reportTopicNames[$topicId] . '</strong>';
                }
            }

            if (count($formattedTopics) == 2) {
                $reportTopic = implode(' dan ', $formattedTopics);
            } elseif (count($formattedTopics) > 2) {
                $lastTopic = array_pop($formattedTopics);
                $reportTopic = implode(', ', $formattedTopics) . ' dan ' . $lastTopic;
            } else {
                $reportTopic = implode(', ', $formattedTopics);
            }

            $report->formattedTopics = $reportTopic;
        }

        // dd($reports);
    
        return view('admin.sections.reports.index', [
            'reports' => $reports
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showReports()
    {
        $reports = Report::with('topics')->get();
        // dd($reports);
        return view('admin.reports.index', compact('reports'));
    }

    public function update(UpdateReportRequest $request, Report $report)
    {
        $validatedData = $request->all();
        // dd($validatedData);

        $validatedData['topic'] = $request->input('topic');

        if ($request->has('topics')) {
            $report->topics()->sync($validatedData['topics']);
        }
        
        $reporterName = $validatedData['name'];
        $reporterEmail = $validatedData['email'];
        $reportTopic = $validatedData['topics']; 
        $reportDescription = $validatedData['description']; 

        // dd($validatedData['description']);

        $reportTopicNames = Topic::whereIn('id', $validatedData['topics'])->pluck('topic', 'id')->toArray();

        $formattedTopics = [];

        foreach ($validatedData['topics'] as $topicId) {
            if ($topicId == 5) {
                $formattedTopics[] = '<strong>' . $reportDescription . '</strong>';
            } elseif (isset($reportTopicNames[$topicId])) {
                $formattedTopics[] = '<strong>' . $reportTopicNames[$topicId] . '</strong>';
            }
        }

        if (count($formattedTopics) == 2) {
            $reportTopic = implode(' dan ', $formattedTopics);
        } elseif (count($formattedTopics) > 2) {
            $lastTopic = array_pop($formattedTopics);
            $reportTopic = implode(', ', $formattedTopics) . ' dan ' . $lastTopic;
        } else {
            $reportTopic = implode(', ', $formattedTopics);
        }
        // dd($reportTopic);

        if ($request->hasFile('image')) {
            // don't remove if image generate by seeder
            if ($report->image !== 'reports/article-test.png') {
                Storage::delete($report->image);
            }

            $validatedData['image'] = $request->file('image')->store('reports', 'public');
        }

        // dd($reporterEmail);

        if ($validatedData['is_solved'] == 1) {
            Mail::to($reporterEmail)->send(new NotifAdminMail($reporterName, $reporterEmail, $reportTopic));
        }
        $report->update($validatedData);

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Masalah Berhasil Ditangani');
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
