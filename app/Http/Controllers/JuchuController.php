<?php

namespace App\Http\Controllers;

use App\Models\Juchu;
use App\Models\Bunbougu;
use App\Models\Joutai;
use App\Models\Kyakusaki;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuchuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bunbougus = Bunbougu::all();
        $kyakusakis = Kyakusaki::all();
        $users = User::all();
        $joutais = Joutai::all();

        $juchus = Juchu::with('bunbougu', 'kyakusaki', 'user')
        ->orderBy('id', 'ASC')
        ->paginate(5);



        if(isset(Auth::user()->name)){

            return view('juchu.index', compact('juchus', 'bunbougus', 'kyakusakis', 'users', 'joutais'))
            ->with('user_name', Auth::user()->name)
            ->with('page', request()->input('page'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return view('juchu.index', compact('juchus', 'bunbougus', 'kyakusakis', 'users', 'joutais'))
            ->with('page', request()->input('page'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $bunbougus = Bunbougu::all();
        $kyakusakis = Kyakusaki::all();
        return view('juchu.create', compact('bunbougus', 'kyakusakis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'kyakusaki_id' => 'required|integer',
            'bunbougu_id' => 'required|integer',
            'kosu' => 'required|integer|between:1,12',
        ]);

        $juchu = new Juchu;

        $juchu-> kyakusaki_id = $request->input('kyakusaki_id');
        $juchu-> bunbougu_id = $request->input('bunbougu_id');
        $juchu-> kosu = $request->input('kosu');
        $juchu-> joutai = 1;
        $juchu-> user_id = Auth::user()->id;
        $juchu->save();
        return redirect()->route('juchus.index')
        ->with('success', '受注登録しました');
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
        $bunbougus = Bunbougu::all();
        $kyakusakis = Kyakusaki::all();
        $joutais = Joutai::all();
        return view('juchu.edit' ,compact('juchu', 'bunbougus', 'kyakusakis', 'joutais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juchu $juchu)
    {
        $request->validate([

            'kyakusaki_id' => 'required|integer',
            'bunbougu_id' => 'required|integer',
            'kosu' => 'required|integer|between:1,12',
            'joutai_id' => 'required|integer',
        ]);

        $juchu-> kyakusaki_id = $request->input('kyakusaki_id');
        $juchu-> bunbougu_id = $request->input('bunbougu_id');
        $juchu-> kosu = $request->input('kosu');
        $juchu-> joutai = $request->input('joutai_id');
        $juchu-> user_id = Auth::user()->id;
        $juchu->save();
        $page = request()->input('page');
       
        return redirect()->route('juchus.index', ['page' => $page])
        ->with('success', '受注入力を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juchu $juchu)
    {
        $juchu->delete();
        $page = request()->input('page');
        return redirect()->route('juchus.index', ['page' => $page])
        ->with('success', '受注ID'.$juchu->id. 'を削除しました');
    }
}
