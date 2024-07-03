<?php

namespace App\Http\Controllers;

use App\Models\Juchu;
use App\Models\Bunbougu;
use App\Models\Kyakusaki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuchuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $juchus = Juchu::latest()->paginate(5);

        $juchus = Juchu::select([
            'j.id',
            'j.kyakusaki_id',
            'j.bunbougu_id',
            'j.kosu',
            'j.joutai',
            'j.user_id',
            'k.name as kyakusaki_name',
            'b.name as bunbougu_name',
            'u.name as user_name',
        ])
        ->from('juchus as j')
        ->join('kyakusakis as k', 'j.kyakusaki_id', '=', 'k.id')
        ->join('bunbougus as b', 'j.bunbougu_id', '=', 'b.id')
        ->join('users as u', 'j.user_id', '=', 'u.id')
        ->orderBy('j.id', 'DESC')
        ->paginate(5);


        return view('juchu.index', compact('juchus'))
        ->with('user_name', Auth::user()->name)
        ->with('page', request()->input('page'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juchus.create');
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
    public function show(Juchu $juchu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juchu $juchu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juchu $juchu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juchu $juchu)
    {
        //
    }
}
