<?php

namespace App\Http\Controllers;

use App\Models\agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return agama::all();
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agama = new agama();
        $agama->fill($request->all())->save();
        return $agama();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return agama::find($id);
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agama = agama::find($id);
        $agama->fill($request->all())->save();
        return $agama;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agama = agama::find($id);
        $agama->delete();
    }
}
