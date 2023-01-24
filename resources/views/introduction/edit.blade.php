@extends('layouts.app')

@section('content')

<h1>自己紹介の編集</h1>

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
  <a href="{{ route('introduction.index') }}">&lt; ABOUT MEへ戻る</a>                                  
</div>

<h2>自己紹介の登録</h2>
<form action="{{ route('introduction.update',$introduction) }}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')
    <div>
      <label for="nickname">ニックネーム</label><span style="color:red">必須</span>
      <input type="text" name="nickname" value="{{ $introduction->nickname}}">
    </div>
    <div>
      <label>アイコン</label>
      <input type="file" name="icon" accept="image/*">
    </div>
    <div>
      <label for="self_introduction">自己紹介</label><span style="color:red">必須</span>
      <textarea name="self_introduction">{{ $introduction->self_introduction}}</textarea>
    </div>
    <div>
      <button type="submit">更新</button>
    </div>
</form>



@endsection