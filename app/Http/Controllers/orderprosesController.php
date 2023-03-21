<?php

namespace App\Http\Controllers;

use App\Models\orderproses;
use Illuminate\Http\Request;

class orderprosesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = orderproses::paginate();
        return view('orderproses.index',compact('order'));
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
     * @param  \App\Models\orderproses  $orderproses
     * @return \Illuminate\Http\Response
     */
    public function show(orderproses $orderproses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderproses  $orderproses
     * @return \Illuminate\Http\Response
     */
    public function edit(orderproses $orderproses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderproses  $orderproses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderproses $orderproses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderproses  $orderproses
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderproses $orderproses)
    {
        //
    }
}
