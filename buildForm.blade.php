@extends('bbs.common')

@section('title', 'build_thread')

@section('content')
<div id='content_top'>
  <h1>スレッド作成フォーム</h1>
  <a href='/threads' class="prev">スレッド一覧へ戻る</a>
</div>
<form method="post" action='/threads'>
  {{ csrf_field() }}
  <p>
    <input type="text" name="title" placeholder="スレッドタイトル" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="作成">
  </p>
</form>
@endsection