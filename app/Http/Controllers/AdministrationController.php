<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function index()
    {
        $administrations =  Administration::all();
        return view('pages.administrations.index', compact('administrations'));
    }
}
