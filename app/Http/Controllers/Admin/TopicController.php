<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $topics = Topic::query()
        ->select('id', 'slug', 'topic');

        return view('admin.sections.topics.index', [
            'topics' => $topics->paginate(10)->appends($request->query())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['topic']);

        // dd($validatedData);
        Topic::create($validatedData);

        return redirect()->route('admin.topics.index')->with('success','Topik yang anda masukkan berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $validatedData = $request->all();
        $topic->update($validatedData);

        return redirect()->route('admin.topics.index')->with('success','Topik yang anda masukkan berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('admin.topics.index')->with('success', 'Data topik berhasil dihapus!');
    }
}
