<?php

namespace App\Http\Controllers;

use App\Models\orderselesai;
use Illuminate\Http\Request;

class orderselesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = orderselesai::paginate();
        return view('orderselesai.index',compact('order'));
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
     * @param  \App\Models\orderselesai  $orderselesai
     * @return \Illuminate\Http\Response
     */
    public function show(orderselesai $orderselesai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderselesai  $orderselesai
     * @return \Illuminate\Http\Response
     */
    public function edit(orderselesai $orderselesai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderselesai  $orderselesai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderselesai $orderselesai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderselesai  $orderselesai
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderselesai $orderselesai)
    {
        //
    }
}
