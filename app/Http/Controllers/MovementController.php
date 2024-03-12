<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movement\MovementStoreRequest;
use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = Movement::with('movements')->where('movement_id', null)->get();

        return response()->json($movements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovementStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
