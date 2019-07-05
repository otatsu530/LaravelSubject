<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
  public function threads() {
    // スレッド一覧を全取得
    $threads = Thread::latest()->get();
    // それを持ってthreads viewを表示
    return view('bbs.threads')->with('threads', $threads);
  }

  // スレッド新規作成フォーム
  public function buildForm() {
      return view('bbs.buildForm');
  }

  // スレッド新規作成(postで渡ってきたデータはRequest型で入る)
  public function build(Request $request) {
    // ログインユーザー情報取得
    if (Auth::check()) {
        $user = Auth::user();
    }

    // タイトル空白はNGのバリデーション
    $this->validate($request, [
      'title' => 'required'
    ]);

      $thread = new Thread();
      $thread->title = $request->title;
      $thread->name = $user->name;
      $thread->save();
      return redirect('/threads');
  }

  // スレッドに対するコメントを表示
  public function comments($id) {
      $thread = Thread::findOrFail($id);
      // 該当IDのスレッドを持ってコメントページへ
      return view('bbs.comments')->with('thread', $thread);
    }
}