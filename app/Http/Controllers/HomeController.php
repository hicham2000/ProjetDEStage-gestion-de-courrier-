<?php

namespace App\Http\Controllers;


use App\Models\Poste;
use App\Models\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('home');
    }
    public function index()
    {
$postes = Poste::orderBy('name','ASC')->get();
        return view('adminCreate')->with('postes', $postes);
    }
}
