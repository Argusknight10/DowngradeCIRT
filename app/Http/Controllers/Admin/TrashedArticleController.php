<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashedArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::onlyTrashed()
            ->select('id', 'slug', 'title', 'is_published', 'image')
            ->latest();

        if ($request->query('q')) {
            $articles->search($request->query('q'));
        }

        return view('admin.sections.articles.trashed', [
            'articles' => $articles->paginate(10)->appends($request->query())
        ]);
    }

    public function restore(string $slug)
    {
        $article = Article::withTrashed()->where('slug', $slug)->first();

        if (!$article) abort(404);

        $article->restore();

        return redirect()
            ->route('admin.trashed.articles.index')
            ->with('success', 'Artikel berhasil dikembalikan');
    }

    public function force(string $slug)
    {
        $article = Article::withTrashed()->where('slug', $slug)->first();

        if (!$article) abort(404);

        Storage::delete($article->image);

        $article->forceDelete();

        return redirect()
            ->route('admin.trashed.articles.index')
            ->with('success', 'Artikel berhasil dihapus permanen');
    }
}
