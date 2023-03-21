<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class merekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merek = merek::paginate();
        return view('merek.index', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
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
            'merek' => 'required',
            'img' => 'image|mimes:png,jpg,svg'
        ]);

        $image = $request->file('img')->store('public/image');
        $image = str_replace('public/', 'storage/', $image);

        try {
            merek::create([
                'merek' => $request->merek,
                'img' => $image,
            ]);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('merek.index');
        } catch (Exception $e) {
            // Alert::error('error','Data Gagal Ditambahkan');
            Alert::error('Error', $e->getMessage());
            return redirect()->route('merek.index');
        }

        //return redirect()->route('merek.index')->with(['success', 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(merek $merek)
    {
        return view('merek.index', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, merek $merek)
    {
        $this->validate($request, [
            'merek' => 'required',
            'img' => 'mimes:png,jpg,svg'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/', 'storage/', $image);

            Storage::delete(str_replace('storage/', 'public/', $merek->img));

            $merek->update([
                'kategori' => $request->merek,
                'img' => $image,
            ]);
        } else {
            $merek->update([
                'kategori' => $request->merek,
            ]);
        }

        //redirect to index
        return redirect()->route('merek.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(merek $merek)
    {
        if ($merek->img) {
            Storage::delete(str_replace('storage/', 'public/', $merek->img));
            $merek->save();
            $merek->delete();
            return redirect()->route('merek.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
