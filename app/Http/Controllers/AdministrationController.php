<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function index()
    {
        return Administration::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fio' => ['required'],
            'position' => ['required'],
            'intake' => ['required'],
            'contact' => ['required'],
        ]);

        return Administration::create($data);
    }

    public function show(Administration $administration)
    {
        return $administration;
    }

    public function update(Request $request, Administration $administration)
    {
        $data = $request->validate([
            'fio' => ['required'],
            'position' => ['required'],
            'intake' => ['required'],
            'contact' => ['required'],
        ]);

        $administration->update($data);

        return $administration;
    }

    public function destroy(Administration $administration)
    {
        $administration->delete();

        return response()->json();
    }
}
