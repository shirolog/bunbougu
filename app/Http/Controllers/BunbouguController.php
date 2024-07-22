<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use App\Models\Bunrui;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BunbouguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bunruis = Bunrui::all();
        $bungus = Bunbougu::with('bunrui')
        ->orderBy('id', 'ASC')
        ->paginate(5);
        if(isset(Auth::user()->name)){

            return view('index', compact('bungus', 'bunruis'))
            ->with('user_name', Auth::user()->name)
            ->with('i', (request()->input('page') - 1) * 5);
        }else{
            
            return view('index', compact('bungus', 'bunruis'))
            ->with('i', (request()->input('page') - 1) * 5);
        }
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
        $bunbougu->user_id = Auth::user()->id;
        $bunbougu->save();

        return redirect()->route('bunbougus.index')
        ->with('success', '文房具を登録しました');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bunbougu $bunbougu)
    {
        $bunruis = Bunrui::all();
        return view('show', compact('bunruis'))
        ->with('bunbougu', $bunbougu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bunbougu $bunbougu)
    {
        $bunruis = Bunrui::all();
        return view('edit', compact('bunruis'))
        ->with('page', request()->input('page'))
        ->with('bunbougu', $bunbougu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bunbougu $bunbougu)
    {
        $request->validate([

            'name' => 'required|max:20',
            'kakaku' => 'required|integer',
            'bunrui' => 'required|integer',
            'shosai' => 'required|max:140',
        ]);

        $bunbougu->name = $request->input('name');
        $bunbougu->kakaku = $request->input('kakaku');
        $bunbougu->bunrui = $request->input('bunrui');
        $bunbougu->shosai = $request->input('shosai');
        $bunbougu->user_id = Auth::user()->id;
        $bunbougu->save();
        
        $page = request()->input('page');

        return redirect()->route('bunbougus.index', ['page' => $page])
        ->with('success', '文房具を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bunbougu $bunbougu)
    {
        $bunbougu->delete();

        $page = request()->input('page');

        return redirect()->route('bunbougus.index', ['page' => $page])
        ->with('success', $bunbougu->name.'を削除しました');
    }
}
