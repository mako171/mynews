@extends('layouts.front')

@section('content')
<div class="container">
    <h2>ニュース詳細</h2>
    <hr color="#c0c0c0">
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            <div class="post">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ Str::limit($post->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ Str::limit($post->body, 1500) }}
                        </div>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($post->image_path)
                            <img src="{{ asset('storage/image/' . $post->image_path) }}">
                            @endif
                        </div>
                        <div class="comments mt-4">
                            <div>
                                <a href="{{ route('news.comment', ['id' => $post->id]) }}">コメントを書く</a>
                            </div>
                            <hr color="#c0c0c0">
                            <!-- コメント表示 -->
                            <div class="comments mt-4">
                                <h2>コメント一覧</h2>
                                @foreach ($comments as $comment)
                                <div class="comment">
                                    <small>{{ $comment->created_at->format('Y年m月d日 H:i') }}</small>
                                    <p>{{ $comment->name }}</p>
                                    <p>{{ $comment->body }}</p>
                                </div>
                                <hr color="#c0c0c0">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection