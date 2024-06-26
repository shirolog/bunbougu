<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use App\Models\Bunrui;
use Illuminate\Http\Request;

class BunbouguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bungus = Bunbougu::latest()->paginate(5);
        
            $bungus = Bunbougu::select([
                'b.id',
                'b.name',
                'b.kakaku',
                'b.shosai',
                'r.str as bunrui',
            ])
            ->from('bunbougus as b')
            ->join('bunruis as r', 'b.bunrui', '=', 'r.id')
            ->orderBy('b.id', 'ASC')
            ->paginate(5);
        return view('index', compact('bungus'))
        ->with('i', (request()->input('page') - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bunruis = Bunrui::all();
        return view('create', compact('bunruis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'name' => 'required|max:20',
            'kakaku' => 'required|integer',
            'bunrui' => 'required|integer',
            'shosai' => 'required|max:140',
        ]);

        $bunbougu = new Bunbougu;

        $bunbougu->name = $request->input('name');
        $bunbougu->kakaku = $request->input('kakaku');
        $bunbougu->bunrui = $request->input('bunrui');
        $bunbougu->shosai = $request->input('shosai');
        $bunbougu->save();

        return redirect()->route('bunbougus.index')
        ->with('success', '文房具を登録しました');

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
