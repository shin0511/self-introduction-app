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

@empty ($introductions)
<div>
    <a href="{{ route('introduction.create') }}" >
        <div>   
            <span>＋</span>&nbsp;自分の自己紹介を登録する
        </div>
    </a>          
</div> 
@endempty

@isset ($introductions)
<div>
    <h3>ニックネーム</h3>
    <p>{{$introductions->nickname}}</p>
    <h3>自己紹介</h3>
    <p style="white-space: pre-wrap">{{$introductions->self_introduction}}</p>
</div>

<a href="{{ route('introduction.edit', $introductions) }}" >
        <div>   
            編集
        </div>
    </a>          

@endisset



@endsection
