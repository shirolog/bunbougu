@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size: 1rem;">受注更新画面</h2>
            </div>

            <div class="pull-right">
                <a href="{{url('./juchus')}}?page={{request()->input('page')}}" class="btn btn-success">戻る</a>
            </div>
        </div>
    </div>

    <div style="text-align: right;">
        <form action="{{route('juchus.update', $juchu->id)}}" method="post">
            <input type="hidden" name="page" value="{{request()->input('page')}}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                        <select name="kyakusaki_id" class="form-select">
                            <option value="">客先を選択してください</option>
                            @foreach($kyakusakis as $kyakusaki)
                                <option value="{{$kyakusaki->id}}" {{($kyakusaki->id == $juchu->kyakusaki->id)?
                                 'selected': ''}}>{{$kyakusaki->name}}</option>
                            @endforeach
                        </select>
                        @error('kyakusaki_id')
                            <span style="color: red;">客先を選択して下さい</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                      <select name="bunbougu_id" class="form-select">
                        <option value="">文房具を選択してください</option>
                        @foreach($bunbougus as $bunbougu)
                            <option value="{{$bunbougu->id}}" {{($bunbougu->id == $juchu->bunbougu_id)?
                            'selected' : ''}}>{{$bunbougu->name}}</option>
                        @endforeach
                      </select>
                        @error('bunbougu_id')
                            <span style="color:red;">文房具を選択してください</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                            <input type="number" name="kosu" class="form-control" value="{{$juchu->kosu}}"
                            placeholder="個数">
                        @error('kosu')
                            <span style="color: red;">個数を1~12までの数値で入力してください</span>
                        @enderror
                    </div>
                </div>

                
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                      <select name="joutai_id" class="form-select">
                        <option value="">状態を選択してください</option>
                        @foreach($joutais as $joutai)
                            <option value="{{$joutai->id}}" {{($joutai->id == $juchu->joutai)?
                            'selected' : ''}}>{{$joutai->name}}</option>
                        @endforeach
                      </select>
                        @error('joutai_id')
                            <span style="color:red;">状態を選択してください</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </div>
            </div>
        </form>
    </div>

@endsection