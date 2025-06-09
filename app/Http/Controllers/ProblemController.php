<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'info' => ['required'],
            'contact' => ['nullable', 'max:255'],
        ]);

        Problem::create($data);

        return redirect()->back();
    }
}
