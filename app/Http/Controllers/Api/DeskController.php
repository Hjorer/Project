<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeskResource;
use Illuminate\Http\Request;
use http\Env\Response;
use App\Models\Desk;
class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* return Desk::all(); */
        /* return DeskResource::collection(Desk::all()); */
        return DeskResource::collection(Desk::with('lists')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \App\Models\Desk|null
     */
    public function show(string $id)
    {
        /* return Desk::find($id); */
        /* return new DeskResource(Desk::findOrFail($id)); */
        return new DeskResource(Desk::with('lists')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
