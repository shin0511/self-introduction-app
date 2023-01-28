@extends('layouts.app')

@section('content')



<!-- エラーメッセージ -->
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h5>
    <a href="{{ route('web.index') }}">TOPページに戻る</a>
</h5> 
<div class="iconflex">
    @isset ($introduction->path)
        <div class="introduction-img" style="background-image: url({{ asset($introduction->path) }})"></div>
    @endisset
    <div class="iconcontent">
        <h3>{{$introduction->nickname}}</h3>
        <h4>自己紹介</h4>
        <p>{{$introduction->self_introduction}}</p>
    </div>
</div>
    
    



@foreach ($snslinks as $snslink) 
    @if ($snslink->introduction_id == $introduction->id)
        <h5>
            <a href="{{ $snslink->sns_link }}">{{ $snslink->snsname }}</a>
        </h5>
    @endif
@endforeach   



@endsection