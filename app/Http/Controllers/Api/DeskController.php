<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        $created_desk = Desk::create($request->all());

        return new DeskResource($created_desk);
    } */
    public function store(DeskStoreRequest $request)
    {
        $created_desk = Desk::create($request->validated());

        return new DeskResource($created_desk);
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
     *
     * @param  \App\Http\Requests\DeskStoreRequest  $request
     * @param  \App\Models\Desk  $desk
     * @return \App\Http\Resources\DeskResource
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desk $desk)
    {
        $desk->delete();

        return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }

}
