<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return view('home');
    }

    public function getCpuInfo()
    {
        $cpuinfo = [];
        if (is_file('/proc/cpuinfo')) {
            $cpuinfo = file('/proc/cpuinfo');
        }
        return $cpuinfo;
    }


    public function adminHome()
    {
        $cpuinfo = $this->getCpuInfo();
        return view('admin.home',compact('cpuinfo'));
    }
}
