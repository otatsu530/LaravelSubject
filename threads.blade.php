@extends('bbs.common')

@section('title', 'threads')

@section('content')
<div id='content_top'>
  <h1>スレッド一覧</h1>
  <a href='/home' class='prev'>ホームへ戻る</a>
  <a href='/threads/build' class="build">新規スレッド作成</a>
</div>
<ul>
  @forelse ($threads as $thread)
  <li class='item'>
    <span>{{ $thread->id }}</span> <a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a>
    <br>
    <span>スレ主 {{ $thread->name }}</span>
    <span class='create_at'>{{ $thread->created_at }}</span>
  </li>
  @empty
  <li>まだスレッドがありません。</li>
  @endforelse
</ul>
@endsection