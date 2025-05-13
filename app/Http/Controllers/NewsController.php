<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('pages.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['nullable'],
            'publicated_at' => ['nullable', 'date'],
            'user_id' => ['nullable', 'exists:users'],
        ]);

        return News::create($data);
    }

    public function show(News $news)
    {
        $news->load('user'); // Жадная загрузка автора
        $relatedNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['nullable'],
            'publicated_at' => ['nullable', 'date'],
            'user_id' => ['nullable', 'exists:users'],
        ]);

        $news->update($data);

        return $news;
    }

    public function destroy(News $news)
    {
        $news->delete();

        return response()->json();
    }
}
