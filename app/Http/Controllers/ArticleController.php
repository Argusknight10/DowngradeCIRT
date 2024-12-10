<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::query()
            ->select('id', 'slug', 'title', 'image', 'excerpt', 'created_at')
            ->latest();

        if ($request->query('q')) {
            $articles->search($request->query('q'));
        }

        return view('user.sections.articles.index', [
            'articles' => $articles->paginate(10)->appends($request->query())
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('user');
        $articles = Article::latest()->take(2)->get();
        // dd($articles);
        return view('user.sections.articles.show', [
            'article' => $article,
            'articles' => $articles
        ]);
    }
}
