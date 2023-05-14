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
    <!-- Postの追加用モーダル -->
    @include('modals.add_post')
    
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
            <!-- Snslinkの編集用モーダル -->
            @include('modals.edit_snslink')
            <!-- Snslinkの削除用モーダル -->
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
    
    <div>
        <a href="#" data-bs-toggle="modal" data-bs-target="#addPostModal{{ $introduction->id }}">新規投稿</a>
    </div>

    @foreach ($posts as $post) 
        @if ($post->introduction_id == $introduction->id)
            <!-- Snslinkの編集用モーダル -->
            @include('modals.edit_post')
            <!-- Snslinkの削除用モーダル -->
            @include('modals.delete_post')
            
            <h5>{{ $post->title }}</h5>
            <div>{{ $post->caption }}</div>
            @if($post->category == "music")
            <audio controls controlsList="nodownload">
                <source src="{{ asset($post->workspath) }}">
            </audio>
            @endif
            @if($post->category == "illustration")
                <img src="{{ asset($post->workspath) }}">
            @endif
            @if($post->category == "photo")
                <img src="{{ asset($post->workspath) }}">
            @endif
            @if($post->category == "animation")
                <video controls controlsList="nodownload" src="{{ asset($post->workspath) }}"></video>
            @endif
            @if($post->category == "novel")
                <object type="{{$post->category}}" data="{{ asset($post->workspath) }}"></object>
            @endif
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $post->id }}">編集</a></li>                                                  
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#deletePostModal{{ $post->id }}">削除</a></li>   
        @endif
    @endforeach
@endisset

@endsection
