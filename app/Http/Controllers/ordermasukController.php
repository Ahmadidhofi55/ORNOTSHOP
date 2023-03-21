<?php

namespace App\Http\Controllers;

use App\Models\ordermasuk;
use Illuminate\Http\Request;

class ordermasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = ordermasuk::paginate();
        return view('ordermasuk.index',compact('order'));
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
     * @param  \App\Models\ordermasuk  $ordermasuk
     * @return \Illuminate\Http\Response
     */
    public function show(ordermasuk $ordermasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ordermasuk  $ordermasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(ordermasuk $ordermasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ordermasuk  $ordermasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ordermasuk $ordermasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ordermasuk  $ordermasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(ordermasuk $ordermasuk)
    {
        //
    }
}
