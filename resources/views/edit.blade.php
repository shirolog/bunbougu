@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size: 1rem;">文房具更新画面</h2>
            </div>

            <div class="pull-right">
                <a href="{{url('./bunbougus')}}?page={{request()->input('page')}}" class="btn btn-success">戻る</a>
            </div>
        </div>
    </div>

    <div style="text-align: right;">
        <form action="{{route('bunbougus.update', $bunbougu->id)}}" method="post">
            <input type="hidden" name="page" value="{{request()->input('page')}}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"
                        placeholder="名前" value="{{$bunbougu->name}}">
                        @error('name')
                            <span style="color: red;">名前を20文字以内で入力して下さい</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                        <input type="text" name="kakaku" class="form-control"
                        placeholder="価格" value="{{$bunbougu->kakaku}}">
                        @error('kakaku')
                            <span style="color:red;">価格を数値で入力して下さい</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                       <select name="bunrui" class="form-select">
                            <option value="">分類を選択してください</option>
                            @foreach($bunruis as $bunrui)
                                <option value="{{$bunrui->id}}" @if($bunrui->id == $bunbougu->bunrui)
                                selected  @endif>{{$bunrui->str}}</option>
                            @endforeach
                        </select>
                        @error('bunrui')
                            <span style="color: red;">分類を選択してください</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <div class="form-group">
                        <textarea name="shosai" class="form-control" placeholder="詳細"
                        style="height: 100px;">{{$bunbougu->shosai}}</textarea>
                    </div>
                </div>

                <div class="col-lg-12 mt-2 mb-2">
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </div>
            </div>
        </form>
    </div>

@endsection