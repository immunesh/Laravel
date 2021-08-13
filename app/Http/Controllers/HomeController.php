<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Requirement;
use App\ContactOwner;
use App\Plan;

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
    public function index()
    {
        $appoint= Appointment::where('user_id',\Auth::user()->id)->count();
        $req= Requirement::where('user_id',\Auth::user()->id)->count();
        $co= ContactOwner::where('user_id',\Auth::user()->id)->count();
        $tproperty= $appoint+$co;

        $colimit= Plan::where('id',\Auth::user()->subscribed_plan_id)->first();
        $total_co= ContactOwner::where('user_id',\Auth::user()->id)->count('user_id');
        return view('Tanent.dashboard',compact('appoint','req','tproperty','colimit','total_co'));
    }

    public function adminHome(){
        return view('home');
    }
}
