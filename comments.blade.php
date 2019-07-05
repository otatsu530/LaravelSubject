@extends('bbs.common')

@section('title', 'thread_detail')

@section('content')
<?php
$comment_disp_id = 1;
?>
<div id='content_top'>
  <h1>{{ $thread->title }}</h1>
  <a href='/threads' class="prev">スレッド一覧へ戻る</a>
</div>
<ul>
  @forelse ($thread->comments as $comment)
  <li class='item'>
    <span>{{ $comment_disp_id }}</span> <span>{{ $comment->name }}</span><br>
    <span class='comment'>{{ $comment->comment }}</span><span class='create_at'>{{ $comment->created_at }}</span>
  </li>
<?php
$comment_disp_id++;
?>
  @empty
  <li>まだコメントがありません。</li>
  @endforelse
</ul>
<form method="post" action="{{ action('CommentsController@store', $thread) }}">
  {{ csrf_field() }}
  <p>
    <textarea name="comment" placeholder="コメント" value="{{ old('comment') }}"></textarea>
    @if ($errors->has('comment'))
    <span class="error">{{ $errors->first('comment') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="投稿">
  </p>
</form>
@endsection