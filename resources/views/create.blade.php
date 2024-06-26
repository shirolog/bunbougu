@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size: 1rem;">文房具登録画面</h2>
            </div>

            <div class="pull-right">
                <a href="{{url('/bunbougus')}}" class="btn btn-success">戻る</a>
            </div>
        </div>
    </div>



    <div style="text-align: right;">
        <form action="{{route('bunbougus.store')}}" method="post">
            @csrf
            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                    placeholder="名前">
                    @error('name')
                        <span style="color: red;">名前を20文字以内で入力して下さい</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    <input type="number" name="kakaku" class="form-control"
                    placeholder="価格">
                </div>
                @error('kakaku')
                <span style="color: red;">価格を数値で入力して下さい</span>
                @enderror
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    <select name="bunrui" class="form-select">
                        <option value="">分類を選択してください</option>
                        @foreach($bunruis as $bunrui)
                            <option value="{{$bunrui->id}}">{{$bunrui->str}}</option>
                        @endforeach
                    </select>
                    @error('bunrui')
                        <span style="color: red;">分類を選択してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    <textarea name="shosai" class="form-control"
                    placeholder="詳細" style="height: 100px;"></textarea>
                    @error('shosai')
                        <span style="color: red;">詳細を入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">登録</button>
                </div>
            </div>
        </form>
    </div>

@endsection