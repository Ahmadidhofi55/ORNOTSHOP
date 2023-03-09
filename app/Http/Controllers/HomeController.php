<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\merek;
use App\Models\produk;
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
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $produk = produk::paginate();
        $kategori = kategori::paginate();
        $merek = merek::paginate();
        $user = User::paginate();
        $user = count($user);
        $produk = count($produk);
        $kategori = count($kategori);
        $merek = count($merek);
        return view('admin.home',compact('user','produk','merek','kategori'));
    }
}
