<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use Illuminate\Http\Request;

class BunbouguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bungus = Bunbougu::latest()->paginate(5);

        return view('index', compact('bungus'))
        ->with('i', (request()->input('page') - 1) * 5);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bunbougu $bunbougu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bunbougu $bunbougu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bunbougu $bunbougu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bunbougu $bunbougu)
    {
        //
    }
}
