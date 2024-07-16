@extends('layouts.app')

@section('content')

    <div class="row" style="text-align: right;">
        <div class="col-lg-12">
            @auth
                ログイン者: {{$user_name}}
            @endauth
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size: 1rem;">文房具マスター</h2>
            </div>


            <div class="text-right">
                @auth
                    <a href="{{route('bunbougus.create')}}?page={{request()->input('page')}}" 
                    class="btn btn-success mb-2">新規登録</a>
                @endauth
            </div>
        </div>
    </div>

  
    


    <div class="row">
        <div class="col-lg-12">
            @if($message = Session::get('success'))
            <div class="alert alert-success mt-1">
                <p>{{$message}}</p>
            </div>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>kakaku</th>
            <th>bunrui</th>
            <th></th>
            <th></th>
            <th>編集者</th>
        </tr>

        @foreach($bungus as $bungu)
            <tr>
                <td style="text-align: right;">{{$bungu->id}}</td>
                <td><a href="{{route('bunbougus.show', $bungu->id)}}?page={{request()->input('page')}}">{{$bungu->name}}</a></td>
                <td style="text-align: right;">{{$bungu->kakaku}}円</td>
                <td style="text-align: left;">
                    @foreach($bunruis as $bunrui)
                        @if($bungu->bunrui == $bunrui->id)
                            {{$bunrui->str}}
                        @endif    
                    @endforeach
                </td>
                <td style="text-align: center;">
                    @auth
                        <a href="{{route('bunbougus.edit', $bungu->id)}}?page={{request()->input('page')}}"
                        class="btn btn-primary">変更</a>
                    @endauth
                </td>
                <td style="text-align: center;">
                    @auth
                        <form action="{{route('bunbougus.destroy', $bungu->id)}}" method="post">
                            <input type="hidden" name="page" value="{{request()->input('page')}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('削除しますか？');">削除</button>
                        </form>
                    @endauth
                </td>
                
                <td>{{$bungu->user->name}}</td>
            </tr>
        @endforeach
    </table>
        {!!$bungus->links('pagination::bootstrap-5')!!}
@endsection