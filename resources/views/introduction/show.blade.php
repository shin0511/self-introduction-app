@extends('layouts.app')

@section('content')

<h1>ABOUT ME</h1>

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
<div>
    <h3>ニックネーム</h3>
    <p>{{$introduction->nickname}}</p>
    <h3>自己紹介</h3>
    <p>{{$introduction->self_introduction}}</p>

</div>

@foreach ($snslinks as $snslink) 
    @if ($snslink->introduction_id == $introduction->id)
        <h5>
            <a href="{{ $snslink->sns_link }}">{{ $snslink->snsname }}</a>
        </h5>
    @endif
@endforeach   



@endsection