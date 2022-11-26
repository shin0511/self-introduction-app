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
<h5>
    <a href="{{ route('web.index') }}">TOPページに戻る</a>
</h5> 
<div>
    <a href="{{ route('introduction.create') }}" >
        <div>   
            <span>＋</span>&nbsp;自分の自己紹介を登録する
        </div>
    </a>          
</div> 
@endempty

@isset ($introduction)
    <h5>
        <a href="{{ route('web.index') }}">TOPページに戻る</a>
    </h5> 
    <!-- Snslinkの追加用モーダル -->
    @include('modals.add_snslink')
    
    <div>
        <h3>ニックネーム</h3>
        <p>{{$introduction->nickname}}</p>
        <h3>自己紹介</h3>
        <p>{{$introduction->self_introduction}}</p>
        
    </div>

    @foreach ($snslinks as $snslink) 
        @if ($snslink->introduction_id == $introduction->id)
            <!-- ToDoの編集用モーダル -->
            @include('modals.edit_snslink')
            <!-- ToDoの削除用モーダル -->
            @include('modals.delete_snslink')
            <h5>
                <a href="{{ $snslink->sns_link }}">{{ $snslink->snsname }}</a>
            </h5>                                                                                                                                                                                  
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#editSnslinkModal{{ $snslink->id }}">編集</a></li>                                                  
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#deleteSnslinkModal{{ $snslink->id }}">削除</a></li>   
        @endif
    @endforeach

    <div>
        <a href="#" data-bs-toggle="modal" data-bs-target="#addSnslinkModal{{ $introduction->id }}">SNSリンクを追加する</a>
        <a href="{{ route('introduction.edit', $introduction) }}" >編集</a>          
    </div>
    
@endisset

@endsection
