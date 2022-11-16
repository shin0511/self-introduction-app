@extends('layouts.app')

@section('content')

<h1>自己紹介を登録しよう</h1>

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

<div>
  <a href="{{ route('introduction.index') }}">&lt; 戻る</a>                                  
</div>

<h2>自己紹介の登録</h2>
<form action="{{ route('introduction.store') }}" method="post">
    @csrf
    <div>
      <label>ニックネーム</label><span style="color:red">必須</span>
      <input type="text" name="nickname">
    </div>
    <div>
      <label>自己紹介</label><span style="color:red">必須</span>
      <textarea name="self_introduction"></textarea>
    </div>
    <div>
      <button type="submit">登録</button>
    </div>
</form>



@endsection