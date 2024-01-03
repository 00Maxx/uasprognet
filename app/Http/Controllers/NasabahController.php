<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return nasabah::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nasabah = new nasabah();
        $nasabah->fill($request->all())->save();
        return $nasabah;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return nasabah::find($id); 
    }

       /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nasabah = nasabah::find($id);
        $nasabah->fill($request->all())->save();
        return $nasabah;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nasabah = nasabah::find($id);
        $nasabah->delete();
    }
}
