<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
            ->select('id', 'slug', 'title', 'image', 'excerpt', 'created_at')
            ->limit(3)
            ->get();

        return view('user.sections.home', [
            'title' => 'Home',
            'articles' => $articles
        ]);
    }
}
