@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">我的主页</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    你的基本信息:
                    <hr>
    <ol>
    @foreach($persons as $person)
                <li>{{ $persons }}
                </li>
    @endforeach

    </ol>
    <b><hr></b>
    你发表过的文章:
    <hr>
    <ol>
        @foreach($bodys as $body)
            <li>{{ $body }}</li>

        @endforeach
    </ol>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
