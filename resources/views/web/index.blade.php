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
    <span>＋</span>&nbsp;自分の自己紹介を登録する
  </a>          
  {{ $introductions->links() }}

  <!-- 一覧表示 -->
  @foreach($introductions as $introduction)
  <div>
    <a href="{{ route('introduction.show',$introduction)}}">&darr;このユーザーの自己紹介を見る&darr;</a>
    <h5 class="nickname"><span>ニックネーム：</span>{{ $introduction-> nickname}}</h5>
  </div>
  @endforeach
  {{ $introductions->links() }}


@endsection