<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'published_at' => ['nullable', 'date'],
            'views' => ['required', 'integer'],
            'is_relevant' => ['boolean'],
            'description' => ['nullable'],
            'is_active' => ['boolean'],
            'file_path' => ['nullable'],
        ]);

        return Document::create($data);
    }

    public function show(Document $document)
    {
        return $document;
    }

    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'title' => ['required'],
            'published_at' => ['nullable', 'date'],
            'views' => ['required', 'integer'],
            'is_relevant' => ['boolean'],
            'description' => ['nullable'],
            'is_active' => ['boolean'],
            'file_path' => ['nullable'],
        ]);

        $document->update($data);

        return $document;
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return response()->json();
    }
}
