<?php

namespace App\Http\Controllers;

use App\Models\merek;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::paginate();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required',
            'img' => 'image|mimes:png,jpg,svg'
        ]);

        $image = $request->file('img')->store('public/image');
        $image = str_replace('public/', 'storage/', $image);

        kategori::create([
            'kategori' => $request->kategori,
            'img' => $image,
        ]);

        return redirect()->route('kategori.index')->with(['success', 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'img' => 'mimes:png,jpg,svg'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $kategori->img));

            $kategori->update([
                'kategori' => $request->kategori,
                'img' => $image,
            ]);
        } else {
            $kategori->update([
                'kategori' => $request->kategori,
            ]);
        }

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        if ($kategori->img) {
            Storage::delete(str_replace('storage/', 'public/', $kategori->img));
            $kategori->save();
            $kategori->delete();
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }

    }
}
