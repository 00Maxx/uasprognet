<?php

namespace App\Http\Controllers;

use App\Models\jenistransaksi;
use Illuminate\Http\Request;

class JenistransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return jenistransaksi::all();
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function store(Request $request)
    {
        $jenistransaksi = new jenistransaksi();
        $jenistransaksi->fill($request->all())->save();
        return $jenistransaksi();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return jenistransaksi::find($id);
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenistransaksi = jenistransaksi::find($id);
        $jenistransaksi->fill($request->all())->save();
        return $jenistransaksi;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenistransaksi = jenistransaksi::find($id);
        $jenistransaksi->delete();
    }
}
