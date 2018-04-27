@extends('master') @section('content')

<div class="container my-5">

    <div class="row">
        @if($contents) @foreach($contents as $content)
        <div class="col-md-12">
            <h3>{{$content['title']}}</h3>
            <p>{!!$content['article']!!}</p>
        </div>
        @endforeach @else
        <div class="col-md-12">
            <p>אין תוכן בעמוד זה</p>
        </div>
        @endif
    </div>

</div>


@endsection