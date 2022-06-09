<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
    	return view('index');
    }

    public function about(Income $income)
    {
        $income = Income::all();
    	return view('about', compact('income'));
    }
}
