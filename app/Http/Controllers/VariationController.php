<?php

namespace App\Http\Controllers;

use App\Http\Requests\Variation\VariationStoreRequest;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variations = Variation::all();

        return response()->json($variations);
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
    public function store(VariationStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation)
    {
        //
    }
}
