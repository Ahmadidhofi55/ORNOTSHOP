<?php

namespace App\Http\Controllers;


use App\Models\merek;
use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        $merek = merek::paginate();
        return view('produk.create',compact('kategori','merek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_produk' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'deskripsi'=> 'required|min:16',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
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

        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect()->route('produk.index');
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
        $kategori = kategori::paginate();
        $merek = merek::paginate();
        return view('produk.edit',compact('produk','kategori','merek'));
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
        $this->validate($request, [
            'nm_produk' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'deskripsi'=> 'required|min:16',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
            'stock' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/','storage/',$image);

            //delete old image
            Storage::delete(str_replace('storage/', 'public/', $produk->img));

            //update post with new image
            $produk->update([
                'nm_produk' => $request->nm_produk,
                'kategori' => $request->kategori,
                'merek' => $request->merek,
                'deskripsi'=> $request->deskripsi,
                'img' => $image,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]);

        } else {

            //update post without image
            $produk->update([
                'nm_produk' => $request->nm_produk,
                'kategori' => $request->kategori,
                'merek' => $request->merek,
                'deskripsi'=> $request->deskripsi,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]);
        }

        //redirect to index
        Alert::success('Success', 'Data Berhasil Diedit');
        return redirect()->route('produk.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        if ($produk->img) {
            Storage::delete(str_replace('storage/', 'public/', $produk->img));
            $produk->save();
            $produk->delete();
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect()->route('produk.index');
        }

    }
}
