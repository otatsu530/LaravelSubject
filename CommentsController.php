<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, Thread $thread) {
    // ログインユーザー情報取得
    if (Auth::check()) {
        $user = Auth::user();
    }

    $this->validate($request, [
      'comment' => 'required'
    ]);
    $comment = new Comment();
    $comment->comment = $request->comment;
    $comment->name = $user->name;
    $thread->comments()->save($comment);
    return redirect()->action('PostsController@comments', $thread);
  }
}
