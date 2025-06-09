<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $types = DocumentType::with(['documents' => function($query) use ($search) {
            $query->where('is_active', true);
            if ($search) {
                $query->where('title', 'like', "%{$search}%");
            }
        }])->get();

        return view('pages.documents.index', compact('types', 'search'));
    }

    public function type(Request $request, DocumentType $type)
    {
        $search = $request->input('search');

        $documents = $type->documents()
            ->where('is_active', true)
            ->when($search, function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('pages.documents.type', compact('type', 'documents', 'search'));
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
