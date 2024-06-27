@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size: 1rem;">文房具マスター</h2>
            </div>

            <div class="text-right">
                <a href="{{route('bunbougus.create')}}" class="btn btn-success mb-2">新規登録</a>
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
        </tr>

        @foreach($bungus as $bungu)
            <tr>
                <td style="text-align: right;">{{$bungu->id}}</td>
                <td><a href="{{route('bunbougus.show', $bungu->id)}}?page={{request()->input('page')}}">{{$bungu->name}}</a></td>
                <td style="text-align: right;">{{$bungu->kakaku}}円</td>
                <td style="text-align: left;">{{$bungu->bunrui}}</td>
                <td style="text-align: center;">
                    <a href="{{route('bunbougus.edit', $bungu->id)}}?page={{request()->input('page')}}"
                    class="btn btn-primary">変更</a>
                </td>
                
            </tr>
        @endforeach
    </table>
        {!!$bungus->links('pagination::bootstrap-5')!!}
@endsection