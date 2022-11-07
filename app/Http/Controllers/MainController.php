<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function php(Request $request)
    {
        dd($request);
    }
}
