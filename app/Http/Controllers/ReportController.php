<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Report;
use App\Mail\NotifUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.sections.reports-create', ['topics' => Topic::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $validatedData = $request->validated();
        // dd($request->all());

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('reports', 'public');
        }

        $validatedData['created_at'] = now();

        $report = Report::create($validatedData);

        if ($request->has('topics')) {
            $report->topics()->sync($validatedData['topics']);
        }

        $reporterName = $validatedData['name'];
        $reporterEmail = $validatedData['email'];
        $reportTopic = $validatedData['topics']; 
        $reportDescription = $validatedData['description']; 

        // dd($validatedData['topics']);        
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
        $alamatEmail = env('MAIL_FROM_ADDRESS');
        // dd($alamatEmail);
        Mail::to($alamatEmail)->send(new NotifUserMail($reporterName, $reporterEmail, $reportTopic));

        return redirect()->route('home')->with('success', 'Terimakasih atas laporannya! Cek email secara berkala untuk info lebih lanjut');


    }




}
