<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
            ->select('id', 'slug', 'title', 'image', 'excerpt', 'created_at')
            ->limit(4)
            ->get();

        return view('user.sections.home', [
            'articles' => $articles
        ]);
    }
}
