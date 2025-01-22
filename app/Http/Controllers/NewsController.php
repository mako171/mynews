<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\News;
use App\Models\Comment;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }

    // 詳細画面を追記
    public function detail($id)
    {
        $post = News::findOrFail($id);
        //コメントを新しい順番に並び替える
        $comments = Comment::where('news_id', $id)->orderBy('created_at', 'desc')->get();

        // news/detail.blade.php ファイルを渡している
        // また View テンプレートに  post、という変数を渡している
        return view('news.detail', ['post' => $post, 'comments' => $comments]);
    }

    //　コメント機能を追記
    public function comment($id)
    {
        return view('news.comment', ['news_id' => $id]);
    }

    public function createComment($id, Request $request)
    {
        // commentモデルをnewしてコメントを追加する
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->news_id = $id;
        $comment->save();

        return redirect('news/' . $id);
    }
}
