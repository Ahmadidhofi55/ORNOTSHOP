<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::paginate();
        return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::paginate();
        return view('produk.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nm_produk' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'deskripsi'=> 'required',
            'img' => 'required|mimes:png,jpg,svg',
            'harga' => 'required|numeric',
            'stock' => 'require|numeric',
        ]);

        $image = $request->file('img')->store('public/image');
        $image = str_replace('public/','storage/',$image);

        $produk = produk::create([
            'nm_produk' => $request->nm_produk,
            'kategori' => $request->kategori,
            'merek' => $request->merek,
            'deskripsi'=> $request->deskripsi,
            'img' => $image,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);

         if ($produk) {
            return redirect()->route('produk.index')->with(['error','Data Berhasil Ditambahkan']);
        } else {
            return redirect()->route('produk.index')->with(['error','Data Gagal Ditambahkan']);
        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        //
    }
}
