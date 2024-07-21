@extends('app')

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
                <h2 style="font-size: 1rem;">受注入力</h2>
            </div>


            <div class="text-right">
                @auth
                    <a href="{{route('juchus.create')}}?page={{request()->input('page')}}" 
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
            <th>ID</th>
            <th>客先</th>
            <th>文房具</th>
            <th>個数</th>
            <th>状態</th>
            <th></th>
            <th></th>
            <th>編集者</th>
        </tr>

        @foreach($juchus as $juchu)
            <tr>
    
                <td style="text-align: right;">{{$juchu->id}}</td>

                <td>{{$juchu->kyakusaki->name}}</td>

                <td>{{$juchu->bunbougu->name}}</td>

                <td style="text-align: right;">{{$juchu->kosu}}</td>

                <td style="text-align: center;">
                @foreach ($joutais as $joutai)
                    @if($joutai->id == $juchu->joutai)
                    {{ $joutai->name }}
                    @endif
                @endforeach
                </td>

                <td style="text-align: center;">

                    @auth
                        
                        <a href="{{route('juchus.edit', $juchu->id)}}?page={{request()->input('page')}}"

                        class="btn btn-primary">変更</a>

                    @endauth

                </td>

                <td style="text-align: center;">

                    @auth

                        <form action="{{route('juchus.destroy', $juchu->id)}}" method="post">

                            <input type="hidden" name="page" value="{{request()->input('page')}}">

                            @method('DELETE')

                            @csrf

                            <button type="submit" class="btn btn-sm btn-danger"

                            onclick="return confirm('削除しますか？');">削除</button>

                        </form>

                    @endauth
                </td>

                <td>
                    @foreach($users as $user)
                        @if($user->id == $juchu->user_id)
                            {{$user->name}}
                        @endif
                    @endforeach
                </td>

            </tr>

        @endforeach

    </table>
    {!!$juchus->links('pagination::bootstrap-5')!!}

@endsection