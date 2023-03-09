<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(user $user)
    {
        $profil = user::paginate();
        return view('profil.index',compact('user','profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $profil = user::paginate();
        return view('profil.index',compact('user','profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate($request, [
            'img' => 'image|mimes:png,jpg,svg',
            'password' => 'min:8',
        ]);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('img')->store('public/image');
            $image = str_replace('public/','storage/',$image);

            //delete old image
            Storage::delete(str_replace('storage/', 'public/', $user->img));

            //update post with new image
            $user->update([
                'name' => $request->name,
                'img' => $image,
                'password' => $request->password,
            ]);

        } else {

            //update post without image
            $user->update([
                'name' => $request->name,
                'password' => $request->password,
            ]);
        }

        //redirect to index
        return redirect()->route('profil')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
