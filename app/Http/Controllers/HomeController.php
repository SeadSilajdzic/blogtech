<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::firstOrFail();
        return view('index', compact('settings'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function portfolio()
    {
        return view('portfolio');
    }
}
