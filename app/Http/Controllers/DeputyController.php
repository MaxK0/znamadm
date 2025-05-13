<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use Illuminate\Http\Request;

class DeputyController extends Controller
{
    public function index()
    {
        $deputies = Deputy::all();
        return view('pages.deputies.index', compact('deputies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fio' => ['required'],
            'birth_date' => ['required', 'date'],
            'position' => ['required'],
            'phone' => ['required'],
        ]);

        return Deputy::create($data);
    }

    public function show(Deputy $deputy)
    {
        return $deputy;
    }

    public function update(Request $request, Deputy $deputy)
    {
        $data = $request->validate([
            'fio' => ['required'],
            'birth_date' => ['required', 'date'],
            'position' => ['required'],
            'phone' => ['required'],
        ]);

        $deputy->update($data);

        return $deputy;
    }

    public function destroy(Deputy $deputy)
    {
        $deputy->delete();

        return response()->json();
    }
}
