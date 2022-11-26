@extends('layouts.app')

@section('content')

  <!-- 検索機能 -->
  <div>
    <form action="{{ route('web.index') }}" method="GET">
      <input type="text" name="keyword" value="{{ $keyword }}">
      <input type="submit" value="検索">
    </form>
  </div>
  <!-- 自己紹介登録 -->
  <a href="{{ route('introduction.create') }}" >
      <div>   
          <span>＋</span>&nbsp;自分の自己紹介を登録する
      </div>
  </a>          
  <!-- 一覧表示 -->
  @foreach($introductions as $introduction)

  <h5><span>ニックネーム：</span>{{ $introduction-> nickname}}</h5>
  <a href="{{ route('introduction.show',$introduction)}}">このユーザーの自己紹介を見る</a>

  @endforeach
  {{ $introductions->links() }}


@endsection