<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::query()
            ->select('id', 'slug', 'title', 'is_published', 'image')
            ->latest();

        if ($request->query('q')) {
            $articles->search($request->query('q'));
        }

        return view('admin.sections.articles.index', [
            'articles' => $articles->paginate(10)->appends($request->query())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        if ($validatedData['is_published'] == 1) {
            $validatedData['is_published'] = true;
            $validatedData['published_by'] = auth()->id();
            $validatedData['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('articles', 'public');
        }

        $dom = new DOMDocument();
        $dom->loadHTML('<div>'.$validatedData['body'].'</div>');
        $firstParagraph = $dom->getElementsByTagName('p')->item(0);

        $validatedData['excerpt'] = Str::excerpt($firstParagraph->textContent);

        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['created_by'] = auth()->id();

        Article::create($validatedData);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('user');
        $articles = Article::latest()->take(2)->get();
        // dd($articles);
        return view('admin.sections.articles.show', [
            'article' => $article,
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.sections.articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->validated();

        $payload = $request->all();

        if ($payload['title'] !== $article->title) {
            $payload['slug'] = Str::slug($payload['title']);
        }

        if ($request->hasFile('image')) {
            // don't remove if image generate by seeder
            if ($article->image !== 'articles/article-test.png') {
                Storage::delete($article->image);
            }

            $payload['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($payload);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article berhasil diarsipkan');
    }
}
