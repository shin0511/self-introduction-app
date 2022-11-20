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

@empty ($introduction)
<div>
    <a href="{{ route('introduction.create') }}" >
        <div>   
            <span>＋</span>&nbsp;自分の自己紹介を登録する
        </div>
    </a>          
</div> 
@endempty

@isset ($introduction)
<div>
    <h3>ニックネーム</h3>
    <p>{{$introduction->nickname}}</p>
    <h3>自己紹介</h3>
    <p>{{$introduction->self_introduction}}</p>
</div>

<a href="{{ route('introduction.edit', $introduction) }}" >
        <div>   
            編集
        </div>
    </a>          

@endisset



@endsection