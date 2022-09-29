<?php

namespace App\Http\Controllers;

use App\Models\car;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = car::paginate(3);
        return view('home',[
            'cars'=>$cars
        ]);
    }
}
