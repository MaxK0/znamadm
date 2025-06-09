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
}
