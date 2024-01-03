<?php

namespace App\Http\Controllers;

use App\Models\tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return tabungan::all();
    }

       /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tabungan = new tabungan();
        $tabungan->fill($request->all())->save();
        return $tabungan();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return tabungan::find($id);
    }

       /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tabungan = tabungan::find($id);
        $tabungan->fill($request->all())->save();
        return $tabungan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tabungan = tabungan::find($id);
        $tabungan->delete();
    }
}
