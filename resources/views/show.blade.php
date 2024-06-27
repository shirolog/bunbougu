@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size: 1rem;">文房具詳細画面</h2>
            </div>

            <div class="pull-right">
                <a href="{{url('./bunbougus')}}?page={{request()->input('page')}}" class="btn btn-success">戻る</a>
            </div>
        </div>
    </div>

    <div style="text-align: left;">
        <div class="row">
            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    {{$bunbougu->name}}
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    {{$bunbougu->kakaku}}
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    @foreach($bunruis as $bunrui)
                        @if($bunrui->id == $bunbougu->bunrui)
                            {{$bunrui->str}}
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-2">
                <div class="form-group">
                    {{$bunbougu->shosai}}
                </div>
            </div>
        </div>
    </div>

@endsection