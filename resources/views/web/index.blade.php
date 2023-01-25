@extends('layouts.app')

@section('content')

  <div id="search-add">
    <!-- 検索機能 -->
    <div>
      <form action="{{ route('web.index') }}" method="GET">
        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="名前を入力してください">
        <input type="submit" value="検索">
      </form>
    </div>
    @guest
    <!-- 自己紹介登録 -->
    <a href="{{ route('introduction.create') }}" >
      <span>＋</span>&nbsp;自分の自己紹介を登録する
    </a>  
    @endguest
  </div>       
  
  {{ $introductions->links() }}

  <!-- 一覧表示 -->
  <div id="introductionflex">
    @foreach($introductions as $introduction)
    <a href="{{ route('introduction.show',$introduction)}}"id="introduction-link">
      <h5 class="nickname">{{ $introduction-> nickname}}</h5>
      <div id="introduction-content">
      @isset ($introduction->path)
        <div class="introduction-img" style="background-image: url({{ asset($introduction->path) }})"></div>
      @endisset
        <div class="introduction">{{ $introduction-> self_introduction}}</div>
      </div>
    </a>
    @endforeach
    @if($introductions->count() == 0)
    <h1>検索結果は0件でした</h1>
    @endif
  </div>
  {{ $introductions->links() }}


@endsection